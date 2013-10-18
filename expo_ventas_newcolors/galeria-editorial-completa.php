<?php 
	$idxPag=$_REQUEST['idx'];
?>
<link rel="stylesheet" type="text/css" href="css/galeria-editorial-completa.css">
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
#divNumInEditorial {
	position:absolute;
	width:15px;
	height:13px;
	z-index:12;
	left: 437px;
	top: 218px;
	background-color: #999999;
}
#divNumFiEditorial {
	position:absolute;
	width:15px;
	height:13px;
	z-index:13;
	left: 456px;
	top: 218px;
	background-color: #666666;
}

-->
</style>
</head>

<body>
<div id="divPrGaleriaEditorialCompleta" >
  <div id="divBotGaleriaAtrasEditorial" onClick="previewPagSiguemeEditorialComVista();"><a href="#"><img src="img/atras-galeria.jpg"  border="0"width="27" height="51" /></a></div>

<div  class="todasTipoBlanco"id="divNumFiEditorial">
  <div id="noPags" align="center">5</div>
</div>
<div  class="todasTipoBlanco"id="divNumInEditorial">
  <div id="avPag" align="center"><?php  echo "$idxPag"; ?></div>
</div>
<div id="divIconoTodasEditorial" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="img/todas-lasvistas-icono.jpg"  border="0" width="79" height="19" /></a></div>
<div  class="InfoPasarelaCompleta"id="divCerrarPasaEditorial"><a href="#">cerrar</a></div>
<div  class="InfoPasarelaCompleta"id="divLeTipoStudioEditorial"></div>
<div id="divXpasaEditorial" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" border="0" width="12" height="13" /></a></div>
<div id="divFotoGaleriaEditorial"><img src="img/siguenos/editorial/editorial-gd/evento-<?php  echo "$idxPag"; ?>.jpg" name="imgFotoGaleria" id="imgFotoGaleria" width="257" height="334"></div>
<div id="divBotGaleriaAdelanteEditorial" onClick="nextPagSiguemeEditorialComVista();"><a href="#"><img src="img/adelante-galeria.jpg"  border="0" width="27" height="51" /></a></div>
<img src="img/fondo-galeria-siguenos.jpg" width="711" height="346"> </div>
<p>&nbsp;</p>
</body>
</html>
