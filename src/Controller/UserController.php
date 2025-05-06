<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Repository\ExpenseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use TCPDF;

#[Route('/user')]
final class UserController extends AbstractController
{
    #[Route(name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/UserPage', name: 'user_expenses_page')]
    public function userExpensesPage(ExpenseRepository $expenseRepository, UserRepository $userRepository, SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // Error handling for missing user
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        // If admin, show all expenses, otherwise only user's expenses
        $expenses = ($user && ($user->getRoleUser() === 'Admin' || $user->getRoleUser() === 'ROLE_ADMIN')) 
            ? $expenseRepository->findAll() 
            : $expenseRepository->findBy(['user' => $user]);
        
        return $this->render('expense/index.html.twig', [
            'expenses' => $expenses,
            'in_voyageurs_dashboard' => false
        ]);
    }

    #[Route('/UserPage/export/{format}', name: 'user_export', methods: ['GET'])]
    public function exportUsers(UserRepository $userRepository, SessionInterface $session, string $format): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $currentUser = $userRepository->find($userId);
        
        // Error handling for missing user
        if (!$currentUser) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        // Only admins can export all users
        if (!($currentUser->getRoleUser() === 'Admin' || $currentUser->getRoleUser() === 'ROLE_ADMIN')) {
            $this->addFlash('error', 'Access denied. Only administrators can export user data.');
            return $this->redirectToRoute('user_expenses_page');
        }
        
        $users = $userRepository->findAll();
        
        if ($format === 'pdf') {
            return $this->exportUsersPDF($users);
        }
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nom');
        $sheet->setCellValue('C1', 'Prénom');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Téléphone');
        $sheet->setCellValue('F1', 'Rôle');
        $sheet->setCellValue('G1', 'Date de naissance');
        $sheet->setCellValue('H1', 'Statut');
        
