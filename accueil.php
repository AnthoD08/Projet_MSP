<?php
include 'db.php'; 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}
$user_id = $_SESSION['user_id'];
try {
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt_utilisateurs = $conn->prepare("SELECT * FROM utilisateurs");
    $stmt_utilisateurs->execute();
    $utilisateurs = $stmt_utilisateurs->fetchAll(PDO::FETCH_ASSOC);

    $stmt_adherents = $conn->prepare("SELECT * FROM adherents");
    $stmt_adherents->execute();
    $adherents = $stmt_adherents->fetchAll(PDO::FETCH_ASSOC);

    $stmt_commentaires = $conn->prepare("SELECT * FROM commentaires");
    $stmt_commentaires->execute();
    $commentaires = $stmt_commentaires->fetchAll(PDO::FETCH_ASSOC);

    $stmt_emprunts = $conn->prepare("SELECT * FROM emprunts WHERE id_adherent = :user_id");
    $stmt_emprunts->bindParam(':user_id', $user_id);
    $stmt_emprunts->execute();
    $emprunts_en_cours = $stmt_emprunts->fetchAll(PDO::FETCH_ASSOC);
  
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
<div class="container">
    <div class="sidebar">
        <h2>Utilisateurs</h2>
        <ul>
            <?php foreach ($utilisateurs as $utilisateur): ?> 
                <li><?php echo htmlspecialchars($utilisateur['identifiant']); ?></li>
            <?php endforeach; ?>
        </ul>
        <p>Role : responsable</p>
    </div>

    <div class="main-content">
        <h2>Tableau de Bord</h2>
        <h2>Adhérents</h2>
        <ul>
            <?php foreach ($adherents as $adherent): ?> 
                <li><?php echo htmlspecialchars($adherent['adherent']); ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Emprunts en cours</h2>
        <details>
            <summary>Détails</summary>
        </details>
        <ul>
                <?php foreach ($emprunts_en_cours as $emprunt): ?>
                    <li><?php echo htmlspecialchars($emprunt['date_emprunt']); ?></li>
                <?php endforeach; ?>
            </ul>

        <h2>Historique des retours</h2>
        <details>
            <summary>Détails</summary>
            <ul>
                <?php foreach ($commentaires as $commentaire): ?>
                    <li><?php echo htmlspecialchars($commentaire['commentaire']); ?></li>
                <?php endforeach; ?>
            </ul>
        </details>
        <ul>
            <?php foreach ($historique_retours as $retour): ?>
                <li><?php echo htmlspecialchars($retour['date_retour']); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

    <script src="scrypt.js"></script>
</body>
</html>