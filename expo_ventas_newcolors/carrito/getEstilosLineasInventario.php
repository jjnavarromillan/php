<?php 

	$linea=$_POST['linea'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getEstilosFromLineaInventario($linea);
	echo $divLineas;

 ?>      