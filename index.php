<?php
session_start();
$maroute = explode('/', $_GET['route']);

//connexion PDO
require('./db/connexionBDD.php');
switch ($maroute[0]) {
    case "":
    case "accueil":
        if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])){
            
            include('./pages/accueil.php');
        }else{
            include('./pages/connexion.php');
        }
        break;
        
    case "scanner":
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

        
        include('./pages/retours.php');
        break;

    case "connexion":

        include('./pages/connexion.php');
        break;

    case "deconnexion":

        include('./traitement/deconnexion.php');
        break;

    case "details":

        if (isset($maroute[1]) && is_numeric($maroute[1])) {
            include('./traitement/details.php');
            include('./pages/details.php');
        } else {
            include('./traitement/emprunts.php');
            include('./pages/emprunts.php');
        }
        break;
    
    case "profil":
        include('./pages/profil.php');
        break;
    default:
        include('./pages/404.html');
        break;
}
