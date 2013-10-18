<?php

include('inc/classNC.inc');
$oDB = new MySQLDB();

if(isset($_POST['strDateFrom'])){
	$strDateFrom = $_POST['strDateFrom'];
	$strDateTo = $_POST['strDateTo'];
}else{
	$strDateFrom = '2013-05-01';
	$strDateTo = '2013-05-30';
};

$intPares = 0;
$intN2 = 0;
$intN2m = 0;
$intN3 = 0;
$intN3m = 0;
$intN4 = 0;
$intN4m = 0;
$intN5 = 0;
$intN5m = 0;
$intN6 = 0;
$intN6m = 0;

?>
<!DOCTYPE html>
<html lang="es-mx">

<head>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noarchive, nosnippet, noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="spanish" />
<meta charset="UTF-8" />
<title>::: new colors shoes :::</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="css/jquery-ui-1.10.1.css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/grid.css">
<script type="text/javascript" src="js/grid.js"></script>

</head>

<body lang="es-mx">
	<!--BREAD CRUMBS-->
	<div style="margin:10px 0px 10px 0px; background-color:#505050; text-align:left; padding:10px 10px 10px 10px; font-size:12px; color:#FFFFFF; ">
		Reportes EXPO
	</div>
	<!--BREAD CRUMBS-->
	<!--WORKAREA-->

	<div style="text-align:center; font-size:13px; margin-bottom:10px; height:30px; line-height:30px;">
		Pares<span id="spnPairs" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N2<span id="spnN2" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N2m<span id="spnN2m" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N3<span id="spnN3" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N3m<span id="spnN3m" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N4<span id="spnN4" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N4m<span id="spnN4m" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N5<span id="spnN5" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N5m<span id="spnN5m" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N6<span id="spnN6" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
		N6m<span id="spnN6m" style="background-color:#EC732B; color:#FFFFFF; padding:3px 10px 3px 10px; margin:0px 2px 0px 2px; border-radius:5px;"></span>
	</div>


<div style="margin:0px 10px 0px 10px;">
	<div style="display:none">
		<label class=" formlabels " >De</label><input id="dteFrom" type="text" value="" readonly="readonly" class=" forminputsnonsel " style=" width:67px; margin-right:5px;">
		<label class=" formlabels " style="margin-left:20px;" >A</label><input id="dteTo" type="text" value="" readonly="readonly" class=" forminputsnonsel " style=" width:67px; margin-right:5px;">
		<div style="display:inline-block; width:107px; height:26px; text-align:center;">
			<div class=" button_dark " onclick="getOrders();">Buscar</div>
		</div>
	</div>

<?php 
$jsonGrid = array(
		0=>array("Name"=>"Orders","Height"=>"200px","Columns"=>0,"Rows"=>0),
		1=>array("Name"=>"Styles","Height"=>"200px","Columns"=>0,"Rows"=>0),
		2=>array("Name"=>"ClientStyles","Height"=>"200px","Columns"=>0,"Rows"=>0)
	);
?>

<!--ORDERS GRID-->
<?php
$intGridIx = 0;
$strSql = "SELECT a.idPed as 'ID_NTC0', a.fechaPedido as 'Fecha Pedido', b.nombre as 'Vendedor', a.pares as 'Pares', c.nombre as 'Cliente', d.tienda as 'Tienda', a.levantoPedido as 'Levanto Pedido' ";
$strSql .= "FROM pedidos a, usuarios_web b, detallistas_clientes c, detallistas_tiendas d ";
$strSql .= "WHERE a.idVendedor = b.idUsuarioWeb ";
$strSql .= "AND a.idTienda = d.idTienda ";
$strSql .= "AND d.idCliente = c.idCliente ";
$strSql .= "AND a.sitiopedido = 'Web' ";
$strSql .= "AND a.lugarpedido = 'Expo' ";
$strSql .= "AND a.fechapedido >= '" . $strDateFrom . "' ";
$strSql .= "AND a.fechapedido <= '" . $strDateTo . "' ";
$strSql .= "ORDER BY a.fechaPedido DESC;";


