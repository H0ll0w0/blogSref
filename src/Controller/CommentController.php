<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Guide;
use App\Form\Comment1Type;
use App\Repository\CommentRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('guide/{id}/comment')]
class CommentController extends AbstractController
{
    #[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Guide $guide, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        $comment->setCreatedAt(new DateTimeImmutable());
        $comment->setUser($this->getUser());
        $comment->setGuide($guide);
        $form = $this->createForm(Comment1Type::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_guide_show', [
                'id' => $guide->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'app_comment_delete', methods: ['POST'])]
    // public function delete(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
    //         $entityManager->remove($comment);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_comment_index', [], Response::HTTP_SEE_OTHER);
    // }
}
