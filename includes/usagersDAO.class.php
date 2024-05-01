<?php

include("includes/usagers.class.php");

class usagersDAO{

    const EMPTY_ARRAY = 0;
    private PDO $db;

    function __construct(PDO $db){
        $this->db = $db;
    }

    function getMatchingUsagers(string $user, string $password) : bool {
        $matchingUsagers = $this->db->prepare("SELECT * FROM usagers WHERE login = :login");
        $matchingUsagers->bindValue(':login', $user, PDO::PARAM_STR);
        $matchingUsagers->execute();
        if($matchingUsagers->rowCount() <= self::EMPTY_ARRAY){
            $matchingUsagers->closeCursor();
            throw new Exception('No matching Usager existe');
        }
        $matchingUsagers->closeCursor();

        $matchingUsagers = $this->db->prepare("SELECT * FROM usagers WHERE login = :login AND enc_password = :password");
        $matchingUsagers->bindValue(':login', $user, PDO::PARAM_STR);
        $matchingUsagers->bindValue(':password', $password, PDO::PARAM_STR);
        $matchingUsagers->execute();
        if($matchingUsagers->rowCount() <= self::EMPTY_ARRAY){
            $matchingUsagers->closeCursor();
            throw new Exception('le mot de passe ne correspond pas à un utilisateur selectioné');
        }
        $matchingUsagers->closeCursor();
        return true;
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