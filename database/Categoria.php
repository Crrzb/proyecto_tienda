<?php 

include_once('Conexion.php');
class Categoria extends Conexion{
    public static function get_all_categorias(){
        $conexion_categoria = new Conexion();
        $conexion_categoria->conectar();
        $prepared_query = mysqli_prepare($conexion_categoria->conexion,"SELECT * FROM categorias");
        $prepared_query->execute();
        $resultado = $prepared_query->get_result();
        $lista_categorias = [];
        while($cat = $resultado->fetch_object(Categoria::class)){
            array_push($lista_categorias,$cat);
        }

        return $lista_categorias;
    }

    public static function get_categoria($id_categoria){
        $conexion_categoria = new Conexion();
        $conexion_categoria->conectar();
        $prepared_query = mysqli_prepare($conexion_categoria->conexion,"SELECT * FROM categorias WHERE id_categoria = ?");
        $prepared_query->bind_param("i",$id_categoria);
        $prepared_query->execute();
        $resultado = $prepared_query->get_result();
        $lista_categorias = [];
        while($categoria = $resultado->fetch_object(Categoria::class)){
            array_push($lista_categorias,$categoria);
        }

        return $lista_categorias;
    }

    public static function post_categoria($nombre){
        $conexion_categoria = new Conexion();
        $conexion_categoria->conectar();
        $prepared_query = mysqli_prepare($conexion_categoria->conexion,"INSERT INTO categorias (nombre_categoria) VALUES (?)");
        $prepared_query->bind_param("s",$nombre);
        return $prepared_query->execute();
    }




}






?>