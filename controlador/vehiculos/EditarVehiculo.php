<?php
$placa = $_POST['placa'];
$color = $_POST['color'];
$tipo_veh = $_POST['tipo_veh'];

if (!isset($placa) || !isset($color) || !isset($tipo_veh)) {
    $response = array("success" => false, "message" => "Por favor llena todos los campos del formulario");
} else {
    header('Content-Type: application/json');
    require_once(__DIR__ . '/../../modelo/vehiculos.php');

    $vehiculo = new Vehiculo();

    $resultado=$vehiculo->update_vehiculos($color,$tipo_veh,$placa);

    try {
        if ($resultado !== false) {
                $response = array("success" => true, "message" => "Datos actualizados exitosamente");
            } else {
                $response = array("success" => false, "message" => "Error al actualizar datos");
            }
    } catch (Exception $e) {
        $response = array("success" => false, "message" => $e->getMessage());
    }
}

echo json_encode($response);
exit();
?>