<?php
session_start();
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Requête pour vérifier les identifiants
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE identifiant = :identifiant AND mot_de_passe = :mot_de_passe");
    $stmt->bindParam(':identifiant', $identifiant);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role_id'] = $user['id_role']; 

        header("Location: utilisateurs.php"); 
        exit();
    } else {
        $error = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="identifiant">Identifiant :</label>
        <input type="text" name="identifiant" required>
        <br>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
