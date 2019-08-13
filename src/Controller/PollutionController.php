<?php

namespace App\Controller;

use App\Entity\Pollution;
use App\Form\PollutionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PollutionController extends AbstractController
{

    /**
     * @Route("/pollution", name="pollution")
     */
    public function new(Request $request): Response
    {
        $pollution = new Pollution();
        $form = $this->createForm(PollutionType::class, $pollution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pollution);
            $entityManager->flush();
            $this->addFlash('success', 'étape 4/4 terminée');
            return $this->redirectToRoute('pollution');
        }
        return $this->render('Front/pollution/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
