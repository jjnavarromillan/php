<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
.apDiv1 {
	position:absolute;
	width:230px;
	height:148px;
	z-index:1;
	left: 115px;
	top: 14px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#apDiv2 {
	position:absolute;
	width:78px;
	height:25px;
	z-index:2;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
-->
</style>
<script language="javascript" src="../js/jquery-ui-1.8.14.custom/js/jquery-1.5.1.min.js"></script>
<script language="javascript1.1">
	
		$(document).ready(function(){
	
			 $(window).resize(function(){
					$('.apDiv1').css({
							   position:'absolute',
							   left: ($(window).width() - $('.apDiv1').outerWidth())/2,
							   top: ($(window).height() - $('.apDiv1').outerHeight())/2
					});
			 });
			// Ejecutamos la función
//			$(window).resize();
		});
	function centrar(){
		$(window).resize();
	}
</script>
</head>

<body>
<div id="apDiv2" onclick="document.getElementById('apDiv1').style.height=(document.getElementById('apDiv1').style.height+300)+'px';centrar();">Agrandar</div>
<div id="apDiv1" class="apDiv1"></div>
</body>
</html>
