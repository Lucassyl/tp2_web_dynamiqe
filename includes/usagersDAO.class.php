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
            throw new Exception('<b class="error-signin">Aucun identifiant trouvé!</b>');//No matching Usager existe
        }
        $match = $matchingUsagers->fetch();
        $usager = new usagers($match["id"], $match["login"], $match["enc_password"]);
        $matchingUsagers->closeCursor();
        if(!$usager->checkPassword($password)){
            throw new Exception('<b class="error-signin">Mot de passe erroné</b>');//le mot de passe ne correspond pas à un utilisateur selectioné
        }
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