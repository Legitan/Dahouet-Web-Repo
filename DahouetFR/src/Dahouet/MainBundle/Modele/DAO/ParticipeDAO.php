<?php

// src/Dahouet/MainBundble/Modele/DAO/ParticipeDAO
namespace Dahouet\MainBundle\Modele\DAO;

include_once ('Connect.php');
use Dahouet\MainBundle\Modele\Metier\Participe;
use PDO;

class ParticipeDAO {
	
	/**
	 *
	 * @param int $numvoil        	
	 * @return Participe
	 */
	public static function getParticipation($numvoil) {
		$pdo = Connect::ConnectBDD ();
		$sql = "select * from participe where NUMVOIL = '$numvoil'";
		$result = $pdo->query ( $sql );
		$result->setFetchMode ( PDO::FETCH_OBJ );
		$ligne = $result->fetch ();
		if ($result->rowCount () == 0) {
			$participe = false;
		} else {
			$participe = new Participe ( $ligne->CODEPAR, $ligne->NUMVOIL, $ligne->NUMREG, $ligne->NUMLICSKI, $ligne->STATUT, $ligne->DATEINSC, $ligne->TPSREEL, $ligne->CODEDEC, $ligne->PLACE, $ligne->TPSCOMP, $ligne->HEURARR, $ligne->NUMPORT );
		}
		$result->closeCursor (); // on ferme le curseur des résultats
		return $participe;
    }
    
    public static function getListNoParticipation ($numvoil) {
    	$pdo = Connect::ConnectBDD();
    	$particip = array ();
    	$sql = "select * from participe where NUMVOIL != '$numvoil'";
    	$req = $pdo->prepare($sql);
    	$req->execute();
    	$particip = $req->fetchAll();
    	return $particip;
    }
    
    public static function InsertParticipe($numvoil, $numreg, $numlicski, $numport) {
    	$pdo = Connect::ConnectBDD();
    	$sql = "insert into participe (NUMVOIL, NUMREG, NUMLICSKI, DATEINSC, NUMPORT) values(".$numvoil.", ".$numreg.", ".$numlicski.", current_timestamp, ".$numport.");";
    	$req = $pdo->prepare($sql);
    	$req->execute();
    }
    public static function SelectParticipe($numvoil, $numreg, $numlicski) {
    	$pdo = Connect::ConnectBDD();
    	$sql = "select CODEPAR from participe where NUMVOIL = ".$numvoil." and NUMREG = ".$numreg." and NUMLICSKI = ".$numlicski.";";
    	$req = $pdo->prepare($sql);
    	$codepar = $req->execute();
    	return $codepar;
    }
}