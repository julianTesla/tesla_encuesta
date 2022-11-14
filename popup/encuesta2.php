<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Encuesta</title>
</head>

<body>
    <div class="mx-0 mx-sm-auto">
        <div class="card">
            <div class="card-header" style="background-color:#bb0112">
                <h5 class="card-title text-white mt-2 text-center" id="exampleModalLabel">Nombre_encuesta</h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="far fa-file-alt fa-4x text-primary"></i>
                    <p class="mt-2 p-2 m-0">
                        <strong>¡Tu opinión nos importa!</strong>
                    </p>
                    <p class="p-2 m-0">
                        Te invitamos a responder una breve encuesta, te llevará menos de 1 minuto.
                    </p>
                </div>

                <hr/>

                <form class="px-4" action="">
                    <p class="text-center mb-2"><strong>¿Como evaluarías al profesor?</strong></p>

                    <div class="form-check d-flex justify-content-center p-0">
                        <input class="form-check-input m-2" type="radio" name="exampleForm" id="radio3Example1" />
                        <label class="form-check-label m-1" for="radio3Example1">
                            Excelente
                        </label>
                    </div>
                    <div class="form-check d-flex justify-content-center p-0">
                        <input class="form-check-input m-2" type="radio" name="exampleForm" id="radio3Example2" />
                        <label class="form-check-label m-1" for="radio3Example2">
                            Muy bueno
                        </label>
                    </div>
                    <div class="form-check d-flex justify-content-center p-0">
                        <input class="form-check-input m-2" type="radio" name="exampleForm" id="radio3Example3" />
                        <label class="form-check-label m-1" for="radio3Example3">
                            Bueno
                        </label>
                    </div>
                    <div class="form-check d-flex justify-content-center p-0">
                        <input class="form-check-input m-2" type="radio" name="exampleForm" id="radio3Example4" />
                        <label class="form-check-label m-1" for="radio3Example4">
                            Regular
                        </label>
                    </div>
                    <div class="form-check d-flex justify-content-center p-0">
                        <input class="form-check-input m-2" type="radio" name="exampleForm" id="radio3Example5" />
                        <label class="form-check-label m-1" for="radio3Example5">
                            Malo
                        </label>
                    </div>

                    <p class="text-center"><strong>¿Te gustaría agregar algo más?</strong></p>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="form4Example3" rows="4" placeholder="Tu comentario"></textarea>
                        <label class="form-label" for="form4Example3" style="color:#808488">Opcional</label>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn w-100" style="background-color:#bb0112; color:white">Enviar</button>
            </div>
        </div>
    </div>
</body>

</html>