<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du projet'),
            TextareaField::new('description', 'Description'),
            TextField::new('lienGithub', 'Lien GitHub')
                ->setHelp('URL du dépôt GitHub (optionnel)')
                ->setRequired(false),

            AssociationField::new('Language', 'Langages utilisés')
                ->setFormTypeOptions(['multiple' => true, 'by_reference' => false]),

            DateTimeField::new('createdAt', 'Date de création'),
        ];
    }
}
