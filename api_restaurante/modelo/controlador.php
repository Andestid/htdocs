<?php
require_once "conexion/conexion.php";

class controlador {

    public static function registro_aticulos($id_comida, $nombre, $valor) {
        $db = new Conexion();
        $query = "INSERT INTO articulos (id_comida, nombre, valor)
        VALUES ('".$id_comida."', '".$nombre."', '".$valor."');";
        $db->query($query);
        if($db->affected_rows){
           return  TRUE;
        }
        return FALSE;
    }

    public static function registro_clientes($id_cliente, $id_pedido, $nombre, $direccion, $ciudad, $telefono, $cantidad, $id_comida) {
       $db = new Conexion();
       $query = "INSERT INTO cliente (id_cliente, nombre, direccion, ciudad, telefono)
       VALUES ('".$id_cliente."', '".$nombre."', '".$direccion."', '".$ciudad."', '".$telefono."');";
       $db->query($query);
       if($db->affected_rows){
        
        $ultimo_id = $db->insert_id;

        $query = "INSERT INTO pedidos (id_pedido, fecha_pedido, cantidad, id_comida, id_cliente) 
        VALUES ('".$id_pedido."', fecha_pedido = NOW(),'".$cantidad."', '".$id_comida."', '".$id_cliente."');";   
        $db->query($query);


        }
        return FALSE;
    }

        
  
} 

     



?>