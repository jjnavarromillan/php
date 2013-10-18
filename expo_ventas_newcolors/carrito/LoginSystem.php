<?php 
	class LoginSystem{
		function __construct(){
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");
		}
		function init(){
			
		}
		function existeUsuario($usuario,$passwd){
			$Pares=0;
			$sql2 = " select * from usuarios  where usuario='".mysql_real_escape_string($usuario)."' and passwd='".mysql_real_escape_string($passwd)."'";
			$mysqli =  new mysqli("localhost", "user_web","123454321", "newcolors_expo");
			$result2=$mysqli->query($sql2);
			$bandera=0;
			$num=0;
			$band=false;
			if($result2){
				if($rowdata=mysqli_fetch_object($result2)){
						$band=true;
				}
			}
			else
			{
				echo "No entro";
			}
			$mysqli->Close();
			return $band;
		}
		function existeUsuarioIdRelTipo($usuario,$passwd){
			$Pares=0;
			$idUsuario="";
			$idRelacion="";
			$tipoUsuario="";
			$sql2 = " select * from usuarios_web  where correo='$usuario' and passwd='$passwd'";
			$mysqli =  new mysqli("localhost", "user_web","123454321", "newcolors_expo");
			$result2=$mysqli->query($sql2);
			$bandera=0;
			$num=0;
			$band=false;
			$resu="false";
			$permisos="-1";
			if($result2){
				if($rowdata=mysqli_fetch_object($result2)){
					$idUsuario=$rowdata->idUsuarioWeb;
					$idRelacion=$rowdata->idRelacion;
					$tipoUsuario=$rowdata->tipoUsuario;
					$nombre = $rowdata->nombre;
					$sql3 = " select * from usuarios_permisos_web where idUsuario='$idUsuario'";
					$result3=$mysqli->query($sql3);
					if($result3){
						$permisos="";
						while($rowdata3=mysqli_fetch_object($result3)){
							$permisos.=$rowdata3->idOpcion . ",";	
						}
					}
					
					$resu="$idRelacion;$tipoUsuario;$idUsuario;$permisos;$nombre;";
				}
			}
			else
			{
				echo "false";
			}
			$mysqli->Close();
			$dato=$resu;
			return $dato;
		}
		function getUsuarioIdRelTipo($usuario){
			$Pares=0;
			$sql2 = " select * from usuarios_web  where idUsuarioWeb='$usuario'";
			$mysqli =  new mysqli("localhost", "user_web","123454321", "newcolors_expo");
			$result2=$mysqli->query($sql2);
			$bandera=0;
			$num=0;
			$band=false;
			$idRelacion="";
			$tipoUsuario="";
			$permisos="-1";
			$nombre="";
			$idUsuario="";
			if($result2){
				if($rowdata=mysqli_fetch_object($result2)){
					$idUsuario=$rowdata->idUsuarioWeb;
					$idRelacion=$rowdata->idRelacion;
					$nombre=$rowdata->nombre;
					$tipoUsuario =$rowdata->tipoUsuario;
					$sql3 = " select * from usuarios_permisos_web where idUsuario='$usuario'";
					$result3=$mysqli->query($sql3);
					if($result3){
						$permisos="";
						while($rowdata3=mysqli_fetch_object($result3)){
							$permisos.=$rowdata3->idOpcion . ",";	
						}
					}
				}
			}
			else
			{
				echo "false";
			}
			$mysqli->Close();
			$dato="$idRelacion;$tipoUsuario;$idUsuario;$permisos;$nombre;";
			return $dato;
		}
		function registraAccesoUsuario($usuario){
			
			$Pares=0;
			$sql2 = " insert into accessos (idUsuario,sessionId,fechaAcceso) values ($idUsuario,$sessionId,$fechaAcceso) ";
			$mysqli =  new mysqli("localhost", "user_web","123454321", "newcolors_expo");
			$result2=$mysqli->query($sql2);
			$mysqli->Close();
			return $Pares;
			
		}
		function createCookie($idUsuario){
			setcookie("usrsys", "$idUsuario");
		}
		function findCookie($idUsuario){
			$ban=false;
			if(isset($_SESSION['usrsys'])){
				$ban=true;
			}
			return true;
		}
		function deleteCookie(){
				setcookie("usrsys");
		}
		function conectarToDB($server,$user,$passwd,$database){
			$this->mysqli = new mysqli($server, $user, $passwd, $database);
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}	
		}
	}
	?>