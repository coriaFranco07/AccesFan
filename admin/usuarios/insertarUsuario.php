<?php
$con = mysqli_connect("localhost", "root", "", "facultad");

$sql2 = "SELECT * FROM sexo";
$result2 = mysqli_query($con, $sql2);

$sql3 = "SELECT * FROM localidad";
$result3 = mysqli_query($con, $sql3);

$sql4 = "SELECT * FROM roles";
$result4 = mysqli_query($con, $sql4);

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
            background-color:#104A42;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h6 {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
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
        
        <form action="insertarUsuario2 (1).php" method="POST" align="center">
            <h2>Registro de Usuario</h2> 
            <input type="text" name="nombre" placeholder="Nombre" required><br>
            <input type="text" name="apellido" placeholder="Apellido" required><br>
            <input type="number" name="edad" placeholder="Edad" required><br>
            <input type="text" name="usuario" placeholder="Usuario" required><br>
            <input type="password" name="contraseña" placeholder="Contraseña" required><br>
            <input type="text" name="correo" placeholder="Correo" required><br>
            <label for="sexo">Selecciona un sexo:</label>
                <select name="sexo" id="sexo">
                    <?php
                        // Mostrar opciones del menú desplegable
                        while ($fila = mysqli_fetch_array($result2)) {
                            echo "<option value='" . $fila['id_sexo'] . "'>" . $fila['tipo_sexo'] . "</option>";
                        }
                    ?>
                </select>

                <br><br>

                <label for="codPostal">Selecciona tu localidad:</label>
                <select name="codPostal" id="codPostal">
                    <?php
                        // Mostrar opciones del menú desplegable
                        while ($fila = mysqli_fetch_array($result3)) {
                            echo "<option value='" . $fila['id_codPostal'] . "'>" . $fila['tipo_codPostal'] . "</option>";
                        }
                    ?>
                </select>

                <br><br>

                <label for="rol">Selecciona el Rol:</label>
                <select name="rol" id="rol">
                    <?php
                        // Mostrar opciones del menú desplegable
                        while ($fila = mysqli_fetch_array($result4)) {
                            echo "<option value='" . $fila['id_rol'] . "'>" . $fila['tipo'] . "</option>";
                        }
                    ?>
                </select>

            <input type="submit" value="Registrarse" class="btn btn-primary btn-block"><hr>
            <a href="../usuariosAdmin.php" class="btn btn-outline-light btn-lg btn-block mb-4" style="background-color: #1f2735; border-radius: 15px;">Volver</a>
        </form>
    </div>
</body>
</html>