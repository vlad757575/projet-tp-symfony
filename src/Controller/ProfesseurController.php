<?php

namespace App\Controller;

use App\Repository\ProfRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/professeur", name="app_professeur")
     */
    public function index(ProfRepository $pr): Response
    {
        $professeurs = $pr->findAll();
        return $this->render('professeur/professeurs.html.twig', [
            'professeurs' => $professeurs,
        ]);
    }

    /**
     * @Route("/detail-professeur{id}", name="app_detail_professeur")
     */
    public function showDetails($id, ProfRepository $pr): Response
    {
        $professeur = $pr->find($id);
        return $this->render('professeur/detail-professeur.html.twig', [
            'professeur' => $professeur,
        ]);
    }
}
