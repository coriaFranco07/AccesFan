<?php 

$conn= mysqli_connect("localhost", "root", "", "facultad");

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
        text-align: center; border-radius: 15px 10px 15px 10px;">HISTORIAL CUOTAS</h1>


        <a href="cuotas.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color: #1f2735;">Cancelar</a>

        <br><br><br><br>

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

            $sql= "SELECT id_detalleCuota, cuota.fecha , cliente.nombre,   detalle_cuota.fecha_cuota, estado.tipo_estado, metodo_pago.tipo_metodoPago
            FROM detalle_cuota
            INNER JOIN estado ON detalle_cuota.id_estado = estado.id_estado
            INNER JOIN cliente ON detalle_cuota.id_cliente = cliente.id_cliente
            INNER JOIN metodo_pago ON detalle_cuota.id_metodoPago = metodo_pago.id_metodoPago
            INNER JOIN cuota ON detalle_cuota.id_cuota = cuota.id_cuota
            WHERE cliente.id_cliente = $id_cliente";

            $result = mysqli_query($conn, $sql);
        
        ?>

        

        <table id="historialCuota" class="table table-bordered table-striped text-center nt-4">
        <p>USUARIO:<strong> <?php echo $nombre; ?></strong></p>
        
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">ID_DETALLE</th>
                    <th scope="col">CUOTA</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">METODO PAGO</th>
            
                </tr>
            </thead>

            <tbody>
             <?php
                 while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $mostrar['id_detalleCuota'] ?></td>
                        <td><?php echo $mostrar['fecha'] ?></td>
                        <td><?php echo $mostrar['fecha_cuota'] ?></td>
                        <td><?php echo $mostrar['tipo_estado'] ?></td>
                        <td><?php echo $mostrar['tipo_metodoPago'] ?></td>
                         
                    </tr>
                <?php
                }
                ?> 
            </tbody>
            

        </table>

        
        </div>
        
    </body>

    
</html>