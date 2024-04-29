<?php
if (isset($_POST['placa_php'])) {
    header('Content-Type: application/json');
    $placa  = $_POST['placa_php'];
    require_once(__DIR__ . '/../../modelo/asignaciones.php');
    
    $asigna = new Asignacion();
  
    $resultado = $asigna->detalle_asignacion($placa);

    if ($resultado) {
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }
}
?>