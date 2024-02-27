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

if (!empty($_POST["equipo"])) {
    $con = mysqli_connect("localhost", "root", "", "facultad");
    $id = $_POST["id"];
    $equipo = $_POST["equipo"];

    // Utilizar sentencia preparada
    $sql = "UPDATE equipo_viistante SET tipo_equipoVisitante = ? WHERE id_equipoVisitante = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "si", $equipo, $id);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        ?>
        <script>
            Swal.fire({
                title: 'EQUIPO MODIFICADO!',
                icon: 'success'
            }).then(function() {
                window.location.replace("equipos.php");
            });
        </script>
        <?php
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'ERROR AL MODIFICAR EL EQUIPO!',
            }).then(function() {
                window.location.replace("equipos.php");
            });
        </script>
        <?php
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'HAY CAMPOS VACIOS!',
        }).then(function() {
            window.location.replace("equipos.php");
        });
    </script>
    <?php
}
?>
</body>
</html>

