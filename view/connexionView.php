<main>
    <form action="index.php" method="get">
    <input type="hidden" name="page" value="connexion">
        <?php 
            foreach($champs as $champ => $details) {
                echo "<div>";
                echo "<label for=\"$champ\">$details[1]</label>";
                echo "<input type=\"$details[0]\" name=\"$champ\" placehorder=\"$details[1]\" required>";
                echo "</div>";
            }
        ?>
        <div id="bouton">
            <input type="submit" value="Se connecter">
        </div>
        <a href="index.php?page=inscription">S'inscrire</a>
</form>
</main>