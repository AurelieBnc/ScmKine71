<?php

namespace App\Controller\Admin;

use App\Entity\Equipement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class EquipementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom'),
            TextEditorField::new('describeEquipement','Description'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('/uploads/installations/')->onlyOnIndex(),
        ];
    }

}
