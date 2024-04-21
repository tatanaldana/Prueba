<?php
$documento = $_POST['documento'];
$primer_nom = $_POST['primer_nom'];
$segundo_nom = $_POST['segundo_nom'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$marca = $_POST['marca'];
$tip_veh = $_POST['tipo_veh'];
$color = $_POST['color'];
$placa = $_POST['placa'];
$rol = 1;

if (empty($documento) || empty($primer_nom) || empty($segundo_nom) || empty($apellidos) || empty($placa)
    || empty($direccion) || empty($telefono) || empty($ciudad) || empty($marca) || empty($color)) {
    $response = array("success" => false, "message" => "Por favor llena todos los campos del formulario");
} else {
    require_once(__DIR__ . '/../../modelo/usuario.php');
    require_once(__DIR__ . '/../../modelo/vehiculos.php');

    $usuario = new Usuario();
    $vehiculo = new Vehiculo();

    try {
        $resultado1 = $usuario->insert_usuarios($documento, $primer_nom, $segundo_nom, $apellidos, $direccion, $telefono, $ciudad, $rol);
        if ($resultado1 !== false) {
            $resultado2 = $vehiculo->insert_vehiculos($placa, $marca, $color, $tip_veh, $documento);
            if ($resultado2 !== false) {
                $response = array("success" => true, "message" => "Usuario y vehículo registrados exitosamente");
            } else {
                $response = array("success" => false, "message" => "Error al insertar el vehículo");
            }
        } else {
            $response = array("success" => false, "message" => "Error al insertar el usuario");
        }
    } catch (Exception $e) {
        $response = array("success" => false, "message" => $e->getMessage());
    }
}

echo json_encode($response);
exit();
?>