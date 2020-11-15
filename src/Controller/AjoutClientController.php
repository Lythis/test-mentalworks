<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AjoutClientController extends AbstractController
{
    /**
     * @Route("/ajout/client", name="ajout_client")
     */
    public function index(Request $request)
    {
        $client  = new client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em -> persist($client);
            $em->flush();

            return $this->redirectToRoute('main');
        }
        return $this->render('ajout_client/index.html.twig', [
            'controller_name' => 'AjoutClientController',
            "form" => $form->createView()
        ]);
    }
}
