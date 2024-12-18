<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./includes/head.html') ?>
    <title>Livres</title>
</head>
<body>
    <?php include('./traitement/scan-livre-info.php') ?>

    <main class="table">
        <a id="back" href="./scanner">Retour</a>

        <h1><?php echo $data['titre'] ?></h1>


        <?php
            if($transit == false){
        ?>
        
        <table>
            <tr>
                <td>ISBN</td>
                <td><?php echo $maroute[1] ?></td>
            </tr>
            <tr>
                <td>Emprunté le </td>
                <td><?php echo $data['date_emprunt'] ?></td>
            </tr>
            <tr>
                <td>semaine </td>
                <td><?php echo $data['semaine'] ?></td>
            </tr>
            <tr>
                <td>Par</td>
                <td><?php echo $data['adherent'] ?></td>
            </tr>
            <tr>
                <td>id adherent</td>
                <td><?php echo $data['id_adherent'] ?></td>
            </tr>
            <tr>
                <td>Etat</td>
                <td><?php echo $data['commentaire'] ?></td>
            </tr>
        </table>

        <?php if($data['semaine'] != 4){ ?>

            <form action="scan-retour" method="post">
                <input type="hidden" name="renew" id="renew" value="<?php echo $maroute[1] ?>">
                <button type="submit">Renouveler emprunt</button>
            </form>
        
        <?php } ?>

        <form action="scan-retour" method="post">
            <input type="hidden" name="retour" id="retour" value="<?php echo $maroute[1] ?>">
            <button type="submit">Retourner le livre</button>
        </form>
        <?php
            }else{
        ?>

            <table>
                <tr>
                    <td>ISBN</td>
                    <td><?php echo $maroute[1] ?></td>
                </tr>
                <tr>
                    <td>Rendu le </td>
                    <td><?php echo $data['date_retour'] ?></td>
                </tr>
                <tr>
                    <td>récupéré par</td>
                    
                    <td><?php echo $user['identifiant'] ?></td>
                </tr>
                <tr>
                    <td>Etat</td>
                    <td><?php echo $data['commentaire'] ?></td>
                </tr>
            </table>

        <?php
            }
        ?>  
    </main>
</body>
</html>