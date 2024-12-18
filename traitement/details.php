<?php
        $getAllEmprunts = "SELECT *
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
        INNER JOIN adherents
        ON adherents.id = emprunts.id_adherent
        INNER JOIN commentaires
        ON commentaires.id = emprunts.id_commentaire
        WHERE emprunts.id = :id";

        $AllEmprunts = $pdo->prepare($getAllEmprunts);
        $AllEmprunts->execute([
            'id' => $route[1],
        ]);

        $details = $AllEmprunts->fetch()
?>