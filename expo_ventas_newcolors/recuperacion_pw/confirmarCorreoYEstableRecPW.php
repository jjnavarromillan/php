<?php 
	require_once("../carrito/classes/date_convert_class.php");
	$correo= $_REQUEST['correo'];
	$mysqli= new mysqli("locahost","user_web","123454321","newcolors");    
    $mysqli->query("SET NAMES 'utf8'");
	date_default_timezone_set("Mexico/General");
	$fechahora=date("Y-m-d H:i:s");
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$sql="select * from usuarios_web where correo='$correo'";
	$idRecPwd="";
	
	$codigoDecodificador="";
	if($result=$mysqli->query($sql)){
		if($obj=$result->fetch_object()){
			$idUsuario=$obj->idUsuarioWeb;
			$nombreUsuario=$obj->nombre;
			$sqlInsertRec="insert into recuperar_passwd (idUsuarioWeb,fechaSolicitud) values ('$idUsuario','$fechahora')";
			$resultIns=$mysqli->query($sqlInsertRec);
			$sqlRecuperarId="select idRecPwd from recuperar_passwd where idUsuarioWeb='$idUsuario' and DATE_FORMAT(fechaSolicitud,'%Y-%m-%d %H:%i:%s')='$fechahora'";

			if($resultRecuperarId=$mysqli->query($sqlRecuperarId)){
				if($objRecperarId=$resultRecuperarId->fetch_object()){				
					$idRecPwd=$objRecperarId->idRecPwd;
					$codigoDecodificador = md5 ( $idRecPwd ); 
					$sqlUpd="update recuperar_passwd set codigoValidacion='$codigoDecodificador' where idRecPwd=$idRecPwd";
					$resultUpd=$mysqli->query($sqlUpd);
					
                    header("Location: http://www.newcolors.com.mx/email_recupera_rw.php?correoDestino={$correo}&codigoDecodificador={$codigoDecodificador}&nombreUsuario={$nombreUsuario}");

					
					
					
				}				
			}
		}
		else{
			?>
            <?php 
		}
	}
	else{
			?>
            <?php 
		}

?>
            
            
