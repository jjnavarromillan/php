<?php 
	include("class_clientes.php");
	
	$idTienda =$_REQUEST['idTienda'];
	$Cliente = new ClientesClass();
	if($idTienda!=""){
		echo $Cliente->verTiendaXIdTienda($idTienda);
	}
	else{
		echo "3";	
	}
		
		
		
	
	
	

?>