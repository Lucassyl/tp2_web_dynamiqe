<?php
session_start();
session_destroy();
echo "Déconnexion en cours";

//Code trouvé pour l'attente sur: https://stackoverflow.com/questions/1901796/redirect-with-timer-in-php
header("refresh:2; url=../index.php");
exit;
?>