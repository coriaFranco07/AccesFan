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
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


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

        
        <a href="cuotasAdmin.php" class="btn btn-outline-light btn-lg px-5" style="left: 200px; top: 10px; right: 5%; width: 150px; background-color: #1f2735; right: 140px;">Cancelar</a>

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
            INNER JOIN cuota ON detalle_cuota.id_cuota = cuota.id_cuota";

            $result = mysqli_query($conn, $sql);
        
        ?>

        <table id="historialCuota" class="table table-bordered table-striped text-center nt-4">
            <p>USUARIO:<strong> <?php echo $nombre; ?></strong></p>

            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">ID_DETALLE</th>
                    <th scope="col">USUARIO</th>
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
                        <td><?php echo $mostrar['nombre'] ?></td>
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
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


        <script>
            $(document).ready( function() {
                $('#historialCuota').DataTable();
            });
        </script>

    </body>

    
</html>