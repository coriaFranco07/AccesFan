<?php 

$conn= mysqli_connect("localhost", "root", "", "facultad");

?>

<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
            <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

        </head>
        <br>
        <body style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center;">

            <div class="container" tyle="background-color: aliceblue;
            font-family: roboto;
            margin: auto; border-radius: 15px 10px 15px 10px;">

            <h1 style="background-color: aliceblue;
            font-family: roboto;
            margin: auto;
            text-align: center; border-radius: 15px 10px 15px 10px;">USUARIOS ADMIN</h1>

            
            
            <a style="top: 10px; right: 5%; width: 150px; " href="./usuarios/insertarUsuario.php" class="btn btn-outline-primary mt-4">Agregar Usuario<i class="fa-solid fa-square-plus"></i></a> 
            <a style="top: 10px; right: 5%; width: 150px;  background-color: #1f2735;" href="../views/modoAdmin.php" class="btn btn-outline-primary mt-4">Volver</a>
            <br><br><br><br>

            <?php
                session_start();

                $querypa="select * from cliente where usuario = ".$_SESSION["username"];
                $resultado=mysqli_query($conn,$querypa);
                while($a=mysqli_fetch_array($resultado)){
                    ?>

                    <?php $id_cliente = $a["id_cliente"]; ?>
                    <?php $nombre = $a["nombre"]; ?>  

                    <?php
                }


            
                // Trae las cuotas no pagadas 
                $sql = "SELECT  cliente.id_cliente, cliente.usuario, cliente.contraseña , cliente.nombre,  cliente.apellido, cliente.edad, cliente.correo, sexo.tipo_sexo, localidad.tipo_codPostal, estado.tipo_estado, roles.tipo FROM cliente INNER JOIN sexo ON cliente.id_sexo = sexo.id_sexo INNER JOIN localidad ON cliente.id_codPostal = localidad.id_codPostal INNER JOIN estado on cliente.estado_cliente=estado.id_estado 
                INNER JOIN roles on cliente.id_rol=roles.id_rol";
                $result = mysqli_query($conn, $sql);
            ?>

            
            

            <table id="usuarios" class="table table-bordered table-striped text-center nt-4">
            
                <thead>
                    <tr class="bg-primary text-white">
                    <th scope="col">ID_USUARIO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDO</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">USUARIO</th>
                    <th scope="col">CONTRASEÑA</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">SEXO</th> 
                    <th scope="col">LOCALIDAD</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">ROL</th>
                    <th scope="col">CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                        <td><?php echo $mostrar['id_cliente'] ?></td>
                        <td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['apellido'] ?></td>
                        <td><?php echo $mostrar['edad'] ?></td>
                        <td><?php echo $mostrar['usuario'] ?></td>
                        <td><?php echo $mostrar['contraseña'] ?></td>
                        <td><?php echo $mostrar['correo'] ?></td>
                        <td><?php echo $mostrar['tipo_sexo'] ?></td>
                        <td><?php echo $mostrar['tipo_codPostal'] ?></td>
                        <td><?php echo $mostrar['tipo_estado'] ?></td>
                        <td><?php echo $mostrar['tipo'] ?></td>
                        <td>
                            <a href="./usuarios/editarUsuario.php?id= <?php echo $mostrar["id_cliente"] ?>" class="btn btn-outline-info">Editar<i class="fa-solid fa-pen-to-square"></i></a><br><br>
                            <a href="./usuarios/EliminarUsuario (1).php?id= <?php echo $mostrar["id_cliente"] ?>" class="btn btn-outline-danger">Estado<i class="fa-solid fa-trash"></i></a>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                

            </table>

            <!-- ... tu código HTML anterior ... -->

            <div id="campoPago"></div>
            
        
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


            <script>
                $(document).ready( function() {
                    $('#usuarios').DataTable();
                });
            </script>
            
        </body>

       
</html>