<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Enum\OffreStatus;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

#[Route('/offres')]
final class OffreController extends AbstractController
{
    private $imageOffreDirectory = 'C:/xampp/htdocs/imageOffre';

    #[Route(name: 'app_offre_index', methods: ['GET'])]
    public function index(OffreRepository $offreRepository): Response
    {
        return $this->render('dashVoyageurs/offrePageVoyageurs.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_offre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre, [
            'is_edit' => false,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Gestion du téléchargement de l'image
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                
                // Vérifier si le répertoire existe, sinon le créer
                if (!file_exists($this->imageOffreDirectory)) {
                    mkdir($this->imageOffreDirectory, 0777, true);
                }
                
                // Déplacer le fichier vers le répertoire de destination
                try {
                    $imageFile->move(
                        $this->imageOffreDirectory,
                        $newFilename
                    );
                    
                    // Enregistrer le nom du fichier dans l'entité
                    $offre->setImagePath($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors du téléchargement de l\'image: ' . $e->getMessage());
                }
            }
            
            $entityManager->persist($offre);
            $entityManager->flush();

            $this->addFlash('success', 'Nouvelle offre créée avec succès.');

            return $this->redirectToRoute('offreEntreprise_page');
        }

        return $this->render('offre/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idO}', name: 'app_offre_show', methods: ['GET'])]
    public function show(Offre $offre): Response
    {
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);
    }

    #[Route('/{idO}/edit', name: 'app_offre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre $offre, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        // Création du formulaire en utilisant OffreType pour maintenir la cohérence
        $form = $this->createForm(OffreType::class, $offre, [
            'validation_groups' => ['edit'],
            'is_edit' => true,
        ]);
        
        // Gestion de la requête
        $form->handleRequest($request);

        // Vérifier si le formulaire est soumis
        if ($form->isSubmitted()) {
            // Afficher si le formulaire est valide
            if ($form->isValid()) {
                // Gestion du téléchargement de l'image
                $imageFile = $form->get('imageFile')->getData();
                
                if ($imageFile) {
                    $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                    
                    // Vérifier si le répertoire existe, sinon le créer
                    if (!file_exists($this->imageOffreDirectory)) {
                        mkdir($this->imageOffreDirectory, 0777, true);
                    }
                    
                    // Déplacer le fichier vers le répertoire de destination
                    try {
                        $imageFile->move(
                            $this->imageOffreDirectory,
                            $newFilename
                        );
                        
                        // Supprimer l'ancienne image si elle existe
                        $oldImage = $offre->getImagePath();
                        if ($oldImage && file_exists($this->imageOffreDirectory . '/' . $oldImage)) {
                            unlink($this->imageOffreDirectory . '/' . $oldImage);
                        }
                        
                        // Enregistrer le nouveau nom du fichier dans l'entité
                        $offre->setImagePath($newFilename);
                    } catch (FileException $e) {
                        $this->addFlash('error', 'Une erreur est survenue lors du téléchargement de l\'image: ' . $e->getMessage());
                    }
                }
                
                try {
                    // Debug des données avant sauvegarde
                    $this->addFlash('info', sprintf('Prix initial: %s, Prix après: %s', 
                        $offre->getPriceInit(), $offre->getPriceAfter()));
                    
                    // Enregistre les modifications dans la base de données
                    $entityManager->flush();
                    
                    // Ajoute un message de succès
                    $this->addFlash('success', 'Les modifications ont été enregistrées avec succès.');
                    
                    // Redirige vers la page offrePageEntreprise
                    return $this->redirectToRoute('offreEntreprise_page');
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Erreur lors de l\'enregistrement: ' . $e->getMessage());
                }
            } else {
                // Affiche les erreurs de validation du formulaire
                $errors = $form->getErrors(true);
                foreach ($errors as $error) {
                    $this->addFlash('error', 'Erreur de validation: ' . $error->getMessage());
                }
            }
        }

        return $this->render('offre/edit.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idO}/delete', name: 'app_offre_delete', methods: ['POST'])]
    public function delete(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $offre->getIdO(), $request->request->get('_token'))) {
            // Supprimer l'image associée si elle existe
            $imagePath = $offre->getImagePath();
            if ($imagePath && file_exists($this->imageOffreDirectory . '/' . $imagePath)) {
                unlink($this->imageOffreDirectory . '/' . $imagePath);
            }
            
            $entityManager->remove($offre);
            $entityManager->flush();

            $this->addFlash('success', 'Offre supprimée avec succès.');
        }

        return $this->redirectToRoute('offreEntreprise_page');
    }

    #[Route('/{idO}/confirm', name: 'app_offre_confirm', methods: ['POST'])]
    public function confirm(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('confirm' . $offre->getIdO(), $request->request->get('_token'))) {
            $offre->setStatusoff(OffreStatus::CONFIRME);
            $entityManager->flush();

            $this->addFlash('success', 'Offre confirmée avec succès.');
        }

        return $this->redirectToRoute('offreEntreprise_page');
    }

    #[Route('/{idO}/reject', name: 'app_offre_reject', methods: ['POST'])]
    public function reject(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('reject' . $offre->getIdO(), $request->request->get('_token'))) {
            $offre->setStatusoff(OffreStatus::REJETE);
            $entityManager->flush();

            $this->addFlash('success', 'Offre rejetée avec succès.');
        }

        return $this->redirectToRoute('offreEntreprise_page');
    }
}
