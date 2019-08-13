<?php

namespace App\Controller;

use App\Entity\AdminUser;
use App\Form\AdminUserEditType;
use App\Form\AdminUserType;
use App\Repository\AdminUserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_user_index", methods={"GET"})
     */
    public function index(AdminUserRepository $adminUserRepository): Response
    {
        return $this->render('Admin/index.html.twig', [
            'admin_users' => $adminUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_user_edit", methods={"GET","POST"})
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
     * @Route("/{id}", name="admin_user_delete", methods={"DELETE"})
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
    /**
     * CreateAdminUser
     * @Route("/admin/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $adminUser = new AdminUser();
        $form = $this->createForm(AdminUserType::class, $adminUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adminUser->setPassword($passwordEncoder->encodePassword(
                $adminUser,
                $adminUser->getPassword()
            ));
            $em = $this->getDoctrine()->getManager();
            $em->persist($adminUser);
            $em->flush();
            $this->addFlash('success', 'l\'utilisateur ' . $adminUser->getEmail() . ' a bien été ajouté');
            return $this->redirectToRoute('app_register');
        }

        return $this->render('Admin/register.html.twig', [
            'admin' => $adminUser,
            'form' => $form->createView()
        ]);
    }
  
   /** 
     * @Route("/", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
//         if ($this->getUser()) {
//            $this->redirectToRoute('form_user');
//         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Front/security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }
}
