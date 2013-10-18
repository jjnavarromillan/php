  <?php  
  	$idPlantilla = $_GET['idPlantilla'];
	$idEstilo = $_GET['idEstilo'];
	$estilo = $_GET['estilo'];
    $material = $_GET['material'];
    $color = $_GET['color'];
	$precio = $_GET['precio'];
	$seccionCatalogo = $_GET['seccionCatalogo'];
	?>

<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
#divIconoSecDetalle {
	position:absolute;
	width:17px;
	height:15px;
	z-index:12;
	left: 532px;
	top: 7px;
}
.tituloPrincialDetalle{
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	color:#666;
}

.lineaDetalle{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#999;
}

.precioDetalle{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#666;
	visibility: hidden;
}

.selecionDetalle{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#333;
}

.nomEstiloDetalle{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#F90;
	font-weight:bold;
}

.descripcionDetalle{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#999;
}

.ofertasDetalle{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:11px;
	color:#039;
	font-weight:bold;
}
#divPrinDetalle   {
	position:absolute;
	width:554px;
	height:299px;
	z-index:1;
	left: 6px;
	top: 2px;
	border: thin solid #999;
}
#divLinea2Detalle {
	position:absolute;
	width:515px;
	height:5px;
	z-index:1;
	top: 27px;
	left: 10px;
}
#divGdDetalle {
	position:absolute;
	width:228px;
	height:21px;
	z-index:2;
	left: 303px;
	top: 20px;
}
#divLineaDetalle {
	position:absolute;
	width:32px;
	height:14px;
	z-index:1;
	top: 8px;
}
#divNumDetalle {
	position:absolute;
	width:159px;
	height:16px;
	z-index:2;
	left: 38px;
	top: 4px;
}
#divIMG_Detalles {
	position:absolute;
	width:280px;
	height:280px;
	z-index:3;
	left: 5px;
	top: 5px;
}
#divNombreDetalle {
	position:absolute;
	width:419px;
	height:17px;
	z-index:4;
	top: 37px;
	left: 10px;
	text-align: left;
	visibility: hidden;
}
#divCostoDetalle {
	position:absolute;
	width:33px;
	height:13px;
	z-index:5;
	top: 29px;
	left: 11px;
}
#divDescriDetalles {
	position:absolute;
	width:218px;
	height:16px;
	z-index:6;
	top: 66px;
	left: 44px;
}
#divSelecDetalles2 {
	position:absolute;
	width:236px;
	height:16px;
	z-index:7;
	left: 275px;
	top: 86px;
}
#divNomCostDetalle {
	position:absolute;
	width:222px;
	height:16px;
	z-index:8;
	left: 303px;
	top: 67px;
	text-align:left;
}
#divGrupDetalles {
	position:absolute;
	width:245px;
	height:213px;
	z-index:9;
	left: 299px;
	top: 89px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	text-align: left;
}
#divMat1Detalles {
	position:absolute;
	width:60px;
	height:32px;
	z-index:1;
}
#divMat2Detalles {
	position:absolute;
	width:60px;
	height:32px;
	z-index:2;
	top: 0px;
	left: 69px;
}
#divMat3Detalles {
	position:absolute;
	width:60px;
	height:32px;
	z-index:3;
	top: 0px;
	left: 142px;
}
#divMat4Detalles {
	position:absolute;
	width:60px;
	height:32px;
	z-index:4;
	top: 37px;
}
#divMat5Detalles {
	position:absolute;
	width:60px;
	height:32px;
	z-index:5;
	top: 37px;
	left: 69px;
}
#divMat6Detalles {
	position:absolute;
	width:60px;
	height:32px;
	z-index:6;
	top: 37px;
	left: 142px;
}
a:link {
	color: #333;
}
a:hover {
	color: #666;
	text-align: left;
}
#divLinDescoDetalle {
	position:absolute;
	width:218px;
	height:7px;
	z-index:10;
	left: 8px;
	top: 49px;
}
#divLinDesco1Detalle {
	position:absolute;
	width:218px;
	height:7px;
	z-index:11;
	left: 4px;
	top: 9px;
}
#divCheckDetalles {
	position:absolute;
	width:83px;
	height:20px;
	z-index:12;
	left: 4px;
	top: 32px;
}
#divAddDetalles {
	position:absolute;
	width:84px;
	height:21px;
	z-index:13;
	left: 144px;
	top: 60px;
}
#divContiDetalles {
	position:absolute;
	width:125px;
	height:21px;
	z-index:14;
	left: 3px;
	top: 60px;
}
#divLinDesco22Detalle {
	position:absolute;
	width:218px;
	height:7px;
	z-index:15;
	left: 1px;
	top: 181px;
}
#divMini2Detalles {
	position:absolute;
	width:48px;
	height:48px;
	z-index:16;
	left: 57px;
	top: 95px;
}
#divMini3Detalles {
	position:absolute;
	width:48px;
	height:48;
	z-index:17;
	left: 382px;
	top: 455px;
}
#divMini1Detalles {
	position:absolute;
	width:48px;
	height:48px;
	z-index:18;
	top: 96px;
	left: 5px;
}
#divPro1Detalles {
	position:absolute;
	width:171px;
	height:16px;
	z-index:19;
	left: 62px;
	top: 112px;
}
#divPro2Detalles {
	position:absolute;
	width:155px;
	height:16px;
	z-index:20;
	top: 95px;
	left: 78px;
}
#divPro3Detalles {
	position:absolute;
	width:193px;
	height:16px;
	z-index:21;
	left: 448px;
	top: 467px;
}
.blancoEncabezado{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9px;
	color:#FFF;
	font-weight:bold;
}
.abcd {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #666;
	font-weight:bold;
}	

