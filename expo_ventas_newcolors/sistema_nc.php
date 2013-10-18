<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php 
	$idUsuario="";
	$usuario=$_REQUEST['usuario'];
	$tipo = $_REQUEST['tipo'];
	$idRelacion = $_REQUEST['idRelacion']; 
	$seccionCatalogo = $_REQUEST['seccionCatalogo']; 
	$nombrecliente="";
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
				$idUsuario = $rowdata->idUsuario;
				$tipo = $rowdata->tipo;
				$idRelacion = $rowdata->idRelacion; 
				$status = $rowdata->status;
				$motivoCancel = $rowdata->motivoCancel;
				$fechaCancel = $rowdata->fechaCancel;
				$nombrecliente = $rowdata->nombre;
			}
		}	
		
		$mysqli->close();
	}
	
	require_once("carrito/carrito_class.php");
	$carrito=new carrito();
	$sessionId="1";
	
	$cliente = $carrito->getNombreCliente($idRelacion,$tipo);
?>      



    <script language="JavaScript" type="text/javascript" src="js/codigo.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/functions.js"></script>
    <link type="text/css" href= "js/jquery-ui-1.8.14.custom/css/ui-lightness/jquery-ui-1.8.14.custom.css"  rel="Stylesheet" />	
    <script type="text/javascript" src="js/jquery-ui-1.8.14.custom/js/jquery-1.5.1.min.js" ></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.14.custom/js/jquery-ui-1.8.14.custom.min.js"></script>
    
   <script type="text/javascript" >
   	
	
	//setTimeout("cargarLineas()",2000);
	setTimeout("cargarFiltros_nc('<?php  echo $seccionCatalogo; ?>')",1000);  ///////// aqui poner el tipo de catalogo
	/*setTimeout("cargarCatalogosPlantillas()",2000);
	setTimeout("cargarCategoriasCalzado()",2000);
	setTimeout("cargarMaterial()",2000);
	setTimeout("cargarColores()",2000);
	setTimeout("cargarLineasGroup()",2000)	;*/
	
	
	setTimeout("cargarDatosCarrito(<?php  echo "$idRelacion"?>)",2000);
	setTimeout("cargarElementosEnCarro()",'3000');
	setTimeout("cargarEstilosTotalNC()",'4000');
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
#divConCAPE {
	position:absolute;
	width:794px;
	height:25px;
	z-index:92;
	left: 0px;
	top: 6px;
}
#divCreaP2SisFondo {
	position:absolute;
	width:82px;
	height:18px;
	z-index:1;
	top: 2px;
	left: 1px;
}
#divcreaTxt2peSis {
	position:absolute;
	width:69px;
	height:13px;
	z-index:1;
	top: 2px;
	left: 4px;
}

#divPepTxt2peSis {
	position:absolute;
	width:47px;
	height:15px;
	z-index:1;
	left: 13px;
	top: 0px;
}
#divCreaPSisstema20 {
	position:absolute;
	width:65px;
	height:11px;
	z-index:1;
	left: 166px;
	top: 7px;
}
#divBarita1Sistm {
	position:absolute;
	width:2px;
	height:12px;
	z-index:2;
	left: 301px;
	top: 8px;
}
#divAgreSist {
	position:absolute;
	width:79px;
	height:11px;
	z-index:2000;
	left: 438px;
	top: 30px;
}
#divZapSistema {
	position:absolute;
	width:13px;
	height:12px;
	z-index:4;
	left: 188px;
	top: 6px;
}
#divZap01MSistema {
	position:absolute;
	width:27px;
	height:12px;
	z-index:5;
	left: 225px;
	top: 6px;
}
#divBarita2Sistm {
	position:absolute;
	width:2px;
	height:12px;
	z-index:6;
	left: 535px;
	top: 8px;
}
#divPediSist {
	position:absolute;
	width:47px;
	height:11px;
	z-index:7;
	left: 247px;
	top: 7px;
}
#divEliminar23Sistema00 {
	position:absolute;
	width:45px;
	height:11px;
	z-index:8;
	left: 724px;
	top: 8px;
}
#apDiv2 {
	position:absolute;
	width:39px;
	height:13px;
	z-index:92;
	top: 14px;
	left: 0px;
}
#divLimpiarCarriro {
	position:absolute;
	width:73px;
	height:11px;
	z-index:93;
	left: 628px;
	top: 8px;
	text-align: center;
}
#divBarita3Sistm {
	position:absolute;
	width:2px;
	height:12px;
	z-index:94;
	left: 238px;
	top: 8px;
}
#divVerCatalogoInventario {
	position:absolute;
	width:59px;
	height:16px;
	z-index:95;
	left: 5px;
	top: 3px;
	visibility: hidden;
}
#divSugerencias {
	position:absolute;
	width:90px;
	height:16px;
	z-index:96;
	left: 279px;
	top: 5px;
	text-align: center;
}
#divMuestrario {
	position:absolute;
	width:90px;
	height:16px;
	z-index:97;
	left: 181px;
	top: 5px;
	text-align: center;
}
#divInventario {
	position:absolute;
	width:90px;
	height:16px;
	z-index:98;
	left: 83px;
	top: 5px;
	text-align: center;
}
#apDiv4 {
	position:absolute;
	width:173px;
	height:21px;
	z-index:1;
}
#divGranTotalCarro {
	position:absolute;
	width:179px;
	height:24px;
	z-index:1;
	left: 25px;
	top: 34px;
	
	
}
#divFotoZoom {
	position:absolute;
	width:385px;
	height:426px;
	z-index:1001;
	left: 269px;
	top: 47px;
	background-color: #FFFFFF;
}
#divContenedorPedidos {
	position:absolute;
	width:967px;
	height:499px;
	z-index:1000;
	left: 1px;
	top: 42px;
	background-color: #FFFFFF;
}
#divCrearPedidoCarro {
	position:absolute;
	width:77px;
	height:17px;
	z-index:1002;
	left: 671px;
	top: 77px;
}


