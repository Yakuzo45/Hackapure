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

    public function new(Request $request): Response
    {
        $prospect = new Prospect();
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prospect);
            $entityManager->flush();
            return $this->redirectToRoute('form_user');
        }
        return $this->render('Front/form/form_prospect.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    public function edit(Prospect $prospect, Request $request): Response
    {
        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prospect);
            $entityManager->flush();
            return $this->redirectToRoute('form_edit');
        }
        return $this->render('Front/form/form_prospect.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
