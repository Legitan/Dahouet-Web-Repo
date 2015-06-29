<?php
// src/Dahouet/MainBundle/Controller/InscriptionRegateController.php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class InscriptionRegateController extends Controller {
	
    public function indexAction() {
        
        // Ouverture de session et récupération de l'état de connexion
        $session = $this->get('session');
        $connexion = $session->get('connexion');
        
        // Si la personne n'est pas connectée, on lui demande de se connecter
        if ($connexion == 0) {
            return $this->render('DahouetMainBundle:Main:loginObligatoire.html.twig', array('connexion'=> $session->get('connexion')));
        }
        else{
        }
    }
}