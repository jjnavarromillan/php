<?php 
	$idxPag=$_REQUEST['idx'];
?>
<link rel="stylesheet" type="text/css" href="css/galeria-location-completa.css">
<script language="javascript">
	
</script>
<style type="text/css">
<!--
a:link {
	color: #000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000;
}
a:hover {
	text-decoration: none;
	color: #666;
}
a:active {
	text-decoration: none;
}
#divNumInLocation {
	position:absolute;
	width:15px;
	height:13px;
	z-index:12;
	left: 470px;
	top: 214px;
	background-color: #999999;
}
#divNumFiLocation {
	position:absolute;
	width:15px;
	height:13px;
	z-index:13;
	left: 489px;
	top: 214px;
	background-color: #666666;
}
 
-->
</style>
</head>

<body>
<div id="divPrGaleriaLocationCompleta">
  <div id="divBotGaleriaAtrasLocation" onClick="previewPagSiguemeLocationComVista();"><a href="#"><img src="img/atras-galeria.jpg"  border="0"width="27" height="51" /></a></div>
<img src="img/fondo-galeria-siguenos.jpg" width="703" height="346" />
<div  class="todasTipoBlanco"id="divNumFiLocation">
  <div >
    <div align="center">20</div>
  </div>
</div>
<div  class="todasTipoBlanco" id="divNumInLocation">
  <div >
    <div align="center">1</div>
  </div>
</div>
<div  class="todasTipoBlanco"id="divTipo2VistasGaleriaLocation"><img src="img/2010.jpg" width="39" height="16" /></div>
<div id="divIconoTodaslocation" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="img/todas-lasvistas-icono.jpg"  border="0" width="79" height="19" /></a></div>
<div  class="InfoPasarelaCompleta"id="divCerrarLocationGaleria"><a href="#">cerrar</a></div>
<div  class="leyendaPatrocinio" id="divAutorLocationGaleria">Fotografía por Am Rock</div>
<div  class="InfoPasarelaCompleta"id="divLeTipoLocationGaleria"><img src="img/primavera-verano.jpg" width="117" height="16" /></div>
<div id="divXlocationGaleria" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" border="0" width="12" height="13" /></a></div>
<div id="divSesioLocationGaleria"><img src="img/sesion.jpg" width="93" height="39" /></div>
<div id="divFotoGaleriaLocation"><img id="imgFotoGaleriaLocation" src="img/siguenos/nacional/location/location-gd/evento-<?php  echo "$idxPag"; ?>.jpg" width="371" height="247" /></div>
<div id="divBotGaleriaAdelanteLocation" onClick="nextPagSiguemeLocationComVista();"><a href="#"><img src="img/adelante-galeria.jpg"  border="0" width="27" height="51" /></a></div>
</div>       
</body>
</html>
