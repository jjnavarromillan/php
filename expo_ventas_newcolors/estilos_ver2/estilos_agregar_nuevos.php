<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script type="text/javascript" src=".js/jquery/jquery.js"></script>
<script type="text/javascript" src="js/codigoJSON.js"></script>
<script language="javascript" src="js/codigo.js"></script>

<script language="javascript">

	
	function llena_combo(datosJSON,nameCombo,campoId,campoText){
	  borrar_combo(nameCombo);
      var combo = document.getElementById(nameCombo);

	  for (var n=0;n<datosJSON.length;n++){
		  
		  var option = document.createElement('option');

		  combo.options.add(option, n);
		  combo.options[n].value = eval("datosJSON[n]."+ campoId +"");
		  combo.options[n].innerHTML = eval("datosJSON[n]."+ campoText +"").toUpperCase();  
	  }
  	}
	function borrar_combo(nameCombo)
	{
	  var elSel = document.getElementById(nameCombo);
	  if(elSel){
		  if(elSel.length>0){
			  var n_ele = elSel.length-1;
			  for(v=n_ele;v>=0;v--){
				elSel.remove(v);		  
			  }
		  }
	  }
	}
	function llenar_categorias(){
		$.post("estilos_ver2/getDataJSON.php",
		   { },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo(objJSON2,"comboCategoria","idCatCat","categoria");
				var comboCategoria= document.getElementById("comboCategoria");
				if(comboCategoria.length>0){
					comboCategoria.selectedIndex=0;
					llenar_subcategorias(document.getElementById('comboCategoria').value);
				}
			}
		);	
	}
	function llenar_subcategorias(idCategoria){
		
		$.post("estilos_ver2/getDataJSONSubCategorias.php?idCategoria="+idCategoria,
		   { },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo(objJSON2,"comboSubcategoria","idSubCat","subcategoria");
				/*var comboPais= document.getElementById(nameComboPais);
				if(comboPais.length>0){
					comboPais.selectedIndex=0;
					llenar_estados(nameComboEstado,comboPais[0].value,nameComboMunicipio);
				}*/
			}
		);	
	}
	function llenar_plantillas(){
		$.post("estilos_ver2/getDataJSONPlantillas.php",
		   { },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo(objJSON2,"comboPlantillaCatalogo","idPlantilla","plantilla");
				var comboPlantillaCatalogo= document.getElementById("comboPlantillaCatalogo");
				if(comboPlantillaCatalogo.length>0){
					comboPlantillaCatalogo.selectedIndex=0;
					
				}
			}
		);	
	}
	function guardarCategorias(){
		if(document.getElementById('txtLinea').value!="" && document.getElementById('txtEstilo').value!="" && document.getElementById('txtMaterial').value!="" && document.getElementById('txtColor').value!=""  && document.getElementById('txtPrecio').value!="" ){ 
		if(confirm("¿Esta seguro de realizar registro?")){
				$.post("estilos_ver2/estilos_agregar_nuevos_guardar.php?linea="+document.getElementById('txtLinea').value+"&estilo="+document.getElementById('txtEstilo').value+"&material="+document.getElementById('txtMaterial').value+"&color="+document.getElementById('txtColor').value+"&precio="+document.getElementById('txtPrecio').value+"&descripcion="+document.getElementById('txtDescripcion').value+"&idCategoria="+document.getElementById('comboCategoria').value+"&idSubCat="+document.getElementById('comboSubcategoria').value+"&etiq_dis="+document.getElementById('txtEtiquetaDise').value+"&comboPlantillaCatalogo="+document.getElementById('comboPlantillaCatalogo').value,
				   { },
					function(data2){
						
						objJSON2= eval('(' + data2 + ')');
						
					}
				);	
				alert('Registro satisfactorio');
			}
			else{
				alert("Transaccion no registrada");	
			}
		}
		else{
			alert('Debe registrar todos los datos');
		}
	}
	llenar_categorias();
	llenar_plantillas();
