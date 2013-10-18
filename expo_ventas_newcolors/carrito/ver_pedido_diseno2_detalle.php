<?php 

    $idDatCliFac=$_REQUEST['idDatCliFac'];
	$surtido=$_REQUEST['surtido'];
	$fechainicio=$_REQUEST['fechainicio'];
	$fechafin=$_REQUEST['fechafin'];
	
       	
	?>



<link rel="stylesheet" type="text/css" href="ver_pedido_diseno2_detalle.css">
<script language="javascript" src="../js/codigo.js"></script>
<script language="javascript">
	//setDatePickerInicio();
//onmouseover="setDatePickerInicio();setDatePickerFin();"
</script>


<style type="text/css">
<!--
#divAreaBlanca {
	position:absolute;
	width:569px;
	height:19px;
	z-index:2;
}
#divBtnRango {
	position:absolute;
	width:28px;
	height:21px;
	z-index:10;
	left: 292px;
	top: 33px;
	background-color: #00FF99;
}
-->
</style>
<div id="contPedido" >
<div id="divCoVerPed2" >
  <?php 
	 function getDateNum($fecha){
		$anio=$fecha[6];
		$anio=$anio . $fecha[7];
		$anio=$anio . $fecha[8];
		$anio=$anio . $fecha[9];

		$mes=$fecha[3].$fecha[4];
		
		$dia=$fecha[0].$fecha[1];
		
		$fecha="{$anio}{$mes}{$dia}";
		
		return $fecha;
	 }
	 
  	 $mysqli= new mysqli("locahost","user_web","123454321","newcolors");  
	 if($surtido=='true'){
		$surtido="Si";
 	 }
	 else
	 {
		$surtido="No"; 
	  }
	$fechaInicio=  getDateNum($fechainicio);
	$fechafin=getDateNum($fechafin);
  	$sql= "select idPed,DATE_FORMAT(fechaPedido,'%Y/%m/%d') as fechaPedido,pares,totalPedido,fechaSurtido,numGuia,paqueteria,doc from pedidos where idDatCliFac=$idDatCliFac
and DATE_FORMAT(fechaPedido,'%Y%m%d')>='$fechainicio' and DATE_FORMAT(fechaPedido,'%Y%m%d')<='$fechafin' and surtido='$surtido' ";

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

