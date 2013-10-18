<?php 
	$idCliente=$_REQUEST['idCliente'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divDatos=$carrito->getDatosCarrito($idCliente);
	echo $divDatos;
?>