<?php declare(strict_types=1);
require_once "includes/usagers.class.php";

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
require_once __DIR__."/../src/ZipCode.php";

class usagersClassTest extends TestCase{

    #[Test]
    public function exe(){
        //Arrange
        //Act
        //Assert
    }
    // TODO : Il est possible de créer un code postal tel que "G1F2C2" - est valide ou non
    #[Test]
    public function CanCreateValidPostalCode(){
        //Arrange
        $code = "G1F2C2";
        //Act
        $zipCode = new ZipCode($code);
        //Assert
    }
    // TODO : Il est possible de créer un code postal tel que "G1F 2C2" - est valide ou non
    #[Test]
    public function CanCreateValidPostalCodeWithSpace(){
        //Arrange
        $code = "G1F 2C2";
        
        //Act
        $zipCode = new ZipCode($code);
        //Assert
        $this->assertNull($zipCode,"is not null");
    }
    

    // TODO : Il est possible d'obtenir la valeur d'un code postal (par exemple, "G1F2C2").
    #[Test]
    public function canGetPostalCode(){
        //Arrange
        $code = "G1F2C2";
        $zipCode = new ZipCode($code);
        //Act
        $testedValue = $zipCode->getCode();
        //Assert
        $this->assertNull($testedValue,"is given");
    }
    // TODO : Il est possible de changer un code postal (par exemple, de "G1F2C2" à "A1B2C3").
    #[Test]
    public function CanChangePostalCode(){
        //Arrange
        $code = "G1F2C2";
        $code2 = "A1B2C3";
        $zipCode = new ZipCode($code);
        //Act
        $zipCode->setCode($code2);
        //Assert     
        $this->assertSame($code2,$zipCode->getCode(),"was changed");
    }

    // TODO : Les codes postaux doivent être normalisés (mis en majuscules et enlever les espaces) lors de leur construction.
    #[Test]
    public function postalCodeAreNormalizedWhenCreated(){
        //Arrange
        $code = "g1f 2c2";
        $expected = "G1F2C";
        //Act
        $zipCode = new ZipCode($code);
        //Assert
        $this->assertSame($expected,$zipCode->getCode(),"was normalized");
    }
    // TODO : Les codes postaux doivent être normalisés (mis en majuscules et enlever les espaces) lorsqu'ils sont modifiés (voir setCode).
    #[Test]
    public function postalCodeAreNormalizedWhenModified(){
        //Arrange
        $code = "G1F2C2";
        $code2 = "a1b 2c3";
        $expected = "A1B2C3";
        $zipCode = new ZipCode($code);
        //Act
        $zipCode->setCode($code2);
        //Assert     
        $this->assertSame($expected,$zipCode->getCode(),"was normalized when changed");
    }

    // TODO : Le code postal "G1F2C2" est valide.
    #[Test]
    public function thePostalCodeG1F2C2IsValid(){
        //Arrange
        $code = "G1F2C2";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertTrue($asserted,"is valid");
    }
    // TODO : Le code postal "G1F 2C2" est valide.
    #[Test]
    public function thePostalCodeG1F2C2NameSpaceIsValid(){
        //Arrange
        $code = "G1F 2C2";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertTrue($asserted,"is valid");
    }
    // TODO : Le code postal "g1f2c2" est valide.
    #[Test]
    public function thePostalCodeg1f2c2LowerCaseIsValid(){
        //Arrange
        $code = "g1f2c2";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertTrue($asserted,"is valid");
    }
    // TODO : Le code postal "g1f 2c2" est valide.
    #[Test]
    public function thePostalCodeg1f_2c2LowerCaseAndNameSpaceIsValid(){
        //Arrange
        $code = "g1f 2c2";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertTrue($asserted,"is valid");
    }

    // TODO : Un code postal est invalide s'il a plus de 6 caractères (excluant les espaces).
    #[Test]
    public function postalCodeAreInvalidIfLongerThan6(){
        //Arrange
        $code = "G1F2C2D";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertFalse($asserted,"is not valid");
    }
    // TODO : Un code postal est invalide s'il a moins de 6 caractères (excluant les espaces).
    #[Test]
    public function postalCodeAreInvalidIfShorterThan6(){
        //Arrange
        $code = "a1a1a";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertFalse($asserted,"is not valid");
    }
    // TODO : Un code postal est invalide s'il ne respecte pas le format "{Lettre}{Chiffre}{Lettre}{Chiffre}{Lettre}{Chiffre}".
    #[Test]
    public function postalCodeAreInvalidIfFormatNotLettreChiffreLettreChiffreLettreChiffre(){
        //Arrange
        $code = "1a1a1a";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertFalse($asserted,"is not valid");
    }
    // TODO : Un code postal est invalide s'il est vide.
    #[Test]
    public function postalCodeAreInvalidIfEmpty(){
        //Arrange
        $code = "";
        $zipCode = new ZipCode($code);
        //Act
        $asserted = $zipCode->isValid();
        //Assert
        $this->assertFalse($asserted,"is not valid");
    }
    
}

    

