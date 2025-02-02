<?php
require_once("controllerCommande.php");

class controllerIngredient extends controllerCommande {

    protected static string $classe = "ingredient";
    protected static string $identifiant = "IDIngredient";
    protected static $champs = array(
        "Ingrédient N°1",
        "Ingrédient N°2",
        "Ingrédient N°3",
        "Ingrédient N°4",
        "Ingrédient N°5",
    );
}
?>