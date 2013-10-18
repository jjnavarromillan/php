<?php 
	include("class_clientes.php");
	
	$idCliente =$_REQUEST['idCliente'];
	$nombre =$_REQUEST['txtNombreUsuario'];
	$correo =$_REQUEST['txtEmail'];
	$passwd =$_REQUEST['txtPasswd'];
	
	$Cliente = new ClientesClass();
	if($idCliente!=""){
		$id = $Cliente->existeUsuarioWeb($correo);
		if($id==""){
			$id=$Cliente->crearUsuarioDeCliente($idCliente,$nombre,$correo,$passwd);
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