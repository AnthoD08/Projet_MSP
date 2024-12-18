<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./include/head.html') ?>
    <title>Emprunts en cour</title>
</head>
<body>
    <header>
        <a id="back" href="">retour</a>
        <h1>Emprunts</h1>
        <p>
            <?php 
                if(isset($emprunts) && sizeof($emprunts) > 0){
                    echo $emprunts[0]['batiment'] . " , " . $emprunts[0]['etage'];
                }
            ?>
        </p>
    </header>
    <main>
        if(isset($emprunts) && sizeof($emprunts) > 0){
                    echo $emprunts[0]['batiment'] . " , " . $emprunts[0]['etage'];
                }
    </main>
</body>
</html>