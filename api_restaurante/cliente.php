<?php
require_once "modelo/controlador.php";
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $datos = JSON_decode(file_get_contents('php://input'));
        if($datos != null) {
            if(controlador::registro_clientes($datos->id_cliente, $datos->id_pedido, $datos->nombre, $datos->direccion, $datos->ciudad, $datos->telefono, $datos->cantidad, $datos->id_comida)){
                http_response_code(200);
                echo 'Cliente Registrado';
            } else {
                http_response_code(400);
            }
        }  
        else{
        http_response_code(405);
        }
        break;
}

?>