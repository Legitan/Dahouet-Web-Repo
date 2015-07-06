<?php
// src/Dahouet/MainBundle/Controller/recapAvantValidController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;
use Dahouet\MainBundle\Modele\DAO\VoilierDAO;
use Dahouet\MainBundle\Modele\DAO\RegateDAO;
use Symfony\Component\HttpFoundation\Session\Session;

class recapAvantValidController extends Controller {
	public function indexAction() {
		
		if (isset ( $_POST ['skipper'] ) && ! empty ( $_POST ['skipper'] )) {
			$session = $this->get ( 'session' );
			// Récupération de la valeur de $proprietaire
			$idmbr = $session->get('idmbr');
			$proprietaire = ProprietaireDAO::getProprietaireById($idmbr);
			$session->set('proprietaire', $proprietaire);
			
			// Récupère les régates à venir
			$numReg = $session->get('numReg');
			$regate = RegateDAO::getRegate($numReg);
			$session->set('regate', $regate);
			
// 			// Récupération du numéro de voile du voilier choisi
// 			$numvoil = $session->get ('numvoil');
// 			$voilier = VoilierDAO::getVoilier($numvoil);
// 				$session->set ( 'voilier', $voilier );
			
			
			$skipper = $_POST ['skipper'];
			$listEquip = $session->get ( 'listEquip' );
			$compt = count ( $listEquip );
			for($i = 0; $i < $compt; $i ++) {
				if ($listEquip [$i] ['NUMLIC'] == $skipper) {
					$session->set ( 'skipper', $listEquip [$i] );
				}
			}
			$listEquip = $session->get ( 'listEquip' );
			$skipperChoisi = $session->get ( 'skipper' );
			$skipper = $skipperChoisi ['NOMLIC'];
			return $this->render ( 'DahouetMainBundle:Main:recapAvantValid.html.twig', array (
// 					'voilier' => $voilier,
					'listEquip' => $listEquip,
					'skipper' => $skipper,
					'proprietaire'=> $proprietaire,
					'regate'=> $regate,
					
			) );
		} else {
			$session = $this->get ( 'session' );
			// Récupération de la valeur de $proprietaire
			$idmbr = $session->get('idmbr');
			$proprietaire = ProprietaireDAO::getProprietaireById($idmbr);
			$session->set('proprietaire', $proprietaire);
			
			// Récupère les régates à venir
			$numReg = $session->get('numReg');
			$regate = RegateDAO::getRegate($numReg);
			$session->set('regate', $regate);
			
			$skipper = $session->get ( 'listEquip' );
			
			return $this->render ( 'DahouetMainBundle:Main:skipperAlert.html.twig', array (
					'skipper' => $skipper,
					'proprietaire'=> $proprietaire,
					'regate'=> $regate,
			)
			 );
		}
	}
}

