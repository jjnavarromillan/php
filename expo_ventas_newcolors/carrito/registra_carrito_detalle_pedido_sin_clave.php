<?php 
	
	
	require_once("carrito_class.php");
	require_once("classes/date_convert_class.php");
	$carrito=new carrito();
	

	$idTienda=$_REQUEST['idTienda'];
	 
	
	date_default_timezone_set("Mexico/General");
	
	
	
//	$idUsuario=$_GET['idUsuario'];
	
	$idTienda=$_GET['idTienda'];
	$idEstilo=$_GET['idEstilo'];
	$precio=$_GET['precio'];
	$seccionCatalogo=$_GET['seccionCatalogo'];
	
	$fechahora=date("Y-m-d H:i:s");
	
	
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");	
	
	//$strArrayPedido=$_REQUEST['datosCarro'];
	$observacion="";
	
	$carrito->registraCarroPedidoPorClienteSinClaves($idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$seccionCatalogo);
	
	

?>