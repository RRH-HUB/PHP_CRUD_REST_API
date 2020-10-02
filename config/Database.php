<?php
class Database{
    private $server='localhost';
    private $user='root';
    private $password='';
    private $dbname='api_db';
    private $conexion;
    
    public function Connect (){
        $this->conexion=null;
        try{
            $this->conexion= new PDO('mysql:host='.$this->server.
                    ';mysql:dbname='.$this->dbname,$this->user, $this->password);
            
            $this->conexion.setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        } catch (Exception $ex) {
            echo "connection error".$ex;
        }
        return $this->conexion;
    }
}
/*
 * crear user               POST        /user
 * leer 1 user              GET         /user/{id}
 * leer todos los user      GET         /user
 * actualizar user          PUT         /user/{id}
 * delete user              DELETE      /user/{id}
 */