<?php
require_once("objet.php");
class contient extends objet{

    protected static string $classe = "contient";
    protected static string $identifiant = "IDCommande";
    //------------ attributs ---------------

    protected int $IDCommande;
    protected int $IDPizza ;
    protected int $quantitePizza;

    //------------ constructeur -----------

    public function __construct(int $IDCommande = NULL, int $IDPizza = NULL, int $quantitePizza = NULL) {
        if(!is_null($IDCommande)){
            $this->IDCommande = $IDCommande;
            $this->IDPizza = $IDPizza;
            $this->quantitePizza = $quantitePizza;
        }
    }



}   

?>