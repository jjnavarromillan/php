
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
		
		$idTiendat="";
		$nombre="";
		$tienda="";
		$estado="";
		$municipio="";
		$colonia = "";
		$domicilio = "";
		$tels = "";
		$cp = "";
		$RFC = "";
		$tels ="";
		$email = "";
		$estadoTienda ="";
		$municipioTienda = "";
		$domTienda = "";
		$colTienda = "";
		$cpTienda = "";
		$transporte = "";
		$obsGuia = "";
		$transporteSeguro ="";
		
	if($seccionCatalogo=="Temporadas"){
		
	//	$sql=" SELECT idCarPed,detallistas_clientes.idCliente,detallistas_clientes.Nombre,detallistas_clientes.telefonos,detallistas_clientes.domicilio,detallistas_clientes.col,detallistas_clientes.CP, municipios.municipio, estados.estado,paises.pais,detallistas_clientes.RFC, carrito_pedido.fecha FROM carrito_pedido, detallistas_clientes,paises,estados,municipios  where carrito_pedido.idCliente=detallistas_clientes.idCliente and paises.idPais=detallistas_clientes.idPais  and  carrito_pedido.idTienda='{$idTienda}'";
	
	$sql="SELECT carrito_pedido_operaciones.idCarPed, detallistas_tiendas.idCliente, detallistas_tiendas.idTienda, detallistas_clientes.nombre as Nombre, detallistas_tiendas.tienda as Tienda, detallistas_clientes.domicilio, detallistas_clientes.col, detallistas_clientes.cp as CP, detallistas_clientes.telefonos, detallistas_clientes.fechaAlta as fecha, detallistas_clientes.RFC, detallistas_clientes.email, estados.estado, municipios.municipio
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
			$Tienda=$obj->Tienda;
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
#apDivBarra {
	position:absolute;
	width:63px;
	height:18px;
	z-index:11;
	left: 424px;
	top: 259px;
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
	left: 53px;
	top: 4px;
}
#divLblbTotalPares {
	position:absolute;
	width:30px;
	height:14px;
	z-index:1;
	left: 3px;
	top: 3px;
}
#divLblTotalPares {
	position:absolute;
	width:50px;
	height:14px;
	z-index:12;
	left: 424px;
	top: 261px;
	text-align: center;
}
#divlblImporteTotal {
	position:absolute;
	width:58px;
	height:21px;
	z-index:12;
	left: 534px;
	top: 258px;
	text-align: center;
}
#divContenidoCarritoBtnNumPer {
	position:absolute;
	width:67px;
	height:18px;
	z-index:8;
	left: 196px;
	top: 57px;
	background-color: #CCCCCC;
	text-align: center;
	color: #FFF;
	padding: 1px;
	margin: 1px;
}
#divCaritoDisenoPedidoNumPer {
	position:absolute;
	width:561px;
	height:300px;
	z-index:10;
	left: 14px;
	top: 107px;
	background-color: #FFFFFF;
	visibility: hidden;
}
#divAtras {
	position:absolute;
	width:31px;
	height:15px;
	z-index:12;
	left: 627px;
	top: 4px;
}
#divCerrarPedidoDise4 {
	position:absolute;
	width:15px;
	height:15px;
	z-index:13;
	left: 660px;
	top: 4px;
}
#divContenerNumPedido4 {
	position:absolute;
	width:215px;
	height:18px;
	z-index:11;
	top: 21px;
	left: 223px;
}
#divNum2 {
	position:absolute;
	width:14px;
	height:14px;
	z-index:1;
	top: -2px;
	margin: 1px;
	padding: 1px;
	text-align: center;
}
#divNum2m {
	position:absolute;
	width:14px;
	height:14px;
	z-index:2;
	left: 16px;
	margin: 1px;
	padding: 1px;
	text-align: center;
	top: -2px;
}
#divNum3 {
	position:absolute;
	width:14px;
	height:14px;
	z-index:3;
	left: 32px;
	text-align: center;
	margin: 1px;
	padding: 1px;
	top: -2px;
}
#divNum3m {
	position:absolute;
	width:14px;
	height:14px;
	z-index:4;
	left: 48px;
	text-align: center;
	margin: 1px;
	padding: 1px;
	top: -2px;
}
#divNum4 {
	position:absolute;
	width:14px;
	height:14px;
	z-index:5;
	left: 64px;
	text-align: center;
	margin: 1px;
	padding: 1px;
	top: -2px;
}
#divNum4m {
	position:absolute;
	width:14px;
	height:14px;
	z-index:6;
	left: 80px;
	top: -2px;
	text-align: center;
	margin: 1px;
	padding: 1px;
}
#divNum5 {
	position:absolute;
	width:14px;
	height:14px;
	z-index:7;
	left: 96px;
	text-align: center;
	margin: 1px;
	padding: 1px;
	top: -2px;
}
#divNum5m {
	position:absolute;
	width:14px;
	height:14px;
	z-index:8;
	left: 111px;
	top: -2px;
	text-align: center;
	margin: 1px;
	padding: 1px;
}
#divNum6 {
	position:absolute;
	width:14px;
	height:14px;
	z-index:9;
	left: 126px;
	text-align: center;
	margin: 1px;
	padding: 1px;
	top: -2px;
}
#divNum6m {
	position:absolute;
	width:14px;
	height:14px;
	z-index:10;
	left: 142px;
	top: -2px;
	text-align: center;
	margin: 1px;
	padding: 1px;
}
#apDiv1 {
	position:absolute;
	width:45px;
	height:16px;
	z-index:11;
}
#apDiv3 {
	position:absolute;
	width:81px;
	height:19px;
	z-index:11;
}

