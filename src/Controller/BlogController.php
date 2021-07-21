<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends AbstractController
{
    /**
     * page qui affiche le blog
     *
     * @Route("/blog", name="blog")
     */
    public function index(CategoryRepository $category, ArticleRepository $articles): Response
    {
        return $this->render('blog/blog.html.twig', [
            'category' => $category->findAll(),
            'articles' => $articles->findAll(),
        ]);
    }

    /**
     * Page des résultats de recherche du formulaire dans la page blog
     *
     * @Route("/recherche/", name="search")
     */
    public function search(Request $request, PaginatorInterface $paginator): Response
    {

        // On récupère dans l'URL la données GET['page'] (si elle n'existe pas, la valeur par défaut sera "1")
        $requestedPage = $request->query->getInt('page', 1);

        /*Si le numéro de page demandé dans l'URL est inférieur à 1, erreur 404
        if ($requestedPage < 1) {
            throw new NotFoundHttpException();
        }*/

        // Récupération du manager général des entités
        $em = $this->getDoctrine()->getManager();


        // Récupération de la recherche dans le formulaire
        $search = $request->query->get('q');

        // Création de la requête (préparée pour éviter les injections SQL)
        $query = $em
            ->createQuery('SELECT a FROM App\Entity\Article a WHERE a.title LIKE :search OR a.content LIKE :search ORDER BY a.publicationDate DESC')
            ->setParameters(['search' => '%' . $search . '%']);

        // Récupération des articles
        $articles = $paginator->paginate(
            $query,
            $requestedPage,
            5
        );
        // Appel de la vue
        return $this->render('blog/search.html.twig', [
            'articles' => $articles,
        ]);
    }
}
