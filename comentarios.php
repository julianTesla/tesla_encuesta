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
                <select class="form-select js-example-basic-single" style="width: 110%;">
                    <option value="0">Seleccionar curso</option>
                    <?php
                    $sql = "SELECT id_curso, nombre_curso FROM cursos ORDER BY cursos.id_curso DESC";
                    $resultado = mysqli_query($conex, $sql);
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                    }
                    ?>
                </select>
            </form>

            <form action="">
                <select class="form-select js-example-basic-single" style="width: 110%;">
                    <option value="0">Seleccionar encuesta</option>
                    <?php
                    $sql1 = "SELECT id_encuesta, nombre_encuesta FROM encuestas ORDER BY encuestas.id_encuesta DESC ";
                    $resultado1 = mysqli_query($conex, $sql1);
                    while ($row1 = mysqli_fetch_array($resultado1)) {
                        echo '<option value="' . $row1[0] . '">' . $row1[1] . '</option>';
                    }
                    ?>
                </select>
            </form>

            <div class="form-item">
                <label>Fecha desde</label>
                <input class="input-sm form-control" type=date style="background-color:red; color:white" />
            </div>
            <div class="form-item">
                <label>Fecha hasta</label>
                <input class="input-sm form-control" type=date style="background-color:red; color:white" />
            </div>
            <div class="form-item">
                <button class="btn btn-primary m-2" style="height: 2.7rem;"> Buscar </button>
            </div>

        </div>
    </div>
</div>
<!-- FIN BARRA DE FILTRO -->


<?php
//Trae comentarios
$sql_comentarios = "SELECT * FROM `resultados` WHERE `respuesta_multiplechoice` = '0'";
$sql_resultados = mysqli_query($conex, $sql_comentarios);



?>

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">  </h6>
                <h6 class="m-2"> </h6>
                <h6 class="m-2"></h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<php?
while ($row2 = mysqli_fetch_array($resultado2)) {
    $sql3 = "SELECT encuesta_id, id_pregunta, nombre_pregunta, tipo 
    FROM preguntas, tipos_preguntas,encuestas WHERE preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
    AND encuestas.id_encuesta = preguntas.encuesta_id ORDER BY id_pregunta";
    $resultado3 = mysqli_Query($conex, $sql3);
?> 

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

<!-- INICIO COMENTARIO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="testimonial-item text-center">
            <div class="d-flex align-items-center justify-content-between mb-2" style="background-color: black; border-radius: 10px;">
                <h6 class="m-2">Encuesta 1</h6>
                <h6 class="m-2">Electricista</h6>
                <h6 class="m-2">31/10/2022</h6>
            </div>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quis earum fuga nemo sed reprehenderit! Voluptas ratione voluptates dolorum consequatur iste repudiandae voluptate, laborum, veniam, molestiae exercitationem magnam facilis aperiam.</p>
        </div>
    </div>
</div>
<!-- FIN COMENTARIO -->

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