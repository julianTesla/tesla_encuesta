<?php
include "parte_superior.php";
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form id="crear_encuesta" action="back/guardar_encuesta.php" method="POST">
                    <h6 class="mb-3">Encuesta:</h6>
                    <input name="nombre_encuesta" type="Text" class="form-control mb-3" placeholder="Nombre de encuesta" required>

                    <?php
                    if (isset($_GET['errorExiste'])) {
                        $error = $_GET['errorExiste'];
                        if ($error == "yes") {
                            echo '<div id="errorExiste">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>Ya existe una encuesta con ese nombre
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                        }
                    }
                    ?>

                    <button type="submit" class="btn btn-primary">Crear</button>
                    <!-- <button type="submit" class="btn btn-primary mt-3" onclick="crear_encuesta();">Crear</button> -->
                </form>



            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    function crear_encuesta(){
        event.preventDefault();
        var nombre_encuesta = document.getElementById('nombre_encuesta').value;
        $.ajax({
            type: 'POST',
            url: 'back/guardar_encuesta.php',
            data: {
                "nombre_encuesta": nombre_encuesta
            },
            success: function(e) {
                $('#errorExiste').html(e);
            }
        });
    }
</script> -->
<script>
    let html ='<a href="Crear_encuesta.php" class="nav-item nav-link active"><i class="far fa-file-alt me-2"></i>Crear encuesta</a>'+
                '<a href="asignarEncuesta.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Asignar encuesta</a>'+
                '<a href="listaEncuestas.php" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Lista de encuestas</a>'+
                '<a href="resultados.php" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>Resultados</a>'+
                '<a href="comentarios.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Comentarios</a>';
                    document.getElementById("activos").innerHTML = html;
</script>

<?php
include "parte_inferior.php";
?>