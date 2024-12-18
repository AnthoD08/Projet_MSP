<?php
if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])){
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = :id");
    $stmt->bindParam(':id', $_SESSION['id_user']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>