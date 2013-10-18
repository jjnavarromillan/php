
<link rel="stylesheet" type="text/css" href="menu-categorias_nc.css" />
<link rel="stylesheet" type="text/css" href="carrito/menu-categorias_nc.css" />

<?php  
 
	

	$idPlantillaSel="";
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	$tipoCatalogo=$seccionCatalogo;
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");  
	$mysqli->query("SET NAMES 'utf8'");
	
	
	

?>	

<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:132px;
	height:17px;
	z-index:21;
	left: 256px;
	top: 38px;
}
#divEstacionLbl {
	position:absolute;
	width:51px;
	height:17px;
	z-index:22;
	top: 2px;
	left: -54px;
}
#apDiv2 {
	position:absolute;
	width:36px;
	height:14px;
	z-index:22;
	left: 561px;
	top: 38px;
}
#apDiv3 {
	position:absolute;
	width:27px;
	height:25px;
	z-index:23;
	left: 529px;
	top: 31px;
}
#divCarritoMasCategoriaTodoNC {
	position:absolute;
	width:34px;
	height:20px;
	z-index:24;
	left: 403px;
	top: 35px;
}
a:link {
	color: #999;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #999;
}
a:hover {
	text-decoration: none;
	color: #666;
}
a:active {
	text-decoration: none;
}
#divAgreMenuNC {
	position:absolute;
	width:79px;
	height:14px;
	z-index:25;
	left: 439px;
	top: 38px;
}
-->
</style>
<div id="divContMenCategorias">
  
  <div id="divComEstMenCategorias">
  
  
  <select class="combitoMenCategorias" name="comboPlantillas" id="comboPlantillas" onchange="cargarCombosFiltro(this.value);">
	
    
    <?php 
 	$cantEstilos=0;
  //plantilla de inventario real new colors
	  
	  $sqlGetData = "SELECT Count(inventario_lotes.idEstilo) AS Cant
