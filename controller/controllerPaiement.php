<?php

require_once("controllerCommande.php");
require_once("./model/client.php");
require_once("./model/commande.php");
require_once("./model/paiement.php");
require_once("./model/contient.php");
require_once("./model/est_inclut.php");
class controllerPaiement {
    protected static string $classe = "paiement";
    protected static string $identifiant = "IDPaiement";

    protected static $champs = array(
        "numCarteBancairePaiement" => ["number", "Numero carte Bancaire"],
        "cryptogrammePaiement" => ["number", "Cryptogramme"],
        "nomPorteurCartePaiement" => ["text", "Nom du Porteur"],
        "datePeremptionCarte" => ["month", "Date Peremption"],
    );
    public static function affichage() {
        $champs = static::$champs;
        $classe = static::$classe;
        $identifiant = static::$identifiant;
        include("./view/debut.php");
        include("./view/menu.php");
        if ( isset($_GET['numCarteBancairePaiement']) )  self::creationCommande();
        else include("./view/paiementView.php");
        include("./view/fin.php");


    }

    public static function creationCommande() {
        if (isset($_SESSION['client'])) {
            // création d'une commande avec ces paramètres
            $nouvelleCommande = new commande();

            $nouvelleCommande->set('IDCommande', null);
            $nouvelleCommande->set('dateCommande', date("Y-m-d H:i:s"));
            $nouvelleCommande->set('montantCommande', panier::prixTotalPanier());
            $nouvelleCommande->set('typePaiementCommande', 'CB');
            $nouvelleCommande->set('statusCommande', 0);
            $nouvelleCommande->set('loginClient', $_SESSION['client']);
    
            $nouvelleCommande->insertTable();
            $idDerniereCommande = connexion::pdo()->lastInsertId(); // récupération de l'ID commande

            // création du paiement avec ces paramètres
            $nouveauPaiement = new paiement();
            $nouveauPaiement->set('IDPaiement', null);
            $nouveauPaiement->set('datePaiement', date("Y-m-d H:i:s"));
            $nouveauPaiement->set('montantPaiement', panier::prixTotalPanier());
            $nouveauPaiement->set('numCarteBancairePaiement', $_GET['numCarteBancairePaiement']);
            $nouveauPaiement->set('cryptogrammePaiement', $_GET['cryptogrammePaiement']);
            $nouveauPaiement->set('nomPorteurCartePaiement', $_GET['nomPorteurCartePaiement']);
            $nouveauPaiement->set('datePeremptionCarte', date("Y-m-d H:i:s", strtotime($_GET['datePeremptionCarte'])) );
            $nouveauPaiement->set('IDCommande', $idDerniereCommande );

            $nouveauPaiement->insertTable();

            // liaison des pizza et produis avec la commande
            for ($i = 0; $i < count($_SESSION["panier"]["idProduit"]); $i++){
                if($_SESSION["panier"]["typeProduit"][$i] == "pizza"){
                    $nouveauContient = new contient();
                
                    $nouveauContient->set('IDCommande',$idDerniereCommande);
                    $nouveauContient->set('IDPizza', $_SESSION["panier"]["idProduit"][$i]);
                    $nouveauContient->set('quantitePizza',$_SESSION["panier"]["qteProduit"][$i]);
    
                    $nouveauContient->insertTable();
                }
                else{
                    $nouveauInclut = new est_inclut();
                
                    $nouveauInclut->set('IDCommande',$idDerniereCommande);
                    $nouveauInclut->set('IDProduit', $_SESSION["panier"]["idProduit"][$i]);
                    $nouveauInclut->set('quantiteProduit',$_SESSION["panier"]["qteProduit"][$i]);
    
                    $nouveauInclut->insertTable();
                }
            }
            include("./view/finiView.php");
        }
        
    }

}

?>