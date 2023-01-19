<?php
    // Récupération du title :
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    // Récupération des autres
    $nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $fichier = (isset($_POST['fichier']) && $_POST['fichier'] != "") ? $_POST['fichier'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($title == Null || $nom == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $fichier == Null) {
        header("Location: disc_new.php");
        exit;
    }

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête INSERT sans injection SQL :
        $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) 
        VALUES (:title, :year, :fichier, :label, :genre, :price, :nom);");
    
        // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_INT);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_INT);
        $requete->bindValue(":fichier", $fichier, PDO::PARAM_STR);
        // Lancement de la requête :
        $requete->execute();
    
        // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
        $requete->closeCursor();
    }
    
    // Gestion des erreurs
    catch (Exception $e) {
        var_dump($requete->queryString);
        var_dump($requete->errorInfo());
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_ajout.php)");
    }
    
    // Si OK: redirection vers la page artists.php
    header("Location: disc.php");
    
    // Fermeture du script
    exit;
    ?>