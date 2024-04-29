<?php

include("includes/pages.class.php");

class pagesDAO{

    private PDO $db;

    function __construct(PDO $db){
        $this->db = $db;
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
}
?>