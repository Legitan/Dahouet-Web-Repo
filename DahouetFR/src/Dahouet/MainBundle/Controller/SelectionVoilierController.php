<?php
// src/Dahouet/MainBundle/Controller/SelectionVoilierController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\VoilierDAO;
use Dahouet\MainBundle\Modele\DAO\RegateDAO;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;

class SelectionVoilierController extends Controller {
	public function indexAction($numReg) {
		
		// Ouverture de session
		$session = $this->get ( 'session' );
		
		// Si la personne n'est pas connectée, on lui demande de se connecter
		if (session_status() !== PHP_SESSION_ACTIVE) {
			return $this->render ( 'DahouetMainBundle:Main:loginObligatoire.html.twig');
		} else {
			//Récupération de l'identifiant du propriétaire
			$idmbr = $session->get('idmbr');
			$proprietaire = ProprietaireDAO::getProprietaireById ( $idmbr );
			
			//Vérification existance numReg
			$regate = RegateDAO::getRegate($numReg);
			
			//Mise en session de la regate
			if ($regate!==false){
				$session->set('numReg', $numReg);
			}
			// Récupération des bateaux du propriétaire
			$voilier = VoilierDAO::getListVoilier ( $idmbr );
			
			
			
			return $this->render ( 'DahouetMainBundle:Main:selectionVoilier.html.twig', array (
					'proprietaire'=> $proprietaire,
					'voilier' => $voilier,
					'regate' => $regate,
			) );
		}
	}
}