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
$idVendedor= "0";
	if(isset($_REQUEST['idVendedor'])){
		$idVendedor = $_REQUEST['idVendedor'];
	}
	
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link type="text/css" href= "../js/jquery-ui-1.8.14.custom/css/ui-lightness/jquery-ui-1.8.14.custom.css"  rel="Stylesheet" />	
<script type="text/javascript" src="../js/jquery-ui-1.8.14.custom/js/jquery-1.5.1.min.js" ></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.14.custom/js/jquery-ui-1.8.14.custom.min.js"></script>

<style type="text/css">
<!--
#divSistemaEmergente {
	position:absolute;
	width:620px;
	height:404px;
	z-index:2900;
	left: 69px;
	top: 3px;
	background-color: #FFF;
	visibility: hidden;
	border: thin solid #CCC;
}
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
	width:942px;
	height:30px;
	z-index:1;
	top: 1px;
	left: 0px;
}
#divPedidoDetalleHeaderFields {
	position:absolute;
	width:942px;
	height:20px;
	z-index:1;
	top: 53px;
	left: 24px;
	background-color: #000000;
}
#divPedidoDetalleContener {
	position:absolute;
	width:940px;
	height:330px;
	z-index:2;
	left: 24px;
	top: 72px;
	overflow: auto;
	border: thin solid #CCC;
}
#divPedidosDetalleCons {
	position:absolute;
	width:42px;
	height:16px;
	z-index:1;
	left: 2px;
	top: 3px;
}
#divPedidosDetalleEstilos {
	position:absolute;
	width:80px;
	height:16px;
	z-index:2;
	left: 79px;
	top: 3px;
}
#divPedidoDetalleMatColor {
	position:absolute;
	width:201px;
	height:16px;
	z-index:3;
	left: 162px;
	top: 3px;
}
#divPedidoDetalleN2 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:4;
	left: 368px;
	top: 3px;
}
#divPedidoDetalleN2m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:5;
	left: 385px;
	top: 3px;
	text-align: center;
}
#divPedidoDetalleN3 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:6;
	left: 402px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN3m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:7;
	left: 419px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN4 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:8;
	left: 436px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN4m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:9;
	left: 453px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN5 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:10;
	left: 470px;
	top: 3px;
	text-align: center;
}
#divPedidoDetalleN5m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:11;
	left: 487px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN6 {
	position:absolute;
	width:16px;
	height:16px;
	z-index:12;
	left: 504px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN6m {
	position:absolute;
	width:16px;
	height:16px;
	z-index:13;
	left: 522px;
	text-align: center;
	top: 3px;
}
#divPedidoDetallePares {
	position:absolute;
	width:35px;
	height:16px;
	z-index:14;
	left: 561px;
	top: 3px;
}
#divPedidoDetallePrecio {
	position:absolute;
	width:37px;
	height:16px;
	z-index:15;
	left: 613px;
	top: 3px;
}
#divPedidoDetalleTotal {
	position:absolute;
	width:39px;
	height:16px;
	z-index:16;
	left: 669px;
	top: 3px;
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
	width:213px;
	height:22px;
	z-index:3;
	left: 565px;
	top: 30px;
}
#divPedidoDetalleSubtotalPar {
	position:absolute;
	width:59px;
	height:16px;
	z-index:3;
	left: 6px;
	top: 5px;
	text-align: center;
}
#divPedidoDetalleSubtotales {
	position:absolute;
	width:69px;
	height:16px;
	z-index:4;
	left: 108px;
	top: 5px;
	text-align: center;
}
#divPedidoDetalleAtras {
	position:absolute;
	width:41px;
	height:15px;
	z-index:5;
	left: 911px;
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
	left: 900px;
	top: 0px;
}
#divLblClienteNombre {
	position:absolute;
	width:53px;
	height:14px;
	z-index:6;
	top: 0px;
	left: 22px;
}
#divLblClienteNombreTxt {
	position:absolute;
	width:381px;
	height:18px;
	z-index:7;
	left: 72px;
	top: 0px;
	text-align: left;
}
#divLbTienda {
	position:absolute;
	width:53px;
	height:14px;
	z-index:8;
	left: 22px;
	top: 24px;
}
#divLblTiendaNombre {
	position:absolute;
	width:342px;
	height:18px;
	z-index:9;
	left: 73px;
	top: 23px;
	text-align: left;
}
#divVistaPedidoDetallelblPedido {
	position:absolute;
	width:76px;
	height:14px;
	z-index:10;
	left: 728px;
	top: 0px;
}
#divVistaPedidoDetallelbDesclPedido {
	position:absolute;
	width:81px;
	height:18px;
	z-index:11;
	left: 803px;
	top: 0px;
	text-align: left;
}
#divVistaPedidoDetallelblFechPedido {
	position:absolute;
	width:97px;
	height:14px;
	z-index:12;
	left: 462px;
	top: 0px;
}
#divVistaPedidoDetallelblFechaPedido {
	position:absolute;
	width:146px;
	height:18px;
	z-index:13;
	left: 558px;
	top: 0px;
	text-align: left;
}
#divPedidoDetalleContenerDimImprimiri {
	position:absolute;
	width:58px;
	height:17px;
	z-index:14;
	left: 889px;
	top: 30px;
}
#divPedidoDetalleContenerDivBtnClonPedido {
	position:absolute;
	width:113px;
	height:17px;
	z-index:15;
	left: 754px;
	top: 31px;
	text-align: center;
}

.formatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
	text-align:center;
}
.gdFont{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#999;
	font-weight:600;
}
.gdFontRed{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#F00;
	font-weight:600;
}
.tipoEncabezdoEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	color:#FFF;
	text-align: center;
}
#apDiv1 {
	position:absolute;
	width:942px;
	height:51px;
	z-index:2901;
	left: 25px;
	top: 0px;
	border: thin solid #CCC;
}
#divToParDetalleClon {
	position:absolute;
	width:70px;
	height:14px;
	z-index:5;
	left: 1px;
	top: 2px;
}
#divToPrecDetalleClon {
	position:absolute;
	width:33px;
	height:14px;
	z-index:6;
	left: 120px;
	top: 2px;
}
-->
</style>
</head>
	
<body>
<label id="idVendedor" style="visibility:hidden"><?php echo "$idVendedor";?></label>
<div id="divPedidoDetalleHeaderFields">
  <div id="divPedidosDetalleEstilos" class="tipoEncabezdoEstadisticas">Estilo</div>
  <div id="divPedidosDetalleCons" class="tipoEncabezdoEstadisticas">Cons</div>
  <div id="divPedidoDetalleMatColor" class="tipoEncabezdoEstadisticas">Material / Color</div>
  <div id="divPedidoDetalleN2" class="tipoEncabezdoEstadisticas">2</div>
  <div id="divPedidoDetalleN2m" class="tipoEncabezdoEstadisticas">-</div>
  <div id="divPedidoDetalleN3" class="tipoEncabezdoEstadisticas">3</div>
  <div id="divPedidoDetalleN3m" class="tipoEncabezdoEstadisticas">-</div>
  <div id="divPedidoDetalleN4" class="tipoEncabezdoEstadisticas">4</div>
  <div id="divPedidoDetalleN4m" class="tipoEncabezdoEstadisticas">-</div>
  <div id="divPedidoDetalleN5" class="tipoEncabezdoEstadisticas">5</div>
  <div id="divPedidoDetalleN5m" class="tipoEncabezdoEstadisticas">-</div>
  <div id="divPedidoDetalleN6" class="tipoEncabezdoEstadisticas">6</div>
  <div id="divPedidoDetalleN6m" class="tipoEncabezdoEstadisticas">-</div>
  <div id="divPedidoDetallePares" class="tipoEncabezdoEstadisticas">Pares</div>
  <div id="divPedidoDetalleTotal" class="tipoEncabezdoEstadisticas">Total</div>
  <div id="divPedidoDetallePrecio" class="tipoEncabezdoEstadisticas">Precio</div> 
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
				$colo="#FFFFFF";
				if($cons % 2 == 0){
					$colo="#ddd8ce";
				}
	?>
	
  <div id="divPedidoDetalleFieldsContainer" style="background-color:<?php  echo "$colo";?>" > 
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
  <div id="divPedidoDetalleImg" class="formatoGen"><img src="../../imagenes_system/muestras/miniminis/<?php  echo "$foto";?>" width="30" height="30" /></div>
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
  </div>
<?php 
		}
	}
?>

</div>
<div class="datosFormatoGenClientes" id="divPedidoDetalleAtras" onclick="document.getElementById('divGridPedidosClientesContenedorB').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor2').style.visibility='hidden';">Regresar</div>
<div id="divImgRegresarIcono"><a href="#"><img src="../img/flecha-cliente-regresar" width="10" height="10" border="0"/></a></div>
<div  class="formatoGen"id="divLblClienteNombre">Cliente:</div>
<div  class="gdFont"id="divLblClienteNombreTxt"><?php  echo "$txtCliente";?></div>
<div  class="formatoGen" id="divLbTienda">Tienda:</div>
<div class="gdFont" id="divLblTiendaNombre"><?php  echo "$txtTienda";?></div>
<div class="formatoGen" id="divVistaPedidoDetallelblPedido">No pedido:</div>
<div  class="gdFontRed" id="divVistaPedidoDetallelbDesclPedido"><?php  echo "$critIdPedido";?></div>
<div class="formatoGen" id="divVistaPedidoDetallelblFechPedido">Fecha de pedido:</div>
<div  class="gdFont" id="divVistaPedidoDetallelblFechaPedido"><?php  echo "$txtFechaPedido";?></div>

<div id="divPedidoDetalleGroupSuntotales">
  <div id="divPedidoDetalleSubtotalPar" class="formatoGen"><?php  echo "$sumaPares";?></div>
  <div id="divPedidoDetalleSubtotales" class="formatoGen">$<label id="lblSumaTotal"> <?php  echo "$sumaTotal";?></label></div>
</div>
<a href="../hoja_pedido_impresion.php?idPedido=<?php  echo "$idPedido";?>&idTienda=<?php  echo "$idTienda";?>" target="_blank">
<div id="divPedidoDetalleContenerDimImprimiri"  class="gdFontRed"><img src="../img/btn-imprimir.jpg" width="76" height="18"  border="0"/></div></a>
<div id="divPedidoDetalleContenerDivBtnClonPedido" class="formatoGen" onclick="seleccionarTiendasAClonar();"><img src="../img/btn-clonar-pedido.jpg" width="130" height="18" /></div>
<div id="divSistemaEmergente"></div>
</body>
</html>