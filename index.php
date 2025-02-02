<?php

session_start();

$page = "main";
$pages = ["main","commande","recette","produit","connexion","inscription","paiement","ingredient","stock","stat"];

if(isset($_GET["page"]) && in_array($_GET["page"], $pages)) {
    $page = $_GET["page"];
}

$action = "affichage";
$actions = ["affichage","ajouterPanier","supprimerPanier","connexion","supprimerProduitPanier","creePizza","creeProduit","deconnecterClient"];

if(isset($_GET["action"]) && in_array($_GET["action"], $actions)) {
    $action = $_GET["action"];
}

$controller = "controller".ucfirst($page);
require_once("./controller/$controller.php");
require_once("./config/connexion.php");

connexion::connect();
$controller::$action();
?>