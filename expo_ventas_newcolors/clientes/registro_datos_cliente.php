<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<script language="javascript" src="../js/codigo.js"></script>
<link rel="stylesheet" type="text/css" href="registro_datos_cliente.css" />
<style type="text/css">

<!--

-->
</style>

<?php 
	function reemplazaMe($text) {
        utf8_encode($text);
        $codigo= array("á","é","í","ó", "ú","ü","ñ");
        $cambiar = array("á","é","í","ó","ú","ü","ñ");
        $text = str_replace($codigo, $cambiar, $text);
        $text= strtolower($text);
        return $text;
	} 

	$idEstado="";
    $estado="";
    $idMunicipio="";
    $municipio="";
 	$idDatCli=$_REQUEST['idDatCli'];
  	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");    

    $mysqli->query("SET NAMES 'utf8'");
  	$sql= "SELECT * FROM clientes_tiendas where idDatCli='$idDatCli'";
    if($result=$mysqli->query($sql)){

	$cont=1;
	
    if($obj=$result->fetch_object()){
		$estado=$obj->Estado;
        $municipio=$obj->Poblacion;
	  ?>

<div id="divRegistroNuevoCliente">
  <div class="regiDatosCli" id="divRegistroNuevoClienteDivFacturaA">Factura A:
    <label>
      <input class="regiCombitoDatos" name="txtRegFacturaA" type="text" id="txtRegFacturaA" size="70" value='<?php  echo $obj->Nombre; ?>' />
    </label>
  </div>
  <div  class="regiDatosCli" id="divRegistroNuevoClienteNombre">Nombre: 
    <input class="regiCombitoDatos" name="txtRegNombre" type="text" id="txtRegNombre" size="70" value="<?php  echo $obj->Encargado; ?>">
  </div>
  <div  class="regiDatosCli" id="divRegistroNuevoClienteDireccion">Direccion:
    <input class="regiCombitoDatos" name="txtRegDireccion" type="text" id="txtRegDireccion" size="90" value="<?php  echo $obj->Domicilio; ?>">
  </div>
  <div class="regiDatosCli" id="divRegistroNuevoClienteColonia">Colonia: 
    <input class="regiCombitoDatos" name="txtRegColonia" type="text" id="txtRegColonia" size="80" value="<?php  echo $obj->Col; ?>">
  </div>
  <div class="regiDatosCli" id="divRegistroNuevoClienteLocalidad">Pais 
    <label>
      <select  class="regiCombitoDatos" name="comboRegPais" id="comboRegPais">
        <option value="Mexico">Mexico</option>
      </select>
    </label>
  Estado
  <label>

    <select class="regiCombitoDatos" name="ComboRegEstado" id="ComboRegEstado" onChange="llamarasincrono('getMunicipiosCombo.php?idEstado='+document.getElementById('ComboRegEstado').value,'divRegistroNuevoClienteDivComboMunicipio')">
      <option value="-1">Selecciona Estado</option>
      <?php 
        $sql2= "SELECT * FROM estados ";
        if($result2=$mysqli->query($sql2)){
    
       
        
        while($obj2=$result2->fetch_object()){
        	if(trim(strtolower($obj2->estado))==trim(strtolower($estado))){
            $idEstadoSel="0";
			$idEstado =$obj2->idEstado;

	       ?>
            <option value="<?php  echo $obj2->idEstado; ?>" selected="selected" ><?php  echo reemplazaMe($obj2->estado); ?></option>
            
	       <?php 
           $idEstadoSel=$estado;
           }
           else
           {
   	       ?>
            <option value="<?php  echo $obj2->idEstado; ?>"><?php  echo reemplazaMe($obj2->estado); ?></option>
	       <?php 
           }
       }
       }
       ?>
    </select>
    
  </label>
  <label>
    
  </label>
  <div id="divRegistroNuevoClienteDivComboMunicipio">
    Municipio

	<select  class="regiCombitoDatos" name="comboRegMunicipio" id="comboRegMunicipio">
	  <option value="-1">Seleccione municipio</option>
	  <?php 
        $sql3= "SELECT * FROM municipios where idEstado='$idEstado' ";
        if($result3=$mysqli->query($sql3)){
    
       
        
        while($obj3=$result3->fetch_object()){
        	echo trim(strtolower($municipio));
        	if(trim(strtolower($obj3->municipio))==trim(strtolower($municipio))){
            
            $idMunicipioSel="0";
	       ?>
	  <option value="<?php  echo $obj3->idMunicipio; ?>" selected="selected" ><?php  echo reemplazaMe($obj3->municipio); ?></option>
	  <?php 
           $idMunicipioSel=$obj3->idMunicipio;
           }
           else
           {
   	       ?>
	  <option value="<?php  echo $obj3->idMunicipio; ?>"><?php  echo reemplazaMe($obj3->municipio); ?></option>
	  <?php 
           }
       }
       }
       ?>
	  </select>
  </div>
  </div>
  <div  class="regiDatosCli" id="divRegistroNuevoClienteTels">CP
    <label>
      <input  class="regiCombitoDatos" name="txtRegCP" type="text" id="txtRegCP" size="10" value="<?php  echo $obj->CP; ?>">
    </label>
  RFC 
  <label>
    <input class="regiCombitoDatos" name="txtRegRFC" type="text" id="txtRegRFC" size="15" value="<?php  echo $obj->RFC; ?>">
  </label>
  Tel Fijo 
  <label>
    <input  class="regiCombitoDatos" name="txtRegTelFijo" type="text" id="txtRegTelFijo" size="18" value="<?php  echo $obj->Tel; ?>">
  </label>
  </div>
  <div  class="regiDatosCli" id="divRegistroNuevoClienteWeb">Tel Movil
    <input class="regiCombitoDatos" name="txtRegTelMovil" type="text" id="txtRegTelMovil" size="18" value="<?php  echo $obj->Tel2; ?>">
    Email
    <input class="regiCombitoDatos" name="txtRegEmail" type="text" id="txtRegEmail" size="30" value="<?php  echo $obj->email; ?>"> 
    </div>
  <div  class="regiDatosCli" id="divRegistroNuevoClientePaqueteria">Pagina Web 
    <input  class="regiCombitoDatos" name="txtRegSitioWeb" type="text" id="txtRegSitioWeb" size="25" value="<?php  echo $obj->sitioWeb; ?>">
    Paqueteria 
    <input  class="regiCombitoDatos" name="txtRegPaqueteria" type="text" id="txtRegPaqueteria" size="40" value="<?php  echo $obj->transporte; ?>">
  </div>
  <div id="divRegistroNuevoClienteBotons">
    <label>
      <input type="submit" name="btnGuardar" id="btnGuardar" value="Guadar">
    </label>
    <div id="divBoGuarDaClientes"><img src="../img/barrita_total.jpg" width="52" height="17" />
      <div  class="tipoRegiWhite" id="divTiGuaDaClientes">Guardar</div>
    </div>
  </div>
  <div  class="regiDatosCli" id="divRegistroNuevoClienteTitulo">Datos del cliente</div>
</div>

<?php 

}
}
?>

