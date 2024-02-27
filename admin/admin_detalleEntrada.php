<?php

    $conn = mysqli_connect("localhost", "root", "", "facultad");

    if (isset($_GET['fechaInicio']) && isset($_GET['fechaFin'])) {
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFin = $_GET['fechaFin'];

        $sql = "SELECT detalle_entrada1.id_detalleEntrada, detalle_entrada1.id_entrada, cliente.nombre, equipo_local.tipo_equipoLocal, equipo_viistante.tipo_equipoVisitante, detalle_entrada1.fecha_entrada, valor_entrada.tipoEntrada, metodo_pago.tipo_metodoPago, estado.tipo_estado 
        FROM detalle_entrada1 
        INNER JOIN estado ON detalle_entrada1.id_estado = estado.id_estado 
        INNER JOIN cliente ON detalle_entrada1.id_cliente = cliente.id_cliente 
        INNER JOIN metodo_pago ON detalle_entrada1.id_metodoPago = metodo_pago.id_metodoPago 
        INNER JOIN valor_entrada ON detalle_entrada1.id_tipoEntrada = valor_entrada.id_tipoEntrada 
        INNER JOIN entrada ON detalle_entrada1.id_entrada = entrada.id_entrada
        INNER JOIN equipo_local ON entrada.id_equipoLocal = equipo_local.id_equipoLocal
        INNER JOIN equipo_viistante ON entrada.id_equipoVisitante = equipo_viistante.id_equipoVisitante
        WHERE detalle_entrada1.fecha_entrada BETWEEN '$fechaInicio' AND '$fechaFin'";
        
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT detalle_entrada1.id_detalleEntrada, cliente.nombre,  equipo_local.tipo_equipoLocal, equipo_viistante.tipo_equipoVisitante, detalle_entrada1.fecha_entrada, valor_entrada.tipoEntrada, metodo_pago.tipo_metodoPago, estado.tipo_estado
        FROM detalle_entrada1
        INNER JOIN estado ON detalle_entrada1.id_estado = estado.id_estado
        INNER JOIN cliente ON detalle_entrada1.id_cliente = cliente.id_cliente
        INNER JOIN metodo_pago ON detalle_entrada1.id_metodoPago = metodo_pago.id_metodoPago
        INNER JOIN valor_entrada ON detalle_entrada1.id_tipoEntrada = valor_entrada.id_tipoEntrada
        INNER JOIN entrada ON detalle_entrada1.id_entrada = entrada.id_entrada
        INNER JOIN equipo_local ON entrada.id_equipoLocal = equipo_local.id_equipoLocal
        INNER JOIN equipo_viistante ON entrada.id_equipoVisitante = equipo_viistante.id_equipoVisitante";
        
        $result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body style="background-color: aliceblue; font-family: roboto; margin: auto; text-align: center;">
    <div class="container" style="background-color: aliceblue; font-family: roboto; margin: auto; border-radius: 15px 10px 15px 10px;">
        <h1 style="background-color: aliceblue; font-family: roboto; margin: auto; text-align: center; border-radius: 15px 10px 15px 10px;">HISTORIAL ENTRADAS</h1>
        <a href="entradasAdmin.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color: #1f2735;">Cancelar</a>
        <br><br><br><br>

        <?php
            session_start();
            $querypa = "SELECT * FROM cliente WHERE usuario = " . $_SESSION["username"];
            $resultado = mysqli_query($conn, $querypa);
            while ($a = mysqli_fetch_array($resultado)) {
                $id_cliente = $a["id_cliente"];
                $nombre = $a["nombre"];
            }
        ?>

        <p>USUARIO: <strong><?php echo $nombre; ?></strong></p><br>

        <p><strong>Buscar entre fechas:</strong></p>

        <form action="" method="GET">
        <label for="fechaInicio">Fecha inicio:</label>
        <input type="date" name="fechaInicio">
        <label for="fechaFin">Fecha fin:</label>
        <input type="date" name="fechaFin">
        <input type="submit" value="Buscar">
        <a href="admin_detalleEntrada.php" class="btn btn-outline-primary">Refrescar</a> 
        </form>

        <br>

       

        <table id="historialEntrada" class="table table-bordered table-striped text-center nt-4">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">ID_DETALLE</th>
                    <th scope="col">USUARIO</th>
                    <th scope="col">EQUIPO LOCAL</th>
                    <th scope="col">VS</th>
                    <th scope="col">EQUIPO VISITANTE</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">SECTOR</th>
                    <th scope="col">METODO PAGO</th>
                    <th scope="col">ESTADO</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td>
                        <?php echo $mostrar['id_detalleEntrada'] ?></td>
                        <td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['tipo_equipoLocal'] ?></td>
                        <td>VS</td>
                        <td><?php echo $mostrar['tipo_equipoVisitante'] ?></td>
                        <td><?php echo $mostrar['fecha_entrada'] ?></td>
                        <td><?php echo $mostrar['tipoEntrada'] ?></td>
                        <td><?php echo $mostrar['tipo_metodoPago'] ?></td>
                        <td><?php echo $mostrar['tipo_estado'] ?></td>
                </tr>
                <?php
                    }
                ?> 
            </tbody>
        </table>

        <form action="" method="POST">
    <input type="submit" name="btnMasVendidos" value="Mostrar Más Vendidos">
</form>

        <?php

            if(isset($_POST['btnMasVendidos'])) {
                // Consulta para obtener los ID de entrada más vendidos
                $sqlMasVendidos = "SELECT detalle_entrada1.id_entrada, equipo_local.tipo_equipoLocal, equipo_viistante.tipo_equipoVisitante, COUNT(*) AS cantidad
                FROM detalle_entrada1
                INNER JOIN entrada ON detalle_entrada1.id_entrada = entrada.id_entrada
                INNER JOIN equipo_local ON entrada.id_equipoLocal = equipo_local.id_equipoLocal
                INNER JOIN equipo_viistante ON entrada.id_equipoVisitante = equipo_viistante.id_equipoVisitante
                GROUP BY detalle_entrada1.id_entrada, equipo_local.tipo_equipoLocal, equipo_viistante.tipo_equipoVisitante
                ORDER BY COUNT(*) DESC
                LIMIT 10;";

                $resultMasVendidos = mysqli_query($conn, $sqlMasVendidos);

                // Muestra los ID de entrada más vendidos
                if(mysqli_num_rows($resultMasVendidos) > 0) {
                    echo "<h2>Partidos más vendidos:</h2>";
                    echo "<ul>";
                    while($rowMasVendidos = mysqli_fetch_assoc($resultMasVendidos)) {
                        echo "<li>" . $rowMasVendidos['tipo_equipoLocal'] . ' VS ' . $rowMasVendidos['tipo_equipoVisitante']  . " (Cantidad vendida: " . $rowMasVendidos['cantidad'] . ")</li>";
                    }
                    echo "</ul>";
                }else {
                    echo "<h2>No hay ID de entrada más vendidos.</h2>";
                }
            }
        ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    

    <script>
        $(document).ready( function() {
            $('#historialEntrada').DataTable();
        });
    </script>

    
</body>
</html>
