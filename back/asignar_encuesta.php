<?php
include "../conexion/conex.php";

$encuesta_id = $_POST['encuesta_id'];
$curso_id = $_POST['curso_id'];

if ($encuesta_id == 0 || $curso_id == 0) {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert"><i class="fa fa-exclamation-circle me-2"></i>
¡Debe seleccionar las opciones!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    die();
}

$sql = "INSERT INTO asignacion_encuesta (curso_id, encuesta_id) VALUE ('$curso_id', '$encuesta_id')";
$resultado = mysqli_Query($conex, $sql);

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
¡Encuesta enviada correctamente!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

mysqli_close($conex);
?>
