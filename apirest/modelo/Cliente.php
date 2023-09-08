<?php
    require_once "conexion/Conexion.php";

    class Cliente {

        public static function getAll() {
            $db = new Conexion();
            $query = "SELECT * FROM cliente";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $datos[] = [
                        'id' => $row['idcliente'],
                        'nombre' => $row['nombres'],
                        'apellido' => $row['apellido'],
                        'telefono' => $row['telefono'],
                        'fecha_nacimiento' => $row['fechanacimiento'],
                        'genero' => $row['genero']
                    ];
                 } //end of while
                 return $datos;
            }//end if
             return $datos;       
        }//end getall

        public static function getWhere($id_cliente) {
            $db = new Conexion();
            $query = "SELECT * FROM cliente Where idcliente=$id_cliente";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()){
                    $datos[] = [
                        'id' => $row['idcliente'],
                        'nombre' => $row['nombres'],
                        'apellido' => $row['apellido'],
                        'telefono' => $row['telefono'],
                        'fecha_nacimiento' => $row['fechanacimiento'],
                        'genero' => $row['genero']
                    ];
                 } //end of while
                 return $datos;
            }//end if
             return $datos;       
        }//end getWhere

        public static function insert($nombres, $apellido, $telefono, $fechanacimiento, $genero) {
            $db = new Conexion();
            $query = "INSERT INTO cliente(nombres,apellido,telefono,fechanacimiento,genero) 
            VALUES('".$nombres."', '".$apellido."', '".$telefono."', '".$fechanacimiento."', '".$genero."')";
            $db->query($query);
            if($db->affected_rows){
                return  TRUE;
            }//end if
             return FALSE;

        }//end of insert

        public static function update($idcliente, $nombres, $apellido, $telefono, $fechanacimiento, $genero) {
            $db = new Conexion();
            $query = "UPDATE cliente SET nombres = '".$nombres."', apellido='".$apellido."', telefono='".$telefono."', fechanacimiento='".$fechanacimiento."', genero='".$genero."' 
            WHERE idcliente = '".$idcliente."'";
            $db->query($query);
            if($db->affected_rows){
                return  TRUE;
            }//end if
             return FALSE;

        }//end of update

        public static function delete($idcliente) {
            $db = new Conexion();
            $query = "DELETE FROM cliente WHERE idcliente = '".$idcliente."'";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end of delete

        public static function login($idcliente,$password) {
            json_encode(Cliente::getWhere($_GET[$id_cliente]));
            
        }

    }//end class Cliente

    ?>