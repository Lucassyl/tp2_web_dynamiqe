<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header PHP</title>
</head>
<body>
<?php
    include_once("includes/connection.php");
    include("includes/sujetsDAO.class.php");
    include("includes/pagesDAO.class.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="./index.php">Accueil</a>
        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                    $sujets = new sujetsDAO($conn);
                    $sujetsArray = $sujets->getAllByPosition();
                    $nombreDeSujet = count($sujetsArray);
                    foreach ($sujetsArray as $sujet)
                    {
                        if($sujet->getVisibilite() == true)
                        {
                            ?>
                            <li class="nav-item">
                                <div class="" style="width: 18rem;">
                                <?php
                                    echo '<button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample'.$sujet->getId().'" aria-expanded="false" aria-controls="multiCollapseExample'.$sujet->getId().'">'.$sujet->getNom().'</button>';
                                ?>
                                </div>
                                <ul class="list-group list-group-flush">
                            <?php
                                for($i = 1; $i <= $nombreDeSujet; $i++)
                                {
                                    if($i == $sujet->getId())
                                    {
                                        $pages = new pagesDAO($conn);
                                        $pagesArray = $pages->getAllBySujetId($i);
                                        if(count($pagesArray) > 0)
                                        {
                                            foreach ($pagesArray as $page)
                                            {
                                                if($page->getVisibilite() == true)
                                                {
                                                    echo '<li class="body-nav border border-secondary rounded list-group-item collapse multi-collapse" id="multiCollapseExample'.$i.'"><a class="navbar-brand" href="page.php?id='.$page->getId().'">'.$page->getNomMenu().'</a></li>';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo '<li class="body-nav border border-secondary rounded list-group-item  collapse multi-collapse" id="multiCollapseExample'.$i.'"><a class="navbar-brand" href="">Pas de pages pour ce sujet</a></li>';
                                        }
                                    }
                                }
                                echo '</ul>
                            </li>';
                        }
                    }
                    if (!isset($_SESSION['txtLogin']) && !isset($_SESSION['txtPassword']))
                    {
                        ?>
                        <div class="lien-connexion-header">
                            <a href="signin.php" class="lien-connexion-header">Connexion</a>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="lien-deconnexion-header">
                            <a href="includes/logoutPage.php" class="lien-deconnexion-header">Déconnexion</a>
                        </div>
                        <div class="lien-list-page-header">
                            <a href="list.php" class="lien-list-page-header">Modifier une page</a>
                        </div>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
