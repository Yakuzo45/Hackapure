<?php

namespace App\Controller;

use App\Entity\Prospect;
use App\Form\ProspectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormProspectController extends AbstractController
{
    /**
     *
     */
    public function new(Request $request): Response
    {
        $prospect = new Prospect();
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prospect);
            $entityManager->flush();
            $this->addFlash('success', 'étape 1/4 terminée');
            return $this->redirectToRoute('form_user');
        }
        return $this->render('form_prospect/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
