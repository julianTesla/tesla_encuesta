<?php
 include "../conexion/conex.php";

 $curso= $_POST['curso'];
 $encuesta= $_POST['encuesta'];
 $f1= $_POST['f1'];
 $f2= $_POST['f2'];

 $slq= "SELECT nombre_encuesta, nombre_curso, fecha, respuesta_text 
 FROM cursos, encuestas, resultados WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id 
 AND resultados.resultado_curso_id = cursos.id_curso AND resultados.respuesta_text != '0' 
 AND resultados.fecha BETWEEN '2022-11-26' AND '2022-11-28' ORDER BY encuestas.id_encuesta DESC;";
?>