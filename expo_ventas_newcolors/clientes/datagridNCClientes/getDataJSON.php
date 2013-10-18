	
	<?php     
		    require_once("JSON.php");
			$json = new Services_JSON;
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
			$mysqli->query("SET NAMES 'utf8'");   
			 
			$sqlGetData =  "select detallistas_clientes.idCliente,detallistas_clientes.nombre,estados.estado,municipios.municipio
from detallistas_clientes,estados,municipios
where estados.idEstado=detallistas_clientes.idEstado and municipios.idMunicipio=detallistas_clientes.idMunicipio order by detallistas_clientes.nombre ";
			if($result_data=$mysqli->query($sqlGetData)){
				
				$totEmp = mysqli_num_rows($result_data);
				 
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				echo $json->encode($data);
			}
	?>