<?php
    // Récupération du Nom :
    if (isset($_POST['title']) && $_POST['title'] != "") {
        $title = $_POST['title'];
    }
    else {
        $title = Null;
    }

    // Récupération de l'URL (même traitement, avec une syntaxe abrégée)
    $artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;
    $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $picture = (isset($_POST['fichier']) && $_POST['fichier'] != "") ? $_POST['fichier'] : Null;
    
    // En cas d'erreur, on renvoie vers le formulaire
    if ($title == Null || $artist == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $picture == Null) {
        header("Location: disc_new.php");
        exit;
    }

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête INSERT sans injection SQL :
        $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_genre, disc_label, disc_price, disc_picture) VALUES (:title, :year, :genre, :label, :price, :fichier);");
        $requete2 = $db->prepare("INSERT INTO artist (artist_name) VALUES (:artist);");
    
        // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":fichier", $picture, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_STR);
        $requete2->bindValue(":artist", $artist, PDO::PARAM_STR);
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
    
        // Lancement de la requête :
        $requete->execute();
        $requete2->execute();
    
        // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
        $requete->closeCursor();
        $requete2->closeCursor();
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