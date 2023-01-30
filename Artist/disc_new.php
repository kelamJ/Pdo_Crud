<?php
// On charge l'enregistrement correspondant à l'ID passé en paramètre :
    require "db.php";
    $db = connexionBase();
    $requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
    $tableauD = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>PDO - Ajout</title>
</head>
<body>

    <h1>Ajouter un vinyle</h1>

    <br>


    <form action ="script_disc_ajout.php" method="post">

        <label for="title_for_label">Title</label><br>
        <input class="form-control col-4" placeholder="Enter title" type="text" name="title" id="title_for_label">
        <br>
        
        <label for="nom_for_label">Artist</label><br>
        <select class="form-control col-4" name="nom" id="nom_for_label" class="col-2">
            <option disabled selected>Sélectionner un artiste</option>
            <?php foreach($tableauD as $disc):?>
                <option value="<?=$disc->artist_id?>"><?=$disc->artist_name?></option>
            <?php endforeach; ?>
        </select>
        

        <br>

        <label for="annee_for_label">Year</label><br>
        <input class="form-control col-4" placeholder="Enter year" type="text" name="year" id="annee_for_label">
        <br>

        <label for="genre_for_label">Genre</label><br>
        <input class="form-control col-4" placeholder="Enter genre (Rock, Pop, Prog ...)" type="text" name="genre" id="genre_for_label">
        <br>

        <label for="label_for_label">Label</label><br>
        <input class="form-control col-4" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale ...)" type="text" name="label" id="label_for_label">
        <br>

        <label for="price_for_label">Price</label><br>
        <input class="form-control col-4" placeholder="Enter Price" name="price" id="price_for_label">
        <br>

        <label for="fichier_for_label">Picture</label><br>
        <input type="file" name="fichier" id="fichier_for_label">
        <br><br>

        <input class="btn-primary btn" type="submit" value="Ajouter">
        <a class="btn-primary btn" href="disc.php">Retour</a>

    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>