<?php 

	require_once("carrito_compras.php");
	$carrito=new carro_compras();


	if(isset($_REQUEST['idEstilo'])){
			
			$idCliente= $_REQUEST['idCliente'];
			$idEstilo = $_REQUEST['idEstilo'];
			$precio = $_REQUEST['precio'];
			$claves= $_REQUEST['clave'];
			$cans=	$_REQUEST['cants'];
			$carrito->addEstilo($idCliente,$idEstilo,$claves, $cans,$precio);
			
			echo " Registro satisfactorio ";
	}
	else
		echo "No se recibio ningun parametro";
	//fin Carro compras*/
	?>