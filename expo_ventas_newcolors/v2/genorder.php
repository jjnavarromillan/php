<?php

set_time_limit(600);
ini_set('max_execution_time', 600);

require('fpdf17/fpdf.php');
include('inc/classNC.inc');

class PDF extends FPDF
{
// Page header
	function Header(){
	    // Logo
	    $this->Image('img/impresion-pedido.jpg',0,0,60,9);
	    // Arial bold 15
	    // Move to the right
	    // Title
	    $this->SetFont('Arial','B',30);
	    $this->SetFont('Arial','B',15);
	    $this->SetTextColor(0,0,0);
	    $this->Ln(1);
	    $this->Cell(3);
	    //$this->Cell(0,0,utf8_decode('Primavera - Verano, 2013'));
	    
	    // Line break
	    $this->Ln(10);
	}

// Page footer
	function Footer(){
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	//	$this->Image('img/pleca.png',0,0,216,15);
	    // Arial italic 8
	    $this->SetFont('Arial','',8);
	    // Page number
	    $this->Cell(0,0,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
	    $this->Ln(7);
	    $this->SetFont('Arial','B',9);
	    $this->SetTextColor(0,0,0);
	    $this->Cell(0,0,'Nudo de Cempoaltepec No. 1129, Guadalajara, Jalisco - +52.33.3609.2232, 3609.4304 - lauraventasnc@hotmail.com - www.newcolors.mx',0,0,'C');
	}
}

$oDB = new MySQLDB();

$strSql = "SELECT CONCAT(REPLACE(idPed,'E','') + 1,'E') FROM pedidos WHERE sitiopedido = 'Web' AND lugarpedido = 'Expo' ORDER BY fechapedido DESC LIMIT 1;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strOrderId = mysql_result($rstData,0,0);
unset($rstData);

$arrItems = explode(",",$_POST['orderItems']);
$arrItemsNo = explode(",",$_POST['orderItemsNo']);
$arrN2 = explode(",",$_POST['orderN2']);
$arrN2m = explode(",",$_POST['orderN2m']);
$arrN3 = explode(",",$_POST['orderN3']);
$arrN3m = explode(",",$_POST['orderN3m']);
$arrN4 = explode(",",$_POST['orderN4']);
$arrN4m = explode(",",$_POST['orderN4m']);
$arrN5 = explode(",",$_POST['orderN5']);
$arrN5m = explode(",",$_POST['orderN5m']);
$arrN6 = explode(",",$_POST['orderN6']);
$arrN6m = explode(",",$_POST['orderN6m']);

$intPairs=0;

for($intIx=0;$intIx<count($arrItems)-1;$intIx++){
	$intPairs = $intPairs + $arrN2[$intIx];
	$intPairs = $intPairs + $arrN2m[$intIx];
	$intPairs = $intPairs + $arrN3[$intIx];
	$intPairs = $intPairs + $arrN3m[$intIx];
	$intPairs = $intPairs + $arrN4[$intIx];
	$intPairs = $intPairs + $arrN4m[$intIx];
	$intPairs = $intPairs + $arrN5[$intIx];
	$intPairs = $intPairs + $arrN5m[$intIx];
	$intPairs = $intPairs + $arrN6[$intIx];
	$intPairs = $intPairs + $arrN6m[$intIx];
};

$strSql = "INSERT INTO pedidos VALUES('" . $strOrderId . "',NULL,NOW(),NULL,'Web'," . $_POST['orderSalesmanId'] . ",0," . $intPairs . ",0,NULL,'No',NULL,NULL,NULL,NULL,NULL,'Temporadas',NULL," . $_POST['orderStoreId'] . ",NULL,NULL,NULL,NULL,NULL,'" . $_POST['orderBuyer'] . "','Expo',NULL,NULL,NULL);";
$rstData = mysql_query($strSql,$oDB->Connection);

for($intIx=0;$intIx<count($arrItems)-1;$intIx++){
	$strSql = "INSERT INTO pedidos_detalle(idestilo,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,Pares,precio,Total,idPedido) VALUES (" . $arrItemsNo[$intIx] . ",";
	$strSql .= $arrN2[$intIx] . ",";
	$strSql .= $arrN2m[$intIx] . ",";
	$strSql .= $arrN3[$intIx] . ",";
	$strSql .= $arrN3m[$intIx] . ",";
	$strSql .= $arrN4[$intIx] . ",";
	$strSql .= $arrN4m[$intIx] . ",";
	$strSql .= $arrN5[$intIx] . ",";
	$strSql .= $arrN5m[$intIx] . ",";
	$strSql .= $arrN6[$intIx] . ",";
	$strSql .= $arrN6m[$intIx] . ",";
	$strSql .= $arrN2[$intIx] + $arrN2m[$intIx] + $arrN3[$intIx] + $arrN3m[$intIx] + $arrN4[$intIx] + $arrN4m[$intIx] + $arrN5[$intIx] + $arrN5m[$intIx] + $arrN6[$intIx] + $arrN6m[$intIx] . ",";
	$strSql .= "0,0,'" . $strOrderId . "');";
	$rstData = mysql_query($strSql,$oDB->Connection);
};

$strSql = "SELECT nombre FROM detallistas_clientes WHERE idCliente = " . $_POST['orderClientId'] . ";";
$rstData = mysql_query($strSql,$oDB->Connection);
$strClient = mysql_result($rstData,0,0);
unset($rstData);

$strSql = "SELECT CONCAT('Calle: ',IFNULL(a.domicilio,''),', Colonia: ',IFNULL(a.col,''),', Mpo.: ',IFNULL(b.municipio,''),', Edo.: ',IFNULL(c.estado,''),', Pais: ',IFNULL(d.pais,''),', CP:  ',IFNULL(a.cp,''),', RFC: ',IFNULL(a.rfc,''),', Tel.: ',IFNULL(a.telefonos,''),', EMail: ',IFNULL(a.email,'')) FROM detallistas_clientes a, municipios b, estados c, paises d WHERE a.idCliente = " . $_POST['orderClientId'] . " AND a.idMunicipio = b.idMunicipio and a.idEstado = c.idEstado and a.idPais = d.idPais;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strClientData = mysql_result($rstData,0,0);
unset($rstData);

$strSql = "SELECT tienda FROM detallistas_tiendas where idCliente = " . $_POST['orderClientId'] . " and idTienda = " . $_POST['orderStoreId'] . ";";
$rstData = mysql_query($strSql,$oDB->Connection);
$strStore = mysql_result($rstData,0,0);
unset($rstData);

$strSql = "SELECT CONCAT('Calle: ', IFNULL(a.domicilio,''),', Colonia: ',IFNULL(a.col,''),', Mpo.: ',IFNULL(b.municipio,''),', Edo.: ',IFNULL(c.estado,''),', Pais: ',IFNULL(d.pais,''),', CP: ',IFNULL(a.cp,''),', Tel.: ',IFNULL(a.telefonos,''),', EMail: ',IFNULL(a.email,''),', Transporte: ',IFNULL(a.transporte,'')) FROM detallistas_tiendas a, municipios b, estados c, paises d WHERE a.idCliente = " . $_POST['orderClientId'] . " and a.idTienda = " . $_POST['orderStoreId'] . " AND a.idMunicipio = b.idMunicipio and a.idEstado = c.idEstado and a.idPais = d.idPais;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strStoreData = mysql_result($rstData,0,0);
unset($rstData);

$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->SetLeftMargin(0);
$pdf->SetRightMargin(0);
$pdf->SetDrawColor(80,80,80);
$pdf->AddPage();
$pdf->Cell(0,10,utf8_decode('No. de Pedido: ' . $strOrderId . ', ' . count($arrItems) . ' Estilos, ' . date('Y/m/d H:i:s')),1);
$pdf->Ln(11);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,10,utf8_decode('Cliente: ' . $strClient . ", Tienda: " . $strStore . ", Comprador: " . $_POST['orderBuyer']),1);
$pdf->Ln(11);
$pdf->SetFont('Arial','',6);
$pdf->Cell(0,10,utf8_decode('Datos Cliente: ' . $strClientData),1);
$pdf->Ln(11);
$pdf->SetFont('Arial','',6);
$pdf->Cell(0,10,utf8_decode('Datos Tienda: ' . $strStoreData),1);
$pdf->Ln(15);
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,10,utf8_decode('Código'),1,0,'C');
$pdf->Cell(35,10,utf8_decode('Línea'),1,0,'C');
$pdf->Cell(35,10,utf8_decode('Estilo'),1,0,'C');
$pdf->Cell(35,10,utf8_decode('Material'),1,0,'C');
$pdf->Cell(35,10,utf8_decode('Color'),1,0,'C');
$pdf->Cell(20,10,utf8_decode('Pares'),1,0,'C');
$pdf->Cell(20,10,utf8_decode('Precio'),1,0,'C');
$pdf->Cell(20,10,utf8_decode('Importe'),1,0,'C');

