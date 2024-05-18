<?php declare(strict_types=1);
require_once "includes/usagers.class.php";

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
require_once __DIR__."/../includes/usagers.class.php";

class usagersClassTest extends TestCase{

    #[Test]
    public function CanSuccesfullyGetMatchWithoutError(){
        //Arrange
        require_once('includes/connection.php');
        $name = 'admin';
        $password = '12345';
        $usagers = new usagers($name, $password);
        //Act
        //Assert
        try{
            //Act
            $usagers->getMatch($conn);
        }
        catch (Exception $e)
        {
            return false;
        }
        
    }

    #[Test]
    public function WillGetMatchingErrorIfNoMatchingUserName(){
        //Arrange
        require_once('includes/connection.php');
        $name = 'fakeadmin';
        $password = '12345';
        $usagers = new usagers($name, $password);
        $usagers->getMatch($conn);
        try{
            //Act
            $usagers->getMatch($conn);
        }
        catch (Exception $e)
        {
            //Assert
            $this->assertSame( 
                '<b class="error-signin">Aucun identifiant trouvé!</b>', 
                $e->getMessage(), 
                "actual value is not same as expected value"
            ); 
        }
    }

    #[Test]
    public function WillGetMatchingErrorIfUserPasswordIsNotMatching(){
        //Arrange
        require_once('includes/connection.php');
        $name = 'admin';
        $password = '1245';
        $usagers = new usagers($name, $password);
        $usagers->getMatch($conn);
        
        try{
            //Act
            $usagers->getMatch($conn);
        }
        catch (Exception $e)
        {
            //Assert
            $this->assertSame( 
                '<b class="error-signin">Mot de passe erroné</b>', 
                $e->getMessage(), 
                "actual value is not same as expected value"
            ); 
        }
    }
}

    

