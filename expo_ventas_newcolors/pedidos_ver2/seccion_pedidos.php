

	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/nc-icono.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>new colors shoes</title>

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


<link rel="stylesheet" href="../js/jquery-ui-1.8.14.custom/development-bundle/themes/base/jquery.ui.all.css">
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/jquery-1.5.1.js"></script>
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.core.js"  ></script>
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
    <script language="JavaScript" type="text/javascript" src="../js/codigo.js"></script>
    <script language="JavaScript" type="text/javascript" src="../js/functions.js"></script>
	<link rel="stylesheet" href="../js/jquery-ui-1.8.14.custom/development-bundle/demos/demos.css">
	<script>
		$(function() {
			$("#txtFechaIniVerPedidos").datepicker();
			$("#txtFechaIniVerPedidos").datepicker("option", "dateFormat", "yy/mm/dd");
		});
		$(function() {
			$("#txtFechaFinVerPedidos").datepicker();
			$("#txtFechaFinVerPedidos").datepicker("option", "dateFormat", "yy/mm/dd");
		});
	</script>


<link href="seccion_pedidos.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
body {
	background-color: #F0F0F0;
	background-repeat: no-repeat;
	text-decoration: none;
}
#facebook {
	position:absolute;
	width:22px;
	height:22px;
	z-index:2;
	left: 774px;
	top: 45px;
}
#twitter{
	position:absolute;
	width:22px;
	height:33px;
	z-index:2;
	left: 731px;
	top: 47px;
}
#apDiv4 {
	position:absolute;
	width:554px;
	height:31px;
	z-index:7;
	left: 369px;
}
#apDiv5 {
	position:absolute;
	width:128px;
	height:19px;
	z-index:1;
	left: 11px;
	top: 1px;
}
#apDiv6 {
	position:absolute;
	width:21px;
	height:19px;
	z-index:2;
	left: 23px;
	top: 1px;
}
#apDiv7 {
	position:absolute;
	width:106px;
	height:13px;
	z-index:3;
	left: 46px;
	top: 0px;
}
#apDiv8 {
	position:absolute;
	width:457px;
	height:22px;
	z-index:4;
	left: 155px;
	top: -2px;
	text-align: right;
}
#busquedaAd {
	position:absolute;
	width:50px;
	height:22px;
	z-index:7;
	left: 892px;
	top: 28px;
}
#face {
	position:absolute;
	width:16px;
	height:15px;
	z-index:8;
	left: 902px;
	top: 60px;
}
#twiter {
	position:absolute;
	width:16px;
	height:15px;
	z-index:9;
	left: 927px;
	top: 60px;
}
#divConMenInIndex {
	position:absolute;
	width:960px;
	height:70px;
	z-index:1;
	top: 60px;
	left: -1px;
}

