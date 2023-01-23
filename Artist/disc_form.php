<?php
// On charge l'enregistrement correspondant à l'ID passé en paramètre :
    require "db.php";
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");
    $requete->execute(array($_GET["id"]));
    $tableauF = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout</title>
</head>
<body>

    <h1>Disc n°<?php echo $tableauF->disc_id; ?></h1>

    <a href="disc.php">Retour à la liste des disques</a>

    <br>
    <br>

    <form action ="script_disc_modif.php" method="post">
    <input hidden type="text" name="id" value="<?= $tableauF->disc_id ?>">

        <label for="title_for_label">Title :</label><br>
        <input type="text" name="title" id="title_for_label" value="<?= $tableauF->disc_title ?>">
        <br><br>

        <label for="artist_for_label">Artist</label><br>
        <input type="text" name="artist" id="artist_for_label" value="<?= $tableauF->artist_name ?>">        <br><br>

        <label for="year_for_label">Year</label><br>
        <input type="text" name="year" id="year_for_label" value="<?= $tableauF->disc_year ?>">
        <br><br>

        <label for="genre_for_label">Genre</label><br>
        <input type="text" name="genre" id="genre_for_label" value="<?= $tableauF->disc_genre ?>">
        <br><br>

        <label for="label_for_label">Label</label><br>
        <input type="text" name="label" id="label_for_label" value="<?= $tableauF->disc_label ?>">
        <br><br>

        <label for="price_for_label">Price</label><br>
        <input type="text" name="price" id="price_for_label" value="<?= $tableauF->disc_price ?>">
        <br><br>

        <label for="fichier_for_label">Picture</label><br>
        <input type="file" name="fichier" id="fichier_for_label">
        <br><br>

        <input type="submit" value="Modifier">

    </form>
    <button><a href="disc.php">Retour</a></button>
</body>
</html>