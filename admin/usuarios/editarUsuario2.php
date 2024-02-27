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
if (
    !empty($_POST["nombre"]) &&
    !empty($_POST["apellido"]) &&
    !empty($_POST["edad"]) &&
    !empty($_POST["usuario"]) &&
    !empty($_POST["contraseña"]) &&
    !empty($_POST["sexo"]) &&
    !empty($_POST["codPostal"]) &&
    !empty($_POST["correo"]) &&
    !empty($_POST["rol"])
) {
    $con = mysqli_connect("localhost", "root", "", "facultad");

    // Obtener el ID del cliente desde el formulario
    $id = $_POST["id"];

    // Obtener los valores del formulario y escaparlos para evitar inyecciones SQL
    $nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($con, $_POST["apellido"]);
    $edad = mysqli_real_escape_string($con, $_POST["edad"]);
    $usuario = mysqli_real_escape_string($con, $_POST["usuario"]);
    $contraseña = mysqli_real_escape_string($con, $_POST["contraseña"]);
    $genero = mysqli_real_escape_string($con, $_POST["sexo"]);
    $loc = mysqli_real_escape_string($con, $_POST["codPostal"]);
    $correo = mysqli_real_escape_string($con, $_POST["correo"]);
    $rol = mysqli_real_escape_string($con, $_POST["rol"]);

    // Verificar si el nombre de usuario ya está en uso
    $checkUsuarioQuery = "SELECT * FROM cliente WHERE usuario = '$usuario' AND id_cliente != $id";
    $checkUsuarioResult = mysqli_query($con, $checkUsuarioQuery);

    if (mysqli_num_rows($checkUsuarioResult) > 0) {
        // El nombre de usuario ya está en uso, muestra un mensaje de error
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El nombre de usuario ya está en uso!'
            }).then(function () {
                window.location.replace("../usuariosAdmin.php");
            });
        </script>
        <?php
    } else {
        // El nombre de usuario no está en uso, procede con las actualizaciones
        $sql = "UPDATE cliente SET nombre='$nombre', apellido='$apellido', edad='$edad', usuario='$usuario', contraseña='$contraseña', correo='$correo', id_sexo='$genero', id_codPostal='$loc', id_rol='$rol' WHERE id_cliente=$id";

        $res = mysqli_query($con, $sql);

        if ($res) {
            // Actualización exitosa, muestra un mensaje de éxito
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'USUARIO MODIFICADO!',
                    icon: 'success'
                }).then(function () {
                    window.location.replace("../usuariosAdmin.php");
                });
            </script>
            <?php
        } else {
            // Error en la actualización, muestra un mensaje de error
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al modificar el usuario.'
                }).then(function () {
                    window.location.replace("../usuariosAdmin.php");
                });
            </script>
            <?php
        }
    }
} else {
    // Campos vacíos, muestra un mensaje de error
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'HAY CAMPOS VACIOS!'
        }).then(function () {
            window.location.replace("../usuariosAdmin.php");
        });
    </script>
    <?php
}
?>
</body>
</html>

