<?php

include("includes/sujets.class.php");

class sujetsDAO{

    private PDO $db;

    function __construct(PDO $db){
        $this->db = $db;
    }

    function getAllByPosition() : array {
        $sujets = $this->db->prepare("SELECT * FROM sujets ORDER BY position");
        $sujets->execute();
        $array = array();
        while($sujet = $sujets->fetch()){
            $sujetObjet = new Sujets($sujet["id"], $sujet["nom"], $sujet["position"], $sujet["visible"]);
            array_push($array, $sujetObjet);
        }
        $sujets->closeCursor();
        return $array;
    }
}
?>