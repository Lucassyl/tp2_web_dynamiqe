<?php
    declare(strict_types=1);
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Page bienvenue</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>
</head>
    
<body class="index-body">
    <?php
        include_once("includes/header.php");
    ?>
    <main class="index-main flex-fill min-vh-50">
        <h1 class="h1-main">Bienvenue!</h1>
        <div class="redirection-page-index">
            <div class="bouton-index">
                <button class="bouton-connexion-index"><a href="signin.php" class="lien-bouton-index">Connexion</a></button>
            </div>
            <?php
            //Implémenter le code php de la base de données pour afficher le pages
            $pages = new pagesDAO($conn);
            $pagesArray = $pages->getAllBySujetId($i);
            if(count($pagesArray) > 0)
            {
                foreach ($pagesArray as &$page)
                {
                    if($page->getVisibilite() == true)
                    {
                        echo '<div class="list-group-item collapse multi-collapse" id="multiCollapseExample'.$i.'"><a class="navbar-brand" href="#">'.$page->getNomMenu().'</a></div>';
                        echo '<button class="bouton-connexion-index"><a href="index.php" class="lien-bouton-index" onclick="">Déconnexion</a></button>';
                    }
                }
            }
            else
            {
                echo '<li class="list-group-item  collapse multi-collapse" id="multiCollapseExample'.$i.'"><p class="navbar-brand">pas de pages pour ce sujet</p></li>';
            }
            ?>
            <!-- Bouton temporaire de test  -->
            <div class="bouton-index">
                <button class="bouton-connexion-index"><a href="index.php" class="lien-bouton-index" onclick="">Déconnexion</a></button>
            </div>
            <?php
            //Problème ici à régler pour enlever le message dans le footer
            if (isset($_POST['deconnexion']))
            {
                session_destroy();
            }
            ?>
        </div>
    </main>
    <?php include_once('includes/footer.php'); ?>
</body>
</html>