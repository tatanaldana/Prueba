<?php
require_once('conexion.php');

class Vehiculo extends Conexion{

  public function view_vehiculos(){
    try {
        $conexion = parent::abrir();  
         $stmt = "SELECT * FROM VehiculosSinAsignar";
        $stmt = $conexion->prepare($stmt);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        throw new Exception('Error en la consulta de vehículos: ' . $e->getMessage());
    }
}

  public function ver_vehiculos(){
    try {
        $conexion = parent::abrir();  
        $stmt = "SELECT CASE 
                        WHEN tipo_veh = 1 THEN 'Publico'
                        WHEN tipo_veh = 0 THEN 'Particular'
                        ELSE 'Desconocido'
        END AS tipo_vehiculo, placa, color, Marca,doc_usuario FROM vehiculos";
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
      $stmt = "INSERT INTO vehiculos(placa,marca,color,tipo_veh,doc_usuario) VALUES (:placa, :marca, :color,:tipo_veh, :doc_usuario)";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':placa', $placa);
      $stmt->bindParam(':marca', $marca);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':tipo_veh', $tip_veh);
      $stmt->bindParam(':doc_usuario', $doc_usuario);
      $stmt->execute();
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de usuarios: ' . $e->getMessage());
    }
  }

  public function validar_vehiculos($placa){
    try {
        $conexion = parent::abrir();  
        $stmt = "SELECT * FROM vehiculos WHERE placa=:placa";
        $stmt = $conexion->prepare($stmt);
        $stmt->bindParam(':placa', $placa);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        throw new Exception('Error en la consulta de usuarios: ' . $e->getMessage());
    }
}


  public function  update_vehiculos($color,$tipo_veh,$placa){
    try {
      $conexion = parent::abrir();  
      $stmt = "UPDATE vehiculos SET color=:color,tipo_veh=:tipo_veh WHERE placa=:placa";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':tipo_veh', $tipo_veh); 
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
      return true;
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de vehículos: ' . $e->getMessage());
    }
  }
}
?>