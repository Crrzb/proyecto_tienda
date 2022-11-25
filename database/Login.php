<?php 

include_once('Conexion.php');
class Login extends Conexion{
    public static function log_in(){
        $conexion_login = new Conexion();
        $conexion_login->conectar();
        
    }
}






?>