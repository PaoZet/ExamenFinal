<?php

setlocale(LC_ALL, "es_ES");

//Variables de inicio
$modulo = "Usuario";
$nav = '9';

require_once "../controller/assets/svrurl.php";
require_once "../controller/assets/validacion.php";
require_once "../controller/assets/inicio.php";

//Validacion de login
$login = new seguridad;
$login->seguridadLogin();

require "../controller/assets/session.php";

?>
<!-- Usuario -->
<a id="idusuarioperfil" class="hide"><?php echo $template_id_usuario ?></a>
<a id="correousuarioperfil" class="hide"><?php echo $template_email ?></a>
<a id="nombreousuarioperfil" class="hide"><?php echo $template_nombre ?></a>
<a id="tipoousuarioperfil" class="hide"><?php echo $template_tipo ?></a>
<a id="accesousuarioperfil" class="hide"><?php echo $template_acceso ?></a>
<!-- Usuario -->
<?php
// Requerir NAVMENU
require "../controller/assets/menunav.php";
?>

    <div class="row container">
        <form class="col s12" method="post" id="EditarUsuario">
            <div class="row">

<!-- BODDY -->
<div id="bodysecon" class="row">
    <h3><center><div class="card-panel hoverable">Datos de Usuario</div></center></h3>
        <div class="row container">
        </div>
</div>

                <!-- Campo para el nombre -->
                <div id="bodysecon" class="row">
                    <div class="input-field col s12">
                        <input placeholder="Ingrese el Nombre" id="template_nombre" name="template_nombre" type="text" class="validate" value="<?php echo $template_nombre; ?>">
                        <label for="template_nombre">Nombre</label>
                    </div>
                </div>

                <!-- Campo para el tipo -->
                <div id="bodysecon" class="row" style="display:none">
                    <div class="input-field col s12">
                        <input placeholder="Ingrese el Tipo" id="template_tipo" name="template_tipo" type="text" class="validate" value="<?php echo $template_tipo; ?>">
                        <label for="template_tipo">Tipo</label>
                    </div>
                </div>

                <!-- Campo para el acceso -->
                <div id="bodysecon" class="row" style="display:none">
                    <div class="input-field col s12">
                        <input placeholder="Ingrese el Acceso" id="template_acceso" name="template_acceso" type="text" class="validate" value="<?php echo $template_acceso; ?>">
                        <label for="template_acceso">Acceso</label>
                    </div>
                </div>

                <!-- Campo para el email -->
                <div id="bodysecon" class="row">
                    <div class="input-field col s12">
                        <input placeholder="Ingrese el Email" id="template_email" name="template_email" type="text" class="validate" value="<?php echo $template_email; ?>">
                        <label for="template_email">Email</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s7">
                        <blockquote>
                        Dejar en blanco si no desea cambiar la contraseña.
                        </blockquote>
                    </div>
                </div>
                
                <!-- Campo para la contraseña -->
                <div id="bodysecon" class="row">
                    <div class="input-field col s12">
                        <input placeholder="Ingrese el contraseña" id="template_contra" name="template_contra" type="password">
                        <label for="template_contra">Contraseña</label>
                    </div>
                </div>

                <!-- Campo para el acceso -->
                <div id="bodysecon" class="row">
                    <div class="input-field col s12">
                        <input placeholder="Confirme su contraseña" id="template_contraconfima" name="template_contraconfima" type="password">
                        <label for="template_contraconfima">Confirme su contraseñá</label>
                    </div>
                </div>

                


            </div>

            <!-- Campo oculto para el id -->
            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $template_id; ?>">


            <!-- Botón para enviar el formulario -->
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light colorP">Guardar</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- BODDY -->

<!-- SCRIPTS CARGA -->
<?php
require_once "../controller/assets/scripts.php";
?>
<!-- SCRIPTS CARGA -->

<!-- SCRIPTS -->
<script>
    $(document).ready(function() {
        $('select').formSelect();
    });

    jQuery(document).on("submit", "#EditarUsuario", function(event) {
        event.preventDefault();

        // Validar que las contraseñas coincidan
        const contra = jQuery("#template_contra").val();
        const confirmarContra = jQuery("#template_contraconfima").val();

        //logica para validar que las contraseñas coincidan
        if (contra !== confirmarContra) {
            swal("Error", "Las contraseñas no coinciden", "error");
            return;
        }

        // Validar que los campos no estén vacíos
        console.log(jQuery("#EditarUsuario").serializeArray());

        jQuery("#botonEditar").addClass("disabled");

        jQuery.ajax({
                url: "../controller/db/editar_usuario.php",
                type: "POST",
                dataType: "json",
                data: jQuery("#EditarUsuario").serialize(),
                cache: "false",
                beforeSend: function() {
                    M.toast({
                        html: "Guardando cambios...",
                        classes: "rounded colorP",
                        timeRemaining: 50,
                    });
                },
            })
            .done(function(data) {
                if (data.error === false) {
                    swal("Sistema", "Usuario actualizado correctamente!", "success").then(() => {
                        location.reload();
                    });
                    jQuery("#botonEditar").removeClass("disabled");
                } else {
                    swal("Oops", "No se pudo actualizar el usuario. Intenta de nuevo!", "error");
                    jQuery("#botonEditar").removeClass("disabled");
                }
            })
            .fail(function(errordata) {
                console.log(errordata.responseText);
                swal("Error", "Hubo un problema al procesar la solicitud!", "error");
                jQuery("#botonEditar").removeClass("disabled");
            });

    });
</script>
<!-- SCRIPTS  -->


<!-- Fin HTML -->
<?php
require_once "../controller/assets/fin.php";
?>