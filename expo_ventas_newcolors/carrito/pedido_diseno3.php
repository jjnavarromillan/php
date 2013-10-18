<?php 

	$idCliente = $_GET['idCliente'];

    $mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
    
		$cont=0;
		$idCarPed="";
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
		$tel="";
	
    $sql=" SELECT idCarPed,idCliente,clientes_tiendas.Nombre,clientes_tiendas.Tienda,clientes_tiendas.Tel,clientes_tiendas.domicilio,clientes_tiendas.col,clientes_tiendas.CP,clientes_tiendas.Poblacion,
clientes_tiendas.Estado,clientes_tiendas.Pais,clientes_tiendas.RFC, carrito_pedido.fecha
FROM carrito_pedido, clientes_tiendas where carrito_pedido.idCliente=clientes_tiendas.idDatCli and  carrito_pedido.idCliente='{$idCliente}' ";

    if($result=$mysqli->query($sql)){
		
		$cont=1;
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
			$tel=$obj->Tel;
			
		}
	}
	
	
	
	
?>
<link rel="stylesheet" type="text/css" href="pedido_diseno3.css">
<div id="divContent">

  <div id="infoCliente">
    <div id="shopping"><img src="img/shoppingbag.jpg" width="132" height="33" /></div>
    <div id="datos">
      <table width="331" border="0">
        <tr>
          <td><div align="left" class="abcd">Dirección: <strong><?php  echo "$domicilio";?></strong></div></td>
        </tr>
        <tr>
          <td><div align="left" class="abcd">Colonia: <strong><?php  echo "$col";?></strong>CP <?php  echo "$CP";?></div></td>
        </tr>
        <tr>
          <td><div align="left" class="abcd">Población: <strong><?php  echo "$Poblacion";?></strong> <?php  echo "$Estado";?> <strong>Jalisco</strong></div></td>
        </tr>
        <tr>
          <td><div align="left" class="abcd">Tel: <strong><?php  echo "$tel";?></strong></div></td>
        </tr>
      </table>
    </div>
    <div id="NomCliente" class="clienteNombre"><strong><?php  echo "$Nombre";?></strong></div>
    <div id="divTabBarritaaPedido20" class="divTabBarritaaPedido200"><img src="source/barritaTabla.jpg" width="221" height="20" /></div>
    
    <div id="tablaCorridas">
      <table width="215" border="0">
        <tr>
          <td width="36"><div align="center" class="blancoEncabezado"><strong>Num</strong></div></td>
          <td width="14"><div align="center" class="blancoEncabezado"><strong>2</strong></div></td>
          <td width="14"><div align="center" class="blancoEncabezado"><strong>-</strong></div></td>
          <td width="14"><div align="center" class="blancoEncabezado"><strong>3</strong></div></td>
          <td width="14"><div align="center"class="blancoEncabezado"><strong>-</strong></div></td>
          <td width="14"><div align="center"class="blancoEncabezado"><strong>4</strong></div></td>
          <td width="14"><div align="center"class="blancoEncabezado"><strong>-</strong></div></td>
          <td width="14"><div align="center"class="blancoEncabezado"><strong>5</strong></div></td>
          <td width="14"><div align="center"class="blancoEncabezado"><strong>-</strong></div></td>
          <td width="14"><div align="center"class="blancoEncabezado"><strong>6</strong></div></td>
          <td width="14"><div align="center"class="blancoEncabezado"><strong>-</strong></div></td>
          <td width="36"><div align="center"class="blancoEncabezado"><strong>Total</strong></div></td>
        </tr>
         <?php 
	  	$contClaves=0;
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
          <td><div align="center" class="abcd"><strong><?php  echo "<label id='F{$contClaves}_clave' style='font-size:9'>{$clave}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N2' style='font-size:9'>{$N2}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N2m' style='font-size:9'>{$N2m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N3' style='font-size:9'>{$N3}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N3m' style='font-size:9'>{$N3m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N4' style='font-size:9'>{$N4}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N4m' style='font-size:9'>{$N4m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N5' style='font-size:9'>{$N5}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N5m' style='font-size:9'>{$N5m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N6' style='font-size:9'>{$N6}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_N6m' style='font-size:9'>{$N6m}</label>";?></strong></div></td>
          <td><div align="center" class="numerosPedido"><strong><?php  echo "<label id='F{$contClaves}_pares' style='font-size:9'>{$pares}</label>";?></strong></div></td>
        </tr>
        
                    <?php 
		}
	  ?> 
      </table>
      <?php 
	
	echo "<label id='contClaves' style='display:none'>$contClaves</label>";
	
	?>
    </div>
    <div id="boton2">
      <div id="shopBoton"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen3','','img/continue-1.jpg',1)"><img src="img/continue.jpg" name="Imagen3" width="118" height="15" border="0" id="Imagen3" /></a></div>
      <div id="checkoBoton" onclick="crearPedido(<?php  echo "$idCliente";?>);"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen4','','img/checkout-1.jpg',1)" onclick="crearPedido(<?php  echo "$idCliente";?>);"><img src="img/checkout.jpg" name="Imagen4" width="81" height="20" border="0" id="Imagen4" /></a></div>
    </div>
    <div id="lineaDivi"><img src="img/linea-divisora.jpg" width="625" height="5" /></div>
    <div id="desMaterial">
      <table width="623" border="0">
        <tr>
          <td width="101"><div align="center" class="descripcion"><strong>Material / Color</strong></div></td>
          <td width="113"> <div align="center" class="descripcion"><strong>Paquetes</strong></div></td>
          <td width="236"><div align="center" class="descripcion"><strong>Clave</strong></div></td>
          <td width="80"><div align="center"  class="descripcion"><strong>Precio</strong></div></td>
          <td width="71"><div align="center" class="descripcion"><strong>Total</strong></div></td>
        </tr>
      </table>
    </div>
    <div id="pedidoShoes">
      <?php  
  	
  	$sql2="SELECT tipo,lote,carrito_pedido_detalle.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,carrito_pedido_detalle.clave_pedido,carrito_pedido_detalle.cantidad,
