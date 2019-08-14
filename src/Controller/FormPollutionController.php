<?php

namespace App\Controller;

use App\Entity\Pollution;
use App\Form\PollutionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pollution")
 */
class FormPollutionController extends AbstractController
{

    /**
     * @Route("/", name="pollution", methods={"GET"})
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
        return $this->render('Front/form/form_pollution.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/{id}", name="pollution_bilan", methods={"GET"})
     */
    public function show(Pollution $pollution): Response
    {
        return $this->render('Front/pollution/bilan.html.twig', [
            'pollution' => $pollution,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pollution_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pollution $pollution): Response
    {
        $form = $this->createForm(PollutionType::class, $pollution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pollution_index');
        }

        return $this->render('pollution/edit.html.twig', [
            'pollution' => $pollution,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pollution_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pollution $pollution): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pollution->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pollution);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pollution_index');
    }
}
