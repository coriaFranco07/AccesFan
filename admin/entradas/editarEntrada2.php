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

if(!empty($fecha="'".$_POST["fecha"]."'") and !empty($lugar="'".$_POST["lugar"]."'") and !empty($local=$_POST["local"]) and !empty($visitante=$_POST["visitante"]) and !empty($estado=$_POST["pagar"]) ){
    $con=mysqli_connect("localhost","root","","facultad");
    $id=$_POST["id"];
    $sql="update entrada set fecha_entrada = ".$fecha."  where id_entrada = ".$id." ; update entrada set lugar = ".$lugar."  where id_entrada = ".$id." ; update entrada set id_equipoLocal = ".$local."  where id_entrada = ".$id." ; update entrada set id_equipoVisitante = ".$visitante."  where id_entrada = ".$id." ; update entrada set id_estado = ".$estado."  where id_entrada = ".$id;

    $res=mysqli_multi_query($con,$sql);
    ?>
    
    <script>
        Swal.fire({
        title: 'ENTRADA MODIFICADO!',
        //text: 'You clicked the button!',
        icon: 'success'
        }).then(function() {
            window.location.replace("../entradasAdmin.php");
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
                        window.location.replace("../entradasAdmin.php");
            });
            
        </script>
    <?php
}

?>
</body>
</html>
