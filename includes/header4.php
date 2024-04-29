<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header PHP</title>
</head>
<body>
<?php
    include_once("includes/connection.php");
    include("includes/sujetsDAO.class.php");
    include("includes/pagesDAO.class.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand " href="#">TinyMCE</a>
        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                    $sujets = new sujetsDAO($conn);
                    $sujetsArray = $sujets->getAllByPosition();
                    $nombreDeSujet = count($sujetsArray);
                    foreach ($sujetsArray as &$sujet){
                        if($sujet->getVisibilite() == true){
                            echo '<li class="nav-item card">
                                <div class="card-header" style="width: 18rem;">
                                    <button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample'.$sujet->getId().'" aria-expanded="false" aria-controls="multiCollapseExample'.$sujet->getId().'">'.$sujet->getNom().'</button>
                                </div>
                                <ul class="list-group list-group-flush">';
                                for($i = 1; $i <= $nombreDeSujet; $i++){
                                    if($i == $sujet->getId()){
                                        $pages = new pagesDAO($conn);
                                        $pagesArray = $pages->getAllBySujetId($i);
                                        if(count($pagesArray) > 0){
                                            foreach ($pagesArray as &$page){
                                                if($page->getVisibilite() == true){
                                                            echo '<li class="list-group-item collapse multi-collapse" id="multiCollapseExample'.$i.'"><a class="navbar-brand" href="#">'.$page->getNomMenu().'</a></li>';
                                                }
                                            }
                                        }else{
                                            echo '<li class="list-group-item  collapse multi-collapse" id="multiCollapseExample'.$i.'"><p class="navbar-brand">pas de pages pour ce sujet</p></li>';
                                        }
                                    }
                                }
                                echo '</ul>
                            </li>';
                        }
                    }
                    
                ?>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
