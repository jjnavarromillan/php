<?php 

$critIdPedido = "";
	if(isset($_REQUEST['idPedido'])){
		$critIdPedido = $_REQUEST['idPedido'];
	}

$critFoto = "";
	if(isset($_REQUEST['foto'])){
		$critFoto = $_REQUEST['foto'];
	}
$txtCliente= "";
	if(isset($_REQUEST['txtCliente'])){
		$txtCliente = $_REQUEST['txtCliente'];
	}

$txtTienda= "";
	if(isset($_REQUEST['txtTienda'])){
		$txtTienda = $_REQUEST['txtTienda'];
	}
$idTienda= "";
	if(isset($_REQUEST['idTienda'])){
		$idTienda = $_REQUEST['idTienda'];
	}
	
$txtFechaPedido= "";
	if(isset($_REQUEST['txtFechaPedido'])){
		$txtFechaPedido = $_REQUEST['txtFechaPedido'];
	}
	
	
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
.formatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
	text-align:center;

}
.numPedidoFormatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	color:#333;
	font-weight:600;
	text-align:center;
}
.datosFormatoGenClientes{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	color:#666;
	text-align:center;
}


#divPedidoDetalleFieldsContainer {
	position:relative;
	width:754px;
	height:42px;
	z-index:1;
	top: 1px;
	left: 0px;
}
#divPedidoDetalleHeaderFields {
	position:absolute;
	width:751px;
	height:25px;
	z-index:1;
	top: 55px;
	left: 13px;
	background-color: #CCCCCC;
}
#divPedidoDetalleContener {
	position:absolute;
	width:779px;
	height:286px;
	z-index:2;
	left: 7px;
	top: 88px;
	overflow: auto;
}
#divPedidosDetalleCons {
	position:absolute;
	width:42px;
	height:16px;
	z-index:1;
	left: 2px;
	top: 5px;
}
#divPedidosDetalleEstilos {
	position:absolute;
	width:80px;
	height:16px;
	z-index:2;
	left: 79px;
	top: 5px;
}
#divPedidoDetalleMatColor {
	position:absolute;
	width:201px;
	height:16px;
	z-index:3;
	left: 162px;
	top: 5px;
}
#divPedidoDetalleN2 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:4;
	left: 368px;
	top: 5px;
}
#divPedidoDetalleN2m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:5;
	left: 385px;
	top: 5px;
	text-align: center;
}
#divPedidoDetalleN3 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:6;
	left: 402px;
	text-align: center;
	top: 5px;
}
#divPedidoDetalleN3m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:7;
	left: 419px;
	text-align: center;
	top: 5px;
}
#divPedidoDetalleN4 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:8;
	left: 436px;
	text-align: center;
	top: 5px;
}
#divPedidoDetalleN4m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:9;
	left: 453px;
	text-align: center;
	top: 5px;
}
#divPedidoDetalleN5 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:10;
	left: 470px;
	top: 5px;
	text-align: center;
}
#divPedidoDetalleN5m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:11;
	left: 487px;
	text-align: center;
	top: 5px;
}
#divPedidoDetalleN6 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:12;
	left: 504px;
	text-align: center;
	top: 5px;
}
#divPedidoDetalleN6m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:13;
	left: 522px;
	text-align: center;
	top: 5px;
}
#divPedidoDetallePares {
	position:absolute;
	width:35px;
	height:16px;
	z-index:14;
	left: 561px;
	top: 5px;
}
#divPedidoDetallePrecio {
	position:absolute;
	width:37px;
	height:16px;
	z-index:15;
	left: 613px;
	top: 5px;
}
#divPedidoDetalleTotal {
	position:absolute;
	width:39px;
	height:16px;
	z-index:16;
	left: 669px;
	top: 6px;
}
#divPedidoDetalleImg {
	position:absolute;
	width:32px;
	height:31px;
	z-index:17;
	left: 45px;
	top: 0px;
}
#divPedidoDetalleGroupSuntotales {
	position:absolute;
	width:180px;
	height:25px;
	z-index:3;
	left: 556px;
	top: 388px;
}
#divPedidoDetalleSubtotalPar {
	position:absolute;
	width:40px;
	height:24px;
	z-index:3;
	left: 15px;
}
#divPedidoDetalleSubtotales {
	position:absolute;
	width:53px;
	height:23px;
	z-index:4;
	left: 119px;
	top: 1px;
}
#divPedidoDetalleAtras {
	position:absolute;
	width:47px;
	height:15px;
	z-index:5;
	left: 705px;
	top: -1px;
	text-align: right;
}
#divImgLineaDivPedidoDetalle {
	position:absolute;
	width:750px;
	height:7px;
	z-index:18;
	top: 31px;
	left: -1px;
}
#divImgRegresarIcono {
	position:absolute;
	width:14px;
	height:13px;
	z-index:4;
	left: 700px;
	top: 0px;
}
#divLblClienteNombre {
	position:absolute;
	width:59px;
	height:18px;
	z-index:6;
	top: 7px;
	left: 9px;
}
#divLblClienteNombreTxt {
	position:absolute;
	width:323px;
	height:18px;
	z-index:7;
	left: 73px;
	top: 7px;
}
#divLbTienda {
	position:absolute;
	width:53px;
	height:18px;
	z-index:8;
	left: 401px;
	top: 6px;
}
#divLblTiendaNombre {
	position:absolute;
	width:200px;
	height:20px;
	z-index:9;
	left: 461px;
	top: 6px;
}
#divVistaPedidoDetallelblPedido {
	position:absolute;
	width:76px;
	height:21px;
	z-index:10;
	left: 9px;
	top: 29px;
}
#divVistaPedidoDetallelbDesclPedido {
	position:absolute;
	width:81px;
	height:21px;
	z-index:11;
	left: 89px;
	top: 28px;
}
#divVistaPedidoDetallelblFechPedido {
	position:absolute;
	width:113px;
	height:19px;
	z-index:12;
	left: 175px;
	top: 29px;
}
#divVistaPedidoDetallelblFechaPedido {
	position:absolute;
	width:232px;
	height:18px;
	z-index:13;
	left: 293px;
	top: 30px;
}
#apDiv1 {
	position:absolute;
	width:58px;
	height:17px;
	z-index:14;
	left: 699px;
	top: 22px;
}
-->
</style>
</head>
	
