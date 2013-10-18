<?php 

	$critCliente = "";
	if(isset($_REQUEST['txtCritCliente'])){
		$critCliente = $_REQUEST['txtCritCliente'];
	}
	
	$critTienda = "";
	if(isset($_REQUEST['txtTienda'])){
		$critTienda = $_REQUEST['txtTienda'];
	}
	
	$idTienda = "";
	if(isset($_REQUEST['idTienda'])){
		$idTienda = $_REQUEST['idTienda'];
	}
	
	$fechaIni="";
	$fechaFin="";
	if(isset($_REQUEST['txtFechaIni']) && isset($_REQUEST['txtFechaFin'])){
		$fechaIni = $_REQUEST['txtFechaIni'];
		$fechaFin = $_REQUEST['txtFechaFin'];
	}
	
	$lugarPedido = "";
	if(isset($_REQUEST['lugarPed'])){
		$lugarPedido = $_REQUEST['lugarPed'];
	}
	
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	$idEstilo=""; //1
	
	$sumaParesTot=0;
	$sumSubtotal=0;	
?>

 <link rel="stylesheet" href="js/jquery-ui-1.8.14.custom/development-bundle/themes/base/jquery.ui.all.css" >
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/jquery-1.5.1.js" ></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.core.js"></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.widget.js"></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
 <link rel="stylesheet" href="js/jquery-ui-1.8.14.custom/development-bundle/demos/demos.css" >

<style type="text/css">
<!--

#divRptPedidosClientes {
	position:relative;
	width:935px;
	height:22px;
	z-index:1;
	top: 0px;
}

#divGridPedidosClientesContenedor {
	position:absolute;
	width:784px;
	height:371px;
	z-index:3;
	overflow:auto;
	left: 10px;
	top: 0px;
}

#divRowIdPedido {
	position:absolute;
	width:45px;
	height:17px;
	z-index:1;
	text-align: center;
	left: 58px;
	top: 2px;
}

#divRowCliente {
	position:absolute;
	width:198px;
	height:15px;
	z-index:2;
	left: 106px;
	top: 2px;
	text-align: center;
}
#divRowTienda {
	position:absolute;
	width:151px;
	height:15px;
	z-index:3;
	left: 313px;
	top: 2px;
	text-align: center;
}
#divRowPares {
	position:absolute;
	width:45px;
	height:16px;
	z-index:4;
	left: 472px;
	text-align: center;
	top: 3px;
}
#divRowTotal {
	position:absolute;
	width:43px;
	height:16px;
	z-index:5;
	left: 522px;
	top: 3px;
	text-align: center;
}
#divRowFecha {
	position:absolute;
	width:89px;
	height:16px;
	z-index:6;
	left: 571px;
	text-align: center;
	top: 3px;
}
#divRowSitioPed {
	position:absolute;
	width:54px;
	height:14px;
	z-index:7;
	left: 664px;
	top: 3px;
	text-align: center;
}
.formatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
	text-align:center;
}

.datosFormatoGenClientes{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	color:#666;
	text-align:center;
}

.numPedidoFormatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	color:#333;
	font-weight:600;
	text-align:center;
}
.campTxtFormatoGen{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#999;
	font-weight:600;
	text-align:left;
	height:13px;
}

#divBuscador {
	position:absolute;
	width:790px;
	height:81px;
	z-index:3;
	top: 4px;
}
#divTxtCritCliente {
	position:absolute;
	width:197px;
	height:16px;
	z-index:1;
	left: 59px;
	top: 28px;
	text-align:left;
}
#divlblCritCliente {
	position:absolute;
	width:55px;
	height:19px;
	z-index:2;
	left: 0px;
	top: 29px;
	text-align: center;
}
#divBtnEnviar {
	position:absolute;
	width:51px;
	height:25px;
	z-index:3;
	left: 602px;
	top: 20px;
	text-align: right;
}



#divLinieaSeparadorVPedidos {
	position:absolute;
	width:750px;
	height:11px;
	z-index:1;
	top: 14px;
	left: -102px;
}
#divSitioPedTotalPares {
	position:absolute;
	width:41px;
	height:21px;
	z-index:2;
	left: 475px;
	top: 1px;
}
#divSitioPedTotalSub {
	position:absolute;
	width:39px;
	height:21px;
	z-index:3;
	left: 525px;
	top: 1px;
}
#divRowLugarPedido {
	position:absolute;
	width:114px;
	height:20px;
	z-index:8;
	left: 724px;
	top: 2px;
}
#divRowLevantoPedido {
	position:absolute;
	width:78px;
	height:20px;
	z-index:9;
	left: 842px;
	top: 2px;
}
#divPedidosCons {
	position:absolute;
	width:54px;
	height:17px;
	z-index:10;
	text-align: right;
	top: 2px;
}
#divGridPedidosClientesContenedorRowsR {
	position:absolute;
	width:950px;
	height:368px;
	z-index:4;
	left: -1px;
	top: 21px;
	overflow:auto;
}
</style>

<div id="divGridPedidosClientesContenedorRowsR">
	
