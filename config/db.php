<?php

include 'databaseMysqli.php';

class db {

    function connect() {

        try {
            $conexion = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE, USERNAME, PASSWORD);
            return $conexion;
        } catch (Exception $ex) {
            echo "connection error ".$ex->getMessage();
        }
    }

}
