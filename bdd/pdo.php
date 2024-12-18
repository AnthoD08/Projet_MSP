<?php
    try{
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=msp', 'root', '');

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        die('Erreur de connexion au serveur : ' .$e->getMessage());
    }
?>