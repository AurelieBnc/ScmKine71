<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Equipement;
use App\Entity\Practitioner;
use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * Page dashboard permettant la gestion du Back Office
     * @Route("/admin", name="admin")
     * @Security("is_granted('ROLE_USER')")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ScmKine71');


    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Article Blog', 'fas fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Soins', 'fas fa-hand-holding-medical', Service::class);
        yield MenuItem::linkToCrud('Equipements', 'fas fa-toolbox', Equipement::class);
        /*yield MenuItem::linkToCrud('Equipe', 'fas fa-users', Practitioner::class); todo: voir pour les formations */
    }

}
