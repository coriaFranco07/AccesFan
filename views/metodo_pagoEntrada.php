<?php 

$conn= mysqli_connect("localhost", "root", "", "facultad");

$idEntrada = $_GET['idEntrada'];
$equipoL = $_GET['equipoL'];
$equipoV = $_GET['equipoV'];
$lugar = $_GET['lugar'];
$fecha = $_GET['fecha'];

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
        <hr>
        <body style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center;">

            <div class="container" tyle="background-color: aliceblue;
            font-family: roboto;
            margin: auto; border-radius: 15px 10px 15px 10px;">

            <h1 style="background-color: aliceblue;
            font-family: roboto;
            margin: auto;
            text-align: center; border-radius: 15px 10px 15px 10px;">ELEGIR ENTRADA</h1>

            
            <a href="entradas.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px;  position: fixed; background-color: #1f2735;">Cancelar</a>
            
            <br><br><br><br>

            <h5><span style="text-decoration: underline;">Datos del Partido:</span></h5>

            <?php
                session_start();

                $querypa="select * from cliente where usuario = ".$_SESSION["username"];
                $resultado=mysqli_query($conn,$querypa);
                while($a=mysqli_fetch_array($resultado)){
                    ?>

                    <?php $id_cliente = $a["id_cliente"]; ?>
                    <?php $nombre = $a["nombre"]; ?>  

                    <?php
                }


            
                // Trae las cuotas no pagadas 
                $sql = "SELECT * FROM valor_entrada";
                $result = mysqli_query($conn, $sql);

                echo "<strong> $equipoL  VS  $equipoV </strong>" . "<br>";
                echo "<strong>LUGAR:</strong> " . $lugar . "<br>";
                echo "<strong>FECHA Y HORARIO:</strong> " . $fecha;

            ?>

           
           <br><br>
            

           <table id="metodo_PagoEntrada" class="table table-bordered table-striped text-center nt-4">
            
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">ID_TIPO</th>
                        <th scope="col">SECTOR</th>
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
                            <td><?php echo $mostrar['id_tipoEntrada'] ?></td>
                            <td><?php echo $mostrar['tipoEntrada'] ?></td>
                            <td>$<?php echo $mostrar['valor_entrada'] ?></td>
                            <td>
                                Transferencia:
                                <input type="radio" name="tipo_metodoPago" value="1">
                                Debito/Credito:
                                <input type="radio" name="tipo_metodoPago" value="2">
                            </td>
                            <td>
                            <a href="#" onclick="capturarDatos(event, '<?php echo $mostrar['id_tipoEntrada'] ?>', 'tipo_metodoPago', '<?php echo $id_cliente ?>', '<?php echo $idEntrada ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M15.999 8.5h2c0-2.837-2.755-4.131-5-4.429V2h-2v2.071c-2.245.298-5 1.592-5 4.429 0 2.706 2.666 4.113 5 4.43v4.97c-1.448-.251-3-1.024-3-2.4h-2c0 2.589 2.425 4.119 5 4.436V22h2v-2.07c2.245-.298 5-1.593 5-4.43s-2.755-4.131-5-4.429V6.1c1.33.239 3 .941 3 2.4zm-8 0c0-1.459 1.67-2.161 3-2.4v4.799c-1.371-.253-3-1.002-3-2.399zm8 7c0 1.459-1.67 2.161-3 2.4v-4.8c1.33.239 3 .941 3 2.4z"></path></svg></a>
                            </td>
                            
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                

            </table> 

            <div id="campoPago"></div>
            
            </div>

        </body>

        <script>


                function capturarDatos(event, id_tipoEntrada,  nombreRadio, idCliente, idEntrada) {

                    event.preventDefault();
                    
                    var idMetodoPago = document.querySelector('input[name="' + nombreRadio + '"]:checked').value;
                    var campoPago = document.getElementById("campoPago");

                

                    if (idMetodoPago == 1) {
                        
                        campoPago.innerHTML = '<label>CBU:</label><h4> <img src="qrcode_60966688_5fa8d3cce0462730d00412b6fadc3981.png" width="240"></h4><br><a href="#" onclick="insertarDatos(\'' + id_tipoEntrada + '\', \'' + idEntrada + '\', \'' + idCliente + '\', \'' + idMetodoPago + '\');" class="btn btn-primary">Listo</a>';

                    } else if (idMetodoPago == 2) {
                        
                        campoPago.innerHTML = '<label>Introducir número de tarjeta:</label><input type="text" name="numero"><a href="#" onclick="insertarDatos(\'' + id_tipoEntrada + '\', \'' + idEntrada + '\', \'' + idCliente + '\', \'' + idMetodoPago + '\');" class="btn btn-primary">Listo</a>';

                    } else {
                        campoPago.innerHTML = ''; // Si no se selecciona ninguna opción, se vacía el contenido
                    } 

                    //window.location.href = 'mostrarMensajeCuota.php?idCuota=' + idCuota + '&idMetodoPago=' + idMetodoPago + '&idCliente=' + idCliente + '&fechaCuota=' + fecha;
                    //alert("ID tipoEntrada: " + id_tipoEntrada + ", ID Entrada: " + idEntrada + " , ID Cliente: " + idCliente + ", ID Método de Pago: " + idMetodoPago + ");
                    //alert( "ID tipoEntrada: " + id_tipoEntrada + ", ID entrada: " + idEntrada + ", ID cliente: " + idCliente + ", ID pago: " +  idMetodoPago );

                }


                function insertarDatos(id_tipoEntrada, idEntrada, idCliente, idMetodoPago) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
            } else {
                console.error("Error en la solicitud AJAX. Estado: " + this.status);
            }
        }
    };
    xhttp.open("POST", "insertar_detalleEntrada.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
        "id_tipoEntrada=" + id_tipoEntrada +
        "&idEntrada=" + idEntrada +
        "&idCliente=" + idCliente +
        "&idMetodoPago=" + idMetodoPago
    );

    window.location.href = '../mensajes/mostrarMensajeEntrada.php?';
}
                
        </script>

</html>