<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple - CMS</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

<script>
tinymce.init({
  selector: 'textarea',  // change this value according to the HTML
  toolbar: 'undo redo | bold italic | fontfamily fontsize | forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent'
});
</script>

</head>
<body>
  <?php
    include_once("includes/header.html");
  ?>

  <h1>Ceci est un exemple d'utilisation de TinyMCE</h1>

  <p><a href="https://www.tiny.cloud/docs/tinymce/latest/basic-setup/">Documentation de TinyMCE</a></p>

  <form action="à remplir" method="post">
      <textarea name="content" id="content">
        Welcome to TinyMCE!
      </textarea>
      <input type="submit" value="Soumettre">
  </form>
    
</body>
</html>