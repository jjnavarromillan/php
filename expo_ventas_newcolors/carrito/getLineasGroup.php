<?php 

	$idPlantilla=$_REQUEST['idPlantilla'];
	$tipoCatalogo=$_REQUEST['tipoCatalogo'];
	require_once("carrito_class.php");
	$carrito=new carrito();
	$divLineas=$carrito->getLineasGroup($idPlantilla,$tipoCatalogo);
	echo "<select id='comboLineasFiltro' class='combitoMenCategoriasLineas' onchange=\"llena_combo_materiales(this.value,document.getElementById('comboPlantillas').value);llena_combo_colores(this.value,document.getElementById('comboPlantillas').value);llena_combo_estilo(this.value,document.getElementById('comboPlantillas').value);\">";
	echo "<option selected='selected' value='Todos'>LINEAS</option>";
	echo $divLineas;
	echo "</select>";
	
 ?>      



	

