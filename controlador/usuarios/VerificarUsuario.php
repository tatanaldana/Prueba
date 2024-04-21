<?php
if (isset($_POST['buscar_php'])) {
    $buscar = $_POST['buscar_php'];

    require_once(__DIR__ . '/../../modelo/usuario.php');
    $usuario = new Usuario();
    $resultado = $usuario-> buscar_usuarios($buscar);
    if ($resultado!==false) {
        $response = array("success" => true, "message" => "Propietartio ya se encuentra registrado. ¿Desea realizar el registro de un vehiculo nuevo?");
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }
} else {
    $error = array('error' => 'Parámetros incorrectos');
    echo json_encode($error);
}
?>