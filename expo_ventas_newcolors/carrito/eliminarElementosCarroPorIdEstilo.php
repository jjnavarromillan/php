<?php 

	$idEstilo=$_REQUEST['idEstilo'];
	$idTienda=$_REQUEST['idTienda'];
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->eliminarElementosCarroidEstilo($idTienda,$idEstilo,$seccionCatalogo);
	echo $divLineas;

 ?>      