<?php
$documento = $_POST['documento'];
$primer_nom = $_POST['primer_nom'];
$segundo_nom = $_POST['segundo_nom'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$rol = 0;

if (empty($documento) || empty($primer_nom) || empty($segundo_nom) || empty($apellidos) || empty($direccion)
|| empty($telefono) || empty($ciudad)) {
    $response = array("success" => false, "message" => "Por favor llena todos los campos del formulario");
} else {
    require_once(__DIR__ . '/../../modelo/usuario.php');

    $usuario = new Usuario();

    try {
        $resultado1 = $usuario->insert_usuarios($documento, $primer_nom, $segundo_nom, $apellidos, $direccion, $telefono, $ciudad, $rol);
        if ($resultado1 !== false) {
                $response = array("success" => true, "message" => "Conductor registrado exitosamente");
            } else {
                $response = array("success" => false, "message" => "Error al insertar condcutor");
            }
    } catch (Exception $e) {
        $response = array("success" => false, "message" => $e->getMessage());
    }
}

echo json_encode($response);
exit();
?>