
<link rel="stylesheet" type="text/css" href="configCampoDB.css">
<link rel="stylesheet" type="text/css" href="datagridNC.css">
<link rel="stylesheet" type="text/css" href="vista_filtro.css">

<link rel="stylesheet" type="text/css" href="pedidos/datagridNCPedido/configCampoDB.css">
<link rel="stylesheet" type="text/css" href="pedidos/datagridNCPedido/datagridNC.css" id="datagridcss">
<link rel="stylesheet" type="text/css" href="pedidos/datagridNCPedido/vista_filtro.css">
<script language="javascript" type="text/javascript" src="pedidos/datagridNCPedido/JSON.php"></script>
<script language="javascript" type="text/javascript" src="pedidos/datagridNCPedido/jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="pedidos/datagridNCPedido/jquery.validate.1.5.2.js"></script>
<script language="javascript" src="js/codigo.js"></script>
<script language="javascript" src="../../js/codigo.js"></script>
<script language="javascript" src="datagridNC.js"></script>


 
<style type="text/css">
<!--
#divCerrarGridPedidos {
	position:absolute;
	width:28px;
	height:22px;
	z-index:9;
	left: 773px;
	top: 5px;
	text-align: center;
}
#divFondoBotonesGeneral {
	position:absolute;
	width:200px;
	height:31px;
	z-index:10;
	left: 6px;
	top: 2px;
}
#divBotonFotos {
	position:absolute;
	width:67px;
	height:32px;
	z-index:1;
}
#divBotonVerFotosTipo {
	position:absolute;
	width:44px;
	height:12px;
	z-index:1;
	left: 22px;
	top: 10px;
}
#divBotonFiltro {
	position:absolute;
	width:68px;
	height:32px;
	z-index:2;
	left: 69px;
	top: 0px;
}
#divBotonQuitarFiltroTipo {
	position:absolute;
	width:50px;
	height:12px;
	z-index:1;
	left: 15px;
	top: 10px;
}
#divBotonCerrar {
	position:absolute;
	width:65px;
	height:30px;
	z-index:3;
	left: 138px;
	top: 0px;
}
#divBotonCerrarTipo {
	position:absolute;
	width:31px;
	height:14px;
	z-index:1;
	left: 22px;
	top: 9px;
}
#apDiv1 {
	position:absolute;
	width:100px;
	height:26px;
	z-index:11;
	left: 532px;
	top: 2px;
}


-->
</style>
<div id="divDatosDataGridPedidos" style="display:none"></div>
<div id="divContenedorPedidos">

<div id="divDataGridPedidos">
 
  <div id="divTableDatosHeaderPedidos">
        <table width="1845" border="0" id="tablaDatHeaderPedidos" class="tablaDatosPedidos" bgcolor="" style="border-spacing: 0;"   >
        </table>
    </div>
    <div id="divTableDatosPedidos"  style="">
        <table width="1845" border="0" id="tablaDatPedidos" class="tablaDatosPedidos" bgcolor="" style="border-spacing: 0;"  >
      </table>
  </div>
  <!--<div id="divBotVerDatosPedidos"><a href="#"  onClick="cargarJSONPedidos();"><img src="carrito/img/ver-datos.jpg" border="0" width="55" height="20" /></a></div> !-->
  <div id="divBotQuiUlFiltroPedidos"><a href="#" onclick="quitarUltimoFiltroPedidos();"/><img src="carrito/img/quitar-ultimo-filtro.jpg"  border="0"width="112" height="19" /></a></div>
  <div id="divCerrarGridPedidos" onclick="document.getElementById('divContenedorPedidos').style.visibility='hidden';">X</div>
  <div id="divFondoBotonesGeneral">
    <div id="divBotonFotos"><img src="carrito/img/fotos.png" width="67" height="30" />
      <div  class="tipogrWhitegridNc" id="divBotonVerFotosTipo">Ver Fotos</div>
    </div>
    <img src="carrito/img/fondo-botones-tres.jpg" width="205" height="30" />
    <div id="divBotonCerrar"><img src="carrito/img/cerrar-boton.png" width="67" height="30" />
      <div  class="tipogrWhitegridNc" id="divBotonCerrarTipo">Cerrar</div>
    </div>
    <div id="divBotonFiltro"><img src="carrito/img/quitar-filtro.png" width="67" height="30" />
      <div class="tipogrWhitegridNc" id="divBotonQuitarFiltroTipo">Quitar Filtro</div>
    </div>
  </div>
  <div id="apDiv1"> <input name="verFoto" type="checkbox" onClick="actualizarVistaTablaPedidos();" id="verFoto" checked />
  <label class="tidataverfotosPedidos">Ver Fotos</label></div>
</div>
<div id="divUltimoFiltroPedidos" style="display:none"></div>

</div>