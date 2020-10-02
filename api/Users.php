<?php
require '../class/user.php';

$method=$_SERVER['REQUEST_METHOD'];

switch ($method){
    case 'POST':
        $_POST= json_decode(file_get_contents('php://input'), true);
        echo "crear ".$_POST['name'];
        break;
    case 'GET':
        if (isset($_GET['id'])){
                echo "datos".$_GET['id'];
                echo "leer 1 usuario";
        }else{
            echo "listar usuarios";
        }
        break;
    case 'PUT':
        $_Put= json_decode(file_get_contents('php://input'), true);
        echo "actualizar usuario".$_GET['id'];
        break;
    case 'DELETE':
        echo "borrar user".$_GET['id'];
        break;
    default :
        echo "null";
        break;
}
/*
 * crear users               POST        /user
 * leer 1 users              GET         /user/{id}
 * leer todos los users      GET         /user
 * actualizar users          PUT         /user/{id}
 * delete users              DELETE      /user/{id}
 */