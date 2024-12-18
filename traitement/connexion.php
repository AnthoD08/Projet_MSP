<?php
    // Vérifier si le cookie "identifiant" existe pour pré-remplir le champ
    $identifiant = isset($_COOKIE['identifiant']) ? $_COOKIE['identifiant'] : '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $identifiant = htmlspecialchars($_POST['inputName']);
        $password = htmlspecialchars($_POST['inputPassword']);
        $remember = isset($_POST['remember']) ? true : false;

        if (!empty($identifiant) && !empty($password)) {
            try {
                $query = "SELECT * FROM utilisateurs WHERE identifiant = :identifiant";
                $stmt = $pdo->prepare($query);
                $stmt->execute(['identifiant' => $identifiant]);

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    if (password_verify($password, $user['mot_de_passe'])) {
                        session_regenerate_id(true);
                        session_set_cookie_params([
                            'lifetime' => 86400, // 24 heures
                            'secure' => true,     // Sur une connexion HTTPS
                            'httponly' => true,   // Accessibilité du cookie uniquement en HTTP
                            'samesite' => 'Strict' // Empêche les requêtes cross-site
                        ]);

                        // Enregistrement des données utilisateur dans la session
                        $_SESSION['identifiant'] = $user['identifiant'];
                        $_SESSION['id_user'] = $user['id_utilisateur'];

                        // Enregistrer l'identifiant dans un cookie si l'option est cochée
                        if ($remember) {
                            setcookie('identifiant', $identifiant, time() + (86400 * 30), "/"); // 30 jours
                        } else {
                            setcookie('identifiant', "", time() - 3600, "/"); // Supprimer le cookie
                        }

                        // Redirection vers la page de profil après la connexion réussie
                        header("Location: accueil");
                        exit();
                    } else {
                        echo "<p class='text-center bg-red-600 text-white'>Le pseudo ou le mot de passe est incorrect.</p>";
                    }
                } else {
                    echo "<p class='text-center bg-red-600 text-white'>Le pseudo ou le mot de passe est incorrect.</p>";
                }
            } catch (PDOException $e) {
                echo "<p class='text-center bg-red-600 text-white'>Erreur de base de données : " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p class='text-center bg-red-600 text-white'>Veuillez entrer un identifiant et un mot de passe.</p>";
        }
    }
    ?>