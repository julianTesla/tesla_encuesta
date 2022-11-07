<?php
include "parte_superior.php";
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="back/guardar_encuesta.php" method="POST">
                    <h6 class="mb-3">Encuesta:</h6>
                    <input name="encuesta" type="Text" class="form-control" placeholder="Nombre de encuesta" required>
                    <input type="submit" class="btn btn-primary mt-3" value="Crear">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "parte_inferior.php";
?>