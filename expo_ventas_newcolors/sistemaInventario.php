<?php 
	
	$usuario=$_REQUEST['usuario'];
	$tipo = $_REQUEST['tipo'];
	$idRelacion = $_REQUEST['idRelacion']; 
	if($usuario!=""){
		/*if($_COOKIE['usrsys']==""){
				header("Location: http://201.120.55.76/sistema2011/autentica.php");
		}*/
		//$usuario = $_COOKIE['usrsys'];
		
		$mysqli=new mysqli("locahost", "user_web", "123454321", "newcolors");
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$sql=" select * from usuarios where usuario='$usuario'";
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
    
   <script type="text/javascript" >
   	
	setTimeout("cargarCatalogosPlantillas()",1000)
	setTimeout("cargarLineas()",2000);
	setTimeout("cargarDatosCarrito(<?php  echo "$idRelacion"?>)",2000);
	setTimeout("cargarElementosEnCarro()",'3000');
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
	width:958px;
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
	left: 521px;
	top: 5px;
}
#divBarita1Sistm {
	position:absolute;
	width:2px;
	height:12px;
	z-index:2;
	left: 657px;
	top: 6px;
}
#divAgreSist {
	position:absolute;
	width:79px;
	height:11px;
	z-index:3;
	left: 666px;
	top: 5px;
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
	left: 891px;
	top: 6px;
}
#divPediSist {
	position:absolute;
	width:47px;
	height:11px;
	z-index:7;
	left: 603px;
	top: 5px;
}
#divEliminar23Sistema00 {
	position:absolute;
	width:45px;
	height:11px;
	z-index:8;
	left: 900px;
	top: 5px;
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
	left: 809px;
	top: 5px;
	text-align: center;
}
#divBarita3Sistm {
	position:absolute;
	width:2px;
	height:12px;
	z-index:94;
	left: 594px;
	top: 6px;
}
#divVerCatalogoInventario {
	position:absolute;
	width:77px;
	height:14px;
	z-index:95;
	left: 11px;
	top: 5px;
}


-->
   </style>
   <center>
<div id="divSessionId" style="display:none"><?php  echo "$sessionId";?></div>
<div id="contenidote2" class="contenidote2">
  <div class="marcote">
    <div id="cuadroLinea" class="cuadroLinea"></div>
    <div id="cuadroEstilo" class="cuadroEstilo">
     
     
      
</div>
    <div id="divConCAPE" style="background:url(source/barra-grisLg-2.jpg)">
      <div class="infoPrecio2" id="divCreaPSisstema20" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick="cargarCrearPedido(<?php  echo "$idRelacion";?>);">Crear Pedido</div>
      <div id="divBarita1Sistm">
        <div align="center"><img src="source/baritaSM.jpg" width="2" height="12" /></div>
      </div>
      <div class="infoPrecio2" id="divEliminar23Sistema00" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" onClick="eliminarElementosCarrito(document.getElementById('idCliente').innerHTML)">Eliminar</div>
  <div class="infoPrecio2" id="divPediSist" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick="cargarVerPedido(<?php  echo "$idRelacion";?>,'<?php  echo "$cliente";?>');">Pedidos</div>
  <div id="divBarita2Sistm"><img src="source/baritaSM.jpg" width="2" height="12" /></div>
  <div class="infoPrecio2" id="divAgreSist" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick="cargarDatosACarroSinClaves();">Agregar a Carro</div>
  <div class="infoPrecio2" id="divLimpiarCarriro" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" onClick="eliminarElementosCarritoAll(document.getElementById('idCliente').innerHTML)">Limpiar carro</div>
  <div id="divBarita3Sistm"><img src="source/baritaSM.jpg" width="2" height="12" /></div>
  <div class="infoPrecio2" id="divVerCatalogoInventario"><a href="#" onclick="llamarasincrono('http://201.120.55.76/sistema2011/carrito/ver_estilos_diseno_inventario.php','cuadroEstilo');"> INVENTARIO</a></div>
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
      <div id="cuadroresumen" class="cuadroresumen" ></div>
      </div>
      
  </form></div>
</div>
<div id="divDatosCarro" style="display:none"></div>
<div class="divimggaleria" id="divimggaleria" style="border: thin solid; background-color:#333; position: absolute; height: 203px; width: 203px; left: 229px; top: 282px; display: none;"><img alt="" id="imggaleria" src="" onMouseOut="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria')" onClick="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria');llamarasincrono('pedido_cliente.php?idEstilo='+getEstiloPedido(),'cuadroEstilo');" width="203" height="203" value=""></div>
<label id="idEstiloPedido" style="display:none">idEstiloPedido</label>
<label id="$idUsuario" style="display:none"></label>
 <input name="opcion" value="verEstilo" type="hidden">
      <input name="sessionId" value="phyiox3y0pcwptryq5fwyp55" type="hidden">
 <div id="tagInfo" style="display:none">0</div>
<label style="display:none" id="idCategoria"></label>
