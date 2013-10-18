
<link rel="stylesheet" type="text/css" href="menu-categorias.css" />
<link rel="stylesheet" type="text/css" href="carrito/menu-categorias.css" />

<?php  

	

	$idPlantillaSel="";
	$seccionCatalogo=$_REQUEST['seccionCatalogo'];
	$tipoCatalogo=$seccionCatalogo;
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");  
	$mysqli->query("SET NAMES 'utf8'");
	
	
	

?>	

<style type="text/css">
<!--
#divCantCategorias {
	position:absolute;
	width:132px;
	height:17px;
	z-index:21;
	left: 256px;
	top: 38px;
}
#divEstacionLblnc {
	position:absolute;
	width:51px;
	height:14px;
	z-index:22;
	top: 33px;
	left: -3px;
}
#divLupaMenCa {
	position:absolute;
	width:27px;
	height:25px;
	z-index:800;
	left: 529px;
	top: 31px;
}
#divBuMenuCategorias {
	position:absolute;
	width:36px;
	height:14px;
	z-index:23;
	left: 561px;
	top: 38px;
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
#divCarritoMasCategoriaTodo {
	position:absolute;
	width:34px;
	height:20px;
	z-index:801;
	left: 403px;
	top: 35px;
}
#divACategorias {
	position:absolute;
	width:82px;
	height:17px;
	z-index:802;
	left: 437px;
	top: 35px;
}
#divAgreMenu {
	position:absolute;
	width:79px;
	height:14px;
	z-index:802;
	left: 439px;
	top: 38px;
}
#divIdEstilo {
	position:absolute;
	width:149px;
	height:27px;
	z-index:803;
	left: 5px;
	top: 34px;
}
#divBtnRegEstilo {
	position:absolute;
	width:28px;
	height:28px;
	z-index:804;
	left: 148px;
	top: 30px;
}
-->
</style>
<div id="divContMenCategorias">
  
  <div id="divComEstMenCategorias">
    <select class="combitoMenCategorias" name="comboPlantillas" id="comboPlantillas" onchange="cargarCombosFiltro(this.value);">
      
      <?php 
 
  if($seccionCatalogo=="Temporadas"){
	  $sqlGetData = "SELECT catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
FROM ((catalogos_plantilla INNER JOIN catalogo_estilos_plantilla ON catalogos_plantilla.idPlantilla = catalogo_estilos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogos_plantilla.tipoCatalogo)='Temporadas'))
GROUP BY catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla ";//where tipoCatalogo='Temporadas' ";
  }
 if($seccionCatalogo=="Distribuidores"){
	  $sqlGetData = "SELECT catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
FROM ((catalogos_plantilla INNER JOIN catalogo_estilos_plantilla ON catalogos_plantilla.idPlantilla = catalogo_estilos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogos_plantilla.tipoCatalogo)='Distribuidores'))
GROUP BY catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla ";//where tipoCatalogo='Temporadas' ";
  }
  if($seccionCatalogo=="Consumidores"){
	  $sqlGetData = "SELECT catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
FROM ((catalogos_plantilla INNER JOIN catalogo_estilos_plantilla ON catalogos_plantilla.idPlantilla = catalogo_estilos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogos_plantilla.tipoCatalogo)='Consumidores'))
GROUP BY catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla ";//where tipoCatalogo='Temporadas' ";
  }
  if($seccionCatalogo=="Programacion"){
	  $sqlGetData = "SELECT catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
FROM ((catalogos_plantilla INNER JOIN catalogo_estilos_plantilla ON catalogos_plantilla.idPlantilla = catalogo_estilos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogos_plantilla.tipoCatalogo)='Programacion'))
GROUP BY catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla ";//where tipoCatalogo='Temporadas' ";
  }
  if($seccionCatalogo=="Sugerencias"){
	  $sqlGetData = "SELECT catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
FROM ((catalogos_plantilla INNER JOIN catalogo_estilos_plantilla ON catalogos_plantilla.idPlantilla = catalogo_estilos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogos_plantilla.tipoCatalogo)='Sugerencias'))
GROUP BY catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla ";//where tipoCatalogo='Temporadas' ";
  }
	  if($seccionCatalogo=="Inventario"){
		  $sqlGetData = "SELECT catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
	FROM ((inventario_lotes_web INNER JOIN (catalogos_plantilla INNER JOIN catalogo_estilos_plantilla ON catalogos_plantilla.idPlantilla = catalogo_estilos_plantilla.idPlantilla) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
	WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario'))
	GROUP BY catalogos_plantilla.idPlantilla, catalogos_plantilla.plantilla  ";	
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
<option selected='selected' value='<?php  echo $idPlantilla; ?>'><?php  echo $plantilla; ?> - [<?php  echo $rowdata->Cant; ?>]</option>
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
   
      
      <select  class="combitoMenCategoriasTipo" name="comboGrupoEstilos" id="comboGrupoEstilos" >
	      <option selected='selected' value='Todos'>ESTILOS</option>";
      <?php 
	
	  
	  if($seccionCatalogo!="Inventario"){
            if($idPlantilla!=""){
                $sqlGetData="SELECT  estilos.estilo, Count(estilos.estilo) AS Cant
FROM catalogos_categorias INNER JOIN (catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON catalogos_categorias.idCatCat = estilos.idCategoria
WHERE (((catalogo_estilos_plantilla.idPlantilla)=$idPlantillaSel))
GROUP BY estilos.estilo";
		
                }
                else
                {
                   $sqlGetData="SELECT  estilos.estilo, Count(estilos.estilo) AS Cant
FROM catalogos_categorias INNER JOIN (catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON catalogos_categorias.idCatCat = estilos.idCategoria
GROUP BY estilos.Id, estilos.estilo";
                }
            }
            else{
            
            	if($idPlantilla!=""){
                    $sqlGetData=" SELECT  estilos.estilo, Count(estilos.estilo) AS Cant, catalogos_plantilla.tipoCatalogo FROM inventario_lotes_web INNER JOIN (((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario') AND ((catalogos_plantilla.idPlantilla)=$idPlantillaSel)) GROUP BY  estilos.estilo, catalogos_plantilla.tipoCatalogo ";
                }
                else
                {
                    $sqlGetData=" SELECT estilos.estilo, Count(estilos.estilo) AS Cant, catalogos_plantilla.tipoCatalogo FROM inventario_lotes_web INNER JOIN (((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario'))
GROUP BY  estilos.estilo, catalogos_plantilla.tipoCatalogo ";
                }
            
            }
			echo "$sqlGetData";
	$result2=$mysqli->query($sqlGetData);
	

	if($result2){
		$num=mysqli_num_rows($result2);
		$cons = 1;
		for ($i=0;$i<$num;$i++)
		{	
			
			$rowdata = mysqli_fetch_object($result2);
			//$idPlantilla = $rowdata->idPlantilla;
			$estilo = $rowdata->estilo;
			$Cant = $rowdata->Cant;
			if($i==0){
			?>
	         <option  value='<?php  echo $estilo; ?>'><?php  echo $estilo; ?> - [<?php  echo $Cant; ?>]</option>";
			 <?php 
			}
			 else
			 {
			 ?>
				<option  value='<?php  echo $estilo; ?>'><?php  echo $estilo; ?> - [<?php  echo $Cant; ?>]</option>";
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
      <select  class="combitoMenCategoriasMateriales" name="comboMateriales" id="comboMateriales">
	      <option selected='selected' value='Todos'>MATERIALES</option>";
      	 <?php 
	/*	 if($seccionCatalogo!="Inventario"){
			$sqlGetData = "SELECT estilos.Material AS material, Count(estilos.Id) AS Cant
FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where  idPlantilla='$idPlantillaSel' GROUP BY estilos.Material";
		 }
		 else{
			$sqlGetData = "SELECT estilos.Material AS material, Count(estilos.Id) AS Cant FROM estilos INNER JOIN inventario_lotes_web ON estilos.Id = inventario_lotes_web.idEstilo GROUP BY estilos.Material ORDER BY estilos.Material";	 
		}	*/
		
		if($tipoCatalogo!="Inventario"){
                $sql=" SELECT estilos.Material AS material, Count(estilos.Id) AS Cant
    FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where  idPlantilla='$idPlantillaSel' GROUP BY estilos.Material ";
			}
            else{
                if($idPlantillaSel!="Todo"){
                     $sql="SELECT estilos.Material AS material, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario') AND ((catalogos_plantilla.idPlantilla)=$idPlantilla))
        GROUP BY estilos.Material";
                }
                else{
                	$sql="SELECT estilos.Material AS material, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario'))
        GROUP BY estilos.Material";
                }
           	}

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
      <select  class="combitoMenCategoriasColores" name="comboColores" id="comboColores">
      	<option selected='selected' value='Todos'>COLORES</option>";
      <?php 
	  	/*if($seccionCatalogo!="Inventario"){
	        $sqlGetData = "SELECT estilos.color, Count(estilos.Id) AS Cant
FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where   idPlantilla='$idPlantillaSel' GROUP BY estilos.color
ORDER BY estilos.color";
		}	
		else{
				$sqlGetData = "SELECT estilos.Color AS color, Count(estilos.Id) AS Cant FROM estilos INNER JOIN inventario_lotes_web ON estilos.Id = inventario_lotes_web.idEstilo GROUP BY estilos.Color ORDER BY estilos.Color; ";
		}*/
	if($tipoCatalogo!="Inventario"){
                $sql=" SELECT estilos.Color AS color, Count(estilos.Id) AS Cant
    FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where  idPlantilla='$idPlantillaSel' GROUP BY estilos.color ";
			}
            else{
                if($idPlantillaSel!="Todo"){
                     $sql="SELECT estilos.Color AS color, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario') AND ((catalogos_plantilla.idPlantilla)=$idPlantilla))
        GROUP BY estilos.color";
                }
                else{
                	$sql="SELECT estilos.color AS color, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario'))
        GROUP BY estilos.color";
                }
           	}
	echo $sql;
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
      <select  class="combitoMenCategoriasLineas" name="comboLineasFiltro" id="comboLineasFiltro" onchange="llena_combo_materiales(this.value,document.getElementById('comboPlantillas').value);llena_combo_colores(this.value,document.getElementById('comboPlantillas').value);llena_combo_estilo(this.value,document.getElementById('comboPlantillas').value);">
      <option selected='selected' value='Todos'>LINEAS</option>";
       <?php 
	if($tipoCatalogo!="Inventario"){
                $sql=" SELECT estilos.linea AS linea, Count(estilos.Id) AS Cant
    FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where  idPlantilla='$idPlantillaSel' GROUP BY estilos.linea ";
			}
            else{
                if($idPlantilla!="Todo"){
                     $sql="SELECT estilos.linea AS linea, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario') AND ((catalogos_plantilla.idPlantilla)=$idPlantillaSel))
        GROUP BY estilos.linea";
                }
                else{
                	$sql="SELECT estilos.linea AS linea, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario'))
        GROUP BY estilos.linea";
		
                }
           	}
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
  <div id="divCantCategorias" class="tipoMenPriCategorias"  >Cantidad de estilos: <label id="lblCantidadEstilosMostrados" >0</label> </div>
  <div id="divLupaMenCa" ><a href="#" onclick="cargarEstilosTotal();"><img src="img/lupita.png" border="0" width="26" height="25" /></a></div>
  <div class="TipoBlackCategorias" id="divBuMenuCategorias"><a href="#" onclick="cargarEstilosTotal();">Buscar</a></div>
  <div id="divCarritoMasCategoriaTodo"><a href="#"><img src="img/carrito-mas.jpg"  border="0" width="32" height="19" /></a></div>
  <div  class="infoPrecio2" id="divAgreMenu"><a href="#" onClick="cargarDatosACarroSinClaves();"> Agregar a Carro</a></div>
  <div id="divIdEstilo">
    <label>
      <input type="text" name="txtIdEstilo" id="txtIdEstilo"  onkeypress="isEnterPressCodBarras(event);"/>
    </label>
  </div>
  <div id="divBtnRegEstilo" class="infoPrecio2" >
    <label>
      <input type="button" name="btnCodigo" id="btnCodigo" value=".."  onclick="cargarEstiloEnCarroTecleado();"/>
    </label>
  </div>
</div>         
