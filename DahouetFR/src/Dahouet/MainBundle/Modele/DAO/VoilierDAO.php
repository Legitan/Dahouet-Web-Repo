<?php

// src/Dahouet/MainBundble/Modele/DAO/VoilierDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');

class VoilierDAO {
	
 public static function selectVoilier ($id) {
        $bdd = Connect::ConnectBDD();
        $boat = array();
        $sql = "select * from voilier where IDMBR='$id'";
        $req=$bdd->prepare($sql);
        $req->execute();
        $boat = $req->fetchall();
        return $boat;      
    }
}