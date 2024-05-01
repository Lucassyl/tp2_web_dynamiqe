<?php
declare(strict_types=1);

class Sujets {

    private int $id;
    private string $login;
    private string $encPassword;

    function __construct(int $id, string $login,  int $encPassword) {
        try{
            self::setId($id);
            self::setLogin($login);
            self::setEncPassword($encPassword);
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

    function getId() : int {
        return $this->id;
    }

    function getPosition() : int {
        return $this->position;
    }

    function getNom() : string {
        return $this->nom;
    }


    function __toString() : string {
        return '<p>Id : '.$this->nom.' ( Id : '.$this->id.'), Position : '.$this->position.' Visible :'.$this->visible.'</p><br>';
    }
}
?>