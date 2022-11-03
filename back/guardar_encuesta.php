<?php
include "../conexion/conex.php";

$nombre_encuesta=$_POST['encuesta'];

$sql="INSERT INTO encuestas (nombre_encuesta) VALUE ('$nombre_encuesta')";
$resultado= mysqli_Query($conex,$sql);
mysqli_close($conex);
 ?>
 <script>
window.location="../crear_preguntas.php";
</script>