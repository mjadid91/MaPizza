<?php 
    require_once("./model/client.php");
?>
<header>
    <nav>
        <a href="index.php?page=main"><img class = "logo" src="./img/logo.jpg" /> </a>
        <div class = "nav-title">
            <a href="index.php?page=main">ACCUEIL</a>
            <a href='index.php?page=commande&action=affichage'>COMMANDER</a>
            <?php 
            if (client::clientIsAdmin() && isset($_SESSION['isAdmin'])){
                echo "<a href='index.php?page=stock'>STOCK</a>";
                echo "<a href='index.php?page=stat'>STATISTIQUES</a>";
            }
            ?>
        </div>
        <div class="compte"><a href="index.php?page=connexion"><img class="compte-logo" src="./img/compte.jpg"/></a></div>
    </nav>
</header>