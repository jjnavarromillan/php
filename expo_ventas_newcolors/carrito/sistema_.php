<?php 
	
	$usuario="";
	if(! isset($_COOKIE['usrsys'])){
		header("Location: http://201.120.55.76/sistema2011/carrito/login.php");
	}
	else{
		if($_COOKIE['usrsys']==""){
				header("Location: http://201.120.55.76/sistema2011/carrito/login.php");
		}
		 
		$usuario = $_COOKIE['usrsys'];
		
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
	
	require_once("carrito_class.php");
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
   </script>
   

    <link rel="stylesheet" type="text/css" href="carrito/sistema_files/StyleSheet.css">
   
    
<center>
<div id="divSessionId" style="display:none"><?php  echo "$sessionId";?></div>
<div id="contenidote2" class="contenidote2">
  <div class="marcote">
    <div id="cuadroLinea" class="cuadroLinea"></div>
    <div id="cuadroEstilo" class="cuadroEstilo">
      
      
</div>
  <div id="comboPlantillas"></div>
    <p>&nbsp;</p>
      <form action="accionesCarrito.aspx?opcion=verEstilos" name="frmCarrito" method="get">
      <div id="combo"></div>
      <div class="cuadroCarrito"><label id="idCliente" style="display:none"><?php  echo "$idRelacion";?></label>
      <div id="cerrar"><a href="cerrarSession.php" id="cerrarSession" onClick="cerrar_sesion();"> Cerrar  sesión</a> </label>| Cambiar Contraseña</div>
      <label class="nombreUsuario"><?php   echo "<br> $cliente"; ?></label>
      <div id="divCrearPedido" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick="cargarCrearPedido(<?php  echo "$idRelacion";?>);">Crear pedido</div>
      <div id="divAgregarACarro" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick="cargarDatosACarroSinClaves();">Agregar a carro</div>
      <div id="divBtnVerPedidos" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick="cargarVerPedido(<?php  echo "$idRelacion";?>);">Pedidos</div>
       
      <div id="tamElementsCarrito" style="display:none">0</div>
      <div id="cuadroresumen" class="cuadroresumen" >
      </div>
      </div>
      <div id="divEliminarElemento" onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" onClick="eliminarElementosCarrito(document.getElementById('idCliente').innerHTML)">Eliminar</div>
    </form></div>
</div>
<div id="divDatosCarro" style="display:none"></div>
<div class="divimggaleria" id="divimggaleria" style="border: thin solid; background-color:#333; position: absolute; height: 203px; width: 203px; left: 229px; top: 282px; display: none;"><img alt="" id="imggaleria" src="" onMouseOut="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria')" onClick="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria');llamarasincrono('pedido_cliente.php?idEstilo='+getEstiloPedido(),'cuadroEstilo');" width="203" height="203" value=""></div>
<label id="idEstiloPedido" style="display:none">idEstiloPedido</label>
<label id="$idUsuario" style="display:none"></label>
 <input name="opcion" value="verEstilo" type="hidden">
      <input name="sessionId" value="phyiox3y0pcwptryq5fwyp55" type="hidden">
 <div id="tagInfo" style="display:none">0</div>

                