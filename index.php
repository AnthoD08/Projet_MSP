<?php
session_start();
include 'db.php';


$page = 'login';


if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
switch ($page) {
    case 'login':
        include 'login.php';
        break;
    case 'accueil':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit();
        }
        include 'accueil.php';
        break;
    case 'deconnexion':
        session_destroy();
        header("Location: index.php?page=login");
        exit();
    default:
        include 'login.php';
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>