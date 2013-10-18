<?php 

	
	$idTienda=$_REQUEST['idTienda'];
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito(); 
	$divLineas=$carrito->eliminarElementosCarroidEstiloLimpia($idTienda,$seccionCatalogo);
	echo $divLineas;

 ?>       