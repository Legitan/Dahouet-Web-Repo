<?php

// src/Dahouet/MainBundble/Modele/DAO/VoilierDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');
use Dahouet\MainBundle\Modele\Metier\Voilier;
use PDO;

class VoilierDAO {
	
 public static function getListVoilier ($id) {
//         $bdd = Connect::ConnectBDD();
//         $voilier = array();
//         $sql = "select * from voilier where IDMBR='$id'";
//         $req=$bdd->prepare($sql);
//         $req->execute();
//         $voilier = $req->fetchall();
//         return $voilier;   
 		$pdo = Connect::ConnectBDD();
 		$sql = "select * from voilier where IDMBR='$id'";
 		$result = $pdo->query($sql);
 		$result->setFetchMode(PDO::FETCH_OBJ);
 		$tvoiliers = array();
 		while( $ligne = $result->fetch() ) // on récupère la liste
 		{
 			$tVoilier = new Voilier($ligne->NUMVOIL, $ligne->NUMCLAS, $ligne->IDMBR, $ligne->NOMVOIL, $ligne->NBRPTS);
 			array_push($tvoiliers, $tVoilier);
 		}
 		$result->closeCursor(); // on ferme le curseur des résultats
 		return $tvoiliers;
    }
    
 public static function ValidationVoilier ($numvoil) {
    	$bdd = Connect::ConnectBDD();
    	$voilier = array();
    	$sql = "select * from voilier where NUMVOIL ='$numvoil'";
    	$req = $bdd->prepare($sql);
    	$req->execute();
    	$voilier = $req->fetchAll();
    	return $voilier;
    }
}