<?php
    include('param.php');
    
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    try 
    {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbNomBD", $dbUser, $dbMotPasse, $options);
    }
    catch (PDOException $e) 
    {
        exit( "Erreur lors de la connexion à la BD: ".$e->getMessage());
    }

?>