<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BesoinController extends AbstractController
{
    #[Route('/besoin', name: 'app_besoin')]
    public function index(): Response
    {
        return $this->render('besoin/index.html.twig', [
            'controller_name' => 'BesoinController',
        ]);
    }
}
