<?php 
	include("class_clientes.php");
	
	
	$cliente =$_REQUEST['txtCliente'];
	
	
	$Cliente = new ClientesClass();
	if($cliente!=""){
		$id = $Cliente->existeCliente($cliente);
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