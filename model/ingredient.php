<?php

require_once("objet.php");

class ingredient extends objet{

    protected static string $classe = "ingredient";
    protected static string $identifiant = "IDIngredient";
    //------------ attributs ---------------

    protected int $IDIngredient;
    protected string $nomIngredient;
    protected float $prixIngredient;
    protected int $stockIngredient;
    protected ?int $IDAlerte;


    //------------ constructeur -----------

    public function __construct(int $IDIngredient = NULL, string $nomIngredient = NULL, float $prixIngredient = NULL, int $stockIngredient = NULL, int $IDAlerte = NULL) {
        if(!is_null($IDIngredient)){
            $this->IDIngredient = $IDIngredient;
            $this->nomIngredient = $nomIngredient;
            $this->prixIngredient = $prixIngredient;
            $this->stockIngredient = $stockIngredient;
            $this->IDAlerte = $IDAlerte;
        }
    }


    //------------ toString ----------------

    public function __toString() : string{
        return "$this->nomIngredient";
    }

    public function get($attribut){
        return $this->$attribut;
    }
    public function set($attribut, $valeur) : void{
         $this->$attribut = $valeur;
    }


   public function getAlerte(){
        $requete = "SELECT quantiteAlerteStock FROM ingredient NATURAL JOIN alertestock WHERE IDAlerte = $this->IDAlerte;";
        $resultat = connexion::pdo()->prepare($requete);
        $resultat->execute();

        return $resultat->fetchColumn();
    }


    public static function getIngredientInPizza($id) {
        $classeRecuperee = static::$classe;
        $requete = "SELECT * FROM pizza NATURAL JOIN possede NATURAL JOIN ingredient WHERE IDPizza = $id;";
        $resultat = connexion::pdo()->query($requete);
        $resultat->setFetchmode(PDO::FETCH_CLASS, $classeRecuperee);
        $tableau = $resultat->fetchAll();
    
        return $tableau;
    }
}   

?>