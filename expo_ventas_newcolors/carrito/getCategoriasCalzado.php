<?php 

	$idPlantilla=$_REQUEST['idPlantilla'];
	$tipoCatalogo=$_REQUEST['tipoCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getCategoriasCalzado($idPlantilla,$tipoCatalogo);
	echo "<select id='comboCatCalzado' class='combitoMenCategorias' style='display:none'>";
	echo "<option selected='selected' value='Todos'>CATEGORIA</option>";
	echo $divLineas;
	echo "</select>";


 ?>      



	

