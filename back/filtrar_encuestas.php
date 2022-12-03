<?php
/* SELECT DISTINCT nombre_encuesta, nombre_curso 
FROM resultados, encuestas, cursos 
WHERE resultados.resultado_encuesta_id = encuestas.id_encuesta 
AND resultados.resultado_curso_id = cursos.id_curso 
AND resultados.respuesta_multiplechoice != '0' AND cursos.id_curso = 255 AND encuestas.id_encuesta = 12
*/
include "../conexion/conex.php";
$curso = $_POST['curso'];
$encuesta = $_POST['encuesta'];
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];

$sqlENC= "SELECT * FROM encuestas ";
if($encuesta > 0)
{
    $sqlENC .= " WHERE encuestas.id_encuesta = '$encuesta'";
}
$resultadoENC= mysqli_Query($conex,$sqlENC);

while($rowENC= mysqli_fetch_array($resultadoENC))
{
    $id_encuesta= $rowENC['id_encuesta'];

       echo '<!-- INICIO CONTENEDOR ENCUESTA -->
       <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" id=encuesta>

                <div class="bg-secondary text-center rounded p-4">
                    <h2>'.$rowENC['nombre_encuesta'].'</h2>
                </div>';
                

$sqlPRE= "SELECT id_pregunta, encuesta_id, nombre_pregunta, tipo_pregunta_id 
FROM preguntas WHERE tipo_pregunta_id = 1";
$resultadoPRE= mysqli_query($conex, $sqlPRE);
            while($rowPRE= mysqli_fetch_array($resultadoPRE))
            {
                $id_pregunta = $rowPRE['id_pregunta'];

                if($rowPRE['encuesta_id'] == $rowENC['id_encuesta'])
                {
                echo'<div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">'.$rowPRE['nombre_pregunta'].'</h5>';


$sqlOPC= "SELECT descripcion, pregunta_id FROM opciones";
$resultadoOPC= mysqli_Query($conex, $sqlOPC);
                    while($rowOPC= mysqli_fetch_array($resultadoOPC))
                    {
                        if($rowPRE['id_pregunta'] == $rowOPC['pregunta_id'])
                        {

$sqlRES= "SELECT id_encuesta, id_pregunta, fecha, respuesta_multiplechoice 
FROM cursos, encuestas, resultados, preguntas WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id 
AND resultados.resultado_curso_id = cursos.id_curso AND resultados.respuesta_multiplechoice != '0' 
AND preguntas.id_pregunta = resultados.pregunta_id AND preguntas.id_pregunta = $id_pregunta";

if ($encuesta > 0) {
    $sqlRES .= " AND resultados.resultado_encuesta_id =  " . $encuesta;
}
if ($curso > 0) {
    $sqlRES .= " AND resultados.resultado_curso_id  = '$curso' ";
}
if ($f1 != false || $f2 != false) {
    $sqlRES .= " AND resultados.fecha BETWEEN '$f1' AND '$f2' ";
}
$resultadoRES= mysqli_query($conex, $sqlRES);

if(mysqli_num_rows($resultadoRES)>0)
{
    
    $acum= 0;
    $contOPC= 0;
    while($rowRES= mysqli_fetch_array($resultadoRES))
    {
        $acum++;
        if($rowRES['respuesta_multiplechoice'] == $rowOPC['descripcion'])
        {
            $rowRES['respuesta_multiplechoice'];
            $contOPC++;
        }
    }
    $total = round( 100/$acum*$contOPC);
    
}
else
{ $total= 0; }
//$total = round( 100/$acum*$contOPC);
                        echo'<h6>'.$rowOPC['descripcion'].'</h6>
                        <div class="pg-bar mb-3">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="'.$total.'" aria-valuemin="0" aria-valuemax="100">'.$total.'%</div>
                            </div>
                        </div>';
                        }
                    }

                echo '</div>';
                }
            }
           echo ' </div>
        </div>
        <!-- FIN CONTENEDOR ENCUESTA -->';
}
?>
