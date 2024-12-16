<?php

// Notre index.php à la racine du site nous sert de routeur :
$maRoute = explode('/', $_GET["route"]);

if (isset($maRoute[0])) {

    switch ($maRoute[0]) {

        case "":
        case "accueil":
            include("./php/accueil.php");
            break;

        case "contact":
            include("./php/contact.php");
            break;

        case "inscription":
            include("./php/inscription.php");
            break;

        case "connexion":
            include("./php/connexion.php");
            break;
            
        case "backoffice":
            include("./php/backoffice.php");
            break;

        case "profil":
            include("./php/profil.php");
            break;

        case "deconnexion":
            include("./php/deconnexion.php");
            break;


        case "une_recette":
            include("./php/une_recette.php");
            break;

        }
    }

