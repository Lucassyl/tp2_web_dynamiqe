<?php 
session_start();

if (!isset($_SESSION['txtLogin']) && !isset($_SESSION['txtPassword']))
{
    header('Location:signin.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des pages</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>
</head>

<body>
    
    <?php include_once('includes/header.php'); ?>

    <main class="list-main">
        <h1 class="h1-main">Modification de page</h1>
        <div class="div-new-page-list">
            <button class="button-new-page-list"><a href="new.php" class="lien-new-page-list">Créer une nouvelle page</a></button>
        </div>
        <div class="selection-page-list">
            <div class="titre-action-page-list">
                <div class="titre-page-h2-list">
                    <h2 class="h2-titre-list">Titre des pages</h2>
                </div>
                <div class="action-page-h2-list">
                    <h2 class="h2-action-list">Actions</h2>
                </div>
            </div>
            <div class="information-action-page">
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
                    <div class="titre-page-list">
                        <p class="paragraphe-titre-page"><?php echo $page->getNomMenu(); ?></p>
                    </div>
                    <div class="flex-action-list">
                        <div class="action-page-edit-list">
                            <button class="bouton-edit-list"><a href="edit.php?id=<?php echo $page->getId(); ?>" class="lien-edit-list">Modifier</a></button>
                        </div>
                        <div class="action-page-delete-list">
                            <button class="bouton-delete-list"><a href="delete.php?id=<?php echo $page->getId(); ?>" class="lien-edit-list">Supprimer</a></button>
                        </div>
                    </div>
                    <?php
                    }
                }
            }
            ?>
            </div>
        </div>
    </main>


    <?php include_once('includes/footer.php'); ?>

</body>
</html>