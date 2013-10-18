<?php 
	
	
	require_once("carrito_class.php");
	require_once("../classes/date_convert_class.php");
	$carrito=new carrito();
	

	$idCliente=$_REQUEST['idCliente'];
	 
	
	date_default_timezone_set("Mexico/General");
	
	
	
//	$idUsuario=$_GET['idUsuario'];
	$idCliente=$_GET['idCliente'];
	$idEstilo=$_GET['idEstilo'];
	$precio=$_GET['precio'];
	
	$fechahora=date("Y-m-d H:i:s");
	
	
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");	
	
	$strArrayPedido=$_REQUEST['datosCarro'];
	$observacion="";
	
	$carrito->registraCarroPedidoPorCliente($idCliente,$fecha,$hora,$observacion,$idEstilo,$precio,$strArrayPedido);
	
	

?>