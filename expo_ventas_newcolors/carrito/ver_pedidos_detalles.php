<link rel="stylesheet" type="text/css" href="ver_pedido_detalles.css">
<div id="divPrinVPedetalles">
  <div id="divTabVPeDetalles">
    <table width="623" border="0">
      <tr>
        <td  class="descriDetalles" width="75"><div align="center"></div></td>
        <td class="descriDetalles" width="159"><div align="center"><strong>Material / Color</strong></div></td>
        <td class="descriDetalles" width="255"><div align="center"><strong>Cantidad</strong></div></td>
        <td class="descriDetalles" width="53"><div align="center"><strong>Precio</strong></div></td>
        <td class="descriDetalles" width="59"><div align="center"><strong>Total</strong></div></td>
      </tr>
    </table>
    <div id="divCerrarVPeDetalles"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen3','','img/cerrar1.jpg',1)"><img src="img/cerrar.jpg" name="Imagen3" width="13" height="13" border="0" id="Imagen3" /></a></div>
  </div>
  <div id="divCounVPeDetalles">
  
  <?php  
  	$idPedido= $_REQUEST['idPedido'];
  	$sql2="SELECT idEstilo,estilos.linea,estilos.estilo,estilos.material,estilos.color,clvPaq,N2,N2m,N3,N3m,N4,N4m,N5,N5m,N6,N6m,pares ,pedidos_detalle.precio,total,idPedido,cantPaq
FROM pedidos_detalle,estilos where estilos.id=pedidos_detalle.idEstilo and idPedido=$idPedido";

	$mysqli= new mysqli("locahost","user_web","123454321","newcolors");  

  	if($result4=$mysqli->query($sql2)){
	$contElementCarro=0;
	while($obj2=$result4->fetch_object()){
  	


		$idEstilo=$obj2->idEstilo;
		$linea=$obj2->linea;
		$estilo=$obj2->estilo;
		$material=$obj2->material;
		$color=$obj2->color;
		$clvPaq=$obj2->clvPaq;
		$cantPaq=$obj2->cantPaq;
		
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
		$pares=$obj2->pares;
		$precio=$obj2->precio;
		$total=$obj2->total;
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
  
    <div id="divSecCPeDestalles">
      <div id="divImgMimiMDetalles"><img src="http://201.120.55.76/imagenes_system/muestras/minis/<?php  echo "$foto";?>" width="48" height="48" /></div>
      <div class="nomEstDetalles"id="divNomEsDetalles"><strong><?php  echo "$estilo";?></strong> <?php  echo "$material $color";?></div>
      <div id="divTab2VDetalle">
        <table width="215" border="0">
          <tr>
            <td width="13"><div align="center" class="abcd2"><strong>2</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>3</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>4</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>5</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>-</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>6</strong></div></td>
            <td width="13"><div align="center" class="abcd2"><strong>-</strong></div></td>
            <td width="39"><div align="center" class="abcd2"><strong>TOTAL</strong></div></td>
          </tr>
          <tr>
            <td><div align="center" class="abcd2"><?php  echo "$N2";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N2m";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N3";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N3m";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N4";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N4m";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N5m";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N5m";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N6m";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$N6m";?></div></td>
            <td><div align="center" class="abcd2"><?php  echo "$pares";?></div></td>
          </tr>
        </table>
      </div>
      <div class="abcd2" id="divPre02VPeDetalles">
        <div align="center">$<?php  echo "$precio";?></div>
      </div>
      <div class="abcd2" id="divToVPeDetalles">
        <div align="center">$<label id="lblImporte_<?php  echo "$idEstilo";?>"></label><label style="display:none" id="lblImporte_<?php  echo "$contElementCarro";?>"><?php  echo "$total";?></label><?php  echo "$total";?></div>
      </div>
      <div id="divPaCanVPeDetalles">
        <table width="120" border="0">
          <tr>
            <td width="60"><div align="center" class="abcd2"><strong>Paquete</strong></div></td>
            <td width="60"><div align="center" class="abcd2"><strong>Cantidad</strong></div></td>
          </tr>
        </table>
        <div id="divAVPeDetalle">
          <div align="center"class="descriDetalles"><strong><?php  echo "$clvPaq";?></strong></div>
        </div>
        <div id="div10VPeDetalle">
          <div align="center"class="descriDetalles"><strong><?php  echo "$cantPaq";?></strong></div>
        </div>
      </div>
    </div>
    <?php  
	  } 
	}
	  ?>
    <label id="contElementosEnCarro" style="display:none"><?php  echo "$contElementCarro"; ?></label>
  </div>
  <div id="divLinVPeDetalles"><img src="img/linea-divisora.jpg" width="625" height="5" /></div>
</div>


