<?php
require_once("objet.php");
class client extends objet{

    protected static string $classe = "client";
    protected static string $identifiant = "loginClient";
    //------------ attributs ---------------

    protected string $loginClient;
    protected string $mdpClient;
    protected string $nomClient;
    protected string $prenomClient;
    protected string $telephoneClient;
    protected string $emailClient;
    protected string $adresseClient;
    protected int $cpClient;
    protected string $VilleClient;
    protected ?int $adminClient;

    //------------ constructeur -----------

    public function __construct(string $loginClient = NULL, string $mdpClient = NULL, string $nomClient = NULL,string $prenomClient = NULL,string $telephoneClient = NULL, string $emailClient = NULL, string $adresseClient = NULL, int $cpClient = NULL,string $VilleClient = NULL, int $adminClient = NULL) {
        if(!is_null($loginClient)){
            $this->loginClient = $loginClient;
            $this->mdpClient = $mdpClient;
            $this->nomClient = $nomClient;
            $this->prenomClient = $prenomClient;
            $this->telephoneClient = $telephoneClient;
            $this->emailClient = $emailClient;
            $this->adresseClient = $adresseClient;
            $this->cpClient = $cpClient;
            $this->VilleClient = $VilleClient;
            $this->adminClient = $adminClient;
        }
    }

    public static function creeCompte() {
        if (!isset($_SESSION['client'])){
            $_SESSION['client'] = NULL;
            $_SESSION['isAdmin'] = NULL;
        }
    }

    public function ajouterCompte() {
        $_SESSION['client'] = $this->loginClient;
        $_SESSION['isAdmin'] = $this->adminClient;
    }

    public static function clientIsConnected(){
        return isset($_SESSION['client']) && $_SESSION['client'] !== NULL;
    }

    public static function clientIsAdmin(){
        return isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1;
    }

    public static function deconnecterClient() {
        $_SESSION['client'] = NULL;
        $_SESSION['isAdmin'] = NULL;
        
    }
}   

?>