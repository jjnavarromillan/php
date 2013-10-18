<?php 
$idPedido = $_GET['idPedido'];
$idCliente = $_GET['idCliente'];

    $mysqli= new mysqli("locahost","user_web","123454321","newcolors");    
    	$totalEstilos=0;
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
		$transporte="";
		$totalPedido="";
		$paresPedido="";
	
    $sql=" SELECT idDatCliFac,clientes_tiendas.Nombre,clientes_tiendas.Tienda,clientes_tiendas.Tel,clientes_tiendas.domicilio,clientes_tiendas.col,clientes_tiendas.CP,clientes_tiendas.Poblacion,
clientes_tiendas.Estado,clientes_tiendas.Pais,clientes_tiendas.RFC, pedidos.fechaPedido,clientes_tiendas.transporte,pedidos.pares,pedidos.totalPedido
FROM pedidos, clientes_tiendas where pedidos.idDatCliFac=clientes_tiendas.idDatCli and  pedidos.idPed='{$idPedido}'   ";

    if($result=$mysqli->query($sql)){
		
		$cont=1;
		if($obj=$result->fetch_object()){
			$transporte=$obj->transporte;

			$Nombre=$obj->Nombre;
			$Tienda=$obj->Tienda;
			$domicilio=$obj->domicilio;
			$col=$obj->col;
			$CP=$obj->CP;
			$Poblacion=$obj->Poblacion;
			$Estado=$obj->Estado;
			$Pais=$obj->Pais;
			$RFC=$obj->RFC;
			$fecha=$obj->fechaPedido;
			$tel=$obj->Tel;
			$totalPedido=$obj->totalPedido;
			$paresPedido = $obj->pares;
		}
	}
	
	
	
	
?>
<link rel="stylesheet" type="text/css" href="levantar_pedido_2.css">

<style type="text/css">
<!--
#apDivTotalPedido {
	position:absolute;
	width:85px;
	height:14px;
	z-index:2;
	left: 32px;
	top: -1px;
}
-->
</style>
<div id="divConPriLevantarPe">
  <div id="divPediLevantarPe"><img src="img/pedido.jpg" width="93" height="33" /></div>
  <div class="clienteNombre" id="divNomCliLevantarPe"><?php  echo "$Nombre";?></div>
  <div id="divLogoNcLevantarPe"><img src="img/logo-nc-hoja-pedido.jpg" width="212" height="19" /></div>
  <div id="divDatClieLevantarPe">
    <table width="280" border="0">
      <tr>
        <td><div align="left" class="abcdDatosCliente">Dirección: <?php  echo "$domicilio";?></div></td>
      </tr>
      <tr>
        <td><div align="left" class="abcdDatosCliente">Colonia: <?php  echo "$col";?> C.P <?php  echo "$CP";?></div></td>
      </tr>
      <tr>
        <td><div align="left" class="abcdDatosCliente">Población: <?php  echo "$Poblacion";?> EDO. <?php  echo "$Estado";?></div></td>
      </tr>
      <tr>
        <td><div align="left" class="abcdDatosCliente">Tel: <?php  echo "$tel";?></div></td>
      </tr>
      <tr>
        <td><div align="left" class="abcdDatosCliente">Paqueteria: <?php  echo "$transporte";?></div></td>
      </tr>
    </table>
  </div>
  <div id="divCorriLevantarPe">
    <table width="215" border="0">
      <tr>
        <td width="21"><div align="center" class="blancoEncabezado">Num</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">2</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">3</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">4</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">5</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">6</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="22"><div align="center" class="blancoEncabezado">Total</div></td>
      </tr>
      <tr>
        <td><div align="center" class="abcd">A</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
      <tr>
        <td><div align="center" class="abcd">B</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
      <tr>
        <td><div align="center" class="abcd">C</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
    </table>
  </div>
  <div id="divTabGriLevantarPe"><img src="source/barritaTabla.jpg" width="221" height="20" /></div>
  <div id="divNumPedLevantarPed">
    <div id="divPePediLevantarPe">
      <div align="center" class="blancoEncabezado">Pedido</div>
    </div>
    <div id="divNumPed2LevantarPe">
      <div align="center" class="blackinformetion"><?php  echo "$idPedido";?></div>
  </div>
  <img src="img/cuadro-num-pedido.jpg" width="53" height="33" /> </div>
  <div id="divLinDiLevantarPe"><img src="img/linea-divisora.jpg" width="800" height="5" /></div>
  <div id="divFecMADLevantarpe" class="abcd"><?php  echo "$fecha"; ?></div>
  <div id="divGrisLevantarPe">
    <div id="divFeTipoLevantarPe" class="abcd">Fecha</div>
  <img src="img/boton_totalPares.jpg" width="102" height="15" /></div>
  <div id="divTabaVaLevantarPe">
    <table width="800" border="0">
      <tr>
        <td width="277" class="descripcion"><div align="center">Material / Color</div></td>
        <td width="57"><div align="center" class="abcd">Paquetes</div></td>
        <td width="53"><div align="center" class="abcd">Cantidad</div></td>
        <td width="11"><div align="center" class="abcd">2</div></td>
        <td width="11"><div align="center" class="abcd">-</div></td>
        <td width="11"><div align="center" class="abcd">3</div></td>
        <td width="11"><div align="center" class="abcd">-</div></td>
        <td width="11"><div align="center" class="abcd">4</div></td>
        <td width="11"><div align="center" class="abcd">-</div></td>
        <td width="11"><div align="center" class="abcd">5</div></td>
        <td width="11"><div align="center" class="abcd">-</div></td>
        <td width="11"><div align="center" class="abcd">6</div></td>
        <td width="11"><div align="center" class="abcd">-</div></td>
        <td width="44"><div align="center" class="abcd">PARES</div></td>
        <td width="98" class="descripcion"><div align="center">Precio</div></td>
        <td width="85" class="descripcion"><div align="center">Total</div></td>
      </tr>
    </table>
  </div>
  <div id="divTotalInfeLevantarPe">
    <div  class="blancoEncabezado"id="divToInfLevantarPe">Total:</div>
  <img src="img/barrita_total2.jpg" width="102" height="17" /></div>
  <?php  
  	 
  	$sql2="SELECT pedidos_detalle.idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,pedidos_detalle.clvPaq,pedidos_detalle.cantPaq,