-->
   </style>
   <center>
   <div id="divCrearPedidoCarro" class="infoPrecio2" onclick="cargarCrearPedido(document.getElementById('idCliente').innerHTML);">Crear pedido</div>
   <div id="divSessionId" style="display:none"><?php  echo "$sessionId";?></div>
<div id="contenidote2" class="contenidote2">
  <div class="marcote">
    <div id="cuadroLinea" class="cuadroLinea"></div>
    <div id="cuadroEstilo" class="cuadroEstilo">
     
     
      
</div>
    <div id="divConCAPE" >
      <div class="infoPrecio2" id="divEliminar23Sistema00" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" onClick="eliminarElementosCarrito(document.getElementById('idCliente').innerHTML)">Eliminar</div>
      <div class="infoPrecio2" id="divLimpiarCarriro" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" onClick="eliminarElementosCarritoAll(document.getElementById('idCliente').innerHTML)">Limpiar carro</div>
  <div class="infoPrecio2" id="divVerCatalogoInventario"><a href="#" onclick="llamarasincrono('http://localhost/sistema2011/carrito/ver_estilos_diseno_inventario.php','cuadroEstilo');"> <label id="lblTituloSeccionActiva" >Muestrario</label> </a></div>
    </div>
<p>&nbsp;</p>
      <form action="accionesCarrito.aspx?opcion=verEstilos" name="frmCarrito" method="get">
      <div id="combo"></div>
      <div class="cuadroCarrito"><label id="idCliente" style="display:none"><?php  echo "$idRelacion";?></label>      
      <label class="nombreUsuario" style="display:none"><?php   echo "<br> $cliente"; ?></label>
	  <script language="javascript">
      		document.getElementById('nombrecliente').innerHTML="<?php   echo "<br> $cliente"; ?>";
      </script>
      
      
      
       
      <div id="tamElementsCarrito" style="display:none">0</div>
      <div id="cuadroresumen" class="cuadroresumen" ><label id='lblCantidadEnCarrito'>0</label>
      </div>
      </div>
      
  </form></div>
</div>
<div id="divContenedorPedidos" style="visibility:hidden"></div>
<div id="divFotoZoom" style="visibility:hidden"></div>
<div id="divDatosCarro" style="display:none"></div>
<div class="divimggaleria" id="divimggaleria" style="border: thin solid; background-color:#333; position: absolute; height: 203px; width: 203px; left: 229px; top: 282px; display: none;"><img alt="" id="imggaleria" src="" onMouseOut="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria')" onClick="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria');llamarasincrono('pedido_cliente.php?idEstilo='+getEstiloPedido(),'cuadroEstilo');" width="203" height="203" value=""></div>
<label id="idEstiloPedido" style="display:none">idEstiloPedido</label>
<label id="$idUsuario" style="display:none"></label>
 <input name="opcion" value="verEstilo" type="hidden">
      <input name="sessionId" value="phyiox3y0pcwptryq5fwyp55" type="hidden">
 <div id="tagInfo" style="display:none">0</div>
<label style="display:none" id="idCategoria"></label>
