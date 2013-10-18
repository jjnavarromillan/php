<?php 

	

	session_start();
	
	if(isset($_SESSION['usrsys'])){
		$usuario=$_SESSION['usrsys'];
			echo $usuario;/*
		if($_SESSION['usrsys']=!""){
			
			$usuario=$_SESSION['usrsys'];
			echo $usuario;
			
			//header("Location: http://201.120.55.76/sistema2011/carrito/sistema.php");
			//echo "3  - ".$_COOKIE['usrsys'];
		}*/
	}
	else
		echo "no se encontro la variable de sesion ";
		
		
?>