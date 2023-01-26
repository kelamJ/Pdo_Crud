<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches de disc
    $requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id");
    $requete2 = $db->prepare("SELECT COUNT(disc_id) FROM disc");
    // on récupère tous les résultats trouvés dans une variable
    
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete2->execute();
    
    // on clôt la requête en BDD
    $requete->closeCursor();
    $result = $requete2->fetchColumn();

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
<div class="row">
    <div class="col-sm-6">
        <div class="card">

        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">

                </div>
            </div>
        </div> 
        <div class="row p-3">
            <h3 class="col-8 ">Liste des disques(<?= $result?>) </h3>
            <!-- Ici, on ajoute une colonne pour insérer un nouveau disque-->
            <button class="btn-primary" name="ajouter"><a class="btn-primary" href="disc_new.php">Ajouter</a></button>
        </div>
    <table>

        <?php foreach ($tableau as $disc): ?>
        <tr>
                <td hidden name="id" value="<?=$disc->disc_id?>"></td>
                <td> 
                    <img class="flex-column" src="img/<?= $disc->disc_picture?>" alt="jaquette" height="150px" width="150px">
                </td>
                <td class="fs-6">
                    <span class="fs-1">
                        <?= $disc->disc_title ?>
                </span>
                <br>
                    <span class="fs-2">
                        <?= $disc->artist_name ?> <br>
                    </span>
                    <span class="fw-bold">
                        Label :</span><?= $disc->disc_label ?> <br>
                    <span class="fw-bold">
                        Year :</span><?= $disc->disc_year ?> <br>
                    <span class="fw-bold">
                        Genre :</span> <?= $disc->disc_genre ?> <br>
                        <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
                        <span class="">
                            <a class="btn-primary btn-sm" href="disc_detail.php?id=<?= $disc->disc_id ?>">Détails</a>
                        </span>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
<!-- 
// Fin de page : fermetures de blocs HTML -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>