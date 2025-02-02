<main>

    <div class="container">
        <div id="IDpopup" class="popup">
            <!-- pop up recette-->
            <div class="popup-recette">
                <span class="close">&times;</span>
                <h3>Ajouter Pizza</h3>
                <form action="index.php" method="get" class="formRecette">
                    <input type="hidden" name="page" value="commande">
                    <input type="hidden" name="action" value="creePizza">
                    <div>
                    <label for="nomRecette">nom</label>
                    <input type="text" name="nomRecette" placehorder="nomRecette" required>
                    </div>
                    <div>
                    <label for="descRecette">description </label>
                    <input type="text" name="descRecette" placehorder="descRecette" required>
                    </div>
                    <?php

                    for ($i = 1; $i < 6; $i++) {
                        echo "<div>";
                        echo "<label for=\"Ingredient$i\">Ingredient N°$i</label>";
                        echo "<select name='ingredient$i' required>";
                        echo "<option selected disabled>choissisez</option>";
                        for ($j = 0; $j < count($tableauIngredient); $j++) {
                            echo "<option value=" . $j . ">" . $tableauIngredient[$j]->get("nomIngredient") . "</option>";
                        }
                        echo "</select>";
                        echo "</div>";
                    }
                    
                    ?>
                    <div>
                    <label for="prix">prix </label>
                    <input type="number" step="0.01" name="prix" placehorder="prix" required>
                    </div>
                    <button type='submit'>créer</button>
                </form>
            </div>

            <!-- pop up produit-->
            <div class="popup-produit">
                <span class="close">&times;</span>
                <h3>Ajouter Produit</h3>
                <form action="index.php" method="get" class="formRecette">
                    <input type="hidden" name="page" value="commande">
                    <input type="hidden" name="action" value="creeProduit">
                    <div>
                    <label for="nomProduit">nom</label>
                    <input type="text" name="nomProduit" placehorder="nomProduit" required>
                    </div>
                    <div>
                    <label for="descProduit">description </label>
                    <input type="text" name="descProduit" placehorder="descProduit" required>
                    </div>
                    <div>
                    <label for="prix">prix </label>
                    <input type="number" step="0.01" name="prix" placehorder="prix" required>
                    </div>
                    <div>
                    <label for="type">type Produit</label>
                    <select name='type' required>
                    <option selected disabled>choissisez</option>
                    <option value="1">boisson</option>
                    <option value="2">dessert</option>
                    <option value="3">accompagnement</option>
                    </select>
                    </div>
                    <div>
                    <label for="stock">stock </label>
                    <input type="number" name="stock" placehorder="stock" required>
                    </div>
                    <button type='submit'>créer</button>
                </form>
            </div>


        </div>
        <div class="menu-container">
            <h2><span>PIZZAS :</span> Explorez vos désirs, choisissez votre aventure !</h2>
            <div class="produit-container">
                <?php
                foreach ($tableauRecette as $recette) {
                    $id = $recette->get("IDRecette");

                    echo '<article>';
                    if(file_exists("./img/pizzas/". $recette->get('nomRecette') .".png"))
                        echo '<div class="div-img-produit"><img class="img-produit" src="./img/pizzas/'. $recette->get("nomRecette") .'.png" ></div>';
                    else
                        echo '<div class="div-img-produit"><img class="img-produit" src="./img/pizzas/Margherita.png" ></div>';
                    echo '<p> PIZZA ' . strtoupper($recette->get("nomRecette")) . '</p>';
                    echo '<p>' . $recette->get("descriptionRecette") . '</p>';
                    echo '<p>' . $recette->get("prixRecette") . ' €'.'</p>';

                    echo '<div class="tools">';
                    echo "<a href='index.php?page=recette&action=ajouterPanier&IDRecette=$id&type=pizza'>ajouter</a>";

                    if (client::clientIsAdmin() || isset($_SESSION['isAdmin'])) {
                        echo '<a href="index.php?page=recette&action=modifier&IDRecette=$id"><img class = "modify" src="./img/modify.jpg" /></a>';
                    }
                    echo '</div>';
                    echo '</article>';
                }
                if (client::clientIsAdmin() || isset($_SESSION['isAdmin'])) {
                    echo '<a id="moreBtnR" class=""><article>';
                    echo '<img class="more" src="./img/plus.jpg"/>';
                    echo '</article></a>';
                }
                ?>
            </div>
            <h2><span>BOISSONS :</span> Choisissez votre rafraîchissement !</h2>
            <div class="produit-container">
                <?php
                foreach ($tableauProduit as $boisson) {
                    if ($boisson->get("typeProduit") == "boisson") {
                        $id = $boisson->get("IDProduit");
                        echo '<article>';

                        if(file_exists("./img/boissons/". $boisson->get('nomProduit') .".png"))
                            echo '<div class="div-img-produit"><img class="img-produit" src="./img/boissons/'. $boisson->get("nomProduit") .'.png" ></div>';
                        else
                            echo '<div class="div-img-produit"><img class="img-produit" src="./img/boissons/boissons.png" ></div>';
                        echo '<p>' . strtoupper($boisson->get("nomProduit")) . '</p>';
                        echo '<p>' . $boisson->get("descriptionProduit") . '</p>';
                        echo '<p>' . $boisson->get("prixProduit") . ' €'.'</p>';

                        echo '<div class="tools">';
                        echo "<a href='index.php?page=produit&action=ajouterPanier&IDProduit=$id&type=produit'>ajouter</a>";
                        if (client::clientIsAdmin() || isset($_SESSION['isAdmin'])) {
                            echo '<a href="index.php?page=recette&action=modifier&IDRecette=$id"><img class = "modify" src="./img/modify.jpg" /></a>';
                        }
                        echo '</div>';
                        echo '</article>';
                    }
                }
                // Bouton pour administrateur
                if (client::clientIsAdmin() || isset($_SESSION['isAdmin'])) {
                    echo '<a id="moreBtnBoisson" class=""><article>';
                    echo '<img class="more" src="./img/plus.jpg"/>';
                    echo '</article></a>';
                }
                ?>
            </div>

            <h2><span>ACCOMPAGNEMENTS :</span> Complétez votre repas !</h2>
            <div class="produit-container">
                <?php
                foreach ($tableauProduit as $dessert) {
                    if ($dessert->get("typeProduit") == "dessert" || $dessert->get("typeProduit") == "accompagnement") {
                        $id = $dessert->get("IDProduit");
                        echo '<article>';

                        if(file_exists("./img/accompagnements/". $dessert->get('nomProduit') .".png"))
                            echo '<div class="div-img-produit"><img class="img-produit" src="./img/accompagnements/'. $dessert->get("nomProduit") .'.png" ></div>';
                        else
                            echo '<div class="div-img-produit"><img class="img-produit" src="./img/accompagnements/accompagnement.png" ></div>';
                        echo '<p>' . strtoupper($dessert->get("nomProduit")) . '</p>';
                        echo '<p>' . $dessert->get("descriptionProduit") . '</p>';
                        echo '<p>' . $dessert->get("prixProduit") . ' €'.'</p>';

                        echo '<div class="tools">';
                        echo "<a href='index.php?page=produit&action=ajouterPanier&IDProduit=$id&type=produit'>ajouter</a>";
                        if (client::clientIsAdmin() || isset($_SESSION['isAdmin'])) {
                            echo '<a href="index.php?page=recette&action=modifier&IDRecette=$id"><img class = "modify" src="./img/modify.jpg" /></a>';
                        }
                        echo '</div>';
                        echo '</article>';
                    }
                }
                // Bouton pour administrateur
                if (client::clientIsAdmin() || isset($_SESSION['isAdmin'])) {
                    echo '<a id="moreBtnAccomp" class=""><article>';
                    echo '<img class="more" src="./img/plus.jpg"/>';
                    echo '</article></a>';
                }
                ?>
            </div>

        </div>

        <div class="panier-container">
            <div class="panier-titre">
            <h2>MA COMMANDE</h2>
            </div>
            <div class="panier-produit">
            <?php
            for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
                $id = $_SESSION['panier']['idProduit'][$i];
                $type = $_SESSION['panier']['typeProduit'][$i];
                echo "<div class='all-panier-produit'>";
                echo "<div class='info-panier-produit'>";
                echo "<li> " . $_SESSION['panier']['nomProduit'][$i] . "</li>";
                echo "<li> " . $_SESSION['panier']['descProduit'][$i] . "</li>";
                echo "</div>";
                echo "<div class='qte-panier-produit'>";
                echo "<p> " . $_SESSION['panier']['qteProduit'][$i] . "</p>";
                echo "</div>";
                echo "<div class='prix-panier-produit'>";
                echo "<p> " . $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i] . "€</p>";
                echo "</div>";
                echo "<a href='index.php?page=produit&action=supprimerProduitPanier&IDProduit=$id&type=$type'><img class='minus-logo' src='./img/minus.jpg'/></a>";
                echo "</div>";
                echo '<br>';
                

            }
            echo "</div>";
            echo '<div class="panier-montant">';
            echo "<p>Montant Total : </p><p>" . panier::prixTotalPanier() . " €</p>";
            echo "</div>";
            if (panier::prixTotalPanier() > 0){
                if (!client::clientIsConnected())
                    echo "<a class='payer-panier-produit' href='index.php?page=connexion&action=affichage'>PAYER</a>";
                else
                    echo "<a class='payer-panier-produit' href='index.php?page=paiement&action=affichage'>PAYER</a>";
            }
            ?>
        </div>;

    </div>
</main>