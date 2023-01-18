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
    <title>PDO - Ajout</title>
</head>
<body>

    <h1>Ajouter un vinyle</h1>

    <button><a href="disc.php">Retour à la liste des vinyles</a></button>

    <br>
    <br>

    <form action ="script_disc_ajout.php" method="post">

        <label for="title_for_label">Title</label><br>
        <input type="text" name="title" id="title_for_label">
        <br>
        
        <label for="nom_for_label">Artist</label><br>
        <select name="nom" id="nom_for_label" class="col-12">
            <option disabled selected>Sélectionner un artiste</option>
            <?php foreach($tableauD as $disc):?>
                <option value="<?=$disc->artist_id?>"><?=$disc->artist_name?></option>
            <?php endforeach; ?>
        </select>
        

        <br><br>

        <label for="annee_for_label">Year</label><br>
        <input type="text" name="year" id="annee_for_label">
        <br><br>

        <label for="genre_for_label">Genre</label><br>
        <input type="text" name="genre" id="genre_for_label">
        <br><br>

        <label for="label_for_label">Label</label><br>
        <input type="text" name="label" id="label_for_label">
        <br><br>

        <label for="price_for_label">Price</label><br>
        <input type="text" name="price" id="price_for_label">
        <br><br>

        <label for="fichier_for_label">Picture</label><br>
        <input type="file" name="fichier" id="fichier_for_label">
        <br><br>

        <input type="submit" value="Ajouter">

    </form>
</body>
</html>