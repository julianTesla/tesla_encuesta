<?php
include('C:\xampp\htdocs\tesla_encuesta\conexion\conex.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Encuesta</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">


                <form action="/" method="POST">


                    <?php

                    //$id_preguntas=[];
                    //$preguntas=[];     
                    // $respuestas=[];



                    //sentencias SQL
                    $sql = "SELECT * FROM preguntas ";


                    $result = mysqli_query($conex, $sql);

                    // output data of each row
                    if (mysqli_num_rows($result) > 0) {
                        //busqueda de la  pregunta
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "<label>" .$row['id_pregunta']. "</label>"; 
                            echo "<label>" . $row['nombre_pregunta'] . "</label>";
                            echo "<br>";
                            $pregunta = $row['id_pregunta'];
                            $tipoP = $row["tipo_pregunta_id"];

                            //repetir busqueda de las preguntas
                            if ($tipoP == 1) {


                                $sql1 = "SELECT id_opciones, descripcion FROM opciones WHERE pregunta_id =" . $pregunta;
                                $result1 = mysqli_query($conex, $sql1);
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    echo "<input type='radio' name=" . $pregunta . " value=" . $row1['descripcion'] . ">";
                                    echo "<label>" . $row1['descripcion'] . "</label>";

                                    echo "<br>";
                                }
                            }
                            if ($tipoP == 2) {

                                echo "<div class='mb-3'>";
                                echo "<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>";
                                echo "<div id='emailHelp' class='form-text'>Observaciones</div>";
                                echo "</div>";
                            }

                            //  }



                            // echo "id: " . $row["id_pregunta"]. " - pregunta: " . $row["Nombre_pregunta"]. " - respuestas: " . $row["respuesta"]. "<br>";
                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($conex);
                    ?>


                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>




</body>

</html>