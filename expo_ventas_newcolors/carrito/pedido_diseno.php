<?php 

	$idCliente = $_REQUEST['idCliente'];

    $mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
    
    $sql=" SELECT idCarPed,detallistas_clientes.idCliente,detallistas_clientes.Nombre,detallistas_clientes.telefonos,detallistas_clientes.domicilio,detallistas_clientes.col,detallistas_clientes.CP,municipios.municipio,
estados.estado,paises.pais,detallistas_clientes.RFC, fecha
FROM carrito_pedido, detallistas_clientes,paises,estados,municipios where carrito_pedido.idCliente=detallistas_clientes.idCliente and detallistas_clientes.idPais = paises.idPais and
estados.idEstado = detallistas_clientes.idEstado and municipios.idMunicipio=detallistas_clientes.idMunicipio and  carrito_pedido.idCliente='$idCliente' ";

    if($result=$mysqli->query($sql)){
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
		$tel="";
		
		if($obj=$result->fetch_object()){
			$idCarPed=$obj->idCarPed;
			$idCliente=$obj->idCliente;
			$Nombre=$obj->Nombre;
			//$Tienda=$obj->Tienda;
			$domicilio=$obj->domicilio;
			$col=$obj->col;
			$CP=$obj->CP;
			$Poblacion=$obj->municipio;
			$Estado=$obj->estado;
			$Pais=$obj->pais;
			$RFC=$obj->RFC;
			$fecha=$obj->fecha;
			$tel=$obj->telefonos;
			
		}
	}
	
	
	
	
?>
<link href="pedido_diseno.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
#divNombreZapato {
	position:absolute;
	width:270px;
	height:22px;
	z-index:8;
	left: 62px;
	top: 2px;
}
#divLbParesTotales {
	position:absolute;
	width:257px;
	height:18px;
	z-index:5;
	top: 120px;
	left: 367px;
}
#divparesTotales {
	position:absolute;
	width:71px;
	height:15px;
	z-index:1;
	left: 38px;
	text-align: right;
}
#divTotalPedido {
	position:absolute;
	width:140px;
	height:15px;
	z-index:2;
	left: 114px;
}
#divVistaZoom {
	position:absolute;
	width:17px;
	height:23px;
	z-index:9;
	top: 24px;
	left: 17px;
	background-color: #993300;
}
-->
</style>
<div id="divContent"><div id="pedidoShoes">
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
            <div id="contenidoCarrito">
              <div id="Foto"><img src="../imagenes_system/muestras/normal/<?php  echo "$foto";?>" width="73" height="73" /></div>
              <div id="abcdTabla">
                <table width="120" border="0">
                  <tr>
                    <td width="60"><div align="center" class="abcd"><strong>Paquetes</strong></div></td>
                    <td width="60"><div align="center" class="abcd"><strong>Cantidad</strong></div></td>
                  </tr>
                  <tr>
                    <td><label>
                      <select class="combito" name="select" id="comboPaq_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaCombos(<?php  echo "$idEstilo";?>);">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                      </select>
                    </label></td>
                    <td><label>
                      <select class="combito" name="comboCant1" id="comboCant_<?php  echo "$idEstilo";?>" onChange="calculaSumatoriaCombos(<?php  echo "$idEstilo";?>);">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </label></td>
                  </tr>
                </table>
              </div>
              <div id="apDiv21">
                <table width="211" border="0">
                  <tr>
                    <td><div align="center" class="materialColor"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="materialColor"></div></td>
                  </tr>
                </table>
              </div>
              <div id="corridas">
                <table width="215" border="0">
                  <tr>
                    <td width="18" class="abcd"><div align="center"><strong>2</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>-</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>3</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>-</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>4</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>-</strong></div></td>
                    <td width="18" class="abcd"><div align="right"><strong>5</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>-</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>6</strong></div></td>
                    <td width="18" class="abcd"><div align="center"><strong>-</strong></div></td>
                    <td width="29" class="abcd"><div align="center"><strong>Total</strong></div></td>
                  </tr>
                  <tr>
                    <td width="18" class="abcd"><div align="center"><label id="SN2_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN2m_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN3_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN3m_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN4_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN4m_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN5_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN5m_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN6_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="18" class="abcd"><div align="center"><label id="SN6m_<?php  echo "$idEstilo";?>">0</label></div></td>
                    <td width="25" class="abcd"><div align="center"><label id="Importe_<?php  echo "$idEstilo";?>">0</label></div></td>
                    
                  </tr>
                </table>
              </div>
              <div id="total">
                <table width="66" border="0">
                  <tr>
                    <td width="60" class="abcd">$ <label id="lblImporte_<?php  echo "$idEstilo";?>">0</label><label style="display:none" id="lblImporte_<?php  echo "$contElementCarro";?>">0</label> </td>
                  </tr>
                </table>
              </div>
              <div id="precio">
                <table width="55" border="0">
                  <tr>
                    <td class="abcd"><div align="center">$ <label id="lblPrecio_<?php  echo "$idEstilo";?>"><?php  echo "$precio";?></label> </div></td>
                  </tr>
                </table>
              </div>
              <div id="divNombreZapato"><?php  echo "$material $color";?></div>
              <div id="divVistaZoom" onclick="llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>');"></div>
            </div>
            <label  style="display:none" id="index_<?php  echo "$contElementCarro";?>"><?php  echo "$idEstilo";?></label> 
    <?php  
 	}
 ?>
 <label id="contElementosEnCarro"><?php  echo "$contElementCarro"; ?></label>
 <div id="contenidoCarrito">

    </div>
 <div id="divLbParesTotales">
   <div class="descripcion2" id="divparesTotales"><strong>Pares:</strong><label class="descripcion2" id="TotalPares">2</label></div>
   <div class="descripcion2" id="divTotalPedido"><strong>Total:$</strong><label class="descripcion2" id="SubtotalImporte">3</label></div>
 </div>
