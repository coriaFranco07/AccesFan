<!DOCTYPE html>

<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
        <style>
            .center-image {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin-top: -200px;
            
            }

            .center-image img {
                max-width: 100%; /* Asegura que la imagen no se salga del contenedor */
                border-radius: 10px; /* Agrega bordes redondeados a la imagen */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Agrega una sombra suave a la imagen */
            }

            body {
            background-image: url('imagen_futbol.png'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Para cubrir completamente el fondo */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            }
            
        </style>
    </head>
    
    <br><br>
    <body style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center;">

    <div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <br><br><br><br><br><br>
        <div>

            <a href="misDatos.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 1200px; width: 210px; position: fixed; background-color: #1f2735; border-radius: 15px;">Mis Datos</a>

            <a href="login.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 200px; position: fixed; background-color: #1f2735; border-radius: 15px;">Cerrar Session</a>


            <strong><h3 style="text-align: center; color: blanchedalmond;">PAGINA PRINCIPAL</h3></strong> 

            <?php

                session_start();

                if (!isset($_SESSION['username'])) {
                // si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
                header('Location: login.html');
                exit;
                }

                $con= mysqli_connect("localhost", "root", "", "facultad");
                $sql="select * from cliente where usuario =".$_SESSION["username"];
                $res=mysqli_query($con,$sql);
                
                while($mostrar=mysqli_fetch_array($res)){
                    //aca en vez de utilizar un table como en las clases uso un h4
                    ?>
                        <!-- esto lo coloco para verificar que funciona bien el mostrado de informacion del cliente pa-->
                        <strong><h4 style="color: antiquewhite;"> Bienvenido <?php echo $mostrar["usuario"] ?> </h4></strong>    
                    <?php
                }

            ?>

            <br><br>

            <a href="cuotas.php" class="btn btn-primary">Cuotas</a>
            <a href="entradas.php" class="btn btn-secondary">Entradas</a>
            <a href="eventos.php" class="btn btn-success">Eventos</a>


        </div>

    </body>
</html>

