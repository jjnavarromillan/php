<?php 
	$strArrayEstilosDeleted=$_REQUEST['strArrayEstilosDeleted'];
	//$sessionId=$_REQUEST['sessionId'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divDatos=$carrito->deleteItemCarrito2("1",$strArrayEstilosDeleted);
	echo $divDatos;
?>