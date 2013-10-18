           
<link rel="stylesheet" type="text/css" href="ver_estilos_diseno_inventario.css">
<script language="javascript" src="../js/codigo.js"></script>

<div id="divCotenedorEstilosColor">                

  <div id="divSecEstilosDise">
                    <table width="498" height="227" border="0">
                		<tr>
                
<?php 
			$idCatalogo=1;
			$idPlantilla=0;
          //  $linea=$_GET['linea'];
            
			
			$mysqli= new mysqli("locahost","user_web","123454321","newcolors");
			
			$sql="SELECT estilos.Estilo as estilo_o
FROM inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id  GROUP BY estilos.Estilo order by estilo";

			$result=$mysqli->query($sql);
			$resultado="";
			$contadorElems=0;
			if($result){
				$num=mysqli_num_rows($result);
				$row=0;
				$idEstilo="0";
				$estilo="";
				$material="";
				$color="";
				$precio="";
				$primerestilo="";
				$primerprecio="";
				$contElementos=0;
				while($row<$num)
				{	
                	$contElementos++;
					$row++;
					$rowdata=mysqli_fetch_object($result);
					$estilo=$rowdata->estilo_o;
					
					
					
					  
                      $queryColores = " SELECT estilos.id as idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.precio
FROM inventario_lotes_web INNER JOIN estilos ON inventario_lotes_web.idEstilo = estilos.Id where estilo='$estilo' GROUP BY estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color ";

					$resColores = $mysqli->query($queryColores);
					
					$numColores=mysqli_num_rows($resColores);
					$cont=0;
					for ($i_c=0;$i_c < $numColores;$i_c++){
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
			
						for ($r=0;$r< $tam;$r++){
							$car = $nombreFoto[$r];
							if ($car == ' ')
								$car = '-';
							if ($car == 'Ñ')
								$car = 'N';
							if ($car == 'ñ') 
								$car = 'n';
							$res = $res . $car;
						}//fin for nombre
						 
						$foto=$res.".gif";
						
						if($cont==1){
						?>
                        
                        
                    
                    <td >
                    <div id="divConPrEstDise">
                      <div id="divImMedEstiDise_<?php  echo "$estilo"; ?>"><div id="divImgEstiloDisplay" onclick="llamarasincrono('carrito/vista_detalle_diseno.php?idPlantilla=<?php  echo "$idPlantilla"; ?>&idEstilo=<?php  echo "$idEstilo"; ?>&estilo=<?php  echo "$estilo"; ?>&material=<?php  echo "$material"; ?>&color=<?php  echo "$color"; ?>&precio=<?php  echo "$precio"; ?>','cuadroEstilo');"><img src="http://201.120.55.76/imagenes_system/muestras/normal/<?php  echo "$foto";?>" width="126" height="126" /></div></div>
                      
                      <div id="divConMueEstiDise">
                      <table>
                      <tr>
                      
                        
                        <?php 	
						}
                        ?>
                        <td><div id="divImgMatColor" onmouseover="setImagenDiv('divImMedEstiDise_'+<?php  echo "$estilo";?>,'<?php  echo "$foto";?>','<?php  echo "$estilo";?>','<?php  echo "$material";?>','<?php  echo "$color";?>','<?php  echo "$precio";?>','<?php  echo "$idEstilo";?>','<?php  echo "$idPlantilla";?>')" > <img  src="http://201.120.55.76/imagenes_system/muestras/materialcolor/<?php  echo "M_$foto";?>" width="39" height="18" /></div></td>
                        
                        <?php 
						if($cont %3==0)
						{
						?>
                       	</tr>
                            <tr>
                        <?php 
						}
						?>
                        
                        
                        
					<?php                         
                        if($cont==1){
							$primerFoto=$foto;
							$primeridEstilo=$idEstilo;
							$primerestilo=$estilo;
							$primermaterial=$material;
							$primercolor=$color;
							$primerestilomaterialcolor="$estilo $material $color";
                            $primerprecio="$precio";
							?>
                            	
                            	
                            
                            <?php 
						}
				}//fin for colores
                ?>
                      
                </table>
                <div>
                <div class="NomMatEstiloD" id="divNomEstiMattDise">
                        <div align="center"><strong><label class="nombreEstilo" id="lblPrimerEstilo_<?php  echo "$estilo" ?>"><?php  echo "$primerestilomaterialcolor";?></label></strong> 
                        </div>
                        <div class="nombreEstilo" id="divPreEstiEsDise">
                          <div align="center">$ <label id="lblPrimerPrecio_<?php  echo "$estilo" ?>"><?php  echo "$primerprecio"?></label></div>
                        </div>
                      </div>
                 </div>
                      
                      </div>
                      
                    </div>
                    </td>
                   
                    <?php 
					
					if($contElementos%3==0){
					?>
                    	</tr>
                        <tr>
                    <?php                     
                    }
                   
					
				}//fin while
			}//fin if inicial


	?>
    
    </table>
  </div>
 
</div>
