<?php

// src/Dahouet/MainBundble/Modele/DAO/LicencieDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');
use Dahouet\MainBundle\Modele\Metier\Licencie;
use PDO;

class LicencieDAO {
	
   public static function SelectEquip () {
        $pdo = Connect::ConnectBDD();
        $equip = array();
        $sql = 'select * from licencie';
        $req = $pdo->prepare($sql);
        $req->execute();
        $equip = $req->fetchAll();
        return $equip;
    }
    
    public static function getListLicencies () {
    	$pdo = Connect::ConnectBDD();
    	$sql = "select * from licencie";
    	$result = $pdo->query($sql);
    	$result->setFetchMode(PDO::FETCH_OBJ);
    	$licencies = array();
    	while( $ligne = $result->fetch() ) // on récupère la liste
    	{
    		$licencie = new Licencie($ligne->NUMLIC, $ligne->NOMLIC, $ligne->PTSFFV, $ligne->ANNLIC, $ligne->DATNAISS);
    		array_push($licencies, $licencie);
    	}
    	$result->closeCursor(); // on ferme le curseur des résultats
    	return $licencies;
    }
}