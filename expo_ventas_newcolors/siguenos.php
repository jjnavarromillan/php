
<script language="javascript" src="js/codigo.js"></script>
<script language="javascript" src="js/menu_siguenos_functions_nc.js"></script>


<link rel="stylesheet" type="text/css" href="css/siguenos.css">
<style type="text/css">
<!--
#divContenidoSiguenos {
	position:absolute;
	width:653px;
	height:351px;
	z-index:9;
	left: 124px;
	top: 123px;
}
#divSiguenosPopup {
	position:absolute;
	left:109px;
	top:138px;
	width:8px;
	height:337;
	z-index:2;
	visibility: hidden;
	border: thin solid #000;
}

-->
</style>

<div id="fondo-siguenos-principal">
  <div id="divBoCamNacional"><a href="#"><img src="menu/menu/imgMenuSiguenosCampanaNacional.png" name="imgMenuSiguenosCampanaNacional" width="100" height="16" border="0" id="imgMenuSiguenosCampanaNacional"  onclick="menuPrincipalClickSig('imgMenuSiguenosCampanaNacional','menu/menu/');llamarasincrono('galeria-studio.html','divContenidoSiguenos');"  /></a></div>
<img src="carrito/img/fondo-siguenos-1.jpg" width="900" height="480" />
<div id="divContenidoSiguenos"></div>
<div  class="botoTipoPrin"id="divSiguNacional" onclick="this.src='menu/menu/pasarela-1.png'; llamarasincrono('galeria-pasarela-2.html','divContenidoSiguenos');"></div>
<div id="divBotEventos"><a href="#"><img id="imgMenuSiguenosEventos" src="menu/menu/imgMenuSiguenosEventos.png" onclick="menuPrincipalClickSig('imgMenuSiguenosEventos','menu/menu/');llamarasincrono('galeria-eventos.html','divContenidoSiguenos');" border="0" width="43" height="16" /></a></div>
<div id="divBotPasarela"><a href="#"><img id="imgMenuSiguenosPasarela" src="menu/menu/imgMenuSiguenosPasarela.png" onclick="menuPrincipalClickSig('imgMenuSiguenosPasarela','menu/menu/');llamarasincrono('galeria-pasarela.html','divContenidoSiguenos');firsttPagSiguemeVista();"  border="0" width="43" height="16" /></a></div>
<div id="divBotEdito"><a href="#"><img id="imgMenuSiguenosEditoriales" src="menu/menu/imgMenuSiguenosEditoriales.png" onclick="menuPrincipalClickSig('imgMenuSiguenosEditoriales','menu/menu/');llamarasincrono('galeria-editorial.html','divContenidoSiguenos');ampliarDiv();"  border="0"  width="55" height="16" /></a></div>
</div>
<div id="divSiguenosPopup"></div>
