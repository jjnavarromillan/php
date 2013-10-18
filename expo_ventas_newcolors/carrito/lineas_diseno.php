
<link rel="stylesheet" type="text/css" href="linea_diseno.css">
<div id="divPrinLiDise">
<div id="diSomLinDiseno"><img src="sistema_files/nback.gif" width="54" height="511" /></div>
<?php 
  	$idPlantilla= $_REQUEST['idPlantilla'];
  	$sqlGetData = " SELECT distinct(estilos.Linea) as lineas FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where idPlantilla=$idPlantilla ";

	$mysqli= new mysqli("locahost","user_web","123454321","newcolors");    
	
	$result=$mysqli->query($sqlGetData);
	$resultado_=" ";
	if($result){
		$num=mysqli_num_rows($result);
		for ($i=0;$i<$num;$i++)
		{	
			$rowdata=mysqli_fetch_object($result);
			$linea=$rowdata->lineas;
			?>
			  <a href="#"><div id="divSecLinDise">
				<div id="divTriLinDisen"><img src="img/tri.jpg" width="12" height="12" /></div>
				<div class="nomLineaD" id="divLineaLinDiseno" onclick="llamarasincrono('carrito/getEstilosLineas.php?linea=<?php  echo "$linea"; ?>&idPlantilla=<?php  echo "$idPlantilla"; ?>', 'cuadroEstilo')"><?php  echo "$linea"; ?></div>
			  </div>
              </a>
		<?php 
		}
	}	

	?>
		</div>