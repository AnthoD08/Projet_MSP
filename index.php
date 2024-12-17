<?php
include 'db.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];
}

$sql = "SELECT * FROM utilisateurs"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Identifiant: " . $row["identifiant"] . "<br>"; 
    }
} else {
    echo "0 results"; 
}

$conn->close(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <h1>Bibliothèque de Baillac</h1>
    <form action="">
        <label for="">Identification</label>
        <input type="text" name="identifiant" required>
        <br>
        <label for="">Mot de passe</label>
        <input type="password" name="mot_de_passe" required>
        <br>
        <h4>Mémoriser l'identifiant</h4>
        <label class="switch">
            <input type="checkbox" name="remember">
            <span class="slider round"></span>
        </label>
        <button type="submit">Connexion</button>
    </form>
    <script src="scrypt.js"></script>
</body>
</html>