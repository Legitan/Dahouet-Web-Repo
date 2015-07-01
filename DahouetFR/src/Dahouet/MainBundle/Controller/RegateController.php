<?php
// src/Dahouet/MainBundle/Controller/RegateController.php

namespace Dahouet\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Dahouet\MainBundle\Modele\DAO\EquipageDAO;

class RegateController extends Controller {
    public function indexAction() {
        
        //  Récupération de la liste des licenciés
        $equip = EquipageDAO::SelectEquip();
        
      
        // Sélection du licencié pour la régate
        $selectlic = $_POST['NUMVOIL'];
            
        // Création du tableau de participants
        $participants = array();
        
        // Ajout du licencié dans la régate

        
            $session = new session();
            $session->start();
            $session->set('equipage', $equip);
        return $this->render('DahouetMainBundle:Main:equip.html.twig', array('equip'=>$equip));
    }
}