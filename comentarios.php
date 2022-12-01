<?php
include "parte_superior.php";
include "conexion/conex.php";

$sql = "SELECT id_curso, nombre_curso FROM cursos ";
$resultado = mysqli_query($conex, $sql);

$sql1 = "SELECT id_encuesta, nombre_encuesta FROM encuestas ORDER BY encuestas.id_encuesta DESC";
$resultado1 = mysqli_query($conex, $sql1);

?>

<!-- INICIO BARRA DE FILTRO -->
<div class="container-fluid pt-4 px-4">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i> ¡Pantalla en construcción!
    </div>
    <div class="bg-secondary rounded h-100 p-4">
        <div class="d-flex align-items-center justify-content-between">

            <form action="">
                
                <select class="form-select js-example-basic-single" style="width: 110%;" id="curso">
                    <option>Seleccionar curso</option>
                    <?php
                    $sql = "SELECT id_curso, nombre_curso FROM cursos ORDER BY cursos.id_curso DESC";
                    $resultado = mysqli_query($conex, $sql);
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $row[0] . '">' .$row[1] . '</option>';
                    }
                    ?>
                </select>
            </form>

            <form action="">
                <select class="form-select js-example-basic-single" style="width: 110%;" id="encuesta">
                    <option >Seleccionar encuesta</option>
                    <?php
                    $sql1 = "SELECT id_encuesta, nombre_encuesta FROM encuestas ORDER BY encuestas.id_encuesta DESC ";
                    $resultado1 = mysqli_query($conex, $sql1);
                    while ($row1 = mysqli_fetch_array($resultado1)) {
                        echo '<option value="' . $row1[0] . '">' . $row1[1] . '</option>';
                    }
                    ?>
                </select>
            </form>

            <div class="form-item">
                <label>Fecha desde</label>
                <input class="input-sm form-control" type=date style="background-color:red; color:white" id="f1">
            </div>
            <div class="form-item">
                <label>Fecha hasta</label>
                <input class="input-sm form-control" type=date style="background-color:red; color:white" id="f2">
            </div>
            <div class="form-item">
                <button class="btn btn-primary m-2" style="height: 2.7rem;" onclick="filtrar();"> Buscar </button>
            </div>

        </div>
    </div>
</div>
<!-- FIN BARRA DE FILTRO -->

<div id="respuesta">
<?php
$sql3 = "SELECT nombre_encuesta, nombre_curso, nombre_pregunta, fecha, respuesta_text 
FROM cursos, encuestas, resultados, preguntas WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id
AND preguntas.id_pregunta= resultados.pregunta_id 
AND resultados.resultado_curso_id = cursos.id_curso AND resultados.respuesta_text != '0' 
ORDER BY id_resultado DESC";

$resultado3 = mysqli_Query($conex, $sql3);
while ($row2 = mysqli_fetch_array($resultado3)) {

    echo '<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta: ' . $row2[0] . '</h6>
                <h6 class="m-2">Curso: '.$row2[1].'</h6>
                <h6 class="m-2">Pregunta: '.$row2[2].'</h6>
                <h6 class="m-2">'.$row2[3].'</h6>
            </div>
            <p class="mb-0">'.$row2[4].'</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->';
}
?>
</div>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            style: 'form-control'
        });
    });
</script>
<script>
    function filtrar() {

        curso = document.getElementById('curso').value;
        encuesta = document.getElementById('encuesta').value;
        f1 = document.getElementById('f1').value;
        f2 = document.getElementById('f2').value;

        $.ajax({
            data: {
                "curso": curso,
                "encuesta": encuesta,
                "f1": f1,
                "f2": f2
            },
            url: 'back/filtrar_comentarios.php',
            type: 'POST',
            success: function(mensaje) {
                $('#respuesta').html(mensaje);
            }
        });

    }
</script>

<?php
include "parte_inferior.php";
?>