<?php
if (isset($_POST['placa_php'])) {
    header('Content-Type: application/json');
    $placa = $_POST['placa_php'];
    require_once(__DIR__ . '/../../modelo/vehiculos.php');
    
    $vehiculo = new Vehiculo();
  
    try {
        $resultado = $vehiculo->delete_vehiculos($placa);
        if ($resultado) {
            $response = array( 'success' => true,'message' => 'Vehiculo eliminado exitosamente');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Ocurrió un error al eliminar el vehiculo');
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response = array('success' => false, 'message' => 'Error al eliminar el vehiculo: ' . $e->getMessage());
        echo json_encode($response);
    }
}
?>