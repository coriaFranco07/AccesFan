<?php 
        $con= mysqli_connect("localhost", "root", "", "facultad");

        $nombre="'".$_POST["nombre"]."'";
        $apellido="'".$_POST["apellido"]."'";
        $genero=$_POST["sexo"];
        $loc=$_POST["codPostal"];
        $edad=$_POST["edad"];
        $mail="'".$_POST["mail"]."'";
        $usuario="'".$_POST["usuario"]."'";
        $contraseña="'".$_POST["contraseña"]."'";
        $rol=2;


        if(buscarusuario($usuario,$con)==1){
            $sql="insert into cliente(nombre,apellido,id_sexo,id_codPostal,edad,usuario,correo,contraseña,id_rol) values(".$nombre.",".$apellido.",".$genero.",".$loc.",".$edad.",".$usuario.",".$mail.",".$contraseña.",".$rol.")";
            $res=mysqli_query($con,$sql);
            if(!empty($res)){
                ?>
                <script>
                    alert("Regsitrado Exitosamente!!!")
                    window.location.replace("index.php");
                            
                </script>
            <?php
            }
        }else{
            ?>
            <script>
                alert("Usuario ya en uso.Por Favor colocar uno diferente")
                location.replace("register.php")
            </script>
            <?php
        }


        function buscarusuario($user,$conexxion){

            $sql="select * from cliente where usuario= ".$user;
            $result=mysqli_query($conexxion,$sql);
            if(mysqli_num_rows($result) > 0){
                return 0;

            }else{
                return 1;
            }
        }



        
?>