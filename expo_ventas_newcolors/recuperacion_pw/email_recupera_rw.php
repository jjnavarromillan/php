<?php 
	require_once("clases/date_convert_class.php");
	$destinatario=$_REQUEST['correoDestino'];
	$codigoDecodificador = $_REQUEST['codigoDecodificador'];
	$correoOrigen="new-colors-shoes@newcolors.com.mx";
	$asunto="Recuperacion de contraseña Sistema Newcolors Shoes";
	$nombreUsuario=$_REQUEST['nombreUsuario'];
	date_default_timezone_set("Mexico/General");
	$fechahora=date("Y-m-d H:i:s");
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$headers = "From: Formulario Newcolors Suport <new-colors-shoes@newcolors.com.mx>\r\n Content-type: text/html\r\n"; 

	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "From: Formulario Newcolors Suport <new-colors-shoes@newcolors.com.mx>\r\n Content-type: text/html\r\n"; 
	
	$cuerpo= "
	
		<div id='divEmailRecuperacionPW' style='position:absolute;	width:672px;	height:225px;	z-index:1;'><div style='position:absolute'><img src='http://201.120.55.76/sistema2011/img/img-email-fondo-recuperacion-blanco-t.jpg'></div><div style='position:absolute'>
		  <div  class='tipoWhiteEmail' id='divCodigoRecuperacionPW' style='position:absolute;	width:248px;	height:13px;	z-index:17;	top: 162px;	left: 13px;
			text-align: center;	color: #D6D6D6;font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'><a href='http://201.120.55.76/sistema2011/index.php?origenMenu=autenticaDistribuidores&cod=$codigoDecodificador'><strong>Confirma recuperacion de contrase&ntilde;a</strong></a></div>
		  <div class='tipoWhiteEmail' id='divParCorreoEsta' style='position:absolute;	width:143px;	height:13px;	z-index:2;	left: 11px;	top: 4px; font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'>Para:$destinatario;</div>
		  <div class='tipoWhiteEmail' id='divAsunCorreoEsta' style='position:absolute;	width:299px;	height:13px;	z-index:3;	left: 11px;	top: 17px;font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'>Asunto: Sus datos de recuperaci&oacute;n www.newcolorshoes.com.mx</div>
		<div class='tipoWhiteEmail' id='divFecCorreoEsta' style='position:absolute; width:304px; height:13px; z-index:4; left: 11px; top: 33px; font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#000;'>Fecha:$fechahora</div>
							  <div  class='tipoWhiteEmail'id='divDeCorreoEsta' style='position:absolute; width:200px; height:13px; z-index:5; left: 12px; top: 49px; font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#000;'>De:new-colors-shoes@hotmail.com</div>
		  <div id='divLogoNcCorreoEsta' style='position:absolute;	width:200px;	height:27px;	z-index:6;	left: 12px;	top: 69px; font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'><img src='http://201.120.55.76/sistema2011/img/logo-nc-email.png' width='224' height='27' /></div>
		  <div  class='tipoWhiteEmail' id='divEstiCorreoEsta' style='position:absolute;	width:262px;	height:13px;	z-index:16;	left: 11px;	top: 106px; font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'>Estimado Usuario: <label><strong>$nombreUsuario</strong></label>,</div>
		  <div  class='tipoWhiteEmail' id='divReciCorreoEsta' style='position:absolute;	width:630px;	height:13px;	z-index:15;	left: 11px;	top: 121px; font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'>Recientemente se presento una solicitud para restrablecer su contrase&ntilde;a para nuestra &aacute;rea de distribuidor. Si no lo ha solicitado, por favor ignore este mensaje.</div>
		  <div class='tipoWhiteEmail' id='divReeCorreoEsta' style='position:absolute;	width:522px;	height:13px;	z-index:14;	left: 11px;	top: 148px;font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'>Para restablecer su contrase&ntilde;a, por favor visite la siguiente URL:</div>
		  <div class='tipoWhiteEmail' id='divCuanCorreEstab' style='position:absolute;	width:392px;	height:13px;	z-index:18;	left: 11px;	top: 177px;font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'>Cuando usted visite el enlace anterior, una nueva contrase&ntilde;a le ser&aacute; enviada.</div>
		  <div class='tipoWhiteEmail' id='divSaludoCorreoEstablecer' style='position:absolute;	width:392px;	height:13px;	z-index:19;	left: 11px;	top: 191px; font-family:Arial, Helvetica, sans-serif;	font-size:10px;	color:#000;'>Saludos cordiales, seguimos a sus ordenes.</div>
							  <div class='tipoWhiteEmail'  id='divNCcorreoEstab' style='position:absolute; width:392px; height:13px; z-index:19; left: 10px; top: 207px; font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#000;'><strong>new colors shoes</strong> </div>
		</div></div>";
		
		mail($destinatario,$asunto,$cuerpo,$headers);
		echo "Correo enviado satisfactoriamente";
