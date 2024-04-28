<?php
$marca = $_POST['marca'];
$placa = $_POST['placa'];
$color = $_POST['color'];
$tipo_vehiculo = $_POST['tipo_veh'];
$doc_usuario = $_POST['documento1'];

if (!isset($marca) || !isset($placa) || !isset($color) || !isset($tipo_vehiculo) || !isset($doc_usuario)) {
    $response = array("success" => false, "message" => "Por favor llena todos los campos del formulario");
} else {
    header('Content-Type: application/json');
    require_once(__DIR__ . '/../../modelo/vehiculos.php');

    $vehiculo = new Vehiculo();

    $resultado = $vehiculo->validar_vehiculos($placa);
    if (!empty($resultado)) {
        $response = array("success" => false, "message" => "El vehiculo ya se encuentra registrado.");
    } else {
        try {
            $resultado1 = $vehiculo->insert_vehiculos($placa, $marca, $color, $tipo_vehiculo, $doc_usuario);
            if ($resultado1 !== false) {
                $response = array("success" => true, "message" => "Vehículo registrado exitosamente");
            } else {
                $response = array("success" => false, "message" => "Error al insertar vehiculo");
            }
        } catch (Exception $e) {
            $response = array("success" => false, "message" => $e->getMessage());
        }
    }
}

echo json_encode($response);
exit();
?>