<?php

class stat {

    public static function caJour(){
        $requete = "SELECT ChiffreAffaireJour(NOW()) ";
        $resultat = connexion::pdo()->prepare($requete);
        $resultat->execute();
        
        return $resultat->fetchColumn();
    }

    public static function caMois(){
        $requete = "SELECT ChiffreAffaireMois(NOW()) ";
        $resultat = connexion::pdo()->prepare($requete);
        $resultat->execute();

        return $resultat->fetchColumn();
    }
    public static function caAnnee(){
        $requete = "SELECT ChiffreAffaireAnnee(NOW()) ";
        $resultat = connexion::pdo()->prepare($requete);
        $resultat->execute();

        return $resultat->fetchColumn();
    }

    public static function achatJour(){
        $requete = "SELECT CoutAchatJour(NOW()) ";
        $resultat = connexion::pdo()->prepare($requete);
        $resultat->execute();

        return $resultat->fetchColumn();
    }

    public static function achatMois(){
        $requete = "SELECT CoutAchatMois(NOW()) ";
        $resultat = connexion::pdo()->prepare($requete);
        $resultat->execute();

        return $resultat->fetchColumn();
    }
    public static function achatAnnee(){
        $requete = "SELECT CoutAchatAnnee(NOW()) ";
        $resultat = connexion::pdo()->prepare($requete);
        $resultat->execute();

        return $resultat->fetchColumn();
    }

}

?>