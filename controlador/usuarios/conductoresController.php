<?php
    require_once(__DIR__ . '/../../modelo/usuario.php');
    
    $usuario = new Usuario();
  
    $resultado = $usuario->view_conductor();

    if ($resultado) {
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }

?>