<?php
    // Récupération du title :
    $title = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    // Récupération des autres
    $artist = (isset($_POST['artist']) && $_POST['artist'] != "") ? $_POST['artist'] : Null;
    $year = (isset($_POST['annee']) && $_POST['annee'] != "") ? $_POST['annee'] : Null;
    $genre = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $label = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $price = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    
    if(isset($_FILES['fichier'])){
        $tmpName = $_FILES['fichier']['tmp_name'];
        $name = $_FILES['fichier']['name'];
    }
    move_uploaded_file($tmpName,'./upload/'.$name);

$tabExtension = explode('.', $name);
$extension = strtolower(end($tabExtension));
$extensions = ['jpg', 'png', 'jpeg', 'gif'];

// Faire des id sur les artistes artist_id affiche null sur les ajouts
if(in_array($extension, $extensions)){
    move_uploaded_file($tmpName,'./Artist/upload/'.$name);
}
else{
    echo "Mauvaise extension";
}

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
        $requete = $db->prepare("INSERT INTO disc (disc.disc_title, disc.disc_year, disc.disc_genre, disc.disc_label, disc.disc_price, disc.disc_picture) 
        VALUES (:title, :annee, :genre, :label, :price, :fichier); 
        INSERT INTO artist (artist.artist_name) 
        VALUES (:artist)");
    
        // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":fichier", $picture, PDO::PARAM_STR);
        $requete->bindValue(":price", $price, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
        $requete->bindValue(":year", $year, PDO::PARAM_STR);
        $requete->bindValue(":artist", $artist, PDO::PARAM_STR);
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
    
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