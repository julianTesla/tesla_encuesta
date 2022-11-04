<?php
include "parte_superior.php";
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form action="/" method="POST">
                    <h6 class="mb-3">Asignar encuesta</h6>
                    <select class="form-select mb-3" aria-label="Seleccione ">
                        <option selected="encuesta">Seleccione encuesta</option>
                        <option value="1">Encuesta 1</option>
                        <option value="2">Encuesta 2</option>
                        <option value="3">Encuesta 3</option>
                    </select>
                    <select class="form-select mb-3" aria-label="Seleccione ">
                        <option selected="encuesta">Seleccione curso</option>
                        <option value="1">Electricista</option>
                        <option value="2">Gasista</option>
                        <option value="3">Excel</option>
                    </select>

                    <input type="submit" class="btn btn-primary mt-3" value="Enviar encuesta">
                </form><br>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ¡Encuesta enviada correctamente!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
</div>



<?php
include "parte_inferior.php";
?>