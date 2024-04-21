<?php
require_once('conexion.php');

class Vehiculo extends Conexion{

  public function  ver_vehiculos(){
    try {
      $conexion = parent::abrir();  
      $stmt = "SELECT * FROM vehiculos";
      $stmt = $conexion->prepare($stmt);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de vehículos: ' . $e->getMessage());
    }
  }

  public function  insert_vehiculos($placa,$marca,$color,$tip_veh,$doc_usuario){
    try {
      $conexion = parent::abrir();  
      $stmt = "INSERT INTO vehiculos VALUES (:placa, :marca, :color,:tip_veh, :doc_usuario)";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':placa', $placa);
      $stmt->bindParam(':marca', $marca);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':tip_veh', $tip_veh);
      $stmt->bindParam(':doc_usuario', $doc_usuario);
      $stmt->execute();
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de usuarios: ' . $e->getMessage());
    }
  }



  public function  update_vehiculos($color,$tip_veh,$doc_usuario,$placa){
    try {
      $conexion = parent::abrir();  
      $stmt = "UPDATE vehiculos SET color=:color,tip_veh=:tip_veh,doc_usuario=:doc_usuario WHERE placa=:placa";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':tip_veh', $email);
      $stmt->bindParam(':doc_usuario', $doc_usuario); 
      $stmt->bindParam(':placa', $placa);
      $stmt->execute();
    } catch (PDOException $e) {
      throw new Exception('Error en la actualizacion de los datos del usuarios: ' . $e->getMessage());
    }
  }

  public function  delete_vehiculos($placa){
    try {
      $conexion = parent::abrir();  
      $stmt = "DELETE FROM vehiculos WHERE placa=:placa";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':placa', $placa);
      $stmt->execute();
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de vehículos: ' . $e->getMessage());
    }
  }
}
?>