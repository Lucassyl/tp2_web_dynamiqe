<?php

include("includes/pages.class.php");

class pagesDAO{

    private PDO $db;
    const MIN_CONTENT_LENGTH = 0;

    function __construct(PDO $db){
        $this->db = $db;
    }

    function getPageById(int $id) : Pages {
        $pages = $this->db->prepare("SELECT * FROM pages WHERE id = :id ORDER BY position");
        $pages->bindValue(':id', $id, PDO::PARAM_STR);
        $pages->execute();
        $page = $pages->fetch();
        return new Pages($page["id"], $page["sujet_id"], $page["nom_menu"], $page["position"], $page["visible"], $page["contenu"]);
        
    }

    function getAllBySujetId(int $sujetId) : array {
        $pages = $this->db->prepare("SELECT * FROM pages WHERE sujet_id = :sujetId ORDER BY position");
        $pages->bindValue(':sujetId', $sujetId, PDO::PARAM_STR);
        $pages->execute();
        $array = array();
        while($page = $pages->fetch()){
            $pageObjet = new Pages($page["id"], $page["sujet_id"], $page["nom_menu"], $page["position"], $page["visible"], $page["contenu"]);
            array_push($array, $pageObjet);
        }
        $pages->closeCursor();
        return $array;
    }

    function getAllPages() : array {
        $pages = $this->db->prepare("SELECT * FROM pages ORDER BY position");
        $pages->execute();
        $array = array();
        while($page = $pages->fetch()){
            $pageObjet = new Pages($page["id"], $page["sujet_id"], $page["nom_menu"], $page["position"], $page["visible"], $page["contenu"]);
            array_push($array, $pageObjet);
        }
        $pages->closeCursor();
        return $array;
    }

    function add(int $sujet_id, string $nom_menu, int $position, bool $visible, string $contenu) : void {
        /*$pages = new pagesDAO($conn);
        $pagesArray = $pages->getAllBySujetId($i);*/
        if(strlen($contenu) <= self::MIN_CONTENT_LENGTH){
            throw new Exception('Invalid Contenu.');
        }elseif(strlen($contenu) <= self::MIN_CONTENT_LENGTH){
            throw new Exception('Invalid Contenu.');
        }else{
            //$pages = $this->db->prepare('INSERT INTO pages (sujet_id, nom_menu, position, visible, contenu) VALUES (:sujet_id, :nom_menu, :position, :visible, :contenu)');
            $pages = $this->db->prepare('UPDATE pages SET sujet_id = :sujet_id , nom_menu = :nom_menu , position = :position , visible = :visible , contenu = :contenu WHERE id = :id)');
            $pages->bindValue(':id', $sujet_id, PDO::PARAM_STR);
            $pages->bindValue(':sujet_id', $sujet_id, PDO::PARAM_STR);
            $pages->bindValue(':nom_menu', $nom_menu, PDO::PARAM_STR);
            $pages->bindValue(':position', $position, PDO::PARAM_STR);
            $pages->bindValue(':visible', $visible, PDO::PARAM_STR);
            $pages->bindValue(':contenu', $contenu, PDO::PARAM_STR);
            $pages->execute();
        }
    }

    function edit(string $nom,  int $anneeNaissance, float $solde) : void {
        /*if(strlen($nom) <= self::MIN_NAME_LENGTH){
            throw new Exception('Invalid Name.');
        }else{
            self::$id += self::$id;
            $compte = $connexion->prepare('INSERT INTO compte (id, nom, annee, solde) VALUES (:id, :nom, :annee, :solde)');
            $compte->bindValue(':id', self::$id, PDO::PARAM_STR);
            $compte->bindValue(':nom', $nom, PDO::PARAM_STR);
            $compte->bindValue(':annee', $anneeNaissance, PDO::PARAM_STR);
            $compte->bindValue(':solde', $solde, PDO::PARAM_STR);
            $compte->execute();
        }*/
    }

    function delete(int $id) : void {
        $pages = $this->db->prepare("DELETE * FROM pages WHERE id = :id");
        $pages->bindValue(':id', $id, PDO::PARAM_STR);
        $pages->execute();
    }
}
?>