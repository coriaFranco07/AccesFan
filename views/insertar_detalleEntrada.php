<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
    <?php

    $conn= mysqli_connect("localhost", "root", "", "facultad");

    // Obtener los parámetros de la petición AJAX
    $idTipoEntrada = $_POST['id_tipoEntrada'];
    $idEntrada = $_POST['idEntrada'];
    $idMetodoPago = $_POST['idMetodoPago'];
    $idCliente = $_POST['idCliente'];

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fechaHoraActual = date('Y-m-d H:i:s');


    // Realizar la inserción en la tabla utilizando los parámetros y la fecha y hora actual
    $idEstado = 1;


        
        // Realizar la inserción en la tabla 
        $sql = "INSERT INTO detalle_entrada1 (id_cliente, id_entrada, fecha_entrada, id_tipoEntrada, id_metodoPago, id_estado) VALUES ('$idCliente', '$idEntrada', '$fechaHoraActual', '$idTipoEntrada', '$idMetodoPago', '$idEstado')";
        if ($conn->query($sql) === TRUE) {
            echo "Inserción exitosa";
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }


    ?>
    </body>
</html>




