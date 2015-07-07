<?php
// src/Dahouet/MainBundle/Controller/ConnexionController.php
namespace Dahouet\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Dahouet\MainBundle\Modele\DAO\ProprietaireDAO;

class ConnexionController extends Controller {
	
	public function indexAction(){
		$session = new Session();
		$idmbr = filter_input ( INPUT_POST, 'idmbr' );
		$pwmbr = filter_input ( INPUT_POST, 'pwmbr' );
		$proprietaire = ProprietaireDAO::getProprietaire ( $idmbr, $pwmbr );
				
				
					if ($proprietaire!==null ){
						$session->set('proprietaire', $proprietaire);
						$session->set('idmbr', $idmbr);
						return $this->render ( 'DahouetMainBundle:Main:membreConnecte.html.twig', array (
								'proprietaire'=> $proprietaire,
						));
					}else{
						return $this->render ( 'DahouetMainBundle:Main:loginErrone.html.twig');
					}
		}
}

