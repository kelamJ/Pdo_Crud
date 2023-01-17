<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id;");
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
            <td> <img src="img/<?= $disc->disc_picture ?>" alt="jaquette" height="150px" width="150px"></td>
            <td><?= $disc->disc_title ?></td>
            <td><?= $disc->artist_name ?></td>
            <td>Label :<?= $disc->disc_label ?></td>
            <td>Year :<?= $disc->disc_year ?></td>
            <td>Genre :<?= $disc->disc_genre ?></td>
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a href="disc_detail.php?id=<?= $disc->artist_id ?>">Détail</a></td>
        </tr>
        <?php endforeach; ?>

    </table>
<!-- 
// Fin de page : fermetures de blocs HTML -->
</body>
</html>