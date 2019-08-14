<?php

namespace App\Controller;

use App\Entity\Pollution;
use App\Repository\PollutionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuotationPollutionController extends AbstractController
{
    /**
     * @Route("/quotation/pollution", name="quotation_pollution")
     */
    public function index()
    {
        return $this->render('quotation_pollution/index.html.twig', [
            'controller_name' => 'QuotationPollutionController',
        ]);
    }

    /**
     * @return Response
     */
    public function show(Pollution $pollution): Response
    {
        return $this->render('quotation_pollution/index.html.twig', [
            'Pollution' => $pollution,
        ]);
    }

}
