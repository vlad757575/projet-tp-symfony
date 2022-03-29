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
}
