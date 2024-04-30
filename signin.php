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
<body class="d-flex flex-column min-vh-100">
    
    <?php 
    include_once('includes/header.php'); 
    require_once('includes/connection.php'); 
    ?>

    <?php
    if (isset($_POST['txtLogin']) && isset($_POST['txtPassword']))
    {
        $req = $conn->prepare('SELECT login, enc_password FROM usagers WHERE login = :login');
        $req->bindValue(':login', $_POST['txtLogin'], PDO::PARAM_STR);
        $req->execute();
        
        $information = $req->fetch(PDO::FETCH_ASSOC);

        if ($information !== false)
        {
            $login = $information['login'];
            $password_hash = $information['enc_password'];

            if ($login === $_POST['txtLogin'] && password_verify($_POST['txtPassword'], $password_hash) == true)
            {
                header('Location:list.php');
                exit;
            }
            else
            {
                echo '<p class="error-no-admin">Mot de passe ou identifiant erroné</p>';
            }
        }
        else
        {
            echo '<p class="error-no-admin">Aucun identifiant trouvé!</p>';
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