<?php 

	//$idPlantilla=$_REQUEST['idPlantilla'];
	$categoria=$_REQUEST['categoria'];
	$material=$_REQUEST['material'];
	$color=$_REQUEST['color'];
	$linea=$_REQUEST['linea'];
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getEstilosFromLineaInventarioNC($categoria,$material,$color,$linea,$seccionCatalogo);
	echo $divLineas;

 ?>      