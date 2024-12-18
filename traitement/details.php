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

        $details = $AllEmprunts->fetch();

        if(isset($details['date_retour']) && !empty($details['date_retour'])){
            $transit = true;
            $askReceveur = "SELECT identifiant, batiment, etage
            FROM utilisateurs 
            INNER JOIN emprunts
            ON emprunts.receveur = utilisateurs.id
            INNER JOIN batiments
            ON batiments.id = utilisateurs.id_batiment
            INNER JOIN etages
            ON etages.id = utilisateurs.id_etage
            WHERE emprunts.id = :id";
    
            $receveur = $pdo->prepare($askReceveur);
            $receveur->execute([
                'id' => $route[1],
            ]);
    
            $user = $receveur->fetch();
    
        }else{
            $transit = false;
        }
?>