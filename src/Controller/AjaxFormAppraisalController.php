<?php

namespace App\Controller;

use App\Entity\Pollution;
use App\Entity\Prospect;
use App\Form\PollutionType;
use App\Form\ProspectType;
use App\Repository\ProspectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxFormAppraisalController extends AbstractController
{

    /**
     * @Route("/createProspect")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $prospect = new Prospect();

        $form = $this->createForm(
            ProspectType::class,
            $prospect,
            [
                'action' => $this->generateUrl($request->get('_route'))]
        )->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($prospect);
                $this->getDoctrine()->getManager()->flush();
                return new Response('successProspect');
            } else {
                return new Response('errorProspect');
            }
        }
        return $this->render('Front/form/form_prospect.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/createPollution")
     * @param Request $request
     * @return Response
     */
    public function createPollution(Request $request, ProspectRepository $prospectRepository)
    {
        $pollution = new Pollution();

        $form = $this->createForm(
            PollutionType::class,
            $pollution,
            [
                'action' => $this->generateUrl($request->get('_route'))]
        )->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $pollution->setIdProspect($prospectRepository->findOneByLastInsert()->getId());
                $this->getDoctrine()->getManager()->persist($pollution);
                $this->getDoctrine()->getManager()->flush();
                return new Response('successPollution');
            } else {
                return new Response('errorPollution');
            }
        }
        return $this->render('Front/form/form_pollution.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
