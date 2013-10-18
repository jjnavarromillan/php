<?php 

	require_once("JSON.php");
	$json = new Services_JSON;
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	 
	$sqlGetData =  "select * from tipos_clientes_venta order by tipo";
	if($result_data=$mysqli->query($sqlGetData)){
		
		$totEmp = mysqli_num_rows($result_data);
		 
		while ($rowEmp = mysqli_fetch_assoc($result_data)) {
			$data[] = $rowEmp;
		}
		echo $json->encode($data);
	}

?>