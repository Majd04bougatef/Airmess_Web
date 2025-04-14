<?php

namespace App\Controller;

use App\Entity\BonPlan;
use App\Form\BonPlanType;
use App\Repository\BonPlanRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;


#[Route('/bon/plan')]
final class BonPlanController extends AbstractController
{
    #[Route(name: 'app_bonplan_index', methods: ['GET'])]
    public function index(BonPlanRepository $bonPlanRepository): Response
    {
        return $this->render('bonplan/index.html.twig', [
            'bonplans' => $bonPlanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bonplan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $bonPlan = new BonPlan();
        $form = $this->createForm(BonPlanType::class, $bonPlan);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
    
            $imageFile = $form->get('imageBP')->getData();
    
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
    
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'), // défini dans services.yaml
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors de l\'upload de l\'image.');
                    return $this->redirectToRoute('app_bonplan_new');
                }
    
                $bonPlan->setImageBP($newFilename); // Assure-toi que l'entité a bien ce setter
            } else {
                $this->addFlash('error', 'L\'image est requise.');
                return $this->redirectToRoute('app_bonplan_new');
            }
    
            $entityManager->persist($bonPlan);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_bonplan_index');
        }
    
        return $this->render('bonplan/new.html.twig', [
            'form' => $form,
            'bonplan' => $bonPlan,
        ]);
    }
    

    #[Route('/{idP}', name: 'app_bonplan_show', methods: ['GET'])]
    public function show(BonPlan $bonPlan): Response
    {
        return $this->render('bonplan/show.html.twig', [
            'bonplan' => $bonPlan,
        ]);
    }

    #[Route('/{idP}/edit', name: 'app_bonplan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BonPlan $bonPlan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BonPlanType::class, $bonPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bonplan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bonplan/edit.html.twig', [
            'bonplan' => $bonPlan,
            'form' => $form,
        ]);
    }

    #[Route('/{idP}', name: 'app_bonplan_delete', methods: ['POST'])]
    public function delete(Request $request, BonPlan $bonPlan, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bonPlan->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($bonPlan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bonplan_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/api/add', name: 'api_bonplan_add', methods: ['POST'])]
    public function apiAdd(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        try {
            // Récupérer les données du formulaire
            $nomplace = $request->request->get('nomplace');
            $typePlace = $request->request->get('typePlace');
            $description = $request->request->get('description');
            $id_U = $request->request->get('id_U');
            $localisation = $request->request->get('localisation');
            
            // Vérification des données obligatoires
            if (!$nomplace || !$typePlace || !$description || !$id_U || !$localisation) {
                return $this->json(['success' => false, 'message' => 'Tous les champs obligatoires doivent être remplis'], 400);
            }
            
            // Traiter la localisation (format: "latitude,longitude")
            $coordonnees = explode(',', $localisation);
            if (count($coordonnees) !== 2) {
                return $this->json(['success' => false, 'message' => 'Format de localisation invalide'], 400);
            }
            
            $latitude = floatval(trim($coordonnees[0]));
            $longitude = floatval(trim($coordonnees[1]));
            
            // Traiter l'image
            $imageFile = $request->files->get('image');
            if (!$imageFile) {
                error_log("Aucun fichier d'image n'a été reçu. Files: " . print_r($request->files->all(), true));
                return $this->json(['success' => false, 'message' => 'L\'image est obligatoire'], 400);
            }
            
            error_log("Fichier reçu: " . $imageFile->getClientOriginalName() . ", taille: " . $imageFile->getSize() . " octets, type: " . $imageFile->getMimeType());
            
            // Créer un nom de fichier unique
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
            
            // S'assurer que le répertoire d'uploads existe
            $uploadsDirectory = $this->getParameter('bonplan_uploads_directory');
            if (!file_exists($uploadsDirectory)) {
                mkdir($uploadsDirectory, 0777, true);
            }
            
            // Déplacer le fichier dans le répertoire des uploads
            try {
                $imageFile->move(
                    $uploadsDirectory,
                    $newFilename
                );
                
                // Log du succès (pour débogage)
                error_log("Image téléchargée avec succès: " . $newFilename . " dans " . $uploadsDirectory);
            } catch (FileException $e) {
                // Log détaillé de l'erreur
                error_log("Erreur lors de l'upload de l'image: " . $e->getMessage() . " - Trace: " . $e->getTraceAsString());
                
                return $this->json([
                    'success' => false, 
                    'message' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage(),
                    'directory' => $uploadsDirectory
                ], 500);
            }
            
            // Créer et enregistrer le bon plan
            $bonPlan = new BonPlan();
            $bonPlan->setNomplace($nomplace);
            $bonPlan->setTypePlace($typePlace);
            $bonPlan->setDescription($description);
            $bonPlan->setIdU(intval($id_U));
            $bonPlan->setLocalisation($localisation);
            $bonPlan->setLatitude($latitude);
            $bonPlan->setLongitude($longitude);
            $bonPlan->setImageBP($newFilename);
            
            $entityManager->persist($bonPlan);
            $entityManager->flush();
            
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
}