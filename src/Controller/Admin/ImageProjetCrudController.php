<?php

namespace App\Controller\Admin;

use App\Entity\ImageProjet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class ImageProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImageProjet::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            Field::new('image', 'Fichier (image ou vidéo)')
                ->setFormType(FileUploadType::class)
                ->setFormTypeOptions([
                    'upload_dir' => 'public/img/',
                    'upload_filename' => '[slug]-[timestamp].[extension]',
                    'attr' => [
                        'accept' => 'image/*,video/*'
                    ],
                ])
                ->setHelp('Images ou vidéos acceptées'),
            AssociationField::new('projet', 'Projet associé')
                ->setRequired(true),
        ];
    }
}
