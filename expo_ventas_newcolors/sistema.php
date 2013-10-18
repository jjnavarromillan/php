<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php 
	$idUsuario="";
	$usuario=$_REQUEST['usuario'];
	$tipo = $_REQUEST['tipo'];
	$idRelacion = $_REQUEST['idRelacion']; 
	$permisos = $_REQUEST['permisos']; 	
	$seccionCatalogo = $_REQUEST['seccionCatalogo']; 
	$nombrecliente= "";//"";$_REQUEST['nombrecliente']; 
	//$arrayPermisos=explode($permisos,',');
	if($usuario!=""){
		$mysqli=new mysqli("localhost", "user_web","123454321", "newcolors_expo");
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$sql=" select * from usuarios_web where usuario='$usuario'";
		$result=$mysqli->query($sql);
		$resultado_=" ";

		if($result){
			$num=mysqli_num_rows($result);
			
			if($num>0)
			{	
				$rowdata = mysqli_fetch_object($result);
				$idUsuario = $rowdata->idUsuarioWeb;
				$tipo = $rowdata->tipoUsuario;
				$idRelacion = $rowdata->idRelacion; 
				$status = $rowdata->status;
				$motivoCancel = $rowdata->motivoCancel;
				$fechaCancel = $rowdata->fechaCancel;
			
			}
		}	
		
		$mysqli->close();
	}
	
	require_once("carrito/carrito_class.php");
	$carrito=new carrito();
	$sessionId="1";
	
	$cliente = $carrito->getNombreCliente($idUsuario,$tipo);
?>      



    <script language="JavaScript" type="text/javascript" src="js/codigo.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/functions.js"></script>
    <link type="text/css" href= "js/jquery-ui-1.8.14.custom/css/ui-lightness/jquery-ui-1.8.14.custom.css"  rel="Stylesheet" />	
    <script type="text/javascript" src="js/jquery-ui-1.8.14.custom/js/jquery-1.5.1.min.js" ></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.14.custom/js/jquery-ui-1.8.14.custom.min.js"></script>
    
    

    <script language="javascript" src="clientes/acciones_clientes.js"></script>
    <script language="javascript" src="clientes/datagridNCClientes/datagridNC.js"></script>

    
   <script type="text/javascript" >
   	
	
	//setTimeout("cargarLineas()",2000);
	setTimeout("cargarFiltros('<?php  echo $seccionCatalogo; ?>')",1000);
	/*setTimeout("cargarCatalogosPlantillas()",2000);
	setTimeout("cargarCategoriasCalzado()",2000);
	setTimeout("cargarMaterial()",2000);
	setTimeout("cargarColores()",2000);
	setTimeout("cargarLineasGroup()",2000)	;*/
	
	
	setTimeout("cargarDatosCarrito(<?php  echo "$idRelacion"?>)",2000);
	setTimeout("cargarElementosEnCarro()",'3000');
	setTimeout("cargarEstilosTotal()",'4000');
	//document.getElementById('divMuestrario').style.background="#F92";
	
	
   </script>
   

    <link rel="stylesheet" type="text/css" href="carrito/sistema_files/StyleSheet.css">
   
    
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:211px;
	height:23px;
	z-index:92;
	left: 170px;
	top: 142px;
}
#apDiv2 {
	position:absolute;
	width:39px;
	height:13px;
	z-index:92;
	top: 14px;
	left: 0px;
}
#divSistemaEmergente {
	position:absolute;
	width:620px;
	height:514px;
	z-index:2900;
	left: 7px;
	top: 1px;
	background-color: #FFF;
	visibility: hidden;
	border: thin solid #CCC;
}
#divDatos {
	position:absolute;
	width:680px;
	height:530px;
	z-index:3005;
	left: 1px;
	top: 1px;
	background-color: #FFF;
	visibility: hidden;
	border: thin solid #CCC;
}
#divSistemaTiendaSel {
	position:absolute;
	width:105px;
	height:16px;
	z-index:2010;
	left: 359px;
	top: 7px;
	border: thin solid #D6D6D6;
}
#divLblSistemaTiendaSel {
	position:absolute;
	width:45px;
	height:15px;
	z-index:2010;
	left: 306px;
	top: 7px;
}
#divSistemalblIdTienda {
	position:absolute;
	width:51px;
	height:13px;
	z-index:1004;
}
#divSistemalblIdCliente {
	position:absolute;
	width:67px;
	height:15px;
	z-index:1005;
	left: 73px;
	visibility: hidden;
}
#divSistemaCantidadCarro {
	position:absolute;
	width:187px;
	height:19px;
	z-index:1006;
	left: 619px;
	top: 9px;
}
#divSistemaVerCarro2100 {
	position:absolute;
	width:76px;
	height:20px;
	z-index:2002;
	left: 100px;
	top: 7px;
	text-align: center;
}
#divRecuadroResumen {
	position:absolute;
	width:189px;
	height:53px;
	z-index:3000;
	left: 628px;
	top: 37px;
}
#divCrearPedidoCarro2100 {
	position:absolute;
	width:76px;
	height:20px;
	z-index:2001;
	left: 21px;
	top: 7px;
	text-align: center;
}
#apDiv6 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1123;
}
#divAgrandar {
	position:absolute;
	width:200px;
	height:28px;
	z-index:3001;
	left: 863px;
	top: 483px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}


 
