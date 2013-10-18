<?php 

	$idEstado=$_REQUEST['idEstado'];
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");  
	$mysqli->query("SET NAMES 'utf8'");
	
 	$sqlGetData = "select * from municipios where idEstado=$idEstado  ";
	
	$result=$mysqli->query($sqlGetData);
	$resultado_=" ";
	?>
   <label>
      <select class="combitoContactoDis" name="camboMunicipios" id="camboMunicipios">
    
    <?php 

	if($result){
		$num=mysqli_num_rows($result);
		$cons = 1;
		for ($i=0;$i<$num;$i++)
		{	
			
			$rowdata = mysqli_fetch_object($result);
			$idMunicipio = $rowdata->idMunicipio;
			$municipio = $rowdata->municipio;
			if($i==0){
				$idMunicipioaSel=$idMunicipio;
			?>
<option selected='selected' value='<?php  echo $idMunicipio; ?>'><?php  echo $municipio; ?> </option>
			 <?php 
			}
			 else
			 {
			 ?>
				<option  value='<?php  echo $idMunicipio; ?>'><?php  echo $municipio; ?></option>
			 <?php  
			 } 
		}
	}
	?>
        </select>
                </label>
	<?php 
	
 ?>      



	

