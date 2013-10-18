<?php 
	require_once("date_convert_class.php");
	date_default_timezone_set("Mexico/General");
	class mysession_cliente{
		var $idUsuario;
		var $sessionId;
		var $fechahora;
		var $datos;
		var $mysqli;
		var $no_visitas_expir=0;
		var $tiempoExpir=0;
		var $contador;
		function __construct(){
			$this->conectarToDB("192.168.1.5","user_web","123454321","dbnewcolors");
		}
		function init($idUsuario,$sessionId,$fechahora,$fechahoracad){
				
		}
		function validaCliente($usuario,$passwd,$sessionId){
			$sql="select * from clientes where usuario='$usuario' and passwd='$passwd'";
			$result=$this->mysqli->query($sql);
			$nombre="";
			if($result){
				$num=mysqli_num_rows($result);
				if($num>0)
				{	
					$rowdata=mysqli_fetch_object($result);
					$idCliente=$rowdata->idCliente;
					$nombre=$rowdata->nombre;
					$fechahora=date("d-m-Y H:i:s");
					$fechahoraCad=date("dmYHis");
					//function createSession($idUsuario,$sessionId,$fechahora,$fechahoracad)
					$this->createSession($idCliente,$sessionId,$fechahora,$fechahoraCad);
					
					
				}
			}	
			return $nombre;
		}
		function buscaSesionActiva($session_activa){
			$sql="select idUser,nombre,format(fecha_hora_ini_cad,'%y/%m/d') as fechaSession,format(fecha_hora_ini_cad,'%H:%i:%s') from sessiones,clientes where sessiones.idUser=clientes.idCliente  and sessionId='$session_activa'";
			$result=$this->mysqli->query($sql);
			$nombre="";
			if($result){
				$num=mysqli_num_rows($result);
				if($num>0)
				{	
					$rowdata=mysqli_fetch_object($result);
					$idCliente=$rowdata->idUser;
					$nombre=$rowdata->nombre;
					return $nombre;
				}
				else
				{
					return $nombre;
				}
			}
		}
		function iniciaSession($fechahora){
			$this->createSession($idUsuario,$sessionId,$fechahora,$fechahoracad);
			$this->cargarVariablesExpir($idUsuario);			
		}
		function getContador($idUsuario){
			$cont=0;
			$sql="select contador from clientes where idCliente=$idUsuario";
				$result=$this->mysqli->query($sql);
				if($result){
					$num=mysqli_num_rows($result);
					if($num>0)
					{	
						$rowdata=mysqli_fetch_object($result);
						$cont=$rowdata->contador;
					}
				}
			return $cont;
		}
		function isSessionExpired($idUsuario,$sessionId,$fecha_hora_actual){
			$sql="select fecha_hora_session_cad,DATE_FORMAT(fecha_hora_session_cad,'%Y') as anio,DATE_FORMAT(fecha_hora_session_cad,'%m') as mes,DATE_FORMAT(fecha_hora_session_cad,'%d') as dia,DATE_FORMAT(fecha_hora_session_cad,'%H') as horas,DATE_FORMAT(fecha_hora_session_cad,'%i') as minutos,DATE_FORMAT(fecha_hora_session_cad,%'s') as segundos from clientes where idCliente=$idUsuario ";
			$result=$this->mysqli->query($sql);
			
			if($result){
				$num=mysqli_num_rows($result);
				if($num>0){
					
					$rowdata=mysqli_fetch_object($result);
					$anio=$rowdata->anio;
					$mes=$rowdata->mes;
					$dia=$rowdata->dia;
					$hora=$rowdata->hora;
					$minutos=$rowdata->minutos;
					$segundos=$rowdata->segundos;
					
					$fecha = date("Y-m-d H:i:s",mktime($hora,$minutos,$segundos,$mes,$dia,$anio));
					
					
					
					$tiempo_expired = $rowdata->tiempoSessionMin;
					$no_visitas=$rowdata->noVisitas;
					
					if($tiempo_expired<>-1 && $no_visitas<>-1){
							
					}
					
				}
				
			}				
		}
		function cargarVariablesExpir($idUsuario){
				$sql="select tiempoSessionMin,noVisitas,contador from clientes where idCliente=$idUsuario";
				$result=$this->mysqli->query($sql);
				if($result){
					$num=mysqli_num_rows($result);
					if($num>0)
					{	
						$rowdata=mysqli_fetch_object($result);
						$this->no_visitas_expir=$rowdata->noVisitas;
						$this->tiempoExpir=$rowdata->tiempoSessionMin;
						
					}
				}
				/*echo $sql;
				echo "<br>Numero de visitas: ".$this->no_visitas_expir."<br>";
				echo "Tiempo de expiracion en minutos: ".$this->tiempoExpir."<br>";*/
		}
		function incrementaContadorVisitas($idUsuario){
			$sql="select contador from clientes where idCliente=$idUsuario";
				$result=$this->mysqli->query($sql);
				if($result){
					$num=mysqli_num_rows($result);
					if($num>0)
					{	
						$rowdata=mysqli_fetch_object($result);
						$this->contador=$rowdata->contador+1;
						$cont=$this->contador;
						
						$sql_upd="update clientes set contador=$cont where idCliente=$idUsuario ";
				
						$result_upd=$this->mysqli->query($sql_upd);
					}
				}
		}
		function createSession($idUsuario,$sessionId,$fechahora,$fechahoracad){
			$sql="select * from sessiones where idUser=$idUsuario and sessionId='$sessionId' ";
			$result=$this->mysqli->query($sql);
			
			if($result){
				$num=mysqli_num_rows($result);
				if($num>0){
					//update session	
					$sql_update="update sessiones set fecha_hora_ini='$fechahora',fecha_hora_ini_cad='$fechahoracad' where idUser=$idUsuario and sessionId='$sessionId' ";
					$result=$this->mysqli->query($sql_update);
					
				}
				else{
					$sql_insert="insert into sessiones (sessionId,idUser,fecha_hora_ini,fecha_hora_ini_cad,fecha_hora_fin,fecha_hora_fin_cad) values ('$sessionId','$idUsuario','$fechahora','$fechahora','$fechahora','$fechahoracad')";
					$result=$this->mysqli->query($sql_insert);
					$this->incrementaContadorVisitas($idUsuario);
					//echo "session creada satisfactoriamente";
				}
			}
		}
		function existSession($idUsuario,$sessionId){
			$sql="select * from sessiones where idUsuario=$idUsuario and sessionId='$sessionId' and status='cancelado'";
			$result=$this->mysqli->query($sql);
			if($result){
				return true;
			}
			else{
				return false;
			}
		}
		function deleteSession($idUsuario,$sessionId){
			$sql="update sessiones set status='cacelado' where idUsuario=$idUsuario and sessionId='$sessionId' ";
			$result=$this->mysqli->query($sql);
		}
		function setDataToSession($idUser,$sessionId,$data){
			$sql="update sessiones set data='$data' where idUsuario=$idUsuario and sessionId='$sessionId' ";
			$result=$this->mysqli->query($sql);			
		}
		function getDataSession($idUser,$sessionId){
			$sql="Select data from sessiones where idUsuario=$idUsuario and sessionId='$sessionId' ";
			$result=$this->mysqli->query($sql);		
			if($result){
				$rowdata=mysqli_fetch_object($result);
				$data=$rowdata->data;
			}
		}
		function updateSession($idUser,$sessionId,$fechaHora){
			$sql="update sessiones set fecha_hora_fin='$fechaHora' where idUsuario=$idUsuario and sessionId='$sessionId' ";
			$result=$this->mysqli->query($sql);			
		}
		function conectarToDB($server,$user,$passwd,$database){
			$this->mysqli = new mysqli($server, $user, $passwd, $database);

			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}	
		}
		
	}
	
	/*$fechahora=date("d-m-Y H:i:s");
	$fechahoraCad=date("dmYHis");
	$idUsuario=1;
	session_start(); 
	$sessionId=session_id();
	$datos="";
	$misession=new mysession_cliente($idUsuario,$sessionId,$fechahora,$fechahoraCad);
*/
?>