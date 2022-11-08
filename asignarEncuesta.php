<?php
include "parte_superior.php";
include "conexion/conex.php";
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form id= "asignar_encuesta">
                    <h6 class="mb-3">Asignar encuesta</h6>

                    <!-- SELECT ENCUESTAS -->
                    <select name="encuesta_id" class="form-select mb-3" id="encuesta_id" >
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
                    <select name="curso_id" class="form-select mb-3" id="curso_id" >
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
                    <button class="btn btn-primary mt-3" onclick="enviar_encuesta();">Enviar encuesta</button>
                </form><br>
                   <div id="respuesta"></div>
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ¡Encuesta enviada correctamente!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function enviar_encuesta() {
        event.preventDefault();
        var curso_id=  document.getElementById('curso_id').value;
        var encuesta_id= document.getElementById('encuesta_id').value;
        $.ajax({
            type: 'POST',
            url: 'back/asignar_encuesta.php',
            data: {"curso_id": curso_id ,"encuesta_id":encuesta_id},
            success: function(r) {
                $('#respuesta').html(r);
            }
        });
    }
</script>


<?php
include "parte_inferior.php";
?>