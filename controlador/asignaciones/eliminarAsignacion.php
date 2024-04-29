<?php
if (isset($_POST['placa_php'])) {
    header('Content-Type: application/json');
    $placa = $_POST['placa_php'];
    require_once(__DIR__ . '/../../modelo/asignaciones.php');
    
    $asigna = new Asignacion();
  
    try {
        $resultado = $asigna->delete_asignacion($placa);
        if ($resultado) {
            $response = array( 'success' => true,'message' => 'El vehiculo ha quedado disponible');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Ocurrió un error al liberar el vehiculo');
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response = array('success' => false, 'message' => 'Error al liberar el vehiculo: ' . $e->getMessage());
        echo json_encode($response);
    }
}
?>