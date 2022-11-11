<?php
include "parte_superior.php";

include "conexion/conex.php";
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-2">
        <div class="d-flex align-items-center justify-content-around m-2">

            <!-- SELECTOR Y BUSCADOR ENCUESTA -->

            <!-- SELECTOR HARCODEADO -->
            <!-- <form action="/" method="POST">
                <select name="encuesta" class="form-select" id="encuesta">
                    <option value="">Seleccionar encuesta</option> 
                </select>
            </form>-->

            <select style="width: 80%;" name="encuesta" class="js-example-basic-single" id="buscar_encuesta" onchange="buscar_encuesta();" data-show-subtext="true" data-live-search="true">
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
            <!-- FIN SELECTOR ENCUESTA -->



            <!-- BOTON CREAR ENCUESTA -->
            <form action="./Crear_encuesta.php" method="" class="m-4"><button type="submit" href="#" class="btn btn-primary d-flex align-items-center justify-content-between p-2" style="width: 160px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z" />
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                    </svg>Nueva encuesta</button></form>

        </div>
    </div>
</div>

<?php
$sql2 = "SELECT id_encuesta, nombre_encuesta FROM encuestas ORDER BY id_encuesta DESC ";
$resultado2 = mysqli_Query($conex, $sql2);

while ($row2 = mysqli_fetch_array($resultado2)) {
    $sql3 = "SELECT encuesta_id, id_pregunta, nombre_pregunta, tipo 
    FROM preguntas, tipos_preguntas,encuestas WHERE preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
    AND encuestas.id_encuesta = preguntas.encuesta_id ORDER BY id_pregunta";
    $resultado3 = mysqli_Query($conex, $sql3);
?>
    <!-- INICIO ENCUESTA -->
<div id="respuesta"></div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0"><?php echo $row2[1]; ?></h5>

                <!-- BOTON EDITAR ENCUESTA 
            <form action="/" method="GET">
                <button type="submit" class="btn btn-success">Editar encuesta <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>
                </button>
            </form> -->

                <!-- BOTON ASIGNAR ENCUESTA -->
                <form action="./asignarEncuesta.php" method="GET">
                    <button type="submit" class="btn btn-info m-2 align-items-center">Asignar a un curso
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </button>
                </form>

            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Pregunta</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Respuestas</th>
                            <th scope="col">Corregir pregunta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row3 = mysqli_fetch_array($resultado3)) {
                            if ($row2[0] == $row3[0]) {
                                $contador = 1;
                                $sql4 = "SELECT pregunta_id, descripcion 
                            FROM preguntas, tipos_preguntas,encuestas,opciones 
                            WHERE preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
                            AND encuestas.id_encuesta = preguntas.encuesta_id 
                            AND preguntas.id_pregunta = opciones.pregunta_id ORDER BY id_opciones";
                                $resultado4 = mysqli_Query($conex, $sql4);
                                echo  '<tr>
                        <td>' . $row3[2] . '</td>
                        <td>' . $row3[3] . '</td>
                        <td>';
                                while ($row4 = mysqli_fetch_array($resultado4)) {
                                    $id_pregunta = $row4[0];
                                    if ($row4[0] == $row3[1]) {
                                        echo $contador . '-' . $row4[1] . '<br>';
                                        $contador++;
                                    }
                                }

                                echo  '</td>
                        <td>
                        <button class="btn btn-success">
                        <a href="modificar_preguntas.php?id_encuesta=' . $row2[0] . '&id_pregunta=' . $row3[1] . '" class="btn btn-success p-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg> Editar</a>
                        </button> </td>
                    </tr>';
                            }
                        }
                        ?>                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FIN ENCUESTA -->
<?php
}
?>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            style:'form-control'
        });
        $(".js-example-basic-single").select2({ width: "60%" });
    });
</script>

<script type="text/javascript">
    //script para hacer el buscado de encuestas
    function buscar_encuesta() {
        $.ajax({
            type: 'POST',
            url: 'back/buscar_encuesta.php',
            data: "encuestas=" + $('#buscar_encuesta').val(),
            success: function(mensaje) {
                $('#respuesta').html(mensaje);
            }
        });
    }
</script>


<?php
mysqli_close($conex);
include "parte_inferior.php";
?>