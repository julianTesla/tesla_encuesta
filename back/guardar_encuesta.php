<?php
include "../conexion/conex.php";

$nombre_encuesta=$_POST['encuesta'];

$sql="INSERT INTO encuestas (id_encuesta, nombre_encuesta) VALUE (null, '$nombre_encuesta')";
$resultado= mysqli_Query($conex,$sql);
mysqli_close($conex);
 ?>
 <script>
window.location="../crear_preguntas.php";
</script>