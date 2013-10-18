<?php 
	
	class carrito{
		function __construct(){
			$this->conectarToDB("locahost","user_web","123454321","newcolors");
		}
		function init(){
			
		}
		function getLineas(){
			$idCatalogo=1;
			//$sql=" SELECT estilos.Linea as lineas FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.activo=1 GROUP BY estilos.Linea HAVING estilos.activo = 1 ";
			
			$sql="SELECT distinct(estilos.Linea) as lineas from estilos where estilos.activo=1 order by Linea";


			$result=$this->mysqli->query($sql);
			$resultado_=" ";
			if($result){
				$num=mysqli_num_rows($result);
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata=mysqli_fetch_object($result);
					$linea=$rowdata->lineas;
					//$resultado_=$resultado_."<input name=\"btnLinea\" class=\"botonLinea\" value=\"$linea\" type=\"submit\" onclick=\"extraerDatosLinea(this.value);\" \"><br/>";
					$resultado_=$resultado_."<input name='btnLinea' class='botonLinea' value='$linea' type='submit' onclick='javascript:llamarasincrono('getEstilosLineas.php?linea=$linea', 'cuadroEstilo')'><br/>";
					
				}
			}	
			return $resultado_;
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
					$resultado_=$resultado_."<input name=\"btnLinea\" class=\"botonLinea\" value=\"$linea\" type=\"submit\" onclick=\"extraerDatosLinea(this.value);\" \"><br/>";
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
				$posy=-60;
				while($row<$num)
				{	
					$row++;
					$rowdata=mysqli_fetch_object($result);
					$estilo=$rowdata->estilo_o;
					
					$posy_estilo=$posy+50;
					
					$resultado.= "<div class=\"lineaEstilo\">";
            	    
            	    $resultado.= "<span class=\"nombreLinea\">";
					
            	    $resultado.= "<span class=\"numeritoLinea\"><label style='position:absolute;left:0px;top: {$posy_estilo}px;z-index:100'>$estilo</label>";
					
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
					
					$resultado.= "<div id=\"hrefOrigenFoto$idEstilo\"  class=\"link\">";
					$posx_imagen=$posx+15;
					$resultado.= "<img id=\"imgEst$idEstilo\" src=\"http://www.newcolors.mx/fotos/lotes/minis/$foto\" style=\"left: {$posx_imagen}px; top: {$posy}px;\" class=\"imagen\" onmouseover=\"javascript:this.value='$idEstilo';posicionaImagen('divimggaleria','imgEst$idEstilo','imggaleria','http://www.newcolors.mx/fotos/lotes/normal/$foto',event,'hrefOrigenFoto$idEstilo','hrefImgGaleria')\">";
					
					

					$posy_nombre=$posy+80;
       	            $resultado.= "<label class=\"nombreEstilo\" style=\"left: {$posx}px; top: {$posy_nombre}px;position: absolute; z-index: 100;\">L:$lote $material $color</label>";
                    $resultado.= "</div>";
					$posx+=$incremento;
					}
			  $resultado.= "</span>";
       	      $resultado.= "</div>";
					$posy+=$incrementoy;
					$posy_fondo_estilo=$posy+40;
					$resultado.= "<span class=\"fondoestilo\" style='position:absolute;left:0px;top: {$posy_fondo_estilo}px;z-index:4'></span>";
					
				}

			}
			return $resultado;
		}
		
		function getEstilosFromLinea($linea){
			$idCatalogo=1;
	
			$sql="SELECT estilos.Estilo as estilo_o
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.linea='$linea' 
GROUP BY estilos.Estilo order by estilo";
			$result=$this->mysqli->query($sql);
			$resultado="";
			if($result){
				$num=mysqli_num_rows($result);
				$row=0;
				$posy=-60;
				while($row<$num)
				{	
					$row++;
					$rowdata=mysqli_fetch_object($result);
					$estilo=$rowdata->estilo_o;
					
					$posy_estilo=$posy+50;
					
					$resultado.= "<div class=\"lineaEstilo\">";
            	    
            	    $resultado.= "<span class=\"nombreLinea\">";
					
            	    $resultado.= "<span class=\"numeritoLinea\"><label style='position:absolute;left:0px;top: {$posy_estilo}px;z-index:100'>$estilo</label>";
					
					$n_catalogo=1;
	
					$queryColores = " SELECT estilos.id as idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.estilo='$estilo' 
GROUP BY estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color ";

					$resColores = $this->mysqli->query($queryColores);
					
					$numColores=mysqli_num_rows($resColores);
					$cont=0;
					$posx=30;
					
					$incremento=130;
					$incrementoy=135;
					for ($i_c=0;$i_c<$numColores;$i_c++){
						$cont++;
						$rowEstilos=mysqli_fetch_object($resColores);
						$material=$rowEstilos->Material;
						$color=$rowEstilos->Color;
						$idEstilo=$rowEstilos->idEstilo;
						$estilo=$rowEstilos->Estilo;
						
						
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
					
					$resultado.= "<div id=\"hrefOrigenFoto$idEstilo\"  class=\"link\">";
					$posx_imagen=$posx+15;
					$resultado.= "<img id=\"imgEst$idEstilo\" src=\"http://www.newcolors.mx/img/catalogo/minis/$foto\" style=\"left: {$posx_imagen}px; top: {$posy}px;\" class=\"imagen\" onmouseover=\"javascript:this.value='$idEstilo';posicionaImagen('divimggaleria','imgEst$idEstilo','imggaleria','http://www.newcolors.mx/fotos/galeria/$foto',event,'hrefOrigenFoto$idEstilo','hrefImgGaleria')\">";
					
					

					$posy_nombre=$posy+80;
       	            $resultado.= "<label class=\"nombreEstilo\" style=\"left: {$posx}px; top: {$posy_nombre}px;position: absolute; z-index: 100;\">$material $color</label>";
                    $resultado.= "</div>";
					$posx+=$incremento;
					}
			  $resultado.= "</span>";
       	      $resultado.= "</div>";
					$posy+=$incrementoy;
					$posy_fondo_estilo=$posy+40;
					$resultado.= "<span class=\"fondoestilo\" style='position:absolute;left:0px;top: {$posy_fondo_estilo}px;z-index:4'></span>";
					
				}

			}
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
		function getCategoriasCatalogos($idEstilo){
			
			$sql=" select * from catalogos_categoria ";
			$result=$this->mysqli->query($sql);
			$resultado_=" ";

			if($result){
				$num=mysqli_num_rows($result);
				$cons = 1;
				for ($i=0;$i<$num;$i++)
				{	
					
					$rowdata = mysqli_fetch_object($result);
					$idCategoria = $rowdata->idCategoria;
					$categoria = $rowdata->categoria;
					
					$resultado_=$resultado_."<option selected='selected' value='$categoria'>$categoria</option>";
					$cons=$cons+1;
				}
			}	

			return $resultado_;
			
		}
		
		
		function conectarToDB($server,$user,$passwd,$database){
			$this->mysqli = new mysqli($server, $user, $passwd, $database);

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
		
		function getDatosCarrito($idCliente){
			$sqlGetData = " select carrito_cotizacion_detalle.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,carrito_cotizacion_detalle.idEstilo,sum(N2*cant) as s2,sum(N2m) as s2m,sum(N3) as s3,sum(N3m) as s3m,sum(N4) as s4,sum(N4m*cant) as s4m,sum(N5) as s5,
sum(N5m) as s5m,sum(N6) as s6,sum(N6m) as s6m,sum(Pares) as Pares,carrito_cotizacion_detalle.precio,sum(Pares*cant*carrito_cotizacion_detalle.precio) as Total from carrito_cotizacion_detalle, estilos
where idCliente=1 and carrito_cotizacion_detalle.idEstilo=estilos.id
group by idEstilo,precio,estilos.linea,estilos.estilo,estilos.material,estilos.color ";
			
			$result_data=$this->mysqli->query($sqlGetData);
			$data_=""; // 0
			$idEstilo=""; //1
			$temp=""; //
			$linea=""; //2
			$estilo=""; //3
			$material=""; //4
			$color=""; //5
			$N2=""; //6
			$N2m=""; //7
			$N3=""; //8
			$N3m=""; //9
			$N4=""; //10
			$N4m=""; //11
			$N5=""; //12
			$N5m=""; //13
			$N6=""; //14
			$N6m=""; //15
			$pares=""; //16
			$total=""; //17
			$num=0;
			if($result_data){
				$num=mysqli_num_rows($result_data);
				
				for ($i=0;$i<$num;$i++)
				{	
					$rowdata=mysqli_fetch_object($result_data);
					
					
					$idEstilo=$rowdata->idEstilo;
					$temp="";//$rowdata->temp;
					$linea=$rowdata->linea;
					$estilo=$rowdata->estilo;
					$material=$rowdata->material;
					$color=$rowdata->color;
					$N2=$rowdata->s2;
					$N2m=$rowdata->s2m;
					$N3=$rowdata->s3;
					$N3m=$rowdata->s3m;
					$N4=$rowdata->s4;
					$N4m=$rowdata->s4m;
					$N5=$rowdata->s5;
					$N5m=$rowdata->s5m;
					$N6=$rowdata->s6;
					$N6m=$rowdata->s6m;
					$pares=$rowdata->Pares;
					$precio=$rowdata->precio;
					$total=$rowdata->Total;
					
					$data_=$data_ . "$idEstilo;$linea;$estilo;$material;$color;$N2;$N2m;$N3;$N3m;$N4;$N4m;$N5;$N5m;$N6;$N6m;$pares;$total;$idCliente;$num";
					
					if($i<$num-1){
						$data_=$data_ . ",";
					}
				}
			}
			$data_ = $data_ . "#$num";
			return $data_;
		}
		
		function deleteItemCarrito2($idCliente, $strArrayEstilosDeleted){
			
			$arrayTemp=array();
			$indexCarrito=0;
			$arrayIdxDeleted=array();
			$arrayIdxDeleted=split(";",$strArrayEstilosDeleted);
			$tamIdxDeleted=count($arrayIdxDeleted);

			for($i=0;$i<$tamIdxDeleted;$i++){
				$idEstilo="$arrayIdxDeleted[$i]";

				$sql="delete from carrito_cotizacion_detalle where idCliente=$idCliente and idEstilo=$idEstilo";
				$this->mysqli->query($sql);
				echo "< $tamIdxDeleted >";
                echo "$sql";
				
			}
			
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