<?php
if (isset($_POST['buscar_php'])) {
    header('Content-Type: application/json');
    $buscar = $_POST['buscar_php'];
    require_once(__DIR__ . '/../../modelo/usuario.php');
    $usuario = new Usuario();
    $resultado = $usuario->buscar_usuarios($buscar);
    if ($resultado !== false && !empty($resultado)) {
        // Validar el valor del rol
        if ($resultado[0]['rol'] == 1) {
            $response = array("success" => true, "message" => "El propietario ya está registrado en el sistema.");
            echo json_encode($response);
        } elseif ($resultado[0]['rol'] == 0) {
            $error = array('success' => false, 'message' => 'El usuario encontrado es un conductor y no puede ser propietario.');
            echo json_encode($error);
        }
    } else {
        $error = array('success' => false, 'message' => 'No se encontraron datos del usuario en el sistema.');
        echo json_encode($error);
    }
} else {
    $error = array('success' => false, 'message' => 'Parámetros incorrectos.');
    echo json_encode($error);
}
?>