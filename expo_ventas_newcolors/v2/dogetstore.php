<?php
include('inc/classNC.inc');

$oDB = new MySQLDB();

$strOut = "";
$strOut .= '<option value="**">Seleccione Tienda ...</option>';
$strSql = "SELECT idTienda, tienda FROM detallistas_tiendas WHERE idCliente = " . $_POST['intClient'] . ";";
$rstData = mysql_query($strSql,$oDB->Connection);
if(mysql_num_rows($rstData)==0){
	$strOut .= '<option value="-1">-SIN TIENDA-</option>';
}else{
	while ($objData = mysql_fetch_array($rstData)){
		if(trim($objData['tienda']," ")==""){
			$strStore="-SIN TIENDA-";
		}else{
			$strStore=$objData['tienda'];
		};
		$strOut .= '<option value="' . $objData['idTienda'] . '_' . $strStore . '">' . $strStore . '</option>';
	};
};

unset($rstData);
unset($oConn);

echo $strOut;

?>