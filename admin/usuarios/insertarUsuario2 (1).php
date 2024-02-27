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
    isset($_POST["nombre"]) &&
    isset($_POST["apellido"]) &&
    isset($_POST["edad"]) &&
    isset($_POST["usuario"]) &&
    isset($_POST["contraseña"]) &&
    isset($_POST["sexo"]) &&
    isset($_POST["codPostal"]) &&
    isset($_POST["correo"]) &&
    isset($_POST["rol"])
) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $genero = $_POST["sexo"];
    $loc = $_POST["codPostal"];
    $correo = $_POST["correo"];
    $rol = $_POST["rol"];

    // Verificar si el nombre de usuario ya existe
    $checkUsuarioQuery = "SELECT * FROM cliente WHERE usuario = ?";
    $stmt = mysqli_prepare($con, $checkUsuarioQuery);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El nombre de usuario ya está en uso!'
            }).then(function() {
                window.location.replace("../usuariosAdmin.php");
            });
        </script>
        <?php
    } else {
        // Insertar nuevo usuario
        $sql = "INSERT INTO cliente (nombre, apellido, edad, usuario, contraseña, correo, id_sexo, id_codPostal, id_rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssisssiii", $nombre, $apellido, $edad, $usuario, $contraseña, $correo, $genero, $loc, $rol);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'USUARIO CARGADO!',
                    icon: 'success'
                }).then(function() {
                    window.location.replace("../usuariosAdmin.php");
                });
            </script>
            <?php
        } else {
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'ERROR AL CARGAR DATOS'
                }).then(function() {
                    window.location.replace("../usuariosAdmin.php");
                });
            </script>
            <?php
        }
    }
} else {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'HAY CAMPOS VACIOS'
        }).then(function() {
            window.location.replace("../usuariosAdmin.php");
        });
    </script>
    <?php
}
?>


    </body>
</html>


