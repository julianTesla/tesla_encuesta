<?php
header('Access-Control-Allow-Origin: *');
include "../conexion/conex.php";

$curso_id= $_GET['id'];
$encuesta_id= $_GET['ID'];
$user_id= $_GET['user'];

$sqlb="SELECT * FROM respondio WHERE respondio.curso_id = '$curso_id' 
AND respondio.id_alumno = $user_id AND respondio.encuesta_id = '$encuesta_id'";
$resultadob= mysqli_query($conex, $sqlb);



if(mysqli_num_rows($resultadob)>0){
    $existe = "Si";
    echo $existe;
} else {
    echo "No";
}


?>