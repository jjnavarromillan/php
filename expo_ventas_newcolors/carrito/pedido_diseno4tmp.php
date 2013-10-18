
<?php 

	$idTienda  = $_GET['idTienda'];
	$seccionCatalogo= $_REQUEST['seccionCatalogo'];
	$sql="";
    $mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
    $mysqli->query("SET NAMES 'utf8'");
	
		$cont=0;
		$idCarPed="";
		$Nombre="";
		$Tienda="";
		$domicilio="";
		$col="";
		$CP="";
		$Poblacion="";
		$Estado="";
		$Pais="";
		$RFC="";
		$fecha="";
		$tel="";
		$sql="";
		
	if($seccionCatalogo=="Temporadas"){
		
	//	$sql=" SELECT idCarPed,detallistas_clientes.idCliente,detallistas_clientes.Nombre,detallistas_clientes.telefonos,detallistas_clientes.domicilio,detallistas_clientes.col,detallistas_clientes.CP, municipios.municipio, estados.estado,paises.pais,detallistas_clientes.RFC, carrito_pedido.fecha FROM carrito_pedido, detallistas_clientes,paises,estados,municipios  where carrito_pedido.idCliente=detallistas_clientes.idCliente and paises.idPais=detallistas_clientes.idPais  and  carrito_pedido.idTienda='{$idTienda}'";
	
	$sql="SELECT carrito_pedido_operaciones.idCarPed, detallistas_tiendas.idCliente, detallistas_tiendas.idTienda, detallistas_clientes.nombre as Nombre, detallistas_tiendas.tienda, detallistas_clientes.domicilio, detallistas_clientes.col, detallistas_clientes.cp as CP, detallistas_clientes.telefonos, detallistas_clientes.fechaAlta as fecha, detallistas_clientes.RFC, detallistas_clientes.email, estados.estado, municipios.municipio
FROM (((carrito_pedido_operaciones LEFT JOIN detallistas_tiendas ON carrito_pedido_operaciones.idTienda = detallistas_tiendas.idTienda) LEFT JOIN detallistas_clientes ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio where detallistas_tiendas.idTienda='{$idTienda}'";

	}
	if($seccionCatalogo=="Distribuidores"){
		$sql=" SELECT idCarPed,detallistas_clientes.idCliente,detallistas_clientes.Nombre,detallistas_clientes.telefonos,detallistas_clientes.domicilio,detallistas_clientes.col,detallistas_clientes.CP,
municipios.municipio, estados.estado,paises.pais,detallistas_clientes.RFC, carrito_pedido.fecha
FROM carrito_pedido, detallistas_clientes,paises,estados,municipios  where carrito_pedido.idCliente=detallistas_clientes.idCliente and paises.idPais=detallistas_clientes.idPais
 and estados.idEstado=detallistas_clientes.idEstado  and municipios.idMunicipio=detallistas_clientes.idMunicipio and  carrito_pedido.idTienda='{$idTienda}' ";
	}
	if($seccionCatalogo=="Sugerencias"){
		$sql=" SELECT idCarPed,detallistas_clientes.idCliente,detallistas_clientes.Nombre,detallistas_clientes.telefonos,detallistas_clientes.domicilio,detallistas_clientes.col,detallistas_clientes.CP,municipios.municipio,
estados.estado,paises.pais,detallistas_clientes.RFC, fecha
FROM carrito_pedido_sugerencias, detallistas_clientes,paises,estados,municipios where carrito_pedido_sugerencias.idCliente=detallistas_clientes.idCliente and detallistas_clientes.idPais = paises.idPais and
estados.idEstado = detallistas_clientes.idEstado and municipios.idMunicipio=detallistas_clientes.idMunicipio and  carrito_pedido_sugerencias.idTienda='{$idTienda}' ";	
	}
	if($seccionCatalogo=="Inventario"){
		$sql=" SELECT idCarPed,idCliente,clientes_tiendas.Nombre,clientes_tiendas.Tienda,clientes_tiendas.Tel,clientes_tiendas.domicilio,clientes_tiendas.col,clientes_tiendas.CP,clientes_tiendas.Poblacion,clientes_tiendas.Estado,clientes_tiendas.Pais,clientes_tiendas.RFC, carrito_pedido_inventario.fecha
	FROM carrito_pedido_inventario, clientes_tiendas where carrito_pedido_inventario.idCliente=clientes_tiendas.idDatCli and  carrito_pedido_inventario.idTienda='{$idTienda}' ";	
	}

    if($result=$mysqli->query($sql)){
		
		$cont=1;
		if($obj=$result->fetch_object()){
			$idCarPed=$obj->idCarPed;
			$idCliente=$obj->idCliente;
			$Nombre=$obj->Nombre;
			//$Tienda=$obj->Tienda;
			$domicilio=$obj->domicilio;
			$col=$obj->col;
			$CP=$obj->CP;
			$Poblacion=$obj->municipio;
			$Estado=$obj->estado;
			//$Pais=$obj->pais;
			$RFC=$obj->RFC;
			$fecha=$obj->fecha;
			$tel=$obj->telefonos;
			
		}
	}
	
	
	
	
?>
<link rel="stylesheet" type="text/css" href="carrito/pedido_diseno4.css">
<link rel="stylesheet" type="text/css" href="pedido_diseno4.css">
<script language="javascript" src="../js/functions.js"></script>

<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:103px;
	height:18px;
	z-index:11;
	left: 307px;
	top: 430px;
}
#apDiv2 {
	position:absolute;
	width:16px;
	height:20px;
	z-index:7;
	left: -1px;
	top: 20px;
	background-color: #006666;
}
#divMasZoom {
	position:absolute;
	width:14px;
	height:14px;
	z-index:7;
	left: 233px;
	top: 55px;
}