$rstData = mysql_query($strSql,$oDB->Connection);
$jsonGrid[$intGridIx]['Columns'] = mysql_num_fields($rstData);
$jsonGrid[$intGridIx]['Rows'] = mysql_num_rows($rstData) - 1;
?>
	<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>MainGrid" class="divMainGrid"  >
		<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Grid" class="divGrid" >
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Header" class="divHeader" >
				<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>HContainer" class="divHContainer">
<?php
for($intIx=0;$intIx<mysql_num_fields($rstData);$intIx++){
?>
					<div id="header<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>"><span id="spnH<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>"><?php echo mysql_field_name($rstData,$intIx); ?></span></div>
<?php	
}
?>
					<!--img class="imgFilter" src="img/down.gif" onclick="showFilter(2,'<?php echo $jsonGrid[$intGridIx]['Name']; ?>',<?php echo $jsonGrid[$intGridIx]['Rows']; ?>);" -->
					<br style="clear:both" />
				</div>
			</div>
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Data" class="divData" onscroll="scrollHeader('<?php echo $jsonGrid[$intGridIx]['Name']; ?>');" >
				<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>DContainer" class="divDContainer">




<?php
	$intIx = 0;
	while ($objData = mysql_fetch_array($rstData)){
?>
					<div id="row<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>" class="divDRow">
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_0_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo $objData[0]; ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_1_<?php echo $intIx; ?>"><?php echo $objData[1]; ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_2_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[2]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_3_<?php echo $intIx; ?>"style=" text-align:right;"><?php echo number_format($objData[3],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_4_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim(utf8_decode($objData[4])," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_5_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[5]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_6_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[6]," "))); ?></div>
						<br style="clear:both" />
					</div>
<?php
		$intIx++;
	};
	unset($rstData);
?>
				</div>
			</div>
		</div>
		<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Filter" class="divFilter">
			<div id="divFilterButtons" class="divFilterButtons">
				<div class="btnDark" onclick="applyFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>',<?php echo $jsonGrid[$intGridIx]['Rows']; ?>);">Aplicar</div>
				<div class="btnDark" onclick="hideFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>');">Cancelar</div>
				<div class="btnDark" onclick="restoreFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>',<?php echo $jsonGrid[$intGridIx]['Rows']; ?>);">Restaurar</div>
			</div>
			<div id="divFilterDefault" class="divFilterDefault" >
				<span id="spn<?php echo $jsonGrid[$intGridIx]['Name']; ?>Filter" class="spnFilter"></span><br /><br />
				<img id="chk<?php echo $jsonGrid[$intGridIx]['Name']; ?>All" class="chkAll" src="../reportes/img/chk_s.png" onclick="switchChk(this,'<?php echo $jsonGrid[$intGridIx]['Name']; ?>');" chkValue="All" >Todos<br /><br />
			</div>
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>FilterData" class="divFilterData"></div>
		</div>
		<br style="clear:both" />
	</div>
<!--ORDERS GRID-->
	<br /><br />
<!--STYLES GRID-->
<?php
$intGridIx = 1;
$strSql = "SELECT c.Linea AS 'Linea', c.Estilo AS 'Estilo', c.Material AS 'Material', c.Color AS 'Color', sum(b.pares) AS 'Pares', sum(b.n2) AS 'N2', sum(b.n2m) AS 'N2m', sum(b.n3) AS 'N3', sum(b.n3m) AS 'N3m', sum(b.n4) AS 'N4', sum(b.n4m) AS 'N4m', sum(b.n5) AS 'N5', sum(b.n5m) AS 'N5m', sum(b.n6) AS 'N6', sum(b.n6m) AS 'N6m' ";
$strSql .= "FROM pedidos a, pedidos_detalle b, estilos c ";
$strSql .= "WHERE a.idPed = b.idPedido ";
$strSql .= "AND b.idEstilo = c.Id ";
$strSql .= "AND a.sitiopedido = 'Web' ";
$strSql .= "AND a.lugarpedido = 'Expo' ";
$strSql .= "AND a.fechapedido >= '" . $strDateFrom . "' ";
$strSql .= "AND a.fechapedido <= '" . $strDateTo . "' ";
$strSql .= "GROUP BY c.Linea, c.Estilo, c.Material, c.Color;";

$rstData = mysql_query($strSql,$oDB->Connection);
$jsonGrid[$intGridIx]['Columns'] = mysql_num_fields($rstData);
$jsonGrid[$intGridIx]['Rows'] = mysql_num_rows($rstData) - 1;
?>
	<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>MainGrid" class="divMainGrid"  >
		<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Grid" class="divGrid" >
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Header" class="divHeader" >
				<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>HContainer" class="divHContainer">
<?php
for($intIx=0;$intIx<mysql_num_fields($rstData);$intIx++){
?>
					<div id="header<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>"><span id="spnH<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>"><?php echo mysql_field_name($rstData,$intIx); ?></span></div>
<?php	
}
?>
					<br style="clear:both" />
				</div>
			</div>
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Data" class="divData" onscroll="scrollHeader('<?php echo $jsonGrid[$intGridIx]['Name']; ?>');" >
				<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>DContainer" class="divDContainer">
<?php
	$intIx = 0;
	while ($objData = mysql_fetch_array($rstData)){
?>
					<div id="row<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>" class="divDRow">
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_0_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[0]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_1_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[1]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_2_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[2]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_3_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[3]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_4_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[4],0,".",","); ?></div><?php $intPares = $intPares + $objData[4]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_5_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[5],0,".",","); ?></div><?php $intN2 = $intN2 + $objData[5]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_6_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[6],0,".",","); ?></div><?php $intN2m = $intN2m + $objData[6]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_7_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[7],0,".",","); ?></div><?php $intN3 = $intN3 + $objData[7]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_8_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[8],0,".",","); ?></div><?php $intN3m = $intN3m + $objData[8]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_9_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[9],0,".",","); ?></div><?php $intN4 = $intN4 + $objData[9]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_10_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[10],0,".",","); ?></div><?php $intN4m = $intN4m + $objData[10]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_11_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[11],0,".",","); ?></div><?php $intN5 = $intN5 + $objData[11]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_12_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[12],0,".",","); ?></div><?php $intN5m = $intN5m + $objData[11]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_13_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[13],0,".",","); ?></div><?php $intN6 = $intN6 + $objData[13]; ?>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_14_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[14],0,".",","); ?></div><?php $intN6m = $intN6m + $objData[14]; ?>
						<br style="clear:both" />
					</div>
