<?php
    Class Conexion{

        public $conexion;
        public function conectar(){
            $host = 'localhost';
            $db_user = 'root';
            $db_password = '';
            $db_name = 'tienda_db';

            $this->conexion = mysqli_connect($host,$db_user,$db_password,$db_name);
        }
    }
?>