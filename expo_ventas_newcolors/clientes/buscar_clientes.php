<script language="javascript" src="../js/codigo.js"></script>
<link rel="stylesheet" type="text/css" href="buscar_clientes.css" />

<style type="text/css">
<!--
#divBuBusClientes {
	position:absolute;
	width:53px;
	height:16px;
	z-index:3;
	left: 319px;
	top: 13px;
}
#divTiBusBucarCli {
	position:absolute;
	width:35px;
	height:12px;
	z-index:1;
	left: 11px;
	top: 2px;
}
-->
</style>
<div id="divPrinBusCli">
  <div  class="regiDatosCli" id="divPrinBusCliTitulo">Busqueda de clientes:
    <div id="divNuBoBuClietes">
      <div  class="tipoRegiWhite" id="divNuTiBClientes">Nuevo</div>
    <img src="../img/barrita_total.jpg" width="52" height="17" /></div>
    <div id="divBuBusClientes">
      <div  class="tipoRegiWhite" id="divTiBusBucarCli">Buscar</div>
    <img src="../img/barrita_total.jpg" width="52" height="17" /></div>
  </div>
  <div id="divPrinBusCliDivBusCrit">
    <div  class="regiDatosCli" id="divPrinBusClilblFacA">Factura A:</div>
    <div id="divPrinBusCliTxtFacADiv">
      <label>
        <input class="regiCombitoDatos" name="BusClitxtFacturaA" type="text" id="BusClitxtFacturaA" size="50">
      </label>
    </div>
    <div id="divPrinBusCliBtnEnviar">
      <label>
        <input type="button" name="btnBuscarBusCli" id="btnBuscarBusCli" value="Buscar" onClick="llamarasincrono('http://201.120.55.76/sistema2011/clientes/gridDatosBusCliente.php?facturaA='+document.getElementById('BusClitxtFacturaA').value,'divPrinBusCliGridDatos')">
      </label>
    </div>
    <div id="apDiv1">
      <label>
        <input type="submit" name="btnNuevo" id="btnNuevo" value="Nuevo">
      </label>
    </div>
  </div>
  <div id="divPrinBusCliGridDatos"></div>
</div>