<?php
		$intIx++;
	};
	unset($rstData);
?>
				</div>
			</div>
		</div>
		<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Filter" class="divFilter">
			<div id="divFilterButtons" class="divFilterButtons">
				<div class="btnDark" onclick="applyFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>',<?php echo $jsonGrid[$intGridIx]['Rows']; ?>);">Aplicar</div>
				<div class="btnDark" onclick="hideFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>');">Cancelar</div>
				<div class="btnDark" onclick="restoreFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>',<?php echo $jsonGrid[$intGridIx]['Rows']; ?>);">Restaurar</div>
			</div>
			<div id="divFilterDefault" class="divFilterDefault" >
				<span id="spn<?php echo $jsonGrid[$intGridIx]['Name']; ?>Filter" class="spnFilter"></span><br /><br />
				<img id="chk<?php echo $jsonGrid[$intGridIx]['Name']; ?>All" class="chkAll" src="../reportes/img/chk_s.png" onclick="switchChk(this,'<?php echo $jsonGrid[$intGridIx]['Name']; ?>');" chkValue="All" >Todos<br /><br />
			</div>
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>FilterData" class="divFilterData"></div>
		</div>
		<br style="clear:both" />
	</div>
	
	<div style="text-align:center;">
		
	</div>
<!--STYLES GRID-->
	<br /><br />
