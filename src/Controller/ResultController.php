<?php

namespace App\Controller;

use App\Entity\City;
use App\Repository\CityRepository;
use App\Repository\PollutionRepository;
use App\Repository\PrelevmentRepository;
use App\Repository\ProspectRepository;
use App\Repository\ResultRepository;
use App\Service\InseeNumberFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{

    /**
     * @Route("/findresults", name="global_result", methods={"GET"})
     * @param ProspectRepository $prospectRepository
     * @param InseeNumberFinder $inseeNumberFinder
     * @param CityRepository $cityRepository
     * @return Response
     */
    public function find(
        ProspectRepository $prospectRepository,
        InseeNumberFinder $inseeNumberFinder,
        CityRepository $cityRepository
    ): Response {
        $lat = $prospectRepository->findOneByLastInsert()->getLat();
        $lng = $prospectRepository->findOneByLastInsert()->getLng();
//        $lat = 46.4667;
//        $lng = 3.2667;
        $inseeNumber = $inseeNumberFinder->findInseeNumber($lat, $lng);
        $extractionPoints = $cityRepository->findByInseNumber($inseeNumber);

        if (isset($extractionPoints[1])) {
            return $this->render(
                'Front/form/form_extractionPoint.html.twig',
                ['extractionPoints' => $extractionPoints]
            );
        } else {
            $cdreseau=$extractionPoints[0]->getCdreseau();
            return $this->redirectToRoute('show_analyzes', ['cdreseau' => $cdreseau]);
        }
    }

    /**
     * @Route("/resultats/{cdreseau}", name="show_analyzes", methods={"GET"})
     * @param PollutionRepository $pollutionRepository
     * @param ProspectRepository $prospectRepository
     * @param InseeNumberFinder $inseeNumberFinder
     * @param CityRepository $cityRepository
     * @return Response
     */
    public function show(
        PollutionRepository $pollutionRepository,
        City $city,
    PrelevmentRepository $prelevmentRepository,
    ResultRepository $resultRepository
    ): Response
    {

        $prelevment=$prelevmentRepository->findBy(
            ['cdreseau'=>$city->getCdreseau()],
            ['dateprel'=>'desc'],
            ['limit'=>1]
        );
        $results=$resultRepository->findBy(['referenceprel'=>$prelevment[0]->getReferenceprel()]);


        $pollution = $pollutionRepository->findOneByLastInsert();
        return $this->render('Front/bilan/analyses_bilan.html.twig', [
            'pollution' => $pollution,
            'results'=>$results,
            'city'=>ucfirst(strtolower($city->getName())),
            'prelevment'=>$prelevment[0]
        ]);
    }
}
