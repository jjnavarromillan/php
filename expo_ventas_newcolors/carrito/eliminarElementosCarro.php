<?php 

	$elementosEliminados=$_REQUEST['elementosEliminados'];
	$idTienda=$_REQUEST['idTienda'];
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->eliminarElementosCarro($idTienda,$elementosEliminados,$seccionCatalogo);
	echo $divLineas;

 ?>      