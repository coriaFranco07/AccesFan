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
        text-align: center; border-radius: 15px 10px 15px 10px;">HISTORIAL ENTRADAS</h1>


        <a href="entradas.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color: #1f2735;">Cancelar</a>

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

            $sql= "SELECT detalle_entrada1.id_detalleEntrada, detalle_entrada1.id_cliente,  equipo_local.tipo_equipoLocal, equipo_viistante.tipo_equipoVisitante, detalle_entrada1.fecha_entrada, valor_entrada.tipoEntrada, metodo_pago.tipo_metodoPago, estado.tipo_estado
      
            FROM detalle_entrada1
            INNER JOIN estado ON detalle_entrada1.id_estado = estado.id_estado
            INNER JOIN cliente ON detalle_entrada1.id_cliente = cliente.id_cliente
            INNER JOIN metodo_pago ON detalle_entrada1.id_metodoPago = metodo_pago.id_metodoPago
            INNER JOIN valor_entrada ON detalle_entrada1.id_tipoEntrada = valor_entrada.id_tipoEntrada
            INNER JOIN entrada ON detalle_entrada1.id_entrada = entrada.id_entrada
            INNER JOIN equipo_local ON entrada.id_equipoLocal = equipo_local.id_equipoLocal
            INNER JOIN equipo_viistante ON entrada.id_equipoVisitante = equipo_viistante.id_equipoVisitante
            WHERE cliente.id_cliente = $id_cliente;";
            $result = mysqli_query($conn, $sql);
        
        ?>

        

        <table id="historialCuota" class="table table-bordered table-striped text-center nt-4">
        <p>USUARIO:<strong> <?php echo $nombre; ?></strong></p>
        
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">ID_DETALLE</th>
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
                        <td><?php echo $mostrar['id_detalleEntrada'] ?></td>
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

        
        </div>
        
    </body>

    
</html>