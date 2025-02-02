<?php 


class controllerMain{

    public static function affichage() {
        include("./view/debut.php");
        include("./view/menu.php");
        client::creeCompte();
        include("./view/fin.php");

    }



}
?>