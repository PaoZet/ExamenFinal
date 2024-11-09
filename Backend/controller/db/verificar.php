<?php
ob_start();

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    //iniciar session para oberner el codigo de verificacion
    SESSION_START();

    $codigo = $_POST['codigo'];
    $codigoVerificacion = $_SESSION['codigoVerificacion'];
    $correo = $_SESSION['template_email'];

    if ($codigo == $codigoVerificacion) {

        //conectar a base de datos
        require_once('cone.php');

        $conect = new basedatos;
        $conect->conectarBD();

        $consulta = "SELECT * FROM usuario WHERE  mail='$correo'";

        //mandar informacion a la base de datos
        $result = mysqli_query($conect->conectarBD(), $consulta);

        //validar datos
        $filas = mysqli_num_rows($result);

        while ($row = $result->fetch_assoc()) {
            $template_id_usuario = $row['id_usuario'];
            $template_nombre = $row['nombre'];
            $template_email = $row['mail'];
            $template_tipo = $row['tipo'];
            $template_acceso = $row['acceso'];
        }


        //si encuentra datos lo hace si no error.
        if ($filas > 0):

            if ($template_acceso == 1) {


                SESSION_UNSET();

                SESSION_DESTROY();

                echo json_encode(array('error' => true, 'acceso' => false));
            } else {


                $_SESSION['verficaciondoble'] = false;
                $_SESSION['codigoVerificacion'] = 0;
                $_SESSION['template_id_usuario'] = $template_id_usuario;
                $_SESSION['template_nombre'] = $template_nombre;
                $_SESSION['template_email'] = $template_email;
                $_SESSION['template_tipo'] = $template_tipo;
                $_SESSION['template_acceso'] = $template_acceso;

            }

        else:


            SESSION_UNSET();

            SESSION_DESTROY();

            $dataerror = mysqli_error($conect->conectarBD());
            echo json_encode(array('error' => true, "dataerror" => $dataerror));

        endif;

        //vaciar datos
        mysqli_close($conect->conectarBD());


        echo json_encode(array('error' => false, 'acceso' => 'si'));
    } else {
        echo json_encode(array('error' => true, 'acceso' => 'no'));
    }

}

ob_end_flush();