        // Data
        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user->getIdU());
            $sheet->setCellValue('B' . $row, $user->getName());
            $sheet->setCellValue('C' . $row, $user->getPrenom());
            $sheet->setCellValue('D' . $row, $user->getEmail());
            $sheet->setCellValue('E' . $row, $user->getPhoneNumber());
            $sheet->setCellValue('F' . $row, $user->getRoleUser());
            
            $dateNaissance = $user->getDateNaiss();
            $dateFormatted = $dateNaissance ? $dateNaissance->format('Y-m-d') : '';
            $sheet->setCellValue('G' . $row, $dateFormatted);
            
            $sheet->setCellValue('H' . $row, $user->getStatut());
            $row++;
        }
        
        // Auto-dimension columns
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        
        $fileName = 'users_' . date('Y-m-d_H-i-s');
        
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
    
    private function exportUsersPDF(array $users): Response
    {
        // Create a new TCPDF instance
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Set document information
        $pdf->SetCreator('Airmess Admin');
        $pdf->SetAuthor('Airmess Admin');
        $pdf->SetTitle('Liste des Utilisateurs');
        
        // Remove default headers and footers
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        
        // Set margins (left, top, right)
        $pdf->SetMargins(15, 15, 15);
        
        // Set default font
        $pdf->SetFont('helvetica', '', 11);
        
        // Add a page
        $pdf->AddPage();
        
        // Title
        $pdf->SetFont('helvetica', 'B', 24);
        $pdf->SetTextColor(44, 62, 80); // Dark blue
        $pdf->Cell(0, 15, 'Liste des Utilisateurs', 0, 1, 'C');
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
        $colWidth1 = 15; // ID
        $colWidth2 = 35; // Nom
        $colWidth3 = 35; // Prénom
        $colWidth4 = 50; // Email
        $colWidth5 = 30; // Téléphone
        $colWidth6 = 30; // Rôle
        $colWidth7 = 30; // Date de naissance
        $colWidth8 = 25; // Statut
        
        $pdf->Cell($colWidth1, 10, 'ID', 1, 0, 'C', true);
        $pdf->Cell($colWidth2, 10, 'Nom', 1, 0, 'C', true);
        $pdf->Cell($colWidth3, 10, 'Prénom', 1, 0, 'C', true);
        $pdf->Cell($colWidth4, 10, 'Email', 1, 0, 'C', true);
        $pdf->Cell($colWidth5, 10, 'Téléphone', 1, 0, 'C', true);
        $pdf->Cell($colWidth6, 10, 'Rôle', 1, 0, 'C', true);
        $pdf->Cell($colWidth7, 10, 'Date de naissance', 1, 0, 'C', true);
        $pdf->Cell($colWidth8, 10, 'Statut', 1, 1, 'C', true);
        
        // Data
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(44, 62, 80); // Dark blue for text
        
        // Alternating row colors
        $fillColors = [
            [247, 249, 249], // Very light gray
            [255, 255, 255]  // White
        ];
        
        $row = 0;
        foreach ($users as $user) {
            // Automatic row height
            $rowColor = $fillColors[$row % 2];
            $pdf->SetFillColor($rowColor[0], $rowColor[1], $rowColor[2]);
            
            // Set fixed cell height
            $height = 8;
            
            // Current position
            $startY = $pdf->GetY();
            $currentX = $pdf->GetX();
            
            // Format date
            $dateNaissance = $user->getDateNaiss();
            $dateFormatted = $dateNaissance ? $dateNaissance->format('Y-m-d') : '';
            
            // ID
            $pdf->MultiCell($colWidth1, $height, $user->getIdU(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth1;
            
            // Nom
            $pdf->MultiCell($colWidth2, $height, $user->getName(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth2;
            
            // Prénom
            $pdf->MultiCell($colWidth3, $height, $user->getPrenom(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth3;
            
            // Email
            $pdf->MultiCell($colWidth4, $height, $user->getEmail(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth4;
            
            // Téléphone
            $pdf->MultiCell($colWidth5, $height, $user->getPhoneNumber(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth5;
            
            // Rôle
            $pdf->MultiCell($colWidth6, $height, $user->getRoleUser(), 1, 'L', true, 0, $currentX);
            $currentX += $colWidth6;
            
            // Date de naissance
            $pdf->MultiCell($colWidth7, $height, $dateFormatted, 1, 'L', true, 0, $currentX);
            $currentX += $colWidth7;
            
            // Statut
            $pdf->MultiCell($colWidth8, $height, $user->getStatut(), 1, 'L', true, 1, $currentX);
            
            $row++;
            
            // Check if we need a new page
            if ($pdf->GetY() > $pdf->getPageHeight() - 20) {
                $pdf->AddPage();
                
                // Repeat headers
                $pdf->SetFont('helvetica', 'B', 11);
                $pdf->SetFillColor(52, 73, 94);
                $pdf->SetTextColor(255, 255, 255);
                $pdf->Cell($colWidth1, 10, 'ID', 1, 0, 'C', true);
                $pdf->Cell($colWidth2, 10, 'Nom', 1, 0, 'C', true);
                $pdf->Cell($colWidth3, 10, 'Prénom', 1, 0, 'C', true);
                $pdf->Cell($colWidth4, 10, 'Email', 1, 0, 'C', true);
                $pdf->Cell($colWidth5, 10, 'Téléphone', 1, 0, 'C', true);
                $pdf->Cell($colWidth6, 10, 'Rôle', 1, 0, 'C', true);
                $pdf->Cell($colWidth7, 10, 'Date de naissance', 1, 0, 'C', true);
                $pdf->Cell($colWidth8, 10, 'Statut', 1, 1, 'C', true);
                
                $pdf->SetFont('helvetica', '', 10);
                $pdf->SetTextColor(44, 62, 80);
            }
        }
        
        // Add total count at bottom of page
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->SetTextColor(127, 140, 141);
        $pdf->Cell(0, 10, 'Total : ' . count($users) . ' utilisateur(s)', 0, 1, 'R');
        
        // Generate PDF output
        $pdfContent = $pdf->Output('users_' . date('Y-m-d_H-i-s') . '.pdf', 'S');
        
        // Create response
        $response = new Response(
            $pdfContent,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="users_' . date('Y-m-d_H-i-s') . '.pdf"'
            ]
        );
        
        return $response;
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id_U}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id_U}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id_U}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getIdU(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
