<?php

// src/Dahouet/MainBundble/Modele/DAO/ProprietaireDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');
use Dahouet\MainBundle\Modele\Metier\Proprietaire;
use PDO;

class ProprietaireDAO {
	
    
    
    public static function getListProprietaire($idmbr, $pwmbr) {
    	try {
	    	$pdo = Connect::ConnectBDD();
	    	$sql = "select * from proprietaire where IDMBR = '$idmbr' && PWMBR = '$pwmbr';";
	    	$result = $pdo->query($sql);
	    	$result->setFetchMode(PDO::FETCH_OBJ);
	    	$ligne = $result->fetch();
		    $proprietaire = new Proprietaire($ligne->IDMBR, $ligne->IDCLUB, $ligne->NOMMBR, $ligne->MAILMBR, $ligne->PWMBR);
		    	
	    	$result->closeCursor(); // on ferme le curseur des résultats
	    	}
	    	catch (PDOException $e) {
	    		echo 'Error ! : ',$e->getMessage(),'<br />';
	    		die();
	    	}
	    	return $proprietaire;
	    	 
    }
}