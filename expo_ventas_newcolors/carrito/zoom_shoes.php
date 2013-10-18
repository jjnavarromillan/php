<?php 

	

    $estilo = $_REQUEST['estilo'];
    $material = $_REQUEST['material'];
    $color = $_REQUEST['color'];
	$precio= $_REQUEST['precio'];
	
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

    

?>
<link rel="stylesheet" type="text/css" href="zoom_shoes.css">
<link rel="stylesheet" type="text/css" href="carrito/zoom_shoes.css">



<style type="text/css">
<!--

-->
</style>
<div id="divPriNZoom">


  <div id="divImgExZoom"><img src="imageresize.php?urlsource=../imagenes_system/muestras/400/<?php echo $foto; ?>&urldestyni=../imagenes_system/muestras/400/<?php echo $foto; ?> &width=400&height=400&quality=100&urlerror=../imagenes_system/muestras/sinfoto.gif" width="400" height="400" />
    <div  class="lineaDetalle" id="divColZoomSh">Color</div>
<div id="divLinZooShoes"><img src="source/linea-vista-detalle.jpg" width="420" height="2" /></div>
  </div>
  <div  class="tituloPrincialDetalle" id="divLinZoom"><?php  echo $estilo; ?></div>
  <div  class="tituloPrincialDetalle" id="divMatZoom"><?php  echo "$material $color"; ?></div>
  <div  class="precioZoom" id="divPreZoom">Precio $<?php  echo $precio; ?></div>
  <div id="divCerrarZoom"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" width="12" height="13" border="0" onclick="document.getElementById('divFotoZoom').style.visibility='hidden';document.getElementById('divFotoZoom').innerHTML='';" /></a></div>
  <div  class="lineaDetalle" id="DivEsZoShoFiL20">Estilo</div>
<div  class="precioZoom" onclick="document.getElementById('divFotoZoom').style.visibility='hidden';document.getElementById('divFotoZoom').innerHTML='';" id="divLetCerrar">cerrar</div>
</div>        