<body>
<div id="divPedidoDetalleHeaderFields">
  <div id="divPedidosDetalleEstilos" class="formatoGen">Estilo</div>
  <div id="divPedidosDetalleCons" class="formatoGen">Cons</div>
  <div id="divPedidoDetalleMatColor" class="formatoGen">Material / Color</div>
  <div id="divPedidoDetalleN2" class="formatoGen">2</div>
  <div id="divPedidoDetalleN2m" class="formatoGen">-</div>
  <div id="divPedidoDetalleN3" class="formatoGen">3</div>
  <div id="divPedidoDetalleN3m" class="formatoGen">-</div>
  <div id="divPedidoDetalleN4" class="formatoGen">4</div>
  <div id="divPedidoDetalleN4m" class="formatoGen">-</div>
  <div id="divPedidoDetalleN5" class="formatoGen">5</div>
  <div id="divPedidoDetalleN5m" class="formatoGen">-</div>
  <div id="divPedidoDetalleN6" class="formatoGen">6</div>
  <div id="divPedidoDetalleN6m" class="formatoGen">-</div>
  <div id="divPedidoDetallePares" class="formatoGen">Pares</div>
  <div id="divPedidoDetalleTotal" class="formatoGen">Total</div>
  <div id="divPedidoDetallePrecio" class="formatoGen">Precio</div> 
</div>
<div id="divPedidoDetalleContener">
<?php 
	$sqlGetData = "SELECT pedidos_detalle.idPedDet, pedidos_detalle.idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, pedidos_detalle.N2, pedidos_detalle.N2m, pedidos_detalle.N3, pedidos_detalle.N3m, pedidos_detalle.N4, pedidos_detalle.N4m, pedidos_detalle.N5, pedidos_detalle.N5m, pedidos_detalle.N6, pedidos_detalle.N6m, pedidos_detalle.Pares, pedidos_detalle.precio, pedidos_detalle.Total, pedidos_detalle.idPedido
