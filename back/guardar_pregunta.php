<?php
include "../conexion/conex.php";

//recibimos los datos enviados del formulario y los almacenamos en variables
$nombre_pregunta=$_POST['nombre_pregunta'];
$encuesta_id= $_POST['encuesta_id'];
$tipo_pregunta=1;
$opcion_1=$_POST['opcion_1'];
$opcion_2=$_POST['opcion_2'];
$opcion_3=$_POST['opcion_3'];
$opcion_4=$_POST['opcion_4'];
$opcion_5=$_POST['opcion_5'];
$descripcion_texto=$_POST['descripcion_texto'];

//insertar la pregunta 
$sql_pregunta=" INSERT INTO preguntas (nombre_pregunta, encuesta_id, tipo_pregunta_id)
VALUES ('$nombre_pregunta', '$encuesta_id', '$tipo_pregunta')";
$resultado= mysqli_Query($conex, $sql_pregunta);

//traer el id de la pregunta seleccionada 
$sql_encuesta= "SELECT id_pregunta FROM preguntas ORDER BY id_pregunta DESC LIMIT 1;";
$resultado_encuesta= mysqli_Query($conex, $sql_encuesta);
while($row=mysqli_fetch_array($resultado_encuesta))
{
    $pregunta_id=  $row[0];
}


//comprobar si las opciones existen y cargar las opciones 
if( $opcion_1 != false)
{
    $sql_opcion1= "INSERT INTO opciones (descripcion, pregunta_id) VALUES ('$opcion_1', '$pregunta_id')";
    $resultado_opcion1= mysqli_Query($conex, $sql_opcion1);
}

if($opcion_2 != false)
{
    $sql_opcion2= "INSERT INTO opciones (descripcion, pregunta_id) VALUES ('$opcion_2', '$pregunta_id')";
    $resultado_opcion2= mysqli_Query($conex, $sql_opcion2);
}

if( $opcion_3 != false)
{
    $sql_opcion3= "INSERT INTO opciones (descripcion, pregunta_id) VALUES ('$opcion_3', '$pregunta_id')";
    $resultado_opcion3= mysqli_Query($conex, $sql_opcion3);
}

if( $opcion_4 != false)
{
    $sql_opcion4= "INSERT INTO opciones (descripcion, pregunta_id) VALUES ('$opcion_4', '$pregunta_id')";
    $resultado_opcion4= mysqli_Query($conex, $sql_opcion4);
}

if( $opcion_4 != false)
{
    $sql_opcion5= "INSERT INTO opciones (descripcion, pregunta_id) VALUES ('$opcion_5', '$pregunta_id')";
    $resultado_opcion5= mysqli_Query($conex, $sql_opcion5);
}

if($descripcion_texto != false)
{
    $sql_texto= "INSERT INTO opciones (descripcion, pregunta_id) VALUES ('$descripcion_texto', '$pregunta_id')";
    $resultado_texto= mysqli_Query($conex, $sql_texto);
}
mysqli_close($conex);
?>
<script>
window.location="../crear_preguntas.php";
</script>