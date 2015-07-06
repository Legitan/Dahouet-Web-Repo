<?php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;

class MainController extends Controller {
	public function indexAction() {
		// Récupération du service de session
		$session = $this->get ( 'session' );
		// Récupération de la valeur de $connexion
		$connexion = $session->get ( 'connexion' );
		// Récupération de la valeur de $proprietaire
		$idmbr = $session->get('idmbr');
		$proprietaire = ProprietaireDAO::getProprietaireById($idmbr);
		$session->set('proprietaire', $proprietaire);
		// Si la valeur est nulle
		if ($connexion) {
			$session->set ( 'connexion', 1 );
		} else {
			$session->set ( 'connexion', 0 );
		}
		return $this->render ( 'DahouetMainBundle:Main:index.html.twig', array (
				'connexion' => $session->get ( 'connexion' ),
				'nommbr' => $session->get ( 'nommbr' ),
				'proprietaire'=> $proprietaire,
		) );
	}
}


