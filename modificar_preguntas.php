<?php
include "parte_superior.php";
include "conexion/conex.php";

$id_encuesta=$_GET['id_encuesta'];
$id_pregunta=$_GET['id_pregunta'];

$sql_encuesta = "SELECT nombre_encuesta, id_encuesta FROM encuestas 
WHERE encuestas.id_encuesta = '$id_encuesta' ORDER BY id_encuesta DESC LIMIT 1;";
$resultado = mysqli_Query($conex, $sql_encuesta);
while ($row = mysqli_fetch_array($resultado)) 
{
    $grupo_id = $row[1];
    $nombre_encuesta = $row[0];

    $sql1="SELECT  id_pregunta, nombre_pregunta, tipo_pregunta_id FROM preguntas WHERE preguntas.id_pregunta = '$id_pregunta'";
    $resultado1= mysqli_query($conex,$sql1);
    while($row1= mysqli_fetch_array($resultado1))
    {
        $id_pregunta=$row1['id_pregunta'];
        $nombre_pregunta=$row1['nombre_pregunta'];
        $tipo_pregunta_id= $row1['tipo_pregunta_id'];
    }
?>

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="back/guardar_modificacion_pregunta.php" method="POST">
                        <h4> <?php echo $row[0]; }  ?> </h4>
                        <h6 class="mb-4">Ingrese la pregunta</h6>
                        <input style="position: absolute; visibility: hidden;" type="int" name="id_pregunta" value=" <?php echo $id_pregunta; ?>">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pregunta:</label>
                            <div class="col-sm-10">
                                <input name="nombre_pregunta" type="text" class="form-control" id="inputEmail3" required value="<?php echo $nombre_pregunta;?>">
                            </div>
                        </div>

                        <fieldset class="row mb-3">
                           
                            <div class="col-sm-10">
                                <?php
                                if($tipo_pregunta_id == 1)
                                {
                                    $sql2="SELECT pregunta_id, descripcion, id_opciones 
                                    FROM preguntas, tipos_preguntas,encuestas,opciones 
                                    WHERE preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
                                    AND encuestas.id_encuesta = preguntas.encuesta_id 
                                    AND preguntas.id_pregunta = opciones.pregunta_id ORDER BY id_opciones";
                                    $resultado2= mysqli_query($conex,$sql2);
                                   
                                    echo '<input class="form-check-input" type="radio" name="tipo_pregunta" id="gridRadios1" value="1" checked  style="position: absolute; visibility: hidden;">
                                    <div class="form-chek">';
                                    $cont= 1;
                                    while($row2= mysqli_fetch_array($resultado2))
                                    {
                                        if($id_pregunta == $row2[0])
                                        {
                                        echo '<label>Opcion'.$cont.':</label> <input class="form-control" type="text" name="opcion_'.$cont.'" id="descripcion'.$cont.'" value="'.$row2[1].'">';
                                        echo '<input style="position: absolute; visibility: hidden;" type="int" name="id_opcion'.$cont.'" value="'.$row2[2].'">';
                                        $cont++;
                                        }
                                    }
                                   echo '</div>';
                                }
                                elseif($tipo_pregunta_id == 2)
                                {
                                    $sql2="SELECT pregunta_id, descripcion, id_opciones 
                                    FROM preguntas, tipos_preguntas,encuestas,opciones 
                                    WHERE preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
                                    AND encuestas.id_encuesta = preguntas.encuesta_id AND preguntas.id_pregunta = opciones.pregunta_id ORDER BY id_opciones";
                                    $resultado2= mysqli_query($conex,$sql2);

                                    echo '<input class="form-check-input" type="radio" name="tipo_pregunta" id="gridRadios1" value="2" checked  style="position: absolute; visibility: hidden;">
                                    <div class="form-chek">';
                                    while($row2= mysqli_fetch_array($resultado2))
                                    {
                                        if($id_pregunta == $row2[0])
                                        {
                                      echo  '<textarea class="form-control" name="descripcion_texto" id="floatingTextarea" cols="30" rows="8" placeholder="Ingrese la marca de agua a mostrar">'.$row2[1].'</textarea>
                                      <input style="position: absolute; visibility: hidden;" type="int" name="id_texto" value="'.$row2[2].'">';
                                        }
                                    }
                                        echo '</div>';
                                }
                                ?>
                            </div>
                        </fieldset>

                        <button class="btn btn-success" type="submit">Guardar cambios</button>
                    </form>
                    <br>
                    <a href="listaEncuestas.php" class="btn btn-outline-primary w-100 m-2">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->

    <script src="js/controlador_crearPreguntas.js"></script>


    <?php
    mysqli_close($conex);
    include "parte_inferior.php";
    ?>