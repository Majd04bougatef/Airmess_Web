<?php

namespace App\Controller;

use App\Repository\ExpenseRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class ExpenseDebugController extends AbstractController
{
    #[Route('/expense/debug', name: 'app_expense_debug')]
    public function debug(ExpenseRepository $expenseRepository, UserRepository $userRepository, SessionInterface $session): Response
    {
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        $debug = [
            'session_user_id' => $userId,
            'user_found' => $user ? 'Yes' : 'No'
        ];
        
        if ($user) {
            $debug['user_role'] = $user->getRoleUser();
            $debug['user_name'] = $user->getName();
            
            // Find expenses
            $expenses = $expenseRepository->findBy(['user' => $user]);
            $debug['expenses_count'] = count($expenses);
            $debug['expenses'] = [];
            
            foreach ($expenses as $expense) {
                $debug['expenses'][] = [
                    'id' => $expense->getIdE(),
                    'name' => $expense->getNameEx(),
                    'amount' => $expense->getAmount(),
                ];
            }
        }
        
        return $this->render('expense/debug.html.twig', [
            'debug' => $debug,
        ]);
    }
} 