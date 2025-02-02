<?php 
require_once("./model/stat.php");
require_once("./model/ingredient.php");

class controllerStock {

    

    public static function affichage() {
        include("./view/debut.php");
        include("./view/menu.php");
        $tableauIngredient = ingredient::getAll();
        include("./view/stockView.php");
        include("./view/fin.php");
    }

}