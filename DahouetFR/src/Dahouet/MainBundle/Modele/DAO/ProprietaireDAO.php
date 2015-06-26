<?php

// src/Dahouet/MainBundble/Modele/DAO/ProprietaireDAO

namespace Dahouet\MainBundle\Modele\DAO;

include_once('Connect.php');

class ProprietaireDAO {
	
    public static function ConnexionProprietaire ($idmbr, $pwmbr) {   
        try {
            // Connexion à la base de données
            $bdd = Connect::ConnectBDD();
            $sql = "select IDMBR, NOMMBR from proprietaire where IDMBR = '$idmbr' && PWMBR = '$pwmbr';";
            $req = $bdd->prepare($sql);
            $req->execute();
            $proprietaire = $req->fetchAll();
        }
        catch (PDOException $e) {
            echo 'Error ! : ',$e->getMessage(),'<br />';
            die();
        }
        return $proprietaire;
    }
}