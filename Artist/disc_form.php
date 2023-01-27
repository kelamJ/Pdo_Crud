<?php
// On charge l'enregistrement correspondant à l'ID passé en paramètre :
    require "db.php";
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ajout</title>
</head>
<body>

    <h1>Modifier un vinyle</h1>

    <form action ="script_disc_modif.php" method="post">
    <input hidden type="text" name="id" value="<?= $tableauF->disc_id?>">

        <label for="title_for_label">Title</label><br>
        <input class="form-control col-5" type="text" name="title" id="title_for_label" value="<?= $tableauF->disc_title ?>">
        <br>

        <label for="artist_for_label">Artist</label><br>
        <input class="form-control col-5" type="text" name="artist" id="artist_for_label" value="<?= $tableauF->artist_name ?>">        
        <br>

        <label for="year_for_label">Year</label><br>
        <input class="form-control col-5" type="text" name="year" id="year_for_label" value="<?= $tableauF->disc_year ?>">
        <br>

        <label for="genre_for_label">Genre</label><br>
        <input class="form-control col-5" type="text" name="genre" id="genre_for_label" value="<?= $tableauF->disc_genre ?>">
        <br>

        <label for="label_for_label">Label</label><br>
        <input class="form-control col-5" type="text" name="label" id="label_for_label" value="<?= $tableauF->disc_label ?>">
        <br>

        <label for="price_for_label">Price</label><br>
        <input class="form-control col-5" type="text" name="price" id="price_for_label" value="<?= $tableauF->disc_price ?>">
        <br>

        <label for="fichier_for_label">Picture</label><br>
        <input  type="file" name="fichier" id="fichier_for_label">
        <br>
        <input  value="" type="image" name="fichier" src="img/<?= $tableauF->disc_picture; ?>" width="275px" id="image_for_label<?php= $myArtist->disc_title; ?>">
        <br>

        <input class="btn btn-primary" type="submit" value="Modifier">
        <button class="btn btn-primary" ><a class="btn-primary" href="disc.php">Retour</a></button>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>