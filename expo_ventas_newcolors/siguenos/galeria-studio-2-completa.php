<?php 
	$idxPag=$_REQUEST['idx'];
?>
<link rel="stylesheet" type="text/css" href="css/galeria-studio-2-completa.css">
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

-->
</style>
</head>

<body>
<div id="divPrGaleriaLocationCompleta">
  <div id="divBotGaleriaAtrasStudio2" onClick="previewPagSiguemeStudio2ComVista();"><a href="#"><img src="img/atras-galeria.jpg"  border="0"width="27" height="51" /></a></div>
<img src="img/fondo-galeria-siguenos.jpg" width="703" height="346" />
<div  class="todasTipoBlanco"id="divTipo2VistasGaleriaLocation"><img src="img/2010.jpg" width="39" height="16" /></div>
<div id="divIconoTodasStudio2" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="img/todas-lasvistas-icono.jpg"  border="0" width="79" height="19" /></a></div>
<div  class="InfoPasarelaCompleta"id="divCerrarStudio2Galeria"><a href="#">cerrar</a></div>
<div  class="leyendaPatrocinio" id="divAutorLocationGaleria">Fotografía por Am Rock</div>
<div  class="InfoPasarelaCompleta"id="divLeTipoLocationGaleria"><img src="img/primavera-verano.jpg" width="117" height="16" /></div>
<div id="divXStudio2Galeria" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" border="0" width="12" height="13" /></a></div>
<div id="divSesioLocationGaleria"><img src="img/sesion.jpg" width="93" height="39" /></div>
<div id="divFotoGaleriaStudio2"><img id="imgFotoGaleriaStudio2" src="img/siguenos/nacional/studio/studio-gd/studio-h/evento-<?php  echo "$idxPag"; ?>.jpg" width="371" height="247" /></div>
<div id="divBotGaleriaAdelanteStudio2" onClick="nextPagSiguemeStudio2ComVista();"><a href="#"><img src="img/adelante-galeria.jpg"  border="0" width="27" height="51" /></a></div>
</div>       
</body>
</html>
