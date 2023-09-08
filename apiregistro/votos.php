<?php

require_once "modelo/controlador.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo 'TEST_Votos';
        break;
    case 'POST':
        $datos = JSON_decode(file_get_contents('php://input'));
        if($datos != null) {
           if(controlador::registro_votos($datos->nocandidato,$datos->novotante)){
            http_response_code(200);
            echo json_encode(controlador::registro_votos($datos->nocandidato,$datos->novotante));
           }
        } else {
            echo 'ERROR';
        }
    default:
        break;
}
?>