<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<script language="javascript" src="../js/codigo.js"></script>
<style type="text/css">
<!--
#divRegistroNuevoCliente {
	position:absolute;
	width:582px;
	height:373px;
	z-index:1;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#divRegistroNuevoClienteDivFacturaA {
	position:absolute;
	width:559px;
	height:27px;
	z-index:1;
	left: 11px;
	top: 45px;
}
#divRegistroNuevoClienteNombre {
	position:absolute;
	width:555px;
	height:25px;
	z-index:2;
	left: 12px;
	top: 77px;
}
#divRegistroNuevoClienteDireccion {
	position:absolute;
	width:552px;
	height:47px;
	z-index:3;
	left: 13px;
	top: 108px;
}
#divRegistroNuevoClienteColonia {
	position:absolute;
	width:555px;
	height:20px;
	z-index:4;
	left: 12px;
	top: 157px;
}
#divRegistroNuevoClienteLocalidad {
	position:absolute;
	width:558px;
	height:55px;
	z-index:5;
	left: 12px;
	top: 183px;
}
#divRegistroNuevoClienteTels {
	position:absolute;
	width:558px;
	height:24px;
	z-index:6;
	left: 10px;
	top: 250px;
}
#divRegistroNuevoClienteWeb {
	position:absolute;
	width:560px;
	height:26px;
	z-index:7;
	left: 8px;
	top: 276px;
}
#divRegistroNuevoClientePaqueteria {
	position:absolute;
	width:562px;
	height:25px;
	z-index:8;
	left: 10px;
	top: 307px;
}
#divRegistroNuevoClienteBotons {
	position:absolute;
	width:562px;
	height:26px;
	z-index:9;
	left: 10px;
	top: 337px;
	text-align: center;
}
#divRegistroNuevoClienteTitulo {
	position:absolute;
	width:563px;
	height:30px;
	z-index:10;
	left: 9px;
	top: 9px;
}
#divRegistroNuevoClienteDivComboMunicipio {
	position:absolute;
	width:419px;
	height:23px;
	z-index:2;
	left: 5px;
	top: 29px;
}
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
  <div id="divRegistroNuevoClienteDivFacturaA">Factura A: 
    <label>
      <input name="txtRegFacturaA" type="text" id="txtRegFacturaA" size="70" value='<?php  echo $obj->Nombre; ?>'>
    </label>
  </div>
  <div id="divRegistroNuevoClienteNombre">Nombre: 
    <input name="txtRegNombre" type="text" id="txtRegNombre" size="70" value="<?php  echo $obj->Encargado; ?>">
  </div>
  <div id="divRegistroNuevoClienteDireccion">Direccion:
    <input name="txtRegDireccion" type="text" id="txtRegDireccion" size="90" value="<?php  echo $obj->Domicilio; ?>">
  </div>
  <div id="divRegistroNuevoClienteColonia">Colonia: 
    <input name="txtRegColonia" type="text" id="txtRegColonia" size="80" value="<?php  echo $obj->Col; ?>">
  </div>
  <div id="divRegistroNuevoClienteLocalidad">Pais 
    <label>
      <select name="comboRegPais" id="comboRegPais">
        <option value="Mexico">Mexico</option>
      </select>
    </label>
  Estado
  <label>

    <select name="ComboRegEstado" id="ComboRegEstado" onChange="llamarasincrono('getMunicipiosCombo.php?idEstado='+document.getElementById('ComboRegEstado').value,'divRegistroNuevoClienteDivComboMunicipio')">
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

	<select name="comboRegMunicipio" id="comboRegMunicipio">
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
  <div id="divRegistroNuevoClienteTels">CP
    <label>
      <input name="txtRegCP" type="text" id="txtRegCP" size="10" value="<?php  echo $obj->CP; ?>">
    </label>
  RFC 
  <label>
    <input name="txtRegRFC" type="text" id="txtRegRFC" size="15" value="<?php  echo $obj->RFC; ?>">
  </label>
  Tel Fijo 
  <label>
    <input name="txtRegTelFijo" type="text" id="txtRegTelFijo" size="18" value="<?php  echo $obj->Tel; ?>">
  </label>
  </div>
  <div id="divRegistroNuevoClienteWeb">Tel Movil
    <input name="txtRegTelMovil" type="text" id="txtRegTelMovil" size="18" value="<?php  echo $obj->Tel2; ?>">
    Email
    <input name="txtRegEmail" type="text" id="txtRegEmail" size="30" value="<?php  echo $obj->email; ?>"> 
    </div>
  <div id="divRegistroNuevoClientePaqueteria">Pagina Web 
    <input name="txtRegSitioWeb" type="text" id="txtRegSitioWeb" size="25" value="<?php  echo $obj->sitioWeb; ?>">
    Paqueteria 
    <input name="txtRegPaqueteria" type="text" id="txtRegPaqueteria" size="40" value="<?php  echo $obj->transporte; ?>">
  </div>
  <div id="divRegistroNuevoClienteBotons">
    <label>
      <input type="submit" name="btnGuardar" id="btnGuardar" value="Guadar">
    </label>
  </div>
  <div id="divRegistroNuevoClienteTitulo">Datos del cliente</div>
</div>

<?php 

}
}
?>

