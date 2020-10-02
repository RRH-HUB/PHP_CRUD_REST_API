<?php
class User{
    private $name;
    private $age;
    private $email;
    
    public function __construct($name,$age,$email){
        $this->name=$name;
        $this->age=$age;
        $this->email=$email;
    }
    function getName() {
        return $this->name;
    }

    function getAge() {
        return $this->age;
    }

    function getEmail() {
        return $this->email;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setAge($age): void {
        $this->age = $age;
    }

    function setEmail($email): void {
        $this->email = $email;
    }


}