#apDiv14 {
	position:absolute;
	width:330px;
	height:18px;
	z-index:2;
	left: 5px;
	top: 21px;
}
#apDiv15 {
	position:absolute;
	width:82px;
	height:17px;
	z-index:1;
}
#apDiv16 {
	position:absolute;
	width:133px;
	height:18px;
	z-index:2;
	left: 104px;
}
#apDiv17 {
	position:absolute;
	width:59px;
	height:19px;
	z-index:3;
	left: 255px;
}
#apDiv18 {
	position:absolute;
	width:231px;
	height:39px;
	z-index:1;
}
#apDiv19 {
	position:absolute;
	width:206px;
	height:42px;
	z-index:2;
	left: 247px;
}
#piePag {
	position:absolute;
	width:960px;
	height:50px;
	z-index:2;
	top: 480px;
	left: 0px;
}
#pie {
	top: 563px;
	left:1px;
}
#subscribe {
	position:absolute;
	width:375px;
	height:27px;
	z-index:1;
	top: 16px;
}
#getnews {
	position:absolute;
	width:110px;
	height:13px;
	z-index:1;
	top: 0px;
}
#txtcam2 {
	position:absolute;
	width:123px;
	height:13px;
	z-index:2;
	left: 118px;
}
#botonSub {
	position:absolute;
	width:58px;
	height:17px;
	z-index:3;
	left: 249px;
	top: -1px;
}
#infoEmp {
	position:absolute;
	width:274px;
	height:51px;
	z-index:2;
	left: 427px;
}
#datos1 {
	position:absolute;
	width:272px;
	height:15px;
	z-index:1;
	left: 2px;
}
#datos2 {
	position:absolute;
	width:273px;
	height:15px;
	z-index:2;
	top: 17px;
	left: 2px;
}
#datos3 {
	position:absolute;
	width:252px;
	height:15px;
	z-index:3;
	top: 31px;
	left: 22px;
}
#face3elem {
	position:absolute;
	width:222px;
	height:49px;
	z-index:3;
	left: 717px;
	top: -1px;
}
#fotoface {
	position:absolute;
	width:40px;
	height:40px;
	z-index:1;
	left: 1px;
}
#newface {
	position:absolute;
	width:166px;
	height:17px;
	z-index:2;
	left: 51px;
}
#like {
	position:absolute;
	width:75px;
	height:27px;
	z-index:3;
	top: 20px;
	left: 51px;
}
.face2 {
	color: #039;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;

}
#apDiv33 {
	position:absolute;
	width:949px;
	height:27px;
	z-index:1;
	top: -8px;
	left: -1px;
}
#apDiv34 {
	position:absolute;
	width:136px;
	height:13px;
	z-index:1;
	left: 5px;
}
#apDiv35 {
	position:absolute;
	width:87px;
	height:13px;
	z-index:2;
	left: 153px;
	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
	top: 4px;
}
#apDiv36 {
	position:absolute;
	width:79px;
	height:13px;
	z-index:3;
	left: 252px;
	top: 4px;
}
#apDiv37 {
	position:absolute;
	width:38px;
	height:13px;
	z-index:4;
	left: 342px;
	top: 4px;
}
#apDiv38 {
	position:absolute;
	width:88px;
	height:13px;
	z-index:5;
	left: 393px;
	top: 4px;
}
#apDiv39 {
	position:absolute;
	width:72px;
	height:13px;
	z-index:6;
	left: 494px;
	top: 4px;
}

#apDiv41 {
	position:absolute;
	width:69px;
	height:13px;
	z-index:8;
	left: 644px;
	top: 4px;
}
#apDiv42 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
}
#apDiv43 {
	position:absolute;
	width:58px;
	height:13px;
	z-index:1;
	left: 337px;
	top: 3px;
}
#apDiv44 {
	position:absolute;
	width:81px;
	height:13px;
	z-index:9;
	left: 779px;
	top: 4px;
}
#apDiv45 {
	position:absolute;
	width:42px;
	height:13px;
	z-index:10;
	left: 724px;
	top: 4px;
}

a:link {
	color: #666;
}
#apDiv47 {
	position:absolute;
	width:226px;
	height:35px;
	z-index:12;
	padding-top: 9px;
	padding-left: 9px;
}
#menu-principalIndex {
	position:absolute;
	width:615px;
	height:25px;
	z-index:12;
	top: 49px;
	left: 20px;
}
-->
</style>
<link rel="stylesheet" type="text/css" href=""/StyleSheet.css">
<link rel="stylesheet" type="text/css" href="css/contacto_diseno.css">
<style type="text/css">
<!--


#divSSucribe {
	position:absolute;
	width:48px;
	height:11px;
	z-index:1;
	left: 5px;
	top: 3px;
}
#divPuBliNc {
	position:absolute;
	width:929px;
	height:510px;
	z-index:12;
	left: 15px;
	top: 11px;
}
#divSepIndexBarrSm2 {
	position:absolute;
	width:2px;
	height:16px;
	z-index:1001;
	left: 130px;
	top: 53px;
}
#diVLineaSSeparadorINd2 {
	position:absolute;
	width:200px;
	height:8px;
	z-index:2;
	left: 14px;
	top: 10px;
}
#apDiv30 {
	position:absolute;
	width:928px;
	height:16px;
	z-index:2;
}
#divSombraEncabezado_2012 {
	position:absolute;
	width:930px;
	height:12px;
	z-index:1;
	left: 0px;
	top: 497px;
}


