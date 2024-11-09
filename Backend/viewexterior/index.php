<?php
$modulo = "Login";

require_once "controller/assets/validacion.php";

//Validacion de login
$login = new seguridad;
$login->iniciologin(false);

require_once "controller/assets/svrurl.php";
require_once "controller/assets/inicio.php"; 

//numeros aleatorios
$num1 =  rand(1,10);
$num2 = rand(1,10);
?>

<div class="row animated fadeIn" style="margin-bottom: 0;"><!-- row principal-->


  <!-- CARD BLANCO -->
  <div class="row center" >
    <div class="col s12">
    <img width="10%" src="./docs/iconos/pronto.jpg"> <!-- ingresamos la imagen descargada para el icono de menu-->
      <h4 style="color: black;">Pronto Dashboards</h4>
      <h5 style="color: black;">Ingrese los siguientes datos:</h5>
    </div>
    <div class="col s8 offset-s4">
      <form id="login" accept-charset="utf-8" action="">
        <div class="row">
          <div class="col s12 m12">
            <div class="left">
              <span class="black-text" style="font-size: 18px;">Correo</span>
            </div>
          </div>
          <div class="col s12 m8">
            <div class="input-field col s11 m8">
              <input type="email" name="mail" id="mail" class="validate black-text login-input" required>
            </div>
          </div>
          <div class="col s12 m12">
            <div class="left">
              <span class="black-text" style="font-size: 18px;">Contraseña</span>
            </div>
          </div>
          <div class="col s12 m8">
            <div class="input-field col s11 m8">
              <input type="password" name="contra" id="pass" required class="validate black-text login-input" pattern="^.{8,25}" title="La contraseña debe tener al menos 8 caracteres, incluyendo letras y números. No se permiten caracteres especiales no estándar.">
            </div>
          </div>

        <!-- Verificador humano -->
        <div class="col s12 m12">
          <div class="left">
            <span class="black-text" style="font-size: 18px;">¿Cuánto es <?php echo $num1; ?> + <?php echo $num2; ?> ?</span>
          </div>
        </div>
        <div class="col s12 m8">
          <div class="input-field col s11 m8">
            <input type="number" name="human_check" id="human_check" class="validate black-text login-input" required>
            <input type="hidden"  id="sum_result" value="<?php echo $num1 +  $num2; ?>">
          </div>
        </div>
         <!-- Verificador humano -->
        </div>
        <div class="row">
          <div class="col s12 m12">
            <div class="col s4 offset-s4 m5">
              <div class="left">
                <input type="submit" id="botonlogin" class=" colorP btn-large  white-text" value="Ingreso" style="font-size: 18px; border-radius: 7px;">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>


  <!-- Derechos reservados -->
  <div class="row center">
    <div class="col s12" style="position: fixed; bottom: 0;">
      <span class="black-text" style="font-size: 20px;"> ProntoBPO <a class="black-text" href=""></a></span>
    </div>
  </div>
  <!-- Derechos reservados -->

</div><!-- row principal-->
<!-- row principal-->

<!-- SCRIPTS CARGA -->
<?php
require_once "controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->
<script>
jQuery(document).on("submit", "#login", function (event) {
  event.preventDefault();

  // Verificar si el usuario respondió correctamente a la pregunta
  const humanCheck = parseInt(jQuery("#human_check").val());
  const sumCheck = parseInt(jQuery("#sum_result").val());
  if (humanCheck !== sumCheck) {
    swal("Oops", "Respuesta incorrecta a la pregunta de verificación!", "error");
    return;
  }

  jQuery("#botonlogin").addClass("disabled");

  jQuery.ajax({
    url: "controller/db/login.php",
    type: "POST",
    dataType: "json",
    data: jQuery("#login").serialize(),
    cache: "false",
    beforeSend: function () {
      M.toast({
        html: "Cargando...",
        classes: "rounded colorP",
        timeRemaining: 50,
      });
    },
  })
    .done(function (data) {
      if (data.acceso == "si") {
        console.log(data);
        window.location.href = "view/index.php";

        //swal ( "PM SCRUM" ,  "Bievenido al sistema" ,  "success" );
        jQuery("#botonlogin").removeClass("disabled");
      } else if (data.acceso == "no") {
        //Usuario Invalido
        swal("Sistema", "Usuario Bloqueado Informar a Desarollo", "info");
        jQuery("#botonlogin").removeClass("disabled");
      } else if (data.error == true) {
        swal("Oops", "Correo o contraseña incorrecta! ", "info");
        jQuery("#botonlogin").removeClass("disabled");
      }
    })
    .fail(function (errordata) {
      console.log(errordata.responseText);
    });
});
</script>


<!-- Fin HTML -->
<?php
require_once "controller/assets/fin.php";
?>

