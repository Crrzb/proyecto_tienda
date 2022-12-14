<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
</head>

<body>
    <nav class="border-bottom border-1 border-dark">
        <div class="row">
            <div class="col text-center">
                <p class="display-6 ">Tienda</p>
            </div>
        </div>
    </nav>


    <main class="bg-dark" style="height: 90vh;">
        <div class="container">
            <div class="row " style="padding-top: 15%;">
                <div class="col text-center bg-light mt-5 rounded" style="max-width: 600px; margin-left:25%;">
                <input type="password" name="clave" placeholder="Clave" class="display-6 fs-4 mt-5" id="input_clave" onkeypress="validar()" onkeyup="validar()">
                        <p></p>
                        <input type="submit" value="Log in" class="btn btn-primary mb-5" style="min-width: 200px;" onclick="login();">
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="app/index.js"></script>

</html>