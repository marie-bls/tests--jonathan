<?php
    namespace App;

    class User{
        public $name;
        public $nbrChildren;
        public static $addToString = " est mon prénom.";

        public function fullAnswer() {
            return $this->name.self::$addToString;
        }

        public function addToNbrChildren(int $nbr){
            $this->nbrChildren += $nbr;
        }
    }
