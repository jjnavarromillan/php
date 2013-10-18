<?php 

	$idPlantilla=$_REQUEST['idPlantilla'];
	$tipoCatalogo=$_REQUEST['tipoCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getMaterialesGroup($idPlantilla,$tipoCatalogo);
	echo "<select id='comboMateriales' class='combitoMenCategoriasMateriales'>";
	echo "<option selected='selected' value='Todos'>MATERIAL</option>";
	echo $divLineas;
	echo "</select>";
	
 ?>      



	

