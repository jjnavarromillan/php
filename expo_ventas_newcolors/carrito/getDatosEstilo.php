<?php 
	$idEstilo=$_REQUEST['idEstilo'];
	
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divDatos=$carrito->getDatosEstilo($idEstilo);
	echo $divDatos;

?>