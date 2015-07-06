<?php
// src/Dahouet/MainBundle/Controller/SkipperController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;
use Symfony\Component\HttpFoundation\Session\Session;

class skipperController extends Controller {
	public function indexAction() {
		$session = $this->get ( 'session' );
		// Récupération de la valeur de $proprietaire
		$idmbr = $session->get('idmbr');
		$proprietaire = ProprietaireDAO::getProprietaireById($idmbr);
		$session->set('proprietaire', $proprietaire);
		$skipper = $session->get ( 'listEquip' );
		return $this->render ( 'DahouetMainBundle:Main:skipper.html.twig', array (
				'skipper' => $skipper,
				'proprietaire'=> $proprietaire,
		) );
	}
}

