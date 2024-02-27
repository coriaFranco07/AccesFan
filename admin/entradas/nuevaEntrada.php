<?php
// Establecer la conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "facultad");

$sql = "SELECT * FROM equipo_local";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM equipo_viistante";
$result2 = mysqli_query($conn, $sql2);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        h2, h3 {
            margin-bottom: 10px;
        }

        input[type="datetime-local"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
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
        
        <form action="nuevaEntrada2.php" method="POST" align="center">
            <h2>Nueva Entrada</h2>
            <input type="datetime-local" name="fecha" required><br>
            <input type="text" name="lugar" placeholder="Lugar" required><br>
            <h3>Equipo Local</h3>
            <select name="local" id="local">
                <?php
                    // Mostrar opciones del menú desplegable
                    while ($fila = mysqli_fetch_array($result)) {
                        echo "<option value='" . $fila['id_equipoLocal'] . "'>" . $fila['tipo_equipoLocal'] . "</option>";
                    }
                    ?>
            </select>
            <h3>Equipo Visitante</h3>
            <select name="visitante" id="visitante">
                <?php
                    // Mostrar opciones del menú desplegable
                    while ($fila = mysqli_fetch_array($result2)) {
                        echo "<option value='" . $fila['id_equipoVisitante'] . "'>" . $fila['tipo_equipoVisitante'] . "</option>";
                    }
                    ?>
            </select>
            <h3>Entrada</h3>
            <input type="radio" name="pagar" value="2" required>
            <label for="pagar">No Pagado</label><br><br>
            <input type="submit" value="Modificar" class="btn btn-primary btn-block"><hr>
            <a href="../entradasAdmin.php" class="btn btn-outline-light btn-lg btn-block mb-4" style="background-color: #1f2735; border-radius: 15px;">Volver</a>
        </form>
    </div>
</body>
</html>