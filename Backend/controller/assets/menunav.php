<!--Menu Admin-->
<!-- Dropdown Structure -->
<ul id="menuadmin" class="dropdown-content">
  <li><a href="./settings.php" class="black-text"><i class="material-icons black-text">build</i>Configuracion</a></li>
  <li class="divider"></li>
  <li><a href="../controller/assets/salir.php" class="black-text"><i class="material-icons black-text">exit_to_app</i>Salir</a></li>
</ul>
<!--Menu Admin-->
<!-- Dropdown Structure -->

<a id="nivelUser" class="hide"><?php echo $template_tipo; ?></a>

<!-- NAV -->
<ul id="slide-out" class="sidenav sidenav-fixed">
  <li style="height: auto;">
    <div class="user-view" style="width: 100%;">
      <div class="row center">
        <div class="col s12">
          <img width="50%" src="../docs/iconos/pronto.jpg"> <!-- ingresamos la imagen descargada para el icono de menu-->
        </div>
      </div>
    </div>
  </li>
  <li>
    <div class="user-view" style="padding: 0px 32px 0;">
      <center><a><span class="black-text email"><strong><?php echo $template_nombre ?></strong></span></a></center>
    </div>
  </li>
  <li><a class="subheader">Menu</a></li>
  <li><a id="n1" href="./index.php"><i id="i1" class="material-icons">home</i>Inicio</a></li>
  <li><a id="n2" href="./Dashboard.php"><i id="i2" class="material-icons">dashboard</i>Dashboard</a></li>
  <li><a id="n9" href="./Usuario.php"><i id="i9" class="material-icons">people</i>Usuario</a></li>
  <!--<li><a id="n5" href="./Usuario.php"><i id="i5" class="material-icons">get_app</i>Data</a></li>-->
  <li><a id="n4" href="../controller/assets/salir.php"><i id="i5" class="material-icons">exit_to_app</i>Salir</a>

</ul>
<!-- NAV -->


<script type="text/javascript" charset="utf-8" async>
  let tipoUserV = $("#nivelUser").text();

  if (tipoUserV == "Usuario") {
    $("#n1").remove();
  }
    console.info("Bienvenido a la cosola", tipoUserV);
</script>


<!-- NAV PRINCIPAL-->
<nav class="colorP borde7 hoverable" style="width: 97% !important; margin-left: 1.5%; margin-top: 1%; margin-bottom: 25px;">
  <div class="nav-wrapper" style="margin: 25px;">
    <a class="brand-logo" href="#"><i id="ocultarnav" class="material-icons hide-on-med-and-down">fullscreen</i><?php echo (new DateTime())->format('l d \d\e F \d\e\l Y'); ?></a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
        <!--<li><a class="busquedaglobal"><i class="material-icons left">search</i></a></li>-->
        <li><a id="zonaBienvenido" class="truncate">Bienvenido</a></li>
        <li><a id="dropdownuser" class="dropdown-trigger" data-target="menuadmin"><i class="material-icons left white-text">child_care</i><?php echo $template_nombre; ?></a></li>
    </ul>
  </div>
</nav>
<!-- NAV PRINCIPAL-->




<script type="text/javascript" charset="utf-8">
  $("#zonaBienvenido").text("Bienvenido");

  var menunavID = <?php echo $nav ?>;
  if (menunavID == "0") {
    $("#n" + menunavID + "").addClass('animated fadeOut');
    setTimeout(function() {
      $("#n" + menunavID + "").addClass('hide');
    }, 500);
  } else {
    $("#n" + menunavID + "").addClass('fontP');
    $("#i" + menunavID + "").addClass('accentfP');
  }

  $("#ocultarnav").click(function(event) {
    event.preventDefault();
    if ($("#slide-out").hasClass('sidenav-fixed')) {
      $("#ocultarnav").text('fullscreen');
      $("#slide-out").removeClass('sidenav-fixed');
      $("#bodyprin").removeClass('responsivo');
      $('.sidenav').sidenav("close");
      actResponsive();
    } else {
      $("#slide-out").addClass('sidenav-fixed');
      $("#bodyprin").addClass('responsivo');
      $('.sidenav').sidenav("open");
      $("#ocultarnav").text('fullscreen_exit');
      actResponsive();
    }
  });
</script>