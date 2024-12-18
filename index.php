<?php
session_start();
$_SESSION['user_id'] = 2;
$maroute = explode('/', $_GET['route']);

//connexion PDO
require('./bdd/pdo.php');
switch ($maroute[0]) {
    case "scanner":
    case "":
        include('./pages/scanner.php');
        break;
    case "livre":
        if (isset($maroute[1]) && !empty($maroute[1]) && is_numeric($maroute[1])) {
            include('./pages/livre.php');
        }
        break;

    case "post-scanner":
        include('./traitement/post-scanner.php');
        break;

    case "scan-retour":
        include('./traitement/scan-retour.php');
        break;

    case "entrer-manuelle":
        include('./pages/manuelle.php');
        break;

    case "emprunts":
        include('./traitement/emprunts.php');
        include('./pages/emprunts.php');
        break;

    case "retours":

        include('./traitement/retours.php');
        include('./pages/retours.php');
        break;

    case "connexion":

        include('./php/connexion.php');
        break;

    case "details":

        if (isset($maroute[1]) && is_numeric($route[1])) {
            include('./traitement/details.php');
            include('./pages/details.php');
        } else {
            include('./traitement/emprunts.php');
            include('./pages/emprunts.php');
        }
        break;

    default:
        include('./pages/404.html');
        break;
}
