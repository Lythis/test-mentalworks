<?php

namespace App\Controller;

use App\Form\SiteType;
use App\Entity\Site;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AjoutSiteController extends AbstractController
{
    /**
     * @Route("/ajout/site", name="ajout_site")
     */
    public function index(Request $request)
    {
        $site  = new site();
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em -> persist($site);
            $em->flush();
            return $this->redirectToRoute('main');
        }

        return $this->render('ajout_site/index.html.twig', [
            'controller_name' => 'AjoutSiteController',
            "form" => $form->createView(),
            'site' => $site
        ]);
    }
}
