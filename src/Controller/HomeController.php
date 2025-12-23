<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\LanguageRepository;
use App\Repository\LogicielRepository;
use App\Repository\ProjetRepository;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProjetRepository $repo, LanguageRepository $languageRepository, LogicielRepository $logicielRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'projets' => $repo->findBy([], ['createdAt' => 'DESC'], 3),
            'languages' => $languageRepository->findBy([], ['name' => 'ASC']),
            'logiciels' => $logicielRepository->findBy([], ['name' => 'ASC']),
        ]);
    }
}
