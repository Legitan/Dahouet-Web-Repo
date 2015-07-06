<?php
// src/Dahouet/MainBundle/Controller/DeconnexionController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DeconnexionController extends Controller {
	public function indexAction() {
		
		
 		session_destroy();
		
		return $this->render ( 'DahouetMainBundle:Main:index.html.twig');
	}
}

