<?php

namespace App\Controller\Admin;

use App\Entity\Practitioner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PractitionerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Practitioner::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastname','Nom'),
            TextField::new('firstname', 'Prénom'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('/uploads/installations/')->onlyOnIndex(),
        ];
    }

}
