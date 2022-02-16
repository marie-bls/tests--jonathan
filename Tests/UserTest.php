<?php
/* require './vendor/user.php'; */

use App\User;
use PHPUnit\Framework\TestCase;


    class UserTest extends TestCase {

        protected $user;

        // setUp() : est une fonction native, permet de faire un paramétrage, c'est un setup
        // :void signifie vide, pas de retour


        protected function setUp() :void { // cette fonction attribue une instance
            $this->user = new User();
        }

        protected function tearDown():void{ // c'est pour remettre l'attribut comme il était au départ
            User::$addToString = " est mon prénom.";
        }

        /**
        * @test
        */

        public function changeConcatenation(){
            User::$addToString = " est le prénom de votre formateur référent.";

            $this->user->name = "Mathieu";
            $res = $this->user->fullAnswer();


            $this->assertSame("Mathieu est le prénom de votre formateur référent.", $res);
        }

        /**
        * @test
        */

        public function testConcatenationOk(){

            $this->user->name = "Marie"; //grâce au setup pas besoin de faire une nouvelle instance de user  (pas de new user)
            $res = $this->user->fullAnswer();

            $this->assertSame("Marie est mon prénom.", $res);
        }
        
        /**
        * @test
        */
        public function leveUneErreur(){
            try{
                $this->user->nbrChildren = 2;
                $this->user->addToNbrChildren(3);
                $this->fail('une erreur a dû être levée');
            } catch (TypeError $error){
                $this->assertStringStartsWith('App\User::addToNbrChildren():',$error->getMessage());
            }
        }
    }
