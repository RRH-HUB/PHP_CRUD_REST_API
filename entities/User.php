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

    public function saveUser() {
        $connection = new Db();
        $dbAcces = $connection->connect();
        $name = $this->name;
        $age = $this->age;
        $email = $this->email;

        $statement = $dbAcces->prepare("INSERT INTO user (name, email, age) VALUES (:name, :email, :age)");
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':age', $age);

        $statement->execute();

        $statement = null;
        $dbAcces = null;
    }

    public static function getUser($id) {
        $connection = new Db();

        $dbAcces = $connection->connect();
        $id;

        $statement = $dbAcces->prepare("SELECT * FROM user WHERE id = (:id)");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $statement->execute();

        $userObtained = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $userObtained['user'][] = $row;
        }

        return $userObtained;
        $statement = null;
        $dbAcces = null;
    }

    public static function getAllUsers() {
        $connection = new Db();

        $dbAcces = $connection->connect();

        $statement = $dbAcces->prepare("SELECT * FROM user ");

        $statement->execute();

        $usersObtained = array();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $usersObtained['users'][] = $row;
        }

        return $usersObtained;
        $statement = null;
        $dbAcces = null;
    }

    public static function updateUser($_PUT) {
        $connection = new Db();

        $dbAcces = $connection->connect();

        $statement = $dbAcces->prepare("INSERT INTO (name,email,age) VALUES (:name,:email,:age) WHERE id=(:id) ");
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':name', $id, PDO::PARAM_STR);
        $statement->bindParam(':email', $id, PDO::PARAM_STR);
        $statement->bindParam(':age', $id, PDO::PARAM_STR);

        $statement->execute();

        $statement = null;
        $dbAcces = null;
    }

}
