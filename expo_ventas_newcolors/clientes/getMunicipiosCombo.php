	Municipio
    <select name="comboRegMunicipio" id="comboRegMunicipio">
      <option value="-1">Seleccione municipio</option>
		<?php 
            $idEstado=$_REQUEST['idEstado'];
            $municipio=$_REQUEST['municipio'];
            $mysqli= new mysqli("locahost","user_web","123454321","newcolors"); 
			$mysqli->query("SET NAMES 'utf8'");
            $sql2= "SELECT * FROM municipios where idEstado='$idEstado' ";
            if($result2=$mysqli->query($sql2)){
            while($obj2=$result2->fetch_object()){
                if($obj2->municipio==$municipio){
                    ?>
                    <option value="<?php  echo $obj2->idMunicipio; ?>" selected="selected"><?php  echo $obj2->municipio; ?></option>
                   <?php 	
                }
                else
                {
                    ?>
                    <option value="<?php  echo $obj2->idMunicipio; ?>"><?php  echo $obj2->municipio; ?></option>
                   <?php 	
                }
               }
              }
           ?>
	</select>