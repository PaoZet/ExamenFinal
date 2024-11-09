<?php

ob_start();

/**
* SEGURIDAD DE SERVIDOR
*/
class seguridad
{
  
  function __construct()
  {
    SESSION_START();
  }


  public function seguridadLogin(){
    if(isset($_SESSION['template_nombre'])){

      return $inicio = true;

    }elseif($_SESSION['verficaciondoble'] == true){

      ?>
    
      <script>
      
      window.location.href = '../verificar.php';

      </script>

      <?php 
    
   }else{
        session_destroy();
      
      ?>
    
      <script>
      
      console.log("Se verifico que no hay datos");
      window.location.href = '../';

      </script>

      <?php 
      


    }
  }

  public function iniciologin($verificar){
    if($verificar == true){
      if(isset($_SESSION['verficaciondoble']) == false){
        header('location: ./index.php');
      }elseif(isset($_SESSION['template_nombre'])){
        header('location: ./view/');
      }
      return;
    }

    if(isset($_SESSION['template_nombre'])){
      header('location: ./view/');
    }elseif(isset($_SESSION['verficaciondoble']) == true){
      header('location: ./verificar.php');
    }else {
      session_destroy();
    }
    return true;
  }


      
}

ob_end_flush();
?>