<?php 

require_once("./model/recette.php");
require_once("./model/ingredient.php");
require_once("./model/produit.php");
require_once("./model/panier.php");
require_once("./model/compose.php");

class controllerCommande {

    public static function affichage() {
        include("./view/debut.php");
        include("./view/menu.php");
        $tableauRecette = recette::getAll();
        $tableauProduit = produit::getAll();
        $tableauIngredient = ingredient::getAll();
        self::creationPanier();
        include("./view/commandeView.php");
        include("./view/fin.php");

    }

    public static function creationPanier() {
        panier::creationPanier();

    }

    public static function supprimerPanier() {
        panier::supprimerPanier();
        header("Location: index.php?page=commande");
    }

    public static function ajouterPanier() {
        // récupération d'informations
        $classeRecuperee = static::$classe;
        $identifiant = static::$identifiant;
        $idValeur = $_GET[$identifiant];
        $type = $_GET['type'];
        $recette = $classeRecuperee::getOne($idValeur);
        // recherche position de l'ID
        $pos = array_search($idValeur,$_SESSION['panier']['idProduit']);

        if ( $pos !== false && $type ==  $_SESSION['panier']['typeProduit'][$pos]){
            // si position ID présente alors on augmente la quantité
            $_SESSION['panier']['qteProduit'][$pos] += 1;
        }
        else{
            if ($recette) {
                // on ajoute au panier
                panier::ajouterAuPanier($recette,$classeRecuperee);
            }
        }

        header("Location: index.php?page=commande");
    }
    


    public static function supprimerProduitPanier() {
        // récupération d'informations
        $identifiant = static::$identifiant;
        // on supprime le produit du panier
        panier::supprimerProduitPanier($_GET[$identifiant],$_GET['type']);

        header("Location: index.php?page=commande");
    }

    public static function creePizza(){
        // création d'une recette avec ces paramètres
        $nouvelleRecette = new recette();

        $nouvelleRecette->set('IDRecette', null);
        $nouvelleRecette->set('nomRecette', $_GET['nomRecette']);
        $nouvelleRecette->set('descriptionRecette', $_GET['descRecette']);
        $nouvelleRecette->set('prixRecette', $_GET['prix']);

        $nouvelleRecette->insertTable();
        $idDerniereRecette = connexion::pdo()->lastInsertId(); // récupération de l'ID


        // crée la liaison entre la recette et les ingrédients
        $iCompose = 1;
        while(isset($_GET["ingredient$iCompose"])){
            $nouveaucompose = new compose();
            
            $nouveaucompose->set('IDIngredient',$_GET["ingredient$iCompose"]);
            $nouveaucompose->set('IDRecette', $idDerniereRecette);

            $nouveaucompose->insertTable();
            $iCompose++;
        }

        header("Location: index.php?page=commande");
    }

    public static function creeProduit(){
        // création d'un produit avec ces paramètres
        $nouvelleProduit = new produit();

        $nouvelleProduit->set('IDProduit', null);
        $nouvelleProduit->set('nomProduit', $_GET['nomProduit']);
        $nouvelleProduit->set('descriptionProduit', $_GET['descProduit']);
        $nouvelleProduit->set('prixProduit', $_GET['prix']);
        $nouvelleProduit->set('typeProduit', $_GET['type']);
        $nouvelleProduit->set('stockProduit', $_GET['stock']);

        $nouvelleProduit->insertTable();

        header("Location: index.php?page=commande");

    }
}

?>