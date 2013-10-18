<?php 
	class carro_compras{
		function __construct(){
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");
		}
		function init(){
			
		}
		function addEstilo($idCliente , $idEstilo, $idClvPaq, $cant, $precio ){
			$buscado=$this->buscaEstiloEnCarro($idCliente,$idEstilo,$idClvPaq);
			
			$mysqli =  new mysqli("localhost", "user_web","123454321", "newcolors_expo");
				echo " buscado  =  $buscado  ---";

				echo " buscado encontrado";
	
				$sqlRecClvs="select * from clave_pedido where clave='$idClvPaq' ";
				
				$result=$mysqli->query($sqlRecClvs);
				if($result){
					$num=mysqli_num_rows($result);
					
					$dN2=0;
					$dN2m=0;
					$dN3=0;
					$dN3m=0;
					$dN4=0;
					$dN4m=0;
					$dN5=0;
					$dN5m=0;
					$dN6=0;
					$dN6m=0;
					$Pares=0;
					
					for ($i=0;$i<$num;$i++)
					{
						$rowdata=mysqli_fetch_object($result);
						
						$dN2=0;
						if($rowdata->N2!=""){
							$dN2=$rowdata->N2 * $cant;
						}
						$dN2m=0;
						if($rowdata->N2m!=""){
							$dN2m=$rowdata->N2m * $cant;
						}
 						$dN3=0;
						if($rowdata->N3!=""){
							$dN3=$rowdata->N3 * $cant;
						}
						$dN3m=0;
						if($rowdata->N3m!=""){
							$dN3m=$rowdata->N3m * $cant;
						}	
						
						$dN4=0;
						if($rowdata->N4!=""){
							$dN4=$rowdata->N4 * $cant;
						}
						$dN4m=0;
						if($rowdata->N4m!=""){
							$dN4m=$rowdata->N4m * $cant;
						}
						
						$dN5=0;
						if($rowdata->N5!=""){
							$dN5=$rowdata->N5 * $cant;
						}
						$dN5m=0;
						if($rowdata->N5m!=""){
							$dN5m=$rowdata->N5m * $cant;
						}
						
						$dN6=0;
						if($rowdata->N6!=""){
							$dN6=$rowdata->N6 * $cant;
						}
						$dN6m=0;
						if($rowdata->N6m!=""){
							$dN6m=$rowdata->N6m * $cant;
						}
						$Pares=$rowdata->pares * $cant;
											
					}
					
				}
				
				$sqlInsert="insert into carrito_cotizacion_detalle (idCliente,idEstilo,clave,cant,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,Pares,Precio) value ('$idCliente','$idEstilo','$idClvPaq','$cant','$dN2','$dN2m','$dN3','$dN3m','$dN4','$dN4m','$dN5','$dN5m','$dN6','$dN6m',$Pares,$precio)";
				echo "<br> $sqlInsert <br>";
				
				$resultInsert=$mysqli->query($sqlInsert);
				
			$mysqli->close();
				
			
		}
	
		function buscaEstiloEnCarro($idCliente , $idEstilo, $idClvPaq ){
			$Pares=0;
			$sql2 = " select * from carrito_cotizacion_detalle where idCliente=$idCliente and idEstilo=$idEstilo and clave='$idClvPaq' ";
			echo  "<BR>";
			echo "$sql2 ";
			sleep(1);
			$mysqli =  new mysqli("localhost", "user_web","123454321", "newcolors_expo");
			$result2=$mysqli->query($sql2);
			$bandera=0;
			$num=0;
			if($result2){
				
				echo "Si entro ";
				if($rowdata=mysqli_fetch_object($result2)){
					
						$Pares=1;
				}
			}
			else
			{
				echo "No entro";
				}
			$mysqli->Close();
			
			return $Pares;
				
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