<?php

namespace App\Controller;

use App\Entity\Prospect;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index()
    {
        return $this->render('Front/form/form_container.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }

    /**
     * @Route("/admin/prospect/edit/{id}", name="form_edit")
     */
    public function edit(Prospect $prospect)
    {
        return $this->render('Front/form/form_container.html.twig', [
            'prospect' => $prospect
        ]);
    }
}
