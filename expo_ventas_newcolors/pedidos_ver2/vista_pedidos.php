<?php 

	$critCliente = "";
	if(isset($_REQUEST['txtCritCliente'])){
		$critCliente = $_REQUEST['txtCritCliente'];
	}
	
	$critTienda = "";
	if(isset($_REQUEST['txtTienda'])){
		$critTienda = $_REQUEST['txtTienda'];
	}
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	$idEstilo=""; //1
	
	
?>
<script language="javascript">
		alert("Ok");
		</script>
<link rel="stylesheet" href="js/jquery-ui-1.8.14.custom/development-bundle/themes/base/jquery.ui.all.css" >
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/jquery-1.5.1.js" ></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.core.js"></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.widget.js"></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
 <link rel="stylesheet" href="js/jquery-ui-1.8.14.custom/development-bundle/demos/demos.css" >
 <script type="text/javascript">	
		alert("Ok");
		$('#txtInicioBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
		$('#txtFinBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
	
</script>
<style type="text/css">
<!--
#divRptPedidosClientesHeader2 {
	position:relative;
	width:760px;
	height:28px;
	z-index:1;
}
#divRptPedidosClientes {
	position:relative;
	width:760px;
	height:40px;
	z-index:1;
}

#divGridPedidosClientesContenedorB {
	position:absolute;
	width:790px;
	height:371px;
	z-index:3;
	overflow:auto;
	left: 10px;
	top: 58px;
}
#divGridPedidosClientesContenedor2 {
	position:absolute;
	width:790px;
	height:457px;
	z-index:2;
	left: 10px;
	top: -1px;
	background-color: #FFFFFF;
	visibility: hidden;
}
#divHeaderIdPedido {
	position:absolute;
	width:45px;
	height:23px;
	z-index:1;
}

#divHeaderCliente {
	position:absolute;
	width:260px;
	height:22px;
	z-index:2;
	left: 48px;
	top: 1px;
	text-align: center;
}
#divHeaderTienda {
	position:absolute;
	width:170px;
	height:23px;
	z-index:3;
	left: 311px;
	top: 0px;
	text-align: center;
}
#divHeaderPares {
	position:absolute;
	width:45px;
	height:23px;
	z-index:4;
	left: 484px;
	text-align: center;
}
#divHaederTotal {
	position:absolute;
	width:43px;
	height:22px;
	z-index:5;
	left: 532px;
}
#divHeaderFecha {
	position:absolute;
	width:104px;
	height:23px;
	z-index:6;
	left: 578px;
	text-align: center;
}
#divHeaderSitioPed {
	position:absolute;
	width:69px;
	height:22px;
	z-index:7;
	left: 685px;
	top: 0px;
}
#divRowIdPedido {
	position:absolute;
	width:45px;
	height:23px;
	z-index:1;
	text-align: center;
}

#divRowCliente {
	position:absolute;
	width:260px;
	height:22px;
	z-index:2;
	left: 48px;
	top: 0px;
	text-align: center;
}
#divRowTienda {
	position:absolute;
	width:170px;
	height:23px;
	z-index:3;
	left: 311px;
	top: 0px;
	text-align: center;
}
#divRowPares {
	position:absolute;
	width:45px;
	height:23px;
	z-index:4;
	left: 484px;
	text-align: center;
}
#divRowTotal {
	position:absolute;
	width:43px;
	height:23px;
	z-index:5;
	left: 532px;
	top: 0px;
	text-align: center;
}
#divRowFecha {
	position:absolute;
	width:104px;
	height:23px;
	z-index:6;
	left: 578px;
	text-align: center;
	top: 0px;
}
#divRowSitioPed {
	position:absolute;
	width:69px;
	height:22px;
	z-index:7;
	left: 685px;
	top: 0px;
	text-align: center;
}
.formatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
	text-align:center;
}

.datosFormatoGenClientes{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	color:#666;
	text-align:center;
}

.numPedidoFormatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	color:#333;
	font-weight:600;
	text-align:center;
}
.campTxtFormatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#999;
	font-weight:600;
	text-align:left;
	height:13px;
}

#divBuscador {
	position:absolute;
	width:790px;
	height:51px;
	z-index:3;
	top: 4px;
}
#divTxtCritCliente {
	position:absolute;
	width:197px;
	height:16px;
	z-index:1;
	left: 59px;
	top: 28px;
	text-align:left;
}
#divlblCritCliente {
	position:absolute;
	width:55px;
	height:19px;
	z-index:2;
	left: 0px;
	top: 29px;
	text-align: center;
}
#divBtnEnviar {
	position:absolute;
	width:51px;
	height:25px;
	z-index:3;
	left: 602px;
	top: 20px;
	text-align: right;
}

