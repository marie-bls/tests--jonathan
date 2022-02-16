<?php

use PHPUnit\Framework\TestCase;
use App\User;

    class UserTest extends TestCase {

    protected $user;

    protected function setUp():void{ // fonction setup, de modèle, de paramétrage
        $this->user = new User(); // cette fonction attribue une instance
    }

    protected function tearDown():void{
        User:$addToString = " est mon prénom.";
    }
    /**
    * @test
    */


    
    public function testConcatenationOk(){
           
        $this->user->name ="Marie";  //grâce au setup pas besoin de faire une nouvelle instance de user  (pas de new user)
        $res = $user->fullAnswer();
        $this -> assertSame("Marie est mon prénom.", $res);
    }    
    
    /** 
    * @test
    */
    
    public function changeConcatenation(){
        User::$addToString = " est le prénom de votre formateur référent.";
        $this->user->name ="Mathieu";
    
        $res = $user->fullAnswer();
    
        $this->assertSame("Mathieu est le prénom de votre formateur référent.", $res);
    }

}

?>