<?php
    declare(strict_types=1);
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Exercice Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Javascript pour bootstrap-->
    <script src="js/bootstrap/bootstrap.bundle.min.js" defer></script>
    <!-- Javascript -->
    <script defer src="js/code.js"></script>
</head>
<body class="d-flex">
    <main class="flex-fill min-vh-100">
        <div class="row align-items-center mx-auto">
            <div class="col-12 text-center mb-4">
                <img src="img/logo.svg" alt="Game_Logo" class="mx-auto d-block img-fluid">
                <a href="part1.php" class="btn btn-primary mt-4">Créer mon personnage</a>
            </div>
        </div>
        <?php
            session_destroy();
            include_once("includes/footer.html");
        ?>
    </main>
</body>
</html>