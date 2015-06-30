<?php

// src/Dahouet/MainBundle/Controller/ValidvoilierController.php

namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\VoilierDAO;
use Symfony\Component\HttpFoundation\Session\Session;

class ValidvoilierController extends Controller {
    public function indexAction() {
        
        // Récupération du service de session
        $session = $this->get('session');
        
        // Si on vient de sélectionner le voilier
        if (isset($_POST['validboat'])) {
            
            // Récupération du numéro de voile du voilier choisi
            $session->set('numvoil', $_POST['validboat']);
            $numvoil = $session->get('numvoil');

            // Récupère les informations sur le voilier
            $validation = VoilierDAO::ValidBateau($numvoil);
            $session->set('numclas', $validation[0]['NUMCLAS']);
            $session->set('nomvoil', $validation[0]['NOMVOIL']);
            $session->set('nbrpts', $validation[0]['NBRPTS']);

            // Récupère les participations aux régates pour lesquelles le voilier
            // n'est pas inscrit
            $particip = DAO::Participation($numvoil);

            // Récupère les régates à venir
            $reg = DAO::SelectReg();
        }
        // Si aucun équipier n'a été sélectionné
        if (empty($_POST['validequip'])) {
            // Récupération de la liste des licenciés
            $equipage = DAO::SelectEquip();
            $session->set('equipage', $equipage);
            $equipier = array();
            $session->set('equipier', $equipier);
            // Initialisation du tableau des équipiers choisis
            $listEquip = array();
            $session->set('listEquip', $listEquip);
//            $session->set('listEquip', $listEquip);
        }
        else {
            // Récupération des variables de session
            $equipage = $session->get('equipage');
            $listEquip = $session->get('listEquip');
                        
            // Récupération du licencié sélectionné
            $numlic = $_POST['validequip'];
            $compt = count($session->get('equipage'));
            for ($i=0; $i < $compt; $i++) {
                if ($equipage[$i]['NUMLIC'] == $numlic) {
                    $session->set('equipier', $equipage[$i]);
                }
            }

            // Ajout de l'équipier dans la liste d'équipage
            $equipier = $session->get('equipier');
            $compt = count($session->get('listEquip'));
            $tab1 = array();
            for ($i=0; $i<$compt; $i++) {
                array_push($tab1, $listEquip[$i]);
            }
            array_push($tab1, $equipier);
            $session->set('listEquip', $tab1);
            
            // On retire l'équipier de la liste
            $compt = count($session->get('equipage'));
            $tab1 = array();
            for ($i=0; $i<$compt; $i++) {
                if ($equipage[$i] == $equipier) {
                }
                else {
                    array_push($tab1, $equipage[$i]);
                }
//                $session->set('equipage', $tab1);
            }
            $session->set('equipage', $tab1);
            $session->set('equipier', '');
       
        
            }

//$equipier = $session->get('equipier');
$listEquip = $session->get('listEquip');
$connexion = $session->get('connexion');
$equipage = $session->get('equipage');
return $this->render('SYMFONYDahouetRegatesBundle:Regates:validvoilier.html.twig',
                array('numvoil'=>$session->get('numvoil'), 'numclas'=>$session->get('numclas'),
                    'nomvoil'=>$session->get('nomvoil'), 'nbrpts'=>$session->get('nbrpts'),
                    'idmbr'=>$session->get('id'), 'nommbr'=>$session->get('nommbr'),
                    'numreg' => $session->get('numreg'), 'connexion' => $connexion,
                    'equipage' => $equipage, 'equipier' => $equipier, 'listEquip' => $listEquip));
    }
}

