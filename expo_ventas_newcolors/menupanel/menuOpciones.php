<style type="text/css">
<!--
#divMenu {
	position:absolute;
	width:119px;
	height:478px;
	z-index:1;
}
.menuSeccion{
	position:relative;
	width:120px;height:25px;
	z-index:1;
	
	/*background-color:#0CC;	*/
	font-family:Arial, Helvetica, sans-serif;
	font-style:inherit;
	font-size:11px;
	color:#666;
	background-image:
}
.menuOpcion{
	position:relative;
	width:120px;
	height:15px;
	z-index:1;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#666;
}
.Central{
	position:absolute;
	top:50%;	
}
-->
</style>
<div id="divMenu">

<?php 
	$tipoMenu = $_REQUEST['tipoMenu'];
	$idUsuario = $_REQUEST['idUsuario'];
	$mysqli= new mysqli("locahost","user_web","123454321","newcolors");  
  	//$sql= "SELECT * FROM opciones_sistema_web where tipoMenu='$tipoMenu' order by cons   ";
	$sql = "SELECT * FROM opciones_sistema_web,usuarios_permisos_web  where tipoMenu='$tipoMenu' and usuarios_permisos_web.idUsuario='$idUsuario' and   opciones_sistema_web.idOpc=usuarios_permisos_web.idOpcion order by cons";
    if($result=$mysqli->query($sql)){

	$cont=1;
	$y_pedido=0;
	$y_detalle=30;
	$seccionTmp = "";
    while($obj=$result->fetch_object()){
		$idOpc = $obj->idOpc;
		$seccion = $obj->seccion;
		$nombreOpcion = $obj->nombreOpcion;
		if($seccion!=$seccionTmp){
		   ?>
           
  <div id="opcMenuSeccion" class="menuSeccion" > <div class="Central"> <?php  echo $seccion; ?></div></div>
           
           <?php  
		   $seccionTmp=$seccion;
		}
	?>	
    	
  <div id="opcMenuSeccion<?php  echo $idOpc; ?>" class="menuOpcion" onclick="" ><?php  echo $nombreOpcion;?> </div>
       
        
	<?php 
	}
	}
	?>
</div>
