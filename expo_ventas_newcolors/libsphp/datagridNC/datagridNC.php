
<link rel="stylesheet" type="text/css" href="configCampoDB.css">
<link rel="stylesheet" type="text/css" href="datagridNC.css">
<link rel="stylesheet" type="text/css" href="vista_filtro.css">
<script language="javascript" type="text/javascript" src="JSON.php"></script>
<script language="javascript" type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="jquery.validate.1.5.2.js"></script>
<script language="javascript" src="../../js/codigo.js"></script>
<script language="javascript" src="datagridNC.js"></script>

<style type="text/css">
<!--

-->
</style>
<div id="divDatosDataGrid" style="display:none"></div>


<div id="divDataGrid">
  <input name="verFoto" type="checkbox" onClick="actualizarVistaTabla();" id="verFoto" checked />
    <label class="tidataverfotos">Ver Fotos</label>
  <div id="divTableDatosHeader"  style="">
        <table width="1845" border="0" id="tablaDatHeader" class="tablaDatos" bgcolor="" style="border-spacing: 0;"   >
        </table>
    </div>
    <div id="divTableDatos"  style="">
        <table width="1845" border="0" id="tablaDat" class="tablaDatos" bgcolor="" style="border-spacing: 0;"  >
      </table>
  </div>
  <div id="divBotVerDatos"><a href="#"  onClick="cargarJSON();"><img src="../../carrito/img/ver-datos.jpg" border="0" width="55" height="20" /></a></div>
  <div id="divBotQuiUlFiltro"><a href="#" onclick="quitarUltimoFiltro();"/><img src="../../carrito/img/quitar-ultimo-filtro.jpg"  border="0"width="112" height="19" /></a></div>
</div>
<div id="divUltimoFiltro" style="display:none"></div>

