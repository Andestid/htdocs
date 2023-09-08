<?php
require_once "modelo/Cliente.php";
switch ($_SERVER['REQUEST_METHOD']) {
    case'GET':
        if(isset($_GET['idcliente'])) {
            echo json_encode(Cliente::getWhere($_GET['idcliente']));
        }
        else {
             echo json_encode(Cliente::getAll());
        }
        break;
    

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos != null) {
            if(Cliente::insert($datos->nombre,$datos->apellido,$datos->telefono,$datos->fecha_nacimiento,$datos->genero)){
                http_response_code(200);
            }
            else{
                http_response_code(400);
            }
        }
        else {
            http_response_code(405);          
        }
        break;

    case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != null) {
                if(Cliente::update($datos->id, $datos->nombre, $datos->apellido, $datos->telefono, $datos->fecha_nacimiento,$datos->genero)){
                    http_response_code(200);
                }
                else{
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);          
            }
            break;
    
    case 'DELETE':
        if(isset($_GET['idcliente'])){
            if(Cliente::delete($_GET['idcliente'])){
                http_response_code(200);
            }
            else{
                http_response_code(400);
            }
        }//end if
        else{
            http_response_code(405);
        }//end else
        break;




    default:
    http_response_code(405);
        # code...

        break;
 }  

?>