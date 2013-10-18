<?php 
	$posPag = 1;
	
	if(isset($_REQUEST['posPag'])){
		$posPag = $_REQUEST['posPag'];
	}
	$nextPage = $posPag;
	$prevPage = $posPag;
	
	
	
	$noPags=1;
	$idTienda= $_REQUEST['idTienda'];
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	
	$sqlGetData= "SELECT count(carrito_pedido_detalle_operaciones.idCarPedDet) as cant,count(carrito_pedido_detalle_operaciones.pares) as sumpares,count(carrito_pedido_detalle_operaciones.total) as sumtotal
FROM (carrito_pedido_detalle_operaciones INNER JOIN estilos ON carrito_pedido_detalle_operaciones.idEstilo = estilos.Id) INNER JOIN carrito_pedido_operaciones ON carrito_pedido_detalle_operaciones.idCarPed = carrito_pedido_operaciones.idCarPed where carrito_pedido_operaciones.idTienda = $idTienda";
			$sumpares=0;
			$sumtotal=0;
			if($result_data=$mysqli->query($sqlGetData)){
				$num=mysqli_num_rows($result_data);
				
				if($rowdata=mysqli_fetch_object($result_data)){
					$num = $rowdata->cant;
					$sumpares =  $rowdata->sumpares;
					$sumtotal =  $rowdata->sumtotal;
				}
				
				$noPags = intval($num / 9);
				
				if(($num % 9) > 0 ){
					$noPags=$noPags+1;
					
					
				}
				
			}
			
?>

<link rel="stylesheet" type="text/css" href="css/hoja_pedido_impresion.css">


<style type="text/css">
<!--
#divHojaPrepedidoContenEstilos {
	position:absolute;
	width:664px;
	height:728px;
	z-index:9;
	left: 5px;
	top: 220px;
	overflow: auto;
}
#divHojaPrepedidoLblCons {
	position:absolute;
	width:20px;
	height:16px;
	z-index:12;
	left: 7px;
	top: 27px;
	text-align: center;
}
#apDiv1 {	position:absolute;
	width:58px;
	height:16px;
	z-index:11;
	left: 2px;
	top: 14px;
}
#apDiv11 {	position:absolute;
	width:85px;
	height:20px;
	z-index:19;
	left: 344px;
	top: 13px;
}
#apDiv12 {	position:absolute;
	width:209px;
	height:19px;
	z-index:20;
	left: 432px;
	top: 13px;
}
#apDiv2 {	position:absolute;
	width:257px;
	height:17px;
	z-index:12;
	left: 79px;
	top: 14px;
}
#apDiv3 {	position:absolute;
	width:69px;
	height:18px;
	z-index:13;
	left: 1px;
	top: 59px;
}
#apDiv4 {	position:absolute;
	width:566px;
	height:29px;
	z-index:14;
	left: 75px;
	top: 59px;
}
#apDiv5 {	position:absolute;
	width:71px;
	height:21px;
	z-index:15;
	left: 0px;
	top: 94px;
}
#apDiv6 {	position:absolute;
	width:564px;
	height:33px;
	z-index:16;
	left: 76px;
	top: 92px;
}
#apDiv7 {	position:absolute;
	width:57px;
	height:18px;
	z-index:17;
	left: 3px;
	top: 33px;
}
#apDiv8 {	position:absolute;
	width:259px;
	height:19px;
	z-index:18;
	left: 78px;
	top: 35px;
}
#apDiv9 {position:absolute;
	width:69px;
	height:18px;
	z-index:13;
	left: 1px;
	top: 59px;
}
-->
</style>
<div id="divContenidoImpresion">
	<?php 
			
			$sqlGetData= "SELECT detallistas_tiendas.idTienda, detallistas_clientes.idCliente, detallistas_clientes.nombre, estados.estado, municipios.municipio, detallistas_clientes.domicilio, detallistas_clientes.col, detallistas_clientes.cp, detallistas_clientes.encargado, detallistas_clientes.telefonos, detallistas_clientes.RFC, detallistas_clientes.email
