<?php 
if (!isset($_POST['txtLogin']) && !isset($_POST['txtPassword']))
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js" defer></script>
    <script defer src="js/code.js"></script>
</head>

<body>
    
    <?php include_once('includes/header.php'); ?>

    <h1>Bien!</h1>


    <?php include_once('includes/footer.html'); ?>

</body>
</html>