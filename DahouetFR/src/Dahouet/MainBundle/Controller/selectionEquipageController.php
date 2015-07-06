<?php

// src/Dahouet/MainBundle/Controller/selectionEquipageController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Dahouet\MainBundle\Modele\DAO\VoilierDAO;
use Dahouet\MainBundle\Modele\DAO\ParticipeDAO;
use Dahouet\MainBundle\Modele\DAO\RegateDAO;
use Dahouet\MainBundle\Modele\DAO\LicencieDAO;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;

class selectionEquipageController extends Controller {
	public function indexAction() {
		
		// Récupération du service de session
		$session = $this->get ( 'session' );
		
		// Récupère les régates à venir
		$numReg = $session->get('numReg');
		$regate = RegateDAO::getRegate($numReg);
		$session->set('regate', $regate);
			
		// Récupération de la valeur de $proprietaire
		$idmbr = $session->get('idmbr');
		$proprietaire = ProprietaireDAO::getProprietaireById($idmbr);
		$session->set('proprietaire', $proprietaire);
		
		
		
		// Si on vient de sélectionner le voilier
		if (isset ( $_POST ['selectvoilier'] )) {
			

			
			// Récupération du numéro de voile du voilier choisi
			$voilier = VoilierDAO::getVoilier($_POST ['selectvoilier']);
			if($voilier!==false){
				$session->set ( 'voilier', $voilier );
			}
				
			//Récupère les participations aux régates pour lesquelles le voilier n'est pas inscrit
			$participe = ParticipeDAO::getListNoParticipation ( $voilier->getNumvoil() );
			$session->set ( 'participe', $participe );
		}		
			
		
		// Si aucun équipier n'a été sélectionné
		if (empty ( $_POST ['validequip'] )) {
			// Récupération de la liste des licenciés
			var_dump($voilier);
			$equipage = LicencieDAO::getListLicencies ();
			$session->set ( 'equipage', $equipage );
			$equipier = array ();
			$session->set ( 'equipier', $equipier );
			// Initialisation du tableau des équipiers choisis
			$listEquip = array ();
			$session->set ( 'listEquip', $listEquip );
		} else {
			// Récupération des variables de session
			$equipage = $session->get ( 'equipage' );
			$listEquip = $session->get ( 'listEquip' );
			$voilier = $session->get ( 'voilier');
			// Récupération du licencié sélectionné
			$numlic = $_POST ['validequip'];
			$compt = count ( $session->get ( 'equipage' ) );
			for($i = 0; $i < $compt; $i ++) {
				if ($equipage [$i] ['NUMLIC'] == $numlic) {
					$session->set ( 'equipier', $equipage [$i] );
				}
			}
			
			// Ajout de l'équipier dans la liste d'équipage
			$equipier = $session->get ( 'equipier' );
			$compt = count ( $session->get ( 'listEquip' ) );
			$tab1 = array ();
			for($i = 0; $i < $compt; $i ++) {
				array_push ( $tab1, $listEquip [$i] );
			}
			array_push ( $tab1, $equipier );
			$session->set ( 'listEquip', $tab1 );
			
			// On retire l'équipier de la liste
			$compt = count ( $session->get ( 'equipage' ) );
			$tab1 = array ();
			for($i = 0; $i < $compt; $i ++) {
				if ($equipage [$i] == $equipier) {
				} else {
					array_push ( $tab1, $equipage [$i] );
				}
			}
			$session->set ( 'equipage', $tab1 );
			$session->set ( 'equipier', '' );
		}
		
		$listEquip = $session->get ( 'listEquip' );
		$connexion = $session->get ( 'connexion' );
		$equipage = $session->get ( 'equipage' );
		
		return $this->render ( 'DahouetMainBundle:Main:selectionEquipage.html.twig', array (
				'voilier' => $session->get ( 'voilier' ),
// 				'idmbr' => $session->get ( 'id' ),
// 				'nommbr' => $session->get ( 'nommbr' ),
				'connexion' => $connexion,
				'equipage' => $equipage,
				'equipier' => $equipier,
				'listEquip' => $listEquip ,
				'regate' => $regate,
				'proprietaire'=> $proprietaire,
// 				'participe'=> $participe,
				
				
		) );
	}
}

