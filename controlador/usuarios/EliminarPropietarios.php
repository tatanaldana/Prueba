<?php
if (isset($_POST['documento_php'])) {
    header('Content-Type: application/json');
    $documento = $_POST['documento_php'];
    require_once(__DIR__ . '/../../modelo/usuario.php');
    
    $usuario = new Usuario();
  
    try {
        $resultado = $usuario->delete_usuarios($documento);
        if ($resultado) {
            $response = array( 'success' => true,'message' => 'Usuario eliminado exitosamente');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Ocurrió un error al eliminar el usuario');
            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response = array('success' => false, 'message' => 'Error al eliminar el usuario: ' . $e->getMessage());
        echo json_encode($response);
    }
}
?>