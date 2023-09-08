<?php

class Conexion extends Mysqli{
    function __construct(){
        parent::__construct('localhost', 'root', '', 'registro');
        $this->set_charset('utf8'); 
        $this-> connect_error == null ? ' Conexion exitosa': die('Error conexion');
    }
}

?>