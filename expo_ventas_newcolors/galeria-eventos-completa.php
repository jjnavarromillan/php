<?php 
	$idxPag=$_REQUEST['idx'];
?>
<link rel="stylesheet" type="text/css" href="css/galeria-eventos-completa.css">
<script language="javascript">
	
</script>
<style type="text/css">
<!--


-->
</style>
</head>

<body>
<div id="divPrGaleriaEventosCompleta" >
  <div id="divBotGaleriaAtrasEventos" onClick="previewPagEventos();"><a href="#"><img src="img/atras-galeria.jpg"  border="0"width="27" height="51" /></a></div>

<div  class="todasTipoBlanco"id="divNumFiEditorial">
  <div id="noPags" align="center">4</div>
</div>
<div  class="todasTipoBlanco"id="divNumInEditorial">
  <div id="avPag" align="center"><?php  echo "$idxPag"; ?></div>
</div>
<div id="divIconoTodasEventos" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="img/todas-lasvistas-icono.jpg"  border="0" width="79" height="19" /></a></div>
<div  class="InfoPasarelaCompleta"id="divCerrarPasaEventos"><a href="#">cerrar</a></div>
<div  class="InfoPasarelaCompleta"id="divLeTipoStudioEditorial"></div>
<div id="divXpasaEventos" onClick="document.getElementById('divSiguenosPopup').style.visibility='hidden';"><a href="#"><img src="carrito/img/cerrar-zoom-x.jpg" border="0" width="12" height="13" /></a></div>
<div id="divFotoGaleriaEventos"><img src="img/siguenos/eventos/eventos-gd/evento-<?php  echo "$idxPag"; ?>.jpg" name="imgFotoGaleria" id="imgFotoGaleria" width="257" height="334"></div>
<div id="divBotGaleriaAdelanteEventos" onClick="nextPagEventos();"><a href="#"><img src="img/adelante-galeria.jpg"  border="0" width="27" height="51" /></a></div>
<img src="img/fondo-galeria-siguenos.jpg" width="711" height="346"> </div>
<p>&nbsp;</p>
</body>
</html>
