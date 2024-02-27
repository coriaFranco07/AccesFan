<?php 

$conn = mysqli_connect("localhost", "root", "", "facultad");

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
<body style="background-color: aliceblue;
    font-family: roboto;
    margin: auto;
    text-align: center;">

    <div class="container" style="background-color: aliceblue;
    font-family: roboto;
    margin: auto; border-radius: 15px 10px 15px 10px;">

        <h1 style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center; border-radius: 15px 10px 15px 10px;">CUOTAS ADMIN</h1>

        <hr>
        <a style="right: 1200px; width: 210px; " href="./cuotas/insertarCuota.php" class="btn btn-outline-primary mt-4">Agregar Cuota<i class="fa-solid fa-square-plus"></i></a> 
        <a style="right: 950px; width: 210px; " href="admin_detalleCuota.php" class="btn btn-outline-primary mt-4">Cuotas de Usuarios<i class="fa-solid fa-square-plus"></i></a>
        <a href="../views/modoAdmin.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px;  background-color: #1f2735;">Volver</a>
        <br><br><br><br>

        <?php
        session_start();

        $querypa = "SELECT * FROM cliente WHERE usuario = " . $_SESSION["username"];
        $resultado = mysqli_query($conn, $querypa);
        while ($a = mysqli_fetch_array($resultado)) {
            $id_cliente = $a["id_cliente"];
            $nombre = $a["nombre"];
        }

        // Trae las cuotas no pagadas 
        $sql = "SELECT * FROM cuota";
        $result = mysqli_query($conn, $sql);
        ?>

        <table id="cuotas" class="table table-bordered table-striped text-center nt-4">
        
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">ID_CUOTA</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">CRUD</th>
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
                            <a href="./cuotas/EditarCuotaAdmin.php?id=<?= $mostrar['id_cuota']; ?>" class="btn btn-outline-info">Editar<i class="fa-solid fa-pen-to-square"></i></a>
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
