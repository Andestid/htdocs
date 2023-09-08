<?php

require_once "modelo/controlador.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo 'TESTCandidato';
        break;
    case 'POST':
        $datos = JSON_decode(file_get_contents('php://input'));
        if($datos != null) {
           if(controlador::registro_candidato($datos->novotante,$datos->nombre,$datos->apellido,$datos->tipo,$datos->genero,$datos->localidad,$datos->partido)){
            http_response_code(200);
            echo 'OK_candidato guardado';
           }
        } else {
            echo 'ERROR';
        }
    default:
        break;
}
?>