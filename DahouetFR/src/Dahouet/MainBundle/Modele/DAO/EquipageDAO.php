<?php

// src/Dahouet/MainBundble/Modele/DAO/EquipageDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');
use PDO;

class EquipageDAO {
	
   public static function SelectEquip () {
        $bdd = Connect::ConnectBDD();
        $equip = array();
        $sql = 'select * from licencie';
        $req = $bdd->prepare($sql);
        $req->execute();
        $equip = $req->fetchAll();
        return $equip;
    }
}