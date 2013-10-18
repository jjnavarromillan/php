<?php 

	//registro de pedido

	$idEstilo = $_REQUEST['idEstilo'];
	$clvPaq = $_REQUEST['clvPaq'];
	
	$N2 = $_REQUEST['N2'];
	$N2m = $_REQUEST['N2m'];
	
	$N3 = $_REQUEST['N3'];
	$N3m = $_REQUEST['N3m'];
	
	$N4 = $_REQUEST['N4'];
	$N4m = $_REQUEST['N4m'];
	
	$N5 = $_REQUEST['N5'];
	$N5m = $_REQUEST['N5m'];
	
	$N6 = $_REQUEST['N6'];
	$N6m = $_REQUEST['N6m'];

	$Pares = $_REQUEST['Pares'];
	$Precio = $_REQUEST['Precio'];
	$Total = $_REQUEST['Total'];	

	$mysqli = new mysqli("localhost", "user_web","123454321", "newcolors_expo");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}	
	
			
	
			

?>