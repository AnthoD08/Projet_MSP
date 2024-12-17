<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSP</title>
    <link rel="stylesheet" href="styles/styles.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php include('includes/navbar.html'); ?>
    <?php include './db/connexionBDD.php'; ?>

    <?php
    session_start();

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['id_utilisateur'])) {
        // Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
        header("Location: accueil");  // Remplacez login.php par le nom de votre page de connexion
        exit();
    }

    // Si l'utilisateur est connecté, afficher le profil
    ?>


    <div class="logout-container">
        <a class="bouton-deconnexion" href="deconnexion">Se déconnecter</a>
    </div>



</body>

</html>