#apDiv31 {
	position:absolute;
	width:172px;
	height:480px;
	z-index:5;
	top: 8px;
}
#apDiv32 {
	position:absolute;
	width:761px;
	height:477px;
	z-index:5;
	left: 211px;
	top: 11px;
}





#divRptPedidosClientesHeader2 {
	position:relative;
	width:952px;
	height:20px;
	z-index:1;
	background-color: #000000;
	padding: 0px;
	top: 63px;
	left: 30px;
}
#divRptPedidosClientes {
	position:relative;
	width:760px;
	height:40px;
	z-index:1;
}

#divGridPedidosClientesContenedorB88 {
	position:absolute;
	width:980px;
	height:400px;
	z-index:3;
	left: 22px;
	top: 102px;
}
#divGridPedidosClientesContenedor288 {
	position:absolute;
	width:790px;
	height:457px;
	z-index:2;
	left: 8px;
	top: 130px;
	background-color: #FFFFFF;
	visibility: hidden;
}
#divHeaderIdPedido {
	position:absolute;
	width:45px;
	height:14px;
	z-index:1;
	top: 3px;
}

#divHeaderCliente {
	position:absolute;
	width:260px;
	height:14px;
	z-index:2;
	left: 48px;
	top: 3px;
	text-align: center;
}
#divHeaderTienda {
	position:absolute;
	width:158px;
	height:14px;
	z-index:3;
	left: 311px;
	top: 3px;
	text-align: center;
}
#divHeaderPares {
	position:absolute;
	width:45px;
	height:14px;
	z-index:4;
	left: 476px;
	text-align: center;
	top: 3px;
}
#divHaederTotal {
	position:absolute;
	width:43px;
	height:14px;
	z-index:5;
	left: 527px;
	top: 3px;
}
#divHeaderFecha {
	position:absolute;
	width:55px;
	height:14px;
	z-index:6;
	left: 589px;
	text-align: center;
	top: 3px;
}
#divHeaderSitioPed {
	position:absolute;
	width:46px;
	height:14px;
	z-index:7;
	left: 706px;
	top: 3px;
	text-align: center;
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
	text-align:left;
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
	height:auto;
}

#divBuscador {
	position:absolute;
	width:989px;
	height:90px;
	z-index:3;
	top: 11px;
	left: 7px;
}
#divTxtCritCliente22 {
	position:absolute;
	width:105px;
	height:14px;
	z-index:1;
	left: 73px;
	top: 37px;
	text-align:left;
}
#divlblCritCliente22F {
	position:absolute;
	width:36px;
	height:14px;
	z-index:2;
	left: 31px;
	top: 40px;
	text-align: left;
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
	width:38px;
	height:14px;
	z-index:1;
	left: 223px;
	top: 40px;
	text-align: left;
}
#divGridPedidosClientesContenedorBDivTienda {
	position:absolute;
	width:93px;
	height:14px;
	z-index:2;
	left: 260px;
	top: 37px;
	text-align: left;
}

#divBtnEnviarPedidosF {
	position:absolute;
	width:51px;
	height:17px;
	z-index:4;
	left: 918px;
	top: 39px;
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
	width:93px;
	height:33px;
	z-index:9;
	text-align: center;
	left: 31px;
	top: -1px;
}
#divGridPedidosClientesContenedorRows {
	position:absolute;
	width:951px;
	height:389px;
	z-index:4;
	left: 15px;
	top: 0px;
	overflow:auto;
	border: thin solid #CCC;
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
#divFechaPedidosVer22 {
	position:absolute;
	width:70px;
	height:14px;
	z-index:10;
	left: 397px;
	top: 40px;
}
#divGridPedidosClientesContenedorBDivTxtIni {
	position:absolute;
	width:121px;
	height:13px;
	z-index:11;
	left: 465px;
	top: 39px;
}
#divGridPedidosClientesContenedorBDivFechaFin {
	position:absolute;
	width:55px;
	height:15px;
	z-index:12;
	left: 595px;
	top: 40px;
}
#divGridPedidosClientesContenedorBDivtxtFechaFin {
	position:absolute;
	width:126px;
	height:14px;
	z-index:13;
	left: 648px;
	top: 39px;
	text-align: left;
}
#divGridPedidosClientesContenedorBlblLugarPedido {
	position:absolute;
	width:73px;
	height:14px;
	z-index:14;
	left: 773px;
	top: 40px;
}
#divGridPedidosClientesContenedorBDivComboLugar {
	position:absolute;
	width:72px;
	height:22px;
	z-index:15;
	left: 842px;
	top: 38px;
}
#divHeaderLugarPedido {
	position:absolute;
	width:84px;
	height:14px;
	z-index:8;
	left: 758px;
	top: 3px;
	text-align: center;
}
#divHeaderLevantoPedido {
	position:absolute;
	width:89px;
	height:14px;
	z-index:9;
	left: 846px;
	top: 3px;
}
.tipoEncabezdoEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	color:#FFF;
	text-align: center;
}
#divSimulacroPedidosVer2 {
	position:absolute;
	width:980px;
	height:345px;
	z-index:1;
	left: 6px;
	top: 131px;
	background-color: #dddbd1;
	border: thin solid #CCC;
}



