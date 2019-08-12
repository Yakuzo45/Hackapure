<?php

namespace App\Controller;

use App\Entity\Prospect;
use App\Form\ProspectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxFormAppraisalController extends AbstractController
{

    /**
     * @Route("/createProspect", name="article_create", condition="request.isXmlHttpRequest()")
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
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($prospect);
            $this->getDoctrine()->getManager()->flush();
            return new Response('success');
        }

        return $this->render('form_prospect/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
//    /**
//     * @Route("/ajax/form/appraisal", name="ajax_form_appraisal", condition="request.isXmlHttpRequest")
//     */
//    public function submitProspect($request)
//    {
//        $prospect = new Prospect();
//        return $this->render('form_prospect/index.html.twig');
//    }
//}
////        $form = $this->createForm(ProspectType::class, $prospect);
////        $form->handleRequest($request);
////
////        if ($form->isSubmitted() && $form->isValid()) {
////            $entityManager = $this->getDoctrine()->getManager();
////            $entityManager->persist($prospect);
////            $entityManager->flush();
////            $this->addFlash('success', 'étape 1/4 terminée');
////            return new Response('success');
////        }
//        return $this->render('form_prospect/index.html.twig');
////            [
////            'form' => $form->createView(),
////        ]);
//    }
//}
