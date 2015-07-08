<?php

// src/Dahouet/MainBundle/Controller/InscriptionController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;
use Dahouet\MainBundle\Modele\DAO\ParticipeDAO;
use Dahouet\MainBundle\Modele\DAO\LicencieDAO;
use Dahouet\MainBundle\Modele\DAO\Connect;
use PDO;

class InscriptionController extends Controller {
	public function indexAction() {
		$session = $this->get ( 'session' );
		
		// Récupération de la valeur de $proprietaire
		$idmbr = $session->get('idmbr');
		$proprietaire = ProprietaireDAO::getProprietaireById($idmbr);
		$session->set('proprietaire', $proprietaire);
		
		
		$numvoil = $session->get ( 'numvoil' );
		$numreg = $session->get ( 'numReg' );
		$skipper = $session->get ( 'skipper' );
		$numlicski = $skipper ['NUMLIC'];
		$numport = $_POST ['numport'];
		$listEquip = $session->get ( 'listEquip' );
		$session->set ( 'numport', $numport );
		
		$codepar = ParticipeDAO::InsertParticipe ( $numvoil, $numreg, $numlicski, $numport );
		
		$compt = count ( $listEquip );
		for($i = 0; $i < $compt; $i ++) {
			$numlic = $listEquip [$i] ['NUMLIC'];
			LicencieDAO::InsertEquipage ( $codepar, $numlic );
		}
		$voilier = $session->get ( 'voilier' );
		return $this->render ( 'DahouetMainBundle:Main:inscription.html.twig', array (
					'voilier' => $voilier,
					'proprietaire' => $proprietaire,
		) );
	}
}

