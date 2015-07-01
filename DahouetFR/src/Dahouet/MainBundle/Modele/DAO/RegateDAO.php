<?php

// src/Dahouet/MainBundble/Modele/DAO/RegateDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');
use Dahouet\MainBundle\Modele\Metier\Regate;
use PDO;

class RegateDAO {
	
    public static function SelectReg () {
        $bdd = Connect::ConnectBDD();
        $reg = array();
        $sql = 'select * from regate';
        $req = $bdd->prepare($sql);
        $req->execute();
        $reg = $req->fetchAll();
        return $reg;
    }
    
    public static function getRegate($numreg) {
    	try {
    		$pdo = Connect::ConnectBDD();
    		$sql = "select * from regate where NUMREG = '$numreg';";
    		$result = $pdo->query($sql);
    		$result->setFetchMode(PDO::FETCH_OBJ);
    		$ligne = $result->fetch();
    		$regate = new Regate($ligne->NUMREG, $ligne->CDOCHAL, $ligne->CODCOM, $ligne->LIBREG, $ligne->DATREG, $ligne->LIEUREG, $ligne->DISTANCE, $ligne->HEURDEP);
    		 
    		$result->closeCursor(); // on ferme le curseur des résultats
    	}
    	catch (PDOException $e) {
    		echo 'Error ! : ',$e->getMessage(),'<br />';
    		die();
    	}
    	return $regate;
    	 
    }
}