<?php
include "../conexion/conex.php";

ini_set('date.timezone','America/Argentina/Buenos_Aires');

if(isset($_POST['respuesta1']))
{
    $fecha=date('Y-m-d',time()); 
    $respuesta_1= $_POST['respuesta1'];

    $sql1="INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,0, '$respuesta_1','$fecha' )";
    $resultado1= mysqli_query($conex, $sql1);
}

if(isset($_POST['respuesta2']))
{
    $fecha=date('Y-m-d',time()); 
    $respuesta_2= $_POST['respuesta2'];

    $sql2="INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,0, '$respuesta_2','$fecha' )";
    $resultado2= mysqli_query($conex, $sql2);
}

if(isset($_POST['respuesta3']))
{
    $fecha=date('Y-m-d',time()); 
    $respuesta_3= $_POST['respuesta3'];

    $sql3="INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,0, '$respuesta_3','$fecha' )";
    $resultado3= mysqli_query($conex, $sql3);
}

if(isset($_POST['respuesta4']))
{
    $fecha=date('Y-m-d',time()); 
    $respuesta_4= $_POST['respuesta4'];

    $sql4="INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,0, '$respuesta_4','$fecha' )";
    $resultado4= mysqli_query($conex, $sql4);
}

if(isset($_POST['respuesta5']))
{
    $fecha=date('Y-m-d',time()); 
    $respuesta_5= $_POST['respuesta5'];

    $sql5="INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,0, '$respuesta_5','$fecha' )";
    $resultado5= mysqli_query($conex, $sql5);
}

if(isset($_POST['texto1']))
{
    $fecha=date('Y-m-d',time()); 
    $texto1= $_POST['texto1'];

    $sql_texto1= "INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,'$texto1', 0,'$fecha' )";
    $resultado_texto1= mysqli_query($conex, $sql_texto1);
}

if(isset($_POST['texto2']))
{
    $fecha=date('Y-m-d',time()); 
    $texto2= $_POST['texto2'];

    $sql_texto2= "INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,'$texto2', 0,'$fecha' )";
    $resultado_texto2= mysqli_query($conex, $sql_texto2);
}

if(isset($_POST['texto3']))
{
    $fecha=date('Y-m-d',time()); 
    $texto3= $_POST['texto3'];

    $sql_texto3= "INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,'$texto3', 0,'$fecha' )";
    $resultado_texto3= mysqli_query($conex, $sql_texto3);
}

if(isset($_POST['texto4']))
{
    $fecha=date('Y-m-d',time()); 
    $texto4= $_POST['texto4'];

    $sql_texto4= "INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,'$texto4', 0,'$fecha')";
    $resultado_texto4= mysqli_query($conex, $sql_texto4);
}

if(isset($_POST['texto5']))
{
    $fecha=date('Y-m-d',time()); 
    $texto5= $_POST['texto5'];

    $sql_texto5= "INSERT INTO resultados (asignacion_encuesta_id, respuesta_text, respuesta_multiplechoice, fecha) 
    VALUE(4,'$texto5', 0,'$fecha')";
    $resultado_texto5= mysqli_query($conex, $sql_texto5);
}
mysqli_close($conex);
?>