<!--CLIENT-STYLES GRID-->
<?php
$intGridIx = 2;
$strSql = "SELECT d.nombre AS 'Cliente', c.Linea AS 'Linea', c.Estilo AS 'Estilo', c.Material AS 'Material', c.Color AS 'Color', sum(b.pares) AS 'Pares', sum(b.n2) AS 'N2', sum(b.n2m) AS 'N2m', sum(b.n3) AS 'N3', sum(b.n3m) AS 'N3m', sum(b.n4) AS 'N4', sum(b.n4m) AS 'N4m', sum(b.n5) AS 'N5', sum(b.n5m) AS 'N5m', sum(b.n6) AS 'N6', sum(b.n6m) AS 'N6m' ";
$strSql .= "FROM pedidos a, pedidos_detalle b, estilos c, detallistas_clientes d, detallistas_tiendas e ";
$strSql .= "WHERE a.idPed = b.idPedido ";
$strSql .= "AND b.idEstilo = c.Id ";
$strSql .= "AND a.idTienda = e.idTienda ";
$strSql .= "AND e.idCliente = d.idCliente ";
$strSql .= "AND a.sitiopedido = 'Web' ";
$strSql .= "AND a.lugarpedido = 'Expo' ";
$strSql .= "AND a.fechapedido >= '2013-03-01' ";
$strSql .= "AND a.fechapedido <= '2013-03-30' ";
$strSql .= "GROUP BY d.nombre, c.Linea, c.Estilo, c.Material, c.Color ORDER BY c.Linea, c.Estilo, c.Material, c.Color, d.nombre;";
$rstData = mysql_query($strSql,$oDB->Connection);
$jsonGrid[$intGridIx]['Columns'] = mysql_num_fields($rstData);
$jsonGrid[$intGridIx]['Rows'] = mysql_num_rows($rstData) - 1;
?>
	<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>MainGrid" class="divMainGrid"  >
		<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Grid" class="divGrid" >
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Header" class="divHeader" >
				<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>HContainer" class="divHContainer">
<?php
for($intIx=0;$intIx<mysql_num_fields($rstData);$intIx++){
?>
					<div id="header<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>"><span id="spnH<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>"><?php echo mysql_field_name($rstData,$intIx); ?></span></div>
<?php	
}
?>
					<br style="clear:both" />
				</div>
			</div>
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Data" class="divData" onscroll="scrollHeader('<?php echo $jsonGrid[$intGridIx]['Name']; ?>');" >
				<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>DContainer" class="divDContainer">
<?php
	$intIx = 0;
	while ($objData = mysql_fetch_array($rstData)){
?>
					<div id="row<?php echo $jsonGrid[$intGridIx]['Name']; ?>_<?php echo $intIx; ?>" class="divDRow">
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_0_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[0]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_1_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[1]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_2_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[2]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_3_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[3]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_4_<?php echo $intIx; ?>"><?php echo ucwords(strtolower(trim($objData[4]," "))); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_5_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[5],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_6_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[6],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_7_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[7],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_8_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[8],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_9_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[9],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_10_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[10],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_11_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[11],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_12_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[12],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_13_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[13],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_14_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[14],0,".",","); ?></div>
						<div id="cel<?php echo $jsonGrid[$intGridIx]['Name']; ?>_15_<?php echo $intIx; ?>" style=" text-align:right;"><?php echo number_format($objData[15],0,".",","); ?></div>
						<br style="clear:both" />
					</div>
<?php
		$intIx++;
	};
	unset($rstData);
