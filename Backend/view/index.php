<?php

setlocale(LC_ALL, "es_ES");
$modulo = "Formulario";
$nav = '1';

require_once "../controller/assets/svrurl.php";
require_once "../controller/assets/validacion.php";
require_once "../controller/assets/inicio.php";

//Validacion de login
$login = new seguridad;
$login->seguridadLogin();

require_once "../controller/assets/session.php";

?>
<!-- Usuario -->
<a id="tipodeusuario" class="hide"><?php echo $pm_tipo ?></a>
<!-- Usuario -->
<?php
////Requerir NAVMENU
require "../controller/assets/menunav.php";
?>

<!-- BODDY -->
<div id="bodysecon" class="row"> 
  <div class="input-field col s12">
    <br>
    <br>
    <h1><center>Bienvenido a Pronto Dashboards</center></h1>
    <br>
    <br>
    <center><div class="card-panel hoverable"><img width="80%" src="../docs/iconos/pronto.png"></div></center> <!-- ingresamos la imagen descargada para el inicio-->
  </div>
</div>


<!--Datos-->
<!-- BODDY -->

<!-- SCRIPTS CARGA -->
<?php
require_once "../controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->

<!-- SCRIPTS -->
<script>


</script>
<!-- SCRIPTS  -->


<!-- Fin HTML -->
<?php
require_once "../controller/assets/fin.php";
?>