-->
</style>
</head>


<body onload="llamarasincrono('vista_pedidos_rows_content_ver2.php?txtCritCliente='+document.getElementById('txtCritCliente').value+'&txtTienda='+document.getElementById('txtTienda').value+'&txtFechaIni='+document.getElementById('txtFechaIniVerPedidos').value+'&txtFechaFin='+document.getElementById('txtFechaFinVerPedidos').value+'&lugarPed='+document.getElementById('comboLugar').options[document.getElementById('comboLugar').selectedIndex].text,'divGridPedidosClientesContenedorRows');document.getElementById('divGridPedidosClientesContenedorB88').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor288').style.visibility='hidden';" >

<label id="lblTipoCatalogoMostrado" style="display:none">Muestrario</label>
<label id="lblContElementsCarro" style="display:none">0</label>
<div id="principal">
  <div id="encabezado">
  <div id="divSepEstadisticas"><img src="../menu/menu/linea.png" width="935" height="7" /></div>
  <div id="divBodyRedesSociales">
      <div id="divRSocial3"><a href="http://www.youtube.com/watch?v=-aLzuF-F694" target="_blank"><img src="../img/icono-youtube.jpg" width="51" height="20"  border="0"/></a></div>
      <div id="divRSocial2"><a href="http://www.twitter.com/newcolors_shoes" target="_blank"><img src="../img/icono-twitter.jpg" width="16" height="16" border="0" /></a></div>
      <div id="divRSocial1"><a href="http://www.facebook.com/pages/New-Colors-Shoes/117745731571808" target="_blank"><img src="../img/icono-facebook.jpg" width="16" height="16" border="0" /></a></div>
    </div>
  <div id="divConteBusqueda">
      <div id="divBusq11">
        <label>
          <input  class="barraTexMenPrin" type="text" name="textfield2" id="textfield2" />
        </label>
      </div>
      <div id="divBusq2">
        <div  class="whiteinfo" id="divBusq3">Busqueda</div>
      <img src="../img/search-1.jpg" width="56" height="17" /></div>
      <div id="divBusq4"><span class="info">Búsqueda Avanzada</span></div>
    </div>
  <div id="divBodyMenu">
      <div id="divBtnMenu1"><img src="../menu/menu/imgMenuIndexInicio.png" width="39" height="14" /></div>
      <div id="divBtnMenu2"><img src="../menu/menu/imgMenuIndexSiguenos.png" width="54" height="14" />
        <div id="divBtnMenu3"><img src="../source/baritaSM.jpg" width="2" height="12" /></div>
      </div>
      <div id="divBtnMenu4"><img src="../menu/menu/imgMenuIndexTiendaVirtual.png" width="78" height="14" /></div>
      <div id="divBtnMenu5"><img src="../menu/menu/imgMenuIndexTendencias.png" width="56" height="14" /></div>
      <div id="divBtnMenu6"><img src="../menu/menu/imgMenuIndexContacto.png" width="45" height="14" /></div>
      <div id="divBtnMenu7"><img src="../menu/menu/imgMenuIndexEmpresa.png" width="45" height="14" /></div>
    </div>
  <div id="divLogoNC"><img src="../img/logo.gif" width="266" height="35" /></div>
  </div>
  
  
  
  
  

  
  
  <div id="divContenidoSeccionPedidos8b">
