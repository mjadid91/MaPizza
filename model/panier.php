<?php 



class panier {


    public static function creationPanier() {
        if (!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array(
                'idProduit' => array(),
                'nomProduit' => array(),
                'descProduit' => array(),
                'qteProduit' => array(),
                'prixProduit' => array(),
                'typeProduit' => array()
            );
         }

    }

    public static function supprimerPanier() {
            $_SESSION['panier'] = array(
                'idProduit' => array(),
                'nomProduit' => array(),
                'descProduit' => array(),
                'qteProduit' => array(),
                'prixProduit' => array(),
                'typeProduit' => array()
            );

    }
    
    public static function ajouterAuPanier($produit,$classeRecuperee) {
        array_push($_SESSION['panier']['idProduit'], $produit->get("ID".ucfirst($classeRecuperee)));
        array_push($_SESSION['panier']['nomProduit'], $produit->get("nom".ucfirst($classeRecuperee)));
        array_push($_SESSION['panier']['descProduit'], $produit->get("description".ucfirst($classeRecuperee)));
        array_push($_SESSION['panier']['qteProduit'], 1); 
        array_push($_SESSION['panier']['prixProduit'], $produit->get("prix".ucfirst($classeRecuperee)));
        if ($produit instanceof recette) 
            array_push($_SESSION['panier']['typeProduit'], "pizza");
        else
            array_push($_SESSION['panier']['typeProduit'], "produit");
    }

    public static function supprimerProduitPanier($idValeur,$type) {
        $result = array(
            'idProduit' => array(),
            'nomProduit' => array(),
            'descProduit' => array(),
            'qteProduit' => array(),
            'prixProduit' => array(),
            'typeProduit' => array()
        );

        for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++ ){
            if ( !($_SESSION['panier']['typeProduit'][$i] == $type && $_SESSION['panier']['idProduit'][$i] == $idValeur)) {
                array_push($result['idProduit'],$_SESSION['panier']['idProduit'][$i]);
                array_push($result['nomProduit'],$_SESSION['panier']['nomProduit'][$i]);
                array_push($result['descProduit'],$_SESSION['panier']['descProduit'][$i]);
                array_push($result['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                array_push($result['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
                array_push($result['typeProduit'],$_SESSION['panier']['typeProduit'][$i]);
            }
        }
        $_SESSION['panier'] = $result;
        unset($result);
    }

    public static function prixTotalPanier(){
        $total = 0;
        for($i = 0; $i < count($_SESSION['panier']['idProduit']) ; $i++){
            $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i]; 
        }
        return $total;
    }

}
?>