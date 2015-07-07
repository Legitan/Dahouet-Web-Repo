<?php

// src/Dahouet/MainBundle/Controller/InscriptionController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Dahouet\MainBundle\Modele\DAO\ParticipeDAO;
use Dahouet\MainBundle\Modele\DAO\LicencieDAO;

class InscriptionController extends Controller {
	public function indexAction() {
		$session = $this->get ( 'session' );
		
		$numvoil = $session->get ( 'numvoil' );
		$numreg = $session->get ( 'numreg' );
		$skipper = $session->get ( 'skipper' );
		$numlicski = $skipper ['NUMLIC'];
		$numport = $_POST ['numport'];
		$listEquip = $session->get ( 'listEquip' );
		$session->set ( 'numport', $numport );
		ParticipeDAO::InsertParticipe ( $numvoil, $numreg, $numlicski, $numport );
		$codepar = ParticipeDAO::SelectParticipe ( $numvoil, $numreg, $numlicski );
		echo $codepar;
		$compt = count ( $listEquip );
		for($i = 0; $i < $compt; $i ++) {
			$numlic = $listEquip [$i] ['NUMLIC'];
			LicencieDAO::InsertEquipage ( $codepar, $numlic );
		}
		$voilier = $session->get ( 'voilier' );
		return $this->render ( 'DahouetMainBundle:Main:inscription.html.twig', array (
					'voilier' => $voilier,
		) );
	}
}

