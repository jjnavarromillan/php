<?php 
	include("class_clientes.php");
	
	$idCliente =$_REQUEST['idCliente'];
	$Cliente = new ClientesClass();
	if($idCliente!=""){
		echo $Cliente->verTiendasXClienteCombo($idCliente);
	}
	else{
		echo "3";	
	}
		
		
		
	
	
	

?>