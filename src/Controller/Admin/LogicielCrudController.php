<?php

namespace App\Controller\Admin;

use App\Entity\Logiciel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LogicielCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logiciel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            TextField::new('code', 'Code'),
            TextField::new('url', 'URL'),
        ];
    }
}
