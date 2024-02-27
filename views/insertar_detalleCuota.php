<?php

$conn= mysqli_connect("localhost", "root", "", "facultad");

// Obtener los parámetros de la petición AJAX
$idCuota = $_POST['idCuota'];
$idMetodoPago = $_POST['idMetodoPago'];
$idCliente = $_POST['idCliente'];


date_default_timezone_set('America/Argentina/Buenos_Aires');
echo "<h4>" . date('Y-m-d H:i:s') . "</h4>";
         

// Obtener la fecha y hora actual
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaHoraActual = date('Y-m-d H:i:s');



// Realizar la inserción en la tabla utilizando los parámetros y la fecha y hora actual
$idEstado = 1;


    $sql = "INSERT INTO detalle_cuota (id_cuota, id_cliente, fecha_cuota, id_estado, id_metodoPago) VALUES ('$idCuota', '$idCliente', '$fechaHoraActual', '$idEstado', '$idMetodoPago')";
    if ($conn->query($sql) === TRUE) {
        echo "Inserción exitosa";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }


?>



