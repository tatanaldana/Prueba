<?php
$documento = $_POST['documento2'];
$direccion = $_POST['direccion1'];
$telefono = $_POST['telefono1'];
$ciudad = $_POST['ciudad1'];


if (empty($documento) || empty($direccion) || empty($telefono) || empty($ciudad)) {
    $response = array("success" => false, "message" => "Por favor llena todos los campos del formulario");
} else {
    header('Content-Type: application/json');
    require_once(__DIR__ . '/../../modelo/usuario.php');

    $usuario = new Usuario();

    $resultado=$usuario->update_usuarios($direccion,$telefono,$ciudad,$documento);

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