FROM ((inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) LEFT JOIN catalogos_subcategorias ON estilos.idSubCat = catalogos_subcategorias.idSubCat  ";

	
 	$result=$mysqli->query($sqlGetData);
	$resultado_=" ";

	if($result){
		$num=mysqli_num_rows($result);
		$cons = 1;
			
			$rowdata = mysqli_fetch_object($result);
			$idPlantilla = -2; // -2 indica inventario newcolors
			$plantilla = "Inventario NC";
			$idPlantillaSel=$idPlantilla;
			$cantEstilos= $rowdata->Cant;
			
			?>
<option selected='selected' value='<?php  echo $idPlantilla; ?>'><?php  echo $plantilla; ?> - [<?php  echo $cantEstilos; ?>]</option>
			 <?php 
	
	
	//recorrer plantillas de muestras new colors
	
	$sqlGetData = "SELECT catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, Count(catalogo_estilos_plantilla.idEstilo) AS Cant, catalogos_plantilla.tipoCatalogo FROM catalogos_plantilla INNER JOIN catalogo_estilos_plantilla ON catalogos_plantilla.idPlantilla = catalogo_estilos_plantilla.idPlantilla where tipoCatalogo='Muestras'
GROUP BY catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, catalogos_plantilla.tipoCatalogo ";

	}
 	$result=$mysqli->query($sqlGetData);
	$resultado_=" ";

	if($result){
		$num=mysqli_num_rows($result);
		$cons = 1;
			
			for ($i=0;$i<$num;$i++)
		{	
			
			$rowdata = mysqli_fetch_object($result);
			$idPlantilla = $rowdata->idPlantilla;
			$plantilla = $rowdata->plantilla;
			if($i==0){
				$idPlantillaSel=$idPlantilla;
			?>
<option  value='<?php  echo $idPlantilla; ?>'><?php  echo $plantilla; ?> - [<?php  echo $rowdata->Cant; ?>]</option>
			 <?php 
			}
			 else
			 {
			 ?>
				<option  value='<?php  echo $idPlantilla; ?>'><?php  echo $plantilla; ?> - [<?php  echo $rowdata->Cant; ?>]</option>
			 <?php  
			 } 
		}
	}
	
	
	 ?>
    </select>
      <?php 
	  
	  ?>
		
  </div>
  <div id="divComTipMenCategorias">
    <label>
      <select  class="combitoMenCategoriasTipo-nc" name="comboCatCalzado" id="comboCatCalzado">
	      <option selected='selected' value='Todos'>TIPO</option>";
      <?php 
	
	  $sqlGetData="SELECT catalogos_categorias.categoria, Count(catalogos_categorias.categoria) AS Cant
FROM (inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
GROUP BY catalogos_categorias.categoria
HAVING (((Count(catalogos_categorias.categoria))>0))";


	$result2=$mysqli->query($sqlGetData);
	
	if($result2){
		$num=mysqli_num_rows($result2);
		$cons = 1;
		for ($i=0;$i<$num;$i++)
		{	
			
			$rowdata = mysqli_fetch_object($result2);

			$categoria = $rowdata->categoria;
			$Cant = $rowdata->Cant;
			if($i==0){
			?>
	         <option  value='<?php  echo $categoria; ?>'><?php  echo $categoria; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php 
			}
			 else
			 {
			 ?>
				<option  value='<?php  echo $categoria; ?>'><?php  echo $categoria; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php  
			 } 
		}
	}
	 ?>
        
      </select>
    </label>
  </div>
  <div id="divComMatMenCategorias">
    <label>
      <select  class="combitoMenCategoriasMateriales-nc" name="comboMateriales" id="comboMateriales">
	      <option selected='selected' value='Todos'>MATERIALES</option>";
      	 <?php 

		
	
                	$sql="SELECT estilos.material, Count(estilos.Material) AS Cant
FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id GROUP BY estilos.Material";
           

	$result3=$mysqli->query($sql);
	

	if($result3){
		$num=mysqli_num_rows($result3);
		$cons = 1;
		for ($i=0;$i<$num;$i++)
		{	
			
			$rowdata = mysqli_fetch_object($result3);
			//$idPlantilla = $rowdata->idPlantilla;
			$material = $rowdata->material;
			$Cant = $rowdata->Cant;
			if($i==0){
            ?>
	         <option  value='<?php  echo $material; ?>'><?php  echo $material; ?> - [<?php  echo $Cant; ?>]</option>";
             
			 <?php 
			}
			 else
			 {
			 ?>
				<option  value='<?php  echo $material; ?>'><?php  echo $material; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php  
			 } 
		}
	}
	 ?>
            
      </select>
    </label>
  </div>
  <div id="divComColMenColores">
    <label>
      <select   class="combitoMenCategoriasColores-nc" name="comboColores" id="comboColores">
      	<option selected='selected' value='Todos'>COLOR</option>";
      <?php 
	 
	
                $sql=" SELECT estilos.color, Count(estilos.Color) AS Cant
FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id
GROUP BY estilos.Color ";
	
	
	$result3=$mysqli->query($sql);
	

	if($result3){
		$num=mysqli_num_rows($result3);
		$cons = 1;
		for ($i=0;$i<$num;$i++)
		{	
			
			$rowdata = mysqli_fetch_object($result3);
			//$idPlantilla = $rowdata->idPlantilla;
			$color = $rowdata->color;
			$Cant = $rowdata->Cant;
			if($i==0){
            ?>
	         <option  value='<?php  echo $color; ?>'><?php  echo $color; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php 
			}
			 else
			 {
			 ?>
				<option  value='<?php  echo $color; ?>'><?php  echo $color; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php  
			 } 
		}
	}
	 ?>
      </select>
    </label>
  </div>
  <div id="divComLinMenCategorias">
    <label>
      <select  class="combitoMenCategoriasLineas-nc" name="comboLineasFiltro" id="comboLineasFiltro" onchange="llena_combo_materiales(this.value,document.getElementById('comboPlantillas').value);llena_combo_colores(this.value,document.getElementById('comboPlantillas').value);llena_combo_estilo(this.value,document.getElementById('comboPlantillas').value);">
      <option selected='selected' value='Todos'>LINEAS</option>";
       <?php 

		
       $sql=" SELECT estilos.linea, Count(estilos.Linea) AS Cant
FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id
GROUP BY estilos.Linea";

	$result3=$mysqli->query($sql);
	

	if($result3){
		$num=mysqli_num_rows($result3);
		$cons = 1;
		for ($i=0;$i<$num;$i++)
		{	
			
			$rowdata = mysqli_fetch_object($result3);
			//$idPlantilla = $rowdata->idPlantilla;
			$linea = $rowdata->linea;
			$Cant = $rowdata->Cant;
			if($i==0){
            ?>
	         <option  value='<?php  echo $linea; ?>'><?php  echo $linea; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php 
			}
			 else
			 {
			 ?>
				<option  value='<?php  echo $linea; ?>'><?php  echo $linea; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php  
			 } 
		}
	}
	 ?>
      </select>
    </label>
  </div>
  <div id="apDiv1" class="tipoMenPriCategorias"  >Cantidad de estilos: <label id="lblCantidadEstilosMostrados" ><?php  echo "$cantEstilos"; ?></label> </div>
  <div  class="TipoBlackCategorias" id="apDiv2"><a href="#" onclick="cargarEstilosTotal();">Buscar</a></div>
  <div id="apDiv3"><a href="#" onclick="cargarEstilosTotal();"><img src="img/lupita.png"  border="0" width="26" height="25" /></a></div>
  <div id="divCarritoMasCategoriaTodoNC"><a href="#"><img src="img/carrito-mas.jpg" border="0" width="32" height="19" /></a></div>
  <div  class="infoPrecio2" id="divAgreMenuNC"><a href="#" onClick="cargarDatosACarroSinClaves();">Agregar a Carro</a></div>
</div>

