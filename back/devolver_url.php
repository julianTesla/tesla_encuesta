<?php
$id_encuesta = $_POST['encuestas'];
$id_encuesta;
?>
<textarea id="p1" class="form-control" style="height: 30rem">

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
