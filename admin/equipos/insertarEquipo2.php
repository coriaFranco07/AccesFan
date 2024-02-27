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
$con = mysqli_connect("localhost", "root", "", "facultad");
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (

    isset($_POST["equipo"])

) {

    $equipo = $_POST["equipo"];
    $sql = "INSERT INTO equipo_viistante (tipo_equipoVisitante) VALUES (?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $equipo);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        ?>
        <script>
         Swal.fire({
            title: 'EQUIPO CARGADO!',
            //text: 'You clicked the button!',
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
                text: 'ERROR AL CARGAR DATOS',
                }).then(function() {
                    window.location.replace("equipos.php");
            });
            
        </script>
        <?php
    }
} else {
    ?>
    <script>
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'HAY CAMPOS VACIOS',
                }).then(function() {
                    window.location.replace("equipos.php");
            });
        
    </script>
    <?php
}
?>

    </body>
</html>


