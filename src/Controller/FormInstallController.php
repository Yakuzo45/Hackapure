<?php

namespace App\Controller;

use App\Form\InstallFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Install;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FormInstallController extends AbstractController
{
    /**
     * @Route("/form/install", name="form_install", methods={"GET", "POST"})
     */
    public function newInstall(Request $request) : Response
    {
        $install = new Install();
        $form = $this->createForm(InstallFormType::class, $install);
        $form->handleRequest($request);
dd($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($install);
            $entityManager->flush();
        }

        return $this->render('Front/form_install/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }



}
