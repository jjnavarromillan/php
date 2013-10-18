	
	<?php     
		    require_once("JSON.php");
			$json = new Services_JSON;
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
			$mysqli->query("SET NAMES 'utf8'");   
			 
			$sqlGetData =  "SELECT detallistas_clientes.idCliente, detallistas_clientes.nombre, detallistas_tiendas.tienda, estados.estado, municipios.municipio, detallistas_tiendas.idTienda
FROM ((detallistas_clientes INNER JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) INNER JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN detallistas_tiendas ON detallistas_clientes.idCliente = detallistas_tiendas.idCliente
ORDER BY detallistas_clientes.nombre, detallistas_tiendas.tienda";

			if($result_data=$mysqli->query($sqlGetData)){
				
				$totEmp = mysqli_num_rows($result_data);
				 
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				echo $json->encode($data);
			}
	?>