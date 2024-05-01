<?php

include("includes/usagers.class.php");

class usagersDAO{

    private PDO $db;

    function __construct(PDO $db){
        $this->db = $db;
    }

    function getAllUsagers() : array {
        $usagers = $this->db->prepare("SELECT * FROM sujets ORDER BY position");
        $usagers->execute();
        $array = array();
        while($usager = $usagers->fetch()){
            $usagerObjet = new Usagers($usager["id"], $usager["login"], $usager["enc_password"]);
            array_push($array, $usagerObjet);
        }
        $usagers->closeCursor();
        return $array;
    }

}
?>