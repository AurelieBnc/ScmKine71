<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function service(): Response
    {
        return $this->render('main/service.html.twig');
    }


}
