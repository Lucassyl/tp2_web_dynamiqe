<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>

</head>
<body class="d-flex flex-column min-vh-100">
    
    <?php 
    include_once('includes/header.php'); 
    require_once('includes/connection.php');
    include("includes/usagersDAO.class.php");
    ?>

    <?php
    if (isset($_POST['txtLogin']) && isset($_POST['txtPassword']))
    {
        try{
            $usagers = new usagersDAO($conn);
            $usagers->getMatchingUsagers($_POST['txtLogin'], $_POST['txtPassword']);
            $_SESSION['txtLogin'] = $_POST['txtLogin'];
            $_SESSION['txtPassword'] = $_POST['txtPassword'];
            header('Location:list.php');
            exit;
        }catch (Exception $e){
            echo $e->getMessage(), "\n";
        }
    }
    ?>

    <main class="signin-main">
        <h1 class="h1-main">Page de connexion</h1>
        <form method="post" action="signin.php" novalidate>
            <fieldset class="conteneur-login">
                <div class="login-signin">
                    <label for="txtLogin" class="labelLogin">Login</label>
                    <input type="text" class="inputLogin" id="txtLogin" name="txtLogin"
                    <?php
                    if (isset($_POST['txtLogin']))
                    {
                        echo 'value="' . $_POST['txtLogin'] . '"';
                    }
                    ?>>
                </div>
                <div class="password-signin">
                    <label for="txtPassword" class="labelPassword">Mot de passe</label>
                    <input type="text" class="inputPassword" id="txtPassword" name="txtPassword"
                    <?php
                    if (isset($_POST['txtPassword']))
                    {
                        echo 'value="' . $_POST['txtPassword'] . '"';
                    }
                    ?>>
                </div>
            </fieldset>
            <div class="bouton-connexion-signin">
                <button type="submit">Connexion</button>
            </div>
        </form>
    </main>

    <?php include_once('includes/footer.php'); ?>

</body>
</html>