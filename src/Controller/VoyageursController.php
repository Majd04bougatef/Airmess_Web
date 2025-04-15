<?php

namespace App\Controller;

use App\Service\AuthService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\BonPlanRepository;
use App\Entity\BonPlan;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class VoyageursController extends AuthenticatedController
{
    public function __construct(AuthService $authService)
    {
        parent::__construct($authService);
    }

    #[Route('/dashboardVoyageursPage', name: 'dashboardVoyageurs_page')]
    public function dashboardVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Check if user has the right role
        if (!$this->hasRole('Voyageurs')) {
            // Redirect to appropriate dashboard based on role
            $userRole = $this->authService->getUserRole();
            if ($userRole === 'Admin') {
                return $this->redirectToRoute('app_dash');
            } elseif ($userRole === 'Entreprise') {
                return $this->redirectToRoute('app_dashEntreprise');
            }
        }
        
        return $this->render('dashVoyageurs/dashboardVoyageursPage.html.twig');
    }

    #[Route('/UserVoyageursPage', name: 'userVoyageurs_page')]
    public function UserVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/userPageVoyageurs.html.twig');
    }

    #[Route('/StationVoyageursPage', name: 'stationVoyageurs_page')]
    public function stationVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        return $this->render('dashVoyageurs/stationPageVoyageurs.html.twig');
    }

    #[Route('/BonplanVoyageursPage', name: 'bonplanVoyageurs_page')]

    public function bonplanVoyageursPage(BonPlanRepository $bonPlanRepository, EntityManagerInterface $entityManager)
    {
        // Récupérer tous les bons plans
        $bonplans = $bonPlanRepository->findAll();
        
        // Récupérer les notes moyennes pour chaque bon plan
        $ratings = [];
        $reviewsCount = [];
        
        foreach ($bonplans as $bonplan) {
            // Requête pour calculer la note moyenne
            $averageRating = $entityManager->createQuery(
                'SELECT AVG(r.rating) as average
                FROM App\Entity\ReviewBonPlan r
                WHERE r.bonPlan = :bonplanId'
            )
            ->setParameter('bonplanId', $bonplan->getIdP())
            ->getSingleScalarResult();
            
            // Requête pour compter le nombre d'avis
            $count = $entityManager->createQuery(
                'SELECT COUNT(r.idR) as count
                FROM App\Entity\ReviewBonPlan r
                WHERE r.bonPlan = :bonplanId'
            )
            ->setParameter('bonplanId', $bonplan->getIdP())
            ->getSingleScalarResult();
            
            // Stocker les résultats
            $ratings[$bonplan->getIdP()] = $averageRating ? round($averageRating, 1) : 0;
            $reviewsCount[$bonplan->getIdP()] = $count;
        }
        
        // Passer les bons plans et les notes moyennes à la vue
        return $this->render('dashVoyageurs/bonplanPageVoyageurs.html.twig', [
            'bonplans' => $bonplans,
            'ratings' => $ratings,
            'reviewsCount' => $reviewsCount
        ]);

    }

    #[Route('/OffreVoyageursPage', name: 'offreVoyageurs_page')]
    public function offreVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/offrePageVoyageurs.html.twig');
    }

    #[Route('/SocialVoyageursPage', name: 'socialVoyageurs_page')]
    public function socialVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/socialPageVoyageurs.html.twig');
    }
    
    #[Route('/OffreForm', name: 'offre_form')]
    public function offreForm(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        return $this->render('dashVoyageurs/offreForm.html.twig');
    }

    #[Route('/BonplanForm', name: 'bonplan_form')]
    public function bonplanForm(): Response
    {
        return $this->render('dashVoyageurs/bonplanForm.html.twig');
    }

    #[Route('/BonplanAdd', name: 'bonplan_add', methods: ['POST'])]
    public function bonplanAdd(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        try {
            // Create a new BonPlan entity
            $bonPlan = new BonPlan();
            
            // Set data from form
            $bonPlan->setNomplace($request->request->get('nomplace'));
            $bonPlan->setLocalisation($request->request->get('localisation'));
            $bonPlan->setDescription($request->request->get('description'));
            $bonPlan->setTypePlace($request->request->get('typePlace'));
            
            // Set default user ID (you might want to get this from the session in a real app)
            $bonPlan->setIdU(1);
            
            // Debug uploads directory
            $uploadsDir = $this->getParameter('uploads_directory');
            if (!file_exists($uploadsDir)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Erreur: Le répertoire d\'uploads n\'existe pas: ' . $uploadsDir
                ], 500);
            }
            
            // Handle image upload
            $imageFile = $request->files->get('imageBP');
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                
                // Move the file to the uploads directory
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'), 
                        $newFilename
                    );
                } catch (FileException $e) {
                    return $this->json([
                        'success' => false,
                        'message' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()
                    ], 500);
                }
                
                $bonPlan->setImageBP($newFilename);
            } else {
                // If no image provided, use an existing image or set a placeholder
                $bonPlan->setImageBP('espagne-67f714bee028d.jpg');
            }
            
            // Save to database
            $entityManager->persist($bonPlan);
            $entityManager->flush();
            
            // Return JSON response for AJAX handling
            return $this->json([
                'success' => true,
                'message' => 'Bon plan ajouté avec succès',
                'id' => $bonPlan->getId()
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Une erreur est survenue: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/debug-bonplan', name: 'debug_bonplan')]
    public function debugBonplan(EntityManagerInterface $entityManager): Response
    {
        try {
            // Get the database connection
            $conn = $entityManager->getConnection();
            
            // Get table structure
            $sql = "DESCRIBE bonplan";
            $stmt = $conn->prepare($sql);
            $result = $stmt->executeQuery();
            $columns = $result->fetchAllAssociative();
            
            // Get some data
            $sql = "SELECT * FROM bonplan LIMIT 1";
            $stmt = $conn->prepare($sql);
            $result = $stmt->executeQuery();
            $data = $result->fetchAllAssociative();
            
            return $this->json([
                'columns' => $columns,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    #[Route('/BonplanEdit/{idP}', name: 'bonplan_edit_form')]
    public function bonplanEditForm(BonPlan $bonPlan): Response
    {
        return $this->render('dashVoyageurs/bonplanEditForm.html.twig', [
            'bonplan' => $bonPlan
        ]);
    }

    #[Route('/BonplanUpdate/{idP}', name: 'bonplan_update', methods: ['POST'])]
    public function bonplanUpdate(Request $request, BonPlan $bonPlan, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        try {
            // Update data from form
            $bonPlan->setNomplace($request->request->get('nomplace'));
            $bonPlan->setLocalisation($request->request->get('localisation'));
            $bonPlan->setDescription($request->request->get('description'));
            $bonPlan->setTypePlace($request->request->get('typePlace'));
            
            // Handle image upload
            $imageFile = $request->files->get('imageBP');
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                
                // Move the file to the uploads directory
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'), 
                        $newFilename
                    );
                    
                    // Delete old image if it's not the default
                    $oldImage = $bonPlan->getImageBP();
                    if ($oldImage && $oldImage != 'default.jpg') {
                        $oldImagePath = $this->getParameter('uploads_directory') . $oldImage;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                    
                    $bonPlan->setImageBP($newFilename);
                } catch (FileException $e) {
                    return $this->json([
                        'success' => false,
                        'message' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()
                    ], 500);
                }
            }
            
            // Save to database
            $entityManager->flush();
            
            // Return JSON response for AJAX handling
            return $this->json([
                'success' => true,
                'message' => 'Bon plan modifié avec succès'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Une erreur est survenue: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/BonplanDelete/{idP}', name: 'bonplan_delete', methods: ['POST'])]
    public function bonplanDelete(BonPlan $bonPlan, EntityManagerInterface $entityManager): Response
    {
        try {
            // Delete image if it's not the default
            $image = $bonPlan->getImageBP();
            if ($image && $image != 'default.jpg') {
                $imagePath = $this->getParameter('uploads_directory') . $image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            // Delete from database
            $entityManager->remove($bonPlan);
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'message' => 'Bon plan supprimé avec succès'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Une erreur est survenue: ' . $e->getMessage()
            ], 500);
        }
    }
}

?>