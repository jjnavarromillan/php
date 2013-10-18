<?php 
	$idxPag = $_REQUEST['idx'];
?>
<link rel="stylesheet" type="text/css" href="css/galeria-pasarela-completa.css">

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
#apDiv1 {
	position:absolute;
	width:15px;
	height:13px;
	z-index:12;
	left: 418px;
	top: 204px;
	background-color: #999999;
}
#apDiv2 {
	position:absolute;
	width:15px;
	height:13px;
	z-index:13;
	left: 437px;
	top: 204px;
	background-color: #666666;
}

-->
</style>
</head>

<body>
<div id="divPrGaleriaPasaCompleta">
  <div id="divBotGaleriaAtras" onClick="previewPagSiguemeVista();"><a href="#"><img src="img/atras-galeria.jpg"  border="0"width="27" height="51" /></a></div>
  <div  class="todasTipoBlanco"id="divTipo2VistasGaleriaPasarela"><img src="img/tipo-2.jpg" width="114" height="14"></div>
<div id="divIconoTodasPasarela" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="img/todas-lasvistas-icono.jpg"  border="0" width="79" height="19" /></a></div>
<div  class="InfoPasarelaCompleta"id="divCerrarPasaGaleria"><a href="#">cerrar</a></div>
<div  class="leyendaPatrocinio" id="divAutorPasaGaleria">Fotografía cortesía IM Intermoda por Rafa Reynaga</div>
<div  class="InfoPasarelaCompleta"id="divLeTipoPasaGaleria"><img src="img/tipo-1.jpg" width="150" height="14"></div>
<div id="divXpasaGaleria" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" border="0" width="12" height="13" /></a></div>
<div id="divEdi55PasaGaleria"><img src="img/edicion-55.jpg" width="121" height="67" /></div>
<div id="divFotoGaleriaPasarela"><img id="imgFotoGaleriaPasarela" src="img/siguenos/pasarela/pasarela-gd/evento-<?php  echo "$idxPag"; ?>.jpg" width="223" height="335" /></div>
<div id="divBotGaleriaAdelante" onClick="nextPagSiguemeVista();"><a href="#"><img src="img/adelante-galeria.jpg"  border="0" width="27" height="51" /></a></div>
<img src="img/fondo-galeria-siguenos.jpg" width="703" height="346">
<div id="apDiv2">
  <div class="todasTipoBlanco" align="center">20</div>
</div>
<div id="apDiv1">
  <div  class="todasTipoBlanco" align="center">1</div>
</div>
</div>       

