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
            $opcion = $_POST['opcion']; // Obtener el valor seleccionado del campo de entrada radio
            $id=$_POST["id"];
            $con=mysqli_connect("localhost","root","","facultad");
            if ($opcion == "3") {
                $sql="update cliente set estado_cliente = 3 where id_cliente = ".$id;
                $res=mysqli_query($con,$sql);
                ?>
                <script>
                     Swal.fire({
                        title: 'ESTADO MODIFICADO!',
                        //text: 'You clicked the button!',
                        icon: 'success'
                        }).then(function() {
                            window.location.replace("../usuariosAdmin.php");
                        });
                    
                </script>
                <?php
            } elseif ($opcion == "4") {
                $sql="update cliente set estado_cliente = 4 where id_cliente = ".$id;
                $res=mysqli_query($con,$sql);
                ?>
                <script>
                Swal.fire({
                        title: 'ESTADO MODIFICADO!',
                        //text: 'You clicked the button!',
                        icon: 'success'
                        }).then(function() {
                            window.location.replace("../usuariosAdmin.php");
                        });
                </script>
                <?php
            } else {
                ?>
                <script>
                 Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'NO SE MODIFICO EL ESTADO!',
                    }).then(function() {
                        window.location.replace("../usuariosAdmin.php");
                    });
                
                </script>
                <?php
            }
        ?>

    </body>

</html>


