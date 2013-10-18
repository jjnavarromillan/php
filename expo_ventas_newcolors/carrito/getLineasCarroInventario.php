<?php 
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getLineasInventario();
	echo "$divLineas";
?>