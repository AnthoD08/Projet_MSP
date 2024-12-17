<?php
include 'db.php'; 

session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE identifiant = ? AND mot_de_passe = ?");
    $stmt->bind_param("ss", $identifiant, $mot_de_passe);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
     
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];
        header("Location: utilisateurs.php"); 
        exit();
    } else {
        $error = "Identifiant ou mot de passe incorrect.";
    }
}

$conn->close(); 
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
    <form action="" method="post">
    <h1>Bibliothèque de Baillac</h1>
        <label for="identifiant">Identification</label>
        <br>
        <input type="text" name="identifiant" required>
        <br>
        <label for="mot_de_passe">Mot de passe</label>
        <br>
        <input type="password" name="mot_de_passe" required>
        <br>
        <h4>Mémoriser l'identifiant</h4>
        <label class="switch">
            <input type="checkbox" name="remember">
            <span class="slider round"></span>
        </label>
        <button type="submit">Connexion</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <script src="script.js"></script>
</body>
</html>