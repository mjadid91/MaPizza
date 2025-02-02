
<div class="stock-container">
    <h3>Gestion des Stocks</h3>
    <div class="ingredient-div">
    <table>
        <thead>
            <tr>
                <th scope='col'>ingrédient</th>
                <th scope='col'>stock</th>
                <th scope='col'>alerte</th>
                <th style='display:none' scope='col'></th>
            </tr>
        </thead>
        <tbody>
        
        <?php 
            for ($j = 0; $j < count($tableauIngredient); $j++){
                echo '<tr>';
                echo '<form action="index.php" method="get" >';
                echo '<input type="hidden" name="page" value="stock">';
                echo '<input type="hidden" name="action" value="ajouterIngredient">';
                echo '<input type="hidden" name="idIngredient" value="'.($j+1).'">';
                echo ' <td>'. $tableauIngredient[$j] . '</td>';
                echo ' <td><input class="inputStock" type="number" name="stock'.$j.'" placehorder="stock'.$j.'" value="'.$tableauIngredient[$j]->get("stockIngredient").'" data-initial-value="'.$tableauIngredient[$j]->get("stockIngredient").'" onchange="checkDifference(this,'.$j.')" required></td>';
                echo ' <td><input class="inputStock" type="number" name="alerte'.$j.'" placehorder="alerte'.$j.'" value="'.$tableauIngredient[$j]->getAlerte() .'" data-initial-value="'.$tableauIngredient[$j]->getAlerte().'" onchange="checkDifference(this,'.$j.')" required></td>';
                echo ' <td style="display:none;border:none" class="btnValid'.$j.'"> <button type="submit" class="validButton"><img class = "valid" src="./img/valid.jpg" /></button></td>';
                echo ' </form>';
                echo '</tr>';
            }
        ?>
        
        </tbody>
    </table>

    </div>
    

    <h3>Ajouter un nouvel ingrédient</h3>
    <form action="index.php?action=ajouterIngredient" method="post" class="add-ingredient-form">
        <input type="text" name="nomIngredient" placeholder="Nom de l'ingrédient" required>
        <button type="submit">Ajouter</button>
    </form>
</div>
