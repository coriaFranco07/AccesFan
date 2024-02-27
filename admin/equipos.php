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
            <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
            <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

        </head>
        <br>
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
            text-align: center; border-radius: 15px 10px 15px 10px;">EQUIPOS ADMIN</h1>

            
            
            <a style="top: 10px; right: 5%; width: 150px; " href="./equipos/insertarEquipo.php" class="btn btn-outline-primary mt-4">Agregar Equipo<i class="fa-solid fa-square-plus"></i></a> 
            <a style="top: 10px; right: 5%; width: 150px;  background-color: #1f2735;" href="./entradasAdmin.php" class="btn btn-outline-primary mt-4">Volver</a>
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


            
                // Trae las cuotas no pagadas 
                $sql = "SELECT * FROM equipo_viistante ";
                $result = mysqli_query($conn, $sql);
            ?>

            
            

            <table id="equipos" class="table table-bordered table-striped text-center nt-4">
            
                <thead>
                    <tr class="bg-primary text-white">
                    <th scope="col">ID_EQUIPO</th>
                    <th scope="col">EQUIPO</th>
                    <th scope="col">CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                        <td><?php echo $mostrar['id_equipoVisitante'] ?></td>
                        <td><?php echo $mostrar['tipo_equipoVisitante'] ?></td>
                        <td>
                            <a href="./equipos/editarEquipo.php?id= <?php echo $mostrar["id_equipoVisitante"] ?>" class="btn btn-outline-info">Editar<i class="fa-solid fa-pen-to-square"></i></a>
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