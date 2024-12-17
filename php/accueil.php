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

    <?php
    session_start();
    include './db/connexionBDD.php';

    // Assurez-vous que la connexion PDO utilise le mode exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    ?>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $identifiant = htmlspecialchars($_POST['inputName']);
        $password = htmlspecialchars($_POST['inputPassword']);

        // Vérification des champs non vides
        if (!empty($identifiant) && !empty($password)) {
            try {
                // Préparation et exécution de la requête pour récupérer l'utilisateur
                $query = "SELECT * FROM utilisateurs WHERE identifiant = :identifiant";
                $stmt = $pdo->prepare($query);
                $stmt->execute(['identifiant' => $identifiant]);

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    if (password_verify($password, $user['mot_de_passe'])) {
                        // Sécurisation de la session
                        session_regenerate_id(true);
                        session_set_cookie_params([
                            'lifetime' => 86400, // 24 heures
                            'secure' => true,     // Sur une connexion HTTPS
                            'httponly' => true,   // Accessibilité du cookie uniquement en HTTP
                            'samesite' => 'Strict' // Empêche les requêtes cross-site
                        ]);

                        // Enregistrement des données utilisateur dans la session
                        $_SESSION['identifiant'] = $user['identifiant'];
                        $_SESSION['id_utilisateur'] = $user['id_utilisateur'];

                        // Message de débogage
                        echo "Connexion réussie, redirection vers le profil...<br>";

                        // Redirection vers la page de profil après la connexion réussie
                        header("location: profil");
                        exit();
                    } else {

                        echo "<p class='text-center'>Le pseudo ou le mot de passe que vous avez saisi est incorrect. Veuillez réessayer.</p>";
                    }
                } else {
                    echo '<p class="text-center">Le pseudo ou le mot de passe que vous avez saisi est incorrect. Veuillez réessayer.</p>';
                }
            } catch (PDOException $e) {
                echo "<p class='text-center'>Erreur de base de données : " . $e->getMessage() . "</p>";
            }
        } else {
            echo '<p class="text-center">Veuillez entrer un identifiant et un mot de passe.</p>';
        }
    }
    ?>


    <div class="slider">
        <img src="images/bibliotheque.jpg" class="slider-background" alt="" />
        <div class="slider-content">
            <h1>Bibliothèque de Baillac</h1>
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <!-- <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white-900">Connexion</h2> -->
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="" method="POST">
                        <div>
                            <label for="Pseudo" class="block text-sm/6 font-medium text-white">Identifiant</label>
                            <div class="mt-2">
                                <input type="text" name="inputName" id="pseudo" autocomplete="pseudo" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm/6 font-medium text-white">Mot de passe</label>
                            <div class="mt-2">
                                <input type="password" name="inputPassword" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-orange-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>