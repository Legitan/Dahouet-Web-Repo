<?php
// src/Dahouet/MainBundle/Controller/recapAvantValidController.php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class recapAvantValidController extends Controller {
	
    public function indexAction() {        
        $session = $this->get('session');
        $skipper = $_POST['skipper'];
        $listEquip = $session->get('listEquip');
        $compt = count($listEquip);
        for ($i=0; $i<$compt; $i++) {
            if ($listEquip[$i]['NUMLIC'] == $skipper ) {
                $session->set('skipper', $listEquip[$i]);
            }
        }
        $nomreg = $session->get('nomreg');
        $nomvoil = $session->get('nomvoil');
        $connexion = $session->get('connexion');
        $nommbr = $session->get('nommbr');
        $listEquip = $session->get('listEquip');
        $skipperChoisi = $session->get('skipper');
        $skipper = $skipperChoisi['NOMLIC'];
        return $this->render('DahouetMainBundle:Main:recapAvantValid.html.twig', array('connexion' => $connexion, 'nommbr' => $nommbr, 'nomreg' => $nomreg, 'voilier' => $nomvoil, 'listEquip' => $listEquip, 'skipper' => $skipper));
    }
}