?>
				</div>
			</div>
		</div>
		<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>Filter" class="divFilter">
			<div id="divFilterButtons" class="divFilterButtons">
				<div class="btnDark" onclick="applyFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>',<?php echo $jsonGrid[$intGridIx]['Rows']; ?>);">Aplicar</div>
				<div class="btnDark" onclick="hideFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>');">Cancelar</div>
				<div class="btnDark" onclick="restoreFilter('<?php echo $jsonGrid[$intGridIx]['Name']; ?>',<?php echo $jsonGrid[$intGridIx]['Rows']; ?>);">Restaurar</div>
			</div>
			<div id="divFilterDefault" class="divFilterDefault" >
				<span id="spn<?php echo $jsonGrid[$intGridIx]['Name']; ?>Filter" class="spnFilter"></span><br /><br />
				<img id="chk<?php echo $jsonGrid[$intGridIx]['Name']; ?>All" class="chkAll" src="../reportes/img/chk_s.png" onclick="switchChk(this,'<?php echo $jsonGrid[$intGridIx]['Name']; ?>');" chkValue="All" >Todos<br /><br />
			</div>
			<div id="div<?php echo $jsonGrid[$intGridIx]['Name']; ?>FilterData" class="divFilterData"></div>
		</div>
		<br style="clear:both" />
	</div>
	
	<div style="text-align:center;">
		
	</div>
<!--CLIENT-STYLES GRID-->

</div>
<script>

function getOrders(){
	$strD = "strState=" + $('#uState').val();
	$.ajax({data: $strD,type: "POST",dataType: "text",url: "dogettown.php",success: function(databack){
			$('#uTown').prepend(databack);
			$('#spnTown').fadeIn('fast');
		}
	});
};

$(function() {
	$("#dteFrom").datepicker({
		changeMonth: true,
		changeYear: true,
   		showOn: "button",
		buttonImage: "img/calendar.png",
		showWeek: true,
		buttonImageOnly: true,
		firstDay: 4,
		yearRange: '2013:2013',
		dateFormat: 'yy/mm/dd'
	});
	$("#dteTo").datepicker({
		changeMonth: true,
		changeYear: true,
   		showOn: "button",
		buttonImage: "img/calendar.png",
		showWeek: true,
		buttonImageOnly: true,
		firstDay: 4,
		yearRange: '2013:2013',
		dateFormat: 'yy/mm/dd'
	});
});

$('document').ready(function(){
	$('#dteFrom').val('2013/05/13');
	$('#dteTo').val('2013/05/30');
<?php
for($intGIx=0;$intGIx<count($jsonGrid);$intGIx++){
	echo "	formatGrid('" . $jsonGrid[$intGIx]['Name'] ."','" . $jsonGrid[$intGIx]['Height'] . "'," . $jsonGrid[$intGIx]['Columns'] . "," . $jsonGrid[$intGIx]['Rows'] . ");\n";
};
?>
	$('#spnPairs').html('<?php echo number_format($intPares,0,".",","); ?>');
	$('#spnN2').html('<?php echo number_format($intN2,0,".",","); ?>');
	$('#spnN2m').html('<?php echo number_format($intN2m,0,".",","); ?>');
	$('#spnN3').html('<?php echo number_format($intN3,0,".",","); ?>');
	$('#spnN3m').html('<?php echo number_format($intN3m,0,".",","); ?>');
	$('#spnN4').html('<?php echo number_format($intN4,0,".",","); ?>');
	$('#spnN4m').html('<?php echo number_format($intN4m,0,".",","); ?>');
	$('#spnN5').html('<?php echo number_format($intN5,0,".",","); ?>');
	$('#spnN5m').html('<?php echo number_format($intN5m,0,".",","); ?>');
	$('#spnN6').html('<?php echo number_format($intN6,0,".",","); ?>');
	$('#spnN6m').html('<?php echo number_format($intN6m,0,".",","); ?>');
});

</script>
	<!--WORKAREA-->
</body>
</html>
<?php
unset($oConn);
?>