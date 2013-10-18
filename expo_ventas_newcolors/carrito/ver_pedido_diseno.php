<?php 

    $idDatCliFac=$_REQUEST['idDatCliFac'];
      	
	?>

<link href="ver_pedido_diseno.css" rel="stylesheet" type="text/css" />


<div class="pedido_info" id="contPedido">
  <div id="tablaPedido">
    <table width="623" border="0">
      <tr>
        <td width="134" class="pedido_titulo"><div align="center"><strong>Num Pedido</strong></div></td>
        <td width="121" class="pedido_titulo"><div align="center"><strong>Fecha</strong></div></td>
        <td width="187"class="pedido_titulo"><div align="center"><strong>Pares</strong></div></td>
        <td width="163"class="pedido_titulo"><div align="center"><strong>Importe</strong></div></td>
      </tr>
    </table>
  </div>
  <div id="lineaPedido"><img src="img/linea-divisora.jpg" width="625" height="5" /></div>
  <?php 
  	 $mysqli= new mysqli("locahost","user_web","123454321","newcolors");  
  	$sql= "select * from pedidos where idDatCliFac=$idDatCliFac";
    if($result=$mysqli->query($sql)){

	$cont=1;
	
    while($obj=$result->fetch_object()){
		
	  ?>
		  <div id="divLineaDatosPedido">
			<div class="pedido_info" id="divNupedido">
			  <div  class="pedido_info">
				<div align="center"><strong><a href="#"><?php  echo $obj->idPed; ?></a></strong></div>
			  </div>
			</div>
			<div class="pedido_info" id="divFechaPedido">
			  <div align="center"><?php  echo $obj->fechaPedido; ?></div>
			</div>
			<div class="pedido_info"id="divParesPedido">
			  <div align="center"><?php  echo $obj->pares; ?></div>
			</div>
			<div class="pedido_info"id="divImportePedido">
			  <div align="center">$ <?php  echo $obj->totalPedido; ?></div>
			</div>
		  </div>
	  <?php 
	  $cont++;
	}
	}
	  ?>
  
</div>   
<?php 

?>