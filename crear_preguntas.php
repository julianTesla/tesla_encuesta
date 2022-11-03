<?php
include "parte_superior.php";

include "conexion/conex.php";

$sql_encuesta= "SELECT nombre_encuesta FROM encuestas ORDER BY id_encuesta DESC LIMIT 1;";
$resultado= mysqli_Query($conex,$sql_encuesta);

while($row= mysqli_fetch_array($resultado))
{
?>
 
 <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6" >
                        <div class="bg-secondary rounded h-100 p-4">
                            <form action="parte_inferior.php">
                                <h4> <?php echo $row[0]; }?> </h4>
                                <h6 class="mb-4">Ingrese la pregunta</h6>
                                                     
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pregunta:</label>
                                    <div class="col-sm-10">
                                        <input name="pregunta" type="Text" class="form-control" id="inputEmail3" require>
                                    </div>
                                </div>
                                
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Tipo de pregunta</legend>
                                    <div class="col-sm-10">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked onclick="mostrar_checkbox();">
                                            <label class="form-check-label" for="gridRadios1">
                                             Múltiple choice      
                                            </label>
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="2" onclick="mostrar_texto();">
                                            <label class="form-check-label">
                                                Texto
                                            </label>   
                                        <div class="form-chek">
                                            
                                            <div id="checkbox">
                                                   <label>Opcion 1:</label> <input class="form-control" type="text" name="descripcion1" id="descripcion1">
                                                   <label>Opcion 2:</label> <input class="form-control" type="text" name="descripcion2" id="descripcion2">
                                                   <button type="button" class="btn btn-sm btn-secondary m-2" id="boton3" onclick="agregar_opcion3()">+ Agregar opción</button>
                                                   <div id="opcion3">
                                                   <label>Opcion 3:</label> <input class="form-control" type="text" name="descripcion3" id="descripcion3">
                                                   <button type="button" class="btn btn-sm btn-secondary m-2" id="boton4" onclick="agregar_opcion4()">+ Agregar opción</button>
                                                   </div>
                                                   
                                                   <div id="opcion4">
                                                   <label>Opcion 4:</label> <input class="form-control" type="text" name="descripcion4" id="descripcion4">
                                                   <button type="button" class="btn btn-sm btn-secondary m-2" id="boton5" onclick="agregar_opcion5()">+ Agregar opción</button>
                                                   </div>

                                                   <div id="opcion5">
                                                   <label>Opcion 5:</label> <input class="form-control" type="text" name="descripcion5" id="descripcion5">
                                                   </div>
                                                    
                                            </div>
                                            <div id="texto">
                                                <textarea class="form-control" name="descripcion_textarea" id="floatingTextarea" cols="30" rows="13" placeholder="ingrese la marca de agua a mostrar"></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <button class="btn btn-success" type="submit">Guadar pregunta</button>
                            </form>
                            <br>
                            <button class="btn btn-outline-primary w-100 m-2">Finalizar encuesta</button>
                        </div>
                    </div>

<?php
/*include "conexion/conex.php";
 $sql= "SELECT * FROM preguntas,encuestas,tipo_pregunta
 WHERE diseñar la consulta ";
 $resultado= mysqli_Query($conex,$sql);
 if(mysqli_num_rows($resultado)>0)
{*/
?>
                    <!--Inicio de tabla-->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Encuesta Nº1</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Preguntas</th>
                                        <th scope="col">Tipo de pregunta</th>
                                        <th scope="col">Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>¿Que opinas de la limpieza?</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Fin de tabla-->
<?php                    
//}
?>
                </div>
            </div>
            <!-- Form End -->

<script src="js/controlador_crearPreguntas.js"></script>


<?php
include "parte_inferior.php";
mysqli_close($conex);
?>
