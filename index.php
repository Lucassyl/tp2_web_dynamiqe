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
        include_once("includes/connection.php");
        require_once("includes/pagesDAO.class.php");
    ?>
    <main class="index-main flex-fill min-vh-50">
        <h1 class="h1-main">Bienvenue!</h1>
        <div class="redirection-page-index">
            <?php
            $pages = new pagesDAO($conn);
            $pagesArray = $pages->getAllPages();
            if(count($pagesArray) > 0)
            {
                foreach ($pagesArray as $page)
                {
                    if($page->getVisibilite() == true)
                    {
                    ?>
                    <div class="bouton-index">
                        <button class="bouton-page-index"><a <?php echo 'href="page.php?id='.$page->getId().'"' ?> class="lien-bouton-index"><?php echo $page->getNomMenu(); ?></a></button>
                    </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
    </main>
    <?php include_once('includes/footer.php'); ?>
</body>
</html>