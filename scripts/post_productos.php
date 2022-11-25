<?php include_once('../database/Producto.php');

        if(isset($_POST['c'])){
            Producto::post_producto($_POST['c'],$_POST['n'],$_POST['p']);
            echo $_POST['c'];
        }






?>