<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./include/head.html') ?>
    <title>Retours</title>
</head>
<body>
    <header>
        <a id="back" href="retours">retour</a>
        <div>
            <h1>Retours</h1>
            <p>Batiment : 
                <?php
                    if(isset($retours) && sizeof($retours) > 0){
                        echo $retours[0]['batiment'] . " / " . $retours[0]['etage'];
                    }
                ?>
            </p>
        </div>
        
    </header>
    <main>
        <?php
            if(isset($retours) && sizeof($retours) > 0){
                foreach($retours as $retour){
        ?>
            <article class="article">
                <h2><?php echo $retour['titre']; ?></h2>
                <div class="ligne">
                    <a href="details/<?php echo $retour['id'] ?>">détails</a>
                    <p>Rendu le : <?php echo $retour['date_retour'] ?></p>
                </div>
            </article>
        <?php
                }
            }
        ?>
    </main>
</body>
</html>