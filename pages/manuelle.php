<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./include/head.html') ?>
    <title>Entrer manuelle</title>
</head>
<body>
    <main>

        <a id="back" class="scanBtn" href="">Annuler</a>

        <h1 id="titreManu">Entrer un code ISBN manuellement</h1>
        <form id="formManu">
            <label for="ISBN">ISBN : </label>
            <input type="number" id="ISBN" name="ISBN">
            <button type="submit">Valider</button>
        </form>
    </main>
    <script src="./script/scriptManu.js"></script>
    <script src="./script/ajax.js"></script>
</body>
</html>