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
	width:754px;
	height:42px;
	z-index:1;
	top: 1px;
	left: 0px;
}
#divPedidoDetalleHeaderFields {
	position:absolute;
	width:980px;
	height:18px;
	z-index:1;
	top: 56px;
	left: -5px;
	background-color: #000000;
}
#divPedidoDetalleContener {
	position:absolute;
	width:779px;
	height:286px;
	z-index:2;
	left: -2px;
	top: 88px;
	overflow: auto;
}
#divPedidosDetalleCons {
	position:absolute;
	width:42px;
	height:14px;
	z-index:1;
	left: 2px;
	top: 3px;
}
#divPedidosDetalleCons2 {
	position:absolute;
	width:42px;
	height:14px;
	z-index:1;
	left: 2px;
	top: 3px;
}
#divPedidosDetalleEstilos2 {
	position:absolute;
	width:80px;
	height:14px;
	z-index:2;
	left: 79px;
	top: 3px;
}
#divPedidosDetalleEstilos3 {
	position:absolute;
	width:80px;
	height:14px;
	z-index:2;
	left: 79px;
	top: 3px;
}
#divPedidosDetalleEstilos {
	position:absolute;
	width:80px;
	height:14px;
	z-index:2;
	left: 79px;
	top: 3px;
}
#divPedidoDetalleMatColor {
	position:absolute;
	width:201px;
	height:14px;
	z-index:3;
	left: 162px;
	top: 3px;
}
#divPedidoDetalleMatColor2 {
	position:absolute;
	width:201px;
	height:14px;
	z-index:3;
	left: 162px;
	top: 3px;
}
#divPedidoDetalleN2 {
	position:absolute;
	width:16px;
	height:14px;
	z-index:4;
	left: 368px;
	top: 3px;
}
#divPedidoDetalleN2B {
	position:absolute;
	width:16px;
	height:14px;
	z-index:4;
	left: 368px;
	top: 3px;
}
#divPedidoDetalleN2m {
	position:absolute;
	width:16px;
	height:14px;
	z-index:5;
	left: 385px;
	top: 3px;
	text-align: center;
}
#divPedidoDetalleN2mB {
	position:absolute;
	width:16px;
	height:14px;
	z-index:5;
	left: 385px;
	top: 3px;
	text-align: center;
}
#divPedidoDetalleN3 {
	position:absolute;
	width:16px;
	height:14px;
	z-index:6;
	left: 402px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN3B {
	position:absolute;
	width:16px;
	height:14px;
	z-index:6;
	left: 402px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN3m {
	position:absolute;
	width:16px;
	height:14px;
	z-index:7;
	left: 419px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN3mB {
	position:absolute;
	width:16px;
	height:14px;
	z-index:7;
	left: 419px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN4 {
	position:absolute;
	width:16px;
	height:14px;
	z-index:8;
	left: 436px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN4B {
	position:absolute;
	width:16px;
	height:14px;
	z-index:8;
	left: 436px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN4m {
	position:absolute;
	width:16px;
	height:14px;
	z-index:9;
	left: 453px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN4mB {
	position:absolute;
	width:16px;
	height:14px;
	z-index:9;
	left: 453px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN5 {
	position:absolute;
	width:16px;
	height:14px;
	z-index:10;
	left: 470px;
	top: 3px;
	text-align: center;
}
#divPedidoDetalleN5B {
	position:absolute;
	width:16px;
	height:14px;
	z-index:10;
	left: 470px;
	top: 3px;
	text-align: center;
}
#divPedidoDetalleN5m {
	position:absolute;
	width:16px;
	height:14px;
	z-index:11;
	left: 487px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN5mB {
	position:absolute;
	width:16px;
	height:14px;
	z-index:11;
	left: 487px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN6 {
	position:absolute;
	width:16px;
	height:14px;
	z-index:12;
	left: 504px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN6B {
	position:absolute;
	width:16px;
	height:14px;
	z-index:12;
	left: 504px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN6m {
	position:absolute;
	width:16px;
	height:14px;
	z-index:13;
	left: 522px;
	text-align: center;
	top: 3px;
}
#divPedidoDetalleN6mB {
	position:absolute;
	width:16px;
	height:14px;
	z-index:13;
	left: 522px;
	text-align: center;
	top: 3px;
}
#divPedidoDetallePares {
	position:absolute;
	width:35px;
	height:14px;
	z-index:14;
	left: 561px;
	top: 3px;
}
#divPedidoDetallePares2 {
	position:absolute;
	width:35px;
	height:14px;
	z-index:14;
	left: 561px;
	top: 4px;
}
#divPedidoDetallePrecio {
	position:absolute;
	width:37px;
	height:14px;
	z-index:15;
	left: 613px;
	top: 3px;
}
#divPedidoDetallePrecio2 {
	position:absolute;
	width:37px;
	height:14px;
	z-index:15;
	left: 613px;
	top: 5px;
}

#divPedidoDetalleTotal {
	position:absolute;
	width:39px;
	height:14px;
	z-index:16;
	left: 669px;
	top: 3px;
}
#divPedidoDetalleTotal2 {
	position:absolute;
	width:39px;
	height:21px;
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
	left: 929px;
	top: 18px;
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
	left: 924px;
	top: 18px;
}
#divLblClienteNombre {
	position:absolute;
	width:43px;
	height:14px;
	z-index:6;
	top: 15px;
	left: 0px;
	text-align: left;
}
#divLblClienteNombreTxt2BB {
	position:absolute;
	width:323px;
	height:18px;
	z-index:7;
	left: 47px;
	top: 15px;
}
#divLbTienda {
	position:absolute;
	width:53px;
	height:14px;
	z-index:8;
	left: 395px;
	top: 16px;
}
#divLblTiendaNombre {
	position:absolute;
	width:200px;
	height:20px;
	z-index:9;
	left: 453px;
	top: 15px;
}
#divVistaPedidoDetallelblPedido {
	position:absolute;
	width:58px;
	height:14px;
	z-index:10;
	left: -2px;
	top: 37px;
}
#divVistaPedidoDetallelbDesclPedido {
	position:absolute;
	width:81px;
	height:21px;
	z-index:11;
	left: 63px;
	top: 36px;
}
#divVistaPedidoDetallelblFechPedido {
	position:absolute;
	width:90px;
	height:14px;
	z-index:12;
	left: 175px;
	top: 38px;
}
#divVistaPedidoDetallelblFechaPedido {
	position:absolute;
	width:232px;
	height:18px;
	z-index:13;
	left: 267px;
	top: 38px;
}
#divPedidoDetalleContenerDimImprimiri {
	position:absolute;
	width:46px;
	height:15px;
	z-index:14;
	left: 929px;
	top: 38px;
}
#divPedidoDetalleContenerDivBtnClonPedido {
	position:absolute;
	width:113px;
	height:17px;
	z-index:15;
	left: 783px;
	top: 56px;
	text-align: center;
}

.formatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
	text-align:left;
}
.tipoEncabezdoEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	color:#FFF;
	text-align: center;
}
.campTxtFormatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#999;
	font-weight:600;
	text-align:left;
	height:13px;
	left: 435px;
	top: 68px;
}
#apDiv1 {
	position:absolute;
	width:980px;
	height:8px;
	z-index:2901;
	left: -5px;
	top: 4px;
}

-->
</style>
</head>
	
<body>
<label  class="campTxtFormatoGen" id="idVendedor" style="idVendedor"><?php echo "idVendedor";?></label>
<div id="divPedidoDetalleHeaderFields">
  <div id="divPedidosDetalleEstilos3" class="tipoEncabezdoEstadisticas">Estilo</div>
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
  <div id="divPedidoDetalleImg" class="formatoGen"><img src="../../imagenes_system/muestras/miniminis/<?php  echo "$foto";?>" width="30" height="30" /></div>
  <?php  } ?>
  <div id="divPedidoDetalleMatColor2" class="datosFormatoGenClientes"><?php  echo "$Material $Color";?></div>
  <div id="divPedidoDetalleN2B" class="datosFormatoGenClientes"><?php  echo "$N2";?></div>
  <div id="divPedidoDetalleN2mB" class="datosFormatoGenClientes"><?php  echo "$N2m";?></div>
  <div id="divPedidoDetalleN3B" class="datosFormatoGenClientes"><?php  echo "$N3";?></div>
  <div id="divPedidoDetalleN3mB" class="datosFormatoGenClientes"><?php  echo "$N3m";?></div>
  <div id="divPedidoDetalleN4B" class="datosFormatoGenClientes"><?php  echo "$N4";?></div>
  <div id="divPedidoDetalleN4mB" class="datosFormatoGenClientes"><?php  echo "$N4m";?></div>
  <div id="divPedidoDetalleN5B" class="datosFormatoGenClientes"><?php  echo "$N5";?></div>
  <div id="divPedidoDetalleN5mB" class="datosFormatoGenClientes"><?php  echo "$N5m";?></div>
  <div id="divPedidoDetalleN6B" class="datosFormatoGenClientes"><?php  echo "$N6";?></div>
  <div id="divPedidoDetalleN6mB" class="datosFormatoGenClientes"><?php  echo "$N6m";?></div>
  <div id="divPedidoDetallePares2" class="datosFormatoGenClientes"><?php  echo "$Pares";?></div>
  <div id="divPedidoDetalleTotal2" class="datosFormatoGenClientes"><?php  echo "$Total";?></div>
  <div id="divPedidoDetallePrecio2" class="formatoGen"><?php  echo "$Precio";?></div>
  <div id="divImgLineaDivPedidoDetalle"><img src="../menu/menu/linea.png" width="750" height="7" /></div>
  </div>
