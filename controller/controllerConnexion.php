<?php
require_once("controllerCommande.php");
require_once("./model/client.php");
class controllerConnexion {
    protected static string $classe = "client";
    protected static string $identifiant = "loginClient";
    protected static $champs = array(
        "login" => ["text", "identifiant"],
        "mdp" => ["password", "mot de passe"]
    );

    public static function affichage() {
        $champs = static::$champs;
        $classe = static::$classe;
        $identifiant = static::$identifiant;
        include("./view/debut.php");
        include("./view/menu.php");
        // gére la vue si le client est connecté ou non
        if (client::clientIsConnected() && isset($_SESSION['client']) ) include("./view/clientView.php");
        else if (isset($_GET['login']) && isset($_GET['mdp']))  self::traiterConnexion();
        else  include("./view/connexionView.php");

        include("./view/fin.php");
    }

    public static function traiterConnexion() {
        // récupération d'informations
        $login = $_GET['login'];
        $mdp = $_GET['mdp'];
        $client = client::getOne($login);
        
        if ($client && password_verify($mdp, $client->get('mdpClient'))) {
            $client->ajouterCompte();
            if(panier::prixTotalPanier() > 0)
                header("Location: index.php?page=paiement");
            else
                header("Location: index.php?page=commande");
        } else {
            header("Location: index.php?page=connexion");
        }
        
    }
    public static function deconnecterClient(){
        client::deconnecterClient();
        header("Location: index.php?page=connexion");
    }
}
?>