<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\BonPlanRepository;
use App\Entity\BonPlan;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class VoyageursController extends AbstractController{


    #[Route('/dashboardVoyageursPage', name: 'dashboardVoyageurs_page')]
    public function dashboardVoyageursPage()
    {
        return $this->render('dashVoyageurs/dashboardVoyageursPage.html.twig');
    }

    #[Route('/UserVoyageursPage', name: 'userVoyageurs_page')]
    public function UserVoyageursPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/userPageVoyageurs.html.twig');
    }

    #[Route('/StationVoyageursPage', name: 'stationVoyageurs_page')]
    public function stationVoyageursPage()
    {
        return $this->render('dashVoyageurs/stationPageVoyageurs.html.twig');
    }

    #[Route('/BonplanVoyageursPage', name: 'bonplanVoyageurs_page')]
    public function bonplanVoyageursPage(BonPlanRepository $bonPlanRepository)
    {
        // Récupérer tous les bons plans
        $bonplans = $bonPlanRepository->findAll();
        
        // Passer les bons plans à la vue
        return $this->render('dashVoyageurs/bonplanPageVoyageurs.html.twig', [
            'bonplans' => $bonplans
        ]);
    }

    #[Route('/OffreVoyageursPage', name: 'offreVoyageurs_page')]
    public function offreVoyageursPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/offrePageVoyageurs.html.twig');
    }

    #[Route('/SocialVoyageursPage', name: 'socialVoyageurs_page')]
    public function socialVoyageursPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/socialPageVoyageurs.html.twig');
    }
    
    #[Route('/OffreForm', name: 'offre_form')]
    public function offreForm(): Response
    {
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
                // If no image provided, set a default image or return an error
                $bonPlan->setImageBP('default.jpg');
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
}

?>