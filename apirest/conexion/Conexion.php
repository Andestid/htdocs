<?php

class Conexion extends Mysqli { //calse heredada de mysqli
    function __construct() { //contructor
        parent::__construct('localhost', 'root', '', 'api_resto');//localhost url, usuario, contraseña, nombre de bs
        $this->set_charset('utf8');//al guardaar datos lo triaga con caracteres+}
        echo $this->connect_error == null ? 'Conexion exitosa a la DB ' : die('Error al conectarse a la DB');
    }//end constructor
}//end class

?>