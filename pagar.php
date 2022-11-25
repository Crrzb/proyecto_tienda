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
                <button class="btn btn-primary " id="salir_btn" onclick="cancelar_pago()">Cancelar</button>
            </div>
        </div>
    </nav>


    <main class="container-fluid bg-dark" style="height: 87vh ;">
        <div class="row " >
            <div class="col-12 text-end border bg-light rounded p-5" style="max-width: 550px; margin-left: 30%; margin-top: 5%;">

                
                <p class="display-5" id="p_total">Total: <?php echo $_GET['total']?></p>
                <p class="display-5" id="cambio">Cambio: 0000.00</p>
                <label for="cobro" class=" display-5 me-2">Cobro </label>
                <input type="text" name="cobro" id="input_cobro" style="font-size: 25px;">
                <p></p>
                <button class="btn btn-lg btn-success btn-block mb-2 mt-4 disabled" style="min-width: 100%;" onclick="cobrar();" id="cobrar_btn">Cobrar</button>
                
            </div>
        </div>

        
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="app/pagar.js"></script>
</html>