<?php 
	$idxPag=$_REQUEST['idx'];
?>
<link rel="stylesheet" type="text/css" href="css/galeria-studio-completa.css">
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
<div id="divPrGaleriaStudioCompleta">
  <div id="divBotGaleriaAtrasStudio" onClick="previewPagSiguemeStudioComVista();"><a href="#"><img src="img/atras-galeria.jpg"  border="0"width="27" height="51" /></a></div>
  <div id="divPriVeraStudio"><span class="todasTipoBlanco"><img src="img/primavera-verano.jpg" width="117" height="16" /></span></div>
  <div id="divFotoGaleriaStudio"><img src="img/siguenos/nacional/studio/studio-gd/evento-<?php  echo "$idxPag"; ?>.jpg" alt="" width="223" height="335" id="imgFotoGaleriaStudio" /></div>
  <img src="img/fondo-galeria-siguenos.jpg" width="703" height="346" />
  <div class="leyendaPatrocinio" id="divCreditosStudio">Fotografía por Am Rock</div>
<div id="div2milStudio"><img src="img/2010.jpg" width="39" height="16" /></div>
<div  class="todasTipoBlanco"id="divNumFiStudio">
  <div  id="noPagsStudio" align="center">10</div>
</div>
<div  class="todasTipoBlanco"id="divNumInStudio">
  <div id="avPagStudio" align="center"><?php  echo $idxPag; ?></div>
</div>
<div  class="todasTipoBlanco"id="divTipo2VistasGaleriaStudio"></div>
<div id="divIconoTodasStudio" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="img/todas-lasvistas-icono.jpg"  border="0" width="79" height="19" /></a></div>
<div  class="InfoPasarelaCompleta"id="divCerrarPasaStudio"><a href="#">cerrar</a></div>
<div  class="leyendaPatrocinio" id="divAutorPasaGaleria"></div>
<div  class="InfoPasarelaCompleta"id="divLeTipoStudioGaleria"><img src="img/sesion.jpg" width="93" height="39" /></div>
<div id="divXpasaStudio" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" border="0" width="12" height="13" /></a></div>
<div id="divEdiStudioGaleria"></div>
<div id="divFotoGaleriaPasarela"></div>
<div id="divBotGaleriaAdelanteStudio" ><a href="#" onClick="nextPagSiguemeStudioComVista();"><img src="img/adelante-galeria.jpg"  border="0" width="27" height="51" /></a></div>
</div>
<div  class="InfoPasarelaCompleta"id="divLeTipoStudioEditorial"></div>
</body>
</html>
