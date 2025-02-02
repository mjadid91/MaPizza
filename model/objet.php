<?php
class objet {
    public function get($attribut){
        return $this->$attribut;
    }
    public function set($attribut, $valeur) : void{
         $this->$attribut = $valeur;
    }

    public static function getAll() {
        // récupère informations de toutes une table
        $classeRecuperee = static::$classe;
        $requete = "SELECT * FROM $classeRecuperee;";
        $resultat = connexion::pdo()->query($requete);
        $resultat->setFetchmode(PDO::FETCH_CLASS, $classeRecuperee);
        $tableau = $resultat->fetchAll();
    
        return $tableau;
    }

    public static function getOne($id){
        // récupère toutes informations d'une ligne de la table
        $classeRecuperee = static::$classe;
        $identifiant = static::$identifiant;

        $requetePreparee = "SELECT * FROM $classeRecuperee WHERE $identifiant = :id_tag;";
        $resultat = connexion::pdo()->prepare($requetePreparee);

        $tags = array("id_tag" => $id);
        try{
            $resultat->execute($tags);
            $resultat->setFetchmode(PDO::FETCH_CLASS,$classeRecuperee);

            $element = $resultat->fetch();
            return $element;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function insertTable() {
        // insère un élément dans une table
        $attributs = get_object_vars($this);
        $classeRecuperee = static::$classe;

        $colonnes = implode(", ", array_keys($attributs));
        $valeurs = ":" . implode(", :", array_keys($attributs));
    
        $requete = "INSERT INTO $classeRecuperee ($colonnes) VALUES ($valeurs);";
        $resultat = connexion::pdo()->prepare($requete);

        try {
            $resultat->execute($attributs);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>