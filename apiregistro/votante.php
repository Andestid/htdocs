<?php

require_once "modelo/controlador.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo 'TEST_Votante';
        break;
    case 'POST':
        $datos = JSON_decode(file_get_contents('php://input'));
        if($datos != null) {
           if(controlador::registro_votante($datos->novotante,$datos->nombre,$datos->apellido,$datos->tipo,$datos->genero,$datos->localidad)){
            http_response_code(200);
            echo 'OK_votante guardado';
           }
        } else {
            echo 'ERROR';
        }
    default:
        break;
}
?>