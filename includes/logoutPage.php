<?php
session_start();
session_destroy();
echo "Déconnexion en cours";

//Code pour la redirection avec un timer en php trouvé sur: https://stackoverflow.com/questions/1901796/redirect-with-timer-in-php
header("refresh:1; url=../index.php");
exit;
?>