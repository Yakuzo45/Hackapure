<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormInstallController extends AbstractController
{
    /**
     * @Route("/form/install", name="form_install")
     */
    public function index()
    {
        return $this->render('form_install/index.html.twig', [
            'controller_name' => 'FormInstallController',
        ]);
    }
}