.tipoBlancoDis4{
	font-family:Arial, Helvetica, sans-serif;
	color:#FFF;
	font-size:10px;
}
#DI {
	position:absolute;
	width:590px;
	height:6px;
	z-index:14;
	left: 22px;
	top: 279px;
}
#apDiv4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:15;
	left: 11px;
	top: 106px;
}

#divContentDivTxtQuienPide {
	position:absolute;
	width:118px;
	height:18px;
	z-index:15;
	left: 72px;
	top: 103px;
}
#apDiv5 {
	position:absolute;
	width:95px;
	height:24px;
	z-index:11;
	left: 309px;
}
#divContentDivLblPedido {
	position:absolute;
	width:72px;
	height:16px;
	z-index:16;
	left: 231px;
	top: 105px;
}
#divContentDivComboLugarPedido {
	position:absolute;
	width:74px;
	height:23px;
	z-index:11;
	left: 220px;
	top: 0px;
}
#apDiv6 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:11;
	left: 374px;
	top: 135px;
}
#divCopiarNumeracionAtodos {
	position:absolute;
	width:140px;
	height:20px;
	z-index:1;
	left: 502px;
	top: 215px;
	text-align: center;
}
#divLbl2DomicilioDocs {
	position:absolute;
	width:58px;
	height:17px;
	z-index:17;
	left: 9px;
	top: 135px;
}
#divDomicilioDocs {
	position:absolute;
	width:616px;
	height:27px;
	z-index:18;
	left: 60px;
	top: 134px;
	text-align:justify;
}
#apDiv8 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:12;
}
#divDomicilioDocsEnvio {
	position:absolute;
	width:606px;
	height:38px;
	z-index:19;
	left: 60px;
	top: 167px;
	text-align: justify;
}
#divLblDomicilioDocs {
	position:absolute;
	width:40px;
	height:17px;
	z-index:20;
	left: 4px;
	top: 169px;
}
#divTiendaPedidoDiseno4 {
	position:absolute;
	width:260px;
	height:21px;
	z-index:21;
	left: 8px;
	top: 81px;
	text-align: left;
}
.campoTextoBuscarClientes{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	text-align:left;
	height:16px;
}
#divContentLblQuienPide {
	position:absolute;
	width:59px;
	height:15px;
	z-index:22;
	left: 6px;
	top: 105px;
}
.gdFont{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#999;
	font-weight:600;
}
#divGuardarNumBoton {
	position:absolute;
	width:171px;
	height:18px;
	z-index:23;
	left: 321px;
	top: 216px;
}
#divCons {
	position:absolute;
	width:24px;
	height:18px;
	z-index:9;
	left: -23px;
	top: 34px;
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
<div id="divTotalPedido" class="descripcion">
        <div id="divImgTotal">
          
    </div>
  </div>
