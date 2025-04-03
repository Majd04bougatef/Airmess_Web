<?php

namespace App\Controller;

use App\Entity\SocialMedia;
use App\Entity\User;
use App\Form\SocialMediaType;
use App\Repository\SocialMediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Security\Http\Attribute\IsGranted; // Security Temporarily Disabled
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/social/media')]
class SocialMediaController extends AbstractController
{
    // =========================================================================
    // WARNING: SECURITY IS TEMPORARILY DISABLED ON new, edit, delete ACTIONS
    //          FOR DEVELOPMENT WITHOUT LOGIN.
    //          RE-ENABLE #[IsGranted] ATTRIBUTES BEFORE PRODUCTION!
    // =========================================================================

    #[Route(name: 'app_social_media_index', methods: ['GET'])]
    public function index(SocialMediaRepository $socialMediaRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $queryBuilder = $socialMediaRepository->createQueryBuilder('s')
            ->orderBy('s.publicationDate', 'DESC'); // Sort by publication date

        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1), // Page number
            5 // Number of posts per page (adjust as needed)
        );

        return $this->render('social_media/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_social_media_new', methods: ['GET', 'POST'])]
    // #[IsGranted('IS_AUTHENTICATED_FULLY')] // <-- SECURITY TEMPORARILY DISABLED
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $socialMedia = new SocialMedia();

        // --- Fallback User Logic (INSECURE - Development Only) ---
        $loggedInUser = $this->getUser(); // Check if someone IS logged in anyway
        if ($loggedInUser instanceof User) {
            $socialMedia->setUser($loggedInUser);
        } else {
            // Fallback to User ID 1 since no one is logged in
            $defaultUser = $entityManager->getRepository(User::class)->find(1); // Find user with id_U = 1
            if ($defaultUser) {
                $socialMedia->setUser($defaultUser);
            } else {
                // Critical error: User 1 doesn't exist, cannot proceed
                $this->addFlash('error', 'Utilisateur par défaut (ID 1) introuvable! Impossible de créer une publication sans utilisateur.');
                // You might redirect or render an error page, but throwing is clearest for dev
                throw new \LogicException('Default user with ID 1 not found in database. Cannot create post without a user. Ensure User 1 exists or implement login.');
            }
        }
        // --- End Fallback User Logic ---

        // Set other default values handled by the controller
        $socialMedia->setImagemedia(''); // Initialize imagemedia to avoid uninitialized access
        $socialMedia->setPublicationDate(new \DateTimeImmutable()); // Use DateTimeImmutable if possible
        $socialMedia->setLikee(0); // Default like count
        $socialMedia->setDislike(0); // Default dislike count

        // Pass the initialized entity to the form (make sure SocialMediaType doesn't include 'user', 'publicationDate', 'likee', 'dislike')
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // --- Handle Image Upload ---
            /** @var UploadedFile|null $imageFile */
            $imageFile = $form->get('imagemedia')->getData(); // Get data from the unmapped form field

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // Use the slugger to create a safe filename
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the configured directory
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'), // Ensure this parameter is defined in services.yaml
                        $newFilename
                    );
                    // Update the 'imagemedia' property ONLY AFTER successful move
                    $socialMedia->setImagemedia($newFilename);

                } catch (FileException $e) {
                    // Handle exception if something happens during file upload
                    $this->addFlash('error', 'Impossible de télécharger l\'image: ' . $e->getMessage());
                    // Return the form view again to show the error
                     return $this->render('social_media/new.html.twig', [
                         'social_media' => $socialMedia, // Pass the entity back
                         'form' => $form->createView(), // Pass the view
                     ]);
                }
            }
            // --- End Handle Image Upload ---

            $entityManager->persist($socialMedia);
            $entityManager->flush();

            $this->addFlash('success', 'Publication ajoutée avec succès! (Mode Dev)');
            return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
        }

        // Always use createView() when rendering forms
        return $this->render('social_media/new.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idEB}', name: 'app_social_media_show', methods: ['GET'])]
    public function show(SocialMedia $socialMedia): Response
    {
        return $this->render('social_media/show.html.twig', [
            'social_media' => $socialMedia,
        ]);
    }

    #[Route('/{idEB}/edit', name: 'app_social_media_edit', methods: ['GET', 'POST'])]
    // #[IsGranted('POST_EDIT', subject: 'socialMedia')] // <-- SECURITY TEMPORARILY DISABLED
    public function edit(Request $request, SocialMedia $socialMedia, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        // Check if the user trying to edit is the one assigned (even if it's user 1)
        // This is *minimal* security even without login, but better than nothing.
        // Replace with proper IsGranted check later.
        // $currentUser = $this->getUser() ?? $entityManager->getRepository(User::class)->find(1); // Get logged in or user 1
        // if (!$currentUser || $socialMedia->getUser()->getIdU() !== $currentUser->getIdU()) {
        //     $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier cette publication.');
        //     return $this->redirectToRoute('app_social_media_index');
        // }


        $originalImage = $socialMedia->getImagemedia();
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             /** @var UploadedFile|null $imageFile */
             $imageFile = $form->get('imagemedia')->getData();
             if ($imageFile) {
                // Process new file upload (same logic as in 'new' action)
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
                try {
                    $imageFile->move($this->getParameter('uploads_directory'), $newFilename);
                    $socialMedia->setImagemedia($newFilename); // Update with new filename
                    // Delete old file?
                    if ($originalImage && $originalImage !== $newFilename && file_exists($this->getParameter('uploads_directory').'/'.$originalImage)) {
                        @unlink($this->getParameter('uploads_directory').'/'.$originalImage); // Use @ to suppress error if file not found
                    }
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur MAJ image: ' . $e->getMessage());
                     return $this->render('social_media/edit.html.twig', ['social_media' => $socialMedia,'form' => $form->createView()]);
                }
            } else {
                 $socialMedia->setImagemedia($originalImage); // Keep original if no new file
            }

            $entityManager->flush();
            $this->addFlash('success', 'Publication modifiée! (Mode Dev)');
            return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('social_media/edit.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idEB}', name: 'app_social_media_delete', methods: ['POST'])]
    // #[IsGranted('POST_DELETE', subject: 'socialMedia')] // <-- SECURITY TEMPORARILY DISABLED
    public function delete(Request $request, SocialMedia $socialMedia, EntityManagerInterface $entityManager): Response
    {
        // Minimal check (see comment in edit action)
        // $currentUser = $this->getUser() ?? $entityManager->getRepository(User::class)->find(1);
        // if (!$currentUser || $socialMedia->getUser()->getIdU() !== $currentUser->getIdU()) {
        //      $this->addFlash('error', 'Vous n\'êtes pas autorisé à supprimer cette publication.');
        //      return $this->redirectToRoute('app_social_media_index');
        // }

        $tokenName = 'delete' . $socialMedia->getIdEB();
        if ($this->isCsrfTokenValid($tokenName, $request->request->get('_token'))) {
            $imageFilename = $socialMedia->getImagemedia();
            if ($imageFilename && file_exists($this->getParameter('uploads_directory').'/'.$imageFilename)) {
                 @unlink($this->getParameter('uploads_directory').'/'.$imageFilename); // Use @ to suppress error
            }
            $entityManager->remove($socialMedia);
            $entityManager->flush();
             $this->addFlash('success', 'Publication supprimée. (Mode Dev)');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
    }
}