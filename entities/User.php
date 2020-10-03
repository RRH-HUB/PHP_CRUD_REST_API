<?php

include '../config/Db.php';

class User {

    private $name;
    private $age;
    private $email;

    public function __construct($name, $age, $email) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
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

    public function guardarUsuario() {
        $connection = new Db();
        $dbAcces = $connection->connect();
        $name = $this->name;
        $age = $this->age;
        $email = $this->email;

        $sentencia = $dbAcces->prepare("INSERT INTO user (name, email, age) VALUES (:name, :email, :age)");
        $sentencia->bindParam(':name', $name);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':age', $age);
        
        $sentencia->execute();
    }

}
