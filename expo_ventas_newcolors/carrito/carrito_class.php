<?php  
	require_once("classes/date_convert_class.php");
	class carrito{
		function __construct(){
			$this->conectarToDB("localhost","user_web","123454321","newcolors_expo");    
		}
		function init(){
			
		}
		function getLineas($idPlantilla){
			$idCatalogo=1;
			$sql=" SELECT distinct(estilos.Linea) as lineas FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where idPlantilla=$idPlantilla  ";
			
			//$sql="SELECT distinct(estilos.Linea) as lineas from estilos where estilos.activo=1 order by Linea";


			$result=$this->mysqli->query($sql);
			$resultado_=" ";
			if($result){
				$num=mysqli_num_rows($result);
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata=mysqli_fetch_object($result);
					$linea=$rowdata->lineas;
					//$resultado_=$resultado_."<input name=\"btnLinea\" class=\"botonLinea\" value=\"$linea\" type=\"submit\" onclick=\"extraerDatosLinea(this.value);\" \"><br/>";
					$resultado_=$resultado_."<div class='divBotonLinea'><input name='btnLinea' class='botonLinea' value='$linea' type='submit' onclick=\"llamarasincrono('carrito/getEstilosLineas.php?linea=$linea&idPlantilla=$idPlantilla', 'cuadroEstilo')\" ></div>";
				}
			}	
			return $resultado_;	
		}
		function getIdPlantilla($plantilla){
			
			$sql=" select * from catalogos_plantillas where plantilla='$plantilla' ";
			
			//$sql="SELECT distinct(estilos.Linea) as lineas from estilos where estilos.activo=1 order by Linea";
			
			$idPlantilla="";
			$result=$this->mysqli->query($sql);

			if($result){
				$num=mysqli_num_rows($result);
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata=mysqli_fetch_object($result);
					$idPlantilla=$rowdata->idPlantilla;
					
				}
			}	
			return $idPlantilla;
		}
		function getLineasInventario(){
			$idCatalogo=1;
			$sql=" select distinct(linea) as lineas From inventario_lotes  order by linea";

	
			$result=$this->mysqli->query($sql);
			$resultado_=" ";
			if($result){
				$num=mysqli_num_rows($result);
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata=mysqli_fetch_object($result);
					$linea=$rowdata->lineas;
					//$resultado_=$resultado_."<input name='btnLinea' class='botonLinea' value='$linea' type='submit' onclick='extraerDatosLinea(this.value);' \"><br/>";
					$resultado_=$resultado_."<input name='btnLinea' class='botonLinea' value='$linea' type='submit' onclick=\"llamarasincrono('carrito/getEstilosLineas.php?linea=$linea', 'cuadroEstilo')\" ><br/>";
				}
			}	
			return $resultado_;
		}
		
		function getEstilosFromLineaInventario($linea){
			$idCatalogo=1;
			
			$sql="SELECT distinct(estilo) as estilo_o FROM inventario_lotes  where linea='$linea' 
GROUP BY estilo order by estilo";
			$result=$this->mysqli->query($sql);
			$resultado="";
			if($result){
				$num=mysqli_num_rows($result);
				$row=0;
				$posy=0;
				while($row<$num)
				{	
					$row++;
					$rowdata=mysqli_fetch_object($result);
					$estilo=$rowdata->estilo_o;
					
					$posy_estilo=$posy+50;
					
					$resultado.= "<div class='lineaEstilo'>";
            	    
            	    $resultado.= "<span class='nombreLinea'>";
					
            	    $resultado.= "<span class='numeritoLinea'><label style='position:absolute;left:0px;top: {$posy_estilo}px;z-index:100'>$estilo</label>";
					
					$n_catalogo=1;
	
					$queryColores = " SELECT idInvLot as idEstilo, linea, estilo, material, color, lote
FROM inventario_lotes where estilo='$estilo' 
GROUP BY idInvLot, linea, estilo, material, color,lote ";


					$resColores = $this->mysqli->query($queryColores);
					
					$numColores=mysqli_num_rows($resColores);
					$cont=0;
					$posx=30;
					
					$incremento=130;
					$incrementoy=135;
					for ($i_c=0;$i_c<$numColores;$i_c++){
						$cont++;
						$rowEstilos=mysqli_fetch_object($resColores);
						$material=$rowEstilos->material;
						$color=$rowEstilos->color;
						$idEstilo=$rowEstilos->idEstilo;
						$estilo=$rowEstilos->estilo;
						$lote=$rowEstilos->lote;

						$prenombreFoto="L{$lote}_{$estilo}-";
						$nombreFoto="$material $color";
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
						
						$foto="$prenombreFoto$res.gif";
					
					$resultado.= "<div id='hrefOrigenFoto$idEstilo'  class='link'>";
					$posx_imagen=$posx+15;
					$resultado.= "<img id=\'imgEst$idEstilo\' src=\'../imagenes_system/muestras/minis/$foto\" style=\"left: {$posx_imagen}px; top: {$posy}px;\" class=\"imagen\" onmouseover=\"javascript:posicionaImagen(\"divimggaleria\",\"imgEst$idEstilo\",\"imggaleria\",\"../imagenes_system/muestras/minis/$foto\",event,\"hrefOrigenFoto$idEstilo\",\"hrefImgGaleria\")\">";
					
					

					$posy_nombre=$posy+80;
       	            $resultado.= "<label class='nombreEstilo' style='left: {$posx}px; top: {$posy_nombre}px;position: absolute; z-index: 100;'>L:$lote $material $color</label>";
                    $resultado.= "</div>";
					$posx+=$incremento;
					}
			  $resultado.= "</span>";
       	      $resultado.= "</div>";
					$posy+=$incrementoy;
					$posy_fondo_estilo=$posy+40;
					$resultado.= "<span class='fondoestilo' style='position:absolute;left:0px;top: {$posy_fondo_estilo}px;z-index:4'></span><label id='altoEnY'>$posy_fondo_estilo</label>";
					
					
				}

			}
			return $resultado;
		}
		
		function getEstilosFromLinea($linea,$idPlantilla){
			$idCatalogo=1;
			$posy_fin=0;
			$sql="SELECT estilos.Estilo as estilo_o
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.linea='$linea' and catalogo_estilos_plantilla.idPlantilla=$idPlantilla GROUP BY estilos.Estilo order by estilo";
			$result=$this->mysqli->query($sql);
			$resultado="";
			$contadorElems=0;
			if($result){
				$num=mysqli_num_rows($result);
				$row=0;
				$posy=-50;
				while($row<$num)
				{	
					$row++;
					$rowdata=mysqli_fetch_object($result);
					$estilo=$rowdata->estilo_o;
					
					$posy_estilo=$posy+100;
					
					$resultado.= "<div class='lineaEstilo'>";
            	    
            	    $resultado.= "<span class='nombreLinea'>";
					
            	    $resultado.= "<span class='numeritoLinea'>";
					
					//$resultados.="<label style='position:absolute;left:0px;top: {$posy_estilo}px;z-index:100'>$estilo</label>";
					
					$n_catalogo=1;
	
					$queryColores = " SELECT estilos.id as idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.precio
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.estilo='$estilo' and catalogo_estilos_plantilla.idPlantilla=$idPlantilla GROUP BY estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color ";

					$resColores = $this->mysqli->query($queryColores);
					
					$numColores=mysqli_num_rows($resColores);
					$cont=0;
					$posx=-5;
					$posx_nombre=60;
					$incremento=160;
					$incrementoy=180;
					for ($i_c=0;$i_c<$numColores;$i_c++){
						$cont++;

						$rowEstilos=mysqli_fetch_object($resColores);
						$material=$rowEstilos->Material;
						$color=$rowEstilos->Color;
						$idEstilo=$rowEstilos->idEstilo;
						$estilo=$rowEstilos->Estilo;
						$precio =$rowEstilos->precio;
						
						
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
						
						$foto=$res.".gif";
                        
                    if($cont%4==0 && $cont>0){
                        $posx=-5;
                        $posx_nombre=60;
                        $posy+=$incrementoy;
						$posy_fondo_estilo=$posy+60;
                    }
					
					$resultado.= "<div id='hrefOrigenFoto$idEstilo'  class='link'>";
					$posx_imagen=$posx+0;
					$resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/normal/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('carrito/vista_detalle_diseno.php?idPlantilla=$idPlantilla&idEstilo=$idEstilo&estilo=$estilo&material=$material&color=$color&precio=$precio','cuadroEstilo');document.body.style.cursor = 'default';document.getElementById('cuadroEstilo').style='visibility:none';\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\"
onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					//$resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/normal/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('pedido_cliente.php?idEstilo=$idEstilo','cuadroEstilo');document.body.style.cursor = 'default';\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\ onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					
					$posy_nombre=$posy+130;
					$posx_nombre=$posx+2;
					$posx_chk = $posx_imagen+110;
					$posy_lbl = $posy_nombre-5;
					$posy_precio=$posy_nombre+24;
       	            $resultado.= "<label class='nombreEstilo' style='left: {$posx_nombre}px; top: {$posy_nombre}px;position: absolute; z-index: 100;'>$estilo $material $color</label>";
					$resultado.= "<label class='nombreEstilo' style='left: {$posx_nombre}px; top: {$posy_precio}px;position: absolute; z-index: 100;'>Precio: $precio</label>";
					$resultado.= "<input type='checkbox' name='chk-{$contadorElems}' id='chk-{$contadorElems}'  style='left: {$posx_chk}px; top: {$posy}px;position: absolute; z-index: 100;' />";
					$resultado.= "<label id='idEstiloSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$idEstilo}</label>";
					$resultado.= "<label id='precioSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$precio}</label>";
					
					$contadorElems++;
                    $resultado.= "</div>";
					$posx+=$incremento;
					}
			  $resultado.= "</span>";
       	      $resultado.= "</div> ";
					$posy+=$incrementoy;
					$posy_fondo_estilo=$posy+60;
					
					
				}
			}
			$posy_fin =$posy_fondo_estilo +300;
			if($posy_fin<=680){
				$posy_fin=590;	
			}
            $resultado.= "<label id='elementosDesplegados' style='display:none'>$contadorElems</label><label id='posYFin' style='visibility:hidden'>$posy_fin</label>";
			return $resultado;
		}
        function getEstilosFromLineaInventarioNC($categoria,$material,$color,$linea,$seccionCatalogo){
			$idCatalogo=1;
            $idCategoria=$this->getCategoriasById($categoria);
            $sqlCategoria="";
            $idPlantilla=-1;
            if($categoria!=""){
                $sqlCategoria="and estilos.idCategoria='$idCategoria' ";
            }
            
			if($linea!=""){
            	
				$sql="SELECT estilos.estilo FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id
where  estilos.material like '%$material%' and estilos.color like '%$color%' and estilos.linea = '$linea'    $sqlCategoria  group by estilo order by estilo";
			}
			else{
            	$sql="SELECT estilos.estilo FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id
where  estilos.material like '%$material%' and estilos.color like '%$color%'  $sqlCategoria  group by estilo order by estilo";

            }
//echo $sql;
			$result=$this->mysqli->query($sql);
			$resultado="";
			$contadorElems=0;
			if($result){
				$num=mysqli_num_rows($result);
				$row=0;
				$posy=-50;
				if($row<$num)
				{	
					$row++;
					$rowdata=mysqli_fetch_object($result);
					$estilo_o=$rowdata->estilo;
					
					$posy_estilo=$posy+100;
					
					$resultado.= "<div class='lineaEstilo'>";
            	    
            	    $resultado.= "<span class='nombreLinea'>";
					
            	    $resultado.= "<span class='numeritoLinea'>";
					
					//$resultados.="<label style='position:absolute;left:0px;top: {$posy_estilo}px;z-index:100'>$estilo</label>";
					
					$n_catalogo=1;
					if($linea!=""){ //and estilos.estilo='$estilo_o'
                        $queryColores = "SELECT inventario_lotes.idInvLot, estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, inventario_lotes.N2, inventario_lotes.N2m, inventario_lotes.N3, inventario_lotes.N3m, inventario_lotes.N4, inventario_lotes.N4m, inventario_lotes.N5, inventario_lotes.N5m, inventario_lotes.N6, inventario_lotes.N6m, inventario_lotes.Pares, inventario_lotes.Precio, inventario_lotes.Total, catalogos_categorias.categoria, catalogos_subcategorias.subcategoria,estilos.precioOferta
FROM ((inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) LEFT JOIN catalogos_subcategorias ON estilos.idSubCat = catalogos_subcategorias.idSubCat
where estilos.material like '%$material%' and estilos.color like '%$color%' and estilos.linea = '$linea'    $sqlCategoria 
GROUP BY inventario_lotes.idInvLot, estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, inventario_lotes.N2, inventario_lotes.N2m, inventario_lotes.N3, inventario_lotes.N3m, inventario_lotes.N4, inventario_lotes.N4m, inventario_lotes.N5, inventario_lotes.N5m, inventario_lotes.N6, inventario_lotes.N6m, inventario_lotes.Pares, inventario_lotes.Precio, inventario_lotes.Total, catalogos_categorias.categoria, catalogos_subcategorias.subcategoria
ORDER BY estilos.Estilo, estilos.Material, estilos.Color";

                        
                    
					}
                    else{ //and estilos.estilo='$estilo_o'
                    	$queryColores = " SELECT inventario_lotes.idInvLot, estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, inventario_lotes.N2, inventario_lotes.N2m, inventario_lotes.N3, inventario_lotes.N3m, inventario_lotes.N4, inventario_lotes.N4m, inventario_lotes.N5, inventario_lotes.N5m, inventario_lotes.N6, inventario_lotes.N6m, inventario_lotes.Pares, inventario_lotes.Precio, inventario_lotes.Total, catalogos_categorias.categoria, catalogos_subcategorias.subcategoria,estilos.precioOferta
FROM ((inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) LEFT JOIN catalogos_subcategorias ON estilos.idSubCat = catalogos_subcategorias.idSubCat
where estilos.material like '%$material%' and estilos.color like '%$color%'     $sqlCategoria 
GROUP BY inventario_lotes.idInvLot, estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, inventario_lotes.N2, inventario_lotes.N2m, inventario_lotes.N3, inventario_lotes.N3m, inventario_lotes.N4, inventario_lotes.N4m, inventario_lotes.N5, inventario_lotes.N5m, inventario_lotes.N6, inventario_lotes.N6m, inventario_lotes.Pares, inventario_lotes.Precio, inventario_lotes.Total, catalogos_categorias.categoria, catalogos_subcategorias.subcategoria
ORDER BY estilos.Estilo, estilos.Material, estilos.Color";



                    }
                    
                    
	//echo "<br />" . $queryColores;
					$resColores = $this->mysqli->query($queryColores);
					
					$numColores=mysqli_num_rows($resColores);
					$cont=0;
					$posx=35;
					$posx_nombre=60;
					$incremento=170;
					$incrementoy=180;
					for ($i_c=0;$i_c<$numColores;$i_c++){
						

						$rowEstilos=mysqli_fetch_object($resColores);
						$material=$rowEstilos->Material;
						$color=$rowEstilos->Color;
						$idEstilo=$rowEstilos->Id;
						$estilo=$rowEstilos->Estilo;
						$precio =$rowEstilos->Precio;
                        $precioOferta =$rowEstilos->precioOferta;
						$pares = $rowEstilos->Pares;
						
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
						
						$foto=$res.".gif";
                        
                    if($cont%3==0 && $cont>0){
                        $posx=35;
                        $posx_nombre=60;
                        $posy+=$incrementoy;
						$posy_fondo_estilo=$posy+60;
                    }
					$cont++;
					$resultado.= "<div id='hrefOrigenFoto$idEstilo'  class='link'>";
					$posx_imagen=$posx+0;
					$resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/mediano/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('	/vista_detalle_diseno.php?idPlantilla=$idPlantilla&idEstilo=$idEstilo&estilo=$estilo&material=$material&color=$color&precio=$precio&seccionCatalogo=$seccionCatalogo','cuadroEstilo');document.body.style.cursor = 'default';alert('ok2');\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\"
onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					//$resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/mediano/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('pedido_cliente.php?idEstilo=$idEstilo','cuadroEstilo');document.body.style.cursor = 'default';\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\ onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					
					$posy_nombre=$posy+130;
					$posx_nombre=$posx+12;
                    $posx_precio=$posx+60;
                    $posx_precioOferta=$posx+30;
					$posx_chk = $posx_imagen+110;
					$posy_lbl = $posy_nombre-5;
					$posy_precio=$posy_nombre+25;
                    $posy_preciooferta=$posy_nombre+22;
                    $pares_posx=$posx_precioOferta+20;
                    $pares_posy=$posy_preciooferta+16;
       	            $resultado.= "<label class='nombreEstilo' style='left: {$posx_nombre}px; top: {$posy_nombre}px;position: absolute; z-index: 100; '>$estilo $material $color</label>";

                    if($precioOferta!=""){
                    	$resultado.= "<label class='ofertaTipoRojo' style='left: {$posx_precioOferta}px; top: {$posy_precio}px;position: absolute; z-index: 100;' > $$precioOferta </label>";
                        $resultado.= "<label class='precioTachado' style='left: {$posx_precio}px; top: {$posy_precio}px;position: absolute; z-index: 100;'  >  $$precio </label>";
                    }
                    else{
                    	$resultado.= "<label class='precioEstilos2' style='left: {$posx_precio}px; top: {$posy_precio}px;position: absolute; z-index: 100;'  >  $$precio </label>";
                    }
                    
                    $resultado.= "<label class='precioEstilos2' style='left: {$pares_posx}px; top: {$pares_posy}px;position: absolute; z-index: 100;'  > Pares:$pares </label>";
                    
					$resultado.= "<input type='checkbox' name='chk-{$contadorElems}' id='chk-{$contadorElems}'  style='left: {$posx_chk}px; top: {$posy}px;position: absolute; z-index: 100;' />";
					$resultado.= "<label id='idEstiloSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$idEstilo}</label>";
					$resultado.= "<label id='precioSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$precio}</label>";
					
					$contadorElems++;
                    $resultado.= "</div>";
					$posx+=$incremento;
					}
			  $resultado.= "</span>";
       	      $resultado.= "</div> ";
					$posy+=$incrementoy;
					$posy_fondo_estilo=$posy+60;
					
					
				}
			}
			$posy_fin =$posy_fondo_estilo +300;
			if($posy_fin<=680){
				$posy_fin=590;	
			}
            $resultado.= "<label id='elementosDesplegados' style='display:none'>$contadorElems</label><label id='posYFin' style='visibility:hidden' >$posy_fin</label>";
			return $resultado;
		}
        function getEstilosFromLineaAll($idPlantilla,$categoria,$material,$color,$linea,$estilo,$seccionCatalogo){
			$idCatalogo=1;
			$posy_fondo_estilo=0;
			$posy_dialog=0;
            $idCategoria=$this->getCategoriasById($categoria);
            $sqlCategoria="";
            if($categoria!=""){
                $sqlCategoria="estilos.idCategoria='$idCategoria' and";
            }
            
			if($linea!=""){
            	
				$sql="SELECT estilos.estilo FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id
where  estilos.material like '%$material%' and estilos.color like '%$color%' and estilos.linea = '$linea' and estilo like '%$estilo%' and  $sqlCategoria idPlantilla=$idPlantilla group by estilo order by estilo";
			}
			else{
            	$sql="SELECT estilos.estilo FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id
where  estilos.material like '%$material%' and estilos.color like '%$color%' and estilo like '%$estilo%' and $sqlCategoria idPlantilla=$idPlantilla group by estilo order by estilo";

            }
			
			$result=$this->mysqli->query($sql);
			$resultado="";
			$contadorElems=0;
			if($result){
				$num=mysqli_num_rows($result);
				$row=0;
				$posy=-50;
				if($row<$num)
				{	
					$row++;
					$rowdata=mysqli_fetch_object($result);
					$estilo_o=$rowdata->estilo;
					
					$posy_estilo=$posy+100;
					
                    $resultado.= "<div id='banerPlantilla' style='position:relative;' ><img src='carrito/banner-platilla/{$idPlantilla}.jpg'/> </div>";
                    
					$resultado.= "<div class='lineaEstilo'>";
            	    
            	    $resultado.= "<span class='nombreLinea'>";
					
            	    $resultado.= "<span class='numeritoLinea'>";
					
					//$resultados.="<label style='position:absolute;left:0px;top: {$posy_estilo}px;z-index:100'>$estilo</label>";
					
					$n_catalogo=1;
					if($linea!=""){ //and estilos.estilo='$estilo_o'
                        $queryColores = "SELECT estilos.id AS idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, estilos.precioOferta
FROM (catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
 where estilos.material like '%$material%' and estilos.color like '%$color%' and estilos.linea = '$linea' and estilo like '%$estilo%'  and  $sqlCategoria catalogo_estilos_plantilla.idPlantilla=$idPlantilla
GROUP BY estilos.id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.precio, estilos.precioOferta
ORDER BY estilos.Estilo, estilos.Material, estilos.Color";

                        
                    
					}
                    else{ //and estilos.estilo='$estilo_o'
                    	$queryColores = " SELECT estilos.id AS idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, estilos.precioOferta
FROM (catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
 where estilos.material like '%$material%' and estilos.color like '%$color%' and estilo like '%$estilo%'    and  $sqlCategoria catalogo_estilos_plantilla.idPlantilla=$idPlantilla
GROUP BY estilos.id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.precio, estilos.precioOferta
ORDER BY estilos.Estilo, estilos.Material, estilos.Color";

                    }
                    
                    
	//echo $queryColores;
					$resColores = $this->mysqli->query($queryColores);
					
					$numColores=mysqli_num_rows($resColores);
					$cont=0;
					$posx=35;
					$posx_nombre=60;
					$incremento=170;
					$incrementoy=180;
					for ($i_c=0;$i_c<$numColores;$i_c++){
						

						$rowEstilos=mysqli_fetch_object($resColores);
						$material=$rowEstilos->Material;
						$color=$rowEstilos->Color;
						$idEstilo=$rowEstilos->idEstilo;
						$estilo=$rowEstilos->Estilo;
						$precio =$rowEstilos->precio;
                        $precioOferta =$rowEstilos->precioOferta;
						
						
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
						
						$foto=$res.".gif";
                        
                    if($cont%3==0 && $cont>0){
                        $posx=35;
                        $posx_nombre=60;
                        $posy+=$incrementoy;
						$posy_fondo_estilo=$posy+60;
						
                    }
					$cont++;
					$resultado.= "<div id='hrefOrigenFoto$idEstilo'  class='link'>";
					$posx_imagen=$posx+0;
					//$posy_dialog=$posy_fondo_estilo+100;
					$posy_dialog=100;
					//"imageresize.php?urlsource=image.jpg&urldestyni=otra/otraimg2.jpg&width=73&height=73&quality=50"
					
					$resultado.= "<img id='imgEst$idEstilo' src='imageresize.php?urlsource=../imagenes_system/muestras/400/$foto&urldestyni=../imagenes_system/muestras/mediano/$foto &width=203&height=203&quality=100&urlerror=../imagenes_system/muestras/sinfoto.gif' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('carrito/vista_detalle_diseno.php?idPlantilla=$idPlantilla&idEstilo=$idEstilo&estilo=$estilo&material=$material&color=$color&precio=$precio&seccionCatalogo=$seccionCatalogo','cuadroEstilo2');document.body.style.cursor = 'default';htmlDivCodeAtras=document.getElementById('cuadroEstilo').innerHTML;document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='visible';document.getElementById('cuadroEstilo2').style.top='{$posy_dialog}px';\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\"
onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					
					//20131207 $resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/mediano/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('carrito/vista_detalle_diseno.php?idPlantilla=$idPlantilla&idEstilo=$idEstilo&estilo=$estilo&material=$material&color=$color&precio=$precio&seccionCatalogo=$seccionCatalogo','cuadroEstilo2');document.body.style.cursor = 'default';htmlDivCodeAtras=document.getElementById('cuadroEstilo').innerHTML;document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='visible';document.getElementById('cuadroEstilo2').style.top='{$posy_dialog}px';\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\"
//onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					//$resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/mediano/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('pedido_cliente.php?idEstilo=$idEstilo','cuadroEstilo');document.body.style.cursor = 'default';htmlDivCodeAtras=document.getElementById('cuadroEstilo').innerHTML;\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\ onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					
					$posy_nombre=$posy+130;
					$posx_nombre=$posx+12;
                    $posx_precio=$posx+60;
                    $posx_precioOferta=$posx+30;
					$posx_chk = $posx_imagen+110;
					$posy_lbl = $posy_nombre-5;
					$posy_precio=$posy_nombre+25;
                    $posy_preciooferta=$posy_nombre+22;
					$posy_cod = $posy_nombre-130;
					$posx_cod= $posx_nombre-50;
       	            $resultado.= "<div id='divIdEstiloCod' style='position:absolute; width:50px; height:20px; z-index:1000; font:Verdana, Geneva, sans-serif; font-size:8px;left:{$posx_cod}px;top:{$posy_cod}px;'><label id='lblIdEstiloCod'>$idEstilo</label></div>";

       	            $resultado.= "<label class='nombreEstilo' style='left: {$posx_nombre}px; top: {$posy_nombre}px;position: absolute; z-index: 100; '>$estilo $material $color</label>";

                    if($precioOferta!=""){
                    	$resultado.= "<label class='ofertaTipoRojo' style='left: {$posx_precioOferta}px; top: {$posy_precio}px;position: absolute; z-index: 100;' > $$precioOferta </label>";
                        $resultado.= "<label class='precioTachado' style='left: {$posx_precio}px; top: {$posy_precio}px;position: absolute; z-index: 100;'  >  $$precio </label>";
                    }
                    else{
                    	$resultado.= "<label class='precioEstilos2' style='left: {$posx_precio}px; top: {$posy_precio}px;position: absolute; z-index: 100;'  >  $$precio </label>";
                    }
                    
					$resultado.= "<input type='checkbox' name='chk-{$contadorElems}' id='chk-{$contadorElems}'  style='left: {$posx_chk}px; top: {$posy}px;position: absolute; z-index: 100;' />";
					$resultado.= "<label id='idEstiloSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$idEstilo}</label>";
					$resultado.= "<label id='precioSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$precio}</label>";
					
					$contadorElems++;
                    $resultado.= "</div>";
					$posx+=$incremento;
					}
			  $resultado.= "</span>";
       	      $resultado.= "</div> ";
					$posy+=$incrementoy;
					$posy_fondo_estilo=$posy+60;
				
					//onclick="document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';"
				}
			}
			$posy_fin =$posy_fondo_estilo +300;
			if($posy_fin<=680){
				$posy_fin=590;	
			}
            $resultado.= "<label id='elementosDesplegados' style='display:none'>$contadorElems</label><label id='posYFin' style='visibility:hidden' >$posy_fin</label>";
			return $resultado;
		}
        function getEstilosFromLineaAllInventario($categoria,$material,$color,$linea,$estilo,$seccionCatalogo,$idPlantilla){
			$idCatalogo=1;
            
			$contadorElems=0;
				$row=0;
				$posy=-50;
					$row++;
					$resultado="";
                    
					$posy_estilo=$posy+100;
					
					$resultado.= "<div class='lineaEstilo'>";
            	    
            	    $resultado.= "<span class='nombreLinea'>";
					
            	    $resultado.= "<span class='numeritoLinea'>";
					
					//$resultados.="<label style='position:absolute;left:0px;top: {$posy_estilo}px;z-index:100'>$estilo</label>";
					
					$n_catalogo=1;
                    if($seccionCatalogo!="Inventario"){
                        if($linea!=""){ //and estilos.estilo='$estilo_o'
                            $queryColores = " SELECT estilos.id as idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.precio,inventario_lotes_web.pares
        FROM inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id where estilos.material like '%$material%' and estilos.color like '%$color%' and estilos.linea = '$linea'   GROUP BY estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color order by estilos.Estilo,estilos.Material, estilos.Color  ";
                        }
                        else{ //and estilos.estilo='$estilo_o'
                            $queryColores = " SELECT estilos.id as idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.precio,inventario_lotes_web.pares
        FROM inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id where estilos.material like '%$material%' and estilos.color like '%$color%'  GROUP BY estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color order by estilos.Estilo,estilos.Material, estilos.Color";
    
                        }
                    }
                    else{
                    if($linea!=""){
                            if($idPlantilla=="Todo"){
                                 $queryColores = "SELECT estilos.id AS idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
FROM (catalogo_estilos_plantilla INNER JOIN (inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id) ON catalogo_estilos_plantilla.idEstilo = inventario_lotes_web.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
where estilos.material like '%$material%' and estilos.color like '%$color%' and catalogos_categorias.categoria like '%$categoria%'  and estilos.linea = '$linea' GROUP BY estilos.id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
ORDER BY estilos.Estilo, estilos.Material, estilos.Color, estilos.precio";

     
                            }
                            else{
                                $queryColores = "SELECT estilos.id AS idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
FROM (catalogo_estilos_plantilla INNER JOIN (inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id) ON catalogo_estilos_plantilla.idEstilo = inventario_lotes_web.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
where estilos.material like '%$material%' and estilos.color like '%$color%' and catalogos_categorias.categoria like '%$categoria%' and estilos.linea = '$linea' GROUP BY estilos.id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
HAVING (((catalogo_estilos_plantilla.idPlantilla)=$idPlantilla))
ORDER BY estilos.Estilo, estilos.Material, estilos.Color, estilos.precio";
                            }
                    	}
                        else{
                        	if($idPlantilla=="Todo"){
                                  $queryColores = "SELECT estilos.id AS idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
FROM (catalogo_estilos_plantilla INNER JOIN (inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id) ON catalogo_estilos_plantilla.idEstilo = inventario_lotes_web.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
where estilos.material like '%$material%' and estilos.color like '%$color%' and catalogos_categorias.categoria like '%$categoria%'  GROUP BY estilos.id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
ORDER BY estilos.Estilo, estilos.Material, estilos.Color, estilos.precio";
    
                            }
                            else{
                                  $queryColores = "SELECT estilos.id AS idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
FROM (catalogo_estilos_plantilla INNER JOIN (inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id) ON catalogo_estilos_plantilla.idEstilo = inventario_lotes_web.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
where estilos.material like '%$material%' and estilos.color like '%$color%' and catalogos_categorias.categoria like '%$categoria%'  GROUP BY estilos.id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.precio, inventario_lotes_web.pares, catalogo_estilos_plantilla.idPlantilla, estilos.idCategoria, catalogos_categorias.categoria
HAVING (((catalogo_estilos_plantilla.idPlantilla)=$idPlantilla))
ORDER BY estilos.Estilo, estilos.Material, estilos.Color, estilos.precio";
                            }
                        }
                    }
                  //echo $queryColores;
					$resColores = $this->mysqli->query($queryColores);
					
					$numColores=mysqli_num_rows($resColores);
					$cont=0;
					$posx=35;
					$posx_nombre=60;
					$incremento=170;
					$incrementoy=180;
					for ($i_c=0;$i_c<$numColores;$i_c++){
						

						$rowEstilos=mysqli_fetch_object($resColores);
						$material=$rowEstilos->Material;
						$color=$rowEstilos->Color;
						$idEstilo=$rowEstilos->idEstilo;
						$estilo=$rowEstilos->Estilo;
						$precio =$rowEstilos->precio;
						$pares =$rowEstilos->pares;
						
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
						
						$foto=$res.".gif";
                        
                    if($cont%3==0 && $cont>0){
                        $posx=35;
                        $posx_nombre=60;
                        $posy+=$incrementoy;
						$posy_fondo_estilo=$posy+60;
                    }
					$cont++;
					$resultado.= "<div id='hrefOrigenFoto$idEstilo'  class='link'>";
					$posx_imagen=$posx+0;
					$resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/mediano/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('carrito/vista_detalle_diseno.php?idPlantilla=&idEstilo=$idEstilo&estilo=$estilo&material=$material&color=$color&precio=$precio&seccionCatalogo=$seccionCatalogo','cuadroEstilo');document.body.style.cursor = 'default';\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\"
onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					//$resultado.= "<img id='imgEst$idEstilo' src='../imagenes_system/muestras/mediano/$foto' style='left: {$posx_imagen}px; top: {$posy}px;' class='imagen' onclick=\"llamarasincrono('pedido_cliente.php?idEstilo=$idEstilo','cuadroEstilo');document.body.style.cursor = 'default';\" onmouseover=\"this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';\ onmouseout=\"this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'\" width='126' height='126' >";
					
					$posy_nombre=$posy+130;
					$posx_nombre=$posx+2;
					$posx_chk = $posx_imagen+110;
					$posy_lbl = $posy_nombre-5;
   					$posy_lblPars = $posy_nombre-10;

					$posy_precio=$posy_nombre+24;
                    $posy_pares=$posy_nombre+34;
       	            $resultado.= "<label class='nombreEstilo' style='left: {$posx_nombre}px; top: {$posy_nombre}px;position: absolute; z-index: 100;'>$estilo $material $color</label>";
					$resultado.= "<label class='nombreEstilo' style='left: {$posx_nombre}px; top: {$posy_precio}px;position: absolute; z-index: 100;'>Precio: $precio</label>";
                    $resultado.= "<label class='nombreEstilo' style='left: {$posx_nombre}px; top: {$posy_pares}px;position: absolute; z-index: 100;'>Pares: $pares</label>";
					$resultado.= "<input type='checkbox' name='chk-{$contadorElems}' id='chk-{$contadorElems}'  style='left: {$posx_chk}px; top: {$posy}px;position: absolute; z-index: 100;' />";
					$resultado.= "<label id='idEstiloSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$idEstilo}</label>";
					$resultado.= "<label id='precioSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$precio}</label>";
                    $resultado.= "<label id='paresSel{$contadorElems}' style='display:none; left: {$posx_chk}px; top: {$posy_lbl}px;position: absolute; z-index: 100;'>{$pares}</label>";
					
					$contadorElems++;
                    $resultado.= "</div>";
					$posx+=$incremento;
					}
			  $resultado.= "</span>";
       	      $resultado.= "</div> ";
					$posy+=$incrementoy;
					$posy_fondo_estilo=$posy+60;
			$posy_fin =$posy_fondo_estilo +300;
			if($posy_fin<=680){
				$posy_fin=590;	
			}
            $resultado.= "<label id='elementosDesplegados' style='display:none'>$contadorElems</label><label id='posYFin' style='visibility:hidden' >$posy_fin</label>";
			return $resultado;
		}
		function getDatosEstilo($idEstilo){
			
			$sql=" select * from estilos where Id=$idEstilo";
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata = mysqli_fetch_object($result);
					$linea = $rowdata->Linea;
					$estilo = $rowdata->Estilo;
					$Material = $rowdata->Material; 
					$Color = $rowdata->Color;
					$precio = $rowdata->Precio;
					$temp = $rowdata->Temp;
					$descripcion = $rowdata->descripcion;
					$resultado_=$resultado_."$linea,$estilo,$Material,$Color,$precio,$temp,$descripcion,$idEstilo";
				}
			}	

			return $resultado_;
			
		}
        function getDatosEstiloAll(){
			
			$sql=" select * from estilos order by estilos.linea,estilos.estilo";
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata = mysqli_fetch_object($result);
                    $idEstilo = $rowdata->Id;
					$linea = $rowdata->Linea;
					$estilo = $rowdata->Estilo;
					$Material = $rowdata->Material; 
					$Color = $rowdata->Color;
					$precio = $rowdata->Precio;
					$temp = $rowdata->Temp;
					$descripcion = $rowdata->descripcion;
					$resultado_=$resultado_."$linea,$estilo,$Material,$Color,$precio,$temp,$descripcion,$idEstilo";
				}
			}	

			return $resultado_;
			
		}
        function getIdUsuarioByIdCliente($idCliente,$tipo){
			if ($tipo=="Cliente"){
            	$sql=" select Nombre from clientes_tiendas where idDatCli=$idCliente";
            }
            else{
            	$sql=" select nombre as Nombre from usuarios_sistema where idUsuSis=$idCliente";
            }
			
			$result=$this->mysqli->query($sql);
			$resultado_="";

			if($result){
				$num=mysqli_num_rows($result);
                $rowdata = mysqli_fetch_object($result);
                $Nombre = $rowdata->Nombre;
                
                $resultado_="$Nombre";
			}	

			return $resultado_;
        	
        }
        function getNombreCliente($idUsuario,$tipo){
		/*	if ($tipo=="cliente"){
            	$sql=" select Nombre from detallistas_clientes where idCliente=$idCliente";
            }
            else{*/
            	
            $sql=" select nombre as Nombre from usuarios_web where idUsuarioWeb=$idUsuario";


            //}

			$result=$this->mysqli->query($sql);
			$resultado_="";
			
			if($result){
				$num=mysqli_num_rows($result);
                if($num>0){
                    $rowdata = mysqli_fetch_object($result);
                    $Nombre = $rowdata->Nombre;
                    
                    $resultado_="$Nombre";
                }
			}	

			return $resultado_;
			
		}
		function getDatosLote($lote){
			
			$sql=" select * from inventario_lotes where lote='$lote'";
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata = mysqli_fetch_object($result);
					$linea = $rowdata->Linea;
					$estilo = $rowdata->Estilo;
					$Material = $rowdata->Material; 
					$Color = $rowdata->Color;
					$precio = $rowdata->Precio;
					$temp = $rowdata->Temp;
					$descripcion = $rowdata->descripcion;
					$resultado_=$resultado_."$linea,$estilo,$Material,$Color,$precio,$temp,$descripcion,$lote";
				}
			}	

			return $resultado_;
			
		}
		function getCategoriasCatalogos(){
			
			$sql=" select idPlantilla,plantilla from catalogos_plantilla where tipoCatalogo='Temporadas' ";
			$result=$this->mysqli->query($sql);
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
						$resultado_=$resultado_."<option selected='selected' value='{$idPlantilla}'>$plantilla</option>";
					}
					else
					{
						$resultado_=$resultado_."<option  value='{$idPlantilla}'>$plantilla</option>";
					}
					
					$cons=$cons+1;
				}
			}	

			return $resultado_;
			
		}
        function getCategoriasById($categoria){
			
			$sql=" select idCatCat,categoria from catalogos_categorias where categoria='$categoria' ";
			$result=$this->mysqli->query($sql);
			$resultado_=" ";
			$idCatCat="";
			if($result){
				$num=mysqli_num_rows($result);
				
					
					if($rowdata = mysqli_fetch_object($result))
						$idCatCat = $rowdata->idCatCat;
					
				
			}	

			return $idCatCat;
			
		}
		function getCategoriasCalzado($idPlantilla,$tipoCatalogo){
        	if($tipoCatalogo!="Inventario"){
            	if($idPlantilla==-2){
                
                	$sql="SELECT catalogos_categorias.categoria, Count(catalogos_categorias.categoria) AS Cant
FROM (inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
GROUP BY catalogos_categorias.categoria
HAVING (((Count(catalogos_categorias.categoria))>0))";
                
                }
                elseif($idPlantilla!=""){
                	$sql="SELECT catalogos_categorias.idCatCat, catalogos_categorias.categoria, Count(catalogo_estilos_plantilla.idPlantilla) AS Cant
FROM (catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogo_estilos_plantilla.idPlantilla)=$idPlantilla))
GROUP BY catalogos_categorias.idCatCat, catalogos_categorias.categoria ";
                }
                else
                {
                   $sql="SELECT catalogos_categorias.idCatCat, catalogos_categorias.categoria, Count(catalogo_estilos_plantilla.idPlantilla) AS Cant
FROM (catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
GROUP BY catalogos_categorias.idCatCat, catalogos_categorias.categoria ";
                }
            }
            else{
            
            	if($idPlantilla!=""){
                    $sql=" SELECT catalogos_categorias.idCatCat, catalogos_categorias.categoria, Count(catalogo_estilos_plantilla.idPlantilla) AS Cant
FROM ((catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) INNER JOIN inventario_lotes_web ON catalogo_estilos_plantilla.idEstilo = inventario_lotes_web.idEstilo
WHERE (((catalogo_estilos_plantilla.idPlantilla)=$idPlantilla))
GROUP BY catalogos_categorias.idCatCat, catalogos_categorias.categoria ";
                }
                else
                {
                     $sql=" SELECT catalogos_categorias.idCatCat, catalogos_categorias.categoria, Count(catalogo_estilos_plantilla.idPlantilla) AS Cant
FROM (catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
GROUP BY catalogos_categorias.idCatCat, catalogos_categorias.categoria ";
                }
            }
        //    echo $sql;
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				for ($i=0;$i<$num;$i++)
				{	
					
					$rowdata = mysqli_fetch_object($result);
					//$idCatCat = $rowdata->idCatCat;
					$categoria = $rowdata->categoria;
                    $Cant = $rowdata->Cant;
					if($i==0){
						$resultado_=$resultado_."<option  value='{$categoria}'>$categoria - [$Cant]</option>";
					}
					else
					{
						$resultado_=$resultado_."<option  value='{$categoria}'>$categoria - [$Cant]</option>";
					}
					
					$cons=$cons+1;
				}
			}	

			return $resultado_;
			
		}
		
        function getMaterialesGroup($idPlantilla,$tipoCatalogo){
        if($idPlantilla=="-2"){
        	 $sql="SELECT estilos.material, Count(estilos.Material) AS Cant
FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id GROUP BY estilos.Material";
        }
        elseif($tipoCatalogo!="Inventario"){
                $sql=" SELECT estilos.Material AS material, Count(estilos.Id) AS Cant
    FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where  idPlantilla='$idPlantilla' GROUP BY estilos.Material ";
			}
            else{
                if($idPlantilla!="Todo"){
                     $sql="SELECT estilos.Material AS material, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
FROM (inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario') AND ((catalogos_plantilla.idPlantilla)=$idPlantilla))
GROUP BY estilos.Material";
                }
                else{
                	$sql="SELECT estilos.Material AS material, Count(catalogo_estilos_plantilla.idEstilo) AS Cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        GROUP BY estilos.Material";
                }
           	}
		//	echo $sql;
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				for ($i=0;$i<$num;$i++)
				{	
					
					$rowdata = mysqli_fetch_object($result);
					 $Cant1=0;
					$material = $rowdata->material;
                    $Cant1 = $rowdata->Cant;
					if($i==0){
						$resultado_=$resultado_."<option value='{$material}'>$material - [$Cant1]</option>";
					}
					else
					{
						$resultado_=$resultado_."<option  value='{$material}'>$material - [$Cant1]</option>";
					}
					
					$cons=$cons+1;
				}
			}	

			return $resultado_;
			
		}
		function getColoresGroup($idPlantilla,$tipoCatalogo){
		
        	if($idPlantilla=="-2"){
                $sql=" SELECT estilos.color, Count(estilos.Color) AS cant     FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id
    GROUP BY estilos.Color ";
            }
			elseif($tipoCatalogo!="Inventario"){
                $sql=" SELECT estilos.Color AS color, Count(estilos.Id) AS cant
    FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where  idPlantilla='$idPlantilla' GROUP BY estilos.color ";
			}
            else{
                if($idPlantilla!="Todo"){
                     $sql="SELECT estilos.Color AS color, Count(catalogo_estilos_plantilla.idEstilo) AS cant
FROM (inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat
WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario') AND ((catalogos_plantilla.idPlantilla)=$idPlantilla))
GROUP BY estilos.Color";
                }
                else{
                	$sql="SELECT estilos.color AS color, Count(catalogo_estilos_plantilla.idEstilo) AS cant
        FROM inventario_lotes_web INNER JOIN ((catalogo_estilos_plantilla INNER JOIN catalogos_plantilla ON catalogo_estilos_plantilla.idPlantilla = catalogos_plantilla.idPlantilla) INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id) ON inventario_lotes_web.idEstilo = catalogo_estilos_plantilla.idEstilo
        WHERE (((catalogos_plantilla.tipoCatalogo)='Inventario'))
        GROUP BY estilos.color";
                }
           	}

			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				for ($i=0;$i<$num;$i++)
				{	
					
					$rowdata = mysqli_fetch_object($result);
					
					$color = $rowdata->color;
                    $Cant2 = $rowdata->cant;
					if($i==0){
						$resultado_=$resultado_."<option  value='{$color}'>$color - [$Cant2]</option>";
					}
					else
					{
						$resultado_=$resultado_."<option  value='{$color}'>$color - [$Cant2]</option>";
					}
					
					$cons=$cons+1;
				}
			}	

			return $resultado_;
			
		}
        function getLineasGroup($idPlantilla,$tipoCatalogo){
        	if($idPlantilla=="-2"){
            	$sql=" SELECT estilos.linea, Count(estilos.Linea) AS Cant
FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id
GROUP BY estilos.Linea";
            }
            elseif($tipoCatalogo!="Inventario"){
                    $sql=" SELECT estilos.linea, Count(estilos.Id) AS Cant FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where   idPlantilla='$idPlantilla' GROUP BY estilos.linea ORDER BY estilos.linea ";
                }
                else{
                    $sql="SELECT estilos.linea, Count(estilos.Id) AS Cant
    FROM ((estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) INNER JOIN inventario_lotes_web ON catalogo_estilos_plantilla.idEstilo = inventario_lotes_web.idEstilo
    WHERE (((catalogo_estilos_plantilla.idPlantilla)=$idPlantilla))
    GROUP BY estilos.linea
    ORDER BY estilos.linea";
                }
          
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				for ($i=0;$i<$num;$i++)
				{	
					
					$rowdata = mysqli_fetch_object($result);
					
					$linea = $rowdata->linea;
                    $Cant = $rowdata->Cant;
					if($i==0){
						$resultado_=$resultado_."<option value='{$linea}'>$linea - [$Cant]</option>";
					}
					else
					{
						$resultado_=$resultado_."<option  value='{$linea}'>$linea - [$Cant]</option>";
					}
					
					$cons=$cons+1;
				}
			}	

			return $resultado_;
			
		}
		function getEstilosGroup($idPlantilla,$tipoCatalogo){
        	if($idPlantilla=="-2"){
            	$sql=" SELECT estilos.estilo, Count(estilos.Id) AS Cant
FROM inventario_lotes INNER JOIN estilos ON inventario_lotes.idEstilo = estilos.Id
GROUP BY estilos.estilo";
            }
            elseif($tipoCatalogo!="Inventario"){
                    $sql=" SELECT estilos.estilo, Count(estilos.Id) AS Cant FROM estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo where   idPlantilla='$idPlantilla' GROUP BY estilos.estilo ORDER BY estilos.estilo ";
                }
                else{
                    $sql="SELECT estilos.estilo, Count(estilos.Id) AS Cant
    FROM ((estilos INNER JOIN catalogo_estilos_plantilla ON estilos.Id = catalogo_estilos_plantilla.idEstilo) INNER JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) INNER JOIN inventario_lotes_web ON catalogo_estilos_plantilla.idEstilo = inventario_lotes_web.idEstilo
    WHERE (((catalogo_estilos_plantilla.idPlantilla)=$idPlantilla))
    GROUP BY estilos.estilo
    ORDER BY estilos.estilo";
                }
          
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				for ($i=0;$i<$num;$i++)
				{	
					
					$rowdata = mysqli_fetch_object($result);
					
					$estilo = $rowdata->estilo;
                    $Cant = $rowdata->Cant;
					if($i==0){
						$resultado_=$resultado_."<option value='{$estilo}'>$estilo - [$Cant]</option>";
					}
					else
					{
						$resultado_=$resultado_."<option  value='{$estilo}'>$estilo - [$Cant]</option>";
					}
					
					$cons=$cons+1;
				}
			}	

			return $resultado_;
			
		}
		function conectarToDB($server,$user,$passwd,$database){
			$this->mysqli = new mysqli($server, $user, $passwd, $database);
			$this->mysqli->query("SET NAMES 'utf8'");
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}	
		}
		function registraEstiloEnCarrito($idEstilo,$linea,$estilo,$material,$color,$precio,$pares,$corrida,$cantidadCorridas,$n2,$n2m,$n3,$n3m,$n4,$n4m,$n5,$n5m,$n6,$n6m,$urlImg,$idCliente,$claveP){
			$sqlGetData="select * from carrito_pedido where idCliente=$idCliente";
			$result_data=$this->mysqli->query($sqlGetData);
			if($result_data){
				$num=mysqli_num_rows($result_data);
				if($num>0){
					for ($i=0;$i<$num;$i++)
					{	
						$rowdata=mysqli_fetch_object($result_data);
						
						if($num>0){
							$sql_upd = "update carrito_pedido set idCliente=$idCliente, idProducto=$idProducto,linea=$linea,estilo='$estilo',material='$material',color='$color',claveP='$claveP',cant=$cant,N2=$N2,N2m=$N2m,N3=$N3,N3m=$N3m,N4=$N4,N4m=$N4m,N5=$N5,N5m=$N5m,N6=$N6,N6m=$N6m,pares=$pares,precio=$precio,fechaHora='$fecha_hora' where idProducto=$idProducto and claveP='$claveP'";
							$result_upd=$mysqli->query($sql_upd);
						}
						else
						{
							$sql_ins = "insert into carrito_pedido (idProducto,linea,estilo,material,color,claveP,cant,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,pares,precio,fechaHora) values ($idProducto,$linea,'$estilo','$material','$color','$claveP',$cant,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$pares,$precio,'$fecha_hora')";
							$result_ins=$mysqli->query($sql_ins);
						}
						echo "OK";
					}
				}
				else{
					echo "vacio";	
				}
			}	
			
		}
		
		function getDatosCarrito($idTienda,$seccion_catalogo){
        	if($seccion_catalogo=="Distribuidores"){
				$sqlGetData = " SELECT carrito_pedido_detalle.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido.idCliente FROM carrito_pedido_detalle,estilos,carrito_pedido where carrito_pedido_detalle.idEstilo=estilos.Id and carrito_pedido.idCarPed=carrito_pedido_detalle.idCarPed and idTienda=$idTienda group by idCliente,carrito_pedido_detalle.idEstilo ";
            }
            if($seccion_catalogo=="Sugerencias"){
				$sqlGetData = " SELECT carrito_pedido_detalle_sugerencias.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido_sugerencias.idCliente FROM carrito_pedido_detalle_sugerencias,estilos,carrito_pedido_sugerencias where carrito_pedido_detalle_sugerencias.idEstilo=estilos.Id and carrito_pedido_sugerencias.idCarPed=carrito_pedido_detalle_sugerencias.idCarPed and idTienda=$idTienda group by idCliente,carrito_pedido_detalle_sugerencias.idEstilo ";
            }
            if($seccion_catalogo=="Inventario"){
				$sqlGetData = " SELECT carrito_pedido_detalle_inventario.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido_inventario.idCliente FROM carrito_pedido_detalle_inventario,estilos,carrito_pedido_inventario where carrito_pedido_detalle_inventario.idEstilo=estilos.Id and carrito_pedido_inventario.idCarPed=carrito_pedido_detalle_inventario.idCarPed and idTienda=$idTienda group by idCliente,carrito_pedido_detalle_inventario.idEstilo ";
            }
             if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
             	$sqlGetData = " SELECT carrito_pedido_detalle_operaciones.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido_operaciones.idCliente FROM carrito_pedido_detalle_operaciones,estilos,carrito_pedido_operaciones where carrito_pedido_detalle_operaciones.idEstilo=estilos.Id and carrito_pedido_operaciones.idCarPed=carrito_pedido_detalle_operaciones.idCarPed and idTienda=$idTienda group by idCliente,carrito_pedido_detalle_operaciones.idEstilo ";
             
             }
			//echo $sqlGetData;
			$result_data=$this->mysqli->query($sqlGetData);
			
			$idEstilo=""; //1
			$linea=""; //2
			$estilo=""; //3
			$material=""; //4
			$color=""; //5
			$pares=""; //16
			$Importe=""; //17
			$idCliente="";
			$data_="";
            
      
                
           
            
			if($result_data){
				$num=mysqli_num_rows($result_data);
				//echo $num;
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata=mysqli_fetch_object($result_data);
					
					
					$idEstilo=$rowdata->idEstilo;
					$linea=$rowdata->linea;
					$estilo=$rowdata->estilo;
					$material=$rowdata->material;
					$color=$rowdata->color;
					$pares=$rowdata->pares;
					$precio=$rowdata->precio;
					$total=$rowdata->Importe;
					
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
						
						$foto=$res.".gif";
					                    
                    $data_= $data_ . "<div id='divCarro1'>";
                  $data_= $data_ . "<div id='divImg1'><img src='../imagenes_system/muestras/miniminis/$foto' name='carroImg1' width='48' height='48' id='carroImg1' /></div>";
                  $data_= $data_ . "<div class='numEstilo' id='carroLinea1'><strong>$estilo</strong></div>";
                  $data_= $data_ . "<div class='infoEstilo' id='carroNombreEstilo1'><strong>$material $color</strong></div>";
                  $data_= $data_ . "<div id='linDivsm'><img src='../../source/linea-sm.png' width='109' height='5' /></div>";
                  $data_= $data_ . "<div class='infoPrecio' id='carroPrecio1'>Precio:$precio </div>";
                  $data_= $data_ . "<div id='divChk'>";
                    $data_= $data_ . "<label>";
                      $data_= $data_ . "<input type='checkbox' name='chk". ($i+1) ."' id='chk". ($i+1) ."' />";
                    $data_= $data_ . "</label>";
                  $data_= $data_ . "</div>";
                $data_= $data_ . "</div>";
              $data_= $data_ . "</div>";
              $data_= $data_ . "<label id='carroIdEstilo". ($i+1) ."' style='display:none'>$idEstilo</div>";					
              			
                    
					
				}
			}
        
			$data_= $data_ . "<label id='lblCantidadEnCarrito' style='display:none'>$num</label>";
			//echo $data_;
			return $data_;
		}
		function eliminarElementosCarroidEstilo($idTienda, $idEstilo,$seccionCatalogo){
			
			$arrayTemp=array();
			$indexCarrito=0;
		
                    if($seccionCatalogo=="Distribuidores"){
						$sql="delete from carrito_pedido_detalle where idTienda=$idTienda and idEstilo='$idEstilo' ";
						
						
                    }
                    if($seccionCatalogo=="Sugerencias"){
						$sql="delete from carrito_pedido_detalle_sugerencias where idTienda=$idTienda  and idEstilo='$idEstilo'";
					
                    }
                    if($seccionCatalogo=="Inventario"){
						$sql="delete from carrito_pedido_detalle_inventario where idTienda=$idTienda  and idEstilo='$idEstilo'";
						
                    }
                    if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
                    	$sql="delete from carrito_pedido_detalle_operaciones where idTienda=$idTienda  and idEstilo='$idEstilo' ";
						
						
                    }
					$this->mysqli->query($sql);
					
					//$this->eliminarElementosCarroidEstiloLimpia($idTienda,$seccionCatalogo);
		
			
		}
		
		function eliminarElementosCarroidEstiloLimpia($idTienda,$seccionCatalogo){
	        if($seccionCatalogo=="Distribuidores"){
				//$sql=" select * from carrito_pedido_detalle where idTienda=$idTienda ";
				$sqlDel=" delete from carrito_pedido where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="Sugerencias"){
				//$sql=" select * from carrito_pedido_detalle_sugerencias where idTienda=$idTienda ";
				$sqlDel=" delete  from carrito_pedido_sugerencias where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="Inventario"){
				//$sql=" select * from carrito_pedido_detalle_inventario where idTienda=$idTienda ";
				$sqlDel=" delete  from carrito_pedido_inventario where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
            	//$sql=" select * from carrito_pedido_detalle_operaciones where idTienda=$idTienda ";
				$sqlDel=" delete  from carrito_pedido_operaciones where idTienda=$idTienda ";
            }
			$result=$this->mysqli->query($sqlDel);
			echo  "$sqlDel";
			/*$resultado_=" ";
			$idCarPed="";
			$eliminar=true;
			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				if($num>0)
				{	
					$eliminar=false;	
					$rowdata = mysqli_fetch_object($result);
					$idCarPed = $rowdata->idCarPed;
				}
			}
			
			if($eliminar){
				$result=$this->mysqli->query($sqlDel);
			}
			echo "$sqlDel";*/
		}
        
		
		
		function eliminarElementosCarro($idTienda, $idEstilo,$seccionCatalogo){
			
			$arrayTemp=array();
			$indexCarrito=0;
		/*	$arrayIdxDeleted=array();
			$arrayIdxDeleted=explode(";",$strArrayEstilosDeleted);
			echo =$arrayIdxDeleted;
			$tamIdxDeleted=count($arrayIdxDeleted);
*/
			
			//$idCarPed=$this->getIdCarPed($idTienda,$seccionCatalogo);
			//if($idCarPed!=""){
			//	for($i=0;$i<$tamIdxDeleted;$i++){
			//		$idEstilo="$arrayIdxDeleted[$i]";
                    if($seccionCatalogo=="Distribuidores"){
						$sql="delete from carrito_pedido_detalle where idTienda=$idTienda ";
						$sqlGen="delete from carrito_pedido where idTienda=$idTienda ";
                    }
                    if($seccionCatalogo=="Sugerencias"){
						$sql="delete from carrito_pedido_detalle_sugerencias where idTienda=$idTienda ";
						$sqlGen="delete from carrito_pedido_sugerencias where idTienda=$idTienda ";
                    }
                    if($seccionCatalogo=="Inventario"){
						$sql="delete from carrito_pedido_detalle_inventario where idTienda=$idTienda ";
						$sqlGen="delete from carrito_pedido_inventario where idTienda=$idTienda ";
                    }
                    if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
                    	$sql="delete from carrito_pedido_detalle_operaciones where idTienda=$idTienda ";
						$sqlGen="delete from carrito_pedido_operaciones where idTienda=$idTienda ";
						
                    }
					$this->mysqli->query($sql);
					$this->mysqli->query($sqlGen);
			//	}
			//}
			
		}
		function getIdCarPed($idTienda,$seccionCatalogo){
	        if($seccionCatalogo=="Distribuidores"){
				$sql=" select * from carrito_pedido where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="Sugerencias"){
				$sql=" select * from carrito_pedido_sugerencias where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="Inventario"){
				$sql=" select * from carrito_pedido_inventario where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
            	$sql=" select * from carrito_pedido_operaciones where idTienda=$idTienda ";
            }
			$result=$this->mysqli->query($sql);
			$resultado_=" ";
			$idCarPed="";
			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				if($num>0)
				{	
					$rowdata = mysqli_fetch_object($result);
					$idCarPed = $rowdata->idCarPed;
				}
			}	
			return $idCarPed;
		}
        
        //******
		function registraCarroPedidoPorClienteSinClaves($idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$seccionCatalogo){
			$idCarPed="";
			//$idCarPed=$this->existeEstiloEnCarroPedidoRegistrado($idCliente,$idEstilo,$seccionCatalogo); //ok
			$idCarPed=$this->existeCarroPedidoRegistrado($idTienda,$seccionCatalogo); //ok
			
			if($idCarPed==""){
				
				$this->registraCarroPedidoEnCliente($idTienda,$fecha,$hora,$observacion,$seccionCatalogo);//ok
				
				$idCarPed=$this->existeCarroPedidoRegistrado($idTienda,$seccionCatalogo);//ok
				
				$this->registra_carrito_pedido_detalle_cliente_sinClaves($idCarPed,$idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$seccionCatalogo);//ok
			
			}
            else{
            	$this->registra_carrito_pedido_detalle_cliente_sinClaves($idCarPed,$idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$seccionCatalogo);//ok
            }
			$carrito="";//$this->getDatosCarrito($idCliente,$seccionCatalogo);
			echo $carrito;
			return $carrito;
		}
        //****
		function registraCarroPedidoPorCliente($idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$strArrayPedido,$seccionCatalogo){
			$idCarPed="";
			$idCarPed=$this->existeEstiloEnCarroPedidoRegistrado($idTienda,$idEstilo,$seccionCatalogo);//ok
			
			if($idCarPed==""){
				
				$this->registraCarroPedidoEnCliente($idTienda,$fecha,$hora,$observacion,$seccionCatalogo);//ok
				
				$idCarPed=$this->existeCarroPedidoRegistrado($idTienda,$seccionCatalogo);//ok
				
				$this->registra_carrito_pedido_detalle_cliente($idCarPed,$idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$strArrayPedido,$seccionCatalogo);//ok
			
			}
			$carrito=$this->getDatosCarrito($idTienda,$seccionCatalogo);//ok
			echo $carrito;
			return $carrito;
		}
		
		function registraCarroPedidoEnCliente($idTienda,$fecha,$hora,$observacion,$seccionCatalogo){
        	if($seccionCatalogo=="Distribuidores"){
				$sql = " insert into carrito_pedido (idTienda,fecha,hora,observacion) values ($idTienda,'$fecha $hora','$fecha $hora','$observacion') ";
            }
            if($seccionCatalogo=="Sugerencias"){
				$sql = " insert into carrito_pedido_sugerencias (idTienda,fecha,hora,observacion) values ($idTienda,'$fecha $hora','$fecha $hora','$observacion') ";
            }
            if($seccionCatalogo=="Inventario"){
				$sql = " insert into carrito_pedido_inventario (idTienda,fecha,hora,observacion) values ($idTienda,'$fecha $hora','$fecha $hora','$observacion') ";
            }
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
				$sql = " insert into carrito_pedido_operaciones (idTienda,fecha,hora,observacion) values ($idTienda,'$fecha $hora','$fecha $hora','$observacion') ";
            }
            

				$result_data=$this->mysqli->query($sql);
			
		}
	
		function existeCarroPedidoRegistrado($idTienda,$seccionCatalogo){
			$idCarPed="";
			if($seccionCatalogo=="Distribuidores"){
				$sql=" select idCarPed from carrito_pedido where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="Sugerencias"){
				$sql=" select idCarPed from carrito_pedido_sugerencias where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="Inventario"){
				$sql=" select idCarPed from carrito_pedido_inventario where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
				$sql=" select idCarPed from carrito_pedido_operaciones where idTienda=$idTienda ";
            }
			
			
			if($resul=$this->mysqli->query($sql)){
				$num=mysqli_num_rows($resul);
				if($num>0){
					if($rowdata=mysqli_fetch_object($resul)){
						$idCarPed=$rowdata->idCarPed;
					}
					
				}
				
			}	

			return $idCarPed;	
		}
		function existeEstiloEnCarroPedidoRegistrado($idTienda,$idEstilo,$seccionCatalogo){
			$idCarPed="";
			
            if($seccionCatalogo=="Distribuidores"){
				$sql=" select idCarPed from carrito_pedido_detalle where idTienda=$idTienda and idEstilo=$idEstilo";
			}
            if($seccionCatalogo=="Sugerencias"){
            	$sql=" select idCarPed from carrito_pedido_detalle_sugerencias where idTienda=$idTienda and idEstilo=$idEstilo";
            }
			if($seccionCatalogo=="Inventario"){
            	$sql=" select idCarPed from carrito_pedido_detalle_inventario where idTienda=$idTienda and idEstilo=$idEstilo";
            }
            if($seccionCatalogo=="Programacion" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="InventarioEmpresa" ){
            	$sql=" select idCarPed from carrito_pedido_detalle_operaciones where idTienda=$idTienda and idEstilo=$idEstilo";
            }
            
			if($resul=$this->mysqli->query($sql)){
				$num=mysqli_num_rows($resul);
				if($num>0){
					if($rowdata=mysqli_fetch_object($resul)){
						$idCarPed=$rowdata->idCarPed;
					}
					
				}
				
			}	

			return $idCarPed;	
		}
        function registra_carrito_pedido_detalle_sinClaves($idCarPed,$idEstilo,$precio,$seccionCatalogo,$idTienda){
        	if($seccionCatalogo=="Distribuidores"){
				$sql = " insert into carrito_pedido_detalle (idCarPed,idEstilo,precio,idTienda) values ($idCarPed,$idEstilo,$precio,$idTienda) ";
             }
             if($seccionCatalogo=="Sugerencias"){
				$sql = " insert into carrito_pedido_detalle_sugerencias (idCarPed,idEstilo,precio,idTienda) values ($idCarPed,$idEstilo,$precio,$idTienda) ";
             }
             if($seccionCatalogo=="Inventario"){
				$sql = " insert into carrito_pedido_detalle_inventario (idCarPed,idEstilo,precio,idTienda) values ($idCarPed,$idEstilo,$precio,$idTienda) ";
             }
             if($seccionCatalogo=="Programacion" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="InventarioEmpresa" ){
             	$sql = " insert into carrito_pedido_detalle_operaciones (idCarPed,idEstilo,precio,idTienda) values ($idCarPed,$idEstilo,$precio,$idTienda) ";
             }
			 	
				$result_data=$this->mysqli->query($sql);
			}
		function registra_carrito_pedido_detalle($idCarPed,$idEstilo,$clave_pedido,$cantidad,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$precio,$Pares,$seccionCatalogo){
			if($seccionCatalogo=="Distribuidores"){
                $sql = " insert into carrito_pedido_detalle (idCarPed,idEstilo,clave_pedido,cantidad,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,Pares,precio) values ($idCarPed,$idEstilo,'$clave_pedido',$cantidad,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$Pares,$precio) ";
			}
            if($seccionCatalogo=="Sugerencias"){
                $sql = " insert into carrito_pedido_detalle_sugerencias (idCarPed,idEstilo,clave_pedido,cantidad,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,Pares,precio) values ($idCarPed,$idEstilo,'$clave_pedido',$cantidad,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$Pares,$precio) ";
			}
			if($seccionCatalogo=="Inventario"){
                $sql = " insert into carrito_pedido_detalle_inventario (idCarPed,idEstilo,clave_pedido,cantidad,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,Pares,precio) values ($idCarPed,$idEstilo,'$clave_pedido',$cantidad,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$Pares,$precio) ";
			}
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
            	    $sql = " insert into carrito_pedido_detalle_operaciones (idCarPed,idEstilo,clave_pedido,cantidad,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,Pares,precio) values ($idCarPed,$idEstilo,'$clave_pedido',$cantidad,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$Pares,$precio) ";
            }            
				$result_data=$this->mysqli->query($sql);
				
				
			}
        function registra_carrito_pedido_detalle_cliente_sinClaves($idCarPed,$idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$seccionCatalogo){

			$this->registra_carrito_pedido_detalle_sinClaves($idCarPed,$idEstilo,$precio,$seccionCatalogo,$idTienda);//ok
				
		}
		function registra_carrito_pedido_detalle_cliente($idCarPed,$idTienda,$fecha,$hora,$observacion,$idEstilo,$precio,$strArrayPedido,$seccionCatalogo){

			$array_carrito_pedido_detalle =explode(']', $strArrayPedido);
			$size=count($array_carrito_pedido_detalle);

			if($size>1){
				
				//$idEstilo = $carrayElementoCarro[1];
				//$tipo = $carrayElementoCarro[2];
				//$clave_pedido = $carrayElementoCarro[4];
				
				
				for($i=1;$i<($size);$i++){
					
					$arrayElementoCarro=explode(';',$array_carrito_pedido_detalle[$i]);
					 
					$clavePedido= $arrayElementoCarro[0];
					
					$cantClaves = $arrayElementoCarro[1];
					$N2 = $arrayElementoCarro[2];
					$N2m = $arrayElementoCarro[3];
					$N3 = $arrayElementoCarro[4];
					$N3m = $arrayElementoCarro[5];
					$N4 = $arrayElementoCarro[6];
					$N4m = $arrayElementoCarro[7];
					$N5 = $arrayElementoCarro[8];
					$N5m = $arrayElementoCarro[9];
					$N6 = $arrayElementoCarro[10];
					$N6m = $arrayElementoCarro[11];
					$Pares = $arrayElementoCarro[12];
					$total =  $carrayElementoCarro[18];
					$observacion =  $carrayElementoCarro[19];
					$this->registra_carrito_pedido_detalle($idCarPed,$idEstilo,$clavePedido,$cantClaves,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$precio,$Pares,$seccionCatalogo); //ok
				}
			}
		}
        function registra_pedido_por_cliente($idTienda,$sitioPedido,$idVendedor,$TotalPares,$subtotal,$datos,$seccionCatalogo,$txtPedidoCargo,$comboLugarPedido){
        	date_default_timezone_set("Mexico/General");
            $fechahora=date("Y-m-d H:i:s");
            $fecha=date("Y-m-d");
            $hora=date("H:i:s");
			$idPedido="";
			$sql="";
            if($seccionCatalogo=="Distribuidores"){
            	$sql= "select * from carrito_pedido where idTienda=$idTienda  ";
            }
        	if($seccionCatalogo=="Sugerencias"){
            	$sql= "select * from carrito_pedido_sugerencias where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="Inventario"){
            	$sql= "select * from carrito_pedido_inventario where idTienda=$idTienda ";
            }
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
           		$sql= "select * from carrito_pedido_operaciones where idTienda=$idTienda ";
            }

            $result_rec=$this->mysqli->query($sql);
            $idPed="";
            $fechaPedido=$fechahora;
            $idCarPed="";
            if($result_rec=$this->mysqli->query($sql)){
                $num=mysqli_num_rows($result_rec);
                if($num>0){
                    if($rowdata=mysqli_fetch_object($result_rec)){
                        $idCarPed=$rowdata->idCarPed;
                        $observacion=$rowdata->observacion;
                      
                    }
                }
            }

            if($idCarPed<>""){

                $arrayElementosCarro= explode(';', $datos);
                $tam = count($arrayElementosCarro)-1;
                
                $idPedido= $this->confirma_pedido($idTienda,$fechaPedido,$sitioPedido,$observacion,$idVendedor,$idCarPed,$TotalPares,$subtotal,$seccionCatalogo,$txtPedidoCargo,$comboLugarPedido);

                for($i=0;$i<$tam;$i++){

                    $arrayElemento =explode(",",$arrayElementosCarro[$i]);
                    
                    $idEstilo=$valEstilo =$arrayElemento[0];
                    $paq =$arrayElemento[1];
                    $cantPaq=$arrayElemento[2];
                    $n2_=$arrayElemento[3];
                    $n2m_=$arrayElemento[4];
                    $n3_=$arrayElemento[5];
                    $n3m_=$arrayElemento[6];
                    $n4_=$arrayElemento[7];
                    $n4m_=$arrayElemento[8];
                    $n5_=$arrayElemento[9];
                    $n5m_=$arrayElemento[10];
                    $n6_=$arrayElemento[11];
                    $n6m_=$arrayElemento[12];
                    $valor=$arrayElemento[13];
                    $valorPares=$arrayElemento[14];
                    $precio=$arrayElemento[15];
                    $importe=$arrayElemento[16];
                    
                    $this->confirma_carrito_en_pedido($idPedido,$idEstilo,$paq,$cantPaq,$n2_,$n2m_,$n3_,$n3m_,$n4_,$n4m_,$n5_,$n5m_,$n6_,$n6m_,$valorPares,$precio,$importe);                    
                }
                $this->limpiarCarroClienteTienda($idTienda,$seccionCatalogo);

                return  $idPedido; 
                
            }
            else{
            	echo "No se encontro pedido registrado ";
            }
               
        }
		function registra_carrito_por_tienda($idTienda,$sitioPedido,$idVendedor,$TotalPares,$subtotal,$datos,$seccionCatalogo,$txtPedidoCargo,$comboLugarPedido){
        	date_default_timezone_set("Mexico/General");
            $fechahora=date("Y-m-d H:i:s");
            $fecha=date("Y-m-d");
            $hora=date("H:i:s");
			$idPedido="";
			$sql="";
           
		   if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
           		$sql= "select * from carrito_pedido_operaciones where idTienda=$idTienda ";
            }

            $result_rec=$this->mysqli->query($sql);
            $idPed="";
            $fechaPedido=$fechahora;
            $idCarPed="";
            if($result_rec=$this->mysqli->query($sql)){
                $num=mysqli_num_rows($result_rec);
                if($num>0){
                    if($rowdata=mysqli_fetch_object($result_rec)){
                        $idCarPed=$rowdata->idCarPed;
                        $observacion=$rowdata->observacion;
                      
                    }
                }
            }


                $arrayElementosCarro= explode(';', $datos);
                $tam = count($arrayElementosCarro)-1;
                
              //  $idPedido= $this->confirma_pedido_carrito($idTienda,$fechaPedido,$sitioPedido,$observacion,$idVendedor,$idCarPed,$TotalPares,$subtotal,$seccionCatalogo,$txtPedidoCargo,$comboLugarPedido);

                for($i=0;$i<$tam;$i++){

                    $arrayElemento =explode(",",$arrayElementosCarro[$i]);
                    
                    $idEstilo=$valEstilo =$arrayElemento[0];
                    $paq =$arrayElemento[1];
                    $cantPaq=$arrayElemento[2];
                    $n2_=$arrayElemento[3];
                    $n2m_=$arrayElemento[4];
                    $n3_=$arrayElemento[5];
                    $n3m_=$arrayElemento[6];
                    $n4_=$arrayElemento[7];
                    $n4m_=$arrayElemento[8];
                    $n5_=$arrayElemento[9];
                    $n5m_=$arrayElemento[10];
                    $n6_=$arrayElemento[11];
                    $n6m_=$arrayElemento[12];
                    $valor=$arrayElemento[13];
                    $valorPares=$arrayElemento[14];
                    $precio=$arrayElemento[15];
                    $importe=$arrayElemento[16];
                    
                    $this->confirma_carrito_en_pedido_carrito($idCarPed,$idTienda,$idEstilo,$paq,$cantPaq,$n2_,$n2m_,$n3_,$n3m_,$n4_,$n4m_,$n5_,$n5m_,$n6_,$n6m_,$valorPares,$precio,$importe);                    
                }
                //$this->limpiarCarroClienteTienda($idTienda,$seccionCatalogo);

                return  $idPedido; 
             
               
        }
		function getNoPedido($tipoPedido){
			if($tipoPedido=="expo"){
				$sql = "select Cons from consecutivos where NombreCons='NoPedidoExpo'";	
			}
			else{
				$sql = "select Cons from consecutivos where NombreCons='NoPedidoLocal'";	
			}
			
			$Cons=0;
			$result_rec=$this->mysqli->query($sql);
			if($result_rec=$this->mysqli->query($sql)){
                    $num=mysqli_num_rows($result_rec);
                    if($num>0){
                        if($rowdata=mysqli_fetch_object($result_rec)){
						    $Cons=$rowdata->Cons;
                        }
                    }
                }
			$noPedido = "";	
			if($tipoPedido=="expo"){
				$noPedido = "$Cons"."E";
			}
            else{
				$noPedido = "$Cons"."F";
			}  
			
            return $noPedido;
				
		}
		function getNoPedido2($tipoPedido){
			if($tipoPedido=="expo"){
				$sql = "select Cons from consecutivos where NombreCons='NoPedidoExpo'";	
			}
			else{
				$sql = "select Cons from consecutivos where NombreCons='NoPedidoLocal'";	
			}
			
			$Cons=0;
			$result_rec=$this->mysqli->query($sql);
			if($result_rec=$this->mysqli->query($sql)){
                    $num=mysqli_num_rows($result_rec);
                    if($num>0){
                        if($rowdata=mysqli_fetch_object($result_rec)){
						    $Cons=$rowdata->Cons;
                        }
                    }
                }
			$noPedido = "";	
			if($tipoPedido=="expo"){
				$noPedido = "$Cons";
			}
            else{
				$noPedido = "$Cons";
			}  
			
            return $noPedido;
				
		}
		function incrementaNoPedido($tipoPedido){
			
			$consPedido = $this->getNoPedido($tipoPedido);
			$consPedido=$consPedido+1;
			$sql = "update consecutivos set Cons=$consPedido where NombreCons='NoPedidoExpo' ";
			$result_rec=$this->mysqli->query($sql);
			
			$noPedido = "";	
			if($tipoPedido=="expo"){
				$noPedido = "$consPedido"."E";
			}
            if($tipoPedido=="fabrica"){
				$noPedido = "$consPedido"."F";
			}  
			echo "$noPedido";
            return $noPedido;
				
		}
        function confirma_pedido($idTienda,$fechaPedido,$sitioPedido,$observacion,$idVendedor,$idCarPed,$pares,$totalPedido,$seccionCatalogo,$txtPedidoCargo,$comboLugarPedido){
				$noPedido= $this->incrementaNoPedido("expo");
				
                $sql = " insert into pedidos (idPed,idTienda,fechaPedido,sitioPedido,idVendedor,idCarPed,pares,totalPedido,seccionCatalogo,levantoPedido,lugarPedido,fechaRegistro) values ('$noPedido',$idTienda,'$fechaPedido','$sitioPedido',$idVendedor,$idCarPed,$pares,$totalPedido,'$seccionCatalogo','$txtPedidoCargo','$comboLugarPedido','$fechaPedido') ";

				$result_data=$this->mysqli->query($sql);
                
              /*  $sql= "select * from pedidos where idCarPed=$idCarPed and DATE_FORMAT(fechaPedido,'%Y-%m-%d %H:%i:%s')='$fechaPedido' ";

                $result_rec=$this->mysqli->query($sql);
                $idPed="";
                if($result_rec=$this->mysqli->query($sql)){
                    $num=mysqli_num_rows($result_rec);
                    if($num>0){
                        if($rowdata=mysqli_fetch_object($result_rec)){
                            $idPed=$rowdata->idPed;
                        }
                    }
                }*/
                
                return $noPedido;
                
 		}
       
        function confirma_carrito_en_pedido($idPedido,$idEstilo,$paquete,$cantPaq,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$pares,$precio,$total){
				$sql = " insert into pedidos_detalle (idPedido,idEstilo,clvPaq,cantPaq,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,pares,precio,total) values ('$idPedido',$idEstilo,'$paquete',$cantPaq,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$pares,$precio,$total) ";

				$result_data=$this->mysqli->query($sql);
		}
		
		 function confirma_carrito_en_pedido_carrito($idCarPed,$idTienda,$idEstilo,$paquete,$cantPaq,$N2,$N2m,$N3,$N3m,$N4,$N4m,$N5,$N5m,$N6,$N6m,$pares,$precio,$total){
			 	
				$sql = " update carrito_pedido_detalle_operaciones set N2=$N2,N2m=$N2m,N3=$N3,N3m=$N3m,N4=$N4,N4m=$N4m,N5=$N5,N5m=$N5m,N6=$N6,N6m=$N6m,pares=$pares,precio=$precio,total=$total where idTienda=$idTienda and idCarPed=$idCarPed and idEstilo=$idEstilo";
				echo "$sql";
				$result_data=$this->mysqli->query($sql);
		}
        function limpiarCarroCliente($idCarPed,$seccionCatalogo){
            if($seccionCatalogo=="Distribuidores"){
                $sql = " delete from carrito_pedido where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);
                
                $sql = " delete from carrito_pedido_detalle where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);
                
	        }
            if($seccionCatalogo=="Sugerencias"){
                $sql = " delete from carrito_pedido_sugerencias where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);
                
                $sql = " delete from carrito_pedido_detalle_sugerencias where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);
            }
            if($seccionCatalogo=="Inventario"){
                $sql = " delete from carrito_pedido_inventario where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);
     
                $sql = " delete from carrito_pedido_detalle_inventario where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);
         
            }
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
           	    $sql = " delete from carrito_pedido_operaciones where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);

                $sql = " delete from carrito_pedido_detalle_operaciones where idCarPed=$idCarPed ";
                $result_delcarped=$this->mysqli->query($sql);

				
				
				
            }
            
        }
		function limpiarCarroClienteTienda($idTienda,$seccionCatalogo){
            if($seccionCatalogo=="Distribuidores"){
                $sql = " delete from carrito_pedido where idTienda=$idTienda ";
                $result_delcarped=$this->mysqli->query($sql);
                
                $sql = " delete from carrito_pedido_detalle where idTienda=$idTienda ";
                $result_delcarped=$this->mysqli->query($sql);
                
	        }
            if($seccionCatalogo=="Sugerencias"){
                $sql = " delete from carrito_pedido_sugerencias where idTienda=$idTienda ";
                $result_delcarped=$this->mysqli->query($sql);
                
                $sql = " delete from carrito_pedido_detalle_sugerencias where idTienda=$idTienda ";
                $result_delcarped=$this->mysqli->query($sql);
            }
            if($seccionCatalogo=="Inventario"){
                $sql = " delete from carrito_pedido_inventario where idTienda=$idTienda ";
                $result_delcarped=$this->mysqli->query($sql);
                echo "<br /> $sql";
                $sql = " delete from carrito_pedido_detalle_inventario where idTienda=$idTienda ";
                $result_delcarped=$this->mysqli->query($sql);
                echo "<br /> <- $sql  ->";
            }
            if($seccionCatalogo=="InventarioEmpresa" || $seccionCatalogo=="Temporadas" || $seccionCatalogo=="Programacion"){
           	   
				$sqlRec="select idCarPed from carrito_pedido_operaciones where idTienda=$idTienda ";
                $idCarPed="";
                if($result_rec=$this->mysqli->query($sqlRec)){
                    $num=mysqli_num_rows($result_rec);
                    if($num>0){
						for($i=0;$i<$num;$i++){
                        	if($rowdata=mysqli_fetch_object($result_rec)){
								$idCarPed=$rowdata->idCarPed;
								$sql = " delete from carrito_pedido_detalle_operaciones where idCarPed=$idCarPed ";
								$result_delcarped=$this->mysqli->query($sql);

                        	}
						}
                    }
                }
				$sql = " delete from carrito_pedido_operaciones where idTienda=$idTienda ";
                $result_delcarped=$this->mysqli->query($sql);

				
            }
            
        }
        function registro_contacto($txtNombre,$txtCalle,$txtColonia,$txtCP,$txtPais,$txtidEstado,$txtidMunicipio,$txtTelefono,$txtEmailCliente,$txtMensaje,$idCategoriaContacto){
        	date_default_timezone_set("Mexico/General");
            $fecharegistro=date("Y-m-d H:i:s");
            
            $sql="insert into contacto (nombre,calle,colonia,pais,idEstado,idMunicipio,cp,telefono,email,mensaje,fecharegistro,idCategoriasContacto) values ('$txtNombre','$txtCalle','$txtColonia','$txtPais','$txtidEstado','$txtidMunicipio','$txtCP','$txtTelefono','$txtEmailCliente','$txtMensaje','$fecharegistro','$idCategoriaContacto')";
            $result=$this->mysqli->query($sql);
            return "";
        }
	}
	if(isset($_REQUEST['funcion'])){
		$option=$_REQUEST['funcion'];
		if($option =="getDatosCarrito"){
			$registroCarrito=new carrito();
			$idCliente=$_REQUEST['idCliente'];	
			$registroCarrito->getDatosCarrito($idCliente);
		}
	}
	//$miprueba=new carrito();
	//echo $miprueba->deleteItemCarrito('1',"chk_0;");
	
?>