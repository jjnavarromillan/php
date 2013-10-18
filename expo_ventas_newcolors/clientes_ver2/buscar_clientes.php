<?php 
	$opcion = $_REQUEST['opcion'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="JavaScript" type="text/javascript" src="../js/codigo.js"></script>
<link type="text/css" href= "js/jquery-ui-1.8.14.custom/css/ui-lightness/jquery-ui-1.8.14.custom.css"  rel="Stylesheet" />	
    <script type="text/javascript" src="../js/jquery-ui-1.8.14.custom/js/jquery-1.5.1.min.js" ></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.14.custom/js/jquery-ui-1.8.14.custom.min.js"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<style type="text/css">
<!--
.formatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
	text-align:center;
}

.campoTextoBuscarClientes{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	text-align:left;
	height:16px;
}

#divClientesBusquedaHeader {
	position:absolute;
	width:955px;
	height:20px;
	z-index:3;
	left: 0px;
	top: 0px;
	background-color: #000000;
}
#divClientesBusquedaHeaderContedor {
	position:absolute;
	width:601px;
	height:400px;
	z-index:2;
	left: 13px;
	top: 75px;
	overflow: auto;
}
#divClientesBusquedaHeaderCons {
	position:absolute;
	width:31px;
	height:14px;
	z-index:1;
	top: 3px;
	left: 2px;
}
#divClientesBusquedaHeaderNombre {
	position:absolute;
	width:74px;
	height:14px;
	z-index:2;
	left: 74px;
	top: 3px;
	text-align: center;
}
#divClientesBusquedaHeaderTienda {
	position:absolute;
	width:71px;
	height:14px;
	z-index:3;
	left: 197px;
	top: 3px;
}
#divClientesBusquedaHeaderEstado {
	position:absolute;
	width:81px;
	height:14px;
	z-index:4;
	left: 288px;
	top: 3px;
}
#divClientesBusquedaHeaderMunicipio {
	position:absolute;
	width:96px;
	height:14px;
	z-index:5;
	left: 394px;
	top: 3px;
}
#divClientesBusquedaHeaderIdPed {
	position:absolute;
	width:40px;
	height:20px;
	z-index:6;
	left: 717px;
	top: 9px;
}
#divClientesBusquedaHeaderCriterio {
	position:absolute;
	width:600px;
	height:71px;
	z-index:3;
	left: 13px;
	top: 3px;
}
#divClientesBusquedaHeaderContedorNombre {
	position:absolute;
	width:63px;
	height:14px;
	z-index:1;
	text-align: center;
	left: 20px;
	top: 35px;
}
#divClientesBusquedaHeaderContedorTextNombre {
	position:absolute;
	width:74px;
	height:17px;
	z-index:2;
	left: -1px;
	top: 51px;
}
#divClientesBusquedaHeaderContedoTienda {
	position:absolute;
	width:74px;
	height:14px;
	z-index:3;
	left: 150px;
	text-align: center;
	top: 35px;
}
#divClientesBusquedaHeaderContedorTextTienda {
	position:absolute;
	width:74px;
	height:17px;
	z-index:4;
	left: 135px;
	top: 51px;
}
#divClientesBusquedaHeaderContedorEstado {
	position:absolute;
	width:73px;
	height:14px;
	z-index:5;
	left: 287px;
	top: 35px;
	text-align: center;
}
#divClientesBusquedaHeaderContedorTextEstado {
	position:absolute;
	width:74px;
	height:17px;
	z-index:6;
	left: 265px;
	top: 51px;
}
#divClientesBusquedaHeaderContedorMuunicipio {
	position:absolute;
	width:74px;
	height:14px;
	z-index:7;
	left: 418px;
	top: 35px;
}
#divClientesBusquedaHeaderContedorTextMunicipio {
	position:absolute;
	width:74px;
	height:18px;
	z-index:8;
	left: 396px;
	top: 51px;
	text-align: center;
}
#divClientesBusquedaBtnBuscar {
	position:absolute;
	width:57px;
	height:18px;
	z-index:9;
	left: 532px;
	top: 50px;
}
#divImgBusTexto {
	position:absolute;
	width:120px;
	height:32px;
	z-index:10;
	left: 1px;
	top: 0px;
}
#divImgCerrarBuscarClientes {
	position:absolute;
	width:15px;
	height:14px;
	z-index:11;
	left: 581px;
	top: 10px;
}
#divImgCerra {
	position:absolute;
	width:31px;
	height:14px;
	z-index:12;
	left: 546px;
	top: 9px;
}

.regresarOpcion{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	
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

<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="divClientesBusquedaHeaderContedor"></div>
<div id="divClientesBusquedaHeaderCriterio"><div id="divClientesBusquedaHeaderContedorNombre" class="formatoGen">Nombre</div>
  
  <div id="divClientesBusquedaHeaderContedorTextNombre" class="formatoGen">
    <label>
      <input name="txtCriNombreBusCli" type="text"  class="campoTextoBuscarClientes" id="txtCriNombreBusCli" size="20" />
    </label>
  </div>
  <div id="divClientesBusquedaHeaderContedoTienda"  class="formatoGen">Tienda</div>
  <div id="divClientesBusquedaHeaderContedorTextTienda"  class="formatoGen">
    <label>
      <input name="txtCritTiendaBusCli" type="text" class="campoTextoBuscarClientes" id="txtCritTiendaBusCli" size="20" />
    </label>
  </div>
  <div id="divClientesBusquedaHeaderContedorTextEstado"  class="formatoGen">
    <label>
      <input  class="campoTextoBuscarClientes" name="txtCritEsdtadoBusCli" type="text" id="txtCritEsdtadoBusCli" size="20" />
    </label>
  </div>
  <div id="divClientesBusquedaHeaderContedorMuunicipio"  class="formatoGen">Municipio</div>
  <div id="divClientesBusquedaHeaderContedorEstado"  class="formatoGen">Estado</div>
  <div id="divClientesBusquedaHeaderContedorTextMunicipio">
    <label>
      <input name="txtCriMunicipio" type="text"  class="campoTextoBuscarClientes" id="txtCriMunicipio" size="20" />
    </label>
  </div>
  <div id="divClientesBusquedaBtnBuscar" class="formatoGen" onclick="cargarBuscarCliente('<?php echo "$opcion"; ?>','divClientesBusquedaHeaderContedor');"><a href="#"><img src="img/btn_buscar.jpg" width="65" height="18" border="0" /></a></div>
  
<div id="divImgBusTexto"><img src="img/busqueda_txt.jpg" width="201" height="33" /></div>
  <div id="divImgCerrarBuscarClientes" onclick="document.getElementById('divSistemaEmergente').style.visibility='hidden';"><img src="img/cerrar_b.jpg" width="13" height="13" /></div>
  <div  class="regresarOpcion" id="divImgCerra" onclick="document.getElementById('divSistemaEmergente').style.visibility='hidden';">Cerrar</div>
</div>
<script type="text/javascript">
<!--
//var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>
</body>
</html>