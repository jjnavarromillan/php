
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<title>Documento sin tÃ­tulo</title>

<link rel="stylesheet" href="panelAdministradores.css"/>
<link rel="stylesheet" href="js/jquery/jquery-accordion/demo/demo.css" />
<!--script type="text/javascript" src="../js/jquery/jquery-accordion/lib/jquery.js"></script-->
<script type="text/javascript" src="js/jquery/jquery-accordion/lib/jquery.js"></script>
<!--script type="text/javascript" src="../js/jquery/jquery-accordion/lib/chili-1.7.pack.js"></script-->
<script type="text/javascript" src="js/jquery/jquery-accordion/lib/chili-1.7.pack.js"></script>
<!--script type="text/javascript" src="../js/jquery/jquery.flash.js"></script-->
<script type="text/javascript" src="js/jquery/jquery.flash.js"></script> 
<!--script type="text/javascript" src="../js/jquery/jquery-accordion/lib/jquery.easing.js"></script-->
<script type="text/javascript" src="js/jquery/jquery-accordion/lib/jquery.easing.js"></script>
<!--script type="text/javascript" src="../js/jquery/jquery-accordion/lib/jquery.dimensions.js"></script-->
<script type="text/javascript" src="js/jquery/jquery-accordion/lib/jquery.dimensions.js"></script>
<!--script type="text/javascript" src="../js/jquery/jquery-accordion/jquery.accordion.js"></script-->
<script type="text/javascript" src="js/jquery/jquery-accordion/jquery.accordion.js"></script>

<style type="text/css">
<!--
a:link {
	color: #999;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #999;
}
a:hover {
	text-decoration: none;
	color: #666;
}
a:active {
	text-decoration: none;
}

#divMenu {
	position:absolute;
	width:119px;
	height:478px;
	z-index:1;
	left: 10px;
	top: 6px;
}
.menuSeccion{
	font-family:Arial, Helvetica, sans-serif;
	color:#999;
	font-size:11px;
	position:relative;
	width:120px;
	height:25px;
	z-index:1;
	background-image:url(img/panelAdministra-linea.jpg);
	background-repeat:no-repeat;
}

	/*background-color:#0CC;	*/
	
	font-family:Arial, Helvetica, sans-serif;
	font-style:inherit;
	font-size:11px;
	color:#666;


}
.menuOpcion2{
	position:relative;
	width:120px;
	height:13px;
	z-index:1;
	font-family:Arial, Helvetica, sans-serif;
	font-size:6px;
	color:#6F0;
}
.menuOpcion{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#666;
}

.leftdiv{
	left:5px;
}
	
.Central{
	position:absolute;
	top:30%;	
}
-->
</style>

<div id="divMenuPanelAdmin">
  
	<div id="divMenPanel" >
    <div id="divMenu">

<?php 
	$tipoMenu = $_REQUEST['tipoMenu'];
	$idUsuario = $_REQUEST['idUsuario'];
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");  
  	//$sql= "SELECT * FROM opciones_sistema_web where tipoMenu='$tipoMenu' order by cons   ";
	$sql = "SELECT * FROM opciones_sistema_web,usuarios_permisos_web  where tipoMenu='$tipoMenu' and usuarios_permisos_web.idUsuario='$idUsuario' and opciones_sistema_web.tipoMenu='$tipoMenu' and   opciones_sistema_web.idOpc=usuarios_permisos_web.idOpcion order by cons";
    if($result=$mysqli->query($sql)){

	$cont=1;
	$y_pedido=0;
	$y_detalle=30;
	$seccionTmp = "";
    while($obj=$result->fetch_object()){
		$idOpc = $obj->idOpc;
		$seccion = $obj->seccion;
		$nombreOpcion = $obj->nombreOpcion;
		$tipoMenu = $obj->tipoMenu;
		$nombreFunction=$seccion." ".$nombreOpcion." ".$tipoMenu;

		
		$tam = strlen($nombreFunction);
		$res = "";

		for ($r=0;$r<$tam;$r++){
			$car = $nombreFunction[$r];
			if ($car == ' ')
				$car = '_';
			if ($car == 'Ã‘')
				$car = 'N';
			if ($car == 'Ã±') 
				$car = 'n';
			$res = $res . $car;
		}
		
		if($seccion!=$seccionTmp){
		   ?>
           
  <div id="opcMenuSeccion" class="menuSeccion" > <div class="Central"> <?php  echo $seccion; ?></div></div>
           
           <?php  
		   $seccionTmp=$seccion;
		}
	?>	
    	
  <div id="opcMenuSeccion<?php  echo $idOpc; ?>" class="menuOpcion" onclick="<?php  echo $res; ?>();" ><?php  echo $nombreOpcion;?> </div>
       
        
	<?php  
	}
	}
	?>
</div>
</div>
  <div id="divPanelAdmMenu">
    <div id="divNbackPanel"></div>
  </div>
  <div id="divPanelAdmContenido" >
	<div id="imgFondoPaneldAdministrador2" style="position:absolute; left: 9px; top: 6px; width: 777px;"><img src="img/banner_dist_sapica_2013.jpg" width="790" height="501" /></div>
  </div>
  
</div>