<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require('./includes/head.html') ?>
    <title>MSP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="connexion">

     


    <?php include('./traitement/connexion.php') ?>
    

    <div class="slider">
        <!-- <img src="images/bibliotheque.jpg" class="slider-background" alt="" /> -->
        <div class="slider-content">
            <h1 class="accueil-title font-bold text-xl">Bibliothèque de Baillac</h1>
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <!-- <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white-900">Connexion</h2> -->
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="" method="POST">
                        <div>
                            <label for="pseudo" class="block text-sm font-medium text-white">Identifiant</label>
                            <div class="mt-2">
                                <input type="text" name="inputName" id="pseudo" value="<?php echo $identifiant; ?>" autocomplete="pseudo" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-white">Mot de passe</label>
                            <div class="mt-2">
                                <input type="password" name="inputPassword" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>

                        <!-- Case à cocher pour mémoriser l'identifiant -->
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-white">Mémoriser l'identifiant</label>
                        </div>

                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>