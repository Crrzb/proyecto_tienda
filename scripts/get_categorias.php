<?php 

include_once('../database/Categoria.php');

$lista_categorias = Categoria::get_all_categorias();

echo json_encode($lista_categorias);


?>