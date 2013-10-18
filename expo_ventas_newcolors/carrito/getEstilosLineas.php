<?php 

	$linea=$_REQUEST['linea'];
	$idPlantilla=$_REQUEST['idPlantilla'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getEstilosFromLinea($linea,$idPlantilla);
	echo $divLineas;

 ?>      