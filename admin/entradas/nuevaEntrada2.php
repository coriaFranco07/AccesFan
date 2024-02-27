
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
            if (!empty($_POST["fecha"]) && !empty($_POST["lugar"]) && isset($_POST["local"]) && isset($_POST["visitante"]) && isset($_POST["pagar"])) {
                $fecha = $_POST["fecha"];
                $lugar = $_POST["lugar"];
                $local = $_POST["local"];
                $visitante = $_POST["visitante"];
                $estado = $_POST["pagar"];
                
                
                
                $sql = "INSERT INTO entrada (fecha_entrada, id_equipoLocal, id_equipoVisitante, id_estado, lugar) VALUES ('$fecha', $local, $visitante, $estado, '$lugar')";
                $res = mysqli_query($con, $sql);
                
                if ($res) {
                    ?>
                    <script>
                    Swal.fire({
                        title: 'ENTRADA CARGADO!',
                        //text: 'You clicked the button!',
                        icon: 'success'
                        }).then(function() {
                            window.location.replace("../entradasAdmin.php");
                        });
                    </script>
                    <?php
                    exit();
                } else {
                    die("Error en la consulta: " . mysqli_error($con));
                }
                    } else {
                        ?>
                        <script>
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'HAY CAMPOS VACIOS',
                                    }).then(function() {
                                        window.location.replace("../entradasAdmin.php");
                                });
                            
                        </script>
                        <?php
                        exit();
                    }
        ?>
    </body>
</html>
