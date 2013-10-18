<?php 

//registro de pedido

	$idDatCliFac = $_REQUEST['idDatCliFac'];
	$fechaPedido = $_REQUEST['fechaPedido'];
	$observacion = $_REQUEST['fechaPedido'];
	
	
	
	$mysqli = new mysqli("localhost", "user_web","123454321", "newcolors_expo");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}	
	
	$sql="insert into pedido (idDatCliFac,fechaPedido,observacion) values ($idDatCliFac,'$fechaPedido','$observacion')";
	
	$result=$mysqli->query($sql);
	
	sleep(1000);
	$sql2="select * from pedido where idDatCliFac=$idDatCliFac and fechaPedido='$fechaPedido' order by idPedido desc";
	$result2=$mysqli->query($sql2);
	
	
	if($result2){
		$num=mysqli_num_rows($result2);
		if($num>0)
		{	
			$rowdata = mysqli_fetch_object($result2);
			$idDatCliFac = $rowdata->idDatCliFac;
			$fechaPedido = $rowdata->fechaPedido;
			$observacion = $rowdata->observacion;
		}
	}	
		
	$mysqli->close();	
	
	
	
		
	
			
	
			

?>