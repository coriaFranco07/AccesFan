<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <style>
        .center-image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: -80px;
        }

        .center-image img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        
    </style>
    </head>
    
    <body style="background-color: aliceblue;
    font-family: roboto;
    margin: auto; text-align: center;">

    <div class="container" tyle="background-color: aliceblue;
    font-family: roboto;
    margin: auto; border-radius: 15px 10px 15px 10px;">

        <h1 style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center; border-radius: 15px 10px 15px 10px;">MODO ADMINISTRADOR</h1>

        <a href="login.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color: #1f2735;">Volver</a>

        <br><br><br><br>

        <a href="../admin/cuotasAdmin.php" class="btn btn-primary">Cuotas</a>
        <a href="../admin/entradasAdmin.php" class="btn btn-secondary">Entradas</a>
        <a href="../admin/usuariosAdmin.php" class="btn btn-success">Usuarios</a>

        
        <div class="center-image">
            <img src="imagen_admin.png" alt="Imagen" width="400">
        </div>

    </div>
        
    </body>

    

</html>