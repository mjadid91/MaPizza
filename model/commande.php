<?php
require_once("objet.php");
class commande extends objet{

    protected static string $classe = "commande";
    protected static string $identifiant = "IDCommande";
    //------------ attributs ---------------

    protected ?int $IDCommande;
    protected string $dateCommande;
    protected float $montantCommande;
    protected string $typePaiementCommande;
    protected int $statusCommande;
    protected string $loginClient;

    //------------ constructeur -----------

    public function __construct(int $IDCommande = NULL, string $dateCommande = NULL, float $montantCommande = NULL,string $typePaiementCommande = NULL,int $statusCommande = NULL, string $loginClient = NULL) {
        if(!is_null($IDCommande)){
            $this->IDCommande = $IDCommande;
            $this->dateCommande = $dateCommande;
            $this->montantCommande = $montantCommande;
            $this->typePaiementCommande = $typePaiementCommande;
            $this->statusCommande = $statusCommande;
            $this->loginClient = $loginClient;
        }
    }

}   

?>