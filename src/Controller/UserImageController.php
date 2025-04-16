<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UserImageController extends AbstractController
{
    #[Route('/user/image/{filename}', name: 'app_user_image')]
    public function serveImage(string $filename): Response
    {
        $imagesDir = $this->getParameter('user_images_directory');
        $filePath = $imagesDir . '/' . $filename;
        
        if (!file_exists($filePath)) {
            // If file doesn't exist, return default avatar
            $defaultImage = $imagesDir . '/default.png';
            if (file_exists($defaultImage)) {
                return new BinaryFileResponse($defaultImage);
            }
            
            // If even default image doesn't exist, throw 404
            throw new NotFoundHttpException('Image not found');
        }
        
        return new BinaryFileResponse($filePath);
    }
    
    #[Route('/user-image-examples', name: 'app_user_image_examples')]
    public function examples(): Response
    {
        return $this->render('user_image_example.html.twig');
    }
} 