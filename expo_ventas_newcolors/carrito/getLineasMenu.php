<?php 
	$idPlantilla=$_REQUEST['idPlantilla'];
	
	require_once("carrito_class.php");
	$carrito=new carrito();
	
	//$idPlantilla=$carrito->getIdPlantilla($plantilla);
	$divLineas="";
	
	//if($idPlantilla!=0)
		$divLineas=$carrito->getLineas($idPlantilla);
	
	
	echo "$divLineas";

?>