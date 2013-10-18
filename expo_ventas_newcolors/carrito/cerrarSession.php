<?php 
	
		
		if(isset($_COOKIE['usrsys'])){
			//setcookie("usrsys"); 
			setcookie('usrsys','',time()-3600);
			//unset($_COOKIE['usrsys']); 
			//echo "Seesion terminada";
			//unset($_COOKIE['usrsys']); 
			//echo "session: ".$_COOKIE['usrsys'];
			header("Location: http://201.120.55.76/sistema2011/");
			
		}
		else
		{
			echo "no se encontro el usuario de session"	;
		}
		//header("Location: http://localhost/sitio2009/carrito/sistema.php");
		
?>