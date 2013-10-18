<?php 

	$idCliente = $_REQUEST['idCliente'];

    $mysqli= new mysqli("locahost","user_web","123454321","newcolors");    
    
    $sql=" SELECT idCarPed,idCliente,clientes_tiendas.Nombre,clientes_tiendas.Tienda,clientes_tiendas.domicilio,clientes_tiendas.col,clientes_tiendas.CP,clientes_tiendas.Poblacion,
clientes_tiendas.Estado,clientes_tiendas.Pais,clientes_tiendas.RFC, carrito_pedido.fecha
FROM carrito_pedido, clientes_tiendas where carrito_pedido.idCliente=clientes_tiendas.idDatCli and  carrito_pedido.idCliente='$idCliente' ";

    $result=$mysqli->query($sql);
    $cont=1;
	$idCarPed="";
	$idCliente="";
	$Nombre="";
	$Tienda="";
	$domicilio="";
	$col="";
	$CP="";
	$Poblacion="";
	$Estado="";
	$Pais="";
	$RFC="";
	$fecha="";
	
    if($obj=$result->fetch_object()){
		$idCarPed=$obj->idCarPed;
		$idCliente=$obj->idCliente;
		$Nombre=$obj->Nombre;
		$Tienda=$obj->Tienda;
		$domicilio=$obj->domicilio;
		$col=$obj->col;
		$CP=$obj->CP;
		$Poblacion=$obj->Poblacion;
		$Estado=$obj->Estado;
		$Pais=$obj->Pais;
		$RFC=$obj->RFC;
		$fecha=$obj->fecha;
    }
	
	
	
	
	
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
#divPrincipalPedido {
	position:absolute;
	width:688px;
	height:498px;
	z-index:1;
	left: 3px;
	top: 6px;
}
#divEncabezadoPedido {
	position:absolute;
	width:686px;
	height:149px;
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
#divElementPedido {
	position:relative;
	width:677px;
	height:62px;
	z-index:2;
	left: 4px;
	top: 146px;
}
#divPedFoto1 {
	position:absolute;
	width:48px;
	height:48px;
	z-index:1;
	left: 6px;
	top: 6px;
}
#divCategoriaPedido {
	position:absolute;
	width:113px;
	height:14px;
	z-index:2;
	left: 62px;
	top: 5px;
	font-size: 9px;
}
#apDiv6 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:3;
}
#divEstilo {
	position:absolute;
	width:29px;
	height:12px;
	z-index:3;
	top: 23px;
	left: 62px;
	font-size: 9px;
}
#divNombreEstiloPedido {
	position:absolute;
	width:158px;
	height:28px;
	z-index:4;
	top: 25px;
	left: 61px;
	font-size: 9px;
}
#divLblPrecioPedido {
	position:absolute;
	width:32px;
	height:14px;
	z-index:5;
	top: 6px;
	left: 222px;
	font-size: 9px;
}
#divPrecioPedido {
	position:absolute;
	width:33px;
	height:16px;
	z-index:6;
	top: 5px;
	left: 223px;
	font-size: 9px;
}
#divClavesPedidos {
	position:absolute;
	width:201px;
	height:56px;
	z-index:7;
	top: 0px;
	left: 263px;
	font-size: 9px;
	text-align: center;
}
#divPaquetesPedidos {
	position:absolute;
	width:200px;
	height:51px;
	z-index:8;
	left: 471px;
	top: 3px;
	font-size: 9px;
	text-align: center;
}
option
        {
                    font-family: verdana;
                    font-size: 11px;
                    color: #ffffff;
        }
