<?php 

	//$idCategoria=$_REQUEST['idCategoria'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getCategoriasCatalogos();
	echo "<select id='comboCatCalzado' class='combitoMenCategorias' onchange='cargarLineas(this.value)'>";
		
	echo $divLineas;
	echo "</select>";


 ?>      



	

