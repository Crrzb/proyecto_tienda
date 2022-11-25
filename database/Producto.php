<?php 

include_once('Conexion.php');
class Producto extends Conexion{
    public static function get_all_productos(){
        $conexion_productos = new Conexion();
        $conexion_productos->conectar();
        $prepared_query = mysqli_prepare($conexion_productos->conexion,"SELECT * FROM productos");
        $prepared_query->execute();
        $resultado = $prepared_query->get_result();
        $lista_productos = [];
        while($prod = $resultado->fetch_object(Producto::class)){
            array_push($lista_productos,$prod);
        }

        return $lista_productos;
    }

    public static function get_producto($id_producto){
        $conexion_producto = new Conexion();
        $conexion_producto->conectar();
        $prepared_query = mysqli_prepare($conexion_producto->conexion,"SELECT * FROM productos WHERE id_producto = ?");
        $prepared_query->bind_param("i",$id_producto);
        $prepared_query->execute();
        $resultado = $prepared_query->get_result();
        $lista_productos = [];
        while($prod = $resultado->fetch_object(Producto::class)){
            array_push($lista_productos,$prod);
        }

        return $lista_productos;
    }

    public static function post_producto($id_categoria,$nombre_producto,$precio_producto){
        $conexion_producto = new Conexion();
        $conexion_producto->conectar();
        $prepared_query = mysqli_prepare($conexion_producto->conexion,"INSERT INTO productos (id_categoria,nombre_producto,precio_producto) VALUES (?,?,?)");
        $prepared_query->bind_param("isi",$id_categoria,$nombre_producto,$precio_producto);
        return $prepared_query->execute();
    }
}






?>