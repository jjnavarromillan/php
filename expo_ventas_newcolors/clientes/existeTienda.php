<?php 
	include("class_clientes.php");
	
	$idCliente =$_REQUEST['idCliente'];
	$tienda =$_REQUEST['tienda'];
	
	
	$Cliente = new ClientesClass();
	if($idCliente!=""){
		$id = $Cliente->existeTienda($idCliente,$tienda);
		if($id!=""){
			echo $id;
		}
		else{
			echo "nullUser";	
		}
	}
	else{
		echo "null";	
	}
?>