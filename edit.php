<?php
    declare(strict_types=1);
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
    <title>Ajouter une nouvelle page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>

    <script src="https://cdn.tiny.cloud/1/g4u0kxk9t7eij8i2ld1zfjd93laczdrabqvralxje83uilcl/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: 'textarea',
  toolbar: 'undo redo | bold italic | fontfamily fontsize | forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent'
});
</script>

</head>
<body>
    <?php
        include_once("includes/header.php");
        if(!isset($_GET["id"]))
        {
            header('Location:list.php');
        }
        else
        {
            $pages = new pagesDAO($conn);
            if (isset($_POST['titreNouvellePageTxt']) && isset($_POST['positionNouvellePageTxt']) && isset($_POST['contenuNouvellePageTxt']))
            {
                $valeurTitre = $_POST['titreNouvellePageTxt'];
                $valeurPosition = $_POST['positionNouvellePageTxt'];
                $valeurContenu = $_POST['contenuNouvellePageTxt'];
            }
            $page = $pages->getPageById(intval($_GET["id"]));
    ?>
    <main class="new-main">
        <h1 class="h1-main">Modifier une page!</h1>
        <form action="edit.php?id=<?php echo $_GET["id"]; ?>" method="post">
            <div class="information-page-new">
                <div class="titre-page-new">
                    <b class="b-titre-new-page">Titre de page : </b> 
                    <input type="text" name="titreNouvellePageTxt" class="champ-titre-nouvelle-page" 
                    <?php
                    if (isset($_POST['titreNouvellePageTxt']))
                    {
                        echo 'value="' . $_POST['titreNouvellePageTxt'] . '"';
                    }
                    else
                    {
                        echo 'value="' . $page->getNomMenu() . '"';
                    }
                    ?>>Entrer le titre de votre page</input>
                </div>
                <div class="position-page-new">
                    <b class="b-position-new-page">Position de la page : </b> 
                    <input type="number" name="positionNouvellePageTxt" class="champ-position-nouvelle-page"
                    <?php
                    if (isset($_POST['positionNouvellePageTxt']))
                    {
                        echo 'value="' . $_POST['positionNouvellePageTxt'] . '"';
                    }
                    else
                    {
                        echo 'value="' . $page->getPosition() . '"';
                    }
                    ?>>Entrer la position de votre page</input>
                </div>
                <div class="id-sujet-page-new">
                    <b class="b-id-sujet-new-page">Sujet de la page (Facultatif) : </b> 
                    <input type="number" name="idSujetNouvellePageTxt" class="champ-id-sujet-nouvelle-page"
                    <?php
                    if (isset($_POST['idSujetNouvellePageTxt']))
                    {
                        echo 'value="' . $_POST['idSujetNouvellePageTxt'] . '"';
                    }
                    else
                    {
                        echo 'value="' . $page->getSujetId() . '"';
                    }
                    ?>>Entrer l'id du sujet (sa position)</input>
                </div>
                <div class="visibilite-page-new">
                    <b class="b-visibilite-new-page">Visibilité de la page : </b> 
                    <input type="number" name="visibiliteNouvellePageTxt" class="champ-visibilite-nouvelle-page"
                    <?php
                    if (isset($_POST['visibiliteNouvellePageTxt']))
                    {
                        echo 'value="' . $_POST['visibiliteNouvellePageTxt'] . '"';
                    }
                    else
                    {
                        echo 'value="' . $page->getVisibilite() . '"';
                    }
                    ?>>0 pour invisible et 1 pour visible</input>
                </div>
            </div>  
            <div class="champs-page-new">
            <b class="b-contenu-new-page">Contenu de la page : </b>
            <textarea name="contenuNouvellePageTxt" class="champ-contenu-nouvelle-page">
            <?php
            if (isset($_POST['contenuNouvellePageTxt']))
            {
                echo '' . $_POST['contenuNouvellePageTxt'] . '';
            }
            else
            {
                echo '' . $page->getContenu() . '';
            }
            ?></textarea>
            </div>

            
            <?php
            if(isset($_POST["Confirmation"]))
            {
                try 
                {
                    $pages->edit(intval($_GET["id"]), intval($_POST['idSujetNouvellePageTxt']), $_POST['titreNouvellePageTxt'], intval($_POST['positionNouvellePageTxt']), filter_var($_POST['visibiliteNouvellePageTxt'], FILTER_VALIDATE_BOOLEAN), $_POST['contenuNouvellePageTxt']);
                    ?>
                        <div class="successful-edit-div">
                            <b class="successful-edit-text">Changement apporté!</b>
                        </div>
                        <div class="conteneur-menu-edit">
                            <div class="bouton-accueil-edit">
                                <button class="bouton-rollback-edit"><a href="index.php" class="lien-edit">Accueil</a></button>
                            </div>
                            <div class="bouton-modifier-edit">
                                <button class="bouton-rollback-edit"><a href="list.php" class="lien-edit">Liste des pages</a></button>
                            </div>
                            <div class="bouton-deconnexion-edit">
                                <button class="bouton-rollback-edit"><a href="includes/logoutPage.php" class="lien-edit">Déconnexion</a></button>
                            </div>
                        </div>
                    <?php
                }
                catch (Exception $e) 
                {
                    echo'<div class="erreur-new"><p class="text-erreur-new">'.$e->getMessage().'</p></div>';
                }
            }
            ?>

            <div class="submit-new-page">
                <input class="bouton-submit-edit-page" type="submit" name="Confirmation" value="Modifier la page" />
            </div>
        </form>
        <?php
            }
        ?>
    </main>
    <?php
    include_once("includes/footer.php");
    ?>
</html>