<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja</title>

    <link rel="stylesheet" href="estilos/style.css">
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
                <button class="btn btn-primary" onclick="goto_inventario();">Inventario</button>
                <button class="btn btn-primary" onclick="salir();">Salir</button>
            </div>
        </div>
    </nav>










    <main class="bg-dark">
        <div class="row">
            <section class="col" id="orden_section">
                <div class="row ps-2" id="row_orden">
                    <div class="col bg-light px-4 pt-2" id="col_lista_orden">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col text-end">Precio</th>
                                </tr>
                            </thead>
                            <tbody id="body_table">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row border-top border-1 border-dark">
                    <div class="col text-center mt-4">
                        <p class="display-6 fs-5 text-light text-end" id="p_total">Total: 0000.00</p>
                        <button class="btn btn-lg btn-primary text-center disabled" id="pagar_btn" onclick="pagar();">Pagar</button>
                    </div>
                </div>
            </section>
            <section class="col pe-5 text-center" id="opciones_section">
                <div class="row">
                    <div class="col-12 text-center" id="col_opciones_btn">
                        <ul class="lista-group">
                            <li class="list-group-item border-0 bg-dark"><button class="btn btn-primary rounded text-center disabled" onclick="add_prod()" id="btn_add">Agregar</button></li>
                            <li class="list-group-item border-0 bg-dark"><button class="btn btn-primary rounded text-center disabled" onclick="sub_prod()" id="btn_sub">Restar</button></li>
                            <li class="list-group-item border-0 bg-dark"><button class="btn btn-primary rounded text-center mt-5 disabled" onclick="borrar_producto()" id="btn_borrar">Borrar</button></li>
                        </ul>
                    </div>
                    <div class="col-12 text-center">
                        <ul class="lista-group">
                            <li class="list-group-item border-0 bg-dark"><button class="btn btn-primary disabled" onclick="cancelar_cuenta()" id="btn_cancelar">Cancelar</button></li>
                        </ul>
                    </div>
                </div>


            </section>
            <section class="col bg-dark text-center border-start border-end border-1 border-light" id="categorias_section">

                <ul class="list-group" id="lista_categorias">


                </ul>

            </section>
            <section class="col" id="productos_section">
                <div class="row text-center" id="row_productos">

                </div>
            </section>
        </div>
    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="app/caja_inicio.js"></script>

</html>