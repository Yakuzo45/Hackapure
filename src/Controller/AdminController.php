<?php


namespace App\Controller;


use App\Entity\AdminUser;
use App\Entity\Prospect;
use App\Form\AdminUserEditType;
use App\Form\AdminUserType;
use App\Repository\AdminUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index", methods={"GET"})
     */
    public function adminIndex()
    {
        return $this->render('Admin/adminHomepage.html.twig');
    }

    /**
     * @Route("/admin/userIndex", name="admin_user_index", methods={"GET"})
     */
    public function index(AdminUserRepository $adminUserRepository): Response
    {
        return $this->render('Admin/index.html.twig', [
            'admin_users' => $adminUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/userIndex/{id}/edit", name="admin_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AdminUser $adminUser): Response
    {
        $form = $this->createForm(AdminUserEditType::class, $adminUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'l\'utilisateur ' . $adminUser->getEmail() . ' a bien été modifié');

            return $this->redirectToRoute('admin_user_index');
        }

        return $this->render('Admin/edit.html.twig', [
            'admin_user' => $adminUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/userIndex/{id}", name="admin_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AdminUser $adminUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adminUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adminUser);
            $entityManager->flush();
            $this->addFlash('success', 'l\'utilisateur ' . $adminUser->getEmail() . ' a bien été supprimé');
        }

        return $this->redirectToRoute('admin_user_index');
    }
}
