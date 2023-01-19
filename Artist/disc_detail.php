<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDO - Détail</title>
    </head>
    <body>
        <label for="title_for_label">Title</label><br>
        <input value="<?php echo $myArtist->disc_title; ?>" type="text" name="title" id="title_for_label<?php echo $myArtist->disc_title; ?>">
        <br><br>
        <label for="artist_for_label">Artist</label><br>
        <input value="<?php echo $myArtist->artist_name; ?>" type="text" name="artist" id="artist_for_label<?php echo $myArtist->disc_title; ?>">
        <br><br>

        <label for="year_for_label">Year</label><br>
        <input value="<?= $myArtist->disc_year; ?>" type="text" name="year" id="year_for_label<?php echo $myArtist->disc_title; ?>">
        <br><br>

        <label for="genre_for_label">Genre</label><br>
        <input value="<?= $myArtist->disc_genre; ?>" type="text" name="genre" id="genre_for_label<?php echo $myArtist->disc_title; ?>">
        <br><br>

        <label for="label_for_label">Label</label><br>
        <input value="<?= $myArtist->disc_label; ?>" type="text" name="label" id="label_for_label<?php echo $myArtist->disc_title; ?>">
        <br><br>

        <label for="price_for_label">Price</label><br>
        <input value="<?= $myArtist->disc_price; ?>" type="text" name="price" id="price_for_label<?php echo $myArtist->disc_title; ?>">
        <br><br>

        <label for="fichier_for_label">Picture</label><br>
        <input value="" type="file" name="fichier" src="img/<?= $myArtist->disc_picture; ?>" width="250px" id="image_for_label<?php echo $myArtist->disc_title; ?>">
        <br><br>

        <button><a href="disc_form.php?id=<?=$myArtist->disc_id?>">Modifier</a></button>
        <button><a href="script_disc_delete.php?id=<?= $myArtist->disc_id ?>">Supprimer</a></button>
        <button><a href="disc.php">Retour</a></button>
    </body>
</html>