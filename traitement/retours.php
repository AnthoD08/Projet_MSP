<?php
    $getAllRetours = "SELECT emprunts.*, batiments.batiment, livres.titre, etages.etage
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
    WHERE utilisateurs.id = :id
    AND emprunts.date_retour IS NOT NULL";

    $allRetours = $pdo->prepare($getAllRetours);
    $allRetours->execute([
        'id'=> $_SESSION['user_id'],
    ]);
    $retours = $allRetours->fetchAll();
    
    
?>