FROM pedidos_detalle LEFT JOIN estilos ON pedidos_detalle.idEstilo = estilos.Id where pedidos_detalle.idPedido='$critIdPedido'  ";

	if($result_data=$mysqli->query($sqlGetData)){
	
		$num=mysqli_num_rows($result_data);
		$cons= 0;
		$sumaPares = 0;
		$sumaTotal =0;
		for ($i=0;$i<$num;$i++){	  
				$cons++;
				$rowdata=mysqli_fetch_object($result_data);
				$idPedido=$rowdata->idPedido;
				$idEstilo=$rowdata->idEstilo;
				$Linea=$rowdata->Linea;
				$Estilo=$rowdata->Estilo;
				$Material=$rowdata->Material;
				$Color=$rowdata->Color;
				$N2=$rowdata->N2;
				$N2m=$rowdata->N2m;
				$N3=$rowdata->N3;
				$N3m=$rowdata->N3m;
				$N4=$rowdata->N4;
				$N4m=$rowdata->N4m;
				$N5=$rowdata->N5;
				$N5m=$rowdata->N5m;
				$N6=$rowdata->N6;
				$N6m=$rowdata->N6m;
				$Pares=$rowdata->Pares;
				$sumaPares= $sumaPares + $Pares;
				$Precio=$rowdata->precio;
				$Total=$rowdata->Total;
				$sumaTotal= $sumaTotal + $Total;
				$hei = 20;
				if($critFoto=="Si"){ 
					$hei=40;
				}
				$ren="";
				if($cons % 2 == 0){
					$ren="#CCCCCC";
				}
	?>
	
  <div id="divPedidoDetalleFieldsContainer" style="background-color <?php  echo "$ren"; ?>"> 
  <div id="divPedidosDetalleEstilos" class="datosFormatoGenClientes"><?php  echo "$Estilo";?></div>
  <div id="divPedidosDetalleCons" class="numPedidoFormatoGen"><?php  echo "$cons";?></div>
  <?php   
	if($critFoto=="Si"){ 
	
		$nombreFoto="$Estilo $Material $Color";
		$tam = strlen($nombreFoto);
		$res = "";

		for ($r=0;$r<$tam;$r++){
			$car = $nombreFoto[$r];
			if ($car == ' ')
				$car = '-';
			if ($car == 'Ñ')
				$car = 'N';
			if ($car == 'ñ') 
				$car = 'n';
			$res = $res . $car;
		}
		
		$foto=$res.".gif";
	
	?>
  <div id="divPedidoDetalleImg" class="formatoGen"><img src="../imagenes_system/muestras/miniminis/<?php  echo "$foto";?>" width="30" height="30" /></div>
  <?php  } ?>
  <div id="divPedidoDetalleMatColor" class="datosFormatoGenClientes"><?php  echo "$Material $Color";?></div>
  <div id="divPedidoDetalleN2" class="datosFormatoGenClientes"><?php  echo "$N2";?></div>
  <div id="divPedidoDetalleN2m" class="datosFormatoGenClientes"><?php  echo "$N2m";?></div>
  <div id="divPedidoDetalleN3" class="datosFormatoGenClientes"><?php  echo "$N3";?></div>
  <div id="divPedidoDetalleN3m" class="datosFormatoGenClientes"><?php  echo "$N3m";?></div>
  <div id="divPedidoDetalleN4" class="datosFormatoGenClientes"><?php  echo "$N4";?></div>
  <div id="divPedidoDetalleN4m" class="datosFormatoGenClientes"><?php  echo "$N4m";?></div>
  <div id="divPedidoDetalleN5" class="datosFormatoGenClientes"><?php  echo "$N5";?></div>
  <div id="divPedidoDetalleN5m" class="datosFormatoGenClientes"><?php  echo "$N5m";?></div>
  <div id="divPedidoDetalleN6" class="datosFormatoGenClientes"><?php  echo "$N6";?></div>
  <div id="divPedidoDetalleN6m" class="datosFormatoGenClientes"><?php  echo "$N6m";?></div>
  <div id="divPedidoDetallePares" class="datosFormatoGenClientes"><?php  echo "$Pares";?></div>
  <div id="divPedidoDetalleTotal" class="datosFormatoGenClientes"><?php  echo "$Total";?></div>
  <div id="divPedidoDetallePrecio" class="formatoGen"><?php  echo "$Precio";?></div>
  <div id="divImgLineaDivPedidoDetalle"><img src="../menu/menu/linea.png" width="750" height="7" /></div>
  </div>
<?php 
		}
	}
?>

</div>
<div class="datosFormatoGenClientes" id="divPedidoDetalleAtras" onclick="document.getElementById('divGridPedidosClientesContenedorB').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor2').style.visibility='hidden';">Regresar</div>
<div id="divImgRegresarIcono"><a href="#"><img src="img/flecha-cliente-regresar" width="10" height="10" border="0"/></a></div>
<div id="divLblClienteNombre">Cliente:</div>
<div id="divLblClienteNombreTxt"><?php  echo "$txtCliente";?></div>
<div id="divLbTienda">Tienda:</div>
<div id="divLblTiendaNombre"><?php  echo "$txtTienda";?></div>
<div id="divVistaPedidoDetallelblPedido">No pedido:</div>
<div id="divVistaPedidoDetallelbDesclPedido"><?php  echo "$critIdPedido";?></div>
<div id="divVistaPedidoDetallelblFechPedido">Fecha de pedido:</div>
<div id="divVistaPedidoDetallelblFechaPedido"><?php  echo "$txtFechaPedido";?></div>

<div id="divPedidoDetalleGroupSuntotales">
  <div id="divPedidoDetalleSubtotalPar" class="formatoGen"><?php  echo "$sumaPares";?></div>
  <div id="divPedidoDetalleSubtotales" class="formatoGen">$<?php  echo "$sumaTotal";?></div>
</div><a href="hoja_pedido_impresion.php?idPedido=<?php  echo "$idPedido";?>&idTienda=<?php  echo "$idTienda";?>" target="_blank">
<div id="apDiv1"  class="formatoGen">Imprimir</div></a>
</body>
</html>