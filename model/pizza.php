<?php
require_once("objet.php");
class pizza extends objet{

    protected static string $classe = "pizza";
    protected static string $identifiant = "IDPizza";
    //------------ attributs ---------------

    protected int $IDPizza;
    protected float $prixPizza;
    protected int $mettreEnAvantPizza;
    protected int $pretePizza;
    protected int $IDRecette;

    //------------ constructeur -----------

    public function __construct(int $IDPizza = NULL, float $prixPizza = NULL, int $mettreEnAvantPizza = NULL,int $pretePizza = NULL,int $IDRecette = NULL) {
        if(!is_null($IDPizza)){
            $this->IDPizza = $IDPizza;
            $this->prixPizza = $prixPizza;
            $this->mettreEnAvantPizza = $mettreEnAvantPizza;
            $this->pretePizza = $pretePizza;
            $this->IDRecette = $IDRecette;
        }
    }
}   

?>