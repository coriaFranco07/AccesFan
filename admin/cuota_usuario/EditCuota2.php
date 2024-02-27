<?php

if(!empty($fecha="'".$_POST["fecha"]."'") and !empty($lugar="'".$_POST["valor"]."'") and !empty($local=$_POST["fecha_cuota"]) and !empty($visitante=$_POST["trasferencia"]) and !empty($estado=$_POST["Debito_Credito"]) ){
    $con=mysqli_connect("localhost","root","","facultad");
    $id=$_POST["id"];
    $fecha="'".$_POST["fecha"]."'";
    $valor=$_POST["valor"];
    $sql="update cuota set fecha = ".$fecha."  where id_cuota = ".$id." ; update cuota set valor = ".$valor."  where id_cuota = ".$id;
    $res=mysqli_multi_query($con,$sql);
    ?>
    <script>location.replace("../cuotasAdmin.php");</script>
    <?php
}
else{
    ?>
        <script>
            alert("Hay campos vacios");
            location.replace("../cuotasAdmin.php");
        </script>
    <?php
}
?>