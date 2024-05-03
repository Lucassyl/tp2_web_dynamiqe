<?php
declare(strict_types=1);

class usagers {

    private int $id;
    private string $login;
    private string $encPassword;

    function __construct(int $id, string $login,  string $encPassword) {
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

    function setLogin(string $login) : void {
        $this->login = $login;
    }

    function setEncPassword(string $encPassword) : void {
        $this->encPassword = $encPassword;
    }

    function getId() : int {
        return $this->id;
    }

    function getNom() : string {
        return $this->login;
    }

    function getEncPassword() : string {
        return $this->encPassword;
    }

    function checkPassword(string $password) : bool {
        if(password_verify($password, $this->encPassword)){
            return true;
        }
        return false;
    }

    function __toString() : string {
        return '<p>Login : '.$this->login.' ( Id : '.$this->id.'), Password : '.$this->encPassword.'</p><br>';
    }
}
?>