$pdf->Ln(10);
$pdf->SetFont('Arial','',8);
$strSql = "SELECT a.idestilo, b.linea, b.estilo, b.material, b.color, a.N2, a.N2m, a.N3, a.N3m, a.N4, a.N4m, a.N5, a.N5m, a.N6, a.N6m, a.pares, a.precio, a.total FROM pedidos_detalle a, estilos b WHERE a.idPedido = '" . $strOrderId . "' AND a.idEstilo = b.Id;";
$rstData = mysql_query($strSql,$oDB->Connection);
while ($objData = mysql_fetch_array($rstData)){
	$pdf->Ln(6.5);
	$pdf->Cell(10,0,utf8_decode($objData[0]),0);
	$pdf->Cell(35,0,utf8_decode($objData[1]),0);
	$pdf->Cell(35,0,utf8_decode($objData[2]),0);
	$pdf->Cell(35,0,utf8_decode($objData[3]),0);
	$pdf->Cell(35,0,utf8_decode($objData[4]),0);
	$pdf->Cell(20,0,utf8_decode($objData[15]),0,0,'R');
	$pdf->Cell(20,0,utf8_decode($objData[16]),0,0,'R');
	$pdf->Cell(20,0,utf8_decode($objData[17]),0,0,'R');
	$pdf->Ln(3);
	$pdf->Cell(0,3,utf8_decode('N2: ' . $objData[5] . ' - N2m: ' . $objData[6] . ' - N3: ' . $objData[7] . ' - N3m: ' . $objData[8] . ' - N4: ' . $objData[9] . ' - N4m: ' . $objData[10] . ' - N5: ' . $objData[11] . ' - N5m: ' . $objData[12] . ' - N6: ' . $objData[13] . ' - N6m: ' . $objData[14]),'B');
};
unset($rstData);

$pdf->Ln(30);
$pdf->SetFont('Arial','',12);

$pdf->Cell(0,0,utf8_decode('Firma de Aceptación del Cliente'),0,0,'C');
$pdf->Ln(10);

$pdf->Cell(0,0,utf8_decode('Atención a Clientes: Laura González'),0,0,'C');
unset($oConn);

$strHandler = $strOrderId . ".pdf";
$pdf->Output($strHandler,'F');

echo '<a href="' . $strHandler . '" target="_blank">' . $strHandler . '<a/>';

?>