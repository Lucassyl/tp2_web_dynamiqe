<?php
    declare(strict_types=1);
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>
</head>
<body>
    <?php include_once('includes/header.php'); ?>
    <div class="container">
        <?php
        if(!isset($_GET["id"])){
            header('Location:list.php');
        }else{
            $pages = new pagesDAO($conn);
            if(isset($_POST["Confirmation"])){
                //uncomment before submiting 
                //$pages->delete($_GET["id"]);
                //header('Location:list.php');
                echo 'deleted';
            }
            $page = $pages->getPageById(intval($_GET["id"]));
        ?>
        <form action="">
            <input type="text" name="titreNouvellePageTxt" class="champ-titre-nouvelle-page" 
            <?php
            if (isset($_POST['titreNouvellePageTxt']))
            {
                echo 'value="' . $_POST['titreNouvellePageTxt'] . '"';
            }
            ?>>Entrer le titre de votre page</input>
            </div>
            <div class="position-page-new">
            <b class="b-position-new-page">Position de la page : </b> 
            <input type="number" name="positionNouvellePageTxt" class="champ-position-nouvelle-page" value=""
            <?php
            if (isset($_POST['positionNouvellePageTxt']))
            {
                echo 'value="' . $_POST['positionNouvellePageTxt'] . '"';
            }
            ?>>Entrer la position de votre page</input>
            </div>
            <div class="id-sujet-page-new">
            <b class="b-id-sujet-new-page">Sujet de la page (entrer un id) : </b> 
            <input type="number" name="idSujetNouvellePageTxt" class="champ-id-sujet-nouvelle-page"
            <?php
            if (isset($_POST['idSujetNouvellePageTxt']))
            {
                echo 'value="' . $_POST['idSujetNouvellePageTxt'] . '"';
            }
            ?>>Entrer le sujet (en chiffre qui représente la position)</input>
            </div>
            </div>  
                <div class="champs-page-new">
                <b class="b-contenu-new-page">Contenu de la page : </b>
                <textarea name="contenuNouvellePageTxt" class="champ-contenu-nouvelle-page"
                <?php
                if (isset($_POST['contenuNouvellePageTxt']))
                {
                    echo 'value="' . $_POST['contenuNouvellePageTxt'] . '"';
                }
                ?>>Entrer votre contenu</textarea>
                </div>
            <div class="submit-new-page">
            <button type="submit">Compléter la mise a jour</button>
            <input class="bouton-delete-list lien-edit-list" type="submit" name="Confirmation" value="Continue" />
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>