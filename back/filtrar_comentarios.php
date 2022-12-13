<?php
include "../conexion/conex.php";


if(isset($_POST['cancelar']))
{
$sql3 = "SELECT nombre_encuesta, nombre_curso, nombre_pregunta, fecha, respuesta_text 
FROM cursos, encuestas, resultados, preguntas WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id
AND preguntas.id_pregunta= resultados.pregunta_id 
AND resultados.resultado_curso_id = cursos.id_curso AND resultados.respuesta_text != '0' 
ORDER BY resultados.id_resultado DESC;";

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
}
else
{
    
$curso = $_POST['curso'];
$encuesta = $_POST['encuesta'];
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];

$sql = "SELECT nombre_encuesta, nombre_curso, nombre_pregunta, fecha, respuesta_text 
    FROM cursos, encuestas, resultados, preguntas WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id 
    AND resultados.resultado_curso_id = cursos.id_curso AND resultados.respuesta_text != '0' 
    AND preguntas.id_pregunta= resultados.pregunta_id ";

if ($encuesta > 0) {
    $sql .= " AND encuestas.id_encuesta = " . $encuesta;
}
if ($curso > 0) {
    $sql .= " AND cursos.id_curso = '$curso' ";
}
if ($f1 != false || $f2 != false) {
    $sql .= " AND resultados.fecha BETWEEN '$f1' AND '$f2' ";
}

$sql .= "  ORDER BY resultados.id_resultado DESC;"; 
$resultado = mysqli_Query($conex, $sql);
if (mysqli_num_rows($resultado) > 0) {
    while ($row2 = mysqli_fetch_array($resultado)) {

        echo '<!-- INICIO COMENTARIO -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="testimonial-item text-center">
                <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                    <h6 class="m-2">Encuesta: ' . $row2[0] . '</h6>
                    <h6 class="m-2">Curso: ' . $row2[1] . '</h6>
                    <h6 class="m-2">Pregunta: ' . $row2[2] . '</h6>
                    <h6 class="m-2">' . $row2[3] . '</h6>
                </div>
                <p class="mb-0">' . $row2[4] . '</p>
            </div>
        </div>
    </div>
    <!-- FIN COMENTARIO -->';
    }
} else {
    echo '<!-- INICIO COMENTARIO -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="testimonial-item text-center">
                <div class="d-flex justify-content-center mb-2" style="background-color: black; border-radius: 10px;">
                    <h6 class="m-2" >Sin resultados</h6>
                </div>
                <p class="mb-0"></p>
            </div>
        </div>
    </div>
    <!-- FIN COMENTARIO -->';
}

mysqli_close($conex);
}


