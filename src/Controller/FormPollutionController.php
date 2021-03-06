<?php

namespace App\Controller;

use App\Entity\Pollution;
use App\Form\PollutionType;
use App\Repository\PollutionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FormPollutionController extends AbstractController
{

    /**
     * @Route("/pollution", name="pollution", methods={"GET"})
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
            return $this->redirectToRoute('pollution_bilan');
        }
        return $this->render('Front/form/form_pollution.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/bilan", name="pollution_bilan", methods={"GET"})
     */
    public function show(PollutionRepository $pollutionRepository): Response
    {
        $pollution = $pollutionRepository->findOneByLastInsert();
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
        if ($this->isCsrfTokenValid('delete' . $pollution->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pollution);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pollution_index');
    }
}