--> 
   </style> 
   <center>
   <div id="divSistemalblIdTienda" style="visibility:hidden"></div>
   <div id="divSistemalblIdCliente" style="visibility:hidden"></div>
   <div id="divSistemaCantidadCarro">
   <div id="cuadroresumen" class="cuadroresumen" >
          <label id='lblCantidadEnCarrito'>0</label>
   </div></div>
   
<div id="divSessionId" style="display:none"><?php  echo "$sessionId";?></div>
<div id="contenidote2" class="contenidote2">
  <div class="marcote">
    <div id="cuadroLinea" class="cuadroLinea"></div>
    <div id="cuadroEstilo" class="cuadroEstilo"></div> 
    <div id="cuadroEstilo2"  class="cuadroEstilo" style="visibility:hidden"></div> 
    <div id="divConCAPE" > 
    
    	
         
     
       
      <div class="infoPrecio2" id="divVerCatalogoInventario"><a href="#" onclick="llamarasincrono('http://localhost/sistema2011/carrito/ver_estilos_diseno_inventario.php','cuadroEstilo');">
        <label id="lblTituloSeccionActiva" >Muestrario</label>
      </a></div>
      <div id="divMuestrario" class="infoPrecio2" onclick="cambiarAMuestrario();">Muestrario</div>
      <!--<div id="divSugerencias" class="infoPrecio2" onclick="cambiarASugerencias();">Sugerencias</div>!-->
      <div id="divInventario" class="infoPrecio2" onclick="cambiarAInventario();">Inventario</div>
    </div>
    <p>&nbsp;</p>
    <form action="accionesCarrito.aspx?opcion=verEstilos" name="frmCarrito" method="get">
      <div id="combo"></div>
      <div id="divEncabezadoSistema">
        <div  class="campoTxPedidoSistema" id="divNomClienteSistema" onClick="verClienteBusquedaSistema('sistemaAdminPedido');"></div>
<div class="tipoDatosClientesSistema"id="divClienteSistema" onClick="verClienteBusquedaSistema('sistemaAdminPedido');">Cliente:</div>
<div id="divGrupoBusquedaSistema"> 
  <div id="divImgLupaSistema" onClick="verClienteBusquedaSistema('sistemaAdminPedido');"><a href="#"><img src="img/lupa.jpg" width="18" height="18" border="0" /></a></div>
</div>
<div  class="campoBusquedaSistema"id="divAgregarCliSistema"></div>
<div class="tipoDatosClientesSistema" id="divLblSistemaTiendaSel" onClick="verClienteBusquedaSistema('sistemaAdminPedido');">Tienda:</div>
<div class="campoTxPedidoSistema" id="divSistemaTiendaSel" onClick="verClienteBusquedaSistema('sistemaAdminPedido');"></div>
      </div> 
      <div class="cuadroCarrito" id="divListaCarritoSistema">
        <label id="idCliente" style="display:none"><?php  echo "$idRelacion";?></label>
        <label class="nombreUsuario" style="display:none">
          <?php   echo "$nombrecliente"; ?>
        </label>
        <script language="javascript">

      	
      </script>
        <div id="tamElementsCarrito" style="display:none">0</div>
        
      </div>
    </form>
  </div>
</div>
<div id="divRecuadroResumen" class="infoPrecio2">
<div class="infoPrecio2Sistema" id="divEliminar23Sistemas2012B" onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" onclick="eliminarElementosCarrito(document.getElementById('divSistemalblIdTienda').innerHTML)">Eliminar</div>
<div class="infoPrecio2Sistema" id="divLimpiarCarriro2" onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" onclick="eliminarElementosCarritoAll(document.getElementById('divSistemalblIdTienda').innerHTML)">Limpiar carro</div>
<div class="infoPrecio2Sistema" id="divSistemaVerCarro2100" onclick="window.open('hoja_pedido_impresion_carrito.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML,'_blank');">Ver Carro</div>
  <div class="infoPrecio2Sistema" id="divCrearPedidoCarro2100" onclick="cargarCrearPedido(document.getElementById('divSistemalblIdTienda').innerHTML);">Crear pedido</div>
 
</div>
<div id="divFotoZoom" style="visibility:hidden"></div> 
<div id="divDatosCarro" style="display:none"></div>
<div class="divimggaleria" id="divimggaleria" style="border: thin solid; background-color:#333; position: absolute; height: 203px; width: 203px; left: 229px; top: 282px; display: none;"><img alt="" id="imggaleria" src="" onMouseOut="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria')" onClick="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria');llamarasincrono('pedido_cliente.php?idEstilo='+getEstiloPedido(),'cuadroEstilo');" width="203" height="203" value=""></div>
<label id="idEstiloPedido" style="display:none">idEstiloPedido</label>
<label id="$idUsuario" style="display:none"></label>
 <input name="opcion" value="verEstilo" type="hidden">
      <input name="sessionId" value="phyiox3y0pcwptryq5fwyp55" type="hidden">
 <div id="tagInfo" style="display:none">0</div>
<label style="display:none" id="idCategoria"></label>
<div id="divSistemaEmergente"></div>
<div id="divDatos"></div>

