<?php
    $getAllEmprunts = "SELECT * 
    FROM emprunts 
    INNER JOIN livres 
    ON livres.id = emprunts.ISBN 
    INNER JOIN genres 
    ON genre.id = livres.id_genre 
    INNER JOIN genres_etages
    ON genres_etages.id_genre = genres.id
    INNER JOIN etages
    ON etages.id = genres_etages.id_etage
    INNER JOIN etages_batiments
    ON etages.id = etages_batiments.id_etage
    INNER JOIN batiments
    ON batiments.id = etages_batiments.id_batiment
    INNER JOIN utilisateurs
    ON utilisateurs.id_batiment = batiments.id
    WHERE utilisateurs.id = :id";

    $allEmprunts = $pdo->prepare($getAllEmprunts);
    $allEmprunts->execute([
        'id'=> $_SESSION['id_user'],
    ]);

    $emprunts = $allEmprunts->fetchAll;
?>