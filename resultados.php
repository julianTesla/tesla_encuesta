<?php
include "parte_superior.php";
include "conexion/conex.php";

$sql = "SELECT id_curso, nombre_curso FROM cursos ";
$resultado = mysqli_query($conex, $sql);

$sql1 = "SELECT id_encuesta, nombre_encuesta FROM encuestas ORDER BY encuestas.id_encuesta DESC";
$resultado1 = mysqli_query($conex, $sql1);
?>

<!-- INICIO BARRA DE FILTRO -->

<div class="container-fluid pt-4 px-4">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i> ¡Pantalla en construcción!
    </div>
    <div class="bg-secondary rounded h-100 p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">

            <form action="">
                <!-- <label>Seleccionar curso</label> -->
                <select class="form-select js-example-basic-single" style="width: 110%;">
                    <option value="0">Seleccionar curso</option>
                    <?php
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                    }
                    ?>
                </select>
            </form>

            <form action="">
                <!-- <label>Seleccionar encuesta</label> -->
                <select class="form-select js-example-basic-single" style="width: 110%;">
                    <option value="0">Seleccionar encuesta</option>
                    <?php
                    while ($row1 = mysqli_fetch_array($resultado1)) {
                        echo '<option value="' . $row1[0] . '">' . $row1[1] . '</option>';
                    }
                    ?>
                </select>
            </form>

            <div class="form-item">
                <label>Fecha desde</label>
                <input class="input-sm form-control" type=date style="background-color:red; color:white">
            </div>
            <div class="form-item">
                <label>Fecha hasta</label>
                <input class="input-sm form-control" type=date style="background-color:red; color:white">
            </div>

            <button class="btn btn-primary m-2">Buscar</button>

        </div>
    </div>
</div>
<!-- FIN BARRA DE FILTRO -->


<!-- INICIO RESULTADOS -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">


<?php
/*Consultas sql para traer los datos de los datos de las encuestas, preguntas, opciones */
$sqlENC= "SELECT * FROM encuestas ";
$resultadoENC= mysqli_Query($conex,$sqlENC);

while($rowENC= mysqli_fetch_array($resultadoENC))
{
       echo '<!-- INICIO CONTENEDOR ENCUESTA -->
       <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" id=encuesta>

                <div class="bg-secondary text-center rounded p-4">
                    <h2>'.$rowENC['nombre_encuesta'].'</h2>
                </div>';
                

$sqlPRE= "SELECT id_pregunta, encuesta_id, nombre_pregunta, tipo_pregunta_id 
FROM preguntas WHERE tipo_pregunta_id = 1";
$resultadoPRE= mysqli_query($conex, $sqlPRE);
            while($rowPRE= mysqli_fetch_array($resultadoPRE))
            {
                if($rowPRE['encuesta_id'] == $rowENC['id_encuesta'])
                {
                echo'<div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">'.$rowPRE['nombre_pregunta'].'</h5>';


$sqlOPC= "SELECT descripcion, pregunta_id FROM opciones";
$resultadoOPC= mysqli_Query($conex, $sqlOPC);
                    while($rowOPC= mysqli_fetch_array($resultadoOPC))
                    {
                        if($rowPRE['id_pregunta'] == $rowOPC['pregunta_id'])
                        {
                        echo'<h6>'.$rowOPC['descripcion'].'</h6>
                        <div class="pg-bar mb-3">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">86%</div>
                            </div>
                        </div>';
                        }
                    }

                echo '</div>';
                }
            }
           echo ' </div>
        </div>
        <!-- FIN CONTENEDOR ENCUESTA -->';
}
?>
       


        <!-- <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" id=encuesta>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h1>Encuesta 2</h1>
                </div>
            </div>
        </div> -->


<?php
$sql3 = "SELECT nombre_encuesta, nombre_curso, nombre_pregunta, fecha, respuesta_text 
FROM encuestas, cursos, preguntas, resultados 
WHERE encuestas.id_encuesta = resultados.resultado_encuesta_id 
AND preguntas.id_pregunta = resultados.pregunta_id 
AND resultados.resultado_curso_id = cursos.id_curso 
AND resultados.respuesta_text != '0'
ORDER BY id_resultado DESC LIMIT 5";

$resultado3 = mysqli_Query($conex, $sql3);
?>

        <!-- INICIO PREVIEW COMENTARIOS -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0">Comentarios/Sugerencias</h4>
                    <a href="comentarios.php" class="btn btn-link rounded-pill m-2">Ver todos</a>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="owl-carousel testimonial-carousel">

                        <?php
                        while ($row2 = mysqli_fetch_array($resultado3)) {
                            echo '
                            <!-- INICIO TESTIMONIO -->
                        <div class="testimonial-item text-center">
                            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                            <h6 class="m-2">Encuesta: ' . $row2[0] . '</h6>
                            <h6 class="m-2">Curso: '.$row2[1].'</h6>
                            <h6 class="m-2">Pregunta: '.$row2[2].'</h6>
                            <h6 class="m-2">'.$row2[3].'</h6>
                            </div>
                            <p class="mb-0">'.$row2[4].'</p>
                        </div>
                        <!-- FIN TESTIMONIO -->
                            ';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- FIN PREVIEW COMENTARIOS -->


    </div>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            style: 'form-control'
        });
    });
</script>
<?php
include "parte_inferior.php";
?>