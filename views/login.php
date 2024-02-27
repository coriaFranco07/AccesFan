<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Document</title>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="resources/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('imagen_futbol.png'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Para cubrir completamente el fondo */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            }
    </style>
    </head>

<body style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center;">

<div class="container" tyle="background-color: aliceblue;
    font-family: roboto;
    margin: auto; border-radius: 15px 10px 15px 10px;">


    <form action="comprobarUsuario.php" method="POST" align="center">
        
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                        <h2 class="fw-bold mb-2 text-uppercase;" style="color: brown;" >Login AccessFans</h2>
                        <hr>

                        <div class="form-outline form-white mb-4">
                        <input class="form-control form-control-lg" type="text" name="usuario" placeholder="Ingresa tu usuario...">
                        </div>

                        <div class="form-outline form-white mb-4">
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Ingresa tu password...">
                        </div>

                        <div class="form-outline form-white mb-4">
                        <input class="form-control form-control-lg" type="text" name="mail" placeholder="Ingresa tu mail...">
                        </div>


                        
                        <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Enviar">
                        <a href="index.php" class="btn btn-outline-light btn-lg px-5">Volver</a>
                    
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
       
    </form>
                   
              
         
          
</div>  
</body>
</html>


