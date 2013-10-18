<?php 

	require_once("carrito_class.php");
	$carrito=new carrito();
	$divDatos=$carrito->getDatosEstiloAll();
	echo $divDatos;

?> 