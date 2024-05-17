<?php
declare(strict_types=1);

class usagers {

    private string $login;
    private string $encPassword;

    function __construct(string $login,  string $encPassword) {
        try{
            self::setLogin($login);
            self::setEncPassword($encPassword);
        } catch (Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function getMatch(PDO $conn) : void {
        try{
            $usagers = new usagersDAO($conn);
            $array = $usagers->getMatchingUsagers($this->login, $this->encPassword);
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    function setLogin(string $login) : void {
        $this->login = $login;
    }

    function setEncPassword(string $encPassword) : void {
        $this->encPassword = $encPassword;
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
        return '<p>Login : '.$this->login.' , Password : '.$this->encPassword.'</p><br>';
    }
}
?>