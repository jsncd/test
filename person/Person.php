<?php

class Person{
    public $firstName;
    public $lastName;
    public $birthDay;
    
    public function getFullName()
    {
        $fullName = $this->firstName. " ".$this->lastName. " " .$this->birthDay;
        return $fullName;
    }
    }


