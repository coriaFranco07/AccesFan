
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <hr>
    <body style="background-color: aliceblue;
    font-family: roboto;
    margin: auto;">

    <div class="container" tyle="background-color: aliceblue;
    font-family: roboto;
    margin: auto; border-radius: 15px 10px 15px 10px;">

        <h1 style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center; border-radius: 15px 10px 15px 10px;"></h1>

        <a href="eventos.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color:black;">Cancelar</a>

        <?php

            if(!empty($_POST["fecha"]) and !empty($_POST["valor"])){
                $con=mysqli_connect("localhost","root","","facultad");
                $id=$_POST["id"];
                $fecha="'".$_POST["fecha"]."'";
                $valor=$_POST["valor"];
                $sql="update cuota set fecha = ".$fecha."  where id_cuota = ".$id." ; update cuota set valor = ".$valor."  where id_cuota = ".$id;
                $res=mysqli_multi_query($con,$sql);
                ?>
                <script>
                Swal.fire({
                    title: 'CUOTA MODIFICADA!',
                    //text: 'You clicked the button!',
                    icon: 'success'
                    }).then(function() {
                        window.location.replace("../cuotasAdmin.php");
                    });
                
                </script>
                <?php
            }
            else{
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'HAY CAMPOS VACIOS!',
                            }).then(function() {
                            window.location.replace("../cuotasAdmin.php");
                        });
                        
                    </script>
                <?php
            }
        ?>

    </div>
        
    </body>

</html>