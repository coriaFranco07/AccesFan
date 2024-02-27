<?php
$conn = mysqli_connect("localhost", "root", "", "facultad");

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>
<br><br>
<body style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center;">


    <a href="principal.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color: #1f2735;">Volver</a>

    <h3 style="text-align: center;">MIS DATOS</h3>
    <br>
    <?php

    session_start();

    $querypa = "select * from cliente where usuario = " . $_SESSION["username"];
    $resultado = mysqli_query($conn, $querypa);
    while ($a = mysqli_fetch_array($resultado)) {
    ?>

        <?php $id_cliente = $a["id_cliente"]; ?>
        <?php $nombre = $a["nombre"]; ?>

    <?php
    }

    $sql = "SELECT cliente.usuario, cliente.contraseña , cliente.nombre,  cliente.apellido, cliente.edad, cliente.correo, sexo.tipo_sexo, localidad.tipo_codPostal FROM cliente INNER JOIN sexo ON cliente.id_sexo = sexo.id_sexo INNER JOIN localidad ON cliente.id_codPostal = localidad.id_codPostal WHERE cliente.id_cliente = $id_cliente";

    $result = mysqli_query($conn, $sql);

    ?>

    <table id="misDatos" class="table table-bordered table-striped text-center nt-4" style="border-radius: 10px; overflow: hidden; table-layout: fixed; margin: 0 auto; max-width: 600px;">
    
    <tbody>
        <?php
        while ($mostrar = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td style="background-color:powderblue; width: 30%;">USUARIO:</td>
                <td style="width: 70%;"><?php echo $mostrar['usuario'] ?></td>
            </tr>
            <tr>
                <td style="background-color:powderblue; width: 30%;">CONTRASEÑA:</td>
                <td style="width: 70%;"><?php echo $mostrar['contraseña'] ?></td>
            </tr>
            <tr>
                <td style="background-color:powderblue; width: 30%;">NOMBRE:</td>
                <td style="width: 70%;"><?php echo $mostrar['nombre'] ?></td>
            </tr>
            <tr>
                <td style="background-color:powderblue; width: 30%;">APELLIDO:</td>
                <td style="width: 70%;"><?php echo $mostrar['apellido'] ?></td>
            </tr>
            <tr>
                <td style="background-color:powderblue; width: 30%;">EDAD:</td>
                <td style="width: 70%;"><?php echo $mostrar['edad'] ?></td>
            </tr>
            <tr>
                <td style="background-color:powderblue; width: 30%;">CORREO:</td>
                <td style="width: 70%;"><?php echo $mostrar['correo'] ?></td>
            </tr>
            <tr>
                <td style="background-color:powderblue; width: 30%;">SEXO:</td>
                <td style="width: 70%;"><?php echo $mostrar['tipo_sexo'] ?></td>
            </tr>
            <tr>
                <td style="background-color:powderblue; width: 30%;">LOCALIDAD:</td>
                <td style="width: 70%;"><?php echo $mostrar['tipo_codPostal'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>



</body>

</html>
