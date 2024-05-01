<?php
/*
session_start();
*/
?>
<footer class="mt-5 text-center">
    <?php 
    if (isset($_SESSION['txtLogin']) && isset($_SESSION['txtPassword']))
    {
        echo "<p class='admin-connecte'>Connecté en tant qu'admin</p>";
    }
    ?>
    <p>Produit par Cédric et Lucas</p>
</footer>