<?php
 $idCliente = $_REQUEST['idCliente'];
 $mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");  
 $mysqli->query("SET NAMES 'utf8'");

	$sql="SELECT detallistas_tiendas.idTienda, detallistas_tiendas.tienda, estados.estado, municipios.municipio, detallistas_tiendas.col, detallistas_tiendas.domicilio,detallistas_tiendas.idCliente
FROM (detallistas_tiendas INNER JOIN estados ON detallistas_tiendas.idEstado = estados.idEstado) INNER JOIN municipios ON (estados.idEstado = municipios.idEstado) AND (detallistas_tiendas.idMunicipio = municipios.idMunicipio) where detallistas_tiendas.idCliente=$idCliente ";

  if($result=$mysqli->query($sql)){
		
		
	

?>

<style type="text/css">
<!--
.format_gen {
	font-size:9px;
	font-family:Verdana, Geneva, sans-serif;
	
}
#divGridTiendasDivPrin {
	position:absolute;
	width:460px;
	height:114px;
	z-index:1;
	left: 2px;
	top: 4px;
}
#divGridTiendasLblEncabezadoCampos {
	position:absolute;
	width:448px;
	height:16px;
	z-index:1;
	left: 6px;
	background-color: #CCCCCC;
}
#divGridTiendasLblContenido {
	position:absolute;
	width:449px;
	height:83px;
	z-index:2;
	left: 5px;
	top: 16px;
	overflow: auto;
}
#divGridTiendasRow {
	position:relative;
	width:445px;
	height:16px;
	z-index:1;
	left: 1px;
	padding: -5px;
}
#divGridTiendasLblTienda {
	position:absolute;
	width:122px;
	height:13px;
	z-index:1;
	left: 60px;
	top: 0px;
}
#divGridTiendasLblEstado {
	position:absolute;
	width:101px;
	height:13px;
	z-index:2;
	left: 190px;
	top: 0px;
}
#divGridTiendasLblMunicipio {
	position:absolute;
	width:143px;
	height:12px;
	z-index:3;
	left: 300px;
	top: 0px;
}

#divGridTiendasLblIdTienda {
	position:absolute;
	width:54px;
	height:13px;
	z-index:4;
}
#divGridTiendasLblTiendaRow {
	position:absolute;
	width:138px;
	height:13px;
	z-index:1;
	left: 44px;
	top: 1px;
}
#divGridTiendasLblEstadoRow {
	position:absolute;
	width:101px;
	height:13px;
	z-index:2;
	left: 190px;
	top: 0px;
}
#divGridTiendasLblMunicipioRow {
	position:absolute;
	width:143px;
	height:12px;
	z-index:3;
	left: 300px;
	top: 0px;
}

#divGridTiendasLblIdTiendaRow {
	position:absolute;
	width:28px;
	height:16px;
	z-index:4;
}
-->
</style>
<div id="divGridTiendasDivPrin">
  <div id="divGridTiendasLblEncabezadoCampos">
    <div id="divGridTiendasLblTienda" class="format_gen">Tienda</div>
    <div id="divGridTiendasLblEstado" class="format_gen">Estado</div>
    <div id="divGridTiendasLblMunicipio" class="format_gen">Municipio</div>
    <div id="divGridTiendasLblIdTienda" class="format_gen">IdTienda</div>
  </div>
  <div id="divGridTiendasLblContenido">
  
  <?php
  
  		$cont=0;
		while($obj=$result->fetch_object()){
			$cont++;
			$idTienda=$obj->idTienda;
			$idCliente=$obj->idCliente;
			$tienda=$obj->tienda;
			$domicilio=$obj->domicilio;
			$col=$obj->col;		
			$municipio=$obj->municipio;
			$estado=$obj->estado;
			$backgr = "background-color: #FFFFFF";
			if(($cont % 2)!=0){
				$backgr = "background-color: #FCFCFC";
			}
  ?>
  
    <div id="divGridTiendasRow" style="<?php echo "$backgr"?>" onclick="getDatosTienda(<?php echo "$idTienda";?>)">
        <div id="divGridTiendasLblTiendaRow" class="format_gen"><?php echo "$tienda"?></div>
        <div id="divGridTiendasLblEstadoRow" class="format_gen"><?php echo "$estado";?></div>
      <div id="divGridTiendasLblMunicipioRow" class="format_gen"><?php echo "$municipio";?></div>
      <div id="divGridTiendasLblIdTiendaRow" class="format_gen"><?php echo "$idTienda";?></div>
    </div>
    
    <?php
		}
		}
	?>
  </div>
</div>
