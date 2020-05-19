<?php

namespace App\Controller;

use App\Entity\Personnage;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('personnage/index.html.twig', [
            'controller_name' => 'PersonnageController',
        ]);
    }


    /**
     * @Route("/persos", name="personnages")
     */
    public function persos() {
        
        Personnage::createPersos();

        return $this->render('personnage/persos.html.twig', [
            "players" => Personnage::$personnages
        ]);
    }

    /**
     * @Route("/persos/{pseudo}/", name="display_perso")
     */
    public function displayPerso($pseudo) {

        Personnage::createPersos();
        $perso = Personnage::getPersonnageParPseudo($pseudo);

        return $this->render('personnage/perso.html.twig', [
            "perso" => $perso
        ]);
    }
}
