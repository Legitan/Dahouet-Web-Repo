<?php
// src/Dahouet/MainBundle/Controller/InscriptionRegateController.php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\VoilierDAO;

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
        // Récupération de l'identifiant du propriétaire
        $idmbr = $session->get('idmbr');
        
        // Récupération des bateaux du propriétaire
        $voilier = VoilierDAO::selectVoilier($idmbr);
        return $this->render('DahouetMainBundle:Main:selectionVoilier.html.twig', array('connexion' => $connexion, 'nommbr' => $session->get('nommbr'), 'voilier' => $voilier));
        }
        return $this->render('DahouetMainBundle:Main:index.html.twig', array('connexion' => $connexion, 'nommbr' => $session->get('nommbr')));
    }
}