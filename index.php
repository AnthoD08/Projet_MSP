<?php
    $route = explode('/', $_GET['route']);

    //connexion PDO
    require('./bdd/pdo.php');
    switch ($route[0]){
        case "scanner":case "":
            include('./pages/scanner.php');
            break;
        case "livre":
            if(isset($route[1]) && !empty($route[1]) && is_numeric($route[1])){
                include('./pages/livre.php');
            }
            break;

        case "post-scanner":
            include('./traitement/post-scanner.php');
            break;

        case "retour":
            include('./traitement/retour.php');
            break;


    }
?>