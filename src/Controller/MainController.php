<?php

namespace App\Controller;

use App\Entity\Equipement;
use App\Entity\Service;
use App\Repository\EquipementRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Service\Attribute\Required;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * Page d'accueil
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * Page informations région sous-dotée
     * @Route("/region", name="region")
     */
    public function region(): Response
    {
        return $this->render('main/region.html.twig');
    }

    /**
     * Page informations soins
     * @Route("/soins", name="service")
     */
    public function service(ServiceRepository $services, EquipementRepository $equipements, Request $request): Response
    {


        return $this->render('main/service.html.twig', [
            'service' => $services->findAll(),
            'equipement' =>$equipements->findAll(),
        ]);
    }


}
