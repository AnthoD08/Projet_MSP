<?php
include 'db.php'; 

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: connection.php");
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Requête pour obtenir les emprunts en cours
    $stmt_emprunts = $conn->prepare("SELECT * FROM emprunts WHERE id_adherent = :user_id");
    $stmt_emprunts->bindParam(':user_id', $user_id);
    $stmt_emprunts->execute();
    $emprunts_en_cours = $stmt_emprunts->fetchAll(PDO::FETCH_ASSOC);

    // Requête pour obtenir l'historique des retours
    $stmt_historique = $conn->prepare("SELECT * FROM emprunts WHERE id_adherent = :user_id");
    $stmt_historique->bindParam(':user_id', $user_id);
    $stmt_historique->execute();
    $historique_retours = $stmt_historique->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tableau de Bord</title>
</head>
<body>
    <p>Voici votre tableau de bord.</p>

    <h2>Emprunts</h2>
    <ul>
        <?php foreach ($emprunts_en_cours as $emprunt): ?>
            <li><?php echo htmlspecialchars($emprunt['livre_titre']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Historique des retours</h2>
    <ul>
        <?php foreach ($historique_retours as $retour): ?>
            <li><?php echo htmlspecialchars($retour['livre_titre']); ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Interface Scanner -->
    <div id="scanner-container">
        <div id="result">Code-barres: <span id="code-barre-result"></span></div>
        <video id="scanner" autoplay></video>
    </div>
    
    <script src="scrypt.js"></script>
</body>
</html>