-->
</style>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<body onLoad="MM_preloadImages('img/+-1.jpg')"><div id="divContent">



<div class="blancoEncabezado" id="divCantidadPedido">$<label class="descripcion2" id="SubtotalImporte">0</label></div>
<div id="divTotalPedido" class="descripcion">
        <div id="divImgTotal">
        
          <div class="blancoEncabezado"id="divNomTotal2">
            <div align="left"><strong>Total:</strong></div>
          </div>
    <img src="img/barrita_total2.jpg" width="102" height="17" /> </div>
    
  </div>


<div id="divTotalCorridas">
        <table width="100" border="0">
          <tr>
            <td width="64"><div align="center" class="abcd">
              <div align="left" class="descripcion">Total Pares</div>
            </div></td>
            <td width="26"><div align="center" class="descripcion"><label id="TotalPares">
              <div align="left">0</div>
            </label></div></td>
          </tr>
        </table>
  </div>
<div id="shopping"><img src="img/pedido.jpg" width="93" height="33" /></div>
    <div id="datos">
      <table width="280" border="0">
        <tr>
          <td><div align="left" class="abcd">Dirección: <?php  echo "$domicilio";?></div></td>
        </tr>
        <tr>
          <td><div align="left" class="abcd">Colonia: <?php  echo "$col";?> C.P <?php  echo "$CP";?></div></td>
        </tr>
        <tr>
          <td><div align="left" class="abcd">Población: <?php  echo "$Poblacion";?> EDO. <?php  echo "$Estado";?></div></td>
        </tr>
        <tr>
          <td><div align="left" class="abcd">Tel: <?php  echo "$tel";?></div></td>
        </tr>
        <tr>
          <td><div align="left" class="abcd">Tienda 
            <label>
            
            <?php 
			
			/// sql pára sacar tiendas 
			$sql5=" SELECT idTienda,tienda,estados.estado,municipios.municipio FROM detallistas_tiendas,estados,municipios where detallistas_tiendas.idEstado=estados.idEstado and detallistas_tiendas.idMunicipio=municipios.idMunicipio and detallistas_tiendas.idTienda='{$idTienda}' ";	

    if($result5=$mysqli->query($sql5)){
		?>
        
        <!--<select name="comboTiendaPedido" id="comboTiendaPedido" class="materialColor">->
        
        <?php 
		$cont=1;
		if($obj5=$result5->fetch_object()){
			$idTiendat=$obj5->idTienda;
			$Tienda=$obj5->tienda;
			
			echo $Tienda; 
			
		}
	}
			
			?>
            
              
             <!-- </select> -->
            </label>
          </div></td>
        </tr>
      </table>
    </div>