#apDiv10 {
	position:absolute;
	width:686px;
	height:94px;
	z-index:3;
	left: 1px;
	top: 403px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
}
#apDiv3 {
	position:relative;
	width:688px;
	height:115px;
	z-index:3;
	top: 59px;
}
#divPiePedido {
	position:relative;
	width:681px;
	height:115px;
	z-index:3;
	left: 5px;
	top: 147px;
}
#apDiv4 {
	position:absolute;
	width:243px;
	height:98px;
	z-index:4;
	left: 436px;
	top: 271px;
}
#apDiv5 {
	position:absolute;
	width:66px;
	height:14px;
	z-index:1;
	left: 96px;
	top: 4px;
	font-size: 9px;
}
#apDiv7 {
	position:absolute;
	width:71px;
	height:13px;
	z-index:2;
	top: 4px;
	left: 167px;
	font-size: 9px;
}
#apDiv8 {
	position:absolute;
	width:235px;
	height:17px;
	z-index:3;
	top: 27px;
	left: 5px;
	font-size: 9px;
}
#apDiv9 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:4;
}
#apDiv1 {
	position:absolute;
	width:268px;
	height:78px;
	z-index:2;
	top: 38px;
	left: 416px;
	font-size: 9px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#apDiv2 {
	position:absolute;
	width:681px;
	height:56px;
	z-index:1;
}
#apDiv11 {
	position:absolute;
	width:211px;
	height:44px;
	z-index:1;
	left: 468px;
	top: 3px;
}
#apDiv12 {
	position:absolute;
	width:207px;
	height:20px;
	z-index:3;
	top: 122px;
	left: 472px;
}
-->
</style>
</head>

<body>
<div id="divPrincipalPedido">
  <div id="divEncabezadoPedido">
  <?php  
		echo " $idCarPed ";
		echo " $idCliente ";
		echo " $Nombre ";
		echo " $Tienda ";
		echo " $domicilio ";
		echo " $col ";
		echo " $CP ";
		echo " $Poblacion ";
		echo " $Estado ";
		echo " $Pais ";
		echo " $RFC ";
		echo " $fecha ";
  ?>
  <div id="apDiv1">
  	<?php  $contClaves=0; ?>
    <table width="200" border="0">
      <tr>
        <th scope="col" style='font-size:9'>P</th>
        <th scope="col" style='font-size:9'>2</th>
        <th scope="col" style='font-size:9'>-</th>
        <th scope="col" style='font-size:9'>3</th>
        <th scope="col" style='font-size:9'>-</th>
        <th scope="col" style='font-size:9'>4</th>
        <th scope="col" style='font-size:9'>-</th>
        <th scope="col" style='font-size:9'>5</th>
        <th scope="col" style='font-size:9'>-</th>
        <th scope="col" style='font-size:9'>6</th>
        <th scope="col" style='font-size:9'>-</th>
        <th scope="col" style='font-size:9'>T</th>
      </tr>
      <?php 
	  	
		$sql3=" SELECT * FROM clave_pedido ";
		$result3=$mysqli->query($sql3);
		
		$clave="";
		$N2=0;
		$N2m=0;
		$N3=0;
		$N3m=0;
		$N4=0;
		$N4m=0;
		$N5=0;
		$N5m=0;
		$N6=0;
		$N6m=0;
		$pares=0;
		while($obj3=$result3->fetch_object()){
			$clave=$obj3->clave;
			$N2=$obj3->N2;
			$N2m=$obj3->N2m;
			$N3=$obj3->N3;
			$N3m=$obj3->N3m;
			$N4=$obj3->N4;
			$N4m=$obj3->N4m;
			$N5=$obj3->N5;
			$N5m=$obj3->N5m;
			$N6=$obj3->N6;
			$N6m=$obj3->N6m;
			$pares=$obj3->pares;
			$contClaves++;
	  ?>
      <tr>
        <td><?php  echo "<label id='F{$contClaves}_clave' style='font-size:9'>{$clave}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N2' style='font-size:9'>{$N2}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N2m' style='font-size:9'>{$N2m}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N3' style='font-size:9'>{$N3}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N3m' style='font-size:9'>{$N3m}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N4' style='font-size:9'>{$N4}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N4m' style='font-size:9'>{$N4m}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N5' style='font-size:9'>{$N5}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N5m' style='font-size:9'>{$N5m}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N6' style='font-size:9'>{$N6}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_N6m' style='font-size:9'>{$N6m}</label>";?></td>
        <td><?php  echo "<label id='F{$contClaves}_Pares' style='font-size:9'>{$pares}</label>";?></td>
      </tr>
      <?php 
		}
	  ?>
    </table>
	<?php 
	
	echo "<label id='contClaves' style='display:none'>$contClaves</label>";
	
	?>
  </div>
  <div id="apDiv12">
    <table width="200" border="0">
      <tr>
        <td>2</td>
        <td>-</td>
        <td>3</td>
        <td>-</td>
        <td>4</td>
        <td>-</td>
        <td>5</td>
        <td>-</td>
        <td>6</td>
        <td>-</td>
        <td>T</td>
      </tr>
    </table>
  </div>
  </div>
  <?php  
  	
  	$sql2="SELECT tipo,lote,carrito_pedido_detalle.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,carrito_pedido_detalle.clave_pedido,carrito_pedido_detalle.cantidad,
