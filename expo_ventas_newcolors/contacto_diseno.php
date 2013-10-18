<?php 

	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");  
	$mysqli->query("SET NAMES 'utf8'");
	$idEstadoSel="0";
?>

<link rel="stylesheet" type="text/css" href="css/contacto_diseno.css">




<div id="divPrinContacto">
  <div id="map_canvas"></div>
        <div id="divtxtEstContacto">
            <label>
              <select  class="combitoContactoDis" name="comboEstados" id="comboEstados" onchange="cargarComboMunicipios(this.value);">
						<?php 
                 
                $sqlGetData = "select * from estados ";
            
                $result=$mysqli->query($sqlGetData);
                $resultado_=" ";
            
                if($result){
                    $num=mysqli_num_rows($result);
                    $cons = 1;
                    for ($i=0;$i<$num;$i++)
                    {	
                        
                        $rowdata = mysqli_fetch_object($result);
                        $idEstado = $rowdata->idEstado;
                        $estado = $rowdata->estado;
                        if($i==0){
                            $idEstadoSel=$idEstado;
                        ?>
            <option selected='selected' value='<?php  echo $idEstado; ?>'><?php  echo $estado; ?></option>
                         <?php 
                        }
                         else
                         {
                         ?>
                            <option  value='<?php  echo $idEstado; ?>'><?php  echo $estado; ?> </option>
                         <?php  
                         } 
                    }
                }
            ?>
              </select>
            </label>
          </div>
        <form action="http://www.newcolors.com.mx/email/send_email.php" method="post" >
        <div class="outrageous" id="divConteContacto">
          <div class="datosCliente" id="divDomContacto">
            <div align="left">COLONIA:</div>
          </div>
          <div id="divtxtDomContacto">
            <label>
              <input  class="campoTxtTipo" name="txtColonia" type="text" id="txtColonia" size="55" maxlength="99" />
            </label>
          </div>
          <div id="divtxtMunContacto">
            <label>
              <select class="combitoContactoDis" name="camboMunicipios" id="camboMunicipios">
                <?php 
                 
                $sqlGetData = "select * from municipios where idEstado=$idEstadoSel";
            
                $result2=$mysqli->query($sqlGetData);
                $resultado_=" ";
            
                if($result2){
                    $num=mysqli_num_rows($result2);
                    $cons = 1;
                    for ($i=0;$i<$num;$i++)
                    {	
                        
                        $rowdata = mysqli_fetch_object($result2);
                        $idMunicipio = $rowdata->idMunicipio;
                        $municipio = $rowdata->municipio;
                        if($i==0){
                            $idMunicipioSel=$idMunicipio;
                        ?>
            <option selected='selected' value='<?php  echo $idMunicipio; ?>'><?php  echo $municipio; ?></option>
                         <?php 
                        }
                         else
                         {
                         ?>
                            <option  value='<?php  echo $idMunicipio; ?>'><?php  echo $municipio; ?> </option>
                         <?php  
                         } 
                    }
                }
            ?>

              </select>
            </label>
          </div>
          <div class="datosCliente" id="divCateContacto2">
            <div align="left">CATEGORIAS:</div>
          </div>
          <div id="divDespleContacto">
            
              <label>
                <textarea  class="enviarDatCli" name="txtMensaje" id="txtMensaje" cols="28" rows="5"></textarea>
              </label>
            
          </div>
          
          <div id="apDiv113"></div>
          <div id="divTxtCPContaDise">
            <label>
              <input class="campoTxtTipo" name="txtCP" type="text" id="txtCP" size="12" maxlength="100" />
            </label>
          </div>
          <div id="divTxTCalleConDise">
            <label>
              <input  class="campoTxtTipo" name="txtCalle" type="text" id="txtCalle" size="40" maxlength="80" />
            </label>
          </div>
<div class="datosCliente" id="divCPContaDise">C.P</div>
<div  class="datosCliente" id="divCalleConDise">CALLE:</div>
<div  class="datosCliente" id="divEmaiContacto">E-MAIL:</div>
<div id="divtxtEmaContacto">
  <label>
    <input  class="campoTxtTipo" name="txtEmailCliente" type="text" id="txtEmailCliente" size="30" maxlength="100" />
  </label>
</div>
<div id="apDiv5"><a href="#" ><img src="img/limpiar.jpg" name="Imagen3" width="69" height="17" border="0" id="Imagen3" /></a></div>
<div id="divEnviar" ><a href="#" onClick="enviar_email();"><img src="img/enviar.jpg" name="Imagen2" width="69" height="17" border="0" id="Imagen2" /></a></div>
<div id="divLinDesContDise"><img src="img/linea-continua-mini.jpg" width="247" height="6" /></div>
          <div id="divtxtCateContacto">
            <label>
              <select class="combitoContactoDis" name="comboCategoriasContacto" id="comboCategoriasContacto">
                 <?php 
                 
                $sqlGetData = "select * from catalogos_categorias_contacto ";
                $result2=$mysqli->query($sqlGetData);
                $resultado_=" ";
            
                if($result2){
                    $num=mysqli_num_rows($result2);
                    $cons = 1;
                    for ($i=0;$i<$num;$i++)
                    {	
                        $rowdata = mysqli_fetch_object($result2);
                        $idCategoriaContac = $rowdata->idCategoriaContac;
                        $categoria_contacto = $rowdata->categoria_contacto;
                        if($i==0){
                            $idCategoriaContacSel=$idCategoriaContac;
                        ?>
            <option selected='selected' value='<?php  echo $idCategoriaContac; ?>'><?php  echo $categoria_contacto; ?></option>
                         <?php 
                        }
                         else
                         {
                         ?>
                            <option  value='<?php  echo $idCategoriaContac; ?>'><?php  echo $categoria_contacto; ?> </option>
                         <?php  
                         } 
                    }
                }
            ?>
              </select>
            </label>
          </div>
          <div id="divtxtTelContacto">

              <label>
                <input  class="campoTxtTipo" name="txtTelefono" type="text" id="txtTelefono" size="20" maxlength="100" />
              </label>

          </div>
          <div class="datosCliente" id="divTelContacto">
            <div align="left">TELEFONO:</div>
          </div>
<div class="datosCliente" id="divMuniContacto">
  <div align="left">MUNICIPIO:</div>
</div>
          
          <div class="datosCliente" id="divEstContacto">
            <div align="left">ESTADO:</div>
          </div>
          <div id="divtxtPaiContacto">
          
          
            <label>
            
              <select class="combitoContactoDis" name="comboPaises" id="comboPaises">
                <option value="México">México</option>
              </select>
            </label>
          </div>
          <div class="datosCliente" id="divPaiContacto">
            <div align="left">PAÍS:</div>
          </div>
          <div id="divtxtNomContacto">
            
              <label>
                <input  class="campoTxtTipo" name="txtNombre" type="text" id="txtNombre" size="55" maxlength="99" />
              </label>
            
          </div>
          <div id="divNomContacto">
            <div align="left"><span class="datosCliente">NOMBRE:</span></div>
          </div>
        </div>
  </FORM>
        <div id="divErrorEnvioEmail"></div>
<div id="apDiv6"><img src="img/contactanos.jpg" width="170" height="40" /></div>
        <div class="datosNc"id="divNudContacto">Nudo de Cempoaltepec N° 1129 Col. Vicente Guerrero
          <div class="datosNc" id="apDiv3">Guadalajara, Jalisco. México</div>
          <div class="datosNc" id="divTel2contacto">Tel: +52(33)3609 4304</div>
  </div>
</div>