FROM detallistas_tiendas LEFT JOIN ((detallistas_clientes LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente where detallistas_tiendas.idTienda = $idTienda";
			if($result_data=$mysqli->query($sqlGetData)){
				if($rowdata=mysqli_fetch_object($result_data)){
					$idCliente = $rowdata->idCliente;
					$nombre = $rowdata->nombre;
					$estado = $rowdata->estado;
					$municipio = $rowdata->municipio;
					$domicilio = $rowdata->domicilio;
					$col = $rowdata->col;
					$cp = $rowdata->cp;
					$encargado = $rowdata->encargado;
					$telefonos = $rowdata->telefonos;
					$RFC = $rowdata->RFC;
					$email = $rowdata->email;

					
	?>
  <div  class="textoTotales"id="divToParesImpresion">Total de pares: <?php  echo "$sumpares"; ?></div>
  <div  class="textoTotales" id="divToImporImpresion">Total importe: $ <?php  echo "$sumtotal"; ?></div>
  
  <?php 
				}
  			}
  ?>
  
  <div id="divIconoImpresion"></div>
  <div  class="textoSecundario" id="divTexImpresion"><a href="#">imprimir</a></div>
  <div id="divImagenImpresion">
    <div  class="textoTotales"id="divFechaHoraImpresion">2012/08/13 18:01:01</div>
    <img src="img/pedido-linea.jpg" width="650" height="53" />
    <div  class="numPedidoImpresion" id="divNumPedidoImpresion">Prepedido</div>
  </div>
  
  
  
  
  
  <div id="divLinea2Impresion"><img src="img/linea-tablet.png" width="650" height="7" /></div>
  <div   id="divPagdeImpresion">P&aacute;gina <?php  echo "$posPag"; ?> de <?php  echo "$noPags"; ?> 
  	<?php 
	if($posPag < $noPags){
		$nextPage = $posPag+1;
	}
	if($posPag > 1){
		$prevPage = $noPags-1;
	}
	
	if($posPag>1 && $posPag<=$noPags){
		?>
        <a href="hoja_prepedido_impresion.php?posPag=<?php  echo "$prevPage";?>"> Anterior</a>
        <?php 
	}
	if($posPag<$noPags){
		?>
         <a href="hoja_prepedido_impresion.php?posPag=<?php  echo "$nextPage";?>"> Siguiente </a>
        <?php 
	}
	?>
  </div>
<div id="divLineaImpresion"><img src="img/linea-tablet.png" width="650" height="7" /></div>
<div id="divHojaPrepedidoContenEstilos">

<?php  
  
  	$sqlGetData= "SELECT carrito_pedido_detalle_operaciones.idCarPedDet, carrito_pedido_detalle_operaciones.idCarPed, carrito_pedido_operaciones.idTienda, carrito_pedido_operaciones.idCliente, carrito_pedido_detalle_operaciones.idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, carrito_pedido_detalle_operaciones.N2, carrito_pedido_detalle_operaciones.N2m, carrito_pedido_detalle_operaciones.N3, carrito_pedido_detalle_operaciones.N3m, carrito_pedido_detalle_operaciones.N4, carrito_pedido_detalle_operaciones.N4m, carrito_pedido_detalle_operaciones.N5, carrito_pedido_detalle_operaciones.N5m, carrito_pedido_detalle_operaciones.N6, carrito_pedido_detalle_operaciones.N6m, carrito_pedido_detalle_operaciones.Pares, carrito_pedido_detalle_operaciones.Total, estilos.Precio
FROM (carrito_pedido_detalle_operaciones INNER JOIN estilos ON carrito_pedido_detalle_operaciones.idEstilo = estilos.Id) INNER JOIN carrito_pedido_operaciones ON carrito_pedido_detalle_operaciones.idCarPed = carrito_pedido_operaciones.idCarPed where carrito_pedido_operaciones.idTienda = $idTienda";
			if($result_data=$mysqli->query($sqlGetData)){
				
				$num=mysqli_num_rows($result_data);
				
				
				$iniFor = (($posPag-1) * 9 ) ;
				$finFor = $iniFor+9;
				
				if($finFor >= $num){
					$finFor = $num;
				}
				for ($i=$iniFor;$i<$finFor;$i++)
				{	  
				if($rowdata=mysqli_fetch_object($result_data)){
  					$idCarPedDet = $rowdata->idCarPedDet;
					$idCarPed = $rowdata->idCarPed;
					
					$idEstilo = $rowdata->idEstilo;
					$Linea = $rowdata->Linea;
					$Estilo = $rowdata->Estilo;
					$Material = $rowdata->Material;
					$Color = $rowdata->Color;
					$N2 = $rowdata->N2;
					$N2m = $rowdata->N2m;
					$N3 = $rowdata->N3;
					$N3m = $rowdata->N3m;
					$N4 = $rowdata->N4;
					$N4m = $rowdata->N4m;
					$N5 = $rowdata->N5;
					$N5m = $rowdata->N5m;
					$N6 = $rowdata->N6;
					$N6m = $rowdata->N6m;
					$Precio = $rowdata->Precio;
					$Pares = $rowdata->Pares;
					$Total = $rowdata->Total;
					
					$nombreFoto="$Estilo $Material $Color";
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
					
  ?>
  
  <div id="divGrupoPedidoImpresion">
    <div id="divImgZapImpresion">
    <img src="../imagenes_system/muestras/minis/<?php  echo "$foto";?>" name="carroImg1" width="73" height="73" top="200" id="carroImg1"   /></div>
    <div  class="textoTotales" id="divMateriaColImpresion">Material / Color</div>
    <div class="textoTotales" id="divNumeraImpresion">Numeraci&oacute;n</div>
    <div  class="textoTotales"id="divPrecioImpresion">Precio</div>
    <div class="textoTotales" id="divTotalImpresion">Total</div>
    <div class="listaPedido" id="divNomZapMaterialImpre"><?php  echo "$Estilo $Material $Color"; ?></div>
    <div id="divTablaCorridaImpresion">
      <table class="listaPedido" width="215" border="0">
        <tr>
          <td >2</td>
          <td>-</td>
          <td>3</td>
          <td>-</td>
          <td>4</td>
          <td>-</td>
          <td>5</td>
          <td>-</td>
          <td>6</td>
          <td>-</td>
        </tr>
        <tr>
          <td><?php  echo "$N2"; ?></td>
          <td><?php  echo "$N2m"; ?></td>
          <td><?php  echo "$N3"; ?></td>
          <td><?php  echo "$N3m"; ?></td>
          <td><?php  echo "$N4"; ?></td>
          <td><?php  echo "$N4m"; ?></td>
          <td><?php  echo "$N5"; ?></td>
          <td><?php  echo "$N5m"; ?></td>
          <td><?php  echo "$N6"; ?></td>
          <td><?php  echo "$N6m"; ?></td>
        </tr>
      </table>
    </div>
    <div class="textoTotales" id="divTotalParesImpresion"> Pares</div>
    <div  class="listaPedido" id="divCantiParesImpresion"><?php  echo "$Pares"; ?></div>
    <div  class="listaPedido"id="divCostoPrecioImpresion"><?php  echo "$Precio"; ?></div>
    <div  class="listaPedido"id="divCantidadImpresion">$<?php  echo "$Total"; ?></div>
    <div id="divHojaPrepedidoLblCons" class="listaPedido"><?php  echo $i+1; ?></div>
  </div>
  
  
   <?php  
					}
				}
			}
			
  ?>

</div>
<div id="divEncabezadoImpresion">
  <div  class="textoTotales"id="divToParesImpresion2">Elementos en carro
    <?php  echo "$num"; ?>
  </div>
  <div id="apDiv1" class="textoTotales">Cliente:</div>
  <div id="apDiv3" class="textoTotales">Datos doc</div>
  <div id="apDiv2" class="textoTotales">
    <?php  echo  "$nombre";?>
  </div>
  <div id="apDiv4" class="textoTotales"><?php echo "$domicilio";?>, <?php echo "$col";?>, <?php echo "$estado";?>,<?php echo "$municipio";?>, CP: <?php echo "$municipio";?>,tras: <?php echo "$RFC";?>, Tel: <?php echo "$tels";?>, email: <?php echo "$email";?></div>
  <div id="apDiv5" class="textoTotales">Envio</div>
  <div id="apDiv6" class="textoTotales"><?php echo "$domTienda";?>, <?php echo "$colTienda";?>, <?php echo "$estadoTienda";?>,<?php echo "$municipioTienda";?>, CP: <?php echo "$municipioTienda";?>,transporte: <?php echo "$transporte:";?>, obsGuia: <?php echo "$obsGuia";?>, transporteSeguro: <?php echo "$transporteSeguro";?></div>
  <div id="apDiv7" class="textoTotales">Tienda</div>
  <div id="apDiv8">
    <?php  echo "$tienda";?>
  </div>
  <div id="apDiv9" class="textoTotales">Datos doc</div>
  <div id="apDiv12"></div>
  <div id="apDiv11" class="textoTotales">Comprador</div>
</div>
</div> 
</body>
</html>