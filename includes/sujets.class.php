<?php
declare(strict_types=1);

class Compte {

    private int $id;
    private string $nom;
    private int $anneeNaissance;
    private float $solde;

    const LIMIT_YEAR = 1900;
    const MINIMUM = 0;

    function __construct(int $id, string $nom,  int $anneeNaissance, float $solde) {
        try{
            self::setId($id);
            self::setNom($nom);
            self::setAnneeNaissance($anneeNaissance);
            self::setSolde($solde);
        } catch (Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function setId(int $id) : void {
        $this->id = $id;
    }

    function setNom(string $nom) : void {
        if(trim($nom) == ""){
            throw new Exception('No name.');
        }else{
            $this->nom = $nom;
        }
    }
    function setAnneeNaissance(int $anneeNaissance) : void {
        if($anneeNaissance < self::LIMIT_YEAR || $anneeNaissance > date("Y")){
            throw new Exception('Year not in range.');
        }
        $this->anneeNaissance = $anneeNaissance;
    }
    private function setSolde(float $solde) : void {
        if($solde < self::MINIMUM){
            throw new Exception('Cannot be a negative value.');
        }
        $this->solde = $solde;
    }

    function getId() : int {
        return $this->id;
    }

    function getNom() : string {
        return $this->nom;
    }

    function getAnneeNaissance() : int {
        return $this->anneeNaissance;
    }

    function getSolde() : float {
        return $this->solde;
    }

    function deposer(float $amount, $connexion) : void{
        if($this->solde += $amount < self::MINIMUM){
            throw new Exception('Cannot be a negative value.');
        }
        $this->solde += $amount;
        self::updateSolde($this->solde, $connexion);
        echo '<p>depot de '.$amount.' dans le compte de '.$this->nom.'.</p><br>';
    }

    function retirer(float $amount, $connexion) : void{
        if($this->solde -= $amount < self::MINIMUM){
            throw new Exception('Cannot be a negative value.');
        }
        $this->solde -= $amount;
        self::updateSolde($this->solde, $connexion);
        echo '<p>retrait de '.$amount.' du compte de '.$this->nom.'.</p><br>';
    }

    function updateSolde(float $amount, $connexion) : void{
        $compteDAO = new CompteDao();
        $mockId = $this->id;
        $compteDAO->update($mockId, $connexion, $amount);
    }

    function __toString() : string {
        return '<p>'.$this->nom.' ('.$this->anneeNaissance.'), Solde : '.$this->solde.'$</p><br>';
    }
}
?>