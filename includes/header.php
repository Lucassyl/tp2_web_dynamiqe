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
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div>
        <a class="navbar-brand" href="#">Place holder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                    $sujets = new sujetsDAO();
                    $sujetList = $sujets->getAll($conn);
                    while($sujet = $sujetList->fetch()) {
                            /*echo '<div class="col-7">
                              <div class="row rounded border border-dark text-center justify-content-center align-items-center">
                                <p class="col-12">'.$voiture['Fabricant'].' '.$voiture['Modele'].' ('.$voiture['Couleur'].')</p>
                                <p class="col-12">'.$voiture['Prix'].'.00 $</p>
                              </div>
                            </div>';*/
                        echo '<li class="nav-item">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample'.$sujet['id'].'" aria-expanded="false" aria-controls="multiCollapseExample'.$sujet['id'].'">Toggle elements</button>
                            </li>';
                    }
                    $sujetList->closeCursor();
                ?>
                <div class="row">
                    <?php
                        $sujets = new sujetsDAO();
                        $sujetList = $sujets->getAll($conn);
                        while($sujet = $sujetList->fetch()) {
                                /*echo '<div class="col-7">
                                <div class="row rounded border border-dark text-center justify-content-center align-items-center">
                                    <p class="col-12">'.$voiture['Fabricant'].' '.$voiture['Modele'].' ('.$voiture['Couleur'].')</p>
                                    <p class="col-12">'.$voiture['Prix'].'.00 $</p>
                                </div>
                                </div>';*/
                            echo '<div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample'.$sujet['id'].'">
                                        <div class="card card-body">
                                            '.$sujet['nom'].'
                                        </div>
                                    </div>
                                </div>';
                        }
                        $sujetList->closeCursor();
                    ?>
                </div>
                <!--<li class="nav-item">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                    </a>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-bs-target
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                    </a>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-bs-target
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </li>-->
            </ul>
        </div>
    </div>
</nav>
    
</body>
</html>
