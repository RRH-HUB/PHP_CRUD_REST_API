<?php

$method = $_SERVER['REQUEST_METHOD'];
header("Content-Type: application/json");
include_once '../entities/User.php';


switch ($method) {
    case 'POST':

        $_POST = json_decode(file_get_contents('php://input'), true);
        $user = new User($_POST["name"], $_POST["age"], $_POST["email"]);
        $user->saveUser();
        $result = $_POST;
        echo json_encode($result);
        break;
    
    case 'GET':
        
        if (isset($_GET['id'])) {
            $userObtained = User::getUser((int) $_GET['id']);
            echo json_encode($userObtained);
        } else {
            $usersObtained = User::getAllUsers();
            echo json_encode($usersObtained);
        }
        break;
        
    case 'PUT':
        $body = file_get_contents("php://input");
        User::updateUser($body);
        echo "succes";
        break;
    
    case 'DELETE':
        $body = file_get_contents("php://input");
        
        User::deleteUser($body);
            
        echo "delete user";
        break;
    default :
        echo "null";
        break;
}
/*
 * crear users               POST        /user/{json de usuario}
 * leer 1 users              GET         /user/{id}
 * leer todos los users      GET         /user/listAll
 * actualizar users          PUT         /user/{json con usuario }
 * delete users              DELETE      /user/{id}
 */