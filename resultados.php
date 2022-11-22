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

        <!-- INICIO CONTENEDOR ENCUESTA -->
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" id=encuesta>
                <div class="bg-secondary text-center rounded p-4">
                    <h2>Encuesta N° 1</h2>
                </div>

                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Cómo evaluarías el contenido del curso?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Cómo evaluarías al profesor?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">5%</div>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Que te pareció la limpieza edilicia?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN CONTENEDOR ENCUESTA -->

        <!-- INICIO CONTENEDOR ENCUESTA -->
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" id=encuesta>
                <div class="bg-secondary text-center rounded p-4">
                    <h2>Encuesta N° 2</h2>
                </div>

                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Pregunta 1?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Pregunta 2?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Pregunta 3?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN CONTENEDOR ENCUESTA -->

        <!-- INICIO CONTENEDOR ENCUESTA -->
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" id=encuesta>
                <div class="bg-secondary text-center rounded p-4">
                    <h2>Encuesta N° 3</h2>
                </div>

                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Pregunta 1?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Pregunta 2?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary text-center rounded p-4">
                    <h5 style="color:red">¿Pregunta 3?</h5>

                    <h6>Bueno</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>

                    <h6>Regular</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                        </div>
                    </div>

                    <h6>Malo</h6>
                    <div class="pg-bar mb-3">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN CONTENEDOR ENCUESTA -->


        <!-- <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4" id=encuesta>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h1>Encuesta 2</h1>
                </div>
            </div>
        </div> -->


        <!-- INICIO PREVIEW COMENTARIOS -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0">Comentarios/Sugerencias</h4>
                    <a href="/tesla_encuesta/comentarios.php" class="btn btn-link rounded-pill m-2">Ver todos</a>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="owl-carousel testimonial-carousel">

                        <!-- <div class="testimonial-item text-center">
                            <h5 class="mb-1">Alumno #1</h5>
                            <h6 class="text-primary">Encuesta 1</h6>
                            <p>24/10/2022</p>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
                        </div> -->

                        <!-- INICIO TESTIMONIO -->
                        <div class="testimonial-item text-center">
                            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                                <h6 class="m-2" style="color:red">Alumno #1</h6>
                                <h6 class="m-2">Encuesta 1</h6>
                                <h6 class="m-2">Electricista</h6>
                                <h6 class="m-2">31/10/2022</h6>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
                        </div>
                        <!-- FIN TESTIMONIO -->

                        <!-- INICIO TESTIMONIO -->
                        <div class="testimonial-item text-center">
                            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                                <h6 class="m-2" style="color:red">Alumno #2</h6>
                                <h6 class="m-2">Encuesta 1</h6>
                                <h6 class="m-2">Gasista</h6>
                                <h6 class="m-2">27/10/2022</h6>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
                        </div>
                        <!-- FIN TESTIMONIO -->

                        <!-- INICIO TESTIMONIO -->
                        <div class="testimonial-item text-center">
                            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                                <h6 class="m-2" style="color:red">Alumno #4</h6>
                                <h6 class="m-2">Encuesta 3</h6>
                                <h6 class="m-2">Electricista</h6>
                                <h6 class="m-2">24/10/2022</h6>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
                        </div>
                        <!-- FIN TESTIMONIO -->

                        <!-- INICIO TESTIMONIO -->
                        <div class="testimonial-item text-center">
                            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                                <h6 class="m-2" style="color:red">Alumno #7</h6>
                                <h6 class="m-2">Encuesta 3</h6>
                                <h6 class="m-2">Excel</h6>
                                <h6 class="m-2">22/10/2022</h6>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
                        </div>
                        <!-- FIN TESTIMONIO -->

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