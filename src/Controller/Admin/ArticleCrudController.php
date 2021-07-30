<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('category', 'Catégorie'),
            TextField::new('title','Titre'),
            DateField::new('publicationDate','Date de publication'),
            TextareaField::new('content','Contenu'),
            SlugField::new('slug')->setTargetFieldName('title')->hideOnIndex(),

        ];
    }
    Public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['publicationDate' => 'DESC']);
    }

}
