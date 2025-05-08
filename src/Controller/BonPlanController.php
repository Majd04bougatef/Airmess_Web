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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Symfony\Component\HttpFoundation\StreamedResponse;
use TCPDF;


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

    #[Route('/admin/export/{format}', name: 'admin_bonplan_export', methods: ['GET'])]
    public function export(BonPlanRepository $bonPlanRepository, string $format): Response
    {
        $bonPlans = $bonPlanRepository->findAll();
        
        if ($format === 'pdf') {
            return $this->exportPDF($bonPlans);
        }
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // En-têtes
        $sheet->setCellValue('A1', 'Nom du lieu');
        $sheet->setCellValue('B1', 'Localisation');
        $sheet->setCellValue('C1', 'Description');
        $sheet->setCellValue('D1', 'Type de lieu');
        $sheet->setCellValue('E1', 'Image');
        
        // Données
        $row = 2;
        foreach ($bonPlans as $bonPlan) {
            $sheet->setCellValue('A' . $row, $bonPlan->getNomplace());
            $sheet->setCellValue('B' . $row, $bonPlan->getLocalisation());
            $sheet->setCellValue('C' . $row, $bonPlan->getDescription());
            $sheet->setCellValue('D' . $row, $bonPlan->getTypePlace());
            $sheet->setCellValue('E' . $row, $bonPlan->getImageBP());
            $row++;
        }
        
        // Auto-dimensionnement des colonnes
        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        
        $fileName = 'bons_plans_' . date('Y-m-d_H-i-s');
        
        if ($format === 'csv') {
            $writer = new Csv($spreadsheet);
            $fileName .= '.csv';
            $contentType = 'text/csv';
        } else {
            $writer = new Xlsx($spreadsheet);
            $fileName .= '.xlsx';
            $contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        }
        
        $tempFile = tempnam(sys_get_temp_dir(), 'export_');
        $writer->save($tempFile);
        
        $response = new Response(file_get_contents($tempFile));
        unlink($tempFile); // Remove temp file
        
        $response->headers->set('Content-Type', $contentType);
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');
        
        return $response;
    }
    
    private function exportPDF(array $bonPlans): Response
    {
        // Create a new TCPDF instance
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Set document information
        $pdf->SetCreator('Airmess Admin');
        $pdf->SetAuthor('Airmess Admin');
        $pdf->SetTitle('Liste des Bons Plans');
        
        // Remove default headers and footers
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        
        // Set margins (left, top, right)
        $pdf->SetMargins(15, 15, 15);
        
        // Set default font
        $pdf->SetFont('helvetica', '', 11);
        
        // Add a page
        $pdf->AddPage();
        
        // Logo and title
        $pdf->SetFont('helvetica', 'B', 24);
        $pdf->SetTextColor(44, 62, 80); // Dark blue
        $pdf->Cell(0, 15, 'Liste des Bons Plans', 0, 1, 'C');
        $pdf->Ln(10);
        
        // Export date
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(127, 140, 141); // Gray
        $pdf->Cell(0, 10, 'Exporté le ' . date('d/m/Y à H:i'), 0, 1, 'R');
        $pdf->Ln(5);
        
        // Column headers with optimized widths
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->SetFillColor(52, 73, 94); // Dark blue-gray
        $pdf->SetTextColor(255, 255, 255); // White
        
        // Define column widths
        $colWidth1 = 60; // Name of place
        $colWidth2 = 70; // Location
        $colWidth3 = 100; // Description
        $colWidth4 = 35; // Type
        
        $pdf->Cell($colWidth1, 10, 'Nom du lieu', 1, 0, 'C', true);
        $pdf->Cell($colWidth2, 10, 'Localisation', 1, 0, 'C', true);
        $pdf->Cell($colWidth3, 10, 'Description', 1, 0, 'C', true);
        $pdf->Cell($colWidth4, 10, 'Type', 1, 1, 'C', true);
        
        // Data
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(44, 62, 80); // Dark blue for text
        
        // Alternating row colors
        $fillColors = [
            [247, 249, 249], // Very light gray
            [255, 255, 255]  // White
        ];
        
        $row = 0;
        foreach ($bonPlans as $bonPlan) {
            // Automatic row height
            $rowColor = $fillColors[$row % 2];
            $pdf->SetFillColor($rowColor[0], $rowColor[1], $rowColor[2]);
            
            // Truncate description if too long
            $description = $bonPlan->getDescription();
            if (strlen($description) > 100) {
                $description = substr($description, 0, 97) . '...';
            }
            
            // Calculate necessary height for text (simplified version)
            $height = 8; // Minimum height
            
            // Current position
            $startY = $pdf->GetY();
            $currentX = $pdf->GetX();
            
            // Name of place
            $pdf->MultiCell($colWidth1, $height, $bonPlan->getNomplace(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth1;
            
            // Location
            $pdf->MultiCell($colWidth2, $height, $bonPlan->getLocalisation(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth2;
            
            // Description
            $pdf->MultiCell($colWidth3, $height, $description, 1, 'L', true, 0, $currentX);
            $currentX += $colWidth3;
            
            // Type
            $pdf->MultiCell($colWidth4, $height, $bonPlan->getTypePlace(), 1, 'L', true, 1, $currentX);
            
            $row++;
            
            // Check if we need a new page
            if ($pdf->GetY() > $pdf->getPageHeight() - 20) {
                $pdf->AddPage();
                
                // Repeat headers
                $pdf->SetFont('helvetica', 'B', 11);
                $pdf->SetFillColor(52, 73, 94);
                $pdf->SetTextColor(255, 255, 255);
                $pdf->Cell($colWidth1, 10, 'Nom du lieu', 1, 0, 'C', true);
                $pdf->Cell($colWidth2, 10, 'Localisation', 1, 0, 'C', true);
                $pdf->Cell($colWidth3, 10, 'Description', 1, 0, 'C', true);
                $pdf->Cell($colWidth4, 10, 'Type', 1, 1, 'C', true);
                
                $pdf->SetFont('helvetica', '', 10);
                $pdf->SetTextColor(44, 62, 80);
            }
        }
        
        // Add total count at bottom of page
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->SetTextColor(127, 140, 141);
        $pdf->Cell(0, 10, 'Total : ' . count($bonPlans) . ' bon(s) plan(s)', 0, 1, 'R');
        
        // Generate PDF output
        $pdfContent = $pdf->Output('bons_plans_' . date('Y-m-d_H-i-s') . '.pdf', 'S');
        
        // Create response
        $response = new Response(
            $pdfContent,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="bons_plans_' . date('Y-m-d_H-i-s') . '.pdf"'
            ]
        );
        
        return $response;
    }
    
    #[Route('/admin/import', name: 'admin_bonplan_import', methods: ['POST'])]
    public function import(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        try {
            $file = $request->files->get('file');
            
            if (!$file) {
                throw new \Exception('Aucun fichier n\'a été uploadé');
            }
            
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, ['csv', 'xlsx', 'xls'])) {
                throw new \Exception('Format de fichier non supporté');
            }
            
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            
            // Supprimer l'en-tête
            array_shift($rows);
            
            $imported = 0;
            $errors = [];
            
            foreach ($rows as $row) {
                try {
                    if (empty($row[0])) continue; // Ignorer les lignes vides
                    
                    $bonPlan = new BonPlan();
                    $bonPlan->setNomplace($row[0]);
                    $bonPlan->setLocalisation($row[1]);
                    $bonPlan->setDescription($row[2]);
                    $bonPlan->setTypePlace($row[3]);
                    
                    // Gérer l'image si elle existe
                    if (!empty($row[4])) {
                        $bonPlan->setImageBP($row[4]);
                    }
                    
                    $entityManager->persist($bonPlan);
                    $imported++;
                } catch (\Exception $e) {
                    $errors[] = "Erreur ligne " . ($imported + 2) . ": " . $e->getMessage();
                }
            }
            
            $entityManager->flush();
            
            $this->addFlash('success', $imported . ' bons plans ont été importés avec succès.');
            if (!empty($errors)) {
                $this->addFlash('warning', 'Certaines lignes n\'ont pas pu être importées : ' . implode(', ', $errors));
            }
            
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de l\'import : ' . $e->getMessage());
        }
        
        return $this->redirectToRoute('bonplan_page');
    }
}