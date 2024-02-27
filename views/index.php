<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
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
margin: auto;
text-align: center;">
    
    <form method="post" action="procesar.php">
        <br>
        <h1>INICIO DE ACCESS FANS</h1>
        <a href="login.php" class="btn btn-outline-light btn-lg px-5" style="background-color: rgb(19, 19, 114);" >LOGUEARME</a>
        <a href="register.php" class="btn btn-outline-light btn-lg px-5" style="background-color: rgb(19, 19, 114);" >REGISTRARME</a>
    </form>
   
    <div class="center-image">
        <img src="imagen_futbol2.png" alt="Imagen" width="400">
    </div>
    
</body>
</html>