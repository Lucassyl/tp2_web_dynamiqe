<?php
declare(strict_types=1);

class Sujets {

    private int $id;
    private int $position;
    private string $nom;
    private bool $visible;

    function __construct(int $id, string $nom,  int $position, bool $visible) {
        try{
            self::setId($id);
            self::setPosition($position);
            self::setNom($nom);
            self::setVisibilite($visible);
        } catch (Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function setId(int $id) : void {
        $this->id = $id;
    }

    function setPosition(int $position) : void {
        $this->position = $position;
    }

    function setNom(string $nom) : void {
        $this->nom = $nom;
    }

    function setVisibilite(bool $visible) : void {
        $this->visible = $visible;
    }

    function getId() : int {
        return $this->id;
    }

    function getPosition() : int {
        return $this->position;
    }

    function getNom() : string {
        return $this->nom;
    }

    function getVisibilite() : bool {
        return $this->visible;
    }

    function __toString() : string {
        return '<p>Nom : '.$this->nom.' ( Id : '.$this->id.'), Position : '.$this->position.' Visible :'.$this->visible.'</p><br>';
    }
}
?>