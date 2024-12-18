<?php
    $getAllBat = "SELECT batiment, etage
    FROM batiments
    INNER JOIN utilisateurs
    ON utilisateurs.id_batiment = batiments.id
    INNER JOIN etages
    ON etages.id = utilisateurs.id_etage
    WHERE utilisateurs.id_utilisateur = :id";
    $AllBat = $pdo->prepare($getAllBat);
    $AllBat->execute([
        'id'=>$_SESSION['id_user'],
    ]);

    $batiment = $AllBat->fetch();

    $getAllRetours = "SELECT emprunts.*, livres.titre
    FROM emprunts
    INNER JOIN livres
    ON emprunts.ISBN = livres.id
    INNER JOIN genres
    ON livres.id_genre = genres.id
    INNER JOIN genres_etages
    ON genres_etages.id_genre = genres.id
    INNER JOIN etages
    ON etages.id = genres_etages.id_etage
    INNER JOIN batiments
    ON batiments.id = genres_etages.id_batiment
    INNER JOIN utilisateurs
    ON utilisateurs.id_batiment = batiments.id
    WHERE utilisateurs.id_utilisateur = :id
    AND emprunts.date_retour IS NOT NULL";

    $allRetours = $pdo->prepare($getAllRetours);
    $allRetours->execute([
        'id'=> $_SESSION['id_user'],
    ]);
    $retours = $allRetours->fetchAll();
    
?>