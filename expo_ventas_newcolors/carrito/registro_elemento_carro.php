
<?php 

	require_once("carrito_compras.php");
	$carrito=new carro_compras();


	if(isset($_REQUEST['idEstilo'])){
			
			$idCliente= $_REQUEST['idCliente'];
			$idEstilo = $_REQUEST['idEstilo'];
			$precio = $_REQUEST['precio'];
			$cants = $_REQUEST['cants'];
			$gran_total = $_REQUEST['gran_total'];
			$datosCarrito=$_REQUEST['datosCarro'];
			$arrayCarrito = split(']',$datosCarrito);
//strArrayCarro +"]"+clave+";"+cantidad+";"+N2+";"+N2m+";"+N3+";"+N3m+";"+N4+";"+N4m+";"+N5+";"+N5m+";"+N6+";"+N6m+";"+lblTotal_;
			for ($i=0;i<$cants;$i++){
				
				$arrayDatoCarro=split(';',$arrayCarrito[$i]);
				$clavePedido=$arrayDatoCarro[0];
				$cantidad=$arrayDatoCarro[1];
				$N2=$arrayDatoCarro[2];
				$N2m=$arrayDatoCarro[3];
				$N3=$arrayDatoCarro[4];
				$N3m=$arrayDatoCarro[5];
				$N4=$arrayDatoCarro[6];
				$N4m=$arrayDatoCarro[7];
				$N5=$arrayDatoCarro[8];
				$N5m=$arrayDatoCarro[9];
				$N6=$arrayDatoCarro[10];
				$N6m=$arrayDatoCarro[11];
				$lblTotal_=$arrayDatoCarro[12];
		
						
				
				
				
				$carrito->addEstilo($idCliente,$idEstilo,$claves[$i], $cans[$i],$precio);
				
			}
			$claves=$i-1;

			echo "gran_total $gran_total calves $claves";
		
	}
	else
		echo "No se recibio ningun parametro";
	//fin Carro compras*/
	?>