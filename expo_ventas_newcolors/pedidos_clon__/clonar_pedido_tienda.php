<?php
	date_default_timezone_set("Mexico/General");
	$idPedido=$_REQUEST['idPedido'];
	
	$idTienda=$_REQUEST['idTienda'];
	$cliente=$_REQUEST['cliente'];
	$tienda=$_REQUEST['tienda'];
	$sitioPedido=$_REQUEST['sitioPedido'];
	$idVendedor=$_REQUEST['idVendedor'];
	$TotalPares=$_REQUEST['TotalPares'];
	$subtotal=$_REQUEST['subtotal'];

	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	$txtPedidoCargo = $_REQUEST['txtPedidoCargo'];
	$comboLugarPedido = $_REQUEST['comboLugarPedido'];
	
	$fechahora=date("Y-m-d H:i:s");
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	
	
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");
    $mysqli->query("SET NAMES 'utf8'");
	// crear nuevo pedido
	
	$sqlInsert=" insert into pedidos (idTienda,fechaPedido,sitioPedido,idVendedor,pares,totalPedido,seccionCatalogo,levantoPedido,lugarPedido,fechaRegistro) values ($idTienda,'$fechahora','$sitioPedido',$idVendedor,$TotalPares,$subtotal,'$seccionCatalogo','$txtPedidoCargo','$comboLugarPedido','$fechahora') ";
	
	$mysqli->query($sqlInsert);
	$idPedidoNew=0;
	$sqlRecIdPedido="select idPed from pedidos where idTienda='$idTienda' and  DATE_FORMAT(fechaPedido,'%Y-%m-%d %H:%i:%s')='$fechahora' and lugarPedido='$comboLugarPedido'";
	
	if($resultRecIdPed= $mysqli->query($sqlRecIdPedido)){
		$cont=1;
		if($obj=$resultRecIdPed->fetch_object()){
			
			$idPedidoNew = $obj->idPed;
			
		}
		
	}
	echo  "Cliente: $cliente tienda: $tienda - Pedido :$idPedidoNew - ";
	$sqlDetallePedido="select * from pedidos_detalle where idPedido='$idPedido'" ;
	
	
	if($resultDetalle=$mysqli->query($sqlDetallePedido)){
		
		$cont=1;
		while($obj=$resultDetalle->fetch_object()){
			
			$idEstilo=$obj->idEstilo;
			
			$N2=$obj->N2;
			$N2m=$obj->N2m;
			$N3=$obj->N3;
			$N3m=$obj->N3m;
			$N4=$obj->N4;
			$N4m=$obj->N4m;
			$N5=$obj->N5;
			$N5m=$obj->N5m;
			$N6=$obj->N6;
			$N6m=$obj->N6m;
			$pares=$obj->Pares;
			$precio=$obj->precio;
			$total = $obj->Total;
			
			$sqlGuardarDetalleNewPedido= " insert into pedidos_detalle (idEstilo,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,pares,precio,total,idPedido) values ($idEstilo,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$pares,$precio,$total,$idPedidoNew)";
			
			$resultGuardarDetalle=$mysqli->query($sqlGuardarDetalleNewPedido);
			
		}
	}
	

?>