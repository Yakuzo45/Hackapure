<?php

namespace App\Controller;

use App\Entity\AfterMeter;
use App\Entity\Consumption;
use App\Entity\Install;
use App\Entity\Pollution;
use App\Entity\Prospect;
use App\Form\ConsumptionType;
use App\Form\InstallFormType;
use App\Form\PollutionType;
use App\Form\ProspectType;
use App\Repository\ProspectRepository;
use Exception;
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
    public function createProspect(Request $request)
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

                try {
                    $this->getDoctrine()->getManager()->flush();
                } catch (Exception $e) {
                    return new Response('errorProspect');
                }

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
     * @param ProspectRepository $prospectRepository
     * @return Response
     */
    public function createPollution(Request $request, ProspectRepository $prospectRepository)
    {
        $pollution = new Pollution();
        try {
            $form = $this->createForm(
                PollutionType::class,
                $pollution)
                ->handleRequest($request);
        } catch (Exception $e) {
            return new Response('errorPollution');
        }

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $pollution->setIdProspect($prospectRepository->findOneByLastInsert()->getId());
                $this->getDoctrine()->getManager()->persist($pollution);
                try {
                    $this->getDoctrine()->getManager()->flush();
                } catch (Exception $e) {
                    return new Response('errorPollution');
                }
                return new Response('successPollution');
            } else {
                return new Response('errorPollution');
            }

        }
        return $this->render('Front/form/form_pollution.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/createInstall")
     */
    public function createInstall(Request $request, ProspectRepository $prospectRepository): Response
    {
        $install = new Install();
        $form = $this->createForm(InstallFormType::class, $install);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
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
                try {
                    $entityManager->flush();
                } catch (Exception $e) {
                    return new Response('errorInstall');
                }
                return new Response('successInstall');
            } else {
                return new Response('errorInstall');
            }
        }
        return $this->render('Front/form/form_install.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/createConsumption")
     */
    public function newConsumption(Request $request, ProspectRepository $prospectRepository): Response
    {
        $consumption = new Consumption();
        $form = $this->createForm(ConsumptionType::class, $consumption);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $waterHeater = $consumption->getWaterHeater();
                $waterHeater['__name__']->setConsumption($consumption);

                $stillWaterBottle = $consumption->getStillWaterBottle();
                $stillWaterBottle['__name__']->setConsumption($consumption);

                $sparkWaterBottle = $consumption->getSparkWaterBottle();
                $sparkWaterBottle['__name__']->setConsumption($consumption);

                $heater = $consumption->getHeater();
                $heater['__name__']->setConsumption($consumption);

                $homeAppliance = $consumption->getHomeAppliance();
                $homeAppliance['__name__']->setConsumption($consumption);

                $entityManager = $this->getDoctrine()->getManager();
                $prospect = $prospectRepository->findOneByLastInsert();
                $consumption->setUser($prospect);
                $entityManager->persist($consumption);
                try {
                    $entityManager->flush();
                } catch (Exception $e) {
                    return new Response('errorConsumption');
                }

                return new Response('successConsumption');
            } else {
                return new Response('errorConsumption');
            }
        }
        return $this->render('Front/form/form_consumption.html.twig', [
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
        try {
            $em->flush();
        } catch (Exception $e) {
            return new Response('errorInstall');
        }

        return $newAfterMeter;
    }

}
