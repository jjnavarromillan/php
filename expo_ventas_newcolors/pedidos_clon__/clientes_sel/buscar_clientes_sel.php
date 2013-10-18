<?php 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
	<script language="JavaScript" type="text/javascript" src="../../js/codigo.js"></script>
	<link type="text/css" href= "../../js/jquery-ui-1.8.14.custom/css/ui-lightness/jquery-ui-1.8.14.custom.css"  rel="Stylesheet" />	
    <script type="text/javascript" src="../../js/jquery-ui-1.8.14.custom/js/jquery-1.5.1.min.js" ></script>
	<script type="text/javascript" src="../../js/jquery-ui-1.8.14.custom/js/jquery-ui-1.8.14.custom.min.js"></script>
    <script language="javascript">
    
	function seleccionarTodasLasTiendasFiltradasChange(){
		var val = document.getElementById('chkSelectAll').checked;
		seleccionarTodasLasTiendasFiltradas(val);
	}
	function seleccionarTodasLasTiendasFiltradas(value){
		try{
			var cantElementos = document.getElementById('lblDatCons').innerHTML;
			for (var i=1;i<=cantElementos;i++){
					document.getElementById('chk_tienda_'+i).checked =value;
			}
		}
		catch(err){
			
		}
	}

    function clonarPedidoPorTiendaSeleccionada(idPedidoAClonar,idVendedor,totalPares,subtotal,txtPedidoCargo,comboLugarPedido,seccionCatalogo)	{
		
		try{
			var cantElementos = document.getElementById('lblDatCons').innerHTML;
			for (var i=1;i<=cantElementos;i++){
					value=document.getElementById('chk_tienda_'+i).checked;
					if(value==true){}
						
						idTienda = document.getElementById('checkValue_'+i).innerHTML
						sitioPedido = "Web";
						
						$.post("../pedidos_clon/clonar_pedido_tienda.php",
						   {idTienda:idTienda,sitioPedido:sitioPedido,idVendedor:idVendedor,TotalPares:TotalPares,subtotal:subtotal,datos:datos,seccionCatalogo:seccionCatalogo,txtPedidoCargo:txtPedidoCargo,comboLugarPedido:comboLugarPedido },
							function(data2){
								alert(" No pedido : ["+data2+"] " );
							}
						);
						
					}
			}
		}
		catch(err){
			
		}		
	}
    </script>
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
	width:600px;
	height:28px;
	z-index:1;
	left: 12px;
	top: 100px;
	background-color: #CCCCCC;
}
#divClientesBusquedaHeaderContedor {
	position:absolute;
	width:600px;
	height:190px;
	z-index:103;
	left: 11px;
	top: 130px;
	overflow: auto;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	background-color: #EBECEA;
}
#divClientesBusquedaHeaderCons {
	position:absolute;
	width:31px;
	height:16px;
	z-index:1;
	top: 8px;
	left: 11px;
}
#divClientesBusquedaHeaderNombre {
	position:absolute;
	width:74px;
	height:16px;
	z-index:2;
	left: 79px;
	top: 8px;
	text-align: center;
}
#divClientesBusquedaHeaderTienda {
	position:absolute;
	width:71px;
	height:16px;
	z-index:3;
	left: 229px;
	top: 8px;
}
#divClientesBusquedaHeaderEstado {
	position:absolute;
	width:81px;
	height:16px;
	z-index:4;
	left: 348px;
	top: 8px;
}
#divClientesBusquedaHeaderMunicipio {
	position:absolute;
	width:96px;
	height:16px;
	z-index:5;
	left: 463px;
	top: 8px;
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
	z-index:102;
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
	left: -2px;
	top: 2px;
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
	z-index:2901;
	left: 546px;
	top: 9px;
}

.regresarOpcion{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	
}
#divSeleccionartiendaChkAll {
	position:absolute;
	width:122px;
	height:25px;
	z-index:104;
	left: 12px;
	top: 77px;
}
#divBtnClonarClientesSeleccionados {
	position:absolute;
	width:191px;
	height:20px;
	z-index:105;
	left: 427px;
	top: 368px;
	background-color: #CCCCCC;
}
#divContentDivComboLugarPedido {
	position:absolute;
	width:222px;
	height:23px;
	z-index:11;
	left: 1px;
	top: 32px;
}
#divContentDivTxtQuienPide {
	position:absolute;
	width:404px;
	height:23px;
	z-index:15;
	left: 149px;
	top: 336px;
}
#divLblComprador {
	position:absolute;
	width:132px;
	height:26px;
	z-index:106;
	top: 338px;
	left: 8px;
}
#divlblLugarPedido {
	position:absolute;
	width:134px;
	height:22px;
	z-index:107;
	top: 368px;
	left: 7px;
}
-->
</style>

</head>

<body>
<div id="divClientesBusquedaHeader" >
  <div id="divClientesBusquedaHeaderNombre" class="formatoGen">Nombre</div>
  <div id="divClientesBusquedaHeaderCons" class="formatoGen">Cons</div>
  <div id="divClientesBusquedaHeaderTienda" class="formatoGen">Tienda</div>
  <div id="divClientesBusquedaHeaderMunicipio" class="formatoGen">Municpio</div>
  <div id="divClientesBusquedaHeaderEstado" class="formatoGen">Estado</div>
</div>
<div id="divClientesBusquedaHeaderContedor">
</div>
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
  <div id="divClientesBusquedaBtnBuscar" class="formatoGen" onclick="llamarasincrono('clientes_sel/buscar_clientes_rows_content_sel.php?txtCriNombreBusCli='+document.getElementById('txtCriNombreBusCli').value+'&txtCritTiendaBusCli='+document.getElementById('txtCritTiendaBusCli').value+'&txtCritEsdtadoBusCli='+document.getElementById('txtCriNombreBusCli').value+'&txtCritEsdtadoBusCli='+document.getElementById('txtCritEsdtadoBusCli').value+'&txtCriMunicipio='+document.getElementById('txtCriMunicipio').value+'','divClientesBusquedaHeaderContedor')"><a href="#"><img src="../img/btn_buscar.jpg" width="65" height="18" border="0" /></a></div>
  <div id="divImgBusTexto"><img src="img/busqueda_txt.jpg" width="201" height="33" /></div>
  <div id="divImgCerrarBuscarClientes" onclick="document.getElementById('divSistemaEmergente').style.visibility='hidden';"><img src="img/cerrar_b.jpg" width="13" height="13" /></div>
  <div  class="regresarOpcion" id="divImgCerra" onclick="document.getElementById('divSistemaEmergente').style.visibility='hidden';">Cerrar</div>
</div>
<div id="divSeleccionartiendaChkAll" class="formatoGen" >
  <label>
    <input type="checkbox" name="chkSelectAll" id="chkSelectAll" onchange="seleccionarTodasLasTiendasFiltradasChange();" />
  </label> 
  Seleccionar todo
</div>
<div id="divBtnClonarClientesSeleccionados" class="formatoGen" onclick="clonarTiendas();">Clonar clientes seleccionados</div>
<div id="divContentDivTxtQuienPide">
  <label> </label>
  <div id="divContentDivComboLugarPedido">
    <label>
      <select name="comboLugarPedido" id="comboLugarPedido">
        <option value="Web">Web</option>
        <option value="Expo">Expo</option>
        <option value="Fabrica">Fabrica</option>
      </select>
    </label>
  </div>
  <label>
    <input name="txtPedido" type="text" id="txtPedido" size="50" />
  </label>
</div>
<div id="divLblComprador">Comprador</div>
<div id="divlblLugarPedido">Lugar de pedido</div>
</body>
</html>