<center>
     
            <center>
            
            	<div id="divBuscador"" >
            	  <div id="divRptPedidosClientesHeader2">
            	    <div id="divHeaderCliente" class="tipoEncabezdoEstadisticas">Cliente</div>
            	    <div id="divHeaderIdPedido" class="tipoEncabezdoEstadisticas">Pedido</div>
            	    <div id="divHeaderTienda" class="tipoEncabezdoEstadisticas">Tienda</div>
            	    <div id="divHeaderPares" class="tipoEncabezdoEstadisticas">Pares</div>
            	    <div id="divHaederTotal" class="tipoEncabezdoEstadisticas">Total</div>
            	    <div id="divHeaderFecha" class="tipoEncabezdoEstadisticas">Fecha</div>
            	    <div id="divHeaderSitioPed" class="tipoEncabezdoEstadisticas">Tipo</div>
            	    <div id="divHeaderLevantoPedido" class="tipoEncabezdoEstadisticas">Pedido por</div>
            	    <div id="divHeaderLugarPedido" class="tipoEncabezdoEstadisticas">Lugar pedido</div>
          	    </div>
            	  <div id="divTxtCritCliente22">
            	    <label>
        <input class="campTxtFormatoGen1" name="txtCritCliente" type="text" id="txtCritCliente" size="20" />
      </label>
    </div>
  <div id="divlblCritCliente22F" class="formatoGen">Cliente</div>
  <div id="divGridPedidosClientesContenedorBDivCabecera">
    <div id="divTiendaVistaPedidoss" class="formatoGen">Tienda:</div>
    <div id="divGridPedidosClientesContenedorBDivTienda">
      <label>
        <input  class="campTxtFormatoGen1" name="txtTienda" type="text" id="txtTienda" size="18" />
      </label>
    </div>
  </div>
  <div id="divGridPedidosClientesContenedorBDivComboLugar">
    <label>
      <select  class="campTxtFormatoGen" name="comboLugar" id="comboLugar">
      <option value="0" selected>Todos</option>
      <?php
	  	$sql= "select * from lugaresDePedido ";
		 if($result=$mysqli->query($sql)){
		
		$cont=1;
		while($obj=$result->fetch_object()){
			$idLugarPedido=$obj->idLugarPedido;
			$lugarPedido=$obj->lugarPedido;
			
			
		  
	  ?>
      
        <option value="<?php echo "$idLugarPedido";?>"><?php echo "$lugarPedido";?></option>
        
        <?php
		
				}
		}

		
		?>
      </select>
    </label>
  </div>
<div id="divGridPedidosClientesContenedorBlblLugarPedido" class="formatoGen">Lugar pedido:</div>
  <div id="divGridPedidosClientesContenedorBDivtxtFechaFin" class="formatoGen">
    <label>
      <input class="barraTexMenPrin" name="txtFechaFinVerPedidos" type="text" id="txtFechaFinVerPedidos" size="20" />
    </label>
  </div>
<div id="divGridPedidosClientesContenedorBDivFechaFin" class="formatoGen">Fecha fin:</div>
  <div  id="divGridPedidosClientesContenedorBDivTxtIni">
    <label>
      <input class="barraTexMenPrin" name="txtFechaIniVerPedidos" type="text" id="txtFechaIniVerPedidos" size="20" />
    </label>
  </div>
<div id="divFechaPedidosVer22" class="formatoGen">Fecha inicial:</div>
<div id="divTitutloPedidosCLientes" class="formatoGen"><img src="../img/ver_pedido.jpg" width="128" height="33" /></div>
  <div id="divBtnEnviarPedidosF"><a href="#" onClick="llamarasincrono('vista_pedidos_rows_content_ver2.php?txtCritCliente='+document.getElementById('txtCritCliente').value+'&txtTienda='+document.getElementById('txtTienda').value+'&txtFechaIni='+document.getElementById('txtFechaIniVerPedidos').value+'&txtFechaFin='+document.getElementById('txtFechaFinVerPedidos').value+'&lugarPed='+document.getElementById('comboLugar').options[document.getElementById('comboLugar').selectedIndex].text,'divGridPedidosClientesContenedorRows');document.getElementById('divGridPedidosClientesContenedorB88').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor288').style.visibility='hidden';"><img src="../img/btn_buscar.jpg" width="65" height="18" border="0" /></a></div>







