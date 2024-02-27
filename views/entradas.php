<?php
$conn = mysqli_connect("localhost", "root", "", "facultad");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <style>
        body {
            background-color: aliceblue;
            font-family: "Roboto", sans-serif;
            text-align: center;
           
        }
        .container {
            background-color: aliceblue;
            margin: auto;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            
        }
        h1 {
            background-color: aliceblue;
            border-radius: 15px 10px 15px 10px;
            padding: 10px;
        }
        .btn-historial {
            background-color: #1f2735;
            color: #fff;
            width: 200px;
        }
        .btn-cancelar {
            background-color: #1f2735;
            color: #fff;
            width: 180px;
            position: fixed;
            right: 140px;
            margin-right: 170px;
        }
        #entradas {
            margin-top: 50px;
        }
    </style>
</head>
<hr>
<body >
    <div class="container" >
        <h1>ENTRADAS</h1>
        <a href="historialEntrada.php" class="btn btn-outline-light btn-lg px-5 btn-historial" style="border-radius: 15px;">Historial Entradas</a>
        <a href="principal.php" class="btn btn-outline-light btn-lg px-5 btn-cancelar">Cancelar</a>

        <?php
        session_start();
        $querypa = "SELECT * FROM cliente WHERE usuario = " . $_SESSION["username"];
        $resultado = mysqli_query($conn, $querypa);
        while ($a = mysqli_fetch_array($resultado)) {
            $id_cliente = $a["id_cliente"];
            $nombre = $a["nombre"];
        }

        // Trae las cuotas no pagadas 
        $sql = "SELECT c.id_cuota, fecha, valor FROM cuota c LEFT JOIN detalle_cuota dc ON c.id_cuota = dc.id_cuota AND dc.id_cliente = $id_cliente WHERE dc.id_cuota IS NULL";
        $result = mysqli_query($conn, $sql);
        ?>

        <table id="entradas" class="table table-bordered table-striped text-center" >
            <thead >
                <tr class="bg-primary text-white">
                    <th scope="col">ID_ENTRADA</th>
                    <th scope="col">LOCAL</th>
                    <th scope="col">VS</th>
                    <th scope="col">VISITANTE</th>
                    <th scope="col">LUGAR</th>
                    <th scope="col">HORA</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">ACCION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT e.id_entrada, e.fecha_entrada, e.lugar, el.tipo_equipoLocal, ev.tipo_equipoVisitante, es.tipo_estado
                FROM entrada e
                JOIN equipo_local el ON e.id_equipoLocal = el.id_equipoLocal
                JOIN equipo_viistante ev ON e.id_equipoVisitante = ev.id_equipoVisitante
                JOIN estado es ON e.id_estado = es.id_estado
                LEFT JOIN detalle_entrada1 de ON de.id_entrada = e.id_entrada AND de.id_cliente = $id_cliente
                WHERE de.id_entrada IS NULL";
                $result = mysqli_query($conn, $sql);
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
                            <a href="#" onclick="capturarDatos(event, '<?php echo $mostrar['id_entrada'] ?>', '<?php echo $mostrar['tipo_equipoLocal']?>', '<?php echo $mostrar['tipo_equipoVisitante']?>', '<?php echo $mostrar['lugar'] ?>', '<?php echo $mostrar['fecha_entrada']?>')"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M15.999 8.5h2c0-2.837-2.755-4.131-5-4.429V2h-2v2.071c-2.245.298-5 1.592-5 4.429 0 2.706 2.666 4.113 5 4.43v4.97c-1.448-.251-3-1.024-3-2.4h-2c0 2.589 2.425 4.119 5 4.436V22h2v-2.07c2.245-.298 5-1.593 5-4.43s-2.755-4.131-5-4.429V6.1c1.33.239 3 .941 3 2.4zm-8 0c0-1.459 1.67-2.161 3-2.4v4.799c-1.371-.253-3-1.002-3-2.399zm8 7c0 1.459-1.67 2.161-3 2.4v-4.8c1.33.239 3 .941 3 2.4z"></path></svg></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function capturarDatos(event, idEntrada, equipoL, equipoV, lugar, fecha) {
            event.preventDefault();
            window.location.href = 'metodo_pagoEntrada.php?idEntrada=' + idEntrada + '&equipoL=' + equipoL + '&equipoV=' + equipoV + '&lugar=' + lugar + '&fecha=' + fecha;
        }
    </script>
</body>
</html>
