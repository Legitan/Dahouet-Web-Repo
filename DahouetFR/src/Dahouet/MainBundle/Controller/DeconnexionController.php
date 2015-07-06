<?php
// src/Dahouet/MainBundle/Controller/DeconnexionController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DeconnexionController extends Controller {
	public function indexAction() {
		
		
		// Récupération du service de session
 		$session = $this->get ( 'session' );
 		$session->set ( 'connexion', 0 );
 		session_destroy();
// 		$session->set ( 'equip', '' );
// 		$session->set ( 'idmbr', '' );
// 		$session->set ( 'nbrpts', 0 );
// 		$session->set ( 'nommbr', '' );
// 		$session->set ( 'nomvoil', '' );
// 		$session->set ( 'numclas', '' );
// 		$session->set ( 'numreg', '' );
// 		$session->set ( 'numvoil', '' );
// 		$session->set ( 'equipage', '' );
// 		$session->set ( 'listEquip', '' );
// 		$session->set ( 'equipier', '' );
// 		$session->set ( 'skipper', '' );
// 		$session->set ( 'nomreg', '' );
// 		$session->set ( 'numport', '' );
		
		return $this->render ( 'DahouetMainBundle:Main:index.html.twig', array (
				'connexion' => $session->get ( 'connexion' ), 
		) );
	}
}

