<?php

// src/Dahouet/MainBundble/Modele/DAO/VoilierDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');

class VoilierDAO {
	
 public static function selectVoilier ($id) {
        $bdd = Connect::ConnectBDD();
        $voilier = array();
        $sql = "select * from voilier where IDMBR='$id'";
        $req=$bdd->prepare($sql);
        $req->execute();
        $voilier = $req->fetchall();
        return $voilier;      
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