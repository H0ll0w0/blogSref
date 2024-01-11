<?php

namespace App\Controller;

use App\Entity\Guide;
use App\Form\Guide1Type;
use App\Repository\GuideRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/guide')]
class GuideController extends AbstractController
{
    #[Route('/', name: 'app_guide_index', methods: ['GET'])]
    public function index(GuideRepository $guideRepository): Response
    {
        return $this->render('guide/index.html.twig', [
            'guides' => $guideRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_guide_show', methods: ['GET'])]
    public function show(Guide $guide): Response
    {
        $comments = $guide->getComments();
        return $this->render('guide/show.html.twig', [
            'guide' => $guide,
            'comments' => $comments
        ]);
    }
}
