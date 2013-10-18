
<?php


	$paresTotLineas=0;
	$paresTotEstilos=0;
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	
	$fechaIni="";
	$fechaFin="";
	if(isset($_REQUEST['txtFechaIni']) && isset($_REQUEST['txtFechaFin'])){
		$fechaIni = $_REQUEST['txtFechaIni'];
		$fechaFin = $_REQUEST['txtFechaFin'];
		
	}
	$fechaIniCrit="";

  	if($fechaIni!="" and $fechaFin!=""){
		$fechaIniCrit = " and (DATE_FORMAT(pedidos.fechaPedido,'%Y/%m/%d')>='$fechaIni' AND DATE_FORMAT(pedidos.fechaPedido,'%Y/%m/%d')<='$fechaFin') ";	
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" href="../js/jquery-ui-1.8.14.custom/development-bundle/themes/base/jquery.ui.all.css">
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/jquery-1.5.1.js"></script>
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.core.js"  ></script>
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../js/jquery-ui-1.8.14.custom/development-bundle/demos/demos.css">
	<script>
	$(function() {
		$( "#txtFechaIni" ).datepicker();
		$( "#txtFechaIni" ).datepicker("option", "dateFormat", "yy/mm/dd");
	});
	$(function() {
		$( "#txtFechaFin" ).datepicker();
		$( "#txtFechaFin" ).datepicker("option", "dateFormat", "yy/mm/dd");
	});
	</script>
<style type="text/css">
<!--
#divEstadisticasVentas {
	position:absolute;
	width:701px;
	height:350px;
	z-index:1;
	background-color: #FFFFFF;
	top: -3px;
	left: 213px;
}
#apDiv2 {
	position:absolute;
	width:544px;
	height:23px;
	z-index:1;
}
#divEstadisticasVentasTitulo {
	position:absolute;
	width:243px;
	height:36px;
	z-index:1;
	left: 25px;
	top: 6px;
}
#divEstadisticasVentasLblLineas {
	position:absolute;
	width:50px;
	height:14px;
	z-index:2;
	left: 3px;
	top: 3px;
	text-align: center;
}
#divEstadisticasVentasLblPares {
	position:absolute;
	width:41px;
	height:14px;
	z-index:3;
	left: 186px;
	top: 3px;
	text-align: left;
}
#divEstadisticasVentasEstLineas {
	position:absolute;
	width:241px;
	height:217px;
	z-index:4;
	left: 1px;
	top: 6px;
}
#divEstadisticasVentasFilaLinea {
	position:relative;
	width:239px;
	height:22px;
	z-index:1;
}
#divEstadisticasVentasLblFecha {
	position:absolute;
	width:37px;
	height:14px;
	z-index:5;
	left: 129px;
	top: 40px;
}
#divEstadisticasVentasIniFecha {
	position:absolute;
	width:126px;
	height:18px;
	z-index:6;
	left: 169px;
	top: 38px;
}
#divEstadisticasVentasFechaA {
	position:absolute;
	width:19px;
	height:14px;
	z-index:7;
	left: 316px;
	top: 40px;
	text-align: center;
}
#divEstadisticasVentasFechaFin {
	position:absolute;
	width:128px;
	height:18px;
	z-index:8;
	left: 341px;
	top: 38px;
}
#divEstadisticasVentasLinea {
	position:absolute;
	width:130px;
	height:20px;
	z-index:1;
	left: 5px;
	text-align: left;
}
#divEstadisticasVentasPares {
	position:absolute;
	width:62px;
	height:20px;
	z-index:2;
	left: 153px;
	top: 0px;
	text-align: right;
}
#divEstadisticasVentasEstilosEst {
	position:absolute;
	width:241px;
	height:219px;
	z-index:9;
	left: 290px;
	top: 7px;
}
#divEstadisticasVentasFilaEstilosVen {
	position:relative;
	width:239px;
	height:22px;
	z-index:1;
}
#divEstadisticasVentasFilaEstilosEst {
	position:absolute;
	width:130px;
	height:20px;
	z-index:1;
	top: 1px;
	left: 5px;
	text-align: left;
}
#divEstadisticasVentasFilaEstilosPares {
	position:absolute;
	width:62px;
	height:20px;
	z-index:2;
	left: 153px;
	top: 1px;
	text-align:right;
}
#divEstadisticasVentaslblLinesEstilos {
	position:absolute;
	width:50px;
	height:14px;
	z-index:10;
	left: 5px;
	top: 3px;
}
#divEstadisticasVentasParesEstilos {
	position:absolute;
	width:39px;
	height:14px;
	z-index:11;
	left: 188px;
	top: 4px;
	text-align: left;
}
#divEstadisticasVentasTotalParesLineas {
	position:absolute;
	width:60px;
	height:20px;
	z-index:12;
	left: 397px;
	top: 72px;
	text-align:right;
}
#divEstadisticasVentasTotalParesEstilos {
	position:absolute;
	width:60px;
	height:22px;
	z-index:13;
	left: 690px;
	top: 75px;
	text-align: right;
}
#divEstadisticasVentaslblTotal1 {
	position:absolute;
	width:75px;
	height:14px;
	z-index:14;
	left: 0px;
	top: 4px;
	text-align: center;
}
#divEstadisticasVentaslblTotal2 {
	position:absolute;
	width:75px;
	height:14px;
	z-index:15;
	left: 319px;
	top: 78px;
	text-align: left;
}
#divEstadisticasVentasBtnBuscar {
	position:absolute;
	width:57px;
	height:24px;
	z-index:16;
	left: 489px;
	top: 36px;
	text-align: center;
}
#apDiv1 {
	position:absolute;
	width:243px;
	height:33px;
	z-index:17;
}

.tipoEncabezdoEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	color:#FFF;
}

.tipoLineasEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#999;
	font-weight:600;
}
.tipoParesEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	font-weight:600;
}

.tipoTotalesEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#F00;
	font-weight:600;
}

.tipoTotalParesEstadisticas{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
}

#apDiv3 {
	position:absolute;
	width:232px;
	height:20px;
	z-index:18;
	left: 27px;
	top: 93px;
	background-color: #000000;
}
#apDiv4 {
	position:absolute;
	width:232px;
	height:20px;
	z-index:19;
	left: 313px;
	top: 96px;
	background-color: #000000;
}
#apDiv5 {
	position:absolute;
	width:233px;
	height:26px;
	z-index:2;
	left: 28px;
	top: 72px;
}
#divContenido2ListasEstadisticas {
	position:absolute;
	width:560px;
	height:340px;
	z-index:20;
	left: 27px;
	top: 118px;
	overflow:auto;
}
#divLineaEstadisticas {
	position:absolute;
	width:582px;
	height:9px;
	z-index:21;
	top: 63px;
	left: 14px;
}
#divCalendarioImg {
	position:absolute;
	width:100px;
	height:32px;
	z-index:22;
	left: 25px;
	top: 26px;
}
#apDiv8 {
	position:absolute;
	width:251px;
	height:33px;
	z-index:23;
	left: 25px;
	top: -2px;
}

.tipoGLEncabezados{
	font-family:Verdana, Geneva, sans-serif;
	color:#999;
	font-size:20px;
}
-->
</style>
</head>

