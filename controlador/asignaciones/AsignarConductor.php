<?php
$placa = $_POST['placa_php'];
$fecha_asignacion = date("Y-m-d H:i:s");
$doc_usuario = $_POST['documento_php'];

if (!isset($placa) || !isset($fecha_asignacion) || !isset($doc_usuario)) {
    $response = array("success" => false, "message" => "Por favor llena todos los campos del formulario");
} else {
    header('Content-Type: application/json');
    require_once(__DIR__ . '/../../modelo/asignaciones.php');

    $asigna = new Asignacion();

    $resultado = $asigna->insert_asignacion($placa,$doc_usuario,$fecha_asignacion);
    try {
        if ($resultado !== false) {
        $response = array("success" => true, "message" => "Vehículo asignado exitosamente");
    
            } else {
                $response = array("success" => false, "message" => "Error al asignar vehiculo");
            }
        } catch (Exception $e) {
            $response = array("success" => false, "message" => $e->getMessage());
        }
}

echo json_encode($response);
exit();
?>