<?php
$opcion = $_POST['opcion']; // Obtener el valor seleccionado del campo de entrada radio
$id = $_POST["id"];
$con = mysqli_connect("localhost", "root", "", "facultad");
if ($opcion == "si") {
    $sql = "DELETE FROM cuota WHERE id_cuota = " . $id;
    $res = mysqli_query($con, $sql);
    ?>
    <script>
        location.replace("../cuotasAdmin.php");
    </script>
    <?php
} elseif ($opcion == "no") {
    ?>
    <script>location.replace("../cuotasAdmin.php");</script>
    <?php
} else {
    ?>
    <script>location.replace("../cuotasAdmin.php");</script>
    <?php
}
?>
