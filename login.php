<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE identifiant = :identifiant AND mot_de_passe = :mot_de_passe");
    $stmt->bindParam(':identifiant', $identifiant);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role_id'] = $user['id_role']; 

        header("Location: index.php?page=accueil"); 
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
    <link rel="stylesheet" href="styles.css">
    <title>Connexion</title>
</head>
<body>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <div class="login-box">
        <h1>Se connecter</h1>
        <form action="index.php?page=login" method="post">
            <div class="user-box">
                <input type="text" name="identifiant" required>
                <label for="identifiant">Identifiant :</label>
            </div>
            <div class="user-box">
                <input type="password" name="mot_de_passe" required>
                <label for="mot_de_passe">Mot de passe :</label>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>