<?php

namespace App\Controller;

use App\Entity\AdminUser;
use App\Form\AdminUserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $admin = new AdminUser();
        $form = $this->createForm(AdminUserType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $admin->setPassword($passwordEncoder->encodePassword(
                $admin,
                $admin->getPassword()
            ));
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();
            $this->addFlash('success', 'l\'utilisateur ' . $admin->getEmail() . ' a bien été ajouté');
            return $this->redirectToRoute('app_register');
        }

        return $this->render('Admin/register.html.twig', [
            'admin' => $admin,
            'form' => $form->createView()
        ]);
    }
}
