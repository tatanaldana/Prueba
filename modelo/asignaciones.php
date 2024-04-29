<?php
require_once('conexion.php');

class Asignacion extends Conexion{


public function verificar_asignacion(){
  try {
      $conexion = parent::abrir();  
      $stmt = "SELECT V.placa, V.color, V.marca, CASE 
      WHEN V.tipo_veh = 0 THEN 'Publico'
      WHEN V.tipo_veh = 1 THEN 'Particular'
      ELSE 'Desconocido'
      END AS tipo_veh FROM vehiculos V
      LEFT JOIN asignaciones A ON V.placa = A.placa_veh WHERE A.placa_veh IS NULL";
      $stmt = $conexion->prepare($stmt);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
  } catch (PDOException $e) {
      throw new Exception('Error en la consulta de usuarios: ' . $e->getMessage());
  }
}

public function  insert_asignacion($placa,$doc_usuario,$fecha_asignacion){
    try {
      $conexion = parent::abrir();  
      $stmt = "INSERT INTO asignaciones(placa_veh,doc_usuario,fecha_asignacion) VALUES (:placa, :doc_usuario,:fecha_asignacion)";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':placa', $placa);
      $stmt->bindParam(':doc_usuario', $doc_usuario);
      $stmt->bindParam(':fecha_asignacion', $fecha_asignacion);
      $stmt->execute();
    } catch (PDOException $e) {
      throw new Exception('Error al asignar vehiculo: ' . $e->getMessage());
    }
  }

  public function  delete_asignacion($placa){
    try {
      $conexion = parent::abrir();  
      $stmt = "DELETE FROM asignaciones WHERE placa_veh=:placa_veh";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':placa_veh', $placa);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      throw new Exception('Error al eliminar al usuario: ' . $e->getMessage());
    }
  }

  public function  detalle_asignacion($placa){
    try {
      $conexion = parent::abrir();  
      $stmt = "SELECT c.documento AS documento_c, c.primer_nom AS primer_nom_c, c.segundo_nom AS segundo_nom_c, c.apellidos AS apellidos_c,
      c.direccion AS direccion_c,c.telefono AS telefono_c, c.ciudad AS ciudad_c, p.documento AS documento_p, p.primer_nom AS primer_nom_p,
      p.segundo_nom AS segundo_nom_p, p.apellidos AS apellidos_p, p.direccion AS direccion_p, p.telefono AS telefono_p, p.ciudad AS ciudad_p,
      v.Marca, v.color, v.placa, v.tipo_veh FROM vehiculos AS v JOIN usuarios AS p ON v.doc_usuario = p.documento LEFT JOIN 
      asignaciones AS a ON v.placa = a.placa_veh LEFT JOIN  usuarios AS c ON a.doc_usuario = c.documento
      WHERE v.placa = :placa_veh";
      $stmt = $conexion->prepare($stmt);
      $stmt->bindParam(':placa_veh', $placa);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (PDOException $e) {
      throw new Exception('Error al eliminar al usuario: ' . $e->getMessage());
    }
  }
}
?>