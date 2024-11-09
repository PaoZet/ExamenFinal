<?php

ob_start();
/**
 * POO Conectar
 */

// congifuracion de correo para envio de notificaciones

// para configurar la contraseña de aplicacion de gmail	
// https://myaccount.google.com/apppasswords?pli=1&rapt=AEjHL4Nf_fcjt3Yo1aMrT9qpz3yVxrIQ2S6HR0q4pQCjeW1mRgVoi8fMw0H1FAoGZbX-ei9rG7NlAg7uQ6_z8hwoZKdgM4vlotyFGyn06bs8hlThRNSjlOQ
$unombre = "Notificacion Dashboard";
$ucorreo = "notificacionesdbs@gmail.com";
$ccontra = "rfka ewip eblg pcdb";
$uhost = "smtp.gmail.com";
$port = 587; //
$SMTPSecure = "ssl"; // por lo general es ssl

ob_end_flush();
