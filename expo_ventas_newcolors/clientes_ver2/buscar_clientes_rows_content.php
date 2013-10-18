<?php 

	$txtCriNombreBusCli = "";
	if(isset($_REQUEST['txtCriNombreBusCli'])){
		$txtCriNombreBusCli = " and Nombre like '%".$_REQUEST['txtCriNombreBusCli']."%'";
	}
	$txtCritTiendaBusCli = "";
	if(isset($_REQUEST['txtCritTiendaBusCli'])){
		$txtCritTiendaBusCli =  " and tienda like '%".$_REQUEST['txtCritTiendaBusCli']."%'";
	}
	$txtCritEsdtadoBusCli = "";
	if(isset($_REQUEST['txtCritEsdtadoBusCli'])){
		$txtCritEsdtadoBusCli =  " and estados.estado like '%".$_REQUEST['txtCritEsdtadoBusCli']."%'";
	}
	$txtCriMunicipio = "";
	if(isset($_REQUEST['txtCriMunicipio'])){
		$txtCriMunicipio =  " and municipios.municipio like '%".$_REQUEST['txtCriMunicipio']."%'";
	}
	$opcion = "";
	if(isset($_REQUEST['opcion'])){
		$opcion = $_REQUEST['opcion'];
	}
	
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	$idEstilo=""; //1
	//$sqlGetData = " SELECT detallistas_tiendas.idTienda, detallistas_clientes.nombre, detallistas_tiendas.tienda, estados.estado, municipios.municipio, detallistas_tiendas.idCliente FROM detallistas_tiendas LEFT JOIN ((detallistas_clientes LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente where 1 $txtCriNombreBusCli $txtCritTiendaBusCli $txtCritEsdtadoBusCli $txtCriMunicipio order by detallistas_clientes.nombre";
 $sqlGetData="SELECT detallistas_tiendas.idTienda, detallistas_clientes.nombre, detallistas_tiendas.tienda, estados.estado, municipios.municipio, detallistas_tiendas.idCliente, detallistas_clientes.domicilio, detallistas_clientes.col, detallistas_clientes.cp, detallistas_clientes.RFC, detallistas_clientes.telefonos as tels, detallistas_clientes.email, estados_1.estado as estadoTienda, municipios_1.municipio as municipioTienda, detallistas_tiendas.domicilio as domTienda, detallistas_tiendas.col as colTienda, detallistas_tiendas.cp as cpTienda, detallistas_tiendas.transporte, detallistas_tiendas.obsGuia, detallistas_tiendas.transporteSeguro
