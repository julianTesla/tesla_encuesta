<?php

$error;
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$cookie_name = "user";
$cookie_value = "John Doe";

if($usuario == 'admin' && $contraseña == 'admin'){
  session_start();
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  header("Location:http://127.0.0.1/tesla_encuesta/resultados.php", TRUE, 301);
  $_SESSION["usuario"] = $usuario;


}else{
  $error = "incorrecto";
  header("Location:login.php?error=$error");
}

?>