.numerosPedido{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
}
#divDetalleOptions {
	position:absolute;
	width:254px;
	height:251px;
	z-index:1;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#divTableGrisDeInventario {
	position:absolute;
	width:235px;
	height:17px;
	z-index:16;
	top: 45px;
	left: -1px;
}
#divtableMultiDeInventario {
	position:absolute;
	width:232px;
	height:54px;
	z-index:17;
	top: 48px;
	left: 2px;
}
#divInveDeInventario {
	position:absolute;
	width:68px;
	height:14px;
	z-index:18;
	top: 23px;
	left: 4px;
}
#divLinDesco4Detalle {
	position:absolute;
	width:218px;
	height:7px;
	z-index:21;
	top: 87px;
	left: 4px;
}
#divDetalleOptions {
	position:absolute;
	width:240px;
	height:150px;
	z-index:1;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	left: 1px;
	top: 61px;
}
.combito{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	
}

#divBarriTabDeInventario {
	position:absolute;
	width:208px;
	height:15px;
	z-index:21;
	left: -3px;
	top: 192px;
}
#divVarNumDeInventario {
	position:absolute;
	width:201px;
	height:43px;
	z-index:22;
	left: 1px;
	top: 189px;
}

#divSeleccionaDeInventario {
	position:absolute;
	width:72px;
	height:14px;
	z-index:19;
	left: 4px;
	top: 127px;
}
#divPaqCanDeInventario {
	position:absolute;
	width:101px;
	height:48px;
	z-index:1;
	top: 145px;
	left: 4px;
}
#divLinDesco5Detalle {
	position:absolute;
	width:218px;
	height:7px;
	z-index:23;
	top: 112px;
	left: 4px;
}
#divSelec22Detalles {
	position:absolute;
	width:215px;
	height:16px;
	z-index:11;
	left: 305px;
	top: 90px;
}

.regresarOpcion{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
	
}

#divMatColo {
	position:absolute;
	width:244px;
	height:16px;
	z-index:11;
	left: 303px;
	top: 51px;
	text-align: left;
}
#idvVisDetDiseAtras   {
	position:absolute;
	width:30px;
	height:13px;
	z-index:2;
	top: 10px;
	left: 504px;
}

