<?php
$con = mysqli_connect("localhost", "root", "", "facultad");
$id = $_GET["id"];

$sql = "SELECT * FROM cliente WHERE id_cliente = " . $id;
$res = mysqli_query($con, $sql);

$sql2 = "SELECT * FROM sexo";
$result2 = mysqli_query($con, $sql2);

$sql3 = "SELECT * FROM localidad";
$result3 = mysqli_query($con, $sql3);

$sql4 = "SELECT * FROM roles";
$result4 = mysqli_query($con, $sql4);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>
        body {
            background-color: #104A42;
            padding-top: 40px;
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 30px;
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
        
        <form action="editarUsuario2.php" method="post">
            <h2>Modificar Datos</h2>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <?php while ($a = mysqli_fetch_array($res)) { ?>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $a["nombre"] ?>" placeholder="Nombre" required><br>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" value="<?php echo $a["apellido"] ?>" placeholder="Apellido" required><br>
                <label for="edad">Edad</label>
                <input type="number" name="edad" value="<?php echo $a["edad"] ?>" placeholder="Edad" required><br>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" value="<?php echo $a["usuario"] ?>" placeholder="Usuario" required><br>
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" value="<?php echo $a["contraseña"] ?>" placeholder="Contraseña" required><br>
                <label for="correo">Correo</label>
                <input type="text" name="correo" value="<?php echo $a["correo"] ?>" placeholder="Correo" required><br>
                
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
                
                <input type="submit" value="Modificar" class="btn btn-primary"><hr>
                <a href="../usuariosAdmin.php" class="btn btn-outline-dark btn-lg mb-4">Volver</a>
            <?php } ?>
        </form>
    </div>
</body>
</html>