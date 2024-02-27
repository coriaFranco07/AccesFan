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
    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
</head>

<body style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center;">

    <div class="container" style="background-color: aliceblue;
            font-family: roboto;
            margin: auto; border-radius: 15px 10px 15px 10px;">

        <h1 style="background-color: aliceblue;
            font-family: roboto;
            margin: auto;
            text-align: center; border-radius: 15px 10px 15px 10px;">ENTRADAS ADMIN</h1>

        <hr>

        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>

        <a href="./entradas/nuevaEntrada.php" style="right: 1200px; width: 210px; position: fixed;" class="btn btn-outline-primary mt-4">Agregar Entrada<i class="fa-solid fa-square-plus"></i></a>
        <a style="right: 950px; width: 210px; position: fixed;" href="admin_detalleEntrada.php" class="btn btn-outline-primary mt-4">Entradas de Usuarios<i class="fa-solid fa-square-plus"></i></a>
        <a style="right: 700px; width: 210px; position: fixed;" href="equipos.php" class="btn btn-outline-primary mt-4">Equipos<i class="fa-solid fa-square-plus"></i></a>
        <a href="../views/modoAdmin.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color: #1f2735;">Volver</a>
        <br><br><br><br>

        <?php
        session_start();

        $querypa = "select * from cliente where usuario = " . $_SESSION["username"];
        $resultado = mysqli_query($conn, $querypa);
        while ($a = mysqli_fetch_array($resultado)) {
            $id_cliente = $a["id_cliente"];
            $nombre = $a["nombre"];
        }

        // Trae las entradas existentes
        $sql = "SELECT lugar, tipo_estado, id_entrada, fecha_entrada, equipo_local.tipo_equipoLocal, equipo_viistante.tipo_equipoVisitante FROM equipo_local INNER JOIN entrada ON equipo_local.id_equipoLocal = entrada.id_equipoLocal INNER JOIN equipo_viistante ON entrada.id_equipoVisitante = equipo_viistante.id_equipoVisitante INNER JOIN estado ON entrada.id_estado = estado.id_estado";
        $result = mysqli_query($conn, $sql);
        ?>

        <table id="entradas" class="table table-bordered table-striped text-center nt-4">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">ID_ENTRADA</th>
                    <th scope="col">LOCAL</th>
                    <th scope="col">VS</th>
                    <th scope="col">VISITANTE</th>
                    <th scope="col">LUGAR</th>
                    <th scope="col">HORA</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $mostrar['id_entrada'] ?></td>
                        <td><?php echo $mostrar['tipo_equipoLocal'] ?></td>
                        <td>VS</td>
                        <td><?php echo $mostrar['tipo_equipoVisitante'] ?></td>
                        <td><?php echo $mostrar['lugar'] ?></td>
                        <td><?php echo $mostrar['fecha_entrada'] ?></td>
                        <td><?php echo $mostrar['tipo_estado'] ?></td>
                        <td>
                            <a href="./entradas/editarEntrada.php?id=<?= $mostrar['id_entrada']; ?>" class="btn btn-outline-info">Editar<i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="./entradas/eliminarEntrada.php?id=<?= $mostrar['id_entrada']; ?>" class="btn btn-outline-danger">Estado<i class="fa-solid fa-trash"></i></a> 
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>
