<?php

namespace App\Controller;

use App\Entity\SocialMedia;
use App\Form\ScheduledPostType;
use App\Repository\SocialMediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/scheduled-posts')]
class AdminScheduledPostController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private SluggerInterface $slugger,
        private string $uploadsDirectory
    ) {}

    #[Route('/', name: 'admin_scheduled_posts_index', methods: ['GET'])]
    public function index(SocialMediaRepository $socialMediaRepository): Response
    {
        $upcomingPosts = $socialMediaRepository->createQueryBuilder('s')
            ->where('s.publicationDate > :now')
            ->setParameter('now', new \DateTime())
            ->orderBy('s.publicationDate', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render('dashAdmin/scheduled_posts/index.html.twig', [
            'scheduled_posts' => $upcomingPosts
        ]);
    }

    #[Route('/new', name: 'admin_scheduled_posts_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $scheduledPost = new SocialMedia();
        $scheduledPost->setUser($this->getUser());
        $scheduledPost->setLikee(0);
        $scheduledPost->setDislike(0);

        $form = $this->createForm(ScheduledPostType::class, $scheduledPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imagemedia')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $this->slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move($this->uploadsDirectory, $newFilename);
                    $scheduledPost->setImagemedia($newFilename);
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Erreur lors du téléchargement de l\'image: ' . $e->getMessage());
                    return $this->renderForm('dashAdmin/scheduled_posts/new.html.twig', [
                        'scheduled_post' => $scheduledPost,
                        'form' => $form,
                    ]);
                }
            }

            $this->entityManager->persist($scheduledPost);
            $this->entityManager->flush();

            $this->addFlash('success', 'Publication planifiée avec succès!');
            return $this->redirectToRoute('admin_scheduled_posts_index');
        }

        return $this->renderForm('dashAdmin/scheduled_posts/new.html.twig', [
            'scheduled_post' => $scheduledPost,
            'form' => $form,
        ]);
    }

    #[Route('/{idEB}', name: 'admin_scheduled_posts_delete', methods: ['POST'])]
    public function delete(Request $request, SocialMedia $scheduledPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scheduledPost->getIdEB(), $request->request->get('_token'))) {
            if ($scheduledPost->getImagemedia()) {
                $imagePath = $this->uploadsDirectory . '/' . $scheduledPost->getImagemedia();
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $this->entityManager->remove($scheduledPost);
            $this->entityManager->flush();

            $this->addFlash('success', 'Publication planifiée supprimée avec succès!');
        }

        return $this->redirectToRoute('admin_scheduled_posts_index');
    }
} 