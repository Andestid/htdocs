<?php
require_once "conexion/conexion.php";
    class controlador {        
        //tabla votante
        public static function registro_votante($novotante,$nombre,$apellido,$tipo,$genero,$localidad){
            $db = new Conexion();
            $query = "INSERT INTO votante (novotante,nombre,apellido,tipo,genero,localidad)
            VALUES ('".$novotante."','".$nombre."','".$apellido."','".$tipo."','".$genero."','".$localidad."');";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;
        }
        
        public static function registro_candidato($nocandidato,$nombre,$apellido,$tipo,$genero,$localidad,$partido){
            $db = new Conexion();
            $query = "INSERT INTO candidato (nocandidato,nombre,apellido,tipo,genero,localidad,partido)
            VALUES ('".$nocandidato."','".$nombre."','".$apellido."','".$tipo."','".$genero."','".$localidad."','".$partido."');";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;
        }
        public static function registro_votos($nocandidato,$novotante){
            $db = new Conexion();
            $query = "SELECT * FROM votos WHERE novotante='".$novotante."'";
            $resultado = $db->query($query);
            $datosvotante = [];
            if($resultado->num_rows){
                return 'voto guardado';    
            }else{
                $query = "SELECT candidato.localidad,candidato.nocandidato FROM candidato WHERE nocandidato='".$nocandidato."'";
            $resultado = $db->query($query);
            $datoscandidato = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()) {
                      $datoscandidato[] = [
                        'candidatolocalidad' => $row['localidad'],
                        'candidatocedula' => $row['nocandidato']
                      ];
                }     
            }
            $query = "SELECT votante.localidad,votante.novotante FROM votante WHERE novotante='".$novotante."'";
            $resultado = $db->query($query);
            $datosvotante = [];
            if($resultado->num_rows){
                while($row = $resultado->fetch_assoc()) {
                      $datosvotante[] = [
                        'votantelocalidad' => $row['localidad'],
                        'votantantecedula' => $row['novotante']
                      ];
                }     
            }
            if($datoscandidato[0]["candidatolocalidad"] == $datosvotante[0]["votantelocalidad"]){
            $query = "INSERT INTO votos (nocandidato,novotante)
            VALUES ('".$nocandidato."','".$novotante."');";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return 'No coinciden las localidades';
            }
        } 
            }   
    }

?>