</div>
            


 <div id="divGridPedidosClientesContenedor288">
  
</div>
<div id="divGridPedidosClientesContenedorB88">
  <div id="divGridPedidosClientesContenedorRows"></div>
</div> </center>
         
      
    </center>
<link rel="stylesheet" type="text/css" href="css/catalogo_registro-distribuidores.css">
    <div id="divPrinCataRDistribuidores">
  
				  <div id="divImgNCDistribuidores"></div>
				  <div id="divLoginContent">
				  
				  	
					
					<link rel="stylesheet" type="text/css" href="css/recupera_pw.css">
					<div id="divRecuperaPW">
<div class="regCatalogo" id="divLblNuevaContraPw"></div>
											  <div id="divTitRecPw"></div>
											  <div id="divTxtContraRec"></div>
											  <div  class="regCatalogo" id="divConfirmaPwRec"></div>
											  <div id="divTxtConfirmaContraPw"></div>
											  <div id="divBotonGurarContraRec" onClick="guardar_pw_recuperacion('<?php  echo $idUsuarioWeb; ?>');" ></div>
											  <div class="usuarioRecupera" id="divUsuarioRecPw"></div>
											  <div class="regCatalogo" id="divUsuarioRecuperaPw"></div>
					</div>
					<div id="divRes"></div>
					
					
					
					
				  </div>
				</div>
                <div id="pie">
    
    
      <div id="subscribe">
        <div class="info"id="getnews">Noticias &amp; Actualizaciones</div>
        <div id="txtcam2">
          <form id="form2" name="form2" method="post" action="">
            <label>
              <input  class="barraTexMenPrin" type="text" name="textfield2" id="textfield2" />
            </label>
          </form>
        </div>
        <div id="botonSub">
          <div class="whiteinfo" id="divSSucribe">Suscribete</div>
        <img src="../img/search-1.jpg" width="56" height="17" /></div>
      
      <div id="infoEmp">
        <div id="datos1">
          <div align="right"><span class="info"><a href="#">Inicio</a></span><span class="style2">| </span><span class="info"><a href="file:///C|/Users/vickyu/Documents/VICTORIA/8°/MULTIMEDIA/DREAMWEAVER/#">Ayuda</a> / <a href="#">Contacto</a></span> <span class="style2">|<span class="info"><a href="#"> Localizar Tiendas</a></span></span></div>
        </div>
        <div class="info" id="datos2">
          <div align="right">Busqueda Avanzada| Ordenar por Teléfono+52(33)3609 4304</div>
        </div>
        <div id="datos3">
          <div align="right"><span class="info">© 2012 new colors shoes. Todos los Derechos Reservados</span></div>
        </div>
      </div>
      <div id="face3elem">
        <div id="fotoface"><img src="../img/icono-face.jpg" width="38" height="38" border="0" usemap="#Map2" />
          <map name="Map2" id="Map2">
            <area shape="rect" coords="3,1,39,38" href="http://www.facebook.com/new.colors.7?ref=ts" target="_blank" alt="facebook" />
          </map>
        </div>
        <div class="face" id="newface"><span class="face"><strong><a href="http|//www.facebook.com/pages/New-Colors-Shoes/117745731571808" class="face"><span class="face">New Colors</span></a></strong></span> <a href="http//http://www.facebook.com/new.colors.7?ref=ts"><span class="face2">en    facebook</span></a></div>
        <div id="like"><img src="../img/me-gusta-face.jpg" width="73" height="25" border="0" usemap="#Map6" />
          <map name="Map6" id="Map6">
            <area shape="rect" coords="4,5,72,22" href="http://www.facebook.com/new.colors.7?ref=ts" target="_blank" />
            <area shape="rect" coords="2,3,5,5" href="#" />
          </map>
        </div>
      </div>
    </div>
</div>
  </div>
  
</div>
  
   
  
</div>
</body>
</html>
