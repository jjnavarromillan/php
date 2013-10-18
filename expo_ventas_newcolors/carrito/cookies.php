  
      <?php 
 
      if (isset($_COOKIE['visita'])){

         echo "Gracias por visitarnos nuevamente";
 
	   }
		else {
 
         setcookie("visita", "ok", time() + 31536000);

         echo "Bienvenido por primera vez";

		}

      ?>

