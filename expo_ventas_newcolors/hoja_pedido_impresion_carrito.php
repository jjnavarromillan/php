<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php 
	$posPag = 1;
	
	if(isset($_REQUEST['posPag'])){
		$posPag = $_REQUEST['posPag'];
	}
	$nextPage = $posPag;
	$prevPage = $posPag;
	
	$horaregistro = date('Y/m/d H:i:s');
	
	$noPags=1;
	$idTienda= $_REQUEST['idTienda'];

	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");    
	$mysqli->query("SET NAMES 'utf8'");
	
	$sumpares=0;
	$sumtotal=0;
	
	
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
				

				$noPags_=0;
				echo "$noPags -- ";
				if(($num % 9) > 0 ){
					$noPags=intval($num / 9)+1;
				}
				
				$noPags_ = intval($num / 9);
				if($noPags_ == $noPags){
					$noPags = $noPags_;
				}
				
				
			}
			
?>

<link rel="stylesheet" type="text/css" href="css/hoja_pedido_impresion_carrito.css">
<script language="javascript">
	function ocultarFotos(){
		var valorChk =  document.getElementById('chkFoto').checked;
		var nElementos = document.getElementById('nelementos').innerHTML;
		for (i=1;i<=nElementos;i++){
			if(!valorChk){
				document.getElementById('carroImg'+i).style.visibility="hidden";	
			}
			else{
				document.getElementById('carroImg'+i).style.visibility="visible";	
			}
			
		}
	}
</script>

<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:58px;
	height:14px;
	z-index:11;
	left: 0px;
	top: 14px;
}
#apDiv2 {
	position:absolute;
	width:257px;
	height:17px;
	z-index:12;
	left: 52px;
	top: 13px;
}
#apDiv3 {
	position:absolute;
	width:69px;
	height:18px;
	z-index:13;
	left: 0px;
	top: 81px;
}
#apDiv4 {
	position:absolute;
	width:566px;
	height:29px;
	z-index:14;
	left: 75px;
	top: 62px;
}
#apDiv5 {
	position:absolute;
	width:45px;
	height:14px;
	z-index:15;
	left: 0px;
	top: 94px;
}
#apDiv6 {
	position:absolute;
	width:564px;
	height:33px;
	z-index:16;
	left: 76px;
	top: 92px;
}
#apDiv7 {
	position:absolute;
	width:57px;
	height:14px;
	z-index:17;
	left: 0px;
	top: 36px;
}
#apDiv8 {
	position:absolute;
	width:259px;
	height:19px;
	z-index:18;
	left: 52px;
	top: 34px;
}
#apDiv9 {
	position:absolute;
	width:58px;
	height:14px;
	z-index:13;
	left: 0px;
	top: 60px;
}
#apDiv10 {
	position:absolute;
	width:114px;
	height:20px;
	z-index:19;
	left: 350px;
	top: 13px;
}
#apDiv11 {
	position:absolute;
	width:65px;
	height:14px;
	z-index:19;
	left: 344px;
	top: 14px;
}
#apDiv12 {
	position:absolute;
	width:209px;
	height:19px;
	z-index:20;
	left: 409px;
	top: 13px;
}
#divPares {
	position:absolute;
	width:151px;
	height:15px;
	z-index:3;
	left: 322px;
	top: 181px;
}
#divTotal {
	position:absolute;
	width:151px;
	height:16px;
	z-index:4;
	left: 505px;
	top: 181px;
}
#divVerFoto {
	position:absolute;
	width:65px;
	height:14px;
	z-index:5;
	left: 32px;
	top: 161px;
	text-align: right;
}
body {
	background-color: #F0F0F0;
	background-repeat: no-repeat;
	text-decoration: none;
}
#apDiv13 {
	position:absolute;
	width:109px;
	height:14px;
	z-index:13;
	left: 298px;
	top: 932px;
}