<div id="NomCliente" class="clienteNombre"><?php  echo "$Nombre";?></div>
<div id="divBarritaTablaPedido"><img src="source/barritaTabla.jpg" width="221" height="20" /></div>
    <div id="tablaCorridas">
      <table width="215" border="0">
        <tr>
          <td width="21"><div align="center" class="blancoEncabezado">Num</div></td>
          <td width="17"><div align="center" class="blancoEncabezado">2</div></td>
          <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
          <td width="17"><div align="center" class="blancoEncabezado">3</div></td>
          <td width="17"><div align="center"class="blancoEncabezado">-</div></td>
          <td width="17"><div align="center"class="blancoEncabezado">4</div></td>
          <td width="17"><div align="center"class="blancoEncabezado">-</div></td>
          <td width="17"><div align="center"class="blancoEncabezado">5</div></td>
          <td width="17"><div align="center"class="blancoEncabezado">-</div></td>
          <td width="17"><div align="center"class="blancoEncabezado">6</div></td>
          <td width="17"><div align="center"class="blancoEncabezado">-</div></td>
          <td width="22"><div align="center"class="blancoEncabezado">Total</div></td>
        </tr>

		 <?php 
	  	$contClaves=0;
		$sql3=" SELECT * FROM clave_pedido ";
		$result3=$mysqli->query($sql3);
		
		$clave="";
		$N2=0;
		$N2m=0;
		$N3=0;
		$N3m=0;
		$N4=0;
		$N4m=0;
		$N5=0;
		$N5m=0;
		$N6=0;
		$N6m=0;
		$pares=0;
		while($obj3=$result3->fetch_object()){
			$clave=$obj3->clave;
			$N2=$obj3->N2;
			$N2m=$obj3->N2m;
			$N3=$obj3->N3;
			$N3m=$obj3->N3m;
			$N4=$obj3->N4;
			$N4m=$obj3->N4m;
			$N5=$obj3->N5;
			$N5m=$obj3->N5m;
			$N6=$obj3->N6;
			$N6m=$obj3->N6m;
			$pares=$obj3->pares;
			$contClaves++;
		?>
        
        <tr>
          <td><div align="center" class="abcd"><strong><?php  echo "<label id='F{$contClaves}_clave' style='font-size:9'>{$clave}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N2' style='font-size:9'>{$N2}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N2m' style='font-size:9'>{$N2m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N3' style='font-size:9'>{$N3}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N3m' style='font-size:9'>{$N3m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N4' style='font-size:9'>{$N4}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N4m' style='font-size:9'>{$N4m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N5' style='font-size:9'>{$N5}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N5m' style='font-size:9'>{$N5m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N6' style='font-size:9'>{$N6}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N6m' style='font-size:9'>{$N6m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_pares' style='font-size:9'>{$pares}</label>";?></strong></div></td>
        </tr>
       <?php 
	   
		}
	   
	   ?>
      </table>
      <?php 
	
	echo "<label id='contClaves' style='display:none'>$contClaves</label>";
	
	?>
    </div>
    <div id="boton2">
      <div id="shopBoton" onClick="cargarEstilosTotal(); " onMouseOver="this.style.filter='alpha(opacity=70)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer'; "onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center"><img src="img/continuarcomprando.jpg" width="118" height="15" /></div>
      <div id="checkoBoton" onMouseOver="this.style.filter='alpha(opacity=70)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer'; "onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick="crearPedido(<?php  echo "$idCliente";?>);"><img src="img/facturar.jpg" width="81" height="20" /></div>
    </div>
  <div id="lineaDivi"><img src="img/linea-divisora.jpg" width="530" height="5" /></div>
    <div id="desMaterial">
      <table width="520" border="0">
        <tr>
          <td width="101"><div align="center" class="descripcion">Material / Color</div></td>
          <td width="87"> <div align="center" class="descripcion">Paquetes</div></td>
          <td width="212"><div align="center" class="descripcion">Numeración</div></td>
          <td width="63"><div align="center"  class="descripcion">Precio</div></td>
          <td width="35"><div align="center" class="descripcion">Total</div></td>
        </tr>
      </table>
    </div>
  <div id="apDiv1"><img src="img/boton_totalPares.jpg" width="102" height="15" /></div>
  <div id="pedidoShoes200">
      <?php  
	  $sql2="";
  	 if($seccionCatalogo=="Temporadas"){
		$sql2="SELECT tipo,lote,carrito_pedido_detalle_operaciones.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,carrito_pedido_detalle_operaciones.clave_pedido,carrito_pedido_detalle_operaciones.cantidad,
	carrito_pedido_detalle_operaciones.N2,carrito_pedido_detalle_operaciones.N2m,carrito_pedido_detalle_operaciones.N3,carrito_pedido_detalle_operaciones.N3m,carrito_pedido_detalle_operaciones.N4,carrito_pedido_detalle_operaciones.N4m,
	carrito_pedido_detalle_operaciones.N5,carrito_pedido_detalle_operaciones.N5m,carrito_pedido_detalle_operaciones.N6,carrito_pedido_detalle_operaciones.N6m,carrito_pedido_detalle_operaciones.Pares,
	carrito_pedido_detalle_operaciones.precio,carrito_pedido_detalle_operaciones.Total
	FROM carrito_pedido_detalle_operaciones,estilos
	where carrito_pedido_detalle_operaciones.idEstilo=estilos.Id and carrito_pedido_detalle_operaciones.idCarPed=$idCarPed";
	 }
	  if($seccionCatalogo=="Distribuidores"){
		$sql2="SELECT tipo,lote,carrito_pedido_detalle.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,carrito_pedido_detalle.clave_pedido,carrito_pedido_detalle.cantidad,
	carrito_pedido_detalle.N2,carrito_pedido_detalle.N2m,carrito_pedido_detalle.N3,carrito_pedido_detalle.N3m,carrito_pedido_detalle.N4,carrito_pedido_detalle.N4m,
	carrito_pedido_detalle.N5,carrito_pedido_detalle.N5m,carrito_pedido_detalle.N6,carrito_pedido_detalle.N6m,carrito_pedido_detalle.Pares,
	carrito_pedido_detalle.precio,carrito_pedido_detalle.Total
	FROM carrito_pedido_detalle,estilos
	where carrito_pedido_detalle.idEstilo=estilos.Id and idCarPed=$idCarPed";
	 }
	 if($seccionCatalogo=="Sugerencias"){
		$sql2="SELECT tipo,lote,carrito_pedido_detalle_sugerencias.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,carrito_pedido_detalle_sugerencias.clave_pedido,carrito_pedido_detalle_sugerencias.cantidad,carrito_pedido_detalle_sugerencias.N2,carrito_pedido_detalle_sugerencias.N2m,carrito_pedido_detalle_sugerencias.N3,carrito_pedido_detalle_sugerencias.N3m,carrito_pedido_detalle_sugerencias.N4,carrito_pedido_detalle_sugerencias.N4m,	carrito_pedido_detalle_sugerencias.N5,carrito_pedido_detalle_sugerencias.N5m,carrito_pedido_detalle_sugerencias.N6,carrito_pedido_detalle_sugerencias.N6m,carrito_pedido_detalle_sugerencias.Pares,	carrito_pedido_detalle_sugerencias.precio,carrito_pedido_detalle_sugerencias.Total
	FROM carrito_pedido_detalle_sugerencias,estilos
	where carrito_pedido_detalle_sugerencias.idEstilo=estilos.Id and idCarPed=$idCarPed";	 
	}
	if($seccionCatalogo=="Inventario"){
		$sql2="SELECT tipo,lote,carrito_pedido_detalle_inventario.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,carrito_pedido_detalle_inventario.clave_pedido,carrito_pedido_detalle_inventario.cantidad,carrito_pedido_detalle_inventario.N2,carrito_pedido_detalle_inventario.N2m,carrito_pedido_detalle_inventario.N3,carrito_pedido_detalle_inventario.N3m,carrito_pedido_detalle_inventario.N4,carrito_pedido_detalle_inventario.N4m,	carrito_pedido_detalle_inventario.N5,carrito_pedido_detalle_inventario.N5m,carrito_pedido_detalle_inventario.N6,carrito_pedido_detalle_inventario.N6m,carrito_pedido_detalle_inventario.Pares,	carrito_pedido_detalle_inventario.precio,carrito_pedido_detalle_inventario.Total
	FROM carrito_pedido_detalle_inventario,estilos
	where carrito_pedido_detalle_inventario.idEstilo=estilos.Id and idCarPed=$idCarPed";	 
	}
	

  	if($result4=$mysqli->query($sql2)){
	$contElementCarro=0;
	while($obj2=$result4->fetch_object()){
  	
		$tipo=$obj2->tipo;
		$lote =$obj2->lote;
		$idEstilo=$obj2->idEstilo;
		$linea=$obj2->linea;
		$estilo=$obj2->estilo;
		$material=$obj2->material;
		$color=$obj2->color;
		$clave_pedido=$obj2->clave_pedido;
		$N2=$obj2->N2;
		$N2m=$obj2->N2m;
		$N3=$obj2->N3;
		$N3m=$obj2->N3m;
		$N4=$obj2->N4;
		$N4m=$obj2->N4m;
		$N5=$obj2->N5;
		$N5m=$obj2->N5m;
		$N5m=$obj2->N5m;
		$N6=$obj2->N6;
		$N6m=$obj2->N6m;
		$Pares=$obj2->Pares;
		$precio=$obj2->precio;
		$Total=$obj2->Total;
		$nombreFoto="$estilo $material $color";
		$tam = strlen($nombreFoto);
		$res = "";

		for ($r=0;$r<$tam;$r++){
			$car = $nombreFoto[$r];
			if ($car == ' ')
				$car = '-';
			if ($car == 'Ñ')
				$car = 'N';
			if ($car == 'ñ') 
				$car = 'n';
			$res = $res . $car;
		}
		
		$foto=$res.".gif";
		$contElementCarro++;
  ?>
      <div id="contenidoCarrito200">
        <div id="Foto"><img src="../imagenes_system/muestras/minis/<?php  echo "$foto";?>" width="73" height="73" onClick="document.getElementById('divFotoZoom').style.visibility='visible';llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>','divFotoZoom');"  onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'"/></div>
        <div id="divNomEstilo" class="materialColor">
          <div align="center"><strong><?php  echo "$estilo";?></strong> <?php  echo "$material $color";?></div>
        </div>
        <div id="abcdTabla200">
          <table width="110" border="0">
            <tr>
              <td width="50"><div align="center" class="abcd">Paquetes</div></td>
              <td width="50"><div align="center" class="abcd">Cantidad</div></td>
            </tr>
            <tr>
              <td><label>
                <div align="center">
                  <select class="combito" name="select" id="comboPaq_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaCombos(<?php  echo "$idEstilo";?>);">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                </div>
              </label></td>
              <td><select class="combito" name="comboCant1" id="comboCant_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaCombos(<?php  echo "$idEstilo";?>);">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select></td>
            </tr>
          </table>
        </div>
        <div id="corridas">
          <table width="200" border="0">
            <tr>
              <td width="11"><div align="center" class="abcd">2</div></td>
              <td width="11"><div align="center" class="abcd">-</div></td>
              <td width="11"><div align="center" class="abcd">3</div></td>
              <td width="11"><div align="center" class="abcd">-</div></td>
              <td width="11"><div align="center" class="abcd">4</div></td>
              <td width="11"><div align="center" class="abcd">-</div></td>
              <td width="11"><div align="center" class="abcd">5</div></td>
              <td width="11"><div align="center" class="abcd">-</div></td>
              <td width="11"><div align="center" class="abcd">6</div></td>
              <td width="11"><div align="center" class="abcd">-</div></td>
              <td width="44"><div align="center" class="abcd">PARES</div></td>
            </tr>
            <tr>
              <td><div align="center" class="numerosPedido">
                <label id="SN2_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN2m_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN3_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN3m_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN4_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN4m_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN5_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN5m_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN6_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="numerosPedido">
                <label id="SN6m_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
              <td><div align="center" class="abcd">
                <label id="Importe_<?php  echo "$idEstilo";?>">0</label>
              </div></td>
            </tr>
          </table>
        </div>
        <div id="precio" class="numerosPedido">
          <div align="center">$
            <label id="lblPrecio_<?php  echo "$idEstilo";?>"><?php  echo "$precio";?></label>
          </div>
        </div>
        <div id="total" class="abcd">
          <div align="center">$
            <label id="lblImporte_<?php  echo "$idEstilo";?>">0</label>
            <label style="display:none" id="lblImporte_<?php  echo "$contElementCarro";?>">0</label>
          </div>
        </div>
        <div id="divMasZoom"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen9','','img/+-1.jpg',1)"><img src="carrito/img/mas.jpg" name="Imagen9" width="13" height="13" border="0" id="Imagen9" onClick="document.getElementById('divFotoZoom').style.visibility='visible';llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>','divFotoZoom');"  onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'"/></a></div>
      </div>
    <label  style="display:none" id="index_<?php  echo "$contElementCarro";?>"><?php  echo "$idEstilo";?></label>
      <?php  
	  } 
	}
   ?>
  </div>
  <label id="contElementosEnCarro" style="display:none"><?php  echo "$contElementCarro";?></label>
</div>

