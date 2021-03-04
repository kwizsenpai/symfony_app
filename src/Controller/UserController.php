<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route ("/user", name="userForm")
     */
    public function createUserForm(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request); // On demande à $form d'inspecter $request

        if ($form->isSubmitted() && $form->isValid()) {

            $userInfos = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userInfos);
            $entityManager->flush();

            return new Response('Formulaire validé.');
        }

        return $this->render('form.html.twig', ['userform' => $form->createView()]);
    }
}
