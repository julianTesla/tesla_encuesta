<?php
include "../conexion/conex.php";

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

$encuesta_id= $_POST['id_encuesta'];
$curso_id= $_POST['id_curso'];
$usuer_id= $_POST['id_alumno'];
$nombre_curso= $_POST['nombre_curso'];

//Comprobar que no se repita el curso guardado
$sql_curso="SELECT * FROM cursos WHERE cursos.id_curso = '$curso_id'";
$resultado_curso= mysqli_query($conex, $sql_curso);

if(mysqli_num_rows($resultado_curso) > 0){   
}else
{
    $sql_curso1= "INSERT INTO `cursos` (`id_curso`, `nombre_curso`) VALUES ('$curso_id', '$nombre_curso')";
    $resultado_curso1=mysqli_query($conex, $sql_curso1);
}


$sqlb="SELECT * FROM respondio WHERE respondio.curso_id = '$curso_id' AND respondio.id_alumno = $usuer_id AND respondio.encuesta_id = '$encuesta_id'";
$resultadob= mysqli_query($conex, $sqlb);
////pregunta si el alumno ya respondio
if(mysqli_num_rows($resultadob) > 0)
{}else{
    $sql1a="INSERT INTO `respondio` (`curso_id`, `id_alumno`, `encuesta_id`)
    VALUES ('$curso_id', '$usuer_id', '$encuesta_id')"; 
    $resultado1a= mysqli_query($conex, $sql1a);

//--------------------------------------------------------------- //
    if (isset($_POST['respuesta1'])) 
    {
        $fecha = date('Y-m-d', time());
        $respuesta_1 = $_POST['respuesta1'];
        $id_pregunta1= $_POST['id_pregunta1'];
        $opcion= intval($respuesta_1);

            $sql1 ="INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                    VALUES ('$encuesta_id', '$curso_id',  0, '$respuesta_1', '$fecha', '$id_pregunta1', '$opcion')";
            $resultado1 = mysqli_query($conex, $sql1);
    }
    //-------------------------------------------------------//

    if (isset($_POST['respuesta2'])) {
        $fecha = date('Y-m-d', time());
        $respuesta_2 = $_POST['respuesta2'];
        $id_pregunta2= $_POST['id_pregunta2'];
        $opcion= intval($respuesta_2);

        $sql2 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                VALUES ('$encuesta_id', '$curso_id',  0, '$respuesta_2', '$fecha', '$id_pregunta2', '$opcion')";
        $resultado2 = mysqli_query($conex, $sql2);
    }
//--------------------------------------------------------------//

    if (isset($_POST['respuesta3'])) {
        $fecha = date('Y-m-d', time());
        $respuesta_3 = $_POST['respuesta3'];
        $id_pregunta3= $_POST['id_pregunta3'];
        $opcion= intval($respuesta_3);

        $sql3 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                 VALUES ('$encuesta_id', '$curso_id',  0, '$respuesta_3', '$fecha', '$id_pregunta3', '$opcion')";
        $resultado3 = mysqli_query($conex, $sql3);
    }
//--------------------------------------------------------------------------//

    if (isset($_POST['respuesta4'])) {
        $fecha = date('Y-m-d', time());
        $respuesta_4 = $_POST['respuesta4'];
        $id_pregunta4= $_POST['id_pregunta4'];
        $opcion= intval($respuesta_4);

        $sql4 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                 VALUES ('$encuesta_id', '$curso_id',  0, '$respuesta_4', '$fecha', '$id_pregunta4', '$opcion')";
        $resultado4 = mysqli_query($conex, $sql4);   
    }
//-------------------------------------------------------------//

    if (isset($_POST['respuesta5'])) {
        $fecha = date('Y-m-d', time());
        $respuesta_5 = $_POST['respuesta5'];
        $id_pregunta5= $_POST['id_pregunta5'];
        $opcion= intval($respuesta_5);
        
        $sql5 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                 VALUES ('$encuesta_id', '$curso_id', 0,  '$respuesta_5','$fecha', '$id_pregunta5', '$opcion')";
        $resultado5 = mysqli_query($conex, $sql5);
    }
    //---------------------------------------------------------------------//

    if (isset($_POST['texto1'])){

        $fecha = date('Y-m-d', time());
        $texto1 = $_POST['texto1'];
        $id_pregunta1= $_POST['id_pregunta1'];
        $id_opcion1= $_POST['id_opcion1'];
        if($texto1 != false)
        {
            $sql_texto1 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                           VALUES ('$encuesta_id', '$curso_id', '$texto1', 0, '$fecha', '$id_pregunta1', '$id_opcion1')";
            $resultado_texto1 = mysqli_query($conex, $sql_texto1);
        }
    }

    if (isset($_POST['texto2'])) {

        $fecha = date('Y-m-d', time());
        $texto2 = $_POST['texto2'];
        $id_pregunta2= $_POST['id_pregunta2'];
        $id_opcion2= $_POST['id_opcion2'];
        if($texto2 != false)
        {
        $sql_texto2 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                       VALUES ('$encuesta_id', '$curso_id', '$texto2', 0, '$fecha', '$id_pregunta2', '$id_opcion2')";
        $resultado_texto2 = mysqli_query($conex, $sql_texto2);
        }
    }

    if (isset($_POST['texto3'])) {
        $fecha = date('Y-m-d', time());
        $texto3 = $_POST['texto3'];
        $id_pregunta3= $_POST['id_pregunta3'];
        $id_opcion3= $_POST['id_opcion3'];
        if($texto3 != false)
        {
        $sql_texto3 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                       VALUES ('$encuesta_id', '$curso_id', '$texto3', 0, '$fecha', '$id_pregunta3', '$id_opcion3')";
        $resultado_texto3 = mysqli_query($conex, $sql_texto3);
        }
    }

    if (isset($_POST['texto4'])) {
        $fecha = date('Y-m-d', time());
        $texto4 = $_POST['texto4'];
        $id_pregunta4= $_POST['id_pregunta4'];
        $id_opcion4= $_POST['id_opcion4'];
        if($texto4 != false)
        {
        $sql_texto4 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                       VALUES ('$encuesta_id', '$curso_id', '$texto4',  0, '$fecha', '$id_pregunta4', '$id_opcion4')";
        $resultado_texto4 = mysqli_query($conex, $sql_texto4);
        }
    }

    if (isset($_POST['texto5'])) {
        $fecha = date('Y-m-d', time());
        $texto5 = $_POST['texto5'];
        $id_pregunta5= $_POST['id_pregunta5'];
        $id_opcion5= $_POST['id_opcion5'];
        if($texto5 != false)
        {
        $sql_texto5 = "INSERT INTO `resultados` (`resultado_encuesta_id`, `resultado_curso_id`, `respuesta_text`, `respuesta_multiplechoice`, `fecha`, `pregunta_id`, `opcion_id`) 
                       VALUES ('$encuesta_id', '$curso_id', '$texto5', 0, '$fecha', '$id_pregunta5', '$id_opcion5')";
        $resultado_texto5 = mysqli_query($conex, $sql_texto5);
        }
    }
    mysqli_close($conex);
}
?>



<!-- HTML AGRADECIMIENTO RESPUESTA  -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Encuesta</title>
</head>

<body>
    <div class="mx-0 mx-sm-auto">
        <div class="card">
            <div class="card-header p-0" style="background-color:#303030">
                <h5 class="card-title text-white mt-2 text-center" id="exampleModalLabel">
                    <img src="../popup/TESLA_LogoBlanco.png" class="logo m-2" style="width: 150px">
                </h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="far fa-file-alt fa-4x text-primary"></i>
                    <h3 class="m-4">
                        <strong>??Gracias por ayudarnos a seguir creciendo!</strong>
                    </h3>
                    <img src="../popup/comprobado.png" width="80px" alt="Check">
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
</body>

</html>