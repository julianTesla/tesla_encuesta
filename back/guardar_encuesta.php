<?php
include "../conexion/conex.php";

$errorExiste;
$nombre_encuesta = $_POST['nombre_encuesta'];

// Verifico si existe una encuesta con ese nombre
$selectQuery = ("SELECT nombre_encuesta FROM encuestas WHERE nombre_encuesta='{$nombre_encuesta}'");
$query = mysqli_Query($conex, $selectQuery);
$totalEncuesta = mysqli_num_rows($query);

if ($totalEncuesta >= 1) {
    $errorExiste = "yes";
    echo '<script type="text/javascript">
    window.location="../Crear_encuesta.php?errorExiste=yes";
    </script>'
    ;
} else {
    $sql = "INSERT INTO encuestas (id_encuesta, nombre_encuesta) VALUE (null, '$nombre_encuesta')";
    $resultado = mysqli_Query($conex, $sql);
    mysqli_close($conex);

?>

<script>
    window.location = "../crear_preguntas.php";
</script>

<?php
}
?>