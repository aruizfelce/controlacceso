      <!-- Menu que sale en la parte superior con los datos del usuario y el boton cerrar -->
      <?php
           session_start();
          if(!isset($_SESSION["usuario"])) //si no no está logueado va a la pagina de logueo
          {
              header("Location:ingresar.php");

          }
      ?>
       