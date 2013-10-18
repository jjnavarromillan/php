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
<style type="text/css">
<!--
#divRptPedidosClientesHeader2 {
	position:relative;
	width:942px;
	height:20px;
	z-index:1;
	background-color: #000000;
}
#divRptPedidosClientes {
	position:relative;
	width:760px;
	height:40px;
	z-index:1;
}

#divGridPedidosClientesContenedorB {
	position:absolute;
	width:960px;
	height:450px;
	z-index:3;
	overflow:auto;
	left: 26px;
	top: 71px;
}
#divGridPedidosClientesContenedor2 {
	position:absolute;
	width:790px;
	height:457px;
	z-index:2;
	left: 12px;
	top: 0px;
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
	width:238px;
	height:14px;
	z-index:2;
	left: 53px;
	top: 3px;
	text-align: center;
}
#divHeaderTienda {
	position:absolute;
	width:170px;
	height:14px;
	z-index:3;
	left: 300px;
	top: 3px;
	text-align: center;
}
#divHeaderPares {
	position:absolute;
	width:45px;
	height:14px;
	z-index:4;
	left: 491px;
	text-align: center;
	top: 3px;
}
#divHaederTotal {
	position:absolute;
	width:43px;
	height:14px;
	z-index:5;
	left: 537px;
	top: 3px;
}
#divHeaderFecha {
	position:absolute;
	width:104px;
	height:14px;
	z-index:6;
	left: 578px;
	text-align: center;
	top: 3px;
}
#divHeaderSitioPed {
	position:absolute;
	width:69px;
	height:14px;
	z-index:7;
	left: 685px;
	top: 3px;
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
	height:auto;
}

#divBuscador {
	position:absolute;
	width:980px;
	height:60px;
	z-index:3;
	top: 4px;
}
#divTxtCritClienteClon {
	position:absolute;
	width:130px;
	height:16px;
	z-index:1;
	left: 46px;
	top: 31px;
	text-align:left;
}
#divlblCritClienteClon {
	position:absolute;
	width:50px;
	height:14px;
	z-index:2;
	left: -2px;
	top: 33px;
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
	width:48px;
	height:14px;
	z-index:1;
	left: 170px;
	top: 33px;
	text-align: center;
}
#divGridPedidosClientesContenedorBDivTienda {
	position:absolute;
	width:128px;
	height:15px;
	z-index:2;
	left: 212px;
	top: 31px;
	text-align: left;
}

#divBtnEnviarPedidos {
	position:absolute;
	width:51px;
	height:20px;
	z-index:4;
	left: 878px;
	top: 30px;
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
	width:163px;
	height:33px;
	z-index:9;
	text-align: center;
	left: -1px;
	top: 0px;
}
#divGridPedidosClientesContenedorRows {
	position:absolute;
	width:940px;
	height:389px;
	z-index:4;
	left: 8px;
	top: 25px;
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
#apDiv2 {
	position:absolute;
	width:76px;
	height:14px;
	z-index:10;
	left: 336px;
	top: 32px;
}
#divGridPedidosClientesContenedorBDivTxtIni {
	position:absolute;
	width:125px;
	height:16px;
	z-index:11;
	left: 414px;
	top: 31px;
}
#divGridPedidosClientesContenedorBDivFechaFin {
	position:absolute;
	width:63px;
	height:14px;
	z-index:12;
	left: 539px;
	top: 32px;
}
#divGridPedidosClientesContenedorBDivtxtFechaFin {
	position:absolute;
	width:123px;
	height:16px;
	z-index:13;
	left: 596px;
	top: 31px;
	text-align: left;
}
#divGridPedidosClientesContenedorBlblLugarPedido {
	position:absolute;
	width:83px;
	height:15px;
	z-index:14;
	left: 722px;
	top: 32px;
}
#divGridPedidosClientesContenedorBDivComboLugarF2 {
	position:absolute;
	width:77px;
	height:22px;
	z-index:15;
	left: 794px;
	top: 30px;
}
#divHeaderLugarPedido {
	position:absolute;
	width:84px;
	height:14px;
	z-index:8;
	left: 758px;
	top: 3px;
}
#divHeaderLevantoPedido {
	position:absolute;
	width:117px;
	height:14px;
	z-index:9;
	left: 846px;
	top: 3px;
}
.barraTexMenPrin{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#999;
	width:120px;
	height:11px;
}
.tipoEncabezdoEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	color:#FFF;
	text-align: center;
}
-->
</style>

<form action="" method="get">
<div id="divBuscador"" >
  <div id="divTxtCritClienteClon">
    <label>
      <input class="barraTexMenPrin" name="txtCritCliente" type="text" id="txtCritCliente" size="30" />
    </label>
  </div>
  <div id="divlblCritClienteClon" class="formatoGen">Cliente:</div>
  <div id="divGridPedidosClientesContenedorBDivCabecera">
    <div id="divTiendaVistaPedidoss" class="formatoGen">Tienda:</div>
    <div id="divGridPedidosClientesContenedorBDivTienda">
      <label>
        <input  class="barraTexMenPrin" name="txtTienda" type="text" id="txtTienda" size="40" />
      </label>
    </div>
  </div>
  <div id="divGridPedidosClientesContenedorBDivComboLugarF2">
    <label>
      <select  class="campTxtFormatoGen"name="comboLugar" id="comboLugar">
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
  <div id="divGridPedidosClientesContenedorBDivTxtIni">
    <label>
      <input  class="barraTexMenPrin" name="txtFechaIniVerPedidos" type="text" id="txtFechaIniVerPedidos" size="20" />
    </label>
  </div>
<div id="apDiv2" class="formatoGen">Fecha inicial:</div>
<div id="divTitutloPedidosCLientes" class="formatoGen"><img src="../img/clonar-pedido.jpg" width="163" height="33" /></div>
  <div id="divBtnEnviarPedidos"><a href="#" onClick="llamarasincrono('vista_pedidos_rows_content_clon.php?txtCritCliente='+document.getElementById('txtCritCliente').value+'&txtTienda='+document.getElementById('txtTienda').value+'&txtFechaIni='+document.getElementById('txtFechaIniVerPedidos').value+'&txtFechaFin='+document.getElementById('txtFechaFinVerPedidos').value+'&lugarPed='+document.getElementById('comboLugar').options[document.getElementById('comboLugar').selectedIndex].text,'divGridPedidosClientesContenedorRows');document.getElementById('divGridPedidosClientesContenedorB').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor2').style.visibility='hidden';"><img src="../img/btn_buscar.jpg" width="65" height="18" border="0" /></a></div>

</div>
</form>

<div id="divGridPedidosClientesContenedor2">
  
</div>
<div id="divGridPedidosClientesContenedorB">
	
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
   <div id="divGridPedidosClientesContenedorRows"></div>
</div>

