<?php 
	include("class_clientes.php");
	$ope=$_REQUEST['ope'];
	$txtCliente =$_REQUEST['txtCliente'];
	$Cliente = new ClientesClass();
	if($ope =="verDaCl"){
		$idCliente=$Cliente->existeCliente($txtCliente);
		if($idCliente!=""){
			echo $Cliente->verDatosCliente($idCliente);
		}
		else{
			echo "3";	
		}
		
		
		
	}
	
	

?>