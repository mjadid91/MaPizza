<?php
require_once("objet.php");
class est_inclut extends objet{

    protected static string $classe = "est_inclut";
    protected static string $identifiant = "IDCommande";
    //------------ attributs ---------------

    protected int $IDCommande;
    protected int $IDProduit ;
    protected int $quantiteProduit;

    //------------ constructeur -----------

    public function __construct(int $IDCommande = NULL, int $IDProduit = NULL, int $quantiteProduit = NULL) {
        if(!is_null($IDCommande)){
            $this->IDCommande = $IDCommande;
            $this->$IDProduit = $IDProduit;
            $this->$quantiteProduit = $quantiteProduit;
        }
    }


}   

?>