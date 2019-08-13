<?php

namespace App\Controller;

use App\Entity\AdminUser;
use App\Entity\Prospect;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class AdminProspect extends AbstractController
{
    /**
     * List all prospects
     * @Route("/admin/prospect/list", name="admin_prospect_list")
     */
    public function listProspect(Request $request, PaginatorInterface $paginator): Response
    {
        $allProspects = $this->getDoctrine()->getManager()->getRepository(Prospect::class)->findAll();

        $prospects = $paginator->paginate(
        // Doctrine Query, not results
            $allProspects,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            20
        );

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
