<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/projets', name: 'projet_index')]
    public function index(ProjetRepository $projetRepository): Response
    {
        return $this->render('project/index.html.twig', [
            'projets' => $projetRepository->findBy([], ['createdAt' => 'DESC'])
        ]);
    }

    #[Route('/projet/{id}', name: 'projet_show')]
    public function show(Projet $projet): Response
    {
        return $this->render('project/show.html.twig', [
            'projet' => $projet
        ]);
    }
}
