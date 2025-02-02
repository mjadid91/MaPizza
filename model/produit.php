<?php
require_once("objet.php");
class produit extends objet{

    protected static string $classe = "produit";
    protected static string $identifiant = "IDProduit";
    //------------ attributs ---------------

    protected ?int $IDProduit;
    protected string $nomProduit;
    protected string $descriptionProduit;
    protected float $prixProduit;
    protected string $typeProduit;
    protected int $stockProduit;
    protected ?int $IDAlerte;

    //------------ constructeur -----------

    public function __construct(int $IDProduit = NULL, string $nomProduit = NULL, string $descriptionProduit = NULL,float $prixProduit = NULL,float $typeProduit = NULL, int $stockProduit = NULL,int $IDAlerte = NULL) {
        if(!is_null($IDProduit)){
            $this->IDProduit = $IDProduit;
            $this->nomProduit = $nomProduit;
            $this->descriptionProduit = $descriptionProduit;
            $this->prixProduit = $prixProduit;
            $this->typeProduit = $typeProduit;
            $this->stockProduit = $stockProduit;
            $this->IDAlerte = $IDAlerte;
        }
    }
}   

?>