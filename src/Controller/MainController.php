<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
        ]);
    }

    #[Route("/news", name: 'news')]
    public function news(): Response 
    {
        return $this->render('main/news.html.twig', [
        ]);
        
    }

    #[Route("/theoryCraft", name: 'theoryCraft')]
    public function theoryCraft(): Response
    {
        return $this->render('main/theoryCraft.html.twig');
    }

    #[Route("/skins", name: 'skins')]
    public function skins(): Response
    {
        return $this->render('main/skins.html.twig');
    }

    #[Route("/codes", name: 'codes')]
    public function codes(): Response
    {
        return $this->render('main/codes.html.twig');
    }

    #[Route("/tierList", name: 'tierList')]
    public function tierList(): Response
    {
        return $this->render('main/tierList.html.twig');
    }
}


