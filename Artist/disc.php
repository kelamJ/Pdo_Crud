<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches de disc
    $requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Disc page</title>
</head>
<body>
<!-- // Début de page : traitement PHP + entête HTML
// ... -->

    <table>
        <tr>
            <th>Liste des disques</th>
            <!-- Ici, on ajoute une colonne pour insérer un nouveau disque-->
            <th><button name="ajouter"><a href="disc_new.php">Ajouter</a></button></th>
        </tr>

        <?php foreach ($tableau as $disc): ?>
        <tr>
            <td> <img src="img/<?= $disc->disc_picture?>" alt="jaquette" height="150px" width="150px"></td>
            <td><?= $disc->disc_title ?></td>
            <td><?= $disc->artist_name ?></td>
            <td>Label :<?= $disc->disc_label ?></td>
            <td>Year :<?= $disc->disc_year ?></td>
            <td>Genre :<?= $disc->disc_genre ?></td>
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a href="disc_detail.php?id=<?= $disc->disc_id ?>">Détail</a></td>
        </tr>
        <?php endforeach; ?>

    </table>
<!-- 
// Fin de page : fermetures de blocs HTML -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>