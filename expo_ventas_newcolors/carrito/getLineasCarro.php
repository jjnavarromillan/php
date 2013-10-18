<?php 
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getLineas();
	echo "$divLineas";
?>