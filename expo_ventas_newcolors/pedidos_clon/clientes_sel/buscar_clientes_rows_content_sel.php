<?php 

	$txtCriNombreBusCli = "";
	if(isset($_REQUEST['txtCriNombreBusCli'])){
		$txtCriNombreBusCli = " and Nombre like '%".$_REQUEST['txtCriNombreBusCli']."%'";
	}
	$txtCritTiendaBusCli = "";
	if(isset($_REQUEST['txtCritTiendaBusCli'])){
		$txtCritTiendaBusCli =  " and tienda like '%".$_REQUEST['txtCritTiendaBusCli']."%'";
	}
	$txtCritEsdtadoBusCli = "";
	if(isset($_REQUEST['txtCritEsdtadoBusCli'])){
		$txtCritEsdtadoBusCli =  " and estados.estado like '%".$_REQUEST['txtCritEsdtadoBusCli']."%'";
	}
	$txtCriMunicipio = "";
	if(isset($_REQUEST['txtCriMunicipio'])){
		$txtCriMunicipio =  " and municipios.municipio like '%".$_REQUEST['txtCriMunicipio']."%'";
	}
	$opcion = "";
	if(isset($_REQUEST['opcion'])){
		$opcion = $_REQUEST['opcion'];
	}
	
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	$idEstilo=""; //1
	$cons=0;
?>


<style type="text/css">
<!--
.formatoGenRows{
	font-family:Arial, Helvetica, sans-serif;
	font-size:8px;
	color:#000;
	font-weight:600;
	text-align:center;
}

.datosFormatoGenRows{
	font-family:Arial, Helvetica, sans-serif;
	font-size:8px;
	color:#666;
	text-align:center;
}

#divClientesBusquedaRows {
	position:relative;
	width:583px;
	height:24px;
	z-index:1;
	left: 0px;
	top: 3px;
}
#divClientesBusquedaRowsCons {
	position:absolute;
	width:32px;
	height:18px;
	z-index:1;
	top: 3px;
}
#divClientesBusquedaRowsNombre {
	position:absolute;
	width:159px;
	height:16px;
	z-index:2;
	left: 66px;
	top: 4px;
	text-align: center;
}
#divClientesBusquedaRowsTienda {
	position:absolute;
	width:118px;
	height:16px;
	z-index:3;
	left: 227px;
	top: 4px;
}
#divClientesBusquedaRowsEstado {
	position:absolute;
	width:112px;
	height:16px;
	z-index:4;
	left: 349px;
	top: 4px;
}
#divClientesBusquedaRowsMunicipio {
	position:absolute;
	width:103px;
	height:16px;
	z-index:5;
	left: 464px;
	top: 4px;
}
#divClientesBusquedaRowsIdTienda {
	position:absolute;
	width:40px;
	height:16px;
	z-index:6;
	left: 717px;
	top: 2px;
}
#divClientesBusquedaRowsCheck {
	position:absolute;
	width:24px;
	height:17px;
	z-index:6;
	left: 36px;
	top: 4px;
}
-->
</style>
<?php 
	$num=0;
	$sqlGetData = " SELECT detallistas_tiendas.idTienda, detallistas_clientes.nombre, detallistas_tiendas.tienda, estados.estado, municipios.municipio, detallistas_tiendas.idCliente
FROM detallistas_tiendas LEFT JOIN ((detallistas_clientes LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente where 1 $txtCriNombreBusCli $txtCritTiendaBusCli $txtCritEsdtadoBusCli $txtCriMunicipio order by detallistas_clientes.nombre";
//echo  $sqlGetData ;

	if($result_data=$mysqli->query($sqlGetData)){
	
		$num=mysqli_num_rows($result_data);
		$cons=0;
		for ($i=0;$i<$num;$i++){	  
				$cons++;
				$rowdata=mysqli_fetch_object($result_data);

				$nombre=$rowdata->nombre;
				$tienda=$rowdata->tienda;
				$estado=$rowdata->estado;
				$municipio=$rowdata->municipio;
				$idCliente=$rowdata->idCliente;
				$idTienda=$rowdata->idTienda;
				$colo="#FFFFFF";
				if(($cons % 2)==0){
					$colo="#ddd8ce";
				}
				

	?>
<a href="#" onclick="" ><div id="divClientesBusquedaRows" style="background-color:<?php  echo "$colo";?>"  >
  <div id="divClientesBusquedaRowsNombre" class="datosFormatoGenRows"><label id="lblClientesBusquedaNombre_<?php echo "$cons";?>"><?php  echo "$nombre"; ?></label></div>
  <div id="divClientesBusquedaRowsCons" class="formatoGenRows"><label id="lblClientesBusquedaCons"><?php  echo "$cons "; ?></label></div>
  <div id="divClientesBusquedaRowsTienda" class="datosFormatoGenRows"><label id="lblClientesBusquedaTienda_<?php echo "$cons";?>"><?php  echo "$tienda"; ?></label></div>
  <div id="divClientesBusquedaRowsMunicipio" class="datosFormatoGenRows"><label id="lblClientesBusquedaMunicipio"><?php  echo "$municipio"; ?></label></div>
  <div id="divClientesBusquedaRowsEstado" class="datosFormatoGenRows"><label id="lblClientesBusquedaEstado"><?php  echo "$estado"; ?></label></div>
  <div id="divClientesBusquedaRowsCheck">
    <label>
      <input type="checkbox" name="chk_tienda_<?php echo "$cons";?>" id="chk_tienda_<?php echo "$cons";?>" />
    </label>
    <label id="checkValue_<?php echo "$cons";?>" style="visibility:hidden"><?php echo "$idTienda";?></label>
  </div>
</div></a>
	<?php 
			}
	}
	
	?>
<label id="lblDatCons" style="visibility:hidden"><?php echo "$cons";?></label>