carrito_pedido_detalle.N2,carrito_pedido_detalle.N2m,carrito_pedido_detalle.N3,carrito_pedido_detalle.N3m,carrito_pedido_detalle.N4,carrito_pedido_detalle.N4m,
carrito_pedido_detalle.N5,carrito_pedido_detalle.N5m,carrito_pedido_detalle.N6,carrito_pedido_detalle.N6m,carrito_pedido_detalle.Pares,
carrito_pedido_detalle.precio,carrito_pedido_detalle.Total
FROM carrito_pedido_detalle,estilos
where carrito_pedido_detalle.idEstilo=estilos.Id and idCarPed=$idCarPed";
  	$result2=$mysqli->query($sql2);
	$contElementCarro=0;
	while($obj2=$result2->fetch_object()){
  	
		$tipo=$obj2->tipo;
		$lote =$obj2->lote;
		$idEstilo=$obj2->idEstilo;
		$linea=$obj2->linea;
		$estilo=$obj2->estilo;
		$material=$obj2->material;
		$color=$obj2->color;
		$clave_pedido=$obj2->clave_pedido;
		$clave_pedido=$obj2->clave_pedido;
		$N2=$obj2->N2;
		$N2m=$obj2->N2m;
		$N3=$obj2->N3;
		$N3m=$obj2->N3m;
		$N4=$obj2->N4;
		$N4m=$obj2->N4m;
		$N5=$obj2->N5;
		$N5m=$obj2->N5m;
		$N5m=$obj2->N5m;
		$N6m=$obj2->N6m;
		$Pares=$obj2->Pares;
		$precio=$obj2->precio;
		$Total=$obj2->Total;
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
		$contElementCarro++;
  ?>
  <div id="divElementPedido">
    <div id="divPedFoto1"><img src="http://201.120.55.76/imagenes_system/muestras/miniminis/<?php  echo "$foto";?>" width="48" height="48" /></div>
    <div id="divCategoriaPedido"><?php  echo "$linea";?></div>
    <div id="divNombreEstiloPedido"><?php  echo "$estilo $material $color";?></div>
    <div id="divPrecioPedido"><?php  echo "$precio";?></div>
    <div id="divClavesPedidos">
      <table width="193" border="0">
        <tr>
          <td width="44"><label>
            <select name="comboCant1" id="comboCant1_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaPaquetes(<?php  echo "$idEstilo";?>);">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </label></td>
          <td width="42">
          <select name="comboCant2" id="comboCant2_<?php  echo "$idEstilo";?> onChange="calculaSumatoriaPaquetes(<?php  echo "$idEstilo";?>);">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select></td>
          <td width="42"><select name="comboCant3" id="comboCant3_<?php  echo "$idEstilo";?> onChange="calculaSumatoriaPaquetes(<?php  echo "$idEstilo";?>);">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select></td>
          <td width="37"><select name="comboCant4" id="comboCant4_<?php  echo "$idEstilo";?> " onChange="calculaSumatoriaPaquetes(<?php  echo "$idEstilo";?>);">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select></td>
        </tr>
      </table>
    </div>
    <div id="divPaquetesPedidos">
      <table width="200" border="0">
        <tr>
          <td><label id="SN2_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN2m_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN3_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN3m_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN4_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN4m_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN5_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN5m_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN6_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SN6m_<?php  echo "$idEstilo";?>">0</label></td>
          <td><label id="SNPares_<?php  echo "$idEstilo";?>">0</label></td>
        </tr>
      </table>
    </div>
	
  </div>
  <?php  
 	}
 ?>
 <label id="contElementosEnCarro"><?php  echo "$contElementCarro"; ?></label>
  <div id="divPiePedido">
    <div id="apDiv">
      <div id="apDiv11">
        <table width="200" border="0">
          <tr>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
</body>