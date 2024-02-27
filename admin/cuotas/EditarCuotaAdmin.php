<?php 
$con=mysqli_connect("localhost","root","","facultad");
$id=$_GET["id"];
$sql="select * from cuota where id_cuota=".$id;
$res=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cuota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>
        body {
            background-color:#104A42;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #1f2735;
            color: #fff;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <hr>
    <div class="container">
        
        <form action="EditarCuotaAdmin2.php" align="center" method="post">
            <h2>Modificar Datos</h2>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <?php
            while($a=mysqli_fetch_array($res)){
                ?>
                <label for="fecha">Fecha</label>
                <input type="text" name="fecha" value="<?php echo $a["fecha"] ?>" required><br>

                <label for="valor">Valor</label>
                <input type="number" name="valor" value="<?php echo $a["valor"] ?>" required><br><br>

                <input type="submit" value="Modificar Cuota" class="btn btn-primary btn-block"><hr>
                <a href="../cuotasAdmin.php" class="btn btn-outline-light btn-lg btn-block mb-4" style="background-color: #1f2735; border-radius: 15px;">Volver</a>
                <?php
            }
            ?>
        </form>
    </div>
</body>
</html>