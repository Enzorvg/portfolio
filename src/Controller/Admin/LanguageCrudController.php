<?php

namespace App\Controller\Admin;

use App\Entity\Language;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LanguageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Language::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            TextField::new('code', 'Code'),
            TextField::new('image', 'Image (URL ou nom de fichier)'),
        ];
    }
}
