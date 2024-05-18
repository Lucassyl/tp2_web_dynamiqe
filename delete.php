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
    <title>Supprimer page</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>
</head>
<body class="">
    <?php include_once('includes/header.php'); ?>

    <main>
        <div class="container">
            <div class="d-flex">
                <div class="row rounded alert alert-warning border-3 mt-5 justify-content-center">
                    <?php
                    if(!isset($_GET["id"]))
                    {
                        header('Location:list.php');
                    }
                    else
                    {
                        $pages = new pagesDAO($conn);
                        if(isset($_POST["Confirmation"]))
                        {
                            $pages->delete($_GET["id"]);
                            header('Location:list.php');
                            echo 'Supprimer';
                        }
                        $page = $pages->getPageById($_GET["id"]);
                    ?>
                    <p class="text-center display-5"><strong>Attention!!!</strong></p>
                    <p class="text-center">Vous êtes sur le point de supprimer la page <?php echo $page->getNomMenu(); ?>.</p>
                    <p class="text-center"><small><u>Ce changement est permanent et n'est pas réversible!</u></small></p>
                    <p class="text-center">Êtes vous sûr de vouloir continuer?</p>
                    <div class="col-4">
                        <button class="bouton-edit-list"><a href="list.php?id=<?php echo $_GET["id"]; ?>" class="lien-edit-list">Revenir</a></button>
                    </div>
                    <form class="col-4" action="delete.php?id=<?php echo $_GET["id"]; ?>" method="post">
                        <input class="bouton-delete-list lien-edit-list" type="submit" name="Confirmation" value="Continue" />
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('includes/footer.php'); ?>
    
</body>
</html>