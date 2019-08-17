<?php

namespace App\Controller;

use App\Repository\CityRepository;
use App\Repository\PollutionRepository;
use App\Repository\ProspectRepository;
use App\Service\InseeNumberFinder;
use App\Service\ResultsGetter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{

    /**
     * @Route("/findresults", name="global_result", methods={"GET"})
     * @param PollutionRepository $pollutionRepository
     * @param ProspectRepository $prospectRepository
     * @param InseeNumberFinder $inseeNumberFinder
     * @param CityRepository $cityRepository
     * @return Response
     */
    public function find(
        PollutionRepository $pollutionRepository,
        ProspectRepository $prospectRepository,
        InseeNumberFinder $inseeNumberFinder,
        CityRepository $cityRepository
    ): Response {
        $lat = $prospectRepository->findOneByLastInsert()->getLat();
        $lng = $prospectRepository->findOneByLastInsert()->getLng();
//        $lat=46.4667;
//        $lng=3.2667;
        $inseeNumber = $inseeNumberFinder->findInseeNumber($lat, $lng);
        $extractionPoints = $cityRepository->findByInseNumber($inseeNumber);

        if ($extractionPoints[1]) {
            return $this->render(
                'Front/form/form_extractionPoint.html.twig',
                ['extractionPoints' => $extractionPoints]
            );
        } else {
            return $this->redirectToRoute('show_analyzes');
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
        ProspectRepository $prospectRepository,
        InseeNumberFinder $inseeNumberFinder,
        CityRepository $cityRepository
    ): Response
    {
        $lat = $prospectRepository->findOneByLastInsert()->getLat();
        $lng = $prospectRepository->findOneByLastInsert()->getLng();
//        $lat=46.4667;
//        $lng=3.2667;
        $pollution = $pollutionRepository->findOneByLastInsert();
        return $this->render('Front/pollution/bilan.html.twig', [
            'pollution' => $pollution,
        ]);

    }
}
