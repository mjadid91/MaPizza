<?php
require_once("controllerCommande.php");
require_once("./model/client.php");
class controllerInscription{
    protected static string $classe = "client";
    protected static string $identifiant = "loginClient";
    protected static $champs = array(
        "login" => ["text", "identifiant"],
        "mdp" => ["password", "mot de passe"],
        "nom" => ["text", "nom"],
        "prenom" => ["text", "prenom"],
        "telephone" => ["text", "telephone"],
        "email" => ["text", "email"],
        "adresse" => ["text", "adresse"],
        "cp" => ["number", "code Postal"],
        "ville" => ["text", "ville"]
    );


    public static function affichage() {
        $champs = static::$champs;
        $classe = static::$classe;
        $identifiant = static::$identifiant;
        include("./view/debut.php");
        include("./view/menu.php");

        if (isset($_GET['login']) && isset($_GET['mdp']))  self::traiterInscription();
        else include("./view/inscriptionView.php");

        include("./view/fin.php");

    }

    public static function traiterInscription() {
        // création du client avec ces paramètres
        $nouveauClient = new client();
        $nouveauClient->set('loginClient', $_GET['login']);
        $nouveauClient->set('mdpClient', password_hash($_GET['mdp'], PASSWORD_DEFAULT));
        $nouveauClient->set('nomClient', $_GET['nom']);
        $nouveauClient->set('prenomClient', $_GET['prenom']);
        $nouveauClient->set('telephoneClient', $_GET['telephone']);
        $nouveauClient->set('emailClient', $_GET['email']);
        $nouveauClient->set('adresseClient', $_GET['adresse']);
        $nouveauClient->set('cpClient', $_GET['cp']);
        $nouveauClient->set('VilleClient', $_GET['ville']);

        $nouveauClient->insertTable();
        client::creeCompte();

        header("Location: index.php?page=connexion");
    }
}

?>