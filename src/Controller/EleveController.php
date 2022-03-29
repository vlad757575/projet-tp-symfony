<?php

namespace App\Controller;

use App\Repository\EleveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EleveController extends AbstractController
{
    /**
     * @Route("/eleve", name="app_eleve")
     */
    public function index(EleveRepository $el): Response
    {
        $eleves = $el->findAll();
        return $this->render('eleve/eleves.html.twig', [
            'eleves' => $eleves,
        ]);
    }

    /**
     * @Route("/detail-eleve{id}", name="app_detail_eleve")
     */
    public function showEleve($id, EleveRepository $el): Response
    {
        $eleve = $el->find($id);
        return $this->render('eleve/detail-eleve.html.twig', [
            'eleve' => $eleve,
        ]);
    }
}
