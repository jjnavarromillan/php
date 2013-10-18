<?php 

	
	
	session_start();
	$usuario=$_REQUEST['usuario'];
	$_SESSION['usrsys']=$usuario;
	echo "sesion creada ".$_SESSION['usrsys'];
		
?>