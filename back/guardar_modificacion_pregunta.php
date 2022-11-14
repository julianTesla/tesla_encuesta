<?php
include "../conexion/conex.php";

// $id_pregunta= $_POST['id_pregunta'];
// $id_opcion1= $_POST['id_opcion1'];
// $id_opcion2= $_POST['id_opcion2'];
// $id_opcion3= $_POST['id_opcion3'];
// $id_opcion4= $_POST['id_opcion4'];
// $id_opcion5= $_POST['id_opcion5'];
// $id_texto= $_POST['id_texto'];

// $nombre_pregunta= $_POST['nombre_pregunta'];
// $opcion1= $_POST['opcion_1'];
// $opcion2= $_POST['opcion_2'];
// $opcion3= $_POST['opcion_3'];
// $opcion4= $_POST['opcion_4'];
// $opcion5= $_POST['opcion_5'];
// $texto= $_POST['descripcion_texto'];

if(isset($_POST['id_pregunta']) || isset($_POST['nombre_pregunta']))
{
    $id_pregunta= $_POST['id_pregunta'];
    $nombre_pregunta= $_POST['nombre_pregunta'];

$sql= "UPDATE `preguntas` SET `nombre_pregunta` = '$nombre_pregunta' WHERE `preguntas`.`id_pregunta` = '$id_pregunta'";
$resultado= mysqli_query($conex, $sql);
}


if( isset($_POST['opcion_1']) || isset($_POST['id_opcion1']))
{
    $id_opcion1= $_POST['id_opcion1'];
    $opcion1= $_POST['opcion_1'];

    $sql_opcion1= "UPDATE `opciones` SET `descripcion` = '$opcion1' WHERE `opciones`.`id_opciones` = '$id_opcion1'";
    $resultado_opcion1= mysqli_Query($conex, $sql_opcion1);
}

if(isset($_POST['opcion_2']) || isset($_POST['id_opcion2']))
{
    $id_opcion2= $_POST['id_opcion2'];
    $opcion2= $_POST['opcion_2'];

    $sql_opcion2= "UPDATE `opciones` SET `descripcion` = '$opcion2' WHERE `opciones`.`id_opciones` = '$id_opcion2'";
    $resultado_opcion2= mysqli_Query($conex, $sql_opcion2);
}

if( isset($_POST['id_opcion3']) || isset($_POST['opcion_3']))
{
    $id_opcion3= $_POST['id_opcion3'];
    $opcion3= $_POST['opcion_3'];

    $sql_opcion3= "UPDATE `opciones` SET `descripcion` = '$opcion3' WHERE `opciones`.`id_opciones` = '$id_opcion3'";
    $resultado_opcion3= mysqli_Query($conex, $sql_opcion3);
}

if( isset($_POST['opcion_4']) || isset($_POST['id_opcion4']))
{
    $id_opcion4= $_POST['id_opcion4'];
    $opcion4= $_POST['opcion_4'];
    $sql_opcion4= "UPDATE `opciones` SET `descripcion` = '$opcion4' WHERE `opciones`.`id_opciones` = '$id_opcion4'";
    $resultado_opcion4= mysqli_Query($conex, $sql_opcion4);
}

if( isset($_POST['opcion_5']) || isset($_POST['id_opcion5']))
{
    $id_opcion5= $_POST['id_opcion5'];
    $opcion5= $_POST['opcion_5'];
    $sql_opcion5= "UPDATE `opciones` SET `descripcion` = '$opcion5' WHERE `opciones`.`id_opciones` = '$id_opcion5'";
    $resultado_opcion5= mysqli_Query($conex, $sql_opcion5);
}

if(isset($_POST['descripcion_texto']) || isset($_POST['id_texto']))
{
    $id_texto= $_POST['id_texto'];
    $texto= $_POST['descripcion_texto'];
    $sql_texto= "UPDATE `opciones` SET `descripcion` = '$texto' WHERE `opciones`.`id_opciones` = '$id_texto'";
    $resultado_texto= mysqli_Query($conex, $sql_texto);
}
mysqli_close($conex);
?>
<!-- <script>
window.location="../listaEncuestas.php";
</script> -->