</script>
<style type="text/css">
<!--
#divContenerAgreEstilos {
	position:absolute;
	width:395px;
	height:370px;
	z-index:1;
	left: 13px;
	top: 49px;
}
#divEstilosAgregarLblLinea {
	position:absolute;
	width:38px;
	height:16px;
	z-index:1;
	left: 10px;
	top: 15px;
}
#divEstilosAgregarContLinea {
	position:absolute;
	width:167px;
	height:18px;
	z-index:2;
	left: 77px;
	top: 14px;
}
#divEstilosAgregarlblEstilo {
	position:absolute;
	width:42px;
	height:16px;
	z-index:3;
	left: 10px;
	top: 43px;
}
#divEstilosAgregarEstiloCont {
	position:absolute;
	width:165px;
	height:18px;
	z-index:4;
	left: 77px;
	top: 43px;
}
#divEstilosAgregarLblMaterial {
	position:absolute;
	width:51px;
	height:16px;
	z-index:5;
	left: 10px;
	top: 72px;
}
#divEstilosAgregarLblMaterialCont {
	position:absolute;
	width:165px;
	height:18px;
	z-index:6;
	left: 77px;
	top: 72px;
}
#divEstilosAgregarLblColor {
	position:absolute;
	width:51px;
	height:16px;
	z-index:7;
	left: 10px;
	top: 101px;
}
#divEstilosAgregarlblColorCont {
	position:absolute;
	width:164px;
	height:18px;
	z-index:8;
	left: 77px;
	top: 101px;
}
#divEstilosAgregarLblPrecio {
	position:absolute;
	width:40px;
	height:16px;
	z-index:9;
	left: 10px;
	top: 130px;
}
#divEstilosAgregarLblPrecioCont {
	position:absolute;
	width:164px;
	height:18px;
	z-index:10;
	left: 77px;
	top: 130px;
}
#divEstilosAgregarlblCategoria {
	position:absolute;
	width:53px;
	height:16px;
	z-index:11;
	left: 10px;
	top: 159px;
}
#divEstilosAgregarlblCategoriaCont {
	position:absolute;
	width:165px;
	height:22px;
	z-index:12;
	left: 77px;
	top: 159px;
}
#divEstilosAgregarlblSubCat {
	position:absolute;
	width:54px;
	height:16px;
	z-index:13;
	left: 10px;
	top: 186px;
}
#divEstilosAgregarLblSubCatCont {
	position:absolute;
	width:166px;
	height:25px;
	z-index:14;
	left: 77px;
	top: 186px;
}
#divEstilosAgregarLblEtiqDis {
	position:absolute;
	width:81px;
	height:16px;
	z-index:15;
	left: 10px;
	top: 216px;
}
#divEstilosAgregarlblEtiqDisCont {
	position:absolute;
	width:106px;
	height:19px;
	z-index:16;
	left: 120px;
	top: 214px;
}
#apDiv18 {
	position:absolute;
	width:457px;
	height:27px;
	z-index:17;
	left: 280px;
	top: 13px;
}
#apDiv19 {
	position:absolute;
	width:458px;
	height:28px;
	z-index:18;
	left: 281px;
	top: 44px;
}
#apDiv20 {
	position:absolute;
	width:475px;
	height:25px;
	z-index:19;
	left: 265px;
	top: 76px;
}
#apDiv21 {
	position:absolute;
	width:476px;
	height:26px;
	z-index:20;
	left: 265px;
	top: 105px;
}
#apDiv22 {
	position:absolute;
	width:477px;
	height:24px;
	z-index:21;
	left: 265px;
	top: 134px;
}
#apDiv23 {
	position:absolute;
	width:477px;
	height:26px;
	z-index:22;
	left: 266px;
	top: 162px;
}
#apDiv24 {
	position:absolute;
	width:257px;
	height:292px;
	z-index:2;
	left: 759px;
	top: 47px;
}
#divEstilosAgregarTitulo {
	position:absolute;
	width:395px;
	height:30px;
	z-index:3;
	left: 12px;
	top: 8px;
	text-align: center;
	font-size: 24px;
}
#divEstilosAgregarlblPlantilla {
	position:absolute;
	width:94px;
	height:16px;
	z-index:23;
	left: 10px;
	top: 243px;
}
#divEstilosAgregarLblPlantillaCont {
	position:absolute;
	width:170px;
	height:22px;
	z-index:24;
	left: 120px;
	top: 243px;
}
#divEstilosAgregarBtnRegistrar {
	position:absolute;
	width:88px;
	height:26px;
	z-index:25;
	left: 309px;
	top: 327px;
	text-align: center;
}
#divEstilosAgregarlblDescripcion {
	position:absolute;
	width:69px;
	height:16px;
	z-index:4;
	left: 10px;
	top: 269px;
}
#divEstilosAgregarlblDescripcionContent {
	position:absolute;
	width:255px;
	height:50px;
	z-index:26;
	left: 120px;
	top: 270px;
}
/***css***/
.formatoGenAligLeft{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#000;
	font-weight:600;
	text-align:left;
}

