<?php
    $infoLivres = "SELECT * 
    FROM livres 
    INNER JOIN langues 
    ON langues.id = livres.id_langue 
    INNER JOIN genres
    ON genres.id = livres.id_genre
    INNER JOIN emprunts
    ON emprunts.ISBN = livres.id
    INNER JOIN commentaires
    ON commentaires.id = emprunts.id_commentaire
    INNER JOIN adherents
    ON adherents.id = emprunts.id_adherent
    WHERE livres.ISBN = :isbn";

    $livre = $pdo -> prepare($infoLivres);
    $livre->execute([
        'isbn' => $maroute[1],
    ]);
    $data = $livre->fetch();
    if(isset($data['date_retour']) && !empty($data['date_retour'])){
        $transit = true;
        $askReceveur = 'SELECT identifiant 
        FROM utilisateurs 
        INNER JOIN emprunts 
        ON emprunts.receveur = utilisateurs.id_utilisateur
        INNER JOIN livres 
        ON livres.id = emprunts.ISBN 
        WHERE livres.ISBN = :isbn';

        $receveur = $pdo->prepare($askReceveur);
        $receveur->execute([
            'isbn' => $maroute[1],
        ]);

        $user = $receveur->fetch();

    }else{
        $transit = false;
    }
    
    if(!isset($data) || empty($data)){
        header('Location: ../scanner');
    }
?>