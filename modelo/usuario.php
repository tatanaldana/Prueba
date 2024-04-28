<?php
require_once('conexion.php');

class Usuario extends Conexion{

  public function  ver_usuarios(){
    try {
      $conexion = parent::abrir();  
      $stmt = "SELECT * FROM usuarios";
      $stmt = $conexion->prepare($stmt);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de usuarios: ' . $e->getMessage());
    }
  }

  public function  buscar_usuarios($documento){
    try {
      $conexion = parent::abrir();  
      $stmt = "SELECT * FROM usuarios WHERE documento=:documento";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':documento', $documento); 
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de usuarios: ' . $e->getMessage());
    }
  }


  public function  insert_usuarios($documento,$primer_nom,$segundo_nom,$apellidos,$direccion,$telefono,$ciudad,$rol){
    try {
      $conexion = parent::abrir();
      $stmt ="INSERT INTO usuarios (documento, primer_nom, segundo_nom, apellidos, direccion, telefono, ciudad, rol) 
      VALUES (:documento, :primer_nom, :segundo_nom, :apellidos, :direccion, :telefono, :ciudad, :rol)";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':documento', $documento);
      $stmt->bindParam(':primer_nom', $primer_nom);
      $stmt->bindParam(':segundo_nom', $segundo_nom);
      $stmt->bindParam(':apellidos', $apellidos);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->bindParam(':telefono', $telefono);
      $stmt->bindParam(':ciudad', $ciudad);
      $stmt->bindParam(':rol', $rol);
      $stmt->execute();
    
    } catch (PDOException $e) {
      throw new Exception('Error en la consulta de usuarios: ' . $e->getMessage());
    }
  }



  public function  update_usuarios($direccion,$telefono,$ciudad,$documento){
    try {
      $conexion = parent::abrir();  
      $stmt = "UPDATE usuarios SET direccion=:direccion,telefono=:telefono,ciudad=:ciudad WHERE documento=:documento";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->bindParam(':telefono', $telefono);
      $stmt->bindParam(':ciudad', $ciudad);
      $stmt->bindParam(':documento', $documento);
      $stmt->execute();
    } catch (PDOException $e) {
      throw new Exception('Error en la actualizacion de los datos del usuarios: ' . $e->getMessage());
    }
  }

  public function  delete_usuarios($documento){
    try {
      $conexion = parent::abrir();  
      $stmt = "DELETE FROM usuarios WHERE documento=:documento";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':documento', $documento);
      $stmt->execute();
    } catch (PDOException $e) {
      throw new Exception('Error al eliminar al usuario: ' . $e->getMessage());
    }
  }

  public function  view_usuario(){
    try {
      $conexion = parent::abrir();  
      $stmt = "SELECT * FROM Informe";
      $stmt = $conexion->prepare($stmt);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      throw new Exception('Error al eliminar al usuario: ' . $e->getMessage());
    }
  }

  public function  view_propietario(){
    try {
      $conexion = parent::abrir();  
      $stmt = "SELECT * FROM PropietariosSinAsignar";
      $stmt = $conexion->prepare($stmt);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      throw new Exception('Error al eliminar al usuario: ' . $e->getMessage());
    }
  }

  public function  view_conductor(){
    try {
      $conexion = parent::abrir();  
      $stmt = "SELECT * FROM ConductoresLibres";
      $stmt = $conexion->prepare($stmt);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      throw new Exception('Error al eliminar al usuario: ' . $e->getMessage());
    }
  }

}
?>