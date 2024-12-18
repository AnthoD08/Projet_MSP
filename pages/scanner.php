<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Scanner</title>
    <script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
    <?php include('./includes/head.html') ?>
</head>

<body>
    <!-- Div to show the scanner -->
    <div id="scanner-container"></div>

    <a id="manuel" class="scanBtn" href="entrer-manuelle">Entrer les ISBN manuellement</a>
    <a id="back" class="scanBtn" href="">Annuler</a>

    <!-- Include the image-diff library -->
    <script src="./script/quagga.js"></script>

    <script src="./script/script.js"></script>
    <script src="./script/ajax.js"></script>
</body>

</html>