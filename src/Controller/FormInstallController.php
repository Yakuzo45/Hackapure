<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Entity\Install;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FormInstallController extends AbstractController
{
    /**
     * @Route("/form/install", name="form_install")
     */
    public function newInstall(Request $request) : Response
    {
//        $install = new Install();



        return $this->render('Front/form_install/index.html.twig', [
            'FormInstall' => 'FormInstall',
        ]);
    }



}
