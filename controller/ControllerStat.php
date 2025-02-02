<?php 
require_once("./model/stat.php");
class controllerStat {

    

    public static function affichage() {
        include("./view/debut.php");
        include("./view/menu.php");
        include("./view/statsView.php");
        include("./view/fin.php");

    }

}