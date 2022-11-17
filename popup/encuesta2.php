<?php
include "../conexion/conex.php";

$id_encuesta = $_GET['ID'];
$id_curso= $_GET['id'];
$id_alumno= $_GET['user'];
$nombre_curso=$_GET['curso'];

$sql =  "SELECT id_encuesta, nombre_encuesta FROM encuestas WHERE encuestas.id_encuesta = '$id_encuesta' ";
$resultado =  mysqli_query($conex, $sql);
while ($row = mysqli_fetch_array($resultado)) {
    $nombre_encuesta = $row[1];
}

$sql2 = "SELECT encuesta_id, id_pregunta, nombre_pregunta, tipo, tipo_pregunta_id 
    FROM encuestas,preguntas,tipos_preguntas WHERE encuestas.id_encuesta = '$id_encuesta' 
    AND encuestas.id_encuesta = preguntas.encuesta_id 
    AND preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta";
$resultado2 = mysqli_Query($conex, $sql2);
?>
<!DOCTYPE html>
<html lang="en">

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
                    <img src="TESLA_LogoBlanco.png" class="logo m-2" style="width: 170px">
                </h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="far fa-file-alt fa-4x text-primary"></i>
                    <p class="mt-2 p-2 m-0">
                        <strong>¡Tu opinión nos importa! </strong>
                    </p>
                    <p class="p-2 m-0">
                        Te invitamos a responder una breve encuesta, te llevará menos de 1 minuto.
                    </p>
                </div>

                <hr />

                <form class="px-4" action="../back/guardar_formualrio.php" method="POST">

                    <div style="visibility: visible; position:relative;">
                            <input type="int" name="id_curso" value="<?php echo $id_curso; ?>">
                            <input type="int" name="id_encuesta" value="<?php echo $id_encuesta; ?>">
                            <input type="int" name="id_alumno" value="<?php echo $id_alumno; ?>">
                            <input type="int" name="nombre" value="<?php echo $nombre_curso; ?>">
                    </div>

                    <?php

                    $cont=1;
                    while ($row2 = mysqli_fetch_array($resultado2)) //Bucle para mostrar las preguntas
                    {
                    ?>
                        <p class="text-center mb-2"><strong><?php echo $row2['nombre_pregunta'] ?></strong></p>
                    <?php
                        if ($row2['tipo_pregunta_id'] == 1) {
                            $sql3 = "SELECT pregunta_id, descripcion, id_opciones 
                        FROM preguntas, tipos_preguntas,encuestas,opciones 
                        WHERE preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
                        AND encuestas.id_encuesta = preguntas.encuesta_id 
                        AND preguntas.id_pregunta = opciones.pregunta_id ORDER BY id_opciones";
                            $resultado3 = mysqli_query($conex, $sql3);
                            while ($row3 = mysqli_fetch_array($resultado3)) //Bucle para mostrar las opciones de las preguntas
                            {
                                if ($row2['id_pregunta'] == $row3['pregunta_id']) {
                                    echo '<div class="form-check d-flex justify-content-center p-0">
                                <input class="form-check-input m-2" type="radio" name="respuesta'.$cont.'" value="' . $row3['descripcion'] . '" >
                                <label class="form-check-label m-1" for="radio3Example1">
                                ' . $row3['descripcion'] . '
                                </label>
                            </div>';
                                }
                            }
                        } elseif ($row2['tipo_pregunta_id'] == 2) {
                            $sql3 = "SELECT pregunta_id, descripcion, id_opciones 
                        FROM preguntas, tipos_preguntas,encuestas,opciones 
                        WHERE preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
                        AND encuestas.id_encuesta = preguntas.encuesta_id 
                        AND preguntas.id_pregunta = opciones.pregunta_id ORDER BY id_opciones";
                            $resultado3 = mysqli_query($conex, $sql3);
                            while ($row3 = mysqli_fetch_array($resultado3)) {
                                if ($row2['id_pregunta'] == $row3['pregunta_id']) {
                                    echo '<div class="form-outline mb-4">
                                    <textarea class="form-control" name="texto'.$cont.'" rows="4" placeholder="' . $row3['descripcion'] . '"></textarea>
                                    <label class="form-label" for="form4Example3" style="color:#808488">Opcional</label>
                                </div>';
                                }
                            }
                        }
                        $cont++;
                    }
                    mysqli_close($conex);
                    ?>
                    <div class="card-footer">
                        <button type="submit" class="btn w-100" style="background-color:#bb0112; color:white">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>