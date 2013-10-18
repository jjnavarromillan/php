

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="sistema_files/StyleSheet.css">

<style type="text/css">
<!--
#lblTotalCompra {
	position:absolute;
	width:123px;
	height:31px;
	z-index:8;
	left: 483px;
	top: 440px;
}
#apDiv7 {
	position:absolute;
	width:96px;
	height:31px;
	z-index:9;
	left: 379px;
	top: 442px;
}
#lblPrecio {
	position:absolute;
	width:45px;
	height:25px;
	z-index:10;
	left: 359px;
	top: 80px;
}
#apDiv1 {
	position:absolute;
	width:173px;
	height:22px;
	z-index:11;
	left: 434px;
	top: 482px;
}
-->
</style>
</head>

<body>
<div id="divFormatoPedido">
	 <?php 

	 $idEstilo=$_REQUEST['idEstilo'];
	 

  $mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
  $sqlEstilo="select * from estilos where id=$idEstilo";
  $resultEstilo=$mysqli->query($sqlEstilo);
  
  $linea = "";
  $estilo = "";
  $material = "";
  $color = "";
  $precio = "";
  if($obj2=$resultEstilo->fetch_object()){
	  $linea = $obj2->Linea;
	  $estilo = $obj2->Estilo;
	  $material = $obj2->Material;
	  $color = $obj2->Color;
	  $precio = $obj2->Precio;

  }
  
  $nombreFoto="$estilo $material $color";
		$tam = strlen ($nombreFoto);
		$res = "";

		for ($r=0;$r<$tam;$r++){
			$car = $nombreFoto[$r];
			if ($car == ' ')
				$car = '-';
			if ($car == 'Ñ')
				$car = 'N';
			if ($car == 'ñ') 
				$car = 'n';
			$res = "$res"."$car";
		}

		$foto="$res.gif";	
		//echo "foto: $foto ";
  
  ?>



  <div id="divImgPedido"><img src="../imagenes_system/muestras/normal/<?php  echo "$foto"; ?>" name="img" width="280" height="280" id="img" /></div>
  <div id="divNombreEstilo"><?php echo "$estilo $material $color"; ?></div>
  <div id="divlblDescCategoria"><?php echo "$linea"; ?></div>
  <div id="apDiv3">Precio:</div>
      <div id="lblPrecio"><?php echo "$precio"; ?></div>
  <div id="apDiv5">
      
 
    <?php 
	
	
    $sql= "select * from clave_pedido ";
    
    $result=$mysqli->query($sql);
    
    echo "<table width='519'  border='0px'    cellpadding='0' cellspacing='0'>";
    echo "<tr bgcolor='#999999'>";
    //echo "<td width='55' style='background:url(sistema_files/degradado6.png)'>Select.</td>";
    echo "<td width='58'>Clave</td>";
    echo "<td width='61'>Cant.</td>";
    echo "<td width='23'>2</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>3</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>4</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>5</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>6</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='62'>Pares</td>";
    echo "<td width='62'>Total</td>";
    echo "</tr>";
	$cont=1;
    while($obj=$result->fetch_object()){
    
    	echo "<tr>";
        /*echo "<td><label>";
        echo "<input type='checkbox' name='a' id='seleccion1' value='seleccion1' />";
		echo "</label></td>";*/
      	echo "<td><label id='clave_". $cont ."'>". $obj->clave ."</label></td>";
      	echo "<td><label>";
        echo "<select name='cantidad' id='cantidad". $cont ."' onChange=\"totalClavesPedidos('cantidad". $cont ."','pares_". $cont ."','Total". $cont ."');\">";
        echo "<option value='0' selected='selected'>0</option>";
        echo "<option value='1'>1</option>";
        echo "<option value='2'>2</option>";
       	echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "</select>";
      	echo "</label></td>";
        echo "<td><label id='N2_". $cont ."'>". $obj->N2 ."</label></td>";
      	echo "<td><label id='N2m_". $cont ."'>". $obj->N2m ."</label></td>";
        echo "<td><label id='N3_". $cont ."'>". $obj->N3 ."</label></td>";
      	echo "<td><label id='N3m_". $cont ."'>". $obj->N3m ."</label></td>";
        echo "<td><label id='N4_". $cont ."'>". $obj->N4 ."</label></td>";
      	echo "<td><label id='N4m_". $cont ."'>". $obj->N4m ."</label></td>";
        echo "<td><label id='N5_". $cont ."'>". $obj->N5 ."</label></td>";
      	echo "<td><label id='N5m_". $cont ."'>". $obj->N5m ."</label></td>";
        echo "<td><label id='N6_". $cont ."'>". $obj->N6 ."</label></td>";
      	echo "<td><label id='N6m_". $cont ."'>". $obj->N6m ."</label></td>";
      	echo "<td><label id='pares_". $cont ."'>". $obj->pares ."</label></td>";
        echo "<td><label id='Total". $cont ."'>0</label> </td>";
    	echo "</tr>";
		$cont++;	
    
    }
	echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td><label id=\"lblTotal_\" >0</label></td>";
	echo "</td>";
	echo "</table>";
	
	$cont--;
	echo "<label id=\"lblCantTotal\" style='display:none;'>$cont</label>";
	
?>
  
  </div>
  <div id="lblObservacion"></div>
  <div id="lblTotalCompra" align="left"></div>
  <div id="apDiv7" align="right"> Importe</div>
  <div id="apDiv1"> <input id="btnAgregarACarrito" name="btnAgregarACarrito"  value="Agregar a carrito"  type="button" onClick="cargarDatosACarro();" /></div>
</div>
<label id='idEstiloPed' style="display:none"><?php  echo"$idEstilo"; ?></label>
</body>
</html>