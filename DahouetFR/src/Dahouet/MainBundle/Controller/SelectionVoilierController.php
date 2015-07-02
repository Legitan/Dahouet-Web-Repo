<?php
// src/Dahouet/MainBundle/Controller/SelectionVoilierController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\VoilierDAO;
use Dahouet\MainBundle\Modele\DAO\RegateDAO;

class SelectionVoilierController extends Controller {
	public function indexAction() {
		
		// Ouverture de session et récupération de l'état de connexion
		$session = $this->get ( 'session' );
		$connexion = $session->get ( 'connexion' );
		
		// Si la personne n'est pas connectée, on lui demande de se connecter
		if ($connexion == 0) {
			return $this->render ( 'DahouetMainBundle:Main:loginObligatoire.html.twig', array (
					'connexion' => $session->get ( 'connexion' ) 
			) );
		} else {
			// Récupération de l'identifiant du propriétaire
			$idmbr = $session->get ( 'idmbr' );
			
			// Récupération des bateaux du propriétaire
			$voilier = VoilierDAO::getListVoilier ( $idmbr );
			return $this->render ( 'DahouetMainBundle:Main:selectionVoilier.html.twig', array (
					'connexion' => $connexion,
					'nommbr' => $session->get ( 'nommbr' ),
					'voilier' => $voilier 
			) );
		}
		return $this->render ( 'DahouetMainBundle:Main:regate_by_numreg.html.twig', array (
				'connexion' => $connexion,
				'nommbr' => $session->get('nommbr'),
				'regates' => RegateDAO::getListRegate()
		));
    }
    
    public function reg1Action() {
    	$session = $this->get('session');
    	$numreg = $session->set('numreg', 1000);
    	$session->set('nomreg', 'Duo d\'Armor');
    	return $this->redirect($this->generateUrl('Selectboat', array('numreg' => $numreg)));
    }
    public function reg2Action() {
    	$session = $this->get('session');
    	$numreg = $session->set('numreg', 2000);
    	$session->set('nomreg', '40 miles de Dahouët');
    	return $this->redirect($this->generateUrl('Selectboat', array('numreg' => $numreg)));
    }
    public function reg3Action() {
    	$session = $this->get('session');
    	$numreg = $session->set('numreg', 3000);
    	$session->set('nomreg', '3 jours d\'Armor');
    	return $this->redirect($this->generateUrl('Selectboat', array('numreg' => $numreg)));
    }
}