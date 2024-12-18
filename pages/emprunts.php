<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./includes/head.html') ?>
    <title>Emprunts en cour</title>
</head>
<body>
    <header>
        <a id="back" href="accueil">retour</a>
        <div>
            <h1>Emprunts</h1>
            <p>Batiment : 
                <?php
                    if(isset($batiment) && !empty($batiment)){
                        echo $batiment['batiment'] . " / " . $batiment['etage'];
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