<?php 

// crear_pedido.php?idCliente="+idCliente+"&sitioPedido='Web'&idVendedor=1&TotalPares="+subtotalPares+"&subtotal="+subtotal+"&datos="+datos
	$idTienda=$_REQUEST['idTienda'];
	$sitioPedido=$_REQUEST['sitioPedido'];
	$idVendedor=$_REQUEST['idVendedor'];
	$TotalPares=$_REQUEST['TotalPares'];
	$subtotal=$_REQUEST['subtotal'];
	$datos=$_REQUEST['datos'];
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	$txtPedidoCargo = $_REQUEST['txtPedidoCargo'];
	$comboLugarPedido = $_REQUEST['comboLugarPedido'];

	require_once("carrito_class.php");
	$carrito=new carrito();
//	echo $idTienda;
	$divDatos=$carrito->registra_carrito_por_tienda($idTienda,$sitioPedido,$idVendedor,$TotalPares,$subtotal,$datos,$seccionCatalogo,$txtPedidoCargo,$comboLugarPedido);
	
	if(is_numeric($divDatos)){
		//return $divDatos;
		echo "$divDatos";
	}
	else{
			echo "";	
	}
		//return 0;
?>