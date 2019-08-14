<?php


namespace App\Controller;

use App\Entity\Consumption;
use App\Entity\WaterHeater;
use App\Form\ConsumptionType;
use App\Repository\ProspectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormConsumptionController extends AbstractController
{
    /**
     *@Route("/form/consumption", name="form_consumption")
     */
    public function new(Request $request, ProspectRepository $prospectRepository): Response
    {
        $consumption = new Consumption();
        $form = $this->createForm(ConsumptionType::class, $consumption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($consumption);
            $waterHeater = $consumption->getWaterHeater();
            $waterHeater['__name___']->setConsumption($consumption);

            $stillWaterBottle = $consumption->getStillWaterBottle();
            $stillWaterBottle['__name___']->setConsumption($consumption);

            $sparkWaterBottle = $consumption->getSparkWaterBottle();
            $sparkWaterBottle['__name___']->setConsumption($consumption);

            $heater = $consumption->getHeater();
            $heater['__name___']->setConsumption($consumption);

            $homeAppliance = $consumption->getHomeAppliance();
            $homeAppliance['__name___']->setConsumption($consumption);

            $entityManager = $this->getDoctrine()->getManager();
            $prospect = $prospectRepository->findOneByLastInsert();
            $consumption->setUser($prospect);
            $entityManager->persist($consumption);
            $entityManager->flush();
            $this->addFlash('success','Étape 3/4 terminée');
//            return $this->redirectToRoute('form_user');
        }
        return $this->render('Front/form-consumption-section.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}