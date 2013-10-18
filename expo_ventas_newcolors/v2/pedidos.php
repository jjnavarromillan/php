<?php

include('inc/classNC.inc');
$oDB = new MySQLDB();

?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="css/jquery-ui-1.10.1.css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/grid.css">
<script type="text/javascript" src="js/grid.js"></script>

<style type="text/css">

.btnadd { width:25px; height:14px; background-color:#E0E0E0; background-image:url('img/plus_off.png'); background-position:center center; background-repeat:no-repeat; background-size:14px 14px; border-radius:3px; display:inline-block; margin-right:3px; cursor:pointer; }
.btnadd:hover { background-image:url('img/plus_on.png'); }

.btnminus { width:25px; height:14px; background-color:#E0E0E0; background-image:url('img/minus_off.png'); background-position:center center; background-repeat:no-repeat; background-size:14px 14px; border-radius:3px; display:inline-block; margin-right:3px; cursor:pointer; }
.btnminus:hover { background-image:url('img/minus_on.png'); }

.inputcant { background-color:#E1E1E1; width:41px; background-color:#FFFFFF; border:0px; font-size:12px; text-align:right; height:20px; line-height:10px; border-radius:3px; display:inline-block; margin-left:1px; margin-right:1px; margin-bottom:0px; margin-top:0px; padding:0px 0px 0px 0px; }
.measuretitle { background-color:#E1E1E1; width:41px; background-color:#FFFFFF; border:0px; font-size:11px; text-align:center; height:20px; line-height:10px; border-radius:3px; display:inline-block; margin-left:1px; margin-right:1px; margin-bottom:2px; margin-top:1px; padding:0px 0px 0px 0px; }

</style>

</head>

<body>
<div style="width:1200px; background-color:#505050;color:#FFFFFF; margin:5px auto 5px auto; padding:5px 0px 5px 0px; font-size:14px; font-weight:bold; text-align:center; border-radius:5px;">
	&bull;&nbsp;&nbsp;
	<a href="pedidos.php" style="color:#FFFFFF; font-size:14px; font-weight:bold">Levantar Pedido</a>
	&nbsp;&nbsp;&bull;&nbsp;&nbsp;
	<a href="clientes.php" style="color:#FFFFFF; font-size:14px; font-weight:bold">Catálogo de Clientes</a>
	&nbsp;&nbsp;&bull;&nbsp;&nbsp;
	<a href="productos.php" style="color:#FFFFFF; font-size:14px; font-weight:bold">Catálogo de Productos</a>
	&nbsp;&nbsp;&bull;&nbsp;&nbsp;
	<a href="reportes.php" style="color:#FFFFFF; font-size:14px; font-weight:bold">Reportes</a>
	&nbsp;&nbsp;&bull;&nbsp;&nbsp;
	<a href="index.php" style="color:#FFFFFF; font-size:14px; font-weight:bold">Salir</a>
	&nbsp;&nbsp;&bull;
</div>


<div style="width:1200px; margin:0px auto 5px auto; background-color:#EC732B; text-align:center; padding:5px 0px 5px 0px; ">
	Cátalogo <select id="selCatalog" onchange="changeCatalog();">
	<?php
	$strSql = "SELECT idPlantilla, plantilla FROM catalogos_plantilla WHERE tipoCatalogo = 'Temporadas' ORDER BY idPlantilla DESC;";
	$rstData = mysql_query($strSql,$oDB->Connection);
	if(!isset($_POST['intIdCatalog'])){
		$intIdCatalog = mysql_result($rstData,0,0);
	}else{
		$intIdCatalog = $_POST['intIdCatalog'];
	}
	for($intIx=0;$intIx<mysql_num_rows($rstData);$intIx++){
	?>
		<option value="<?php echo mysql_result($rstData,$intIx,0); ?>"<?php if(mysql_result($rstData,$intIx,0)==$intIdCatalog) { echo ' selected="selected"'; }; ?>><?php echo mysql_result($rstData,$intIx,1) ; ?></option>
	<?php
	};
	unset($rstData);
	?>
	</select>
	Cliente <select id="selClient" onchange="getStores();">
		<option value="**">Seleccione Cliente ...</option>
	<?php
	$strSql = "SELECT idCliente, nombre FROM detallistas_clientes ORDER BY nombre;";
	$rstData = mysql_query($strSql,$oDB->Connection);
	while ($objData = mysql_fetch_array($rstData)){
	?>
		<option value="<?php echo $objData['idCliente'] . "_" . $objData['nombre']; ?>"><?php echo $objData['nombre'] ; ?></option>
	<?php
	};
	unset($rstData);
	?>
	</select>
	
	Cliente <select id="selStore" onchange="setStores();">
		<option value="**">Seleccione Tienda ...</option>
	</select>
	<form id="frmPedidos" method="post" action="pedidos.php">
		<input type="hidden" value="" id="intIdCatalog" name="intIdCatalog">
	</form>
</div>

<div style="width:1200px; margin:0px auto 0px auto;">
	<div style="float:left;overflow:auto;width:835px; ">
		<div style=" text-align:right; width:787px; margin: 0px auto 5px auto; border-radius:5px; height:127px; background-position:left center; background-repeat:no-repeat; background-image:url(../carrito/banner-platilla/<?php echo $intIdCatalog; ?>.jpg);">
			<img src="img/dist.png">
		</div>
		<div style="background-color:#505050; color:#FFFFFF; height:27px; padding:2px 10px 2px 10px; text-align:center; font-size:10px; border-radius:3px; margin-bottom:5px; margin-right:24px;">
<?php
$strSql = "SELECT DISTINCT(b.linea) FROM catalogo_estilos_plantilla a, estilos b WHERE a.idPlantilla = " . $intIdCatalog . " AND a.idEstilo = b.Id";
$rstData = mysql_query($strSql,$oDB->Connection);
while ($objData = mysql_fetch_array($rstData)){
?>
	| <a href="#<?php echo $objData[0]; ?>" style="color:#FFFFFF;"><?php echo $objData[0]; ?></a>
<?php
};
unset($rstData);
?>
		</div>
	</div>
	<div id="divResume" style="float:left;overflow:auto; background-color:#EC732B; width:355px; height:152px; border-radius:5px; padding:5px 5px 5px 5px">
		<label style="width:60px; margin-right:5px; color:#FFFFFF; text-align:left; font-size:12px; display:inline-block;" >Cliente</label><input style=" width:290px; border:0px; text-align:center; font-size:12px; color:#505050; background-color:#FFFFFF; border-radius:5px;" type="text" id="txtOrderClient" value="" readonly="readonly"><input type="hidden" id="txtOrderClientId" value="-1"><br />
		<label style="width:60px; margin-right:5px; color:#FFFFFF; text-align:left; font-size:12px; display:inline-block;" >Tienda</label><input style=" width:290px; border:0px; text-align:center; font-size:12px; color:#505050; background-color:#FFFFFF; border-radius:5px;" type="text" id="txtOrderStore" value="" readonly="readonly"><input type="hidden" id="txtOrderStoreId" value="-1"><br />
		<label style="width:60px; margin-right:5px; color:#FFFFFF; text-align:left; font-size:12px; display:inline-block;" >Comprador</label><input style=" width:290px; border:0px; text-align:center; font-size:12px; color:#505050; background-color:#FFFFFF; border-radius:5px;" type="text" id="txtOrderBuyer" value=""><br />
		<label style="width:60px; margin-right:5px; color:#FFFFFF; text-align:left; font-size:12px; display:inline-block;" >Pares</label><input style=" width:290px; border:0px; text-align:center; font-size:12px; color:#505050; background-color:#FFFFFF; border-radius:5px;" type="text" id="txtOrderPairs" value="" readonly="readonly"><br />
		<label style="width:60px; margin-right:5px; color:#FFFFFF; text-align:left; font-size:12px; display:inline-block;" >Importe</label><input style=" width:290px; border:0px; text-align:center; font-size:12px; color:#505050; background-color:#FFFFFF; border-radius:5px;" type="text" id="txtOrderAmmount" value="" readonly="readonly"><br />
		<label style="width:60px; margin-right:5px; color:#FFFFFF; text-align:left; font-size:12px; display:inline-block;" >Vendedor</label><input style=" width:290px; border:0px; text-align:center; font-size:12px; color:#505050; background-color:#FFFFFF; border-radius:5px;" type="text" id="txtOrderSalesMan" value="Gonzalo Morales" readonly="readonly"><input type="hidden" id="txtOrderSalesManId" value="13"><br />
		<div style="text-align:center; padding-top:0px;">
			<div class="button_dark" onclick="genOrder();">Crear Pedido</div>
			<div class="button_dark" onclick="cancelOrder();">Cancelar</div>
		</div>
	</div>
	<br style="clear:both" />
</div>

<div style="width:1200px; margin:0px auto 0px auto;">
	<div style="float:left;overflow:auto; width:835px; height:420px;">
		<div>
		<?php
		$strIds = "";
		$strSql = "SELECT a.idCatEstPlan, a.idEstilo, b.Linea, b.Estilo, b.Material, b.Color, b.precio FROM catalogo_estilos_plantilla a, estilos b WHERE a.idPlantilla = " . $intIdCatalog . " AND a.idEstilo = b.Id ORDER BY b.Linea, b.Estilo, b.Material, b.Color;";
		$rstData = mysql_query($strSql,$oDB->Connection);
		while ($objData = mysql_fetch_array($rstData)){
			$strIds .= '"' . $objData['idCatEstPlan'] . '",';
		?>
			<div style="margin:0px 0px 5px 0px; width:816px; ">
				<div style="background-color:#EC732B; padding:5px 5px 5px 5px; float:left; border-radius:5px;">
					<div style="cursor:pointer; background-color:#FFFFFF; background-image:url(http://192.168.1.155/imagenes_system/muestras/mediano/<?php echo str_replace(" ","-",$objData['Estilo']);?>-<?php echo str_replace(" ","-",$objData['Material']);?>-<?php echo str_replace(" ","-",$objData['Color']);?>.gif); background-repeat:no-repeat; background-position:center center; background-size:cover; width:95px; height:95px; border-radius:5px; "></div>
				</div>
				<div style=" float:left; width:200px; height:84px; background-color:#FFFFFF; border-radius:5px; margin-left:5px; margin-right:5px; font-size:12px; line-height:14px; padding:10px 10px 10px 10px; vertical-align:bottom">
					<?php echo $objData['Linea']; ?><br />
					<?php echo $objData['Estilo']; ?><br />
					<?php echo $objData['Material']; ?><br />
					<?php echo $objData['Color']; ?><br />
					<?php echo "$ " . number_format($objData['precio'],2,".",","); ?><br />
					<?php echo $objData['idEstilo']; ?>
					<a name="<?php echo $objData['Linea']; ?>"></a>
				</div>
				<div style="background-color:#EC732B; color:#FFFFFF; float:left; border-radius:5px; height:104px; width:476px; text-align:center;">
					<div style="text-align:center; padding:3px 0px 0px 0px; ">
						Distribución<select id="selDist_<?php echo $objData['idCatEstPlan']; ?>" onchange="calcCant(<?php echo $objData['idCatEstPlan']; ?>);">
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
						</select>
						Cantidad<select id="selCant_<?php echo $objData['idCatEstPlan']; ?>" onchange="calcCant(<?php echo $objData['idCatEstPlan']; ?>);">
						<?php
						for($intCant=0;$intCant<=100;$intCant++){
							?>
							<option value="<?php echo $intCant; ?>"><?php echo $intCant; ?></option>
							<?php
						}
						?>
						</select>
						<div class="button_dark" onclick="copyDist(<?php echo $objData['idCatEstPlan']; ?>);"  >Copiar Distribución</div>
						<input type="hidden" id="txtLine_<?php echo $objData['idCatEstPlan']; ?>" value="<?php echo $objData['Linea']; ?>">
						<input type="hidden" id="txtStyle_<?php echo $objData['idCatEstPlan']; ?>" value="<?php echo $objData['Estilo']; ?>">
						<input type="hidden" id="txtMaterial_<?php echo $objData['idCatEstPlan']; ?>" value="<?php echo $objData['Material']; ?>">
						<input type="hidden" id="txtColor_<?php echo $objData['idCatEstPlan']; ?>" value="<?php echo $objData['Color']; ?>">
						<input type="hidden" id="txtItem_<?php echo $objData['idCatEstPlan']; ?>" value="<?php echo $objData['idEstilo']; ?>">
						<input type="hidden" id="txtImage_<?php echo $objData['idCatEstPlan']; ?>" value="<?php echo str_replace(" ","-",$objData['Estilo']);?>-<?php echo str_replace(" ","-",$objData['Material']);?>-<?php echo str_replace(" ","-",$objData['Color']);?>.gif">
						<input type="hidden" id="txtPrice_<?php echo $objData['idCatEstPlan']; ?>" value="<?php echo $objData['precio']; ?>">
					</div>
					<div style="text-align:center; padding:2px 2px 2px 5px; color:#505050; text-align:left; display:block; width:472px; ">
							<input type="text" class="measuretitle" value="2" readonly="readonly">
							<input type="text" class="measuretitle" value="2m" readonly="readonly">
							<input type="text" class="measuretitle" value="3" readonly="readonly">
							<input type="text" class="measuretitle" value="3m" readonly="readonly">
							<input type="text" class="measuretitle" value="4" readonly="readonly">
							<input type="text" class="measuretitle" value="4m" readonly="readonly">
							<input type="text" class="measuretitle" value="5" readonly="readonly">
							<input type="text" class="measuretitle" value="5m" readonly="readonly">
							<input type="text" class="measuretitle" value="6" readonly="readonly">
							<input type="text" class="measuretitle" value="6m" readonly="readonly">
							<br />
				 			<input class="inputcant"  type="number" id="cant_2_<?php echo $objData['idCatEstPlan']; ?>" value="0" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_2m_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_3_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_3m_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_4_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_4m_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_5_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_5m_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_6_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
				 			<input type="number" id="cant_6m_<?php echo $objData['idCatEstPlan']; ?>" value="0" class="inputcant" min="0" onchange="calcTotals(<?php echo $objData['idCatEstPlan']; ?>);">
					</div>
					<div style="">
			 			Pares<label id="spnPairs_<?php echo $objData['idCatEstPlan']; ?>" style="color:#505050;background-color :#FFFFFF; margin:0px 5px 0px 5px; padding:3px 3px 3px 3px; border-radius:3px; width:45px; text-align:right; display:inline-block; " >0</label>
			 			Importe<label id="spnAmount_<?php echo $objData['idCatEstPlan']; ?>" style="color:#505050;background-color:#FFFFFF; margin:0px 5px 0px 5px; padding:3px 3px 3px 3px; border-radius:3px; width:80px; text-align:right; display:inline-block; " >$ 0.00</label>
						<div class="button_dark" onclick="addToCart(<?php echo $objData['idCatEstPlan']; ?>);"  >+</div>
					</div>
				</div>
				<br style="clear:both" />
			</div>
		<?php
		};
		unset($rstData);
		?>
		</div>
	</div>
	<div id="divShopping" style="float:left;overflow:auto; overflow-y:visible; background-color:#505050; width:365px; height:420px; color:#FFFFFF;"></div>
	<br style="clear:both" />
</div>

<script>
var $arrItems = "";

function genOrder(){
	
	if($('#txtOrderClientId').val()=="-1" || $('#txtOrderStoreId').val()=="-1" || $('#txtOrderBuyer').val()==""){
		alert("SELECCIONE CLIENTE, TIENDA E INDIQUE COMPRADOR!!!");
	}else{
		if($arrItems==""){
			alert("AGREGUE ITEMS AL PEDIDO!!!");
		}else{
			var $blnResponse = confirm("Generar Pedido?");
			if($blnResponse==true){
				$('#frmOrder').remove();
				$strForm = '		<form id="frmOrder" action="genorder.php" method="post" target="_blank" >';
				$strForm += '			<input type="hidden" value="' + $('#txtOrderClientId').val() + '" id="orderClientId" name="orderClientId">';
				$strForm += '			<input type="hidden" value="' + $('#txtOrderStoreId').val() + '" id="orderStoreId" name="orderStoreId">';
				$strForm += '			<input type="hidden" value="' + $('#txtOrderBuyer').val() + '" id="orderBuyer" name="orderBuyer">';
				$strForm += '			<input type="hidden" value="' + $('#txtOrderSalesManId').val() + '" id="orderSalesmanId" name="orderSalesmanId">';
				$strForm += '			<input type="hidden" value="' + $arrItems + '" id="orderItems" name="orderItems">';
				$arrSItems = $arrItems.split(",");
				
				$strItems = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strItems += $('#txtShItem_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strItems + '" id="orderItemsNo" name="orderItemsNo">';
				
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN2_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN2" name="orderN2">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN2m_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN2m" name="orderN2m">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN3_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN3" name="orderN3">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN3m_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN3m" name="orderN3m">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN4_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN4" name="orderN4">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN4m_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN4m" name="orderN4m">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN5_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN5" name="orderN5">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN5m_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN5m" name="orderN5m">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN6_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN6" name="orderN6">';
				$strMeasure = "";
				for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
					$strMeasure += $('#txtShN6m_' + $arrSItems[$intIx]).val() + ",";
				};
				$strForm += '			<input type="hidden" value="' + $strMeasure + '" id="orderN6m" name="orderN6m">';
				$strForm += '		</form>';
				$('#divResume').append($strForm);
				$('#frmOrder').submit();
				$('#frmOrder').remove();
			};
		};
	};
};

function cancelOrder(){
	window.location='pedidos.php';
};

function addToCart($intCatalog){

	if($('#spnPairs_' + $intCatalog).html()>0){

		removeItem($intCatalog);
		
		$arrItems += $intCatalog + ",";
		
		$strLine = $('#txtLine_' + $intCatalog).val();
		$strStyle = $('#txtStyle_' + $intCatalog).val();
		$strMaterial = $('#txtMaterial_' + $intCatalog).val();
		$strColor = $('#txtColor_' + $intCatalog).val();
		$strItem = $('#txtItem_' + $intCatalog).val();
		$strImage = $('#txtImage_' + $intCatalog).val();
		$strPrice = $('#txtPrice_' + $intCatalog).val();
		$intPairs = $('#spnPairs_' + $intCatalog).html();
		$strAmount = $('#spnAmount_' + $intCatalog).html();
		$intN2 = $('#cant_2_' + $intCatalog).val();
		$intN2m = $('#cant_2m_' + $intCatalog).val();
		$intN3 = $('#cant_3_' + $intCatalog).val();
		$intN3m = $('#cant_3m_' + $intCatalog).val();
		$intN4 = $('#cant_4_' + $intCatalog).val();
		$intN4m = $('#cant_4m_' + $intCatalog).val();
		$intN5 = $('#cant_5_' + $intCatalog).val();
		$intN5m = $('#cant_5m_' + $intCatalog).val();
		$intN6 = $('#cant_6_' + $intCatalog).val();
		$intN6m = $('#cant_6m_' + $intCatalog).val();
	
		$strDiv = '';
		$strDiv += '		<div style="display:none;height:44px; margin-top:2px;" id="divItem_' + $intCatalog + '" >';
		$strDiv += '			<div style="padding:2px 2px 2px 2px; float:left; background-color:#FFFFFF; border-radius:2px 0px 0px 2px; ">';
		$strDiv += '				<div style=" border-radius:3px; width:40px; height:40px; background-image:url(http://192.168.1.155/imagenes_system/muestras/miniminis/' + $strImage + '); background-position:center center; background-repeat:no-repeat; background-size:cover;"></div>';
		$strDiv += '			</div>';
		$strDiv += '			<div style="background-color:#FFFFFF; float:left; height:40px; width:299px; padding:2px 2px 2px 2px; font-size:10px; color:#505050;border-radius:0px 2px 2px 0px; ">';
		$strDiv += '				<div>' + $strLine + ', ' + $strStyle + ', ' + $strMaterial + ', ' + $strColor + '</div>';
		$strDiv += '				<div style=" width:200px; float:left; ">Pares ' + $intPairs + ', Importe ' + $strAmount + '</div>';
		$strDiv += '				<div class="button_dark_small" style=" font-size:8px; float:right; " onclick="removeItem(' + $intCatalog + ')">Eliminar</div>';
		$strDiv += '				<br style="clear:both" />';
		$strDiv += '			</div>';
		$strDiv += '			<br style="clear:both" />';
		$strDiv += '			<input type="hidden" id="txtShLine_' + $intCatalog + '" value="' + $strLine + '">';
		$strDiv += '			<input type="hidden" id="txtShStyle_' + $intCatalog + '" value="' + $strStyle + '">';
		$strDiv += '			<input type="hidden" id="txtShMaterial_' + $intCatalog + '" value="' + $strMaterial + '">';
		$strDiv += '			<input type="hidden" id="txtShColor_' + $intCatalog + '" value="' + $strColor + '">';
		$strDiv += '			<input type="hidden" id="txtShItem_' + $intCatalog + '" value="' + $strItem + '">';
		$strDiv += '			<input type="hidden" id="txtShImage_' + $intCatalog + '" value="' + $strImage + '">';
		$strDiv += '			<input type="hidden" id="txtShPrice_' + $intCatalog + '" value="' + $strPrice + '">';
		$strDiv += '			<input type="hidden" id="txtShPairs_' + $intCatalog + '" value="' + $intPairs + '">';
		$strDiv += '			<input type="hidden" id="txtShAmount_' + $intCatalog + '" value="' + $strAmount + '">';
		$strDiv += '			<input type="hidden" id="txtShN2_' + $intCatalog + '" value="' + $intN2 + '">';
		$strDiv += '			<input type="hidden" id="txtShN2m_' + $intCatalog + '" value="' + $intN2m + '">';
		$strDiv += '			<input type="hidden" id="txtShN3_' + $intCatalog + '" value="' + $intN3 + '">';
		$strDiv += '			<input type="hidden" id="txtShN3m_' + $intCatalog + '" value="' + $intN3m + '">';
		$strDiv += '			<input type="hidden" id="txtShN4_' + $intCatalog + '" value="' + $intN4 + '">';
		$strDiv += '			<input type="hidden" id="txtShN4m_' + $intCatalog + '" value="' + $intN4m + '">';
		$strDiv += '			<input type="hidden" id="txtShN5_' + $intCatalog + '" value="' + $intN5 + '">';
		$strDiv += '			<input type="hidden" id="txtShN5m_' + $intCatalog + '" value="' + $intN5m + '">';
		$strDiv += '			<input type="hidden" id="txtShN6_' + $intCatalog + '" value="' + $intN6 + '">';
		$strDiv += '			<input type="hidden" id="txtShN6m_' + $intCatalog + '" value="' + $intN6m + '">';
		$strDiv += '		</div>';

		$('#divShopping').append($strDiv);
		$('#divItem_' + $intCatalog).fadeIn('fast');
		
		calcOrderTotals();
		
	};
	
};

function removeItem($intCatalog){

	$strToRemove = $intCatalog + ",";
	$arrItems = $arrItems.replace($strToRemove,"");
		
	$('#divItem_' + $intCatalog).fadeOut('fast');
	$('#divItem_' + $intCatalog).remove();
	
	calcOrderTotals();

};

function calcOrderTotals(){

	$arrSItems = $arrItems.split(",");
	$intSPairs = 0;
	for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
		$intSPairs = $intSPairs + parseInt($('#txtShPairs_' + $arrSItems[$intIx]).val(),10);
	};
	$('#txtOrderPairs').val($intSPairs);

	$intSAmount = 0;
	for($intIx=0;$intIx<($arrSItems.length - 1);$intIx++){
		console.log(parseInt($('#txtShAmount_' + $arrSItems[$intIx]).val().replace("$ ",""),10));
		$intSAmount = $intSAmount + parseInt($('#txtShAmount_' + $arrSItems[$intIx]).val().replace("$ ",""),10);
	};
	$('#txtOrderAmmount').val('$ ' + $intSAmount.toFixed(2));
	
};

function copyDist($intCatalog){
	$arrDivs = [<?php echo $strIds . '""'; ?>];
	$strDist = $('#selDist_' + $intCatalog).val();
	$intCant = $('#selCant_' + $intCatalog).val();
	$intN2 = $('#cant_2_' + $intCatalog).val();
	$intN2m = $('#cant_2m_' + $intCatalog).val();
	$intN3 = $('#cant_3_' + $intCatalog).val();
	$intN3m = $('#cant_3m_' + $intCatalog).val();
	$intN4 = $('#cant_4_' + $intCatalog).val();
	$intN4m = $('#cant_4m_' + $intCatalog).val();
	$intN5 = $('#cant_5_' + $intCatalog).val();
	$intN5m = $('#cant_5m_' + $intCatalog).val();
	$intN6 = $('#cant_6_' + $intCatalog).val();
	$intN6m = $('#cant_6m_' + $intCatalog).val();
	
	for($intIx=0;$intIx<$arrDivs.length;$intIx++){
		$('#selDist_' + $arrDivs[$intIx]).val($strDist);
		$('#selCant_' + $arrDivs[$intIx]).val($intCant);
		$('#cant_2_' + $arrDivs[$intIx]).val($intN2);
		$('#cant_2m_' + $arrDivs[$intIx]).val($intN2m);
		$('#cant_3_' + $arrDivs[$intIx]).val($intN3);
		$('#cant_3m_' + $arrDivs[$intIx]).val($intN3m);
		$('#cant_4_' + $arrDivs[$intIx]).val($intN4);
		$('#cant_4m_' + $arrDivs[$intIx]).val($intN4m);
		$('#cant_5_' + $arrDivs[$intIx]).val($intN5);
		$('#cant_5m_' + $arrDivs[$intIx]).val($intN5m);
		$('#cant_6_' + $arrDivs[$intIx]).val($intN6);
		$('#cant_6m_' + $arrDivs[$intIx]).val($intN6m);
		calcTotals($arrDivs[$intIx]);
	};
};

function calcCant($intCatalog){

var $arrDist = new Array();

	switch ($('#selDist_' + $intCatalog).val()){
		case 'A':
			$arrDist['N2'] = 0;	$arrDist['N2m'] = 0; $arrDist['N3'] = 1; $arrDist['N3m'] = 2; $arrDist['N4'] = 2; $arrDist['N4m'] = 2; $arrDist['N5'] = 2; $arrDist['N5m'] = 2; $arrDist['N6'] = 1; $arrDist['N6m'] = 0;
			break;
		case 'B':
			$arrDist['N2'] = 1; $arrDist['N2m'] = 1; $arrDist['N3'] = 2; $arrDist['N3m'] = 2; $arrDist['N4'] = 2; $arrDist['N4m'] = 2; $arrDist['N5'] = 1; $arrDist['N5m'] = 1; $arrDist['N6'] = 0; $arrDist['N6m'] = 0;
			break;
		case 'C':
			$arrDist['N2'] = 0; $arrDist['N2m'] = 0; $arrDist['N3'] = 1; $arrDist['N3m'] = 1; $arrDist['N4'] = 2; $arrDist['N4m'] = 2; $arrDist['N5'] = 2; $arrDist['N5m'] = 2; $arrDist['N6'] = 1; $arrDist['N6m'] = 1;
			break;
		case 'D':
			$arrDist['N2'] = 0; $arrDist['N2m'] = 0; $arrDist['N3'] = 1; $arrDist['N3m'] = 2; $arrDist['N4'] = 3; $arrDist['N4m'] = 3; $arrDist['N5'] = 3; $arrDist['N5m'] = 3; $arrDist['N6'] = 2; $arrDist['N6m'] = 1;
			break;
	};

	$('#cant_2_' + $intCatalog).val($arrDist['N2'] * $('#selCant_' + $intCatalog).val());
	$('#cant_2m_' + $intCatalog).val($arrDist['N2m'] * $('#selCant_' + $intCatalog).val());
	$('#cant_3_' + $intCatalog).val($arrDist['N3'] * $('#selCant_' + $intCatalog).val());
	$('#cant_3m_' + $intCatalog).val($arrDist['N3m'] * $('#selCant_' + $intCatalog).val());
	$('#cant_4_' + $intCatalog).val($arrDist['N4'] * $('#selCant_' + $intCatalog).val());
	$('#cant_4m_' + $intCatalog).val($arrDist['N4m'] * $('#selCant_' + $intCatalog).val());
	$('#cant_5_' + $intCatalog).val($arrDist['N5'] * $('#selCant_' + $intCatalog).val());
	$('#cant_5m_' + $intCatalog).val($arrDist['N5m'] * $('#selCant_' + $intCatalog).val());
	$('#cant_6_' + $intCatalog).val($arrDist['N6'] * $('#selCant_' + $intCatalog).val());
	$('#cant_6m_' + $intCatalog).val($arrDist['N6m'] * $('#selCant_' + $intCatalog).val());

	calcTotals($intCatalog);
	
};

function plusCant($intCatalog, $strMeasure){

	$intCant = $('#cant_' + $strMeasure + '_' + $intCatalog).html();
	$intCant++;
	$('#cant_' + $strMeasure + '_' + $intCatalog).html($intCant);

	calcTotals($intCatalog);

};

function minusCant($intCatalog, $strMeasure){

	$intCant = $('#cant_' + $strMeasure + '_' + $intCatalog).html();
	if($intCant!=0){
		$intCant--;
	};
	$('#cant_' + $strMeasure + '_' + $intCatalog).html($intCant);

	calcTotals($intCatalog);
	
};

function calcTotals($intCatalog){

$intPairs = 0;

	$intPairs += parseInt($('#cant_2_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_2m_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_3_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_3m_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_4_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_4m_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_5_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_5m_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_6_' + $intCatalog).val(),10);
	$intPairs += parseInt($('#cant_6m_' + $intCatalog).val(),10);
	$('#spnPairs_' + $intCatalog).html($intPairs);
	$('#spnAmount_' + $intCatalog).html('$ ' + ($intPairs * $('#txtPrice_' + $intCatalog).val()).toFixed(2));

};

function changeCatalog(){

	$('#intIdCatalog').val($('#selCatalog').val());
	$('#frmPedidos').submit();

};

function getStores(){
	
	$arrClients = $('#selClient').val().split("_");
	$('#selStore').empty();
	$strD = "intClient=" + $arrClients[0];
	$.ajax({data: $strD,type: "POST",dataType: "text",url: "dogetstore.php",success: function(databack){
			$('#selStore').prepend(databack);
			if($('#selClient').val()=="**"){
				$('#txtOrderClient').val("");
				$('#txtOrderClientId').val("-1");
			}else{
				$arrClilent = $('#selClient').val().split("_");
				$('#txtOrderClient').val($arrClilent[1]);
				$('#txtOrderClientId').val($arrClilent[0]);
			}
		}
	});

};

function setStores(){
	$arrStores = $('#selStore').val().split("_");
	if($('#selStore').val()=="**"){
		$('#txtOrderStore').val("");
		$('#txtOrderStoreId').val("-1");
	}else{
		$arrClilent = $('#selClient').val().split("_");
		$('#txtOrderStore').val($arrStores[1]);
		$('#txtOrderStoreId').val($arrStores[0]);
	}
	
};

</script>


</body>

</html>
<?php
unset($oConn);
?>