<?php 

	
	session_start();
	include_once("LoginSystem.php");
	
	if(isset($_SESSION['usrsys'])){
		$usuario=$_SESSION['usrsys'];
		$C_val_user = new LoginSystem(); 
		$datRes = $C_val_user->getUsuarioIdRelTipo($usuario);
		if($datRes!="false"){
	
			echo "$datRes;";
		}
	}
	else
	{
		echo "false";
	}
	
			
		//header("Location: http://201.120.55.76/sistema2011/carrito/sistema.php");
		//echo "3  - ".$_COOKIE['usrsys'];
	
		
?>