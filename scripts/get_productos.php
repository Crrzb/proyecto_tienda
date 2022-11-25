<?php 

include_once('../database/Producto.php');

$lista_productos = Producto::get_all_productos();

echo json_encode($lista_productos);


?>