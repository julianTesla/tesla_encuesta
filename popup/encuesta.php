<?php
include "../conexion/conex.php";

//Cokie al ingresar al formulario                         
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Encuesta</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>






    <!-- inicio de contenedor -->











    <div class="top-content">
        <div class="container">

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    <form role="form" action='./../enviado.php' method="POST" class="f1">


                        <h3 style=" color: black;">¡Tu opinión nos ayuda a crecer!</h3>


                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="5" style="width: 16.66%;"></div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                <p>Paso 1</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                <p>Paso 2</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                                <p>Fin</p>
                            </div>
                        </div>

                        <?php

                        $ejemplar = $_GET["ejemplar"];
                        echo ' <input style="display: none;" type="checkbox" value="' . $ejemplar . '" name="ejemplar" checked>';

                        echo '<label for="formFile" name="ejemplar" value="' . $ejemplar . '" class="form-label">' . $ejemplar . '</label>';
                        $sqlpreg = "SELECT id_pregunta,ejemplar_pregunta, nombre_pregunta, tipo_pregunta FROM preguntas WHERE ejemplar_pregunta=" . $ejemplar;


                        $resultpreg = $conn->query($sqlpreg);




                        if ($resultpreg->num_rows > 0) {
                            // ejecuta consulta
                            while ($row1 = $resultpreg->fetch_assoc()) {
                                echo '<fieldset>';
                                echo ' <br>';
                                echo ' <div class="form-group">';

                                echo '<label Style="font-size: 16px;" for="formFile" class="form-label">' . $row1["nombre_pregunta"] . '</label>';
                                echo '</div>';


                                if ($row1["tipo_pregunta"] == 1) {

                                    $sqlress = "SELECT id_respuesta ,llave_pregunta, respuesta FROM respuestas  WHERE llave_pregunta =" . $row1["id_pregunta"];
                                    $resultress = $conn->query($sqlress);
                                    if ($resultress->num_rows > 0) {
                                        while ($row = $resultress->fetch_assoc()) {
                                            echo '<div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="' . $row1["id_pregunta"] . '" id="inlineRadio1"
                                    value="' . $row["id_respuesta"] . '" >
                                <label Style="font-size: 16px;" class="form-check-label" for="inlineRadio1">' . $row["respuesta"] . '</label>
                            </div>';
                                            // echo "-".$row["respuesta"]."<br>";

                                        }
                                    }
                                    echo '  <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Siguiente</button>
                                </div>';
                                    echo '  </fieldset>';
                                } else if ($row1["tipo_pregunta"] == 2) {

                                    echo ' <div class="form-floating">';
                                    echo ' <textarea  name="' . $row1["id_pregunta"] . '" class="form-control" placeholder="Escribir....."';
                                    echo ' id="floatingTextarea" style="height: 150px;"></textarea>';
                                    echo ' <label Style="font-size: 16px;" for="floatingTextarea">Escribir....</label>';
                                    echo ' </div>';

                                    echo '  <div class="f1-buttons">
                                <button type="button" class="btn btn-previous">Atrás</button>
                                <button type="button" class="btn btn-next">Siguiente</button>
                            </div>';
                                    echo '  </fieldset>';
                                } else {
                                    echo '<td>Desconocido</td>';
                                    echo '  </fieldset>';
                                }
                            }
                        }

                        ?>





                        <fieldset>
                            <label>Gracias por formar parte de la comunidad TESLA!</label>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous">Atrás</button>

                                <button type="submit" class="btn btn-submit">Enviar respuestas</button>
                            </div>

                        </fieldset>
                        <!--paso fin -->


                    </form>
                </div>
            </div>

        </div>



        <!-- fin del contenedor-->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
</body>

</html>
</body>

</html>