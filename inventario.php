<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>

    <link rel="stylesheet" href="estilos/inventario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="border-bottom border-1 border-dark">
        <div class="row">
            <div class="col ps-5">
                <p class="display-6 text-start">Tienda</p>
            </div>
            <div class="col text-end pe-5 pt-3">
                <button class="btn btn-primary" onclick="goto_caja();">Caja</button>
                <button class="btn btn-primary" onclick="salir();">Salir</button>
            </div>
        </div>
    </nav>

    <main class="container-fluid bg-dark">
        <div class="row" id="main_row">

            



            <section class="col border-end border-1 border-light rounded" id="information_section">
                <div class="row" id="row_information_section">
                    <div class="col pt-4 text-white">
                    <h3 class="display-6 fs-3" id="h3_information">Selecciona una categoria o producto.</h3>
                        <form action="" method="POST" class="visually-hidden" id="form_producto">
                            <label for="name_producto">Nombre del producto</label>
                            <input type="text" name="name_producto" id="input_name_producto" class=" form-control mb-3" placeholder="Producto 1">
                            <label for="select_categoria">Selecciona una categoria.</label>

                            <select name="select_categoria" id="select_categoria" class=" form-control mb-3">
                            </select>
                            <label for="precio_producto">Precio.</label>
                            <input type="text" name="precio_producto" id="input_precio" class="form-control" placeholder="$ 0000.00 mxn" value="">
                        </form>

                        <form action="" method="POST" class="visually-hidden" id="form_categoria">
                            <label for="nombre_categoria">Nombre de la categoria.</label>
                            <input type="text" name="nombre_categoria" id="input_categoria" class="form-control" placeholder="Categoria" value="">
                        </form>


                    </div>
                </div>
                <div class="row border-top border-1 border-light">
                <div class="col-12 text-center py-2">
                        <button class="btn btn-primary" onclick="guardar();">Guardar</button>
                    </div>

                    
                </div>
            </section>



            <section class="col border-end border-1 border-light rounded">
                <div class="row text-center pt-3" id="row_categorias_section">
                    <div class="col-12 text-center" id="col_categorias_section">
                        
                    </div>
                </div>
                <div class="row border-top border-1 border-light rounded">
                    <div class="col text-center py-2">
                        <button class="btn btn-primary" onclick="nueva_categoria();">Nueva</button>
                    </div>
                </div>
            </section>



            <section class="col" id="productos_section">
                <div class="row">
                    <div class="col pt-3 bg-light" id="col_productos_section">
                        <h3 class="display-6 fs-3" id="h3_productos">Selecciona una categoria.</h3>
                        <div class="list-group" id="list_productos_section">

                        </div>
                    </div>

                </div>
                <div class="row border-top border-1 border-light rounded">
                    <div class="col text-center pt-2">
                        <button class="btn btn-primary" onclick="nuevo_producto();">Nuevo</button>
                    </div>
                </div>
            </section>
        </div>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="app/inventario.js"></script>

</html>