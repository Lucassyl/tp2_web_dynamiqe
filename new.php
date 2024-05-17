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

    $pages = new pagesDAO($conn);
    if (isset($_POST['titreNouvellePageTxt']) && isset($_POST['positionNouvellePageTxt']) && isset($_POST['contenuNouvellePageTxt']))
    {
        $valeurTitre = $_POST['titreNouvellePageTxt'];
        $valeurPosition = $_POST['positionNouvellePageTxt'];
        $valeurContenu = $_POST['contenuNouvellePageTxt'];
    }
    if(isset($_POST["Confirmation"]))
    {
        try 
        {
            //uncomment before submiting
            $pages->add($_POST['idSujetNouvellePageTxt'], $_POST['titreNouvellePageTxt'], $_POST['positionNouvellePageTxt'], $_POST['visibiliteNouvellePageTxt'], $_POST['contenuNouvellePageTxt']);
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
        catch (PDOException $e) 
        {
            exit( "Erreur lors de la connexion à la BD: ".$e->getMessage());
        }
        ?>
        <?php
    }
    ?>

  <main class="new-main">
    <h1 class="h1-main">Ajouter une page!</h1>
    <form action="new.php" method="post">
      <div class="information-page-new">
        <div class="titre-page-new">
          <b class="b-titre-new-page">Titre de page : </b> 
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
          <input type="number" name="positionNouvellePageTxt" class="champ-position-nouvelle-page"
          <?php
          if (isset($_POST['positionNouvellePageTxt']))
          {
              echo 'value="' . $_POST['positionNouvellePageTxt'] . '"';
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
          ?>>0 pour invisible et 1 pour visible</input>
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

        <?php
          //titreNouvellePageTxt : Obligatoire, (non vide, pas seulement des espaces)
          //contenuNouvellePageTxt : Obligatoire, (non vide, pas seulement des espaces)
          //positionNouvellePageTxt : Obligatoire, doit être un nombre entre 1 et le nombre de page + 1
          //visibiliteNouvellePageTxt : Obligatoire, doit être 0 ou 1 (car, il n'y a pas de booléeen dans la BD)
          if (empty($_POST['titreNouvellePageTxt']) || empty($_POST['contenuNouvellePageTxt']) || 
              empty($_POST['positionNouvellePageTxt']) || empty($_POST['visibiliteNouvellePageTxt']) ||
              $_POST['visibiliteNouvellePageTxt'] != 0 || $_POST['visibiliteNouvellePageTxt'] != 1) 
          {
              ?>
              <div class="erreur-new">
              <p class="text-erreur-new">Un ou plusieurs champs non valide</p>
              </div>
              <?php
          }
        ?>

      <div class="submit-new-page">
        <input class="bouton-submit-new-page" type="submit" name="Confirmation" value="Créer la page" />
      </div>
    </form>
  </main>

  <?php
    include_once("includes/footer.php");
  ?>
    
</body>
</html>