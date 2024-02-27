<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Cuota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>
        body {
            background-color: #104A42;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #1f2735;
            color: #fff;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <hr>
    <div class="container">
        <hr>
        
        <form align="center" action="insertarCuota2.php" method="post">
            <h2>Registrar Nueva Cuota</h2>
            <input type="text" name="fecha" placeholder="Introduzca fecha" required>
            <br><br>
            <input type="number" name="valor" placeholder="Introduzca valor" required>
            <br><br>
            <input type="submit" value="Registrar" class="btn btn-primary btn-block"><hr>
            <a href="../cuotasAdmin.php" class="btn btn-outline-light btn-lg btn-block mb-4" style="background-color: #1f2735; border-radius: 15px;">Volver</a>
        </form>
    </div>
</body>
</html>