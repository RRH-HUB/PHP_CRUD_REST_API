<?php
$method=$_SERVER['REQUEST_METHOD'];
header("Content-Type: application/json");
include_once '../entities/User.php';
switch ($method){
    case 'POST':
        $_POST= json_decode(file_get_contents('php://input'), true);
        $user=new User($_POST["name"], $_POST["age"], $_POST["email"]);
        $user->guardarUsuario();
        $result['Response']="Guardar el usuario ".json_encode($_POST);
        echo json_encode($result);
        break;
    case 'GET':
        if (isset($_GET['id'])){
            $result['Response']="Obtener el usuario ".$_GET['id'];
            echo json_encode($result);
        }else{
            $result['Response']="Devolver todos los usuarios ";
            echo json_encode($result);
        }
        break;
    case 'PUT':
        $_Put= json_decode(file_get_contents('php://input'), true);
        $result['Response']="actualizar el usuario ".$_GET['id'].
            "Con la informacion".json_encode($_PUT);
        echo json_encode($result);
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