.campoTextoBuscarClientes{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	text-align:left;
	height:16px;
}

-->
</style>
</head>
<body>
<div id="divContenerAgreEstilos">
  <div  class="formatoGenAligLeft"id="divEstilosAgregarLblLinea">Linea:</div>
  <div id="divEstilosAgregarContLinea">
    <label>
      <input name="txtLinea" type="text"  class="campoTextoBuscarClientes" id="txtLinea" size="59" />
    </label>
  </div>
  <div class="formatoGenAligLeft" id="divEstilosAgregarlblEstilo">Estilo:</div>
  <div id="divEstilosAgregarEstiloCont"><label>
      <input name="txtEstilo" type="text"  class="campoTextoBuscarClientes" id="txtEstilo" size="59" />
  </label></div>
  <div  class="formatoGenAligLeft"id="divEstilosAgregarLblMaterial">Material:</div>
  <div class="formatoGenAligLeft" id="divEstilosAgregarLblColor">Color:</div>
  <div id="divEstilosAgregarLblMaterialCont"><label>
      <input name="txtMaterial" type="text" class="campoTextoBuscarClientes" id="txtMaterial" size="59" />
  </label></div>
  <div id="divEstilosAgregarlblColorCont"><label>
    <input name="txtColor" type="text"  class="campoTextoBuscarClientes" id="txtColor" size="59" />
  </label>
  </div>
  <div class="formatoGenAligLeft" id="divEstilosAgregarLblPrecio">Precio:</div>
  <div id="divEstilosAgregarLblPrecioCont"><label>
      <input name="txtPrecio" type="text" class="campoTextoBuscarClientes" id="txtPrecio" size="59" />
  </label></div>
  <div class="formatoGenAligLeft" id="divEstilosAgregarlblCategoria">Categor&iacute;a:</div>
  <div id="divEstilosAgregarlblCategoriaCont">
    <select class="campoTextoBuscarClientes" name="comboCategoria" id="comboCategoria" onchange="llenar_subcategorias(document.getElementById('comboCategoria').value)">
    </select>
  </div>
  <div  class="formatoGenAligLeft"id="divEstilosAgregarlblSubCat">SubCateg:</div>
  <div id="divEstilosAgregarLblSubCatCont">
    <select  class="campoTextoBuscarClientes" name="comboSubcategoria" id="comboSubcategoria" >
    </select>
  </div>
  <div  class="formatoGenAligLeft"id="divEstilosAgregarLblEtiqDis">Etiqueta Diseño:</div>
  <div id="divEstilosAgregarlblEtiqDisCont"><label>
      <input class="campoTextoBuscarClientes" name="txtEtiquetaDise" type="text" id="txtEtiquetaDise" size="15" />
  </label></div>
  <div class="formatoGenAligLeft" id="divEstilosAgregarlblPlantilla">Incluir en plantilla:</div>
  <div id="divEstilosAgregarLblPlantillaCont">
    <label>
      <select  class="campoTextoBuscarClientes" name="comboPlantillaCatalogo" id="comboPlantillaCatalogo">
      </select>
    </label>
  </div>
  <a href="#" onclick="guardarCategorias();"><div id="divEstilosAgregarBtnRegistrar" ><img src="img/btn_registrar.jpg" width="80" height="26" /></div></a>
  <div  class="formatoGenAligLeft" id="divEstilosAgregarlblDescripcion">Descripci&oacute;n:</div>
  <div id="divEstilosAgregarlblDescripcionContent">
    <label>
      <input class="campoTextoBuscarClientes" name="txtDescripcion" type="text" id="txtDescripcion" size="50" />
    </label>
  </div>
</div>
</div>
</div>
</div>
<div id="divEstilosAgregarTitulo"><img src="img/titulo-barra.jpg" width="395" height="40" /></div>

</body>
</html>