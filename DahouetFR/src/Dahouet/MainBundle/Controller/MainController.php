<?php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller {
	public function indexAction() {
		// Récupération du service de session
		
		
		return $this->render ( 'DahouetMainBundle:Main:index.html.twig');
	}
}



