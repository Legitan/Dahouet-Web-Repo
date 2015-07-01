<?php
// src/Dahouet/MainBundle/Controller/SkipperController.php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class skipperController extends Controller {
    public function indexAction() {
        $session = $this->get('session');
        $nommbr = $session->get('nommbr');
        $connexion = $session->get('connexion');
        $skipper = $session->get('listEquip');
        return $this->render('DahouetMainBundle:Main:skipper.html.twig', array('skipper' => $skipper, 'connexion' => $connexion, 'nommbr' => $nommbr));
    }
}

