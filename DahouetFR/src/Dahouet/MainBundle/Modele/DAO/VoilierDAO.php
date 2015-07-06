<?php

// src/Dahouet/MainBundble/Modele/DAO/VoilierDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');
use Dahouet\MainBundle\Modele\Metier\Voilier;
use PDO;

class VoilierDAO {
	
	/**
	 * @param int $idMembre identifiant du membre possédant le bateau
	 * @return Voilier[]:
	 */
 public static function getListVoilier ($idMembre) {
//         $bdd = Connect::ConnectBDD();
//         $voilier = array();
//         $sql = "select * from voilier where IDMBR='$id'";
//         $req=$bdd->prepare($sql);
//         $req->execute();
//         $voilier = $req->fetchall();
//         return $voilier;   
 		$pdo = Connect::ConnectBDD();
 		$sql = "select * from voilier where IDMBR='$idMembre'";
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
    
    /**
     * Récupère un voilier
     * @param int $numVoil
     * @return Voilier|bool false si pas de réponse
     */
    public static function getVoilier($numVoil) {
    	try {
    		$pdo = Connect::ConnectBDD();
    		$sql = 'select * from voilier where NUMVOIL = '. $numVoil .';';
    		$result = $pdo->query($sql);
    		$result->setFetchMode(PDO::FETCH_OBJ);
    		$ligne = $result->fetch();
    		if ($result->rowCount()==0){
    			$voilier = false;
    		}else{
    			$voilier = new Voilier($ligne->NUMVOIL, $ligne->NUMCLAS, $ligne->IDMBR, $ligne->NOMVOIL, $ligne->NBRPTS);
    		}
    		$result->closeCursor(); // on ferme le curseur des résultats
    	}
    	catch (PDOException $e) {
    		echo 'Error ! : ',$e->getMessage(),'<br />';
    		die();
    	}
    	return $voilier;
    }
    
}