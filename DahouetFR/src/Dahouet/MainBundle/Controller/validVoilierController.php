<?php
// src/SYMFONYDahouet/RegatesBundle/Controller/validVoilierController.php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\VoilierDAO;
use Symfony\Component\HttpFoundation\Session\Session;


class validVoilierController extends Controller {
	
	public function indexAction() {
			$session = new session();
// 			$session->start();
			$session->set('numvoil', $_POST['validVoilier']);
			$numvoil = $session->get('numvoil');
			$validation = VoilierDAO::ValidationVoilier($numvoil);
			$session->set('numclas', $validation[0]['NUMCLAS']);
			$session->set('nomvoil', $validation[0]['NOMVOIL']);
			$session->set('nbrpts', $validation[0]['NBRPTS']);
			$reg = VoilierDAO::SelectReg();
		
			return $this->render('DahouetMainBundle:Main:validationVoilier.html.twig',
					array('numvoil'=>$session->get('numvoil'), 'numclas'=>$session->get('numclas'),
							'nomvoil'=>$session->get('nomvoil'), 'nbrpts'=>$session->get('nbrpts'),
							'idmbr'=>$session->get('id'), 'reg'=>$reg, 'proprio'=>$session->get('proprio')));
		}
}