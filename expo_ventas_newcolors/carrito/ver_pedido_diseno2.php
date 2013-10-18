<?php 

    $idDatCliFac=$_REQUEST['idDatCliFac'];
	$cliente=$_REQUEST['cliente'];
	
       	
	?>



<link rel="stylesheet" type="text/css" href="ver_pedido_diseno2.css">
<script language="javascript" src="../js/codigo.js"></script>
<script language="javascript">
	setDatePickerInicio();
	//onmouseover="setDatePickerInicio();setDatePickerFin();
</script>



<div id="contPedido" ">
<div id="divEncaVerPe" >
    <div id="divNomCliVerPe" class="nomClieVerPe"><strong><p><?php  echo "$cliente"; ?></strong></div>
    <div class="fechaVerPe"id="divFechaVerPe">Fecha:</div>
    <div id="divComFechaVPe">
      <input type="text" id="datepicker" size="15" class="combitosFechaPeDis2" onmouseover="setDatePickerInicio();"  onchange="changePickerIni();" onkeypress="validakeynull(this)" />
    </div>
    <div id="tablaPedido">
      <table width="570" border="0">
        <tr>
          <td width="40" class="fechaVerPe"><div align="center">Ped</div></td>
          <td width="57" class="fechaVerPe"><div align="center">Fecha</div></td>
          <td width="34" class="fechaVerPe"><div align="center">Pares</div></td>
          <td width="53" class="fechaVerPe"><div align="center">Importe</div></td>
          <td width="56" class="fechaVerPe"><div align="center">Enviado</div></td>
          <td width="120" class="fechaVerPe"><div align="center">NoGuia</div></td>
          <td width="140" class="fechaVerPe"><div align="center">Paqueteria</div></td>
          <td width="100" class="fechaVerPe"><div align="center">Doc</div></td>
        </tr>
      </table>
    </div>
    <div  class="combitoMenCategorias" id="divPenVerPe"><input type="text" id="datepickerfin" size="15" class="combitosFechaPeDis2" onchange="changePickerFin();" onmouseover="setDatePickerFin();" onkeypress="validakeynull(this)" /></div>
<div id="divLineDiVerPe"><img src="img/linea-divisora.jpg" width="580" height="5" /></div>
    <div id="divSurVerPe">
      <label>
        <input name="radioSurtido" type="radio" id="radioSurtido" value="radioInicio" checked="checked" />
      </label>
    Surtido</div>
    <div id="divSinSurVerPe">
      <label>
        <input type="radio" name="radioSurtido" id="radioInicio2" value="radioInicio" />
      </label>
      No Sutido
</div>
    <div id="divBtnRango" onclick="cargarDetalleDePedido(<?php  echo $idDatCliFac;?>);"><img src="img/cuadro-puntos.jpg" width="17" height="16" /></div>
</div>
  <div id="divCoVerPed1">
    <?php 
  	 $mysqli= new mysqli("locahost","user_web","123454321","newcolors");  
  	$sql= "select idPed,DATE_FORMAT(fechaPedido,'%d/%m/%Y') as fechaPedido,pares,totalPedido,fechaSurtido,numGuia,paqueteria,doc from pedidos where idDatCliFac=$idDatCliFac";
    if($result=$mysqli->query($sql)){

	$cont=1;
	$y_pedido=0;
	$y_detalle=30;

    while($obj=$result->fetch_object()){
 	  
	  ?>
  <div id="divContPedido<?php  echo $obj->idPed;?>" style="position:absolute; width:580px; height:25px; z-index:1; top:<?php  echo "$y_pedido" ?>px; left: 0px;">
  
  <?php 
  if($cont%2==1){
	  ?>
      
      <div id="divPedido<?php  echo $obj->idPed;?>" style="background:#FFF;position:relative;width:590px;height:25px;z-index:1;" >
      <div id="divAreaGris"><img src="img/linea-divisora.jpg" width="600" height="5" /></div>
      <?php 
  }
  else{
	?>
      
    <div id="divPedido<?php  echo $obj->idPed;?>" style="background:#FFF;position:relative;width:590px;height:25px;z-index:1;" >
    <div id="divAreaGris"><img src="img/linea-divisora.jpg" width="600" height="5" /></div>
      <?php   
	}
  ?>
      
      <div  class="claEstinfoPedidoDi2" id="divNumPedido" ><a href="carrito/levantar_pedido_2.php?idPedido=<?php  echo $obj->idPed; ?>&idCliente=<?php  echo $idDatCliFac; ?>" target="_blank"><?php  echo $obj->idPed; ?></a></div>
      <div  class="claEstinfoPedidoDi2" id="divFecha"> <?php  echo $obj->fechaPedido; ?></div>
      <div class="claEstinfoPedidoDi2" id="divPares" ><?php  echo $obj->pares; ?></div>
      <div class="claEstinfoPedidoDi2" id="divImporte" ><?php  echo $obj->totalPedido; ?></div>
      <div class="claEstinfoPedidoDi2" id="divSurtido" ><?php  echo $obj->fechaSurtido; ?></div>
      <div class="claEstinfoPedidoDi2" id="divNoGuia" ><?php  echo $obj->numGuia; ?></div>
      <div class="claEstinfoPedidoDi2" id="divPaqueteria" ><?php  echo $obj->paqueteria; ?></div>
      <div class="claEstinfoPedidoDi2" id="divDocumento" ><?php  echo $obj->doc; ?></div>
      <div id="divImgDesplega"  onclick="organizarVistaDePedidos(<?php  echo $obj->idPed; ?>)"><img src="img/triangulito1.jpg" width="16" height="16" /></div>
      <div id="divDetallePedido<?php  echo $obj->idPed;?>"   style=" background:#FFF;position:absolute; width:600px; height:0px; z-index:1; left: -2px; overflow:auto; top: 8px;"><div id="divDetalle_<?php  echo "$obj->idPed"; ?>"></div></div>
  </div>
  </div>
  <label id="lblIdxPedidos_<?php  echo "$cont"; ?>" style="display:none"><?php  echo "$obj->idPed"; ?></label>
   <?php 
	  $cont++;	
	  $y_pedido=$y_pedido+30;
	  $y_detalle=$y_detalle+30;
	}
	}
	$elementosPedidoCliente=$cont-1;
	  ?>
      
 </div>
</div>
<label id="idPedidoExpandido" style="display:none" ><?php  echo "$elementosPedidoCliente";?></label>
<label id="idxPedidoSeleccionado" style="display:none">0</label>

