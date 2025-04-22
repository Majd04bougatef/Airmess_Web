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
        
        // Get the current user from session
        $session = $request->getSession();
        if (!$session->has('user_id')) {
            $this->addFlash('error', 'Vous devez être connecté pour créer une publication.');
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $currentUser = $this->userRepository->find($userId);
        
        if (!$currentUser) {
            $this->addFlash('error', 'Utilisateur introuvable. Veuillez vous reconnecter.');
            return $this->redirectToRoute('login');
        }
        
        $socialMedia->setUser($currentUser);
        $socialMedia->setPublicationDate(new \DateTimeImmutable());
        $socialMedia->setLikee(0);
        $socialMedia->setDislike(0);

        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifier les mots interdits dans le titre et le contenu
            $forbiddenInTitle = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getTitre());
            $forbiddenInContent = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getContenu());

            if (!empty($forbiddenInTitle) || !empty($forbiddenInContent)) {
                $message = 'Votre publication contient des mots interdits et ne peut pas être publiée: ';
                if (!empty($forbiddenInTitle)) {
                    $message .= 'Dans le titre: ' . implode(', ', $forbiddenInTitle) . ' ';
                }
                if (!empty($forbiddenInContent)) {
                    $message .= 'Dans le contenu: ' . implode(', ', $forbiddenInContent);
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
                $this->entityManager->flush();
                
                return $this->handleSaveRedirect($request, 'Publication ajoutée !');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de la création de la publication: ' . $e->getMessage());
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

        $session = $request->getSession();
        $currentUserId = $session->has('user_id') ? $session->get('user_id') : null;

        return $this->render('social_media/show.html.twig', [
            'social_media' => $socialMedia,
            'comments' => $commentsPagination,
            'comment_form' => $commentForm->createView(),
            'current_user_id' => $currentUserId
        ]);
    }

    #[Route('/{idEB}/edit', name: 'app_social_media_edit', methods: ['GET', 'POST'], requirements: ['idEB' => '\d+'])]
    public function edit(Request $request, SocialMedia $socialMedia): Response
    {
        $session = $request->getSession();
        
        if (!$session->has('user_id')) {
            $this->addFlash('error', 'Vous devez être connecté pour modifier une publication.');
            return $this->redirectToRoute('login');
        }
        
        $currentUserId = $session->get('user_id');
        
        if (!$socialMedia->getUser() || $socialMedia->getUser()->getIdU() !== $currentUserId) {
            throw $this->createAccessDeniedException('Vous ne pouvez modifier que vos propres publications.');
        }

        $originalImage = $socialMedia->getImagemedia();
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $forbiddenInTitle = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getTitre());
            $forbiddenInContent = $this->forbiddenWordsChecker->containsForbiddenWords($socialMedia->getContenu());

            if (!empty($forbiddenInTitle) || !empty($forbiddenInContent)) {
                $message = 'Votre publication contient des mots interdits et ne peut pas être mise à jour: ';
                if (!empty($forbiddenInTitle)) {
                    $message .= 'Dans le titre: ' . implode(', ', $forbiddenInTitle) . ' ';
                }
                if (!empty($forbiddenInContent)) {
                    $message .= 'Dans le contenu: ' . implode(', ', $forbiddenInContent);
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

    /**
     * Ajoute un commentaire à une publication sociale
     * 
     * Cette méthode est la méthode principale pour l'ajout de commentaires dans l'application.
     * Elle remplace complètement la méthode équivalente qui était dans CommentaireController.
     *
     * @param Request $request La requête HTTP
     * @param SocialMedia $socialMedia L'objet publication sociale auquel ajouter le commentaire
     * @return RedirectResponse
     */
    #[Route('/{idEB}/commentaire', name: 'app_social_media_ajouter_commentaire', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function ajouterCommentaire(Request $request, SocialMedia $socialMedia): RedirectResponse
    {
        $session = $request->getSession();
        
        if (!$session->has('user_id')) {
            $this->addFlash('danger', 'Vous devez être connecté pour ajouter un commentaire.');
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $this->userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('danger', 'Utilisateur introuvable. Veuillez vous reconnecter.');
            return $this->redirectToRoute('login');
        }
        
        $commentaire = new Commentaire();
        $commentaire->setSocialMedia($socialMedia);
        $commentaire->setUser($user);
        $commentaire->setNumberlike(0);
        $commentaire->setNumberdislike(0);
        
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Vérifier les mots interdits
                $forbiddenWords = $this->forbiddenWordsChecker->containsForbiddenWords($commentaire->getDescription());
                if (!empty($forbiddenWords)) {
                    $this->addFlash('danger', '<strong>Mots interdits détectés :</strong><br>' . implode(', ', $forbiddenWords) . '<br>Votre commentaire ne peut pas être publié avec ces mots.');
                    return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
                }
                
                $this->entityManager->persist($commentaire);
                $this->entityManager->flush();
                
                // Redirection silencieuse sans message de succès
                return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
            } catch (\Exception $e) {
                $this->addFlash('danger', 'Erreur lors de l\'ajout du commentaire : ' . $e->getMessage());
            }
        } else {
            // Collecter toutes les erreurs de validation
            $errors = [];
            foreach ($form->getErrors(true) as $error) {
                $errors[] = $error->getMessage();
            }
            
            if (!empty($errors)) {
                $this->addFlash('danger', '<strong>Erreur de validation :</strong><br>' . implode('<br>', $errors));
            }
        }
        
        return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
    }

    #[Route('/{idEB}', name: 'app_social_media_delete', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function delete(Request $request, SocialMedia $socialMedia): Response
    {
        $session = $request->getSession();
        
        if (!$session->has('user_id')) {
            $this->addFlash('error', 'Vous devez être connecté pour supprimer une publication.');
            return $this->redirectToRoute('login');
        }
        
        $currentUserId = $session->get('user_id');
        
        if (!$socialMedia->getUser() || $socialMedia->getUser()->getIdU() !== $currentUserId) {
            throw $this->createAccessDeniedException('Vous ne pouvez supprimer que vos propres publications.');
        }

        if ($this->isCsrfTokenValid('delete'.$socialMedia->getIdEB(), $request->request->get('_token'))) {
            try {
                // Delete associated image
                $this->handleImageDeletion($socialMedia);
                
                // Delete entity
                $this->entityManager->remove($socialMedia);
                $this->entityManager->flush();
                
                $this->addFlash('success', 'Publication supprimée avec succès !');
                
                // Redirect to socialVoyageurs_page instead of app_social_media_index
                return $this->redirectToRoute('socialVoyageurs_page');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de la suppression: ' . $e->getMessage());
            }
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }
        
        return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
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
        } else {
            $this->addFlash('warning', 'Aucun fichier n\'a été téléchargé');
            
            // If no file uploaded, keep the original image or set to empty string (not null)
            if ($originalImage) {
                $socialMedia->setImagemedia($originalImage);
            } else {
                // Set empty string instead of null to prevent integrity constraint violation
                $socialMedia->setImagemedia('');
            }
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

    #[Route('/random-publications', name: 'app_social_media_random', methods: ['GET'])]
    public function randomPublications(Request $request, SocialMediaRepository $socialMediaRepository, int $limit = 4): Response
    {
        // Try to get most liked publications first
        $mostLiked = $socialMediaRepository->findMostLiked($limit);
        
        // If we don't have enough, get some random ones
        if (count($mostLiked) < $limit) {
            $random = $socialMediaRepository->findRandom($limit - count($mostLiked));
            $publications = array_merge($mostLiked, $random);
            
            // Prevent duplicates
            $uniquePublications = [];
            foreach ($publications as $pub) {
                $uniquePublications[$pub->getIdEB()] = $pub;
                if (count($uniquePublications) >= $limit) {
                    break;
                }
            }
            $publications = array_values($uniquePublications);
        } else {
            // Shuffle to get random ones from the most liked
            shuffle($mostLiked);
            $publications = array_slice($mostLiked, 0, $limit);
        }
        
        return $this->render('social_media/_random_publications.html.twig', [
            'publications' => $publications,
        ]);
    }
}