<div id="shopping"><img src="img/crear-pedido.jpg" width="201" height="33"></div>
  <?php // sql pára sacar tiendas 
			//$sql5=" SELECT idTienda,tienda,estados.estado,municipios.municipio FROM detallistas_tiendas,estados,municipios where detallistas_tiendas.idEstado=estados.idEstado and detallistas_tiendas.idMunicipio=municipios.idMunicipio and detallistas_tiendas.idTienda='{$idTienda}' "; 
			$sql5="SELECT detallistas_tiendas.idTienda, detallistas_clientes.nombre, detallistas_tiendas.tienda, estados.estado, municipios.municipio, detallistas_tiendas.idCliente, detallistas_clientes.domicilio, detallistas_clientes.col, detallistas_clientes.cp, detallistas_clientes.RFC, detallistas_clientes.telefonos as tels, detallistas_clientes.email, estados_1.estado as estadoTienda, municipios_1.municipio as municipioTienda, detallistas_tiendas.domicilio as domTienda, detallistas_tiendas.col as colTienda, detallistas_tiendas.cp as cpTienda, detallistas_tiendas.transporte, detallistas_tiendas.obsGuia, detallistas_tiendas.transporteSeguro
FROM ((detallistas_tiendas LEFT JOIN ((detallistas_clientes LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente) INNER JOIN estados AS estados_1 ON detallistas_tiendas.idEstado = estados_1.idEstado) INNER JOIN municipios AS municipios_1 ON detallistas_tiendas.idMunicipio = municipios_1.idMunicipio where detallistas_tiendas.idTienda='{$idTienda}'";

			if($result5=$mysqli->query($sql5)){
				$cont=1;
		if($rowdata=$result5->fetch_object()){
			$idTiendat=$rowdata->idTienda;
			$Tienda=$rowdata->tienda;
			
			$nombre=$rowdata->nombre;
			
			$estado=$rowdata->estado;
			$municipio=$rowdata->municipio;
			$colonia = $rowdata->col;
			$domicilio = $rowdata->domicilio;
			$tels = $rowdata->tels;
			$cp = $rowdata->cp;
			$RFC = $rowdata->RFC;
			$tels = $rowdata->tels;
			$email = $rowdata->email;
			$estadoTienda = $rowdata->estadoTienda;
			$municipioTienda = $rowdata->municipioTienda;
			$domTienda = $rowdata->domTienda;
			$colTienda = $rowdata->colTienda;
			$cpTienda = $rowdata->cpTienda;
			$transporte = $rowdata->transporte;
			$obsGuia = $rowdata->obsGuia;
			$transporteSeguro = $rowdata->transporteSeguro;
			
			
			
		}
	}
?>
 
<div id="NomCliente" class="gdFont">
  <label class="descripcion">Cliente:</label>  <?php  echo  "$nombre";?></div>
<div id="divBarritaTablaPedido"></div>
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
      <div id="shopBoton" onClick="document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';document.getElementById('divDatos').style.visibility='hidden';//cargarEstilosTotal(); " onMouseOver="this.style.filter='alpha(opacity=70)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer'; "onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center"><img src="img/continuarcomprando-b.jpg" width="169" height="18" /></div>
      <div id="checkoBoton" onMouseOver="this.style.filter='alpha(opacity=70)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer'; "onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onClick=" crearPedido(<?php  echo "$idTienda";?>);" class="tipoBlancoDis4"><img src="img/crear-pedido-b2.jpg" width="106" height="18"></div>
  </div>
<div id="divlineaDiviPedido4"><img src="img/linea-divisora.jpg" width="660" height="5" /></div>
<div id="desMaterial">
      <table width="560" border="0">
        <tr>
          <td width="108"><div align="center" class="descripcion">Foto</div></td>
          <td width="96"> <div align="center" class="descripcion">Materia / Color</div></td>
          <td width="189"><div align="center" class="descripcion">Numeración</div></td>
          <td width="40"><div align="center"  class="descripcion">Pares</div></td>
          <td width="58"><div align="center" class="descripcion">Precio</div></td>
          <td width="43"><div align="center" class="descripcion">Total</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center" class="descripcion">Paquetes</div></td>
          <td><div id="divContenerNumPedido4">
            <div  class="descripcion"id="divNum2">2</div>
            <div  class="descripcion"id="divNum2m">-</div>
            <div  class="descripcion"id="divNum3">3</div>
            <div  class="descripcion"id="divNum3m">-</div>
            <div  class="descripcion"id="divNum4">4</div>
            <div  class="descripcion"id="divNum4m">-</div>
            <div  class="descripcion"id="divNum5">5</div>
            <div class="descripcion"id="divNum5m">-</div>
            <div class="descripcion"id="divNum6">6</div>
            <div class="descripcion"id="divNum6m">-</div>
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
  </div>
  <div id="apDivBarra">
   
  </div>
  <div id="divContentDivTxtQuienPide">
    <label>    </label>
    <div id="divContentDivComboLugarPedido">
      <label>
        <select class="campoTextoBuscarClientes" name="comboLugarPedido" id="comboLugarPedido">
          <option value="Web">Web</option>
          <option value="Expo" selected>Expo</option>
          <option value="Fabrica">Fabrica</option>
        </select>
      </label>
    </div>
    <label>
      <input  class="campoTextoBuscarClientes"name="txtPedido" type="text" id="txtPedido" size="25">
    </label>
  </div>
  <div id="divDomicilioDocsEnvio" class="abcd">
  	<?php echo "$domTienda";?>, <?php echo "$colTienda";?>, <?php echo "$estadoTienda";?>,<?php echo "$municipioTienda";?>, CP: <?php echo "$municipioTienda";?>,transporte: <?php echo "$transporte:";?>, obsGuia: <?php echo "$obsGuia";?>, transporteSeguro: <?php echo "$transporteSeguro";?> 
  </div>
  <div id="divLblDomicilioDocs" class="descripcion">Envio:</div>
<div id="divDomicilioDocs" class="abcd"><?php echo "$domicilio";?>, <?php echo "$col";?>, <?php echo "$estado";?>,<?php echo "$municipio";?>, CP: <?php echo "$municipio";?>,tras: <?php echo "$RFC";?>, Tel: <?php echo "$tels";?>, email: <?php echo "$email";?> </div>
<div class="descripcion" id="divContentLblQuienPide">Comprador:</div>
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
	$subtotalPares=0;
	$subtotalTotal=0;
	$cons=0;
	while($obj2=$result4->fetch_object()){
  		$cons++;
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
		
		$subtotalPares+= $Pares;
		$subtotalTotal+=$Total;
		
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
    <div id="Foto"><img src="../../imagenes_system/muestras/minis/<?php  echo "$foto";?>" width="73" height="73" onClick="document.getElementById('divFotoZoom').style.visibility='visible';llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>','divFotoZoom');"  onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onMouseOut="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'"/></div>
    <div id="divNomEstilo" class="materialColor">
      <div align="center"><strong>
        <?php  echo "$estilo";?>
        </strong>
        <?php  echo "$material $color";?>
      </div>
    </div>
    <div id="abcdTabla200">
      <table width="110" border="0">
        <tr>
          <td width="50"><div align="center" class="abcd"></div></td>
          <td width="50"><div align="center" class="abcd"></div></td>
        </tr>
        <tr>
          <td><label> </label>
            <div align="center">
              <select class="combito" name="select" id="comboPaq_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaCombos(<?php  echo "$idEstilo";?>);">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
            </div></td>
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
      <table width="220" border="0">
        <tr>
          <td width="12"><div align="center" class="abcd">
            <label id="SN2_<?php  echo "$idEstilo";?>"><?php  echo "$N2";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN2m_<?php  echo "$idEstilo";?>"><?php  echo "$N2m";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN3_<?php  echo "$idEstilo";?>"><?php  echo "$N3";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN3m_<?php  echo "$idEstilo";?>"><?php  echo "$N3m";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN4_<?php  echo "$idEstilo";?>"><?php  echo "$N4";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN4m_<?php  echo "$idEstilo";?>"><?php  echo "$N4m";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN5_<?php  echo "$idEstilo";?>"><?php  echo "$N5";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN5m_<?php  echo "$idEstilo";?>"><?php  echo "$N5m";?></label>
          </div></td>
          <td width="12"><div align="center" class="abcd">
            <label id="SN6_<?php  echo "$idEstilo";?>"><?php  echo "$N6";?></label>
          </div></td>
          <td width="44"><div align="center" class="abcd">
            <label id="SN6m_<?php  echo "$idEstilo";?>"><?php  echo "$N6m";?></label>
          </div></td>
          <td width="22"><div align="center" class="abcd">
            <label id="Importe_<?php  echo "$idEstilo";?>"><?php  echo "$Pares";?></label>
          </div></td>
        </tr>
      </table>
    </div>
    <div id="precio" class="numerosPedido">
      <div align="center">$
        <label id="lblPrecio_<?php  echo "$idEstilo";?>">
          <?php  echo "$precio";?>
        </label>
      </div>
    </div>
    <div id="total" class="abcd">
      <div align="center">$
        <label id="lblImporte_<?php  echo "$idEstilo";?>"><?php  echo "$Total";?></label>
        <label style="display:none" id="lblImporte_<?php  echo "$contElementCarro";?>">0</label>
      </div>
    </div>
    <div id="divMasZoom"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen9','','img/+-1.jpg',1)"><img src="carrito/img/zoom.jpg" name="Imagen9" width="13" height="13" border="0" id="Imagen9" onClick="document.getElementById('divFotoZoom').style.visibility='visible';llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>','divFotoZoom');"  onMouseOver="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onMouseOut="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'"/></a></div>
    <div id="divContenidoCarritoBtnNumPer"  class="tipoBlancoDis4" onClick="llamarasincrono('numeracionpersonalizada/numeracionpersonalizada.php?idEstilo=<?php   echo "$idEstilo"; ?>&precio=<?php  echo "$precio";?>','divCaritoDisenoPedidoNumPer'); document.getElementById('divCaritoDisenoPedidoNumPer').style.visibility='visible'">Personalizar </div>
    <div id="divCons" class="descripcion"><?php  echo "$cons";?></div>
  </div>
  <label  style="display:none" id="index_<?php  echo "$contElementCarro";?>">
    <?php  echo "$idEstilo";?>
  </label>
  <?php  
	  } 
	}
   ?>
