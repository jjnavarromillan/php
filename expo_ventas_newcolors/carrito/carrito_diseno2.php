 <link rel="stylesheet" type="text/css" href="carrito_diseno.css">
<style type="text/css">
<!--
#divLblPrecioOferta {
	position:absolute;
	width:111px;
	height:15px;
	z-index:1;
	left: 0px;
	top: 3px;
}
#DivZoMasCarritoDis {
	position:absolute;
	width:13px;
	height:13px;
	z-index:1;
	left: 67px;
	top: -57px;
}
#divIcoCarrCarDis {
	position:absolute;
	width:17px;
	height:16px;
	z-index:8;
	left: 30px;
	top: 4px;
}
-->
</style>
<script type="text/javascript">
<!--
/*function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}*/
//-->
</script>
<body ><div id="divprinCarrito2011">
	
  <div id="encaCarrito">
    <?php 
  	$idTienda= $_REQUEST['idTienda'];
	$seccionCatalogo= $_REQUEST['seccionCatalogo'];
	if($seccionCatalogo=="Distribuidores" ){
  		$sqlGetData = " SELECT carrito_pedido_detalle.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido.idCliente,estilos.precioOferta FROM carrito_pedido_detalle,estilos,carrito_pedido where carrito_pedido_detalle.idEstilo=estilos.Id and carrito_pedido.idCarPed=carrito_pedido_detalle.idCarPed and carrito_pedido_detalle.idTienda=$idTienda group by idCliente,carrito_pedido_detalle.idEstilo order by carrito_pedido_detalle.idCarPedDet";
	}
	
	if( $seccionCatalogo=="Programacion"){
  		$sqlGetData = " SELECT carrito_pedido_detalle_operaciones.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido_operaciones.idCliente,estilos.precioOferta FROM carrito_pedido_detalle_operaciones,estilos,carrito_pedido_operaciones where carrito_pedido_detalle_operaciones.idEstilo=estilos.Id and carrito_pedido_operaciones.idCarPed=carrito_pedido_detalle_operaciones.idCarPed and carrito_pedido_detalle_operaciones.idTienda=$idTienda group by idCliente,carrito_pedido_detalle_operaciones.idEstilo order by carrito_pedido_detalle_operaciones.idCarPedDet";
	}
	if( $seccionCatalogo=="Temporadas"){
  		$sqlGetData = " SELECT carrito_pedido_detalle_operaciones.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido_operaciones.idCliente,estilos.precioOferta FROM carrito_pedido_detalle_operaciones,estilos,carrito_pedido_operaciones where carrito_pedido_detalle_operaciones.idEstilo=estilos.Id and carrito_pedido_operaciones.idCarPed=carrito_pedido_detalle_operaciones.idCarPed and carrito_pedido_detalle_operaciones.idTienda=$idTienda group by idCliente,carrito_pedido_detalle_operaciones.idEstilo order by carrito_pedido_detalle_operaciones.idCarPedDet";
	}
	if( $seccionCatalogo=="InventarioEmpresa"){
  		$sqlGetData = " SELECT carrito_pedido_detalle_operaciones.idEstilo as idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,estilos.precio as precio,sum(cantidad*pares) as pares,sum(cantidad*pares*estilos.precio) as Importe,carrito_pedido_operaciones.idCliente,estilos.precioOferta FROM carrito_pedido_detalle_operaciones,estilos,carrito_pedido_operaciones where carrito_pedido_detalle_operaciones.idEstilo=estilos.Id and carrito_pedido_operaciones.idCarPed=carrito_pedido_detalle_operaciones.idCarPed and carrito_pedido_detalle_operaciones.idTienda=$idTienda group by idCliente,carrito_pedido_detalle_operaciones.idEstilo order by carrito_pedido_detalle_operaciones.idCarPedDet";
	}
	
	if($seccionCatalogo=="Sugerencias"){
		$sqlGetData = " SELECT carrito_pedido_detalle_sugerencias.idEstilo, estilos.Linea as linea, estilos.Estilo as estilo , estilos.Material as material, estilos.Color as color, estilos.Precio, carrito_pedido_sugerencias.idCliente, carrito_pedido_detalle_sugerencias.precio, estilos.precioOferta,Sum(carrito_pedido_detalle_sugerencias.cantidad*carrito_pedido_detalle_sugerencias.pares) AS pares, Sum(carrito_pedido_detalle_sugerencias.cantidad*carrito_pedido_detalle_sugerencias.pares*carrito_pedido_detalle_sugerencias.precio) AS Importe
FROM (carrito_pedido_detalle_sugerencias INNER JOIN carrito_pedido_sugerencias ON carrito_pedido_detalle_sugerencias.idCarPed = carrito_pedido_sugerencias.idCarPed) INNER JOIN estilos ON carrito_pedido_detalle_sugerencias.idEstilo = estilos.Id
WHERE 1 and carrito_pedido_detalle_sugerencias.idTienda=$idTienda
GROUP BY carrito_pedido_detalle_sugerencias.idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.Precio, carrito_pedido_sugerencias.idCliente, carrito_pedido_detalle_sugerencias.precio,estilos.precioOferta";		
	}
	if($seccionCatalogo=="Inventario"){
		$sqlGetData = " SELECT carrito_pedido_detalle_inventario.idEstilo, estilos.Linea as linea, estilos.Estilo as estilo , estilos.Material as material, estilos.Color as color, estilos.Precio, carrito_pedido_inventario.idCliente, carrito_pedido_detalle_inventario.precio,estilos.precioOferta, Sum(carrito_pedido_detalle_inventario.cantidad*carrito_pedido_detalle_inventario.pares) AS pares, Sum(carrito_pedido_detalle_inventario.cantidad*carrito_pedido_detalle_inventario.pares*carrito_pedido_detalle_inventario.precio) AS Importe
FROM (carrito_pedido_detalle_inventario INNER JOIN carrito_pedido_inventario ON carrito_pedido_detalle_inventario.idCarPed = carrito_pedido_inventario.idCarPed) INNER JOIN estilos ON carrito_pedido_detalle_inventario.idEstilo = estilos.Id
WHERE 1 and carrito_pedido_inventario.idTienda=$idTienda
GROUP BY carrito_pedido_detalle_inventario.idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color, estilos.Precio, carrito_pedido_inventario.idCliente, carrito_pedido_detalle_inventario.precio,estilos.precioOferta";		
	}
	
			//echo $sqlGetData;
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
			$mysqli->query("SET NAMES 'utf8'");
			$idEstilo=""; //1
			$linea=""; //2
			$estilo=""; //3
			$material=""; //4
			$color=""; //5
			$pares=""; //16
			$Importe=""; //17
			$idCliente="";
			$data_="";
			$num=0;
			if($result_data=$mysqli->query($sqlGetData)){
			
				$num=mysqli_num_rows($result_data);
				//echo $num;
				
				?>
    <div class="infoPrecio" id="par2Div">
      <div id="divCarArDiseno2" class="infoPrecio2Sistema"><a href="#">  Carrito  (
          <?php  echo "$num";?>
    artículos)</a></div><strong><label id="lblParesTotalCarrito" style="display:none"><?php  echo "$num";?></label></strong></div>
  </div>
  
  <div id="divCarroElements500">
  
  
				<div id="divGranTotalCarro">
				  <?php 
				for ($i=0;$i<$num;$i++)
				{	  
				
				$rowdata=mysqli_fetch_object($result_data);
				$idEstilo=$rowdata->idEstilo;
				$linea=$rowdata->linea;
				$estilo=$rowdata->estilo;
				$material=$rowdata->material;
				$color=$rowdata->color;
				$precio=$rowdata->precio;
				$precioOferta=$rowdata->precioOferta;
					
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
				
                ?>  
    <div id="divCarro500">
      <div id="divImgZap500"><img src="imageresize.php?urlsource=../imagenes_system/muestras/400/<?php echo $foto; ?>&urldestyni=../imagenes_system/muestras/minis/<?php echo $foto; ?>&width=73&height=73&quality=100&urlerror=../imagenes_system/muestras/sinfoto.gif" name="carroImg1" width="73" height="73" top="200" id="carroImg1" onClick="document.getElementById('divFotoZoom').style.visibility='visible';llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>','divFotoZoom');"  onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'"  /></div>
      <div class="numEstilo" id="carroLinea500"><?php  echo "$estilo"; ?></div>
      <div class="infoEstiloZap" id="carroNombreEstiloZap500"><strong><?php  echo "$material $color"; ?></strong>
        <div id="DivZoMasCarritoDis"><img src="carrito/img/zoom.jpg" width="13" height="13"  onClick="document.getElementById('divFotoZoom').style.visibility='visible';llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>','divFotoZoom');"  onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'"/></div>
      </div>
      <div id="linDivsm500"><img src="source/linea-sm.png" width="109" height="10" />
      <?php 
	  if($precioOferta!=""){
			?>
        		<div class="infoPrecio" id="divLblPrecioOferta">Precio Oferta:$ <?php  echo "$precioOferta"; ?></div>    
            <?php   
	   }
      ?>
      </div>
      <div class="infoPrecio" id="carroPrecioZap500">Precio:$ <?php  echo "$precio"; ?></div>
      <div id="divChk500">
<label>
        	<?php 
            	$cont_chk=$i+1;
			?>
          <input type="checkbox" name='chk<?php  echo "$cont_chk";?>' id='chk<?php  echo "$cont_chk";?>' />
        </label>
        <label id='carroIdEstilo<?php  echo "$cont_chk";?>' style='display:none'><?php  echo "$idEstilo";?></label></div>
    </div>
    
    <?php 
				}
			}
				?>
</div>
                <?php 
				
		
	?>
  <label id='lblCantidadEnCarrito' style='display:none'><?php  echo "$num";?></label>
</div>
  <div id="divIcoCarrCarDis"><img src="carrito/source/carrito.jpg" width="16" height="16"></div>
</div>  
