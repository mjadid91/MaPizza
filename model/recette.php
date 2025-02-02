<?php
require_once("objet.php");
class recette extends objet{

    protected static string $classe = "recette";
    protected static string $identifiant = "IDRecette";
    //------------ attributs ---------------

    protected ?int $IDRecette;
    protected string $nomRecette;
    protected string $descriptionRecette;
    protected float $prixRecette;

    //------------ constructeur -----------
    public function __construct(int $IDRecette = NULL, string $nomRecette = NULL, string $descriptionRecette = NULL,float $prixRecette = NULL) {
        if(!is_null($IDRecette)){
            $this->IDRecette = $IDRecette;
            $this->nomRecette = $nomRecette;
            $this->descriptionRecette = $descriptionRecette;
            $this->prixRecette = $prixRecette;
        }
    }
}   

?>