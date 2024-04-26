<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>

</head>
<body>
    
    <?php 
    include_once('includes/header.php'); 
    require_once('includes/connection.php'); 
    ?>

    <?php
    if (isset($_POST['txtLogin']) && isset($_POST['txtPassword']))
    {
        $information = $conn->prepare('SELECT * FROM usagers WHERE login = :login AND enc_password = :enc_password');
        $information->execute(array(':login' => $_POST['txtLogin'], ':enc_password' => $_POST['txtPassword']));
        //Problème avec le hash
        $hash = password_hash($information, PASSWORD_ARGON2ID);
        $is_valid = password_verify($_POST['txtPassword'], $information);

        if ($is_valid == false)
        {
            echo '<p class="error-no-admin">Aucun identifiant trouvé!</p>';
        }
        else
        {
            header('Location:list.php');
            exit;
        }
    }
    ?>

    <main>
        <form method="post" action="signin.php" novalidate>
            <fieldset class="conteneur-login">
                <div class="login">
                    <label for="txtLogin" class="labelLogin">Login</label>
                    <input type="text" class="inputLogin" id="txtLogin" name="txtLogin"
                    <?php
                    if (isset($_POST['txtLogin']))
                    {
                        echo 'value="' . $_POST['txtLogin'] . '"';
                    }
                    ?>>
                </div>
                <div class="password">
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
            <div class="bouton-connexion">
                <button type="submit">Connexion</button>
            </div>
        </form>
    </main>

    <?php include_once('includes/footer.html'); ?>

</body>
</html>