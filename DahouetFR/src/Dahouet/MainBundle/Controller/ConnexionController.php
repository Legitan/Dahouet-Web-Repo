<?php
// src/Dahouet/MainBundle/Controller/ConnexionController.php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;


class ConnexionController extends Controller {
    
        
    public function indexAction() {
        // récupération des variables POST
        $idmbr = filter_input(INPUT_POST, 'idmbr');
        $pwmbr = filter_input(INPUT_POST, 'pwmbr');
        // Test de connexion sur la base de données
        $proprietaire = ProprietaireDAO::ConnexionProprietaire($idmbr, $pwmbr);
        
        if ($proprietaire) {
            $session = $this->get('session');
            $session->set('idmbr', $idmbr);
            $session->set('nommbr', $proprietaire[0]['NOMMBR']);
            $session->set('connexion', 1);
        }
        else {
            $session = $this->get('session');
            $session->set('nommbr', '');
            $session->set('connexion', 0);
        }
        return $this->render('DahouetMainBundle:Main:index.html.twig', array('connexion'=> $session->get('connexion'), 'nommbr'=> $session->get('nommbr')));
    }
}

