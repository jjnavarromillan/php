<?php 
	//include_once("LoginSystem.php");
	
		
		if(isset($_COOKIE['usrsys'])){
			$usuario = $_COOKIE['usrsys'];
			echo "usuario $usuario en session";
		}
	
		?>