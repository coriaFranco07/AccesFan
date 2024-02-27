<?php
$conn = mysqli_connect("localhost", "root", "", "facultad");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUOTAS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
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
       
        #cuotas {
            margin-top: 50px;
        }

        .btn-volver {
            background-color: #1f2735;
            color: #fff;
            right: 140px;
            width: 150px;
            background-color: #1f2735;
           
        }

        .btn-volverr {
            background-color: #1f2735;
            color: #fff;
            right: 140px;
            width: 180px;
            background-color: #1f2735;
            margin-right: 170px;
        }


        #campoPago {
            margin-top: 50px;
        }
    </style>
</head>
<hr>
<body>
    <div class="container">
        <h1>CUOTAS</h1>

        <a href="historialCuota.php" class="btn btn-outline-light btn-lg px-5 btn-volver" style="width: 200px; border-radius: 15px;">Historial Cuotas</a>

        <a href="principal.php" class="btn btn-outline-light btn-lg px-5 btn-volverr" style=" position: fixed; border-radius: 15px;">Cancelar</a>

        <br><br><br><br>

        <?php
        session_start();

        $querypa = "select * from cliente where usuario = " . $_SESSION["username"];
        $resultado = mysqli_query($conn, $querypa);
        while ($a = mysqli_fetch_array($resultado)) {
            $id_cliente = $a["id_cliente"];
            $nombre = $a["nombre"];
        }

        // Trae las cuotas no pagadas 
        $sql = "SELECT c.id_cuota, fecha, valor FROM cuota c LEFT JOIN detalle_cuota dc ON c.id_cuota = dc.id_cuota AND dc.id_cliente = $id_cliente WHERE dc.id_cuota IS NULL";
        $result = mysqli_query($conn, $sql);
        ?>

        <table id="cuotas" class="table table-bordered table-striped text-center">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">ID_CUOTA</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">METODO PAGO</th>
                    <th scope="col">ACCION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $mostrar['id_cuota'] ?></td>
                        <td><?php echo $mostrar['fecha'] ?></td>
                        <td>$<?php echo $mostrar['valor'] ?></td>
                        <td>
                            Transferencia:
                            <input type="radio" name="tipo_metodoPago" value="1">
                            Debito/Credito:
                            <input type="radio" name="tipo_metodoPago" value="2">
                        </td>
                        <td>
                            <a href="#" onclick="capturarDatos(event, '<?php echo $mostrar['id_cuota'] ?>', 'tipo_metodoPago', '<?php echo $id_cliente ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M15.999 8.5h2c0-2.837-2.755-4.131-5-4.429V2h-2v2.071c-2.245.298-5 1.592-5 4.429 0 2.706 2.666 4.113 5 4.43v4.97c-1.448-.251-3-1.024-3-2.4h-2c0 2.589 2.425 4.119 5 4.436V22h2v-2.07c2.245-.298 5-1.593 5-4.43s-2.755-4.131-5-4.429V6.1c1.33.239 3 .941 3 2.4zm-8 0c0-1.459 1.67-2.161 3-2.4v4.799c-1.371-.253-3-1.002-3-2.399zm8 7c0 1.459-1.67 2.161-3 2.4v-4.8c1.33.239 3 .941 3 2.4z"></path></svg></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div id="campoPago"></div>
    </div>

    <script>
        function capturarDatos(event, idCuota, nombreRadio, idCliente) {
            event.preventDefault();

            var idMetodoPago = document.querySelector('input[name="' + nombreRadio + '"]:checked').value;
            var campoPago = document.getElementById("campoPago");

            if (idMetodoPago == 1) {
                campoPago.innerHTML = '<label>CBU:</label><h4> <img src="qrcode_60966688_5fa8d3cce0462730d00412b6fadc3981.png" width="240"></h4><br><a href="#" onclick="insertarDatos(\'' + idCuota + '\', \'' + idMetodoPago + '\', \'' + idCliente + '\' );" class="btn btn-primary">Listo</a>';
            } else if (idMetodoPago == 2) {
                campoPago.innerHTML = '<label>Introducir número de tarjeta:</label><input type="text" name="numero"><a href="#" onclick="insertarDatos(\'' + idCuota + '\', \'' + idMetodoPago + '\', \'' + idCliente + '\');" class="btn btn-primary">Listo</a>';
            } else {
                campoPago.innerHTML = '';
            }
        }

        function insertarDatos(idCuota, idMetodoPago, idCliente) {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(this.responseText);
                }
            };

            xhttp.open("POST", "insertar_detalleCuota.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("idCuota=" + idCuota + "&idMetodoPago=" + idMetodoPago + "&idCliente=" + idCliente);

            window.location.href = '../mensajes/mostrarMensajeCuota.php?';
        }
    </script>
</body>

</html>
