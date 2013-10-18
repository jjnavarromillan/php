<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script language="JavaScript" type="text/javascript" src="js/codigo.js"></script>

<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:324px;
	top:59px;
	width:415px;
	height:223px;
	z-index:1;
}
-->
</style>
</head>

<body>
<script type="text/javascript">
		alert('Hola');
		llamarasincrono('getLineasMenu.php', 'apDiv1');
</script>
<select name="select" id="select" onchange="javascript:llamarasincrono('getLineasMenu.php', 'apDiv1');">
  <option value="1">1</option>
  <option value="2">2</option>
</select>
<a href="javascript:llamarasincrono('getLineasMenu.php', 'apDiv1')" style="color:#666">Referencia</a>
<div id="apDiv1"></div>
<p>&nbsp;</p>
</body>
</html>
