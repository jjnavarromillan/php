           
<link rel="stylesheet" type="text/css" href="ver_estilos_diseno.css">
<script language="javascript" src="../js/codigo.js"></script>

<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:31px;
	height:28px;
	z-index:4;
	left: 14px;
	top: 0px;
}
#divBtnMasColores {
	position:relative;
	width:15px;
	height:15px;
	z-index:4;
	left: 0px;
	top: 0px;
	background-color: #00FFFF;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
-->
</style>
<div id="divCotenedorEstilosColor">                

  <div id="divSecEstilosDise">
                    <table width="580" height="227" border="0">
                		<tr>
                
<?php 
			$idCatalogo=1;
          //  $linea=$_GET['linea'];
            $idPlantilla=$_GET['idPlantilla'];
			
			$mysqli= new mysqli("locahost","user_web","123454321","newcolors");
			$mysqli->query("SET NAMES 'utf8'");
			$sql="SELECT estilos.Estilo as estilo_o
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where  catalogo_estilos_plantilla.idPlantilla=$idPlantilla GROUP BY estilos.Estilo order by estilo";

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
FROM catalogo_estilos_plantilla INNER JOIN estilos ON catalogo_estilos_plantilla.idEstilo = estilos.Id where estilos.estilo='$estilo' and catalogo_estilos_plantilla.idPlantilla=$idPlantilla GROUP BY estilos.Id, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color ";

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
                        <td><div id="divImgMatColor" onmouseover="setImagenDiv('divImMedEstiDise_'+<?php  echo "$estilo";?>,'<?php  echo "$foto";?>','<?php  echo "$estilo";?>','<?php  echo "$material";?>','<?php  echo "$color";?>','<?php  echo "$precio";?>','<?php  echo "$idEstilo";?>','<?php  echo "$idPlantilla";?>')" > <img  src="http://201.120.55.76/imagenes_system/muestras/materialcolor/<?php  echo "M_$foto";?>" width="30" height="18" /></div></td>
                        
                        <?php 
						
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
						if($cont>2){
							if($numColores>3){
								?>
									<td><div id="divBtnMasColores" onclick="llamarasincrono('carrito/vista_detalle_diseno.php?idPlantilla=<?php  echo "$idPlantilla"; ?>&idEstilo=<?php  echo "$idEstilo"; ?>&estilo=<?php  echo "$estilo"; ?>&material=<?php  echo "$material"; ?>&color=<?php  echo "$color"; ?>&precio=<?php  echo "$precio"; ?>','cuadroEstilo');"></div></td>
								<?php 
							}
							break;
							
						}
				}//fin for colores
                ?>
                      
                </table>
                      <div>
                <div class="NomMatEstiloD" id="divNomEstiMattDise">
                        <div align="center"><strong><label class="nombreEstilo" id="lblPrimerEstilo_<?php  echo "$estilo" ?>"></label>
                        <?php  echo "$primerestilomaterialcolor";?></strong></div>
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
