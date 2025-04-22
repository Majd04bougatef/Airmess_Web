<?php

namespace App\Controller;

use App\Entity\SocialMedia;
use App\Entity\User;
use App\Entity\Commentaire;
use App\Form\SocialMediaType;
use App\Repository\SocialMediaRepository;
use App\Repository\UserRepository;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\ForbiddenWordsChecker;

#[Route('/admin/social-media')]
class AdminSocialMediaController extends AbstractController
{
    private const POSTS_PER_PAGE = 10;
    private const DEFAULT_USER_ID = 1;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository,
        private SluggerInterface $slugger,
        private PaginatorInterface $paginator,
        private string $uploadsDirectory,
        private ForbiddenWordsChecker $forbiddenWordsChecker
    ) {
        // Vérifier que le répertoire d'upload existe et est accessible
        if (!file_exists($this->uploadsDirectory)) {
            mkdir($this->uploadsDirectory, 0777, true);
        }
    }

    #[Route('/', name: 'admin_social_media_index', methods: ['GET'])]
    public function index(SocialMediaRepository $socialMediaRepository, Request $request): Response
    {
        $search = $request->query->get('search');
        $queryBuilder = $socialMediaRepository->createQueryBuilder('s')
            ->select('s', 'u')
            ->leftJoin('s.user', 'u')
            ->orderBy('s.publicationDate', 'DESC');
        
        if ($search) {
            $queryBuilder->andWhere('s.titre LIKE :search OR s.contenu LIKE :search OR s.lieu LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            self::POSTS_PER_PAGE
        );

        return $this->render('dashAdmin/socialPage.html.twig', [
            'pagination' => $pagination,
            'search' => $search
        ]);
    }

    #[Route('/new', name: 'admin_social_media_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $socialMedia = new SocialMedia();
        $socialMedia->setUser($this->getDefaultUser());
        $socialMedia->setPublicationDate(new \DateTime());
        $socialMedia->setLikee(0);
        $socialMedia->setDislike(0);

        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $forbiddenInTitle = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getTitre());
            $forbiddenInContent = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getContenu());

            if (!empty($forbiddenInTitle) || !empty($forbiddenInContent)) {
                $message = 'Contient des mots interdits: ';
                if (!empty($forbiddenInTitle)) {
                    $message .= 'Titre: ' . implode(', ', $forbiddenInTitle) . ' ';
                }
                if (!empty($forbiddenInContent)) {
                    $message .= 'Contenu: ' . implode(', ', $forbiddenInContent);
                }
                $this->addFlash('error', trim($message));
                
                return $this->render('dashAdmin/social_media_new.html.twig', [
                    'social_media' => $socialMedia,
                    'form' => $form->createView(),
                    'forbidden_words' => [
                        'title' => $forbiddenInTitle,
                        'content' => $forbiddenInContent 
                    ]
                ]);
            }

            try {
                $this->handleImageUpload($form, $socialMedia, $request);
                $this->entityManager->persist($socialMedia);
                $this->entityManager->flush();

                $this->addFlash('success', 'Publication ajoutée avec succès!');
                return $this->redirectToRoute('admin_social_media_index');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'ajout de la publication: ' . $e->getMessage());
            }
        }

        return $this->render('dashAdmin/social_media_new.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idEB}', name: 'admin_social_media_show', methods: ['GET'], requirements: ['idEB' => '\d+'])]
    public function show(SocialMedia $socialMedia, CommentaireRepository $commentaireRepository, Request $request): Response
    {
        $commentaires = $commentaireRepository->createQueryBuilder('c')
            ->where('c.socialMedia = :socialMedia')
            ->leftJoin('c.user', 'u')
            ->setParameter('socialMedia', $socialMedia)
            ->orderBy('c.idC', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('dashAdmin/social_media_show.html.twig', [
            'social_media' => $socialMedia,
            'commentaires' => $commentaires
        ]);
    }

    #[Route('/{idEB}/edit', name: 'admin_social_media_edit', methods: ['GET', 'POST'], requirements: ['idEB' => '\d+'])]
    public function edit(Request $request, SocialMedia $socialMedia): Response
    {
        $originalImage = $socialMedia->getImagemedia();
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $forbiddenInTitle = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getTitre());
            $forbiddenInContent = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getContenu());

            if (!empty($forbiddenInTitle) || !empty($forbiddenInContent)) {
                $message = 'Contient des mots interdits: ';
                if (!empty($forbiddenInTitle)) {
                    $message .= 'Titre: ' . implode(', ', $forbiddenInTitle) . ' ';
                }
                if (!empty($forbiddenInContent)) {
                    $message .= 'Contenu: ' . implode(', ', $forbiddenInContent);
                }
                $this->addFlash('error', trim($message));
                
                return $this->render('dashAdmin/social_media_edit.html.twig', [
                    'social_media' => $socialMedia,
                    'form' => $form->createView(),
                    'forbidden_words' => [
                        'title' => $forbiddenInTitle,
                        'content' => $forbiddenInContent
                    ]
                ]);
            }

            $this->handleImageUpload($form, $socialMedia, $request, $originalImage);
            $this->entityManager->flush();

            $this->addFlash('success', 'Publication mise à jour avec succès!');
            return $this->redirectToRoute('admin_social_media_index');
        }

        return $this->render('dashAdmin/social_media_edit.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idEB}', name: 'admin_social_media_delete', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function delete(Request $request, SocialMedia $socialMedia): Response
    {
        if ($this->isCsrfTokenValid('delete'.$socialMedia->getIdEB(), $request->request->get('_token'))) {
            // Supprimer l'image associée si elle existe
            if ($socialMedia->getImagemedia()) {
                $imagePath = $this->uploadsDirectory . '/' . $socialMedia->getImagemedia();
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            $this->entityManager->remove($socialMedia);
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Publication supprimée avec succès!');
        }

        return $this->redirectToRoute('admin_social_media_index');
    }

    #[Route('/{idEB}/comments', name: 'admin_social_media_comments', methods: ['GET'], requirements: ['idEB' => '\d+'])]
    public function comments(SocialMedia $socialMedia, CommentaireRepository $commentaireRepository): Response
    {
        $commentaires = $commentaireRepository->findBy(['socialMedia' => $socialMedia], ['idC' => 'DESC']);

        return $this->render('dashAdmin/social_media_comments.html.twig', [
            'social_media' => $socialMedia,
            'commentaires' => $commentaires
        ]);
    }

    #[Route('/comments/{idC}/delete', name: 'admin_comment_delete', methods: ['POST'], requirements: ['idC' => '\d+'])]
    public function deleteComment(Request $request, Commentaire $commentaire): Response
    {
        if ($this->isCsrfTokenValid('delete_comment'.$commentaire->getIdC(), $request->request->get('_token'))) {
            $socialMedia = $commentaire->getSocialMedia();
            
            $this->entityManager->remove($commentaire);
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Commentaire supprimé avec succès!');
            
            return $this->redirectToRoute('admin_social_media_comments', ['idEB' => $socialMedia->getIdEB()]);
        }

        return $this->redirectToRoute('admin_social_media_index');
    }

    #[Route('/comments/{idC}/edit', name: 'admin_comment_edit', methods: ['GET', 'POST'], requirements: ['idC' => '\d+'])]
    public function editComment(Request $request, Commentaire $commentaire): Response
    {
        $form = $this->createForm(\App\Form\CommentaireEditType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            
            $this->addFlash('success', 'Commentaire modifié avec succès!');
            
            return $this->redirectToRoute('admin_social_media_comments', [
                'idEB' => $commentaire->getSocialMedia()->getIdEB()
            ]);
        }

        return $this->render('dashAdmin/comment_edit.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'social_media' => $commentaire->getSocialMedia()
        ]);
    }

    private function getDefaultUser(): User
    {
        $defaultUser = $this->userRepository->find(self::DEFAULT_USER_ID);
        if (!$defaultUser) {
            throw new \LogicException('Default user with ID ' . self::DEFAULT_USER_ID . ' not found in the database. Please ensure this user exists.');
        }
        return $defaultUser;
    }

    private function handleImageUpload($form, SocialMedia $socialMedia, Request $request, ?string $originalImage = null): void
    {
        $imageFile = $form->get('imagemedia')->getData();

        if ($imageFile instanceof UploadedFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $this->slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

            try {
                $imageFile->move($this->uploadsDirectory, $newFilename);
                
                // Supprimer l'ancien fichier si un original existe
                if ($originalImage && $originalImage !== $newFilename) {
                    $oldFilePath = $this->uploadsDirectory . '/' . $originalImage;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
                
                $socialMedia->setImagemedia($newFilename);
            } catch (FileException $e) {
                throw new \Exception('Erreur lors du téléchargement du média: ' . $e->getMessage());
            }
        } elseif (!$originalImage && !$imageFile) {
            // Si pas d'image originale et pas de nouvelle image, on laisse le champ à null
            $socialMedia->setImagemedia(null);
        }
        // Si pas de nouvelle image mais une image originale existe, on conserve l'original
    }
} 