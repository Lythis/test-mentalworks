<?php

namespace App\Controller;

use App\Entity\Site;
use App\Repository\SiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/search", name="search_client")
     */
    public function search(Request $request, SiteRepository $siteRepository){
        
        $data = $request->request->get('search');
        $site = $siteRepository->findOneBy(['nom'=> $data]);
       
        if($site === null){
            $this->addFlash('error', 'Aucun site n\'a été trouvé');
            
            return $this->redirectToRoute('main');
        }
        
        return $this->redirectToRoute('main',["site"=>$site->getId()]);
    }
    /**
     * @Route("/{site}", name="main")
     */
    public function index(SiteRepository $siteRepository, Site $site = null ): Response
    {
        if($site === null){
            $site = $siteRepository->findAll();
        }
        else {
            $site = [
                $site
            ];
        }
        
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'site' => $site,
        ]);
    }


}
