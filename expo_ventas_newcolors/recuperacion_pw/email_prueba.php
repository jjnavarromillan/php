<?php 


$destinatario="jjnavarromillan@hotmail.com";
$cuerpo="
	<a href='http://www.webtaller.com'>Ir a WebTaller</a>
";
$asunto = "Contacto "; 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: Formulario Contacto<ventas@navsystem.mx>\r\n Content-type: text/html\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);
//mail("jjnavarromillan@hotmail.com",$asunto,$cuerpo,$headers);

echo "Correo enviado satisfctoriamente";




?>