-->
</style>
<div id="divPrinDetalle">
  <div id="divGdDetalle">
    <div class="lineaDetalle"id="divLineaDetalle">Estilo</div>
    <div  align="left" class="tituloPrincialDetalle" id="divNumDetalle"><?php  echo " $estilo"; ?></div>
  </div>
  <div id="divIMG_Detalles">
  
  <?php 
  
						$prenombreFoto="{$estilo}";
						$nombreFoto="$estilo $material $color";
						$tam = strlen($nombreFoto);
						$res = "";
			
						for ($r=0;$r<$tam;$r++){
							$car = $nombreFoto[$r];
							if ($car == ' ')
								$car = '-';
							if ($car == 'Ñ')
								$car = 'N';
							if ($car == 'ñ') 
								$car = 'n';
							$res = $res . $car;
						}
						
						$foto="{$res}.gif";
					
				
  //imageresize.php?urlsource=../imagenes_system/muestras/400/$foto&urldestyni=../imagenes_system/muestras/mediano/$foto &width=203&height=203&quality=100&urlerror=../imagenes_system/muestras/sinfoto.gif
  ?>

  
  <img src="imageresize.php?urlsource=../imagenes_system/muestras/400/<?php  echo $foto; ?>&urldestyni=../imagenes_system/muestras/mediano/<?php  echo $foto; ?> &width=280&height=280&quality=100&urlerror=../imagenes_system/muestras/sinfoto.gif" width="280" height="280" />
  
  </div>
  <label id="idEstiloSelDetalle" style="display:none"><?php  echo " $idEstilo"; ?></label>
  <div class="tituloPrincialDetalle" id="divNombreDetalle"><strong><?php  echo " $material $color"; ?></strong></div>
  <div class="precioDetalle" id="divCostoDetalle">$<label id="precioEstiloDetalle"><?php  echo "$precio"; ?></label></div>
  <div class="descripcionDetalle" id="divDescriDetalles">.</div>
  <div class="nomEstiloDetalle" id="divNomCostDetalle"><?php  echo " $material $color"; ?> $ <?php  echo "$precio"; ?></div>
  <div id="divGrupDetalles">
  <table width="198" border="0">
  	  <tr>
        <th width="66" scope="col"></th>
        <th width="66" scope="col"></th>
        <th width="66" scope="col"></th>
      </tr>
	  <tr>
       
	  <?php  
	$idEstilo = $_GET['idEstilo'];
	$estilo = $_GET['estilo'];
    $material = $_GET['material'];
    $color = $_GET['color'];
    
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");     
	$mysqli->query("SET NAMES 'utf8'");
	
	if($seccionCatalogo!="Inventario"){
		$sql="SELECT estilos.Id,estilos.Linea,estilos.Estilo,estilos.Material,estilos.Color,estilos.Precio 
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.estilo='$estilo' and catalogo_estilos_plantilla.idPlantilla=$idPlantilla  order by estilo";
	}
	else
	{
		$sql="SELECT estilos.Id,estilos.Linea,estilos.Estilo,estilos.Material,estilos.Color,estilos.Precio 
FROM inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id where estilos.estilo='$estilo'  order by estilo";	
	}
    //$sql= "select * from estilos where estilo='$estilo' ";
	
    
    

       $cont=0;
       if($result=$mysqli->query($sql)){
            
			
            while($obj=$result->fetch_object()){
				$cont++;
				$idEstilo_tmp = $obj->Id;
				$estilo_tmp = $obj->Estilo;
				$material_tmp = $obj->Material;
				$color_tmp = $obj->Color;
				$precio_tmp = $obj->Precio;
      ?>
   
    	<td width="66"><div id="divMatDetalles1">
        
<?php 
						$nombreFoto="$estilo_tmp $material_tmp $color_tmp";
						$tam = strlen($nombreFoto);
						$res = "";
			
						for ($r=0;$r<$tam;$r++){
							$car = $nombreFoto[$r];
							if ($car == ' ')
								$car = '-';
							if ($car == 'Ñ')
								$car = 'N';
							if ($car == 'ñ') 
								$car = 'n';
							$res = $res . $car;
						}
						
						$foto="{$res}.gif";
                        
  ?>      
        <img src="../imagenes_system/muestras/materialcolor/M_<?php  echo $foto; ?>" name="Imagen14" width="66" height="30" border="0" id="Imagen14" onmouseover="setImagenDetalleEstilo('<?php  echo $idEstilo_tmp; ?>','<?php  echo $estilo_tmp; ?>','<?php  echo $material_tmp; ?>','<?php  echo $color_tmp; ?>','divIMG_Detalles','<?php  echo $precio_tmp; ?>')" />
        
        
        </div></td>
			<?php 
            $valcont=$cont;
			
            $modulo=$valcont%3;
            if($modulo==0 && $valcont!=0){
                ?>
      </tr>
      <tr>
                <?php 
            } 
            ?> 

<?php  
  		}
        ?>
      </tr>
        <?php 
    }

    ?>
    </table>
  <div id="divDetalleOptions">
    <div id="divLinDesco1Detalle"><img src="source/linea-continua-div.jpg" width="215" height="5" /></div>
 <a href="#"> <div id="divCheckDetalles" onclick="cargarCrearPedido(document.getElementById('divSistemalblIdTienda').innerHTML);"><img src="carrito/img/checkout.jpg" width="83" height="22" /></div></a>
  <div id="divContiDetalles" onclick="document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';"><img src="carrito/source/continueShopping.jpg" width="126" height="22" /></div>
  <div id="divAddDetalles" onclick="cargarEstiloEnCarro();"><img src="carrito/source/addTobag.jpg" width="87" height="22" /></div>
  
  <div id="divMini1Detalles"></div>
  <div class="ofertasDetalle" id="divPro1Detalles"></div>
  <div id="divMini2Detalles"></div>
  <div class="ofertasDetalle" id="divPro2Detalles"></div>
  <div id="divLinDesco4Detalle"><img src="source/linea-continua-div.jpg" width="215" height="5" /></div>
  </div>
  </div>
  <div id="divMatColo"><span class="selecionDetalle">Selección Color / Material:</span></div>
  <div id="divIcoRegresar" style="top: 1px"></div>
  <div id="divIconoSecDetalle"><a href="#" onclick="document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';document.getElementById('cuadroEstilo2').innerHTML='';""> <img src="img/cerrar_b.jpg"  border="0" width="13" height="13" /></a></div>
</div>
<div  class="regresarOpcion" id="idvVisDetDiseAtras" onclick="document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';document.getElementById('cuadroEstilo2').innerHTML='';">Cerrar</div>
