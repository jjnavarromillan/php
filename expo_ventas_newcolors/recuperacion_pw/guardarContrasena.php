<link rel="stylesheet" type="text/css" href="../css/guardarContrasena.css">



<?php 
	require_once("../carrito/classes/date_convert_class.php");
	$idUsuarioWeb=$_REQUEST['idUsuarioWeb'];
	$contrasena=$_REQUEST['passw'];
	$contrasenaConf=$_REQUEST['passwConf'];
	date_default_timezone_set("Mexico/General");
	$fechahora=date("Y-m-d H:i:s");
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	
	if($contrasena == $contrasenaConf && $contrasena!=""){
		$mysqli= new mysqli("locahost","user_web","123454321","newcolors");    
   		$mysqli->query("SET NAMES 'utf8'");
		
		$sqlRecPuedeUpd= "select * from recuperar_passwd where idUsuarioWeb=$idUsuarioWeb and fechaValidado is Null ";
		if($resultRecPuedeUpd=$mysqli->query($sqlRecPuedeUpd)){
			if($objRecUpd=$resultRecPuedeUpd->fetch_object()){
				$sql="select * from usuarios_web where idUsuarioWeb='$idUsuarioWeb'";
				if($result=$mysqli->query($sql)){
					if($obj=$result->fetch_object()){
						$idUsuario=$obj->idUsuarioWeb;
						$sqlUpd="update usuarios_web set passwd='$contrasena' where idUsuarioWeb='$idUsuario'";
						
						$resultUpd=$mysqli->query($sqlUpd);
						
						$sqlUpdValido = "update recuperar_passwd set fechaValidado='$fechahora' where idUsuarioWeb='$idUsuarioWeb' ";
						$resultUpdValido=$mysqli->query($sqlUpdValido);
						
						?>
                        
                        	<style type="text/css">
<!--
#divContraGuardarContra {
	position:absolute;
	width:231px;
	height:45px;
	z-index:1;
	left: 24px;
	top: 37px;
}
#divCerXguardarContra {
	position:absolute;
	width:12px;
	height:13px;
	z-index:2;
	left: 315px;
	top: 11px;
}
#divCerrarGuardarContra {
	position:absolute;
	width:29px;
	height:13px;
	z-index:3;
	left: 284px;
	top: 11px;
}
-->
                            </style>
<div  class="bienvCatalog" id="divRecuperacionPWGuardado">
  <div id="divContraGuardarContra"><img src="img/exitosamente.jpg" width="288" height="58" /></div>
</div>
                        
                        <?php 
					}
				}
						
			}
		}
		

		
	}
	else
	{
		echo "Contraseña incorrecta";	
	}

?>