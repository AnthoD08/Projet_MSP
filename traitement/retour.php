<?php

    if(isset($_POST['renew']) && !empty($_POST['renew'])){

        $askISBN = "SELECT id FROM livres WHERE ISBN = :isbn";
        $isbn = $pdo->prepare($askISBN);
        $isbn->execute([
            'isbn' => $_POST['renew'],
        ]);
        $id_livre = $isbn->fetch();
        
        $askRenew = "UPDATE emprunts SET semaine = semaine + 1 WHERE ISBN = :id";
        $renew = $pdo->prepare($askRenew);
        $renew->execute([
            'id' => $id_livre['id'],
        ]);
        header("Location: scanner");
        // A MODIFIER
        
    }else if(isset($_POST['retour']) && !empty($_POST['retour'])){

        $askISBN = "SELECT id FROM livres WHERE ISBN = :isbn";
        $isbn = $pdo->prepare($askISBN);
        $isbn->execute([
            'isbn' => $_POST['retour'],
        ]);
        $id_livre = $isbn->fetch();
        
        $date = date("Y-m-d");

        var_dump($id_livre);

        // A MODIFIER 
        $askRenew = "UPDATE emprunts SET date_retour = :retour, receveur = :user  WHERE ISBN = :id";
        $renew = $pdo->prepare($askRenew);
        $renew->execute([
            'retour' => $date,
            'user' => 1,
            'id' => $id_livre['id'],
        ]);

        header("Location: scanner");
        // A MODIFIER 

    }
?>