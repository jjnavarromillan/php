<?php 

	$idPlantilla=$_REQUEST['idPlantilla'];
	$categoria=$_REQUEST['categoria'];
	$material=$_REQUEST['material'];
	$color=$_REQUEST['color'];
	$linea=$_REQUEST['linea'];
	$estilo=$_REQUEST['estilo'];
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getEstilosFromLineaAll($idPlantilla,$categoria,$material,$color,$linea,$estilo,$seccionCatalogo);
	echo $divLineas;

 ?>      