<?php 
	$fechaIniCrit="";
	if($fechaIni!="" and $fechaFin!=""){
		$fechaIniCrit = " and (DATE_FORMAT(pedidos.fechaPedido,'%Y/%m/%d')>='$fechaIni' AND DATE_FORMAT(pedidos.fechaPedido,'%Y/%m/%d')<='$fechaFin') ";	
	}
	$lugarPedCrit="";
	if($lugarPedido!="Todos"){
		$lugarPedCrit = " and ( lugarPedido = '$lugarPedido' )";
	}
	$num=0;
	$sqlGetData = "SELECT pedidos.idPed, detallistas_clientes.nombre, detallistas_tiendas.tienda, Sum(pedidos_detalle.Pares) AS SumaDePares, Sum(pedidos_detalle.Total) AS SumaDeTotal, pedidos.fechaPedido, pedidos.sitioPedido, detallistas_tiendas.idCliente, detallistas_tiendas.idTienda, pedidos.idVendedor, pedidos.surtido,pedidos.levantoPedido,pedidos.lugarPedido
FROM ((pedidos LEFT JOIN detallistas_tiendas ON pedidos.idTienda = detallistas_tiendas.idTienda) LEFT JOIN pedidos_detalle ON pedidos.idPed = pedidos_detalle.idPedido) LEFT JOIN detallistas_clientes ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente where detallistas_clientes.nombre like '%$critCliente%'  and detallistas_tiendas.tienda like '%$critTienda%' $fechaIniCrit $lugarPedCrit
GROUP BY pedidos.idPed, detallistas_clientes.nombre, detallistas_tiendas.tienda, pedidos.fechaPedido, pedidos.sitioPedido, detallistas_tiendas.idCliente, detallistas_tiendas.idTienda, pedidos.idVendedor, pedidos.surtido order by  pedidos.fechaPedido ";
	
	if($result_data=$mysqli->query($sqlGetData)){
	
		$num=mysqli_num_rows($result_data);
		$cons=0;
		for ($i=0;$i<$num;$i++){	  
				
				$rowdata=mysqli_fetch_object($result_data);
				$idPed=$rowdata->idPed;
				$idTienda=$rowdata->idTienda;
				$nombre=$rowdata->nombre;
				$tienda=$rowdata->tienda;
				$SumaDePares=$rowdata->SumaDePares;
				$SumaDeTotal=$rowdata->SumaDeTotal;
				$fechaPedido=$rowdata->fechaPedido;
				$sitioPedido=$rowdata->sitioPedido;
				$sumaParesTot +=$SumaDePares;
				$sumSubtotal +=$SumaDeTotal;
				$lugarPedido =$rowdata->lugarPedido;
				$levantoPedido =$rowdata->levantoPedido;
				
				$colo="#FFFFFF";
				if(($cons % 2)==0){
					$colo="#ddd8ce";
				}
				$cons++;
	?>
                <a href="#"  onclick="llamarasincrono('vista_pedidos_detalle_ver2.php?idPedido=<?php  echo "$idPed"; ?>&foto=Si&txtCliente=<?php  echo "$nombre"; ?>&txtTienda=<?php  echo "$tienda"; ?>&txtFechaPedido=<?php  echo "$fechaPedido";?>&idTienda=<?php  echo "$idTienda";?>','divGridPedidosClientesContenedor288');document.getElementById('divGridPedidosClientesContenedor288').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedorB88').style.visibility='hidden';" >
                
                <div id="divRptPedidosClientes" style="background-color:<?php  echo "$colo";?>" >
                  <div id="divRowIdPedido" class="numPedidoFormatoGen"><label id="lblIdPedido"><?php  echo "$idPed"; ?></label></div>
                  <div id="divRowCliente" class="datosFormatoGenClientes"><label id="lblCliente"><?php  echo "$nombre"; ?></label>
                  </div>
                  <div id="divRowTienda" class="datosFormatoGenClientes"><label id="lblTienda"><?php  echo "$tienda"; ?></label></div>
                  <div id="divRowPares" class="datosFormatoGenClientes"><label id="lblPares"><?php  echo "$SumaDePares"; ?></label></div>
                  <div id="divRowTotal" class="datosFormatoGenClientes"><label id="lblTotal"><?php  echo "$SumaDeTotal"; ?></label></div>
                  <div id="divRowFecha" class="datosFormatoGenClientes"><label id="lblFecha"><?php  echo "$fechaPedido"; ?></label></div>
                  <div id="divRowSitioPed" class="datosFormatoGenClientes"><label id="lblSitioPed"><?php  echo "$sitioPedido"; ?></label></div>
                  <div id="divRowLugarPedido" class="datosFormatoGenClientes"><label id="lblLugarPed"><?php  echo "$lugarPedido"; ?></label></div>
                  <div id="divRowLevantoPedido" class="datosFormatoGenClientes"><label id="lblLevantoPed"><?php  echo "$levantoPedido"; ?></label></div>
                  <div id="divPedidosCons" class="datosFormatoGenClientes" ><label id="lblPedidosCons"><?php  echo "$cons"; ?></label></div>
                </div></a>
                
                
     <?php 
	 				
				}
		}
	 ?>



</div>
<div id="divSitioPedTotalPares" class="datosFormatoGenClientes"><?php echo "$sumaParesTot";?></div>
<div id="divSitioPedTotalSub" class="datosFormatoGenClientes"><?php echo "$sumSubtotal";?></div>