#divTiendaVistaPedidoss {
	position:absolute;
	width:68px;
	height:19px;
	z-index:1;
	left: 279px;
	top: 4px;
	text-align: center;
}
#divVerPedidosCritTienda {
	position:absolute;
	width:155px;
	height:15px;
	z-index:2;
	left: 366px;
	top: 3px;
	text-align: center;
}

#divBtnEnviarPedidos {
	position:absolute;
	width:51px;
	height:27px;
	z-index:4;
	left: 690px;
	top: 18px;
}
#divLinieaSeparadorVPedidos {
	position:absolute;
	width:750px;
	height:11px;
	z-index:1;
	top: 26px;
	left: -46px;
}
#divBuscadortxtFechaInicio {
	position:absolute;
	width:139px;
	height:25px;
	z-index:5;
	left: 120px;
	top: 51px;
}
#divBuscadorFechaInicio {
	position:absolute;
	width:67px;
	height:19px;
	z-index:6;
	left: 47px;
	top: 51px;
	text-align: right;
}
#divBuscadorFechaInicioLbl {
	position:absolute;
	width:43px;
	height:17px;
	z-index:7;
	left: 285px;
	top: 51px;
	text-align: right;
}
#divBuscadorFechaFin {
	position:absolute;
	width:200px;
	height:23px;
	z-index:8;
	left: 336px;
	top: 51px;
}
#divTitutloPedidosCLientes {
	position:absolute;
	width:200px;
	height:21px;
	z-index:9;
	text-align: center;
	left: 165px;
	top: 1px;
}
#divGridPedidosClientesContenedorRows {
	position:absolute;
	width:785px;
	height:332px;
	z-index:4;
	left: 0px;
	top: 33px;
	overflow: auto;
}
#divGridPedidosClientesImprimir {
	position:absolute;
	width:73px;
	height:17px;
	z-index:10;
	left: 609px;
	top: 18px;
	text-align: center;
}
#apDiv1 {
	position:absolute;
	width:48px;
	height:17px;
	z-index:1;
	left: 483px;
	top: 57px;
}
#divGridPedidosClientesContenedorBSubtotalPares {
	position:absolute;
	width:44px;
	height:16px;
	z-index:4;
	left: 494px;
	top: 60px;
}
#divGridPedidosClientesContenedorBDivGranTotal {
	position:absolute;
	width:44px;
	height:16px;
	z-index:5;
	left: 542px;
	top: 60px;
}
-->
</style>

<form action="" method="get">
<div id="divBuscador"" >
  <div id="divTxtCritCliente">
    <label>
      <input class="campTxtFormatoGen" name="txtCritCliente" type="text" id="txtCritCliente" size="30" />
    </label>
  </div>
  <div id="divlblCritCliente" class="formatoGen">Cliente</div>
  <div id="apDiv3">
    <div id="divTiendaVistaPedidoss" class="formatoGen">Tienda</div>
    <div id="divVerPedidosCritTienda">
      <label>
        <input  class="campTxtFormatoGen" name="txtTienda" type="text" id="txtTienda" size="30" />
      </label>
    </div>
  </div>
  <div id="divTitutloPedidosCLientes" class="formatoGen">Pedidos</div>
  <div id="divBtnEnviarPedidos"><a href="#" onClick="llamarasincrono('pedidos_ver2/vista_pedidos_rows_content.php?txtCritCliente='+document.getElementById('txtCritCliente').value+'&txtTienda='+document.getElementById('txtTienda').value,'divGridPedidosClientesContenedorRows');document.getElementById('divGridPedidosClientesContenedorB').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor2').style.visibility='hidden';"><img src="img/btn_enviar.jpg" width="50" height="25" border="0" /></a></div>

</div>
</form>

<div id="divGridPedidosClientesContenedor2">
  
</div>
<div id="divGridPedidosClientesContenedorB">
	
	<div id="divRptPedidosClientesHeader2">
	  <div id="divHeaderCliente" class="formatoGen">Cliente</div>
	  <div id="divHeaderIdPedido" class="formatoGen">Pedido</div>
	  <div id="divHeaderTienda" class="formatoGen">Tienda</div>
	  <div id="divHeaderPares" class="formatoGen">Pares</div>
	  <div id="divHaederTotal" class="formatoGen">Total</div>
	  <div id="divHeaderFecha" class="formatoGen">Fecha</div>
	  <div id="divHeaderSitioPed" class="formatoGen">Sitio Ped</div>
  </div>
   <div id="divGridPedidosClientesContenedorRows"></div>
</div>
<script type="text/javascript">	
		$(function() {
			$('#txtInicioBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
			$('#txtFinBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
		});
</script>
