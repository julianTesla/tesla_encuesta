<?php
include "parte_superior.php";
?>

<!-- INICIO BARRA DE FILTRO -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">

            <form action="">
                <label>Seleccionar curso</label>
                <select class="form-select">
                    <option value="1">Electricista</option>
                    <option value="2">Aire</option>
                    <option value="3">Excel</option>
                </select>
            </form>

            <form action="">
                <label>Seleccionar encuesta</label>
                <select class="form-select">
                    <option value="1">Encuesta 1</option>
                    <option value="2">Encuesta 2</option>
                    <option value="3">Encuesta 3</option>
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

        </div>
    </div>
</div>
<!-- FIN BARRA DE FILTRO -->


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Testimonial</h6>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                        <h5 class="mb-1">Client Name</h5>
                        <p>Profession</p>
                        <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                        <h5 class="mb-1">Client Name</h5>
                        <p>Profession</p>
                        <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "parte_inferior.php";
?>