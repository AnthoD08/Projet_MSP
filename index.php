<?php

// Notre index.php à la racine du site nous sert de routeur :
$maRoute = explode('/', $_GET["route"]);

if (isset($maRoute[0])) {

    switch ($maRoute[0]) {

        case "":
        case "accueil":
            include("./php/accueil.php");
            break;

        case "":
        case "emprunts":
            include("./php/emprunts.php");
            break;

        case "":
        case "retours":
            include("./php/retours.php");
            break;
    }
}
