<?php

include("includes/usagers.class.php");

class usagersDAO{

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

    /*function add($conn, string $nom,  int $anneeNaissance, float $solde) : void {
        if(strlen($nom) > self::MAX_NAME_LENGTH){
            throw new Exception('Invalid Name.');
        }elseif($anneeNaissance < self::MIN_YEAR || $anneeNaissance > self::MAX_YEAR){
            throw new Exception('invalid Year.');
        }elseif($solde > self::MAX_SOLDE){
            throw new Exception('Invalid Solde.');
        }else{
            self::$id += self::$id;
            $compte = $conn->prepare('INSERT INTO compte (id, nom, annee, solde) VALUES (:id, :nom, :annee, :solde)');
            $compte->bindValue(':id', self::$id, PDO::PARAM_STR);
            $compte->bindValue(':nom', $nom, PDO::PARAM_STR);
            $compte->bindValue(':annee', $anneeNaissance, PDO::PARAM_STR);
            $compte->bindValue(':solde', $solde, PDO::PARAM_STR);
            $compte->execute();
        }
    }

    function update(int $id, $conn, float $solde) : void {
        if($solde > self::MAX_SOLDE){
            throw new Exception('Invalid Solde.');
        }else{
            $compte = $conn->prepare('UPDATE compte SET solde = :solde WHERE id = :id)');
            $compte->bindValue(':id', $id, PDO::PARAM_STR);
            $compte->bindValue(':solde', $solde, PDO::PARAM_STR);
            $compte->execute();
        }
    }

    function get($conn, int $id) {
        $sujets = $conn->prepare('SELECT * FROM sujets WHERE id = :id');
        $sujets->bindValue(':id', $id, PDO::PARAM_STR);
        return $sujets;
    }*/

    /*function getAll($conn){
        $sujets = $conn->prepare('SELECT * FROM sujets');
        $sujets->execute();
        return $sujets;
    }*/
}
?>