<body>
<form action="" method="get">
<div id="divEstadisticasVentas">
  
   
  <div  class="tipoLineasEstadisticas" id="divEstadisticasVentasLblFecha">Fecha: </div>
  <div  class="tipoLineasEstadisticas" id="divEstadisticasVentasFechaA">a</div>
    <div id="apDiv5">
    
    <div  class="tipoTotalParesEstadisticas" id="divEstadisticasVentaslblTotal1">Total de pares:</div></div>

  <div id="divEstadisticasVentasIniFecha">
    <label>
      <input class="tipoParesEstadisticas" type="text" name="txtFechaIni" id="txtFechaIni" value="<?php echo "$fechaIni";?>"/>
    </label>
  </div>
  <div id="divEstadisticasVentasFechaFin">
    <input  class="tipoParesEstadisticas" type="text" name="txtFechaFin" id="txtFechaFin" value="<?php echo "$fechaFin";?>" />
  </div>
  <div  class="tipoTotalParesEstadisticas" id="divEstadisticasVentaslblTotal2">Total de pares:</div>
  <div id="divEstadisticasVentasBtnBuscar">
    <label>
      <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" />
    </label>
  </div>
  <div  class="tipoEncabezdoEstadisticas" id="apDiv3">
    <div id="divEstadisticasVentasLblLineas">LINEAS</div>
  <div id="divEstadisticasVentasLblPares">PARES</div></div>
  <div  class="tipoEncabezdoEstadisticas" id="apDiv4">
    <div id="divEstadisticasVentaslblLinesEstilos">ESTILO</div>
  <div  class="tipoEncabezdoEstadisticas" id="divEstadisticasVentasParesEstilos">PARES</div></div>
  <div id="divContenido2ListasEstadisticas">
  <div id="divEstadisticasVentasEstilosEst">
  
  <?php
  
  
  	$sqlEstilos ="SELECT estilos.linea, estilos.estilo, Sum(pedidos_detalle.Pares) AS sumPares
FROM pedidos_detalle INNER JOIN estilos ON pedidos_detalle.idEstilo = estilos.Id
INNER JOIN pedidos ON pedidos_detalle.idPedido = pedidos.idPed
where 1 $fechaIniCrit 
GROUP BY estilos.linea,estilos.estilo
ORDER BY sumPares desc";

	if($result=$mysqli->query($sqlEstilos)){
	
		$num=mysqli_num_rows($result);
		$paresTotEstilos=0;
		for ($i=0;$i<$num;$i++){
			$obj= mysqli_fetch_object($result);
		  ?>
			<div id="divEstadisticasVentasFilaEstilosVen">
			  <div  class="tipoLineasEstadisticas"id="divEstadisticasVentasFilaEstilosEst"><?php echo "{$obj->estilo}";?></div>
			  <div  class="tipoParesEstadisticas"id="divEstadisticasVentasFilaEstilosPares"><?php echo "{$obj->sumPares}";?></div>
	  </div>
	<?php
   			$paresTotEstilos += $obj->sumPares;
		}
	}
	
   ?>
  </div>
  
  <div id="divEstadisticasVentasEstLineas">
  <?php
  	
    $sql ="SELECT estilos.Linea as linea, Sum(pedidos_detalle.Pares) AS sumPares
FROM (pedidos_detalle INNER JOIN estilos ON pedidos_detalle.idEstilo = estilos.Id) INNER JOIN pedidos ON pedidos_detalle.idPedido = pedidos.idPed
where 1 $fechaIniCrit 
GROUP BY estilos.Linea
ORDER BY sumPares Desc";

	if($result=$mysqli->query($sql)){
		$num=mysqli_num_rows($result);
		$paresTotLineas=0;
		for ($i=0;$i<$num;$i++){
			$obj= mysqli_fetch_object($result);
			  ?>		  
			 
		<div id="divEstadisticasVentasFilaLinea">
  <div class="tipoLineasEstadisticas" id="divEstadisticasVentasLinea"><?php echo "{$obj->linea}";?></div>
				  <div  class="tipoParesEstadisticas"id="divEstadisticasVentasPares"><?php echo "{$obj->sumPares}";?></div>
		</div>
                
 
			  <?php
				$paresTotLineas +=$obj->sumPares;
		}
	}
  
  ?>
  
   </div>
  </div>
  <div id="divLineaEstadisticas"><img src="../menu/menu/linea.png" width="560" height="7" /></div>
  <div id="divCalendarioImg"><img src="../img/calendario-sm.jpg" width="100" height="33" /></div>
  <div  class="tipoGLEncabezados"id="apDiv8"><img src="../img/estadisticas.jpg" width="252" height="33" /></div>
</div>
<div  class="tipoTotalesEstadisticas" id="divEstadisticasVentasTotalParesLineas"><?php echo "$paresTotLineas";?></div>
<div  class="tipoTotalesEstadisticas" id="divEstadisticasVentasTotalParesEstilos"><?php echo "$paresTotEstilos";?></div>
</form>
</body>
</html>