<div id="lineaDivi"><img src="img/linea-divisora.jpg" width="625" height="5" /></div>
            <div id="desMaterial">
              <table width="623" border="0">
                <tr>
                  <td width="124" class="descripcion"><div align="center"><strong>Material / Color</strong></div></td>
                  <td width="113" class="descripcion"><div align="center"><strong>Paquetes</strong></div></td>
                  <td width="223" class="descripcion"><div align="center"><strong>Clave</strong></div></td>
                  <td width="79" class="descripcion"><div align="center"><strong>Precio</strong></div></td>
                  <td width="62" class="descripcion"><div align="center"><strong>Total</strong></div></td>
                </tr>
              </table>
            </div>
            <div id="infoCliente">
              <div id="shopping"><img src="img/shoppingbag.jpg" width="132" height="33" /></div>
              <div id="datos">
                <table width="331" border="0">
                  <tr>
                    <td><div align="left" class="abcd">Dirección: <strong><?php  echo "$domicilio";?></strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="left" class="abcd">Colonia: <strong><?php  echo "$col";?> </strong>   C.P. <strong><?php  echo "$CP";?></strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="left" class="abcd">Población: <strong><?php  echo "$Poblacion";?> </strong>EDO. <strong><?php  echo "$Estado";?></strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="left" class="abcd">Teléfono: <strong><?php  echo "$tel";?></strong></div></td>
                  </tr>
                </table>
              </div>
              <div id="NomCliente">
                <div align="left" class="clienteNombre"><strong><?php  echo "$Nombre";?></strong></div>
              </div>
              <?php  $contClaves=0; ?>
              <div id="tablaCorridas">
                <table width="215" border="0">
                  <tr>
                    <td width="32" bgcolor="#666666" class="tablaEnca"><strong>NUM</strong></td>
                    <td width="12" bgcolor="#999999"class="tablaEnca"><div align="center"><strong>2</strong></div></td>
                    <td width="16" bgcolor="#999999"class="tablaEnca"><div align="center">-</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">3</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">-</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">4</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">-</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">5</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">-</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">6</div></td>
                    <td width="10" bgcolor="#999999"class="tablaEnca"><div align="center">-</div></td>
                    <td width="33" bgcolor="#999999"class="tablaEnca"><div align="center">T</div></td>
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
              <div id="boton2">
                <div id="shopBoton"><img src="img/continue.jpg" name="Imagen33" width="118" height="15" border="0" id="Imagen33" /></div>
                <div id="checkoBoton" onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'" style="text-align:center" onclick="crearPedido(<?php  echo "$idCliente";?>);"><img src="img/checkout.jpg" name="Imagen34" width="81" height="20" border="0" id="Imagen34" /></div>
              </div>
            </div>
          </div></div>

		
		
