<?php

namespace App\Controller;

use App\Repository\SessionRepository;
use App\Repository\FormateurRepository;
use App\Repository\FormationRepository;
use App\Repository\StagiaireRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(ManagerRegistry $doctrine, StagiaireRepository $sr, FormationRepository $fr, FormateurRepository $ffr, SessionRepository $ss): Response
    {
        $entityManager = $doctrine->getManager();
        $stagiaires = $sr->findAll();
        $formations = $fr->findAll();
        $formateurs = $ffr->findAll();
        $sessions = $ss->findAll();
        $sessionpassees = $ss->AfficherSessionPasses();
        // requete dql dans le repository qui ressort les formation selon dates. 1par type de session /3.
        return $this->render('home/index.html.twig', [
            'stagiaires' => $stagiaires,
            'formations' => $formations,
            'formateurs' => $formateurs,
            'sessions' => $sessions,
            'sessionsPassees' => $sessionpassees,

        ]);
    }
}
