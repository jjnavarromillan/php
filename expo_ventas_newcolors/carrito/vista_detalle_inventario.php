<link rel="stylesheet" type="text/css" href="vista_detalle_diseno.css">

<link rel="stylesheet" type="text/css" href="carrito/vista_detalle_diseno.css">
  <?php  
  	$idPlantilla = $_GET['idPlantilla'];
	$idEstilo = $_GET['idEstilo'];
	$estilo = $_GET['estilo'];
    $material = $_GET['material'];
    $color = $_GET['color'];
	$precio = $_GET['precio'];
	?>

<div id="divPrinDetalle">
  <div id="divLinea2Detalle"><img src="source/linea-vista-detalle.jpg" width="580" height="2" /></div>
  <div id="divGdDetalle">
    <div class="lineaDetalle"id="divLineaDetalle">Estilo</div>
    <div class="tituloPrincialDetalle" id="divNumDetalle"><?php  echo " $estilo"; ?></div>
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
					
				
  
  ?>
  <img src="../imagenes_system/muestras/normal/<?php  echo $foto; ?>" width="280" height="280" />
  
  </div>
  <label id="idEstiloSelDetalle" style="display:none"><?php  echo " $idEstilo"; ?></label>
  <div class="tituloPrincialDetalle" id="divNombreDetalle"><strong><?php  echo " $material $color"; ?></strong></div>
  <div class="precioDetalle" id="divCostoDetalle">$<label id="precioEstiloDetalle"><?php  echo "$precio"; ?></label></div>
  <div class="descripcionDetalle" id="divDescriDetalles">Plataforma pump, tacón 8.5cm, detalle en piedreria.</div>
  <div class="nomEstiloDetalle" id="divNomCostDetalle"><strong><?php  echo " $material $color"; ?> $ <?php  echo "$precio"; ?></strong></div>
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
	$sql="SELECT estilos.Id,estilos.Linea,estilos.Estilo,estilos.Material,estilos.Color,estilos.Precio 
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.estilo='$estilo' and catalogo_estilos_plantilla.idPlantilla=$idPlantilla  order by estilo";
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
   
    	<td width="66"><div id="divMatDetalles1"><a href="#" >
        
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
        
        
        </a></div></td>
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
  <div id="divPaqCanDeInventario">
      <table width="101" border="0">
        <tr>
          <th width="46"><div align="center" class="abcd">Paquetes</div></th>
          <th width="45"><div align="center" class="abcd">Cantidad</div></th>
        </tr>
        <tr>
          <td><label>
            <div align="center">
              <select class="combito" name="select3" id="select3">
                <option value="A">A</option>
                <option value="B">B</option>
               
              </select>
            </div>
          </label></td>
          <td><label>
            <div align="center">
              <select class="combito" name="select4" id="select4">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
          </label></td>
        </tr>
      </table>
    </div>
  
  <div id="divLinDesco1Detalle"><img src="source/linea-continua-div.jpg" width="215" height="5" /></div>
  <div id="divTableGrisDeInventario"><img src="source/barritaTabla.jpg" width="235" height="20" /></div>
  <div id="divtableMultiDeInventario">
    <table width="230" border="0">
      <tr>
        <th width="23"><div align="center" class="blancoEncabezado">Paq.</div></th>
        <th width="23"><div align="center" class="blancoEncabezado">Cant.</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">2</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">-</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">3</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">-</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">4</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">-</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">5</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">-</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">6</div></th>
        <th width="10"><div align="center" class="blancoEncabezado">-</div></th>
        <th width="30"><div align="center" class="blancoEncabezado">Pares</div></th>
      </tr>
      <tr>
        <td class="abcd"><div align="center">A</div></td>
        <td><div align="center" class="numerosPedido">3</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
      <tr>
        <td class="abcd"><div align="center">B</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
    </table>
  </div>
  <div class="selecionDetalle" id="divInveDeInventario">Inventario</div>
  <div class="selecionDetalle" id="divSeleccionaDeInventario">Selecciona</div>
  <div id="divBarriTabDeInventario"><img src="source/barritaTablaClaro.jpg" width="205" height="15" /></div>
  <div id="divVarNumDeInventario">
    <table width="200" border="0">
      <tr>
        <td width="16" height="21" class="abcd"><div align="center">2</div></td>
        <td width="16" class="abcd"><div align="center">-</div></td>
        <td width="16" class="abcd"><div align="center">3</div></td>
        <td width="16" class="abcd"><div align="center">-</div></td>
        <td width="16" class="abcd"><div align="center">4</div></td>
        <td width="16" class="abcd"><div align="center">-</div></td>
        <td width="16" class="abcd"><div align="center">5</div></td>
        <td width="16" class="abcd"><div align="center">-</div></td>
        <td width="16" class="abcd"><div align="center">6</div></td>
        <td width="16" class="abcd"><div align="center">-</div></td>
        <td width="40" class="abcd"><div align="center">Pares</div></td>
      </tr>
      <tr>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
    </table>
    
  </div>
  <div id="divLinDesco5Detalle"><img src="source/linea-continua-div.jpg" width="215" height="5" /></div>
  </div>
  </div>
  <div id="divLinDescoDetalle"><img src="source/linea-continua-div.jpg" width="215" height="5" /></div>
  <div class="selecionDetalle" id="divSelec22Detalles">Selección Color / Material:</div>
</div>