-->
</style>
<div id="divContenidoImpresion">
<div  class="tipoAtnecionPiePag" id="apDiv13">Firma Autorizaci&oacute;n</div>
	<?php 
			
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
		$sql="";
		
		$idTiendat="";
		$nombre="";
		$tienda="";
		$estado="";
		$municipio="";
		$colonia = "";
		$domicilio = "";
		$tels = "";
		$cp = "";
		$RFC = "";
		$tels ="";
		$email = "";
		$estadoTienda ="";
		$municipioTienda = "";
		$domTienda = "";
		$colTienda = "";
		$cpTienda = "";
		$transporte = "";
		$obsGuia = "";
		$transporteSeguro ="";
		
			
		//	$sqlGetData= "SELECT detallistas_tiendas.idTienda, detallistas_clientes.idCliente, detallistas_clientes.nombre, estados.estado, municipios.municipio, detallistas_clientes.domicilio, detallistas_clientes.col, detallistas_clientes.cp, detallistas_clientes.encargado, detallistas_clientes.telefonos, detallistas_clientes.RFC, detallistas_clientes.email FROM detallistas_tiendas LEFT JOIN ((detallistas_clientes LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente where detallistas_tiendas.idTienda = $idTienda"; 
		
		$sqlGetData="SELECT detallistas_tiendas.idTienda, detallistas_clientes.nombre, detallistas_tiendas.tienda, estados.estado, municipios.municipio, detallistas_tiendas.idCliente, detallistas_clientes.domicilio, detallistas_clientes.col, detallistas_clientes.cp, detallistas_clientes.RFC, detallistas_clientes.telefonos as tels, detallistas_clientes.email, estados_1.estado as estadoTienda, municipios_1.municipio as municipioTienda, detallistas_tiendas.domicilio as domTienda, detallistas_tiendas.col as colTienda, detallistas_tiendas.cp as cpTienda, detallistas_tiendas.transporte, detallistas_tiendas.obsGuia, detallistas_tiendas.transporteSeguro
FROM ((detallistas_tiendas LEFT JOIN ((detallistas_clientes LEFT JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio) LEFT JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) ON detallistas_tiendas.idCliente = detallistas_clientes.idCliente) INNER JOIN estados AS estados_1 ON detallistas_tiendas.idEstado = estados_1.idEstado) INNER JOIN municipios AS municipios_1 ON detallistas_tiendas.idMunicipio = municipios_1.idMunicipio where  detallistas_tiendas.idTienda='{$idTienda}'";

			if($result_data=$mysqli->query($sqlGetData)){
				if($rowdata=mysqli_fetch_object($result_data)){
					$idTiendat=$rowdata->idTienda;
			$Tienda=$rowdata->tienda;
			
			$nombre=$rowdata->nombre;
			
			$estado=$rowdata->estado;
			$municipio=$rowdata->municipio;
			$colonia = $rowdata->col;
			$domicilio = $rowdata->domicilio;
			$tels = $rowdata->tels;
			$cp = $rowdata->cp;
			$RFC = $rowdata->RFC;
			$tels = $rowdata->tels;
			$email = $rowdata->email;
			$estadoTienda = $rowdata->estadoTienda;
			$municipioTienda = $rowdata->municipioTienda;
			$domTienda = $rowdata->domTienda;
			$colTienda = $rowdata->colTienda;
			$cpTienda = $rowdata->cpTienda;
			$transporte = $rowdata->transporte;
			$obsGuia = $rowdata->obsGuia;
			$transporteSeguro = $rowdata->transporteSeguro;

					
	?>
  <div id="divEncabezadoImpresion">
    <div  class="fuenteElementos"id="divToParesImpresion">Elementos en carro <label id="nelementos"><?php  echo "$num"; ?></label></div>

    <div id="apDiv1" class="textoTotales">Cliente:</div>
    <div id="apDiv2" class="textoTotales"><?php  echo  "$nombre";?></div>
    <div id="apDiv4" class="textoTotalesSm"><?php echo "$domicilio";?>, <?php echo "$col";?>, <?php echo "$estado";?>,<?php echo "$municipio";?>, CP: <?php echo "$municipio";?>,tras: <?php echo "$RFC";?>, Tel: <?php echo "$tels";?>, email: <?php echo "$email";?> </div>
    <div id="apDiv5" class="textoTotales">Envio:</div>
    <div id="apDiv6" class="textoTotalesSm"><?php echo "$domTienda";?>, <?php echo "$colTienda";?>, <?php echo "$estadoTienda";?>,<?php echo "$municipioTienda";?>, CP: <?php echo "$municipioTienda";?>,transporte: <?php echo "$transporte:";?>, obsGuia: <?php echo "$obsGuia";?>, transporteSeguro: <?php echo "$transporteSeguro";?></div>
    <div id="apDiv7" class="textoTotales">Tienda:</div>
    <div id="apDiv8"><?php  echo "$tienda";?></div>
    <div id="apDiv9" class="textoTotales">Datos doc:</div>
    <div id="apDiv12"></div>
    <div id="apDiv11" class="textoTotales">Comprador:</div>
  </div>
  
  <?php 
				}
  			}
  ?>
  <div id="divImagenImpresion">
    <div  class="textoTotales"id="divFechaHoraImpresion"><?php echo "$horaregistro"?></div>
    <div id="divImgTitulo"><img src="img/carrito-compra.jpg" width="212" height="33" /></div>
    <div  class="titulo" id="divTemporda">
      <div class="bold" id="divIconoNC">nc</div>
    Primavera &amp; Verano 2013</div>
    <div id="divVerFoto" class="listaPedido">
      <label>
        <input name="chkFoto" type="checkbox" id="chkFoto" checked="checked" onchange="ocultarFotos();"/>
      </label>
      Ver foto </div>
  </div>
  
  
  
  
  
  <div id="divLinea2Impresion"><img src="img/linea-tablet.png" width="650" height="7" /></div>
  <div class="datosClientes"  id="divPagdeImpresion">P&aacute;gina <?php  echo "$posPag"; ?> de <?php  echo "$noPags"; ?> 
  	<?php 
	if($posPag < $noPags){
		$nextPage = $posPag+1;
	}
	if($posPag > 1){
		$prevPage = $posPag-1;
	}
	
	if($posPag>1 && $posPag<=$noPags){
		?>
        <a href="hoja_pedido_impresion_carrito.php?posPag=<?php  echo "$prevPage";?>&idTienda=<?php  echo "$idTienda";?>"> Anterior</a>
        <?php 
	}
	if($posPag<$noPags){
		?>
         <a href="hoja_pedido_impresion_carrito.php?idTienda=<?php  echo "$idTienda";?>&posPag=<?php  echo "$nextPage";?>"> Siguiente </a>
        <?php 
	}
	?>
  	</div>
