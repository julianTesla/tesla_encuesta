<?php
include "parte_superior.php";
include "conexion/conex.php";
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

    <!-- INICIO ASIGNAR ENCUESTA -->
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form id="asignar_encuesta">
                    <h6 class="mb-3">Asignar encuesta</h6>

                    <!-- SELECT ENCUESTAS -->
                    <select name="encuesta_id" class="form-select mb-3" id="encuesta_id" onchange="asignar_encuesta();">
                        <option value="0">Seleccionar encuesta</option>
                        <?php
                        //TRAEMOS LAS ENCUESTAS DISPONIBLES DE LA BASE DE DATOS
                        $sql = "SELECT id_encuesta, nombre_encuesta FROM encuestas";
                        $resultado = mysqli_Query($conex, $sql);
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                        }
                        ?>
                    </select>
                    <!-- FIN SELECT ENCUESTAS -->

                    <!-- SELECT CURSO -->
                    <select name="curso_id" class="form-select mb-3" id="curso_id">
                        <option value="0">Seleccionar curso</option>
                        <?php
                        //TRAEMOS LAS CURSOS DISPONIBLES DE LA BASE DE DATOS
                        $sql = "SELECT id_curso, nombre_curso FROM cursos";
                        $resultado = mysqli_Query($conex, $sql);
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                        }
                        ?>
                    </select>
                    <!-- FIN SELECT CURSO -->

                    <p class="text-warning bg-dark" style="text-align: center">
                        Una vez agregada encuesta al Aula Virtual presione
                        el siguiente botón para registrar envío:</p>
                    <button class="btn btn-primary w-100 mb-3" onclick="enviar_encuesta();">Asignar encuesta</button>
                </form>
                <div id="respuesta"></div>

            </div>
        </div>
<!-- FIN ASIGNAR ENCUESTA -->

<!-- INICIO CODIGO -->
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="form-floating">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6>Código a copiar:</h6>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <button class="btn btn-info" onclick="copyToClipboard('#p1')">Copy
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-window-plus" viewBox="0 0 16 16">
                                <path d="M2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM4 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z" />
                                <path d="M0 4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V7H1v5a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2V4Zm1 2h13V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2Z" />
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                            </svg></button>
                            <div id="respuesta"></div>
                    </div>
                    <!--inicio del codigo para copiar el popup-->
                    
                </div>
            </div>
        </div>
<!-- FIN CODIGO -->

    </div>
</div>





<script type="text/javascript">
    function enviar_encuesta() {
        event.preventDefault();
        var curso_id = document.getElementById('curso_id').value;
        var encuesta_id = document.getElementById('encuesta_id').value;
        $.ajax({
            type: 'POST',
            url: 'back/asignar_encuesta.php',
            data: {
                "curso_id": curso_id,
                "encuesta_id": encuesta_id
            },
            success: function(r) {
                $('#respuesta').html(r);
            }
        });
    }
</script>

<script type="text/javascript">
    //script para hacer el buscado de encuestas
    function asignar_encuesta() {
        $.ajax({
            type: 'POST',
            url: 'back/devolver_url.php',
            data: "encuestas=" + $('#encuesta_id').val(),
            success: function(mensaje) {
                $('#respuesta').html(mensaje);
            }
        });
    }
</script>


<?php
include "parte_inferior.php";
?>