<?php 

	$idPlantilla=$_REQUEST['idPlantilla'];
	$tipoCatalogo=$_REQUEST['tipoCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getColoresGroup($idPlantilla,$tipoCatalogo);
	echo "<select id='comboColores' class='combitoMenCategoriasColores'>";
	echo "<option selected='selected' value='Todos'>COLOR</option>";
	echo $divLineas;
	echo "</select>";
	
 ?>      



	

