<?php

try {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "api_db";
    $conexion = mysqli_connect($server, $username, $password, $database);
} catch (Exception $ex) {
    die("conection falied: " . mysqli_connect_error());
}
