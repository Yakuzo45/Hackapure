<?php

namespace App\Controller;

use App\Entity\AdminUser;
use App\Entity\Prospect;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProspect extends AbstractController
{
    /**
     * List all prospects
     * @Route("/admin/prospect/list", name="admin_prospect_list")
     */
    public function listProspect(Request $request): Response
    {
        $prospects = $this->getDoctrine()->getManager()->getRepository(Prospect::class)->findAll();

        return $this->render('Admin/prospect/list.html.twig', [
            'prospects' => $prospects
        ]);
    }

    /**
     * Delete prospects
     * @Route("/admin/prospect/delete/{id}", name="admin_prospect_delete", methods={"DELETE"})
     */
    public function deleteProspect(Prospect $prospect, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prospect->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prospect);
            $entityManager->flush();
            $this->addFlash('success', 'l\'utilisateur ' . $prospect->getEmail() . ' a bien été supprimé');
        }

        return $this->redirectToRoute('admin_prospect_list');
    }
}