pedidos_detalle.N2,pedidos_detalle.N2m,pedidos_detalle.N3,pedidos_detalle.N3m,pedidos_detalle.N4,pedidos_detalle.N4m,
pedidos_detalle.N5,pedidos_detalle.N5m,pedidos_detalle.N6,pedidos_detalle.N6m,pedidos_detalle.Pares,
pedidos_detalle.precio,pedidos_detalle.Total
FROM pedidos_detalle,estilos
where pedidos_detalle.idEstilo=estilos.Id and idPedido=$idPedido";
  	if($result4=$mysqli->query($sql2)){
	$contElementCarro=0;
	while($obj2=$result4->fetch_object()){
  	
		//$tipo=$obj2->tipo;
		//$lote =$obj2->lote;
		$idEstilo=$obj2->idEstilo;
		$linea=$obj2->linea;
		$estilo=$obj2->estilo;
		$material=$obj2->material;
		$color=$obj2->color;
		//$clave_pedido=$obj2->clave_pedido;
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
		$clvPaq = $obj2->clvPaq;
		$cantPaq = $obj2->cantPaq;
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
  <div id="divPeCompLevantarPe">
    <div id="divImgZaLevantarPe"><img src="http://201.120.55.76/imagenes_system/muestras/miniminis/<?php  echo "$foto";?>" width="48" height="48" /></div>
    <div id="divNomCalLevantarPe" class="materialColor">
      <div align="center"><?php  echo "$estilo $material $color";?></div>
    </div>
    <div id="divPaCanLevantarPe">
      <table width="110" border="0">
        <tr>
          <td><div align="center" class="numerosPedido"><?php  echo "$clvPaq";?></div></td>
          <td><div align="center" class="numerosPedido"><?php  echo "$cantPaq";?></div></td>
        </tr>
      </table>
    </div>
    <div id="divNumCorrLevantarPe">
      <table width="200" border="0">
        <tr>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N2";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N2m";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N3";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N3m";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N4";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N4m";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N5";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N5m";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N6";?></div></td>
          <td width="11"><div align="center" class="numerosPedido"><?php  echo "$N6m";?></div></td>
          <td width="44"><div align="center" class="numerosPedido"><?php  echo "$Pares";?></div></td>
        </tr>
      </table>
    </div>
    <div id="divPreLevantarPe" class="numerosPedido">
      <div align="center">$<?php  echo "$precio";?></div>
    </div>
    <div id="divTotLevantarPe" class="abcd">
      <div align="center">$<?php  echo "$Total";?></div>
    </div>
    <div id="divDesCoLevantarPe"><img src="img/linea-descontinua-levantar.jpg" width="800" height="4" /></div>
  </div>
  <?php  
  		$totalEstilos++;
	  } 
	}
   ?>
  <div id="divAcaDomLevantarPe">
    <div id="divWwwLevantarPe"><img src="img/web-logo-nc.jpg" width="119" height="9" /></div>
    <div  class="domicilioNew" id="divNuDCeLevantarPe">Nudo de Cempoaltepec # 1129</div>
    <div class="domicilioNew" id="divGuaJaLevantarPe">Guadalajara, Jalisco.</div>
    <div  class="domicilioNew" id="divTel52LevantarPe">Tel: +52 (33) 3609 4304</div>
  </div>
  <div id="divLinFirLevantarPe"><img src="img/linea-divisora.jpg" width="120" height="3" /></div>
  <div class="domicilioNew" id="divFirmCliLevantarPe">
    <div align="center">Firma Cliente</div>
  </div>
  <div  class="blackinformetion" id="divIVALevantarPe">I.V.A</div>
  <div id="divGrCl1Levantarpe"><img src="img/boton_totalPares.jpg" width="102" height="15" />
    <div id="divToLoLevantarPe">
      <table width="110" border="0">
        <tr>
          <td width="90"><div align="left" class="blackinformetion">Total estilos :<?php  echo "$totalEstilos"; ?></div></td>
          
        </tr>
      </table>
    </div>
  </div>
  <div id="divGrClLevantarpe">
    <div id="divToPaLevantarPe">
      <table width="90" border="0">
        <tr>
          <th width"60" class="blackinformetion"><div align="left">Total Pares:</div></th>
          <th width="24" class="blackinformetion" widht><div align="left"><?php  echo "$paresPedido"; ?></div></th>
        </tr>
      </table>
    </div>
  <img src="img/boton_totalPares.jpg" width="102" height="15" /></div>
  <div id="divTotalInfeLevantarPe">
    <div  class="blancoEncabezado"id="divToInfLevantarPe">Total :  
      <div id="apDivTotalPedido"><?php  echo "$totalPedido"; ?></div>
    </div>
  <img src="img/barrita_total2.jpg" width="102" height="17" /></div>
</div> 
