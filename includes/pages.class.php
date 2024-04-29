<?php
declare(strict_types=1);

class Pages {

    private int $id;
    private int $sujetId;
    private int $position;
    private string $nomMenu;
    private string $contenu;
    private bool $visible;


    function __construct(int $id, int $sujetId, string $nomMenu,  int $position, bool $visible, string $contenu) {
        try{
            self::setId($id);
            self::setSujetId($sujetId);
            self::setPosition($position);
            self::setNomMenu($nomMenu);
            self::setContenu($contenu);
            self::setVisibilite($visible);
            
        } catch (Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function setId(int $id) : void {
        $this->id = $id;
    }

    function setSujetId(int $sujetId) : void {
        $this->sujetId = $sujetId;
    }

    function setPosition(int $position) : void {
        $this->position = $position;
    }

    function setNomMenu(string $nomMenu) : void {
        $this->nomMenu = $nomMenu;
    }

    function setContenu(string $contenu) : void {
        $this->contenu = $contenu;
    }

    function setVisibilite(bool $visible) : void {
        $this->visible = $visible;
    }

    function getId() : int {
        return $this->id;
    }

    function getSujetId() : int {
        return $this->sujetId;
    }

    function getPosition() : int {
        return $this->position;
    }

    function getNomMenu() : string {
        return $this->nomMenu;
    }

    function getContenu() : string {
        return $this->contenu;
    }

    function getVisibilite() : bool {
        return $this->visible;
    }

    /*function retirer(float $amount, $connexion) : void{
        if($this->solde -= $amount < self::MINIMUM){
            throw new Exception('Cannot be a negative value.');
        }
        $this->solde -= $amount;
        self::updateSolde($this->solde, $connexion);
        echo '<p>retrait de '.$amount.' du compte de '.$this->nom.'.</p><br>';
    }*/

    function __toString() : string {
        return '<p>'.$this->nomMenu.'('.$this->id.' sujet Nombre : '.$this->sujetId.'), At Position : '.$this->position.' Visible :'.$this->visible.' '.$this->contenu.'</p><br>';
    }
}
?>