<?php 
		}
	}
?>

</div>
<div class="datosFormatoGenClientes" id="divPedidoDetalleAtras" onclick="document.getElementById('divGridPedidosClientesContenedorB').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor2').style.visibility='hidden';">Regresar</div>
<div id="divImgRegresarIcono"><a href="#"><img src="../img/flecha-cliente-regresar" width="10" height="10" border="0"/></a></div>
<div  class="formatoGen" id="divLblClienteNombre">Cliente:</div>
<div  class="campTxtFormatoGen" id="divLblClienteNombreTxt2BB"><?php  echo "$txtCliente";?></div>
<div  class="formatoGen" id="divLbTienda">Tienda:</div>
<div  class="campTxtFormatoGen" id="divLblTiendaNombre"><?php  echo "$txtTienda";?></div>
<div  class="formatoGen" id="divVistaPedidoDetallelblPedido">No pedido:</div>
<div  class="campTxtFormatoGen" id="divVistaPedidoDetallelbDesclPedido"><?php  echo "$critIdPedido";?></div>
<div  class="formatoGen" id="divVistaPedidoDetallelblFechPedido">Fecha de pedido:</div>
<div  class="campTxtFormatoGen"id="divVistaPedidoDetallelblFechaPedido"><?php  echo "$txtFechaPedido";?></div>

<div id="divPedidoDetalleGroupSuntotales">
  <div id="divPedidoDetalleSubtotalPar" class="formatoGen"><?php  echo "$sumaPares";?></div>
  <div id="divPedidoDetalleSubtotales" class="formatoGen">$<label id="lblSumaTotal"> <?php  echo "$sumaTotal";?></label></div>
</div>
<a href="../hoja_pedido_impresion.php?idPedido=<?php  echo "$idPedido";?>&idTienda=<?php  echo "$idTienda";?>" target="_blank">
<div id="divPedidoDetalleContenerDimImprimiri"  class="formatoGen">Imprimir</div></a>
<div id="divPedidoDetalleContenerDivBtnClonPedido" class="formatoGen" onclick="seleccionarTiendasAClonar();"><img src="../img/clonar-pedido.jpg" width="140" height="18" /></div>
<div id="divSistemaEmergente"></div>
<div id="apDiv1"><img src="../menu/menu/linea.png" width="980" height="7" /></div>
</body>
</html>