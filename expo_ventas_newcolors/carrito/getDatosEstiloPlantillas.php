<?php 


	$idCatPlan=$_REQUEST['idCatPlan'];
	echo "$idCatPlan";
	require_once("http://localhost/sitio2009/carrito/carrito_class.php");
	$carrito=new carrito();
	$divDatos=$carrito->getDatosEstiloPlantillas($idCatPlan);
	echo $divDatos;

?>