<?php
// src/Dahouet/MainBundle/Controller/recapAvantValidController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class recapAvantValidController extends Controller {
	public function indexAction() {
		
		if (isset ( $_POST ['skipper'] ) && ! empty ( $_POST ['skipper'] )) {
			$session = $this->get ( 'session' );
			$skipper = $_POST ['skipper'];
			$listEquip = $session->get ( 'listEquip' );
			$compt = count ( $listEquip );
			for($i = 0; $i < $compt; $i ++) {
				if ($listEquip [$i] ['NUMLIC'] == $skipper) {
					$session->set ( 'skipper', $listEquip [$i] );
				}
			}
			$nomreg = $session->get ( 'nomreg' );
			$nomvoil = $session->get ( 'nomvoil' );
			$connexion = $session->get ( 'connexion' );
			$nommbr = $session->get ( 'nommbr' );
			$listEquip = $session->get ( 'listEquip' );
			$skipperChoisi = $session->get ( 'skipper' );
			$skipper = $skipperChoisi ['NOMLIC'];
			
			return $this->render ( 'DahouetMainBundle:Main:recapAvantValid.html.twig', array (
					'connexion' => $connexion,
					'nommbr' => $nommbr,
					'nomreg' => $nomreg,
					'voilier' => $nomvoil,
					'listEquip' => $listEquip,
					'skipper' => $skipper 
			) );
		} else {
			$session = $this->get ( 'session' );
			$nommbr = $session->get ( 'nommbr' );
			$connexion = $session->get ( 'connexion' );
			$skipper = $session->get ( 'listEquip' );
			return $this->render ( 'DahouetMainBundle:Main:skipperAlert.html.twig', array (
					'skipper' => $skipper,
					'connexion' => $connexion,
					'nommbr' => $nommbr 
			)
			 );
		}
	}
}