<div id="divLineaImpresion"><img src="img/linea-tablet.png" width="650" height="7" /></div>
<div id="divMenuImp">
  <div  class="textoTotales" id="divFotoImpresion">Foto</div>
  <div class="textoTotales" id="divMateriaColImpresion1">Material / Color</div>

</div>
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
				$ic=0;
				for ($i=$ic;$i<$num;$i++)
				{	  
				
				if($rowdata=mysqli_fetch_object($result_data)){
					$ic++;
					if($ic>$iniFor && $ic<=$finFor){
						
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
					$sumpares+=$Pares;
					$sumtotal+=$sumtotal;
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
    <img src="../imagenes_system/muestras/minis/<?php  echo "$foto";?>" name="carroImg<?php  echo "{$ic}";?>" width="73" height="73" top="200" id="carroImg<?php  echo "{$ic}";?>" class="imagenEstilo"  /></div>
    <div id="divHojaPrepedidoLblCons" class="listaPedido"><?php  echo $i+1; ?></div>
    <div  class="listaPedido"id="divCantidadImpresion">$
      <?php  echo "$Total"; ?>
    </div>
    <div class="listaPedido" id="divNomZapMaterialImpre">
      <?php  echo "$Estilo $Material $Color"; ?>
    </div>
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
    <div  class="listaPedido" id="divCantiParesImpresion">
      <?php  echo "$Pares"; ?>
    </div>
    <div  class="listaPedido"id="divCostoPrecioImpresion">
      <?php  echo "$Precio"; ?>
    </div>
  </div>
  
  
   <?php  
					}
				}
			}
			}
			
  ?>

</div>
  <div class="textoTotales" id="divPares">Total de pares: <?php  echo "$sumpares"; ?></div>
  <div class="textoTotales" id="divTotal">Total importe: $ <?php  echo "$sumtotal"; ?></div>
<div id="divContenidoPiePagImpresion">
  <div  class="tipoInformacionPiePag" id="divDireccionImp">NUDO DE CEMPOALTEPEC N° 1129</div>
  <div  class="tipoInformacionPiePag"id="divColImp">COL. VICENTE GUERRERO C.P 44330 GUADALAJARA,JALISCO</div>
  <div  class="tipoInformacionPiePag" id="divTelImp">TEL: 01(33) 3609 2232 / 3609 4304</div>
  <div  class="tipoAtnecionPiePag" id="divAntencionImpr">ATENCION A CLIENTES: LAURA GONZALES</div>
  <div  class="tipoMailPiePag" id="divMailVentasImp">lauraventasnc@hotmail.com</div>
</div>
</div> 
</body>
</html>