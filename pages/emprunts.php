<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./include/head.html') ?>
    <title>Emprunts en cour</title>
</head>
<body>
    <header>
        <a id="back" href="">retour</a>
        <div>
            <h1>Emprunts</h1>
            <p>Batiment : 
                <?php
                    if(isset($emprunts) && sizeof($emprunts) > 0){
                        echo $emprunts[0]['batiment'] . " / " . $emprunts[0]['etage'];
                    }
                ?>
            </p>
        </div>
        
    </header>
    <main>
        <?php
            if(isset($emprunts) && sizeof($emprunts) > 0){
                foreach($emprunts as $emprunt){
        ?>
            <article class="article">
                <h2><?php echo $emprunt['titre']; ?></h2>
                <div class="ligne">
                    <a href="details/<?php echo $emprunt['id'] ?>">détails</a>
                    <p>Emprunté le : <?php echo $emprunt['date_emprunt'] ?></p>
                </div>
            </article>
        <?php
                }
            }
        ?>
    </main>
</body>
</html>