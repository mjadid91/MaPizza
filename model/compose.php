<?php
require_once("objet.php");
class compose extends objet{

    protected static string $classe = "compose";
    protected static string $identifiant = "IDIngredient";
    //------------ attributs ---------------
    protected int $IDIngredient;
    protected int $IDRecette;

    //------------ constructeur -----------
    public function __construct(int $IDIngredient = NULL, int $IDRecette = NULL,) {
        if(!is_null($IDIngredient)){
            $this->$IDIngredient = $IDIngredient;
            $this->$IDRecette = $IDRecette;
        }
    }
}   

?>