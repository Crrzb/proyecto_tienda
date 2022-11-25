<?php include_once('../database/Categoria.php');

        if(isset($_POST['n'])){
            Categoria::post_categoria($_POST['n']);
        }






?>