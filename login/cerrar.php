<?php

// session_destroy();

// if(headers_sent()){
//     echo"<script> window.location.href='/index.php'</script>";
// } else{
//     header('Location:/index.php');
// }

if(isset($_GET['cerrar'])) {
  //Vaciamos y destruimos las variables de sesión
  $_SESSION['usuario'] = NULL;
  //$_SESSION['nombreuser'] = NULL;
  unset($_SESSION['usuario']);
  //unset($_SESSION['nombreuser']);
  //Redireccionamos a la pagina index.php
  header('Location: /tesla_encuesta/index.php' );
}

?>