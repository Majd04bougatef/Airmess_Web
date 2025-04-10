<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\SocialMedia;
use App\Entity\User;
use App\Form\CommentaireType;
use App\Form\SocialMediaType;
use App\Repository\CommentaireRepository;
use App\Repository\SocialMediaRepository;
use App\Repository\UserRepository; // Import UserRepository
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Security\Http\Attribute\IsGranted; // Attributes removed where default user is used
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException; // Keep for explicit checks
use LogicException; // For default user error
use App\Service\ForbiddenWordsChecker;


#[Route('/social/media')]
class SocialMediaController extends AbstractController
{
    private const POSTS_PER_PAGE = 5;
    private const COMMENTS_PER_PAGE = 5;
    private const DEFAULT_USER_ID = 1; // Define the default user ID

    // Inject UserRepository to find the default user easily
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository, // Inject UserRepository
        private SluggerInterface $slugger,
        private PaginatorInterface $paginator,
        private string $uploadsDirectory = __DIR__.'/../../assets/imagemedia',
        private \App\Service\ForbiddenWordsChecker $forbiddenWordsChecker // Inject our new service
    ) {
    }

    /**
     * Helper function to get the default user entity.
     * Throws an exception if the default user is not found.
     */
    private function getDefaultUser(): User
    {
        $defaultUser = $this->userRepository->find(self::DEFAULT_USER_ID);
        if (!$defaultUser) {
            // This is a critical configuration error if the default user doesn't exist
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

        // --- DEBUGGING START ---
        if ($form->isSubmitted()) { // Check if submitted first
             if (!$form->isValid()) {
                 // Dump the errors to the screen/profiler
                 dump('Form is submitted but NOT valid.');
                 // Get errors as a string for easy viewing
                 dump((string) $form->getErrors(true, false));
                 // Optionally dump the data that was submitted
                 dump($form->getData()); // See the entity state after handleRequest
                 dump($request->request->all()); // See raw POST data
                 // You might want to add a dd() here to stop execution and see the dumps
                 // dd('Stopped after dumping form errors');
             } else {
                 dump('Form submitted AND valid.');
             }
        }
        // --- DEBUGGING END ---


        if ($form->isSubmitted() && $form->isValid()) {
            // Check for forbidden words in title and content
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

            try { // Wrap flush in try-catch for debugging DB errors
                $this->handleImageUpload($form, $socialMedia, $request);
                $this->entityManager->persist($socialMedia);
                dump('Entity persisted, attempting flush:', $socialMedia); // Dump before flush
                $this->entityManager->flush();
                dump('Flush successful!'); // Confirm flush worked

                return $this->handleSaveRedirect($request, 'Publication ajoutée !');

            } catch (\Exception $e) {
                // Catch potential DB errors during flush
                dump('EXCEPTION during flush: ' . $e->getMessage());
                dump($e); // Dump the full exception object
                // Add dd() to stop and see the exception
                 dd('Stopped after catching flush exception');
                 // Optionally add a flash message for the user
                 // $this->addFlash('error', 'Erreur lors de la sauvegarde: ' . $e->getMessage());
            }
        }

        // Re-render the form if not valid or if exception occurred before redirect
        return $this->renderCustomForm($request, 'social_media/new.html.twig', $socialMedia, $form, 'Ajouter');
    }

    #[Route('/{idEB}', name: 'app_social_media_show', methods: ['GET'], requirements: ['idEB' => '\d+'])]
    public function show(
        Request $request,
        SocialMedia $socialMedia, // ParamConverter automatically fetches the entity
        CommentaireRepository $commentaireRepository
    ): Response {
        // Prepare the form for adding a new comment (display only)
        $commentaire = new Commentaire();
        $commentForm = $this->createForm(CommentaireType::class, $commentaire, [
            'action' => $this->generateUrl('app_social_media_ajouter_commentaire', ['idEB' => $socialMedia->getIdEB()]),
            'method' => 'POST',
        ]);

        // Fetch and paginate comments for this social media post
        $commentsQuery = $commentaireRepository->createQueryBuilder('c')
            ->where('c.socialMedia = :socialMedia')
            ->setParameter('socialMedia', $socialMedia)
            ->leftJoin('c.user', 'u')
            ->select('c', 'u') // Select user data too if needed in the template
            ->orderBy('c.idC', 'DESC'); // Order by comment ID

        $commentsPagination = $this->paginator->paginate(
            $commentsQuery,
            $request->query->getInt('page', 1), // Use 'page' consistently
            self::COMMENTS_PER_PAGE
        );

        return $this->render('social_media/show.html.twig', [
            'social_media' => $socialMedia,
            'comments' => $commentsPagination,
            'comment_form' => $commentForm->createView(),
            // Pass the default user ID to the template for conditional logic (e.g., showing edit/delete buttons)
            'default_user_id' => self::DEFAULT_USER_ID
        ]);
    }

    #[Route('/{idEB}/edit', name: 'app_social_media_edit', methods: ['GET', 'POST'], requirements: ['idEB' => '\d+'])]
    // No longer requires login - checks ownership by default ID
    public function edit(Request $request, SocialMedia $socialMedia): Response
    {
        // Check if the post belongs to the default user ID
        // Optional: Add role check like || $this->isGranted('ROLE_ADMIN') to allow admins too
        if (!$socialMedia->getUser() || $socialMedia->getUser()->getIdU() !== self::DEFAULT_USER_ID) {
             throw $this->createAccessDeniedException('Vous ne pouvez modifier que les publications appartenant à l\'utilisateur par défaut (ID '.self::DEFAULT_USER_ID.').');
        }

        $originalImage = $socialMedia->getImagemedia(); // Store original image name
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Check for forbidden words in title and content
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
            // No need to persist, Doctrine tracks changes to managed entities
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
            return $this->json(['success' => false, 'error' => 'Invalid CSRF token'], 403);
        }

        $socialMedia->setLikee($socialMedia->getLikee() + 1);
        $this->entityManager->flush();
        
        return $this->json([
            'success' => true,
            'likeCount' => $socialMedia->getLikee(),
            'dislikeCount' => $socialMedia->getDislike()
        ]);
    }

    #[Route('/{idEB}/dislike', name: 'app_social_media_dislike', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function dislike(SocialMedia $socialMedia): Response
    {
        $socialMedia->setDislike($socialMedia->getDislike() + 1);
        $this->entityManager->flush();
        
        return $this->json([
            'success' => true,
            'likeCount' => $socialMedia->getLikee(),
            'dislikeCount' => $socialMedia->getDislike()
        ]);
    }

    #[Route('/{idEB}/commentaire', name: 'app_social_media_ajouter_commentaire', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function ajouterCommentaire(Request $request, SocialMedia $socialMedia): RedirectResponse // Return type is RedirectResponse
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire); // Create form to handle request data
        $form->handleRequest($request);

        // You can use the form for validation instead of manual checks
        if ($form->isSubmitted() && $form->isValid()) {
            // Assign the default user
            $defaultUser = $this->getDefaultUser();
            $commentaire->setUser($defaultUser);

            $commentaire->setSocialMedia($socialMedia);
            $commentaire->setNumberlike(0); // Default values should ideally be set in Entity constructor or lifecycle callback
            $commentaire->setNumberdislike(0);

            $this->entityManager->persist($commentaire);
            $this->entityManager->flush();

            $this->addFlash('success', 'Commentaire ajouté avec succès !');

        } else {
             // Handle validation errors - add flash messages from form errors
             foreach ($form->getErrors(true) as $error) {
                 $this->addFlash('error', $error->getMessage());
             }
             // Or a generic message if not using form validation extensively here
             if (!$form->isSubmitted()) { // Prevent error flash if just loaded show page
                 $this->addFlash('error', 'Impossible d\'ajouter le commentaire (non soumis).'); // Adjusted message
             }
        }

        // Always redirect back to the show page for this social media post
        return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
    }


    #[Route('/{idEB}', name: 'app_social_media_delete', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    // No longer requires login - checks ownership by default ID
    public function delete(Request $request, SocialMedia $socialMedia): Response
    {
        // Check if the post belongs to the default user ID
        // Optional: Add role check like || $this->isGranted('ROLE_ADMIN') to allow admins too
        if (!$socialMedia->getUser() || $socialMedia->getUser()->getIdU() !== self::DEFAULT_USER_ID) {
             throw $this->createAccessDeniedException('Vous ne pouvez supprimer que les publications appartenant à l\'utilisateur par défaut (ID '.self::DEFAULT_USER_ID.').');
        }

        $tokenName = 'delete' . $socialMedia->getIdEB();
        $isAjax = $request->isXmlHttpRequest();

        if ($this->isCsrfTokenValid($tokenName, $request->request->get('_token'))) {
            $this->handleImageDeletion($socialMedia); // Delete image first
            $this->entityManager->remove($socialMedia);
            $this->entityManager->flush();

             if (!$isAjax) {
                $this->addFlash('success', 'Publication supprimée.');
            }

        } else {
             $message = 'Token CSRF invalide.';
             if ($isAjax) {
                 // For AJAX, maybe return a JSON error or just the updated index which shows the item still exists
                 return new Response($message, Response::HTTP_FORBIDDEN);
             } else {
                 $this->addFlash('error', $message);
                 // Redirect back to show page if CSRF fails in non-AJAX context
                 return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
             }
        }

        // For both successful AJAX and non-AJAX delete
        return $isAjax
            ? $this->renderUpdatedIndex()
            : $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
    }

    // --- Helper Methods ---

    /**
     * Handles image upload from the form, updates the entity, and deletes old image if necessary.
     */
    private function handleImageUpload($form, SocialMedia $socialMedia, Request $request, ?string $originalImage = null): void
    {
        // Check if 'imagemedia' field exists and is submitted
        if (!$form->has('imagemedia')) {
            return;
        }
        $imageFile = $form->get('imagemedia')->getData();

        if ($imageFile instanceof UploadedFile) {
            $newFilename = $this->uploadImage($imageFile);
            $socialMedia->setImagemedia($newFilename);

            if ($originalImage && $originalImage !== $newFilename) {
                 @unlink($this->uploadsDirectory . '/' . $originalImage);
            }
        } elseif ($request->request->get('remove_imagemedia')) { 
             $this->handleImageDeletion($socialMedia);
             $socialMedia->setImagemedia(null);
        } else {
             
             if ($originalImage && !$socialMedia->getImagemedia() && !$request->files->has($form->get('imagemedia')->getName())) {
                 $socialMedia->setImagemedia($originalImage);
             }
        }
    }

    /**
     * Uploads the image file and returns the new filename.
     * @throws FileException
     */
    private function uploadImage(UploadedFile $imageFile): string
    {
        $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

        try {
            $imageFile->move($this->uploadsDirectory, $newFilename);
        } catch (FileException $e) {
            // Log the error details for debugging
            // error_log('Image upload failed: ' . $e->getMessage());
            $this->addFlash('error', 'L\'upload de l\'image a échoué. Veuillez réessayer.');
            // Consider logging the exception $e->getMessage()
            throw $e; // Re-throwing might stop execution, handle appropriately
        }
        return $newFilename;
    }

    /**
     * Deletes the physical image file associated with the SocialMedia entity.
     */
    private function handleImageDeletion(SocialMedia $socialMedia): void
    {
        $imageFilename = $socialMedia->getImagemedia();
        if ($imageFilename) {
            $filePath = $this->uploadsDirectory . '/' . $imageFilename;
            if (file_exists($filePath)) {
                 @unlink($filePath); // Use @ to suppress errors if file not found, though checking first is better
            }
            // Optionally update the entity if not removing it entirely
            // $socialMedia->setImagemedia(null);
        }
    }

    /**
     * Handles redirection after a successful save (new or edit).
     */
    private function handleSaveRedirect(Request $request, string $flashMessage): Response
    {
        if (!$request->isXmlHttpRequest()) {
             $this->addFlash('success', $flashMessage);
        }

        return $request->isXmlHttpRequest()
            ? $this->renderUpdatedIndex() // Render partial for AJAX
            : $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER); // Redirect for non-AJAX
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

    protected function renderCustomForm(Request $request, string $template, SocialMedia $socialMedia, $form, string $buttonLabel): Response
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
        ], new Response(null, $status));
    }
}