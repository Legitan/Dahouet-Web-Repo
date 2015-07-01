<?php

// src/Dahouet/MainBundble/Modele/DAO/ParticipeDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');
use PDO;

class ParticipeDAO {
	
 public static function Participation ($numvoil) {
        $bdd = Connect::ConnectBDD();
        $particip = array ();
        $sql = "select * from participe where NUMVOIL != '$numvoil'";
        $req = $bdd->prepare($sql);
        $req->execute();
        $particip = $req->fetchAll();
        return $particip;
    }
}