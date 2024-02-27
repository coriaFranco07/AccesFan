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

            $con= mysqli_connect("localhost", "root", "", "facultad");

            $usuario="'".$_POST["usuario"]."'";
            $mail="'".$_POST["mail"]."'";
            $contraseña="'".$_POST["password"]."'";

            $sql="select * from cliente where correo = ".$mail." and contraseña = ".$contraseña." and usuario = ".$usuario;
            $res=mysqli_query($con,$sql);
            $cont=mysqli_num_rows($res);
            /*session_start();
            $_SESSION['username'] = $usuario*/
            if($cont==1){
                session_start();
                $_SESSION['username'] = $usuario;
                while($a=mysqli_fetch_array($res)){
                    if($a["id_rol"] == 1){
                        ?>
                        <script>

                            Swal.fire({
                                title: 'BIENVENIDO ADMINISTRADOR!',
                                //text: 'You clicked the button!',
                                icon: 'success'
                            }).then(function() {
                                window.location.replace("modoAdmin.php");
                            });

                        </script>
                        <?php
                    }elseif($a["id_cliente"] > 1 && $a["estado_cliente"] == 4){
                        ?>

                        <script>
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'USUARIO NO HABILITADO!',
                                }).then(function() {
                                window.location.replace("login.php");
                                });
                        </script>

                        <?php
                    }else{
                        ?>
                        <script>
                            Swal.fire({
                                title: 'BIENVENIDO!',
                                //text: 'You clicked the button!',
                                icon: 'success'
                            }).then(function() {
                                window.location.replace("principal.php");
                            });
                            
                        </script>
                        <?php
                    }
                }
            }
            else{
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'USUARIO NO EXISTENTE!',
                        }).then(function() {
                        window.location.replace("login.php");
                        });
                </script>
                <?php
            }
        ?>

    </body>

</html>


