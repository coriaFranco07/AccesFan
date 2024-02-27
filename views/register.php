<?php
// Establecer la conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "facultad");

$sql = "SELECT * FROM sexo";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM localidad";
$result2 = mysqli_query($conn, $sql2);


?>

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
</head>



<body style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center;">

<div class="container" tyle="background-color: aliceblue;
    font-family: roboto;
    margin: auto; border-radius: 15px 10px 15px 10px; ">
        

    <form action="cargarUsuario.php" method="POST" align="center" id="myForm">
    <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                      
                <h3 class="mb-5 text-uppercase">REGISTRARSE</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" name="nombre" placeholder="nombre">
                    </div>

                  </div>

                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" name="apellido" placeholder="apellido">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" name="edad" placeholder="Introduzca edad">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" name="usuario" placeholder="Nombre Usuario">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="email" name="mail" placeholder="Correo">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="password" name="contraseña" placeholder="Password">
                    </div>
                  </div>
                </div>

                
                  <label for="sexo">Selecciona un sexo:</label>
                  <select name="sexo" id="sexo">
                    <?php
                      // Mostrar opciones del menú desplegable
                      while ($fila = mysqli_fetch_array($result)) {
                          echo "<option value='" . $fila['id_sexo'] . "'>" . $fila['tipo_sexo'] . "</option>";
                      }
                    ?>
                  </select>

                  <br><br>

                  <label for="codPostal">Selecciona tu localidad:</label>
                  <select name="codPostal" id="codPostal">
                    <?php
                      // Mostrar opciones del menú desplegable
                      while ($fila = mysqli_fetch_array($result2)) {
                          echo "<option value='" . $fila['id_codPostal'] . "'>" . $fila['tipo_codPostal'] . "</option>";
                      }
                    ?>
                  </select>
              
                
                  <div class="d-flex justify-content-end pt-3" style="margin-right: 100px;">
                    <input type="submit" class="btn btn-warning btn-lg ms-2" value="ENVIAR"></input> 
                    <a href="index.php" class="btn btn-light btn-lg">VOLVER</a>
                  </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </form>

<div>

<script>
  document.getElementById('myForm').addEventListener('submit', function(event) {
    var inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
    var isValid = true;

    inputs.forEach(function(input) {
      if (input.value.trim() === '') {
        isValid = false;
      }
    });

    if (!isValid) {
      event.preventDefault(); // Evita que el formulario se envíe si hay campos vacíos
      alert('Por favor, complete todos los campos antes de enviar el formulario.');
    }
  });
</script>

</body>
</html>