carrito_pedido_detalle.N2,carrito_pedido_detalle.N2m,carrito_pedido_detalle.N3,carrito_pedido_detalle.N3m,carrito_pedido_detalle.N4,carrito_pedido_detalle.N4m,
carrito_pedido_detalle.N5,carrito_pedido_detalle.N5m,carrito_pedido_detalle.N6,carrito_pedido_detalle.N6m,carrito_pedido_detalle.Pares,
carrito_pedido_detalle.precio,carrito_pedido_detalle.Total
FROM carrito_pedido_detalle,estilos
where carrito_pedido_detalle.idEstilo=estilos.Id and idCarPed=$idCarPed";
  	if($result4=$mysqli->query($sql2)){
	$contElementCarro=0;
	while($obj2=$result4->fetch_object()){
  	
		$tipo=$obj2->tipo;
		$lote =$obj2->lote;
		$idEstilo=$obj2->idEstilo;
		$linea=$obj2->linea;
		$estilo=$obj2->estilo;
		$material=$obj2->material;
		$color=$obj2->color;
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
		$N6=$obj2->N6;
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
  
      <div id="contenidoCarrito">
        <div id="Foto"><img src="../imagenes_system/muestras/minis/<?php  echo "$foto";?>" width="73" height="73" /></div>
        <div id="divNomEstilo" class="materialColor">
          <div align="center"><strong><?php  echo "$estilo";?></strong> <?php  echo "$material $color";?></div>
        </div>
        <div id="abcdTabla200">
          <table width="127" border="0">
            <tr>
              <td width="62"><div align="center" class="abcd"><strong>Paquetes</strong></div></td>
              <td width="55"><div align="center" class="abcd"><strong>Cantidad</strong></div></td>
            </tr>
            <tr>
              <td><label>
                <div align="center">
                  <select class="combito" name="select" id="comboPaq_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaCombos(<?php  echo "$idEstilo";?>);">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                </div>
              </label></td>
              <td><label>
                <div align="center">
                  <select class="combito" name="comboCant1" id="comboCant_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaCombos(<?php  echo "$idEstilo";?>);">
<option value="1">1</option>
                    <option value="2" selected>2</option>
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
        <div id="corridas">
          <table width="215" border="0">
            <tr>
              <td width="13"><div align="center" class="abcd"><strong>2</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>3</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>4</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>5</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>6</strong></div></td>
              <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
              <td width="39"><div align="center" class="abcd"><strong>TOTAL</strong></div></td>
            </tr>
            <tr>
              <td><div align="center" class="abcd"><label id="SN2_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN2m_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN3_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN3m_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN4_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN4m_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN5_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN5m_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN6_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="SN6m_<?php  echo "$idEstilo";?>">0</label></div></td>
              <td><div align="center" class="abcd"><label id="Importe_<?php  echo "$idEstilo";?>">0</label></div></td>
            </tr>
          </table>
          
        </div>
        <div id="precio" class="abcd">
          <div align="center">$<label id="lblPrecio_<?php  echo "$idEstilo";?>"><?php  echo "$precio";?></label> </div>
        </div>
        <div id="total" class="abcd">
          <div align="center">$<label id="lblImporte_<?php  echo "$idEstilo";?>">0</label><label style="display:none" id="lblImporte_<?php  echo "$contElementCarro";?>">0</label></div>
        </div>
      </div>
      <label  style="display:none" id="index_<?php  echo "$contElementCarro";?>"><?php  echo "$idEstilo";?></label>
      <?php  
	  } 
	}
	  ?>
    </div>
  </div>
  <label id="contElementosEnCarro"><?php  echo "$contElementCarro"; ?></label>
  <div id="divPiePedidoDIseno">
  <div id="divTotalCorridas">
        <table width="215" border="0">
          <tr>
            <td width="13"><div align="center" class="abcd"><strong>2</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>3</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>4</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>5</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>6</strong></div></td>
            <td width="13"><div align="center" class="abcd"><strong>-</strong></div></td>
            <td width="39"><div align="center" class="abcd"><strong>TOTAL</strong></div></td>
          </tr>
          <tr>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center" class="abcd">0</div></td>
            <td><div align="center"class="abcd"><label class="descripcion2" id="TotalPares">0</label></div></td>
          </tr>
        </table>
      </div>
  </div>
  <div id="divTotalPedido" class="descripcion">
        <div id="divImgTotal">
          <div class="blancoEncabezado"id="divNomTotal2"> 
            <div align="center"><strong>TOTAL:</strong></div>
          </div>
        <img src="img/barrita_total.jpg" width="52" height="17" /></div>
      <div class="descripcion"id="divCantidadPedido">$<label class="descripcion2" id="SubtotalImporte">0</label></div>
      </div>
</div>


