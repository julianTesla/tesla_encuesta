<?php
include "../conexion/conex.php";

$id_encuesta= $_POST['encuesta'];

$sql= "SELECT id_pregunta, nombre_pregunta, tipo, nombre_encuesta 
FROM `preguntas`, tipos_preguntas,encuestas 
WHERE preguntas.encuesta_id = '$id_encuesta' AND preguntas.tipo_pregunta_id = tipos_preguntas.id_tipo_pregunta
AND encuestas.id_encuesta = '$id_encuesta' ";
$resultado= mysqli_Query($conex,$sql); 


while($row= mysqli_fetch_array($resultado))
{
$respuesta='<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="mb-0">'.$row[3].'</h5>

                        <!-- BOTON ASIGNAR ENCUESTA -->
                        <form action="./asignarEncuesta.php?ID='.$row[0].'" method="GET">
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
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$row[1].'</td>
                                    <td>'.$row[2].'</td>
                                    <td>1- Opcion a<br>
                                        2- Opcion b<br>
                                        3- Opcion c</td>

                                    <td><button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';
}

echo $respuesta;
?>