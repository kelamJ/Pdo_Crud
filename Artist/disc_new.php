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

    <a href="disc.php"><button>Retour à la liste des vinyles</button></a>

    <br>
    <br>

    <form action ="script_disc_ajout.php" method="post" enctype="multipart/form-data">

        <label for="title_for_label">Title</label><br>
        <input type="text" name="title" id="title_for_label">
        <br><br>

        <label for="artist_for_label">Artist</label><br>
        <input type="text" name="artist" id="artist_for_label">
        <br><br>

        <label for="year_for_label">Year</label><br>
        <input type="text" name="year" id="year_for_label">
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