<?php

class Conexion{
    private $server="mysql:host=localhost;dbname=acme";
    private $username="root";
    private $password="";
    Private $options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    public function abrir(){
        try{
            $this->conexion = new PDO($this->server, $this->username, $this->password, $this->options);
            return $this->conexion;
        }
        catch (PDOException $e){
            echo "Hubo un problema con la conexión: " . $e->getMessage();
        }

   }

   public function cerrar(){
          $this->conexion =null;
    }

}

?>
    
