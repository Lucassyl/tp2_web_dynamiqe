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
    <title>Exemple - CMS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

<script>
tinymce.init({
  selector: 'textarea', // change this value according to the HTML
  toolbar: 'undo redo | bold italic | fontfamily fontsize | forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent'
});
</script>

</head>
<body>
  <?php
    include_once("includes/header.php");
  ?>

  <main class="new-main">

    <h1 class="h1-main">Ajouter une page!</h1>

    <p><a href="https://www.tiny.cloud/docs/tinymce/latest/basic-setup/">Documentation de TinyMCE</a></p>

    <form action="list.php" method="post">
      <div class="contenu-page-new">
        <div class="titre-page-new">
          Titre de page : 
          <textarea>Entrer votre titre de page</textarea>
          </div>
        <div class="champs-page-new">
          Contenu de la page : 
          <textarea>Entrer votre contenu</textarea>
        </div>
      </div>
      <div class="submit-new-page">
        <input type="submit" value="Soumettre">
      </div>
    </form>

  </main>

  <?php
    include_once("includes/footer.php");
  ?>
    
</body>
</html>