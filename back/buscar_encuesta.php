<?php
include "../conexion/conex.php";

$grupo_id = $_POST['encuestas'];

//Devolver los datos solicitados 
$sql =  "SELECT id_pregunta, nombre_pregunta, tipo, nombre_encuesta 
        FROM `preguntas`, tipos_preguntas,encuestas WHERE preguntas.encuesta_id = '$grupo_id' 
        AND preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta AND encuestas.id_encuesta = '$grupo_id' ";
       $resultado  = mysqli_query($conex, $sql);

$respuesta= '';
if(mysqli_num_rows($resultado)>0)
{
    $sql2= "SELECT nombre_encuesta FROM encuestas WHERE encuestas.id_encuesta = '$grupo_id'";
    $resultado2= mysqli_Query($conex,$sql2);

    //////////////////////////////////////////
    $sql3="SELECT descripcion, pregunta_id FROM opciones, preguntas, encuestas, tipos_preguntas 
    WHERE preguntas.encuesta_id = $grupo_id AND preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta 
    AND encuestas.id_encuesta = $grupo_id AND opciones.pregunta_id = preguntas.id_pregunta";
    $resultado3= mysqli_Query($conex, $sql3);

    $respuesta=$respuesta.'<div class="container-fluid pt-4 px-4" >
                    <div class="bg-secondary text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">';
                           
                            while($row2= mysqli_fetch_array($resultado2))
                            {
                               $respuesta=$respuesta.'<h5 class="mb-0">'.$row2[0].'</h5>';
                            }
                            $respuesta= $respuesta.'
                            
                            <!-- BOTON EDITAR ENCUESTA 
                            <form action="/" method="GET">
                                <button type="submit" class="btn btn-success">Editar encuesta <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                    </svg>
                                </button>
                            </form> -->

                            <!-- BOTON ASIGNAR ENCUESTA -->
                            <form action="./asignarEncuesta.php" method="GET">
                                <button type="submit" class="btn btn-info m-2 align-items-center">Asignar a un curso
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                    </svg>
                                </button>
                            </form> 

                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col">Pregunta</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Respuestas</th>
                                        <th scope="col">Corregir pregunta</th>
                                    </tr>
                                </thead>';
                                while($row= mysqli_fetch_array($resultado))
                                    {
                        $respuesta= $respuesta.'<tbody>
                                    <tr>
                                        <td>'.$row[1].'</td>
                                        <td>'.$row[2].'</td>
                                        <td>';
                                        while($row3= mysqli_fetch_array($resultado3))
                                        {
                                            if($row3[1] != $row[0])
                                            {
                                                break 1;
                                            }
                                            else
                                            {
                                                $respuesta=$respuesta.'_'.$row3[0].'<br>';
                                            }
                                        }
                                        $respuesta=$respuesta.'</td>
                                        <td><button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></td>
                                    </tr>
                                </tbody>';
                                    }
                            $respuesta= $respuesta.'</table>
                        </div>
                    </div>
                </div>';

echo $respuesta;    
}
else
{
    echo "Sin resultados";
}



?>

