	
	<?php     
			$idPlantilla=$_REQUEST['idPlantilla'];
			$linea = $_REQUEST['linea'];
			$strlinea="";
			if($linea!="Todos"){
				$strlinea = "and estilos.Linea='$linea'";	
			}
		    require_once("JSON.php");
			$json = new Services_JSON;
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
			$mysqli->query("SET NAMES 'utf8'");   
			 
			$sqlGetData =  "SELECT estilos.estilo
FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo
WHERE 1 $strlinea and  catalogo_estilos_plantilla.idPlantilla=$idPlantilla
GROUP BY estilos.estilo, catalogo_estilos_plantilla.idPlantilla ";
			if($result_data=$mysqli->query($sqlGetData)){
				
				$totEmp = mysqli_num_rows($result_data);
				 
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				echo $json->encode($data);
			}
	?>