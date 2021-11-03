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
    public function blog(CategoryRepository $category, ArticleRepository $article, Request $request, PaginatorInterface $paginator): Response
    {

        //Paginator vue 1
        $requestedPage = $request->query->getInt('page', 1);
        if($requestedPage < 1){
            throw new NotFoundHttpException();
        }
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT a FROM App\Entity\Article a ORDER BY a.publicationDate DESC  ');
        $articlesView1 = $paginator->paginate(
            $query,     // Requête de selection des articles en BDD
            $requestedPage,     // Numéro de la page dont on veux les articles
            2      // Nombre d'articles par page
        );

        //Paginator vue 2
        $requestedPage = $request->query->getInt('page', 1);
        if($requestedPage < 1){
            throw new NotFoundHttpException();
        }
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT a FROM App\Entity\Article a WHERE a.category = 1 ORDER BY a.publicationDate DESC  ');
        $articlesView2 = $paginator->paginate(
            $query,     // Requête de selection des articles en BDD
            $requestedPage,     // Numéro de la page dont on veux les articles
            1      // Nombre d'articles par page
        );


        //Paginator vue 3
        $requestedPage = $request->query->getInt('page', 1);
        if($requestedPage < 1){
            throw new NotFoundHttpException();
        }
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT a FROM App\Entity\Article a WHERE a.category = 2 ORDER BY a.publicationDate DESC  ');
        $articlesView3 = $paginator->paginate(
            $query,     // Requête de selection des articles en BDD
            $requestedPage,     // Numéro de la page dont on veux les articles
            10      // Nombre d'articles par page
        );

        // Appel de la vue
        return $this->render('blog/blog.html.twig', [
            'category' => $category->findAll(),
            'article' => $article->findAll(),
            'articlesView1' => $articlesView1,
            'articlesView2' => $articlesView2,
            'articlesView3' => $articlesView3,
        ]);
    }

    /**
     * Page des résultats de recherche du formulaire dans la page blog
     *
     * @Route("/search-blog", name="search_blog")
     */
    public function blogSearch(Request $request, PaginatorInterface $paginator): Response
    {
        // On récupère dans l'URL la données GET['page'] (si elle n'existe pas, la valeur par défaut sera "1")
        $requestedPage = $request->query->getInt('page', 1);

        /*Si le numéro de page demandé dans l'URL est inférieur à 1, erreur 404*/
        if ($requestedPage < 1) {
            throw new NotFoundHttpException();
        }

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
            10
        );
        // Appel de la vue
        return $this->render('blog/searchBlog.html.twig', [
            'articles' => $articles,
        ]);
    }


}
