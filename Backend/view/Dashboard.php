<?php

setlocale(LC_ALL, "es_ES");
$modulo = "Dashboard";
$nav = '2';

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
    <h3><center><div class="card-panel hoverable">Dashboard Spectrum</div></center></h3>
</div>

<!--ingresamos el link del power bi para mostrar luego-->
<?php
$dashboardUrl = "https://app.powerbi.com/view?r=eyJrIjoiZWYyOTNmMjAtOWRiZi00Y2ExLThmZmMtNzA5NWNmMTI1NTc2IiwidCI6IjRhOGFmNmVmLTkyNWEtNGQ5Yi05ODk0LWU0YmEwYTllY2RiZSJ9"; // Reemplaza esto con tu URL de Power BI
?>

<!DOCTYPE html>
<html lang="es">

<!-- incustramos el html del dashboar-->
<body>
<div class="dashboard-container">
    <iframe src="<?php echo $dashboardUrl; ?>" allowfullscreen="true"></iframe>
</div>

</body>
</html>

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