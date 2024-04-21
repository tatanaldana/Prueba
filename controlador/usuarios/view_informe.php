<?php
    require_once('/prueba/modelo/usuario.php');
    
    $usuario = new Usuario();
  
    $resultado = $usuario->view_usuario();

    if ($resultado) {
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }

?>
