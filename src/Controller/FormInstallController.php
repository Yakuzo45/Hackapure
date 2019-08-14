<?php

namespace App\Controller;

use App\Entity\AfterMeter;
use App\Form\InstallFormType;
use App\Repository\ProspectRepository;
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
    public function new(Request $request, ProspectRepository $prospectRepository) : Response
    {
        $install = new Install();
        $form = $this->createForm(InstallFormType::class, $install);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sink = $install->getSink();
            $shower = $install->getShower();
            $privy = $install->getPrivy();
            $sink['__name__']->setInstall($install);
            $shower['__name__']->setInstall($install);
            $privy['__name__']->setInstall($install);
            $prospect = $prospectRepository->findOneByLastInsert();
            $install->setProspect($prospect);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($install);
            $entityManager->flush();
        }

        return $this->render('Front/form_install/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function setAfterMeter($data)
    {
        $em = $this->getDoctrine()->getManager();

        $newAfterMeter = new AfterMeter();
        $newAfterMeter->setAccuracy($data->getAccuracy());
        $newAfterMeter->setDiameter($data->getDiameter());
        $newAfterMeter->setMaterial($data->getMaterial());
        $newAfterMeter->setScrewthread($data->getScrewthread());
        $newAfterMeter->setThread($data->getThread());

        $em->persist($newAfterMeter);
        $em->flush();

        return $newAfterMeter;
    }
}
