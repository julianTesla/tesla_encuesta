<?php
header('Access-Control-Allow-Origin: *');
include "../conexion/conex.php";

$curso_id= $_GET['id'];
$encuesta_id= $_GET['ID'];
$usuer_id= $_GET['user'];

$sqlb="SELECT * FROM respondio WHERE respondio.curso_id = '$curso_id' 
AND respondio.id_alumno = $usuer_id AND respondio.encuesta_id = '$encuesta_id'";
$resultadob= mysqli_query($conex, $sqlb);

if($resultadob == 1)
{
    echo 1;
}
?>