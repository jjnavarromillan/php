<link rel="stylesheet" type="text/css" href="datagridNCClientes/vista_filtro.css">

<link rel="stylesheet" type="text/css" href="datagridNCClientes/configCampoDB.css">
<link rel="stylesheet" type="text/css" href="datagridNCClientes/datagridNC.css" id="datagridcss">
<link rel="stylesheet" type="text/css" href="configCampoDB.css">
<link rel="stylesheet" type="text/css" href="datagridNC.css">
<link rel="stylesheet" type="text/css" href="vista_filtro.css">

<script language="javascript" type="text/javascript" src="datagridNCClientes/JSON.php"></script>
<script language="javascript" type="text/javascript" src="datagridNCClientes/jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="datagridNCClientes/jquery.validate.1.5.2.js"></script>
<script language="javascript" src="../js/codigo.js"></script>
<script language="javascript" src="../../js/codigo.js"></script>
<script language="javascript" src="datagridNCClientes/datagridNC.js"></script>
<script language="javascript" src="datagridNC.js"></script>





<link rel="stylesheet" type="text/css" href="clientes/datagridNCClientes/vista_filtro.css">
<link rel="stylesheet" type="text/css" href="clientes/datagridNCClientes/configCampoDB.css">
<link rel="stylesheet" type="text/css" href="clientes/datagridNCClientes/datagridNC.css">
<link rel="stylesheet" type="text/css" href="clientes/configCampoDB.css">
<link rel="stylesheet" type="text/css" href="clientes/datagridNC.css">
<link rel="stylesheet" type="text/css" href="clientes/vista_filtro.css">
<script language="javascript" type="text/javascript" src="clientes/datagridNCClientes/JSON.php"></script>
<script language="javascript" type="text/javascript" src="clientes/datagridNCClientes/jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="clientes/datagridNCClientes/jquery.validate.1.5.2.js"></script>
<script language="javascript" src="js/codigo.js"></script>
<script language="javascript" src="../js/codigo.js"></script>
<script language="javascript" src="clientes/datagridNCClientes/datagridNC.js"></script>
<script language="javascript" src="clientes/datagridNC.js"></script>




<style type="text/css">
#divTitutloBUsquedaCliente {
	position:absolute;
	width:139px;
	height:20px;
	z-index:9;
	left: 7px;
	top: 4px;
}
#divImgCerrar {
	position:absolute;
	width:13px;
	height:20px;
	z-index:10;
	left: 545px;
	top: 7px;
	text-align: center;
}
#divDataGridCerrar {
	position:absolute;
	width:28px;
	height:14px;
	z-index:4000;
	left: 510px;
	top: 7px;
}
#apDiv1 {
	position:absolute;
	width:90px;
	height:20px;
	z-index:4001;
	left: 405px;
	top: 8px;
}
</style>
<div id="divDatosDataGridClientes" style="display:none"></div>


<div id="divDataGridClientes"> 
<div id="divTableDatosHeaderClientes"  style="">
        <table width="500" border="0" id="tablaDatHeaderClientes" class="tablaDatClientes" bgcolor="" style="border-spacing: 0;"   >
        </table>
  </div> 
    <div id="divTableDatosClientes"  style=""> 
      <table width="500" border="0" id="tablaDatClientes" class="tablaDatClientes" bgcolor="" style="border-spacing: 0;"  ></table>
  </div>
  <div id="divBotQuiUlFiltroClientes"><a href="#" onclick="quitarUltimoFiltroClientes();"/><img src="carrito/img/quitar-ultimo-filtro.jpg"  border="0"width="112" height="19" /></a></div>
  <div id="divTitutloBUsquedaCliente"><img src="carrito/img/buscar-cliente.png" width="136" height="18" /></div>
  <div id="divImgCerrar" onclick="document.getElementById('divSistemaEmergente').style.visibility='hidden';"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" width="12" height="13" border="0" /></a></div>
  <div  class="InfoPasarelaCompletaClientes" id="divDataGridCerrar" onclick="document.getElementById('divSistemaEmergente').style.visibility='hidden';">cerrar</div>
  
</div>
<div id="divUltimoFiltroClientes" style="display:none"></div>  

