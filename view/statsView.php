<main>

    <div class="stat">
        <h2>Statistiques</h2>
        <div class="stat-container">
            <article class="ca">
                <?php
                    echo "<p>Chiffre d'affaires du jour : " . stat::caJour() . "</p><br>";
                    echo "<p>Chiffre d'affaires du mois : " . stat::caMois() . " €</p><br>";
                    echo "<p>Chiffre d'affaires de l'année : " . stat::caAnnee() . " €</p><br>";
                ?>
            </article>
            <article class="achat">
               <?php
                    echo "<p>Chiffre d'achat du jour : " . stat::achatJour() . "</p><br>";
                    echo "<p>Chiffre d'achat du mois : " . stat::achatMois() . " €</p><br>";
                    echo "<p>Chiffre d'achat de l'année : " . stat::achatAnnee() . " €</p><br>";
               ?>
            </article>
        </div>
    </div>
</main>