<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('./includes/head.html') ?>
    <title>Détails</title>
</head>
<body>
    <main class="table">
        <a id="back" href="accueil">Retour</a>
        <h1><?php echo $details['titre'] ?></h1>
        <p><?php echo $details['resume'] ?></h2>
        <?php
            if($transit == false){
        ?>
        <table>
            <tr>
                <td>Emprunté le</td>
                <td><?php echo $details['date_emprunt'] ?></td>
            </tr>
            <tr>
                <td>Par</td>
                <td><?php echo $details['adherent'] ?></td>
            </tr>
            <tr>
                <td>id adherent</td>
                <td><?php echo $details['id_adherent'] ?></td>
            </tr>
            <tr>
                <td>Renouveler</td>
                <td><?php echo $details['semaine'] ?> semaine(s)</td>
            </tr>
            <tr>
                <td>Etat</td>
                <td><?php echo $details['commentaire'] ?></td>
            </tr>
        </table>
        <?php
            }else{
        ?>
        <table>
            <tr>
                <td>Emprunté le</td>
                <td><?php echo $details['date_emprunt'] ?></td>
            </tr>
            <tr>
                <td>Rendu le</td>
                <td><?php echo $details['date_retour'] ?></td>
            </tr>
            <tr>
                <td>Recupéré par</td>
                <td><?php echo $user['identifiant'] ?></td>
            </tr>
            <tr>
                <td>Batiment</td>
                <td><?php echo $user['batiment'] . " / " . $user['etage'] ?></td>
            </tr>
            <tr>
                <td>Etat</td>
                <td><?php echo $details['commentaire'] ?></td>
            </tr>
        </table>
        <?php
            }
        ?>  
    </main>
</body>
</html>