FROM ((detallistas_tiendas LEFT JOIN ((detallistas_clientes LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente) INNER JOIN estados AS estados_1 ON detallistas_tiendas.idEstado = estados_1.idEstado) INNER JOIN municipios AS municipios_1 ON detallistas_tiendas.idMunicipio = municipios_1.idMunicipio
WHERE 1 $txtCriNombreBusCli $txtCritTiendaBusCli $txtCritEsdtadoBusCli $txtCriMunicipio
ORDER BY detallistas_clientes.nombre";
	$num=0;
	if($result_data=$mysqli->query($sqlGetData)){
	
		$num=mysqli_num_rows($result_data);
		$cons=0;
		if($num>0){
	
?>


<style type="text/css">
<!--
.formatoGenRows{
	font-family:Arial, Helvetica, sans-serif;
	font-size:8px;
	color:#000;
	font-weight:600;
	text-align:center;
}

.datosFormatoGenRows{
	font-family:Arial, Helvetica, sans-serif;
	font-size:8px;
	color:#666;
	text-align:center;
}

#divClientesBusquedaRows {
	position:relative;
	width:2100px;
	height:21px;
	z-index:1;
	left: -1px;
	top: 16px;
}
#divClientesBusquedaRowsCons {
	position:absolute;
	width:32px;
	height:18px;
	z-index:1;
	top: 3px;
}
#divClientesBusquedaRowsNombre {
	position:absolute;
	width:159px;
	height:16px;
	z-index:2;
	left: 38px;
	top: 4px;
	text-align: center;
}
#divClientesBusquedaRowsTienda {
	position:absolute;
	width:118px;
	height:16px;
	z-index:3;
	left: 198px;
	top: 4px;
}
#divClientesBusquedaRowsEstado {
	position:absolute;
	width:132px;
	height:16px;
	z-index:4;
	left: 318px;
	top: 4px;
}
#divClientesBusquedaRowsMunicipio {
	position:absolute;
	width:111px;
	height:16px;
	z-index:5;
	left: 451px;
	top: 4px;
}
#divClientesBusquedaRowsIdTienda {
	position:absolute;
	width:40px;
	height:16px;
	z-index:6;
	left: 717px;
	top: 2px;
}
#apDiv1 {
	position:absolute;
	width:137px;
	height:19px;
	z-index:6;
	left: 565px;
	top: 4px;
}
#apDiv2 {
	position:absolute;
	width:148px;
	height:20px;
	z-index:7;
	left: 705px;
	top: 3px;
}
#apDiv3 {
	position:absolute;
	width:81px;
	height:19px;
	z-index:8;
	left: 857px;
	top: 3px;
}
#apDiv4 {
	position:absolute;
	width:110px;
	height:20px;
	z-index:9;
	left: 941px;
	top: 3px;
}
#apDiv5 {
	position:absolute;
	width:118px;
	height:20px;
	z-index:10;
	left: 1054px;
	top: 3px;
}
#apDiv6 {
	position:absolute;
	width:115px;
	height:21px;
	z-index:11;
	left: 1176px;
	top: 2px;
}
#apDiv7 {
	position:absolute;
	width:109px;
	height:21px;
	z-index:12;
	left: 1294px;
	top: 2px;
}
#apDiv8 {
	position:absolute;
	width:121px;
	height:20px;
	z-index:13;
	left: 1406px;
	top: 2px;
}
#apDiv9 {
	position:absolute;
	width:110px;
	height:20px;
	z-index:14;
	left: 1531px;
	top: 2px;
}
#apDiv10 {
	position:absolute;
	width:88px;
	height:21px;
	z-index:15;
	left: 1645px;
	top: 1px;
}
#apDiv11 {
	position:absolute;
	width:81px;
	height:23px;
	z-index:16;
	left: 1737px;
	top: 0px;
}
#apDiv12 {
	position:absolute;
	width:88px;
	height:23px;
	z-index:17;
	left: 1821px;
	top: 0px;
}
#apDiv13 {
	position:absolute;
	width:92px;
	height:23px;
	z-index:18;
	left: 1912px;
	top: 0px;
}
#apDiv14 {
	position:absolute;
	width:90px;
	height:21px;
	z-index:19;
	left: 2007px;
	top: 2px;
}
#divMenuEncabezadoRows {
	position:absolute;
	width:2104px;
	height:20px;
	z-index:2;
	left: -1px;
	background-color: #000000;
}
#divMenuEncabezadoRows1 {
	position:absolute;
	width:39px;
	height:14px;
	z-index:1;
	top: 3px;
}
#divMenuEncabezadoRows2 {
	position:absolute;
	width:127px;
	height:14px;
	z-index:2;
	left: 45px;
	top: 3px;
}
#divMenuEncabezadoRows3 {
	position:absolute;
	width:119px;
	height:14px;
	z-index:3;
	left: 196px;
	top: 3px;
}
#divMenuEncabezadoRows4 {
	position:absolute;
	width:125px;
	height:14px;
	z-index:4;
	left: 323px;
	top: 3px;
}
#divMenuEncabezadoRows5 {
	position:absolute;
	width:109px;
	height:14px;
	z-index:5;
	left: 453px;
	top: 3px;
}
#divMenuEncabezadoRows6 {
	position:absolute;
	width:120px;
	height:14px;
	z-index:6;
	left: 567px;
	top: 3px;
}
#divMenuEncabezadoRows7 {
	position:absolute;
	width:78px;
	height:14px;
	z-index:7;
	left: 760px;
	top: 3px;
}
#divMenuEncabezadoRows8 {
	position:absolute;
	width:80px;
	height:14px;
	z-index:8;
	left: 856px;
	top: 3px;
}
#divMenuEncabezadoRows9 {
	position:absolute;
	width:59px;
	height:14px;
	z-index:9;
	left: 947px;
	top: 3px;
}
#divMenuEncabezadoRows10 {
	position:absolute;
	width:117px;
	height:14px;
	z-index:10;
	left: 1054px;
	top: 3px;
}
#divMenuEncabezadoRows11 {
	position:absolute;
	width:110px;
	height:14px;
	z-index:11;
	left: 1180px;
	top: 3px;
}
#divMenuEncabezadoRows12 {
	position:absolute;
	width:107px;
	height:14px;
	z-index:12;
	left: 1297px;
	top: 3px;
}
#divMenuEncabezadoRows13 {
	position:absolute;
	width:77px;
	height:14px;
	z-index:13;
	left: 1426px;
	top: 3px;
}
#divMenuEncabezadoRows14 {
	position:absolute;
	width:110px;
	height:14px;
	z-index:14;
	left: 1529px;
	top: 3px;
}
#divMenuEncabezadoRows15 {
	position:absolute;
	width:85px;
	height:14px;
	z-index:15;
	left: 1645px;
	top: 3px;
}
#divMenuEncabezadoRows16 {
	position:absolute;
	width:78px;
	height:14px;
	z-index:16;
	left: 1738px;
	top: 3px;
}
#divMenuEncabezadoRows17 {
	position:absolute;
	width:86px;
	height:14px;
	z-index:17;
	left: 1823px;
	top: 3px;
}
#divMenuEncabezadoRows18 {
	position:absolute;
	width:83px;
	height:14px;
	z-index:18;
	left: 1917px;
	top: 3px;
}
#divMenuEncabezadoRows19 {
	position:absolute;
	width:95px;
	height:14px;
	z-index:19;
	left: 2002px;
	top: 3px;
}
.tipoEncabezdoEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	color:#FFF;
	text-align: center;
}
#divClientesBusquedaHeaderContedorB1 {
	position:absolute;
	width:2100px;
	height:350px;
	z-index:2;
	left: 1px;
	top: 15px;
}
#divClientesBusquedaHeaderContedorC1 {	position:absolute;
	width:601px;
	height:400px;
	z-index:2;
	left: 13px;
	top: 75px;
	overflow: auto;
}
-->
</style>
<div id="divMenuEncabezadoRows">
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows1">Cons</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows2">Nombre</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows3">Tienda</div>
  <div class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows4">Estado</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows5">Municipio</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows6">Domicilio</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows7">Colonia</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows8">CP</div> 
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows9">RFC</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows10">Tel&eacute;fono</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows11">E-Mail</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows12">Estado</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows13">Mucipio</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows14">Dom. Tienda</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows15">Col. Tienda</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows16">C.P Tienda</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows17">Paqueteria</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows18">Observacion</div>
  <div  class="tipoEncabezdoEstadisticas" id="divMenuEncabezadoRows19">Seguro</div>
</div>

<div id="divClientesBusquedaHeaderContedorB1">
<?php 


	
		for ($i=0;$i<$num;$i++){	  
				$cons++;
				$rowdata=mysqli_fetch_object($result_data);

				$nombre=$rowdata->nombre;
				$tienda=$rowdata->tienda;
				$estado=$rowdata->estado;
				$municipio=$rowdata->municipio;
				$colonia = $rowdata->col;
				$domicilio = $rowdata->domicilio;
				$tels = $rowdata->tels;
				$cp = $rowdata->cp;
				$RFC = $rowdata->RFC;
				$tels = $rowdata->tels;
				$email = $rowdata->email;
				$estadoTienda = $rowdata->estadoTienda;
				$municipioTienda = $rowdata->municipioTienda;
				$domTienda = $rowdata->domTienda;
				$colTienda = $rowdata->colTienda;
				$cpTienda = $rowdata->cpTienda;
				$transporte = $rowdata->transporte;
				$obsGuia = $rowdata->obsGuia;
				$transporteSeguro = $rowdata->transporteSeguro;
				
				$idCliente=$rowdata->idCliente;
				$idTienda=$rowdata->idTienda;
				$colo="#FFFFFF";
				if(($cons % 2)==0){
					$colo="#ddd8ce";
				}
				

	?>

<a href="#" onclick="vaciarDatosDeBusqueda('<?php  echo "$opcion";?>','<?php  echo "$idCliente";?>','<?php  echo "$idTienda";?>','<?php  echo "$nombre";?>','<?php  echo "$tienda";?>')" ><div id="divClientesBusquedaRows" style="background-color:<?php  echo "$colo";?>"  >
  <div id="divClientesBusquedaRowsNombre" class="datosFormatoGenRows"><label id="lblClientesBusquedaNombre"><?php  echo "$nombre"; ?></label></div>
  <div id="divClientesBusquedaRowsCons" class="formatoGenRows"><label id="lblClientesBusquedaCons"><?php  echo "$cons "; ?></label></div>
  <div id="divClientesBusquedaRowsTienda" class="datosFormatoGenRows"><label id="lblClientesBusquedaTienda"><?php  echo "$tienda"; ?></label></div>
  <div id="divClientesBusquedaRowsMunicipio" class="datosFormatoGenRows"><label id="lblClientesBusquedaMunicipio"><?php  echo "$municipio"; ?></label></div>
  <div id="divClientesBusquedaRowsEstado" class="datosFormatoGenRows"><label id="lblClientesBusquedaEstado"><?php  echo "$estado"; ?></label></div>
  <div id="apDiv2" class="datosFormatoGenRows"><label id="lblClientesBusquedaCol"><?php  echo "$colonia"; ?></label></div>
  <div id="apDiv1" class="datosFormatoGenRows"><label id="lblClientesBusquedaDom"><?php  echo "$domicilio"; ?></label></div>
  <div id="apDiv3" class="datosFormatoGenRows"><label id="lblClientesBusquedaCp"><?php  echo "$cp"; ?></label></div>
  <div id="apDiv5" class="datosFormatoGenRows"><label id="lblClientesBusquedaRFC"><?php  echo "$tels"; ?></label></div>
  <div id="apDiv4" class="datosFormatoGenRows"><label id="lblClientesBusquedaRFC"><?php  echo "$RFC"; ?></label></div>
  <div id="apDiv6" class="datosFormatoGenRows"><label id="lblClientesBusquedaemail"><?php  echo "$email"; ?></label></div>
  <div id="apDiv8" class="datosFormatoGenRows"><label id="lblClientesBusquedaEstado"><?php  echo "$estadoTienda"; ?></label></div>
  <div id="apDiv7" class="datosFormatoGenRows"><label id="lblClientesBusquedaMunicipio"><?php  echo "$municipioTienda"; ?></label></div>
  <div id="apDiv9" class="datosFormatoGenRows"><label id="lblClientesBusquedaDom"><?php  echo "$domTienda"; ?></label></div>
  <div id="apDiv10" class="datosFormatoGenRows"><label id="lblClientesBusquedaCol"><?php  echo "$colTienda"; ?></label></div>
  <div id="apDiv11" class="datosFormatoGenRows"><label id="lblClientesBusquedaCp"><?php  echo "$cpTienda"; ?></label></div>
  <div id="apDiv12" class="datosFormatoGenRows"><label id="lblClientesBusquedaTra"><?php  echo "$transporte"; ?></label></div>
  <div id="apDiv13" class="datosFormatoGenRows"><label id="lblClientesBusquedaGuia"><?php  echo "$obsGuia"; ?></label></div>
  <div id="apDiv14" class="datosFormatoGenRows"><label id="lblClientesBusquedaSeguro"><?php  echo "$transporteSeguro"; ?></label></div>
</div></a>
	
    <?php
	}
	?>
</div>
<?php 
			
	}
	}
	else{
		echo "";	
	}
	
	?>