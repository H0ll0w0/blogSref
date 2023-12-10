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
            'controller_name' => 'Miguel',
        ]);
    }

    #[Route("/news", name: 'news')]
    public function news(): Response 
    {
        return $this->render('main/news.html.twig', [
        ]);
        
    }

    // #[Route("/logIn", name: 'logIn')]
    // public function logIn(): Response 
    // {
    //     return $this->render('main/logIn.html.twig', [
    //     ]);
        
    // }

    #[Route("/signUp", name: 'signUp')]
    public function signUp(): Response 
    {
        return $this->render('main/signUp.html.twig', [
        ]);
        
    }

    #[Route("/guides", name: 'guides')]
    public function guides(): Response 
    {
        $guides = ["Ashura new monster", "F2P team for DB12", "How to choose which runes to keep"];

        return $this->render('main/guides.html.twig', array(
            'guides' => $guides
        ));
        
    }

    #[Route("/test", name: 'test')]
    public function test(): Response
    {
        return $this->render('base.html.twig');
    }
}


