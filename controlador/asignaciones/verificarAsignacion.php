<?php
    require_once(__DIR__ . '/../../modelo/asignaciones.php');
    
    $asigna = new Asignacion();
  
    $resultado = $asigna->verificar_asignacion();

    if ($resultado) {
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'Todos los vehiculos estan asignados');
        echo json_encode($error);
    }

?>