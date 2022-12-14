<?php
include "parte_superior.php";
include "conexion/conex.php";
?>

<div class="container-fluid pt-4 px-4">

    <!-- INICIO ASIGNAR ENCUESTA -->

    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-3">Asignar encuesta</h6>

        <!-- SELECT ENCUESTAS -->
        <select name="encuesta_id" class="form-select mb-3" id="encuesta_id" onchange="asignar_encuesta();">
        <?php
        $sqlA= "SELECT id_encuesta, nombre_encuesta FROM encuestas WHERE encuestas.id_encuesta";
        ?>
            <option value="0">Seleccionar encuesta</option>
            <?php
            //TRAEMOS LAS ENCUESTAS DISPONIBLES DE LA BASE DE DATOS
            $sql = "SELECT id_encuesta, nombre_encuesta FROM encuestas";
            $resultado = mysqli_Query($conex, $sql);
            while ($row = mysqli_fetch_array($resultado)) {
                if(isset($_GET['id_encuesta']))
                {
                    if($row[0] == $_GET['id_encuesta'])
                    {
                        echo '<option selected value="' .$row[0]. '">' . $row[1] . '</option>';
                    }
                }
                else
                {
                echo '<option value="' .$row[0]. '">' . $row[1] . '</option>';
                }
            }
            ?>
        </select>
        <!-- FIN SELECT ENCUESTAS -->
    
        <!-- INICIO CODIGO -->

        <div class="d-flex align-items-center justify-content-between mb-2">

            <h6>Código a copiar:</h6>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <button class="btn btn-info" onclick="copyToClipBoard()">Copiar
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-window-plus" viewBox="0 0 16 16">
                    <path d="M2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM4 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z" />
                    <path d="M0 4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V7H1v5a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2V4Zm1 2h13V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2Z" />
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                </svg></button>
        </div>

        <div id="respuesta">
        <?php
        if(isset($_GET['id_encuesta']))
        {
            $id_encuesta = $_GET['id_encuesta'];
            ?>
            <textarea id="p1" class="form-control" style="height: 30rem; background: black" disabled>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Bootstrap -->

<script>
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var id_curso = urlParams.get('id');
    var userid = document.getElementById("nav-notification-popover-container").getAttribute("data-userid");

    var direccion = "https://encuestas.institutotesla.ar/back/pregunta_existe.php?ID=<?php echo $id_encuesta;?>&user=" + userid + "&id=" + id_curso + "";

    $.ajax({
        type: 'GET',
        url: direccion,
        success: function(mensaje) {
            console.log(mensaje);
            if (mensaje != 1) {
                $("#encuesta").modal("show");
            }
        }
    });
</script>

<!-- Modal -->
<div class="modal fade" id="encuesta" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>

            </div>
            <div class="modal-body">
                <div id="contenido"></div>

                <!-- Script para la extracccion de los datos de las pantallas -->
                <script>
                    var queryString = window.location.search;
                    var urlParams = new URLSearchParams(queryString);
                    var id_curso = urlParams.get('id');
                    var userid = document.getElementById("nav-notification-popover-container").getAttribute("data-userid");
                    var nombre_curso = document.title.slice(7);

                    let html = '<iframe style=" width: 100%; height: 400px;" src="https://encuestas.institutotesla.ar/popup/encuesta2.php?ID=<?php echo $id_encuesta; ?>&user=' + userid + '&curso=' + nombre_curso + '&id=' + id_curso + '" frameborder="0"></iframe>';
                    document.getElementById("contenido").innerHTML = html;
                </script>

            </div>
        </div>
    </div>
</div>


</textarea>
        <?php
        }
        ?>

        </div>

        <!-- FIN CODIGO -->

    </div>
</div>
<!-- FIN ASIGNAR ENCUESTA -->


<!-- Funcionamiento boton "Copiar" -->
<script>
    function copyToClipBoard() {
        var content = document.getElementById('p1');
        content.select();
        document.execCommand('copy');
    }
</script>


<script type="text/javascript">
    //script para hacer el buscado de encuestas
    function asignar_encuesta() {

        
        var direccion= "back/devolver_url.php";
        $.ajax({
            type: 'POST',
            url: direccion,
            data: "encuestas=" + $('#encuesta_id').val(),
            success: function(mensaje) {
                $('#respuesta').html(mensaje);
                console.log(mensaje);
            }
        });
    }
</script>
<script>
    let html ='<a href="Crear_encuesta.php" class="nav-item nav-link "><i class="far fa-file-alt me-2"></i>Crear encuesta</a>'+
                '<a href="asignarEncuesta.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Asignar encuesta</a>'+
                '<a href="listaEncuestas.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Lista de encuestas</a>'+
                '<a href="resultados.php" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>Resultados</a>'+
                '<a href="comentarios.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Comentarios</a>';
                    document.getElementById("activos").innerHTML = html;
</script>


<?php
include "parte_inferior.php";
?>