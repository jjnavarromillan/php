<?php 

	$idPlantilla=$_REQUEST['idPlantilla'];
	$tipoCatalogo=$_REQUEST['tipoCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getEstilosGroup($idPlantilla,$tipoCatalogo);
	echo "<select id='comboGrupoEstilos' class='combitoMenCategoriasLineas' >";
	echo "<option selected='selected' value='Todos'>ESTILOS</option>";
	echo $divLineas;
	echo "</select>";
	
 ?>      



	

