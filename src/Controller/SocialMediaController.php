<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\SocialMedia;
use App\Entity\User;
use App\Form\CommentaireType;
use App\Form\SocialMediaType;
use App\Repository\CommentaireRepository;
use App\Repository\SocialMediaRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use LogicException;
use App\Service\ForbiddenWordsChecker;


#[Route('/social/media')]
class SocialMediaController extends AbstractController
{
    private const POSTS_PER_PAGE = 5;
    private const COMMENTS_PER_PAGE = 5;
    private const DEFAULT_USER_ID = 1;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository,
        private SluggerInterface $slugger,
        private PaginatorInterface $paginator,
        private string $uploadsDirectory = 'C:/xampp/htdocs/ImageSocialMedia',
        private \App\Service\ForbiddenWordsChecker $forbiddenWordsChecker
    ) {
        // Vérifier que le répertoire d'upload existe et est accessible
        if (!file_exists($this->uploadsDirectory)) {
            mkdir($this->uploadsDirectory, 0777, true);
        }
    }

    private function getDefaultUser(): User
    {
        $defaultUser = $this->userRepository->find(self::DEFAULT_USER_ID);
        if (!$defaultUser) {
            throw new LogicException('Default user with ID ' . self::DEFAULT_USER_ID . ' not found in the database. Please ensure this user exists.');
        }
        return $defaultUser;
    }

    #[Route(name: 'app_social_media_index', methods: ['GET'])]
    public function index(SocialMediaRepository $socialMediaRepository, Request $request): Response
    {
        $lieu = $request->query->get('lieu');
        $queryBuilder = $socialMediaRepository->createFilteredQueryBuilder($lieu)
            ->select('s', 'u')
            ->leftJoin('s.user', 'u');

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            self::POSTS_PER_PAGE
        );

        $template = $request->isXmlHttpRequest()
            ? 'social_media/_index_content.html.twig'
            : 'social_media/index.html.twig';

        return $this->render($template, [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_social_media_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $socialMedia = new SocialMedia();
        $defaultUser = $this->getDefaultUser();
        $socialMedia->setUser($defaultUser);
        $socialMedia->setPublicationDate(new \DateTimeImmutable());
        $socialMedia->setLikee(0);
        $socialMedia->setDislike(0);

        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
             if (!$form->isValid()) {
                 dump('Form is submitted but NOT valid.');
                 dump((string) $form->getErrors(true, false));
                 dump($form->getData());
                 dump($request->request->all());
             } else {
                 dump('Form submitted AND valid.');
             }
        }

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
                return $this->renderCustomForm($request, 'social_media/new.html.twig', $socialMedia, $form, 'Ajouter', [
                    'forbidden_words' => [
                        'title' => $forbiddenInTitle,
                        'content' => $forbiddenInContent
                    ]
                ]);
            }

                try {
                    $this->handleImageUpload($form, $socialMedia, $request);
                    $this->entityManager->persist($socialMedia);
                    dump('Entity persisted, attempting flush:', $socialMedia);
                    $this->entityManager->flush();
                    dump('Flush successful!');

                return $this->handleSaveRedirect($request, 'Publication ajoutée !');

                } catch (\Exception $e) {
                    dump('EXCEPTION during flush: ' . $e->getMessage());
                    dump($e);
                     dd('Stopped after catching flush exception');
            }
        }

        return $this->renderCustomForm($request, 'social_media/new.html.twig', $socialMedia, $form, 'Ajouter');
    }

    #[Route('/{idEB}', name: 'app_social_media_show', methods: ['GET'], requirements: ['idEB' => '\d+'])]
    public function show(
        Request $request,
        SocialMedia $socialMedia,
        CommentaireRepository $commentaireRepository
    ): Response {
        $commentaire = new Commentaire();
        $commentForm = $this->createForm(CommentaireType::class, $commentaire, [
            'action' => $this->generateUrl('app_social_media_ajouter_commentaire', ['idEB' => $socialMedia->getIdEB()]),
            'method' => 'POST',
        ]);

        $commentsQuery = $commentaireRepository->createQueryBuilder('c')
            ->where('c.socialMedia = :socialMedia')
            ->setParameter('socialMedia', $socialMedia)
            ->leftJoin('c.user', 'u')
            ->select('c', 'u')
            ->orderBy('c.idC', 'DESC');

        $commentsPagination = $this->paginator->paginate(
            $commentsQuery,
            $request->query->getInt('page', 1),
            self::COMMENTS_PER_PAGE
        );

        return $this->render('social_media/show.html.twig', [
            'social_media' => $socialMedia,
            'comments' => $commentsPagination,
            'comment_form' => $commentForm->createView(),
            'default_user_id' => self::DEFAULT_USER_ID
        ]);
    }

    #[Route('/{idEB}/edit', name: 'app_social_media_edit', methods: ['GET', 'POST'], requirements: ['idEB' => '\d+'])]
    public function edit(Request $request, SocialMedia $socialMedia): Response
    {
        if (!$socialMedia->getUser() || $socialMedia->getUser()->getIdU() !== self::DEFAULT_USER_ID) {
             throw $this->createAccessDeniedException('Vous ne pouvez modifier que les publications appartenant à l\'utilisateur par défaut (ID '.self::DEFAULT_USER_ID.').');
        }

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
                return $this->renderCustomForm($request, 'social_media/edit.html.twig', $socialMedia, $form, 'Mettre à jour', [
                    'forbidden_words' => [
                        'title' => $forbiddenInTitle,
                        'content' => $forbiddenInContent
                    ]
                ]);
            }

            $this->handleImageUpload($form, $socialMedia, $request, $originalImage);
            $this->entityManager->flush();

            return $this->handleSaveRedirect($request, 'Publication mise à jour !');
        }

        return $this->renderCustomForm($request, 'social_media/edit.html.twig', $socialMedia, $form, 'Mettre à jour');
    }

    #[Route('/{idEB}/like', name: 'app_social_media_like', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function like(Request $request, SocialMedia $socialMedia): Response
    {
        $submittedToken = $request->request->get('_token');
        
        if (!$this->isCsrfTokenValid('like-post', $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide.');
            
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'error' => 'Invalid CSRF token'], 403);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        }

        // Vérifier si l'utilisateur a déjà "disliké" cette publication
        $session = $request->getSession();
        $userActions = $session->get('user_post_actions', []);
        $postId = $socialMedia->getIdEB();
        
        try {
            // Si l'utilisateur a déjà aimé ce post, ne rien faire
            if (isset($userActions[$postId]) && $userActions[$postId] === 'like') {
                // L'utilisateur a déjà aimé ce post, toggle off
                $socialMedia->setLikee($socialMedia->getLikee() - 1);
                unset($userActions[$postId]);
            } 
            // Si l'utilisateur a déjà disliké ce post, changer pour like
            elseif (isset($userActions[$postId]) && $userActions[$postId] === 'dislike') {
                $socialMedia->setDislike($socialMedia->getDislike() - 1);
                $socialMedia->setLikee($socialMedia->getLikee() + 1);
                $userActions[$postId] = 'like';
            } 
            // Sinon, ajouter un like
            else {
                $socialMedia->setLikee($socialMedia->getLikee() + 1);
                $userActions[$postId] = 'like';
            }
            
            // Sauvegarder les actions de l'utilisateur
            $session->set('user_post_actions', $userActions);
            $this->entityManager->flush();
            
            $message = isset($userActions[$postId]) ? 'J\'aime ajouté!' : 'J\'aime retiré!';
            $this->addFlash('success', $message);
            
            if ($request->isXmlHttpRequest()) {
                return $this->json([
                    'success' => true,
                    'likeCount' => $socialMedia->getLikee(),
                    'dislikeCount' => $socialMedia->getDislike(),
                    'message' => $message,
                    'action' => isset($userActions[$postId]) ? $userActions[$postId] : null
                ]);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de l\'ajout du j\'aime.');
            
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'error' => 'Database error'], 500);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        }
    }

    #[Route('/{idEB}/dislike', name: 'app_social_media_dislike', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function dislike(Request $request, SocialMedia $socialMedia): Response
    {
        $submittedToken = $request->request->get('_token');
        
        if (!$this->isCsrfTokenValid('dislike-post', $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide.');
            
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'error' => 'Invalid CSRF token'], 403);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        }
        
        // Vérifier si l'utilisateur a déjà "aimé" cette publication
        $session = $request->getSession();
        $userActions = $session->get('user_post_actions', []);
        $postId = $socialMedia->getIdEB();
        
        try {
            // Si l'utilisateur a déjà disliké ce post, ne rien faire
            if (isset($userActions[$postId]) && $userActions[$postId] === 'dislike') {
                // L'utilisateur a déjà disliké ce post, toggle off
                $socialMedia->setDislike($socialMedia->getDislike() - 1);
                unset($userActions[$postId]);
            } 
            // Si l'utilisateur a déjà liké ce post, changer pour dislike
            elseif (isset($userActions[$postId]) && $userActions[$postId] === 'like') {
                $socialMedia->setLikee($socialMedia->getLikee() - 1);
                $socialMedia->setDislike($socialMedia->getDislike() + 1);
                $userActions[$postId] = 'dislike';
            } 
            // Sinon, ajouter un dislike
            else {
                $socialMedia->setDislike($socialMedia->getDislike() + 1);
                $userActions[$postId] = 'dislike';
            }
            
            // Sauvegarder les actions de l'utilisateur
            $session->set('user_post_actions', $userActions);
            $this->entityManager->flush();
            
            $message = isset($userActions[$postId]) ? 'Je n\'aime pas ajouté!' : 'Je n\'aime pas retiré!';
            $this->addFlash('success', $message);
            
            if ($request->isXmlHttpRequest()) {
                return $this->json([
                    'success' => true,
                    'likeCount' => $socialMedia->getLikee(),
                    'dislikeCount' => $socialMedia->getDislike(),
                    'message' => $message,
                    'action' => isset($userActions[$postId]) ? $userActions[$postId] : null
                ]);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de l\'ajout du je n\'aime pas.');
            
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'error' => 'Database error'], 500);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        }
    }

    #[Route('/{idEB}/commentaire', name: 'app_social_media_ajouter_commentaire', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function ajouterCommentaire(Request $request, SocialMedia $socialMedia): RedirectResponse
    {
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('comment_token', $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide pour la soumission du commentaire.');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        }
        
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $defaultUser = $this->getDefaultUser();
            $commentaire->setUser($defaultUser);
            $commentaire->setSocialMedia($socialMedia);
            $commentaire->setNumberlike(0);
            $commentaire->setNumberdislike(0);
            
            // Vérifier si le contenu du commentaire est vide
            if (empty(trim($commentaire->getDescription()))) {
                $this->addFlash('error', 'Le commentaire ne peut pas être vide.');
                return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
            }
            
            // Vérifier les mots interdits
            $forbiddenWords = $this->forbiddenWordsChecker->containsForbiddenWords($commentaire->getDescription());
            if (!empty($forbiddenWords)) {
                $this->addFlash('error', 'Votre commentaire contient des mots interdits: ' . implode(', ', $forbiddenWords));
                return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
            }

            $this->entityManager->persist($commentaire);
            $this->entityManager->flush();

            $this->addFlash('success', 'Commentaire ajouté avec succès !');
            
            if ($request->isXmlHttpRequest()) {
                return $this->json([
                    'success' => true,
                    'message' => 'Commentaire ajouté!',
                    'commentId' => $commentaire->getIdC()
                ]);
            }
        } else {
            foreach ($form->getErrors(true) as $error) {
                $this->addFlash('error', $error->getMessage());
            }
            if (!$form->isSubmitted()) { 
                $this->addFlash('error', 'Impossible d\'ajouter le commentaire (non soumis).');
            }
        }

        return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
    }

    #[Route('/{idEB}', name: 'app_social_media_delete', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function delete(Request $request, SocialMedia $socialMedia): Response
    {
        if (!$socialMedia->getUser() || $socialMedia->getUser()->getIdU() !== self::DEFAULT_USER_ID) {
             throw $this->createAccessDeniedException('Vous ne pouvez supprimer que les publications appartenant à l\'utilisateur par défaut (ID '.self::DEFAULT_USER_ID.').');
        }

        $tokenName = 'delete' . $socialMedia->getIdEB();
        $isAjax = $request->isXmlHttpRequest();

        if ($this->isCsrfTokenValid($tokenName, $request->request->get('_token'))) {
            $this->handleImageDeletion($socialMedia); 
            $this->entityManager->remove($socialMedia);
            $this->entityManager->flush();

             if (!$isAjax) {
                $this->addFlash('success', 'Publication supprimée.');
            }

        } else {
             $message = 'Token CSRF invalide.';
             if ($isAjax) {
                 return new Response($message, Response::HTTP_FORBIDDEN);
             } else {
                 $this->addFlash('error', $message);
                 return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
             }
        }

        return $isAjax
            ? $this->renderUpdatedIndex()
            : $this->redirectToRoute('socialVoyageurs_page', [], Response::HTTP_SEE_OTHER);
    }

    private function handleImageUpload($form, SocialMedia $socialMedia, Request $request, ?string $originalImage = null): void
    {
        if (!$form->has('imagemedia')) {
            $this->addFlash('error', 'Le champ imagemedia n\'existe pas dans le formulaire');
            return;
        }
        
        /** @var UploadedFile|null $imageFile */
        $imageFile = $form->get('imagemedia')->getData();
        
        // Debug information
        if ($imageFile) {
            $this->addFlash('info', 'Fichier détecté: ' . $imageFile->getClientOriginalName() . ' (' . $imageFile->getSize() . ' octets)');
            
            // Vérifier si le fichier est valide
            if (!$imageFile->isValid()) {
                $this->addFlash('error', 'Le fichier uploadé n\'est pas valide. Code d\'erreur: ' . $imageFile->getError());
                return;
            }
        } else {
            $this->addFlash('warning', 'Aucun fichier n\'a été téléchargé');
            if ($originalImage) {
                $socialMedia->setImagemedia($originalImage);
            }
            return;
        }
        
        try {
            // Vérifier que le répertoire d'upload existe et est accessible en écriture
            if (!is_dir($this->uploadsDirectory)) {
                $this->addFlash('error', 'Le répertoire d\'upload n\'existe pas: ' . $this->uploadsDirectory);
                if (!mkdir($this->uploadsDirectory, 0777, true) && !is_dir($this->uploadsDirectory)) {
                    throw new \Exception("Impossible de créer le répertoire d'upload: " . $this->uploadsDirectory);
                }
                $this->addFlash('info', 'Répertoire d\'upload créé: ' . $this->uploadsDirectory);
            } elseif (!is_writable($this->uploadsDirectory)) {
                throw new \Exception("Le répertoire d'upload n'est pas accessible en écriture: " . $this->uploadsDirectory);
            } else {
                $this->addFlash('info', 'Répertoire d\'upload valide et accessible: ' . $this->uploadsDirectory);
            }
            
            // Informations sur le fichier
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $this->slugger->slug($originalFilename);
            $extension = $imageFile->getClientOriginalExtension();
            
            if (empty($extension)) {
                $extension = $imageFile->guessExtension() ?: 'jpg';
                $this->addFlash('info', 'Extension déterminée: ' . $extension);
            }
            
            // Générer un nom de fichier unique
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $extension;
            $fullPath = $this->uploadsDirectory . '/' . $newFilename;
            
            $this->addFlash('info', 'Tentative de déplacement du fichier vers: ' . $fullPath);
            
            // Déplacer le fichier
            try {
                $imageFile->move($this->uploadsDirectory, $newFilename);
                $this->addFlash('success', 'Fichier déplacé avec succès: ' . $newFilename);
            } catch (\Exception $e) {
                throw new \Exception('Erreur lors du déplacement du fichier: ' . $e->getMessage());
            }
            
            // Vérifier que le fichier a bien été déplacé et est accessible
            if (!file_exists($fullPath)) {
                throw new \Exception("Le fichier n'a pas été correctement déplacé vers " . $fullPath);
            }
            
            // Mettre à jour l'entité avec le nouveau nom de fichier
            $socialMedia->setImagemedia($newFilename);
            
            // Supprimer l'ancien fichier si nécessaire
            if ($originalImage && $originalImage !== $newFilename) {
                $oldPath = $this->uploadsDirectory . '/' . $originalImage;
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                    $this->addFlash('info', 'Ancien fichier supprimé: ' . $originalImage);
                }
            }
            
        } catch (\Exception $e) {
            // En cas d'erreur, conserver l'image originale
            if ($originalImage) {
                $socialMedia->setImagemedia($originalImage);
            }
            $this->addFlash('error', 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage());
        }
    }

    private function handleImageDeletion(SocialMedia $socialMedia): void
    {
        $imageFilename = $socialMedia->getImagemedia();
        if ($imageFilename) {
            $filePath = $this->uploadsDirectory . '/' . $imageFilename;
            if (file_exists($filePath)) {
                 @unlink($filePath);
            }
        }
    }

    private function handleSaveRedirect(Request $request, string $flashMessage): Response
    {
        if (!$request->isXmlHttpRequest()) {
             $this->addFlash('success', $flashMessage);
        }

        return $request->isXmlHttpRequest()
            ? $this->renderUpdatedIndex()
            : $this->redirectToRoute('socialVoyageurs_page', [], Response::HTTP_SEE_OTHER);
    }

    private function renderUpdatedIndex(): Response
    {
        $repo = $this->entityManager->getRepository(SocialMedia::class);
        $queryBuilder = $repo->createQueryBuilder('s')
            ->select('s', 'u')
            ->leftJoin('s.user', 'u')
            ->orderBy('s.publicationDate', 'DESC');

        $pagination = $this->paginator->paginate(
            $queryBuilder,
            1,
            self::POSTS_PER_PAGE
        );

        return $this->render('social_media/_index_content.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    protected function renderCustomForm(Request $request, string $template, SocialMedia $socialMedia, $form, string $buttonLabel, array $forbiddenWords = []): Response
    {
        $usePartial = $request->isXmlHttpRequest();
        $view = $usePartial ? 'social_media/_form.html.twig' : $template;

        $status = ($form->isSubmitted() && !$form->isValid())
            ? Response::HTTP_UNPROCESSABLE_ENTITY
            : Response::HTTP_OK;

        return $this->render($view, [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
            'button_label' => $buttonLabel,
            'forbidden_words' => $forbiddenWords
        ], new Response(null, $status));
    }
}
