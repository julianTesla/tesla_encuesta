<?php

$error;
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

// $cookie_name = "user";
// $cookie_value = "John Doe";

if($usuario == 'admin' || 'milagrosgimenez' || 'jonhatanmainardi' || 'gonzalofigueroa' && $contraseña == 'Tesla.01'){
  session_start();
  //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  $_SESSION["usuario"] = $usuario;
echo '<script type="text/javascript">
window.location="../resultados.php";
</script>';

}else{
  $error = "incorrecto";
  echo '<script type="text/javascript">
window.location="../index.php?error='.$error.'";
</script>';
}

?>


