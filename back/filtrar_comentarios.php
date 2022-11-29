<?php
 include "../conexion/conex.php";

if($_POST['curso'] != false and $_POST['encuesta'] != false and $_POST['f1'] != false and $_POST['f2'] != false)//busqueda completa
{
    $curso= $_POST['curso'];
    $encuesta= $_POST['encuesta'];
    $f1= $_POST['f1'];
    $f2= $_POST['f2'];

 $sql= "SELECT nombre_encuesta, nombre_curso, nombre_pregunta, fecha, respuesta_text 
 FROM cursos, encuestas, resultados, preguntas WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id 
 AND resultados.resultado_curso_id = cursos.id_curso AND resultados.respuesta_text != '0' 
 AND preguntas.id_pregunta= resultados.pregunta_id
 AND encuestas.id_encuesta = '$encuesta' AND cursos.id_curso = '$curso'
 AND resultados.fecha BETWEEN '2022-11-20' AND '2022-11-29' ORDER BY encuestas.id_encuesta DESC;";
 $resultado= mysqli_Query($conex,$sql);
 if(mysqli_num_rows($resultado)>0)
 {
    while ($row2 = mysqli_fetch_array($resultado)) {

        echo '<!-- INICIO COMENTARIO -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="testimonial-item text-center">
                <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                    <h6 class="m-2">'.$row2[0].'</h6>
                    <h6 class="m-2">'.$row2[1].'</h6>
                    <h6 class="m-2">'.$row2[2].'</h6>
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
    echo '<!-- INICIO COMENTARIO -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            <div class="testimonial-item text-center">
                <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                    <h6 class="m-2">Sin</h6>
                    <h6 class="m-2">Sin</h6>
                    <h6 class="m-2">Sin</h6>
                </div>
                <p class="mb-0">Sin resultados para la busqueda aplicada</p>
            </div>
        </div>
    </div>
    <!-- FIN COMENTARIO -->';
 }

}//cerre de llaves del if de busqueda completa

if($_POST['curso'] != false and $_POST['encuesta'] != true and $_POST['f1'] != false and $_POST['f2'] != false)//busqueda por encuesta
{
    $encuesta= $_POST['encuesta'];

    $sql= "SELECT nombre_encuesta, nombre_curso, nombre_pregunta, fecha, respuesta_text 
    FROM cursos, encuestas, resultados, preguntas WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id 
    AND resultados.resultado_curso_id = cursos.id_curso AND resultados.respuesta_text != '0' 
    AND encuestas.id_encuesta = '$encuesta' AND preguntas.id_pregunta= resultados.pregunta_id ORDER BY encuestas.id_encuesta DESC";
    $resultado= mysqli_Query($conex,$sql);
    if(mysqli_num_rows($resultado)>0)
    {
       while ($row2 = mysqli_fetch_array($resultado)) {
   
           echo '<!-- INICIO COMENTARIO -->
       <div class="container-fluid pt-4 px-4">
           <div class="bg-secondary rounded h-100 p-4">
               <div class="testimonial-item text-center">
                   <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                       <h6 class="m-2">'.$row2[0].'</h6>
                       <h6 class="m-2">'.$row2[1].'</h6>
                       <h6 class="m-2">'.$row2[2].'</h6>
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
       echo '<!-- INICIO COMENTARIO -->
       <div class="container-fluid pt-4 px-4">
           <div class="bg-secondary rounded h-100 p-4">
               <div class="testimonial-item text-center">
                   <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                       <h6 class="m-2">Sin</h6>
                       <h6 class="m-2">Sin</h6>
                       <h6 class="m-2">Sin</h6>
                   </div>
                   <p class="mb-0">Sin resultados para la busqueda aplicada</p>
               </div>
           </div>
       </div>
       <!-- FIN COMENTARIO -->';
    }
}

 mysqli_close($conex);
?>