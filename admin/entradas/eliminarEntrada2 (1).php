

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
    if ($opcion == "si") {
        $sql="delete from entrada where id_entrada = ".$id;
        $res=mysqli_query($con,$sql);
        ?>
        <script>
            location.replace("../entradasAdmin.php");
        </script>
        <?php
    } elseif ($opcion == "no") {
        ?>
        <script>location.replace("../entradasAdmin.php");</script>
        <?php
    } else {
        ?>
        <script>location.replace("../entradasAdmin.php");</script>
        <?php
    }
    ?>
</body>
</html>