</div>
<div id="divGuardarNumBoton" onClick="guardarNumeracionDeCarrito(<?php  echo "$idTienda";?>);"><img src="img/guardar-numeracion.jpg" width="169" height="18"></div>
<div id="divTiendaPedidoDiseno4" class="gdFont"><label class="descripcion">Tienda:</label> <?php  echo "$Tienda";?></div>
 <div id="divLblTotalPares" class="descripcion"><label id="TotalPares"><?php  echo "$subtotalPares";?></label></div>
 <div id="divlblImporteTotal" class="descripcion">
            $
        <label class="descripcion" id="SubtotalImporte"><?php  echo "$subtotalTotal";?></label>
    </div>
</div>
<div id="divLbl2DomicilioDocs" class="descripcion">Datos doc:</div>
<div class="descripcion" id="divContentDivLblPedido">Lugar pedido:</div>
<div id="divCerrarPedidoDise4"><img src="img/cerrar_b.jpg" width="13" height="13"></div>
<div id="divAtras" class="descripcion" onClick="document.getElementById('divDatos').style.visibility='hidden';document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';">Cerrar</div>
<label id="contElementosEnCarro" style="display:none"><?php  echo "$contElementCarro";?></label>
</div>
<div id="divCaritoDisenoPedidoNumPer"></div>
<div id="divCopiarNumeracionAtodos" onClick="copiarNumeracionATodoPedidos();"><img src="img/copiar-numeracion.jpg" width="144" height="18"></div>
