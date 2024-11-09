<?php
ob_start();

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {


  //conectar a base de datos
  require_once('cone.php');

  $conect = new basedatos;
  $conect->conectarBD();

  $usuario = mysqli_real_escape_string($conect->conectarBD(), $_POST['mail']);
  $clave = mysqli_real_escape_string($conect->conectarBD(), $_POST['contra']);


  $consulta = "SELECT * FROM usuario WHERE  mail='$usuario' and contra='$clave'";

  //mandar informacion a la base de datos
  $result = mysqli_query($conect->conectarBD(), $consulta);

  //validar datos
  $filas = mysqli_num_rows($result);

  while ($row = $result->fetch_assoc()) {
    $template_id_usuario = $row['id_usuario'];
    $template_nombre = $row['nombre'];
    $template_email = $row['mail'];
    //$template_tipo = $row['tipo'];
    $template_acceso = $row['acceso'];
  }


  //si encuentra datos lo hace si no error.
  if ($filas > 0):

    if ($template_acceso == 1) {

      SESSION_START();

      SESSION_UNSET();

      SESSION_DESTROY();

      echo json_encode(array('error' => false, 'acceso' => 'no'));
    } else {

      // server should keep session data for AT LEAST 1 hour
      ini_set('session.gc_maxlifetime', 0);

      // each client should remember their session id for EXACTLY 1 hour
      session_set_cookie_params(0);

      SESSION_START(['cookie_lifetime' => 0,]);

      /*
      $_SESSION['template_id_usuario'] = $template_id_usuario;
      $_SESSION['template_nombre'] = $template_nombre;
      $_SESSION['template_email'] = $template_email;
      $_SESSION['template_tipo'] = $template_tipo;
      $_SESSION['template_acceso'] = $template_acceso;
      */
      $_SESSION['verficaciondoble'] = true;
      $_SESSION['template_id_usuario'] = $template_id_usuario;
      $_SESSION['template_email'] = $template_email;
      $template_nombre;
      $template_email;
      //numeros aleatorios
      $numAleatorio = rand(100000,999999);
      $_SESSION['codigoVerificacion'] = $numAleatorio;


      require './notificacion.php';

      echo json_encode(array('error' => false, 'acceso' => 'si', 'dirI' => "verificacion de correo"));
    }

  else:

    SESSION_START();

    SESSION_UNSET();

    SESSION_DESTROY();

    $dataerror = mysqli_error($conect->conectarBD());
    echo json_encode(array('error' => true, "dataerror" => $dataerror));

  endif;

  //vaciar datos
  mysqli_close($conect->conectarBD());
}

ob_end_flush();
