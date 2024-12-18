<?php
include 'db.php'; 

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: connection.php");
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Récupérer les informations de l'utilisateur
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer les adhérents
    $stmt_adherents = $conn->prepare("SELECT * FROM adherents");
    $stmt_adherents->execute();
    $adherents = $stmt_adherents->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer les commentaires
    $stmt_commentaires = $conn->prepare("SELECT * FROM commentaires");
    $stmt_commentaires->execute();
    $commentaires = $stmt_commentaires->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer les emprunts en cours
    $stmt_emprunts = $conn->prepare("SELECT * FROM emprunts WHERE id_adherent = :user_id");
    $stmt_emprunts->bindParam(':user_id', $user_id);
    $stmt_emprunts->execute();
    $emprunts_en_cours = $stmt_emprunts->fetchAll(PDO::FETCH_ASSOC);
  
    // Récupérer l'historique des retours
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

    <h2>Adherents</h2>
    <ul>
        <?php foreach ($adherents as $emprunt): ?> 
            <li><?php echo htmlspecialchars($emprunt['adherent']); ?></li>
        <?php endforeach; ?>
    </ul>
    <h2>Emprunts en cours</h2>
    <details>
        <summary>Details</summary>
        
    </details>
    <ul>
        <?php foreach ($emprunts_en_cours as $emprunt): ?>
            <li><?php echo htmlspecialchars($emprunt['date_emprunt']); ?></li>
        <?php endforeach; ?>
    </ul>
    <h2>Historique des retours</h2>
    <details>
        <summary>Details</summary>
        <?php foreach ($commentaires as $commentaires): ?>
            <li><?php echo htmlspecialchars($commentaires['commentaire']); ?></li>
        <?php endforeach; ?>
    </details>
    <ul>
        <?php foreach ($historique_retours as $retour): ?>
            <li><?php echo htmlspecialchars($retour['date_retour']); ?></li>
        <?php endforeach; ?>
    </ul>
    <div id="scanner-container">
        <div id="result">Code-barres: <span id="code-barre-result"></span></div>
        <video id="scanner" autoplay></video>
    </div>

    <script src="scrypt.js"></script>
</body>
</html>