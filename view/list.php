<main>
    <div class="container">
    <div class="menu-container">
        <h2>PIZZAS</h2>
        <div class="produit-container">
        <?php
        foreach ($tableauRecette as $recette) {
            $id = $recette->get("IDRecette");
            echo '<article>';

            echo '<h3>' . $recette->get("nomRecette") . '</h3>';
            echo '<h3>' . $recette->get("descriptionRecette") . '</h3>';
            echo '<h3>' . $recette->get("prixRecette") . '</h3>';

            echo "<a href='index.php?page=recette&action=ajouterPanier&IDRecette=$id'>ajouter</a>";
            echo '</article>';
        }
        ?>
        </div>
        <h2>ACCOMPAGNEMENT</h2>
        <div class="produit-container">
        <?php
        foreach ($tableauProduit as $accompagnement) {
            if( $accompagnement->get("typeProduit") == "accompagnement"){
                $id = $accompagnement->get("IDProduit");
                echo '<article>';
    
                echo '<h3>' . $accompagnement->get("nomProduit") . '</h3>';
                echo '<h3>' . $accompagnement->get("descriptionProduit") . '</h3>';
                echo '<h3>' . $accompagnement->get("prixProduit") . '</h3>';
    
                echo "<a href='index.php?page=produit&action=ajouterPanier&IDProduit=$id'>ajouter</a>";
                echo '</article>';
            }
        }
        ?>
        </div>
        <h2>BOISSON</h2>
        <div class="produit-container">
        <?php
        foreach ($tableauProduit as $boisson) {
            if( $boisson->get("typeProduit") == "boisson"){
                $id = $boisson->get("IDProduit");
                echo '<article>';
    
                echo '<h3>' . $boisson->get("nomProduit") . '</h3>';
                echo '<h3>' . $boisson->get("descriptionProduit") . '</h3>';
                echo '<h3>' . $boisson->get("prixProduit") . '</h3>';
    
                echo "<a href='index.php?page=produit&action=ajouterPanier&IDProduit=$id'>ajouter</a>";
                echo '</article>';
            }
        }
        ?>
        </div>
        <h2>DESSERT</h2>
        <div class="produit-container">
        <?php
        foreach ($tableauProduit as $dessert) {
            if( $dessert->get("typeProduit") == "dessert"){
                $id = $dessert->get("IDProduit");
                echo '<article>';
    
                echo '<h3>' . $dessert->get("nomProduit") . '</h3>';
                echo '<h3>' . $dessert->get("descriptionProduit") . '</h3>';
                echo '<h3>' . $dessert->get("prixProduit") . '</h3>';
    
                echo "<a href='index.php?page=produit&action=ajouterPanier&IDProduit=$id'>ajouter</a>";
                echo '</article>';
            }
        }
        ?>
        </div>
    </div>

    <div class="cart-container">
        <h2>CART</h2>
        <?php 
    for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
        echo "<li> " . $_SESSION['panier']['nomProduit'][$i] . "</li>";
        echo "<li> " . $_SESSION['panier']['descProduit'][$i] . "</li>";
        echo "<li> " . $_SESSION['panier']['qteProduit'][$i] . "</li>";
        echo '<br>';

    }
    echo "<p>Montant Total : " . controllerCommande::prixTotalPanier() ." €</p>";
    echo "<a href='index.php?page=commande&action=supprimerPanier'>ajouter</a>";
    echo "<a href='index.php?page=commande&action=supprimerPanier'>supprimer</a>";
    ?>
    </div>;
</main>