<?php
    $route = explode('/', $_GET['route']);

    //connexion PDO
    require('./bdd/pdo.php');
    switch ($route[0]){
        case "scanner": case "":
            
    }
?>