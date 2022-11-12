<?php
include "../conexion/conex.php";

$id_encuesta= $_POST['id_encuesta'];
$id_curso= $_POST['id_curso'];
$fecha1= $_POST['fecha1'];
$fecha2= $_POST['fecha2'];

$sql="SELECT id_pregunta, id_encuesta, nombre_encuesta, nombre_pregunta, descripcion, respuesta_multiplechoice, fecha 
FROM preguntas, encuestas, opciones, resultados, cursos, asignacion_encuesta, tipos_preguntas 
WHERE encuestas.id_encuesta = preguntas.encuesta_id AND preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
AND preguntas.id_pregunta = opciones.pregunta_id AND asignacion_encuesta.curso_id = cursos.id_curso 
AND asignacion_encuesta.encuesta_id = encuestas.id_encuesta 
AND asignacion_encuesta.id_asignacion_encuesta = resultados.asignacion_encuesta_id 
AND asignacion_encuesta.id_asignacion_encuesta = 6";




?>