<script language="javascript" src="../js/codigo.js"></script>
<link rel="stylesheet" type="text/css" href="gridDatosBusCliente.css" />
<script language="javascript">

	function cambioRenglon(){
			
	}
</script>

     
<style type="text/css">
<!--

-->
</style>
<div id="divGridDatosBusClientePrincipal">
<div id="divGridDatosBusCli">
  
  <?php 
 	$factura_a=$_REQUEST['facturaA'];
  	 $mysqli= new mysqli("locahost","user_web","123454321","newcolors");  
	 $mysqli->query("SET NAMES 'utf8'");
  	$sql= "SELECT idDatCli,Nombre,Encargado,Estado,Poblacion FROM clientes_tiendas where Nombre like '%$factura_a%'";
    if($result=$mysqli->query($sql)){

	$cont=1;
	
    while($obj=$result->fetch_object()){
		if($cont%2==0){
	  ?>
<div id="divRowGridB8usCli2" style="background-color: #CCC;" onMouseOver="this.style.backgroundColor='#999'" onMouseOut="this.style.backgroundColor='#CCC'" onClick="llamarasincrono('registro_datos_cliente.php?idDatCli=<?php  echo $obj->idDatCli; ?>','divPrinBusCliGridDatos')">
        <div class="tipoGridGrey" id="divGridDatosBusClienteIdCli"><?php  echo $obj->idDatCli; ?></div>
      <div  class="tipoGridGrey" id="divGridDatosBusClienteFacturaA"><?php  echo $obj->Nombre; ?></div>
      <div  class="tipoGridGrey" id="divGridDatosBusClienteNombre"><?php  echo $obj->Encargado; ?></div>
        <div  class="tipoGridGrey" id="divGridDatosBusClienteEstado"><?php  echo $obj->Estado; ?></div>
        <div  class="tipoGridGrey" id="divGridDatosBusClienteCuidad"><?php  echo $obj->Poblacion; ?></div>
    </div>
  		<?php 
			}
			else{
				?>
<div id="divRowGridB8usCli2" onMouseOver="this.style.backgroundColor='#999'" onMouseOut="this.style.backgroundColor='#FFF'" onClick="llamarasincrono('registro_datos_cliente.php?idDatCli=<?php  echo $obj->idDatCli; ?>','divPrinBusCliGridDatos')">
				<div class="tipoGridGreyClaro" id="divGridDatosBusClienteIdCli"><?php  echo $obj->idDatCli; ?></div>
				<div  class="tipoGridGreyClaro" id="divGridDatosBusClienteFacturaA"><?php  echo $obj->Nombre; ?></div>
<div  class="tipoGridGreyClaro" id="divGridDatosBusClienteNombre"><?php  echo $obj->Encargado; ?></div>
	  <div  class="tipoGridGreyClaro" id="divGridDatosBusClienteEstado"><?php  echo $obj->Estado; ?></div>
		<div  class="tipoGridGreyClaro" id="divGridDatosBusClienteCuidad"><?php  echo $obj->Poblacion; ?></div>
    </div>
			<?php 
            }
  	$cont++;
		}
	}
	?>
</div>
  <div  class="tipoGridBlack" id="divGridDatosBusClientelblIdCli">idCli</div>
  <div  class="tipoGridBlack" id="divGridDatosBusClientelblFacturaA">Factura A</div>
  <div  class="tipoGridBlack" id="divGridDatosBusClientelblNombre">Nombre</div>
  <div  class="tipoGridBlack" id="divGridDatosBusClientelblEstado">Estado</div>
  <div  class="tipoGridBlack" id="divGridDatosBusClientelblCuidad">Cuidad</div>
</div>

