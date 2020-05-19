<?php

namespace App\Controller;

use App\Entity\Arme;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArmeController extends AbstractController
{
    /**
     * @Route("/armes", name="armes")
     */
    public function index()
    {
        Arme::creerArme();
        return $this->render('arme/armes.html.twig', [
            'armes' => Arme::$armes,
        ]);
    }

    /**
     * @Route("/armes/{nom}", name="afficher_arme")
     */
    public function afficher_arme($nom) {

        Arme::creerArme();
        $arme = Arme::getArmeParNom($nom);
        
        return $this->render('arme/arme.html.twig', [
            'arme' => $arme, 
        ]);
    }
}
