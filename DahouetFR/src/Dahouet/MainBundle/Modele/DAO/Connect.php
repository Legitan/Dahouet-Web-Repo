<?php

// src/Dahouet/MainBundble/Modele/DAO/Connect

namespace Dahouet\MainBundle\Modele\DAO;

use PDO;

class Connect {
    public static function ConnectBDD () { 
        $source = 'mysql:host=localhost;dbname=dahouet_complet';
        $user = 'root';
        $pass = '';
        try {
            $bdd = new PDO($source, $user, $pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
    }
}