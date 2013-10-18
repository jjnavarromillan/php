
<?php 
	session_start();
	$usuario="";
	$tipoUsuario = "";
	$idRelacion = "";
	$cliente="";
	$arrayPermisos="";
	$origenMenu="";
	if(isset($_REQUEST['origenMenu'])){
		$origenMenu=$_REQUEST['origenMenu'];
	}
	if(!isset($_SESSION['usrsys'])){
		
		//header("Location: http://localhost/sistema2011/carrito/login.php");
	
	}
	else{
		
		if($_SESSION['usrsys']==""){
		
			//	header("Location: http://localhost/sistema2011/carrito/login.php");
		
		}
		 
		$usuario = $_SESSION['usrsys'];
		
		
		$mysqli=new mysqli("localhost", "user_web","123454321", "newcolors_expo");
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$sql=" select * from usuarios_web where idUsuarioWeb='$usuario'";
		$result=$mysqli->query($sql);
		$resultado_=" ";

		if($result){
			$num=mysqli_num_rows($result);

			if($num>0)
			{	
				$rowdata = mysqli_fetch_object($result);
				$idUsuario = $rowdata->idUsuarioWeb;
				$tipoUsuario = $rowdata->tipoUsuario;
				$idRelacion = $rowdata->idRelacion; 
				$status = $rowdata->status;
				$motivoCancel = $rowdata->motivoCancel;
				$fechaCancel = $rowdata->fechaCancel;
				$nombre =  $rowdata->nombre;
				
				
				require_once("carrito/carrito_class.php");
				$carrito=new carrito();
				$sessionId="1";
				
				$cliente = $nombre;//$carrito->getNombreCliente($idRelacion,$tipo);
				
				$sql3 = " select * from usuarios_permisos_web where idUsuario='$usuario'";
				$result3=$mysqli->query($sql3);
				if($result3){
					$arrayPermisos="";
					while($rowdata3=mysqli_fetch_object($result3)){
						$arrayPermisos.=$rowdata3->idOpcion . ",";	
					}
				}
			
			}
		}	
		
		$mysqli->close();
	}

	
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/nc-icono.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>new colors shoes</title>

	<script language="javascript" src="clientes/acciones_clientes.js"></script>
	<script language="javascript" src="pedidos/datagridNCPedido/datagridNC.js"></script>
	
 	<script language="JavaScript" type="text/javascript" src="js/codigo.js"></script>
  	<script language="JavaScript" type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
	<script type="text/javascript" src="js/functionsjquery.js"></script>
    <script type="text/javascript" src="js/menu_functions.js"></script>
    <script type="text/javascript" src="js/menu_functions_nc.js"></script>
    <script language="javascript" src="js/codigo.js"></script>
	<script language="javascript" src="js/menu_siguenos_functions_nc.js"></script>
    <script language="javascript" src="js/menu_usuario_functions.js"></script>
    <script language="javascript" src="js/previews.js"></script>
    
    <link rel="stylesheet" href="js/jquery-ui-1.8.14.custom/development-bundle/themes/base/jquery.ui.all.css" >
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/jquery-1.5.1.js" ></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.core.js"></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.widget.js"></script>
 <script src="js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
 <link rel="stylesheet" href="js/jquery-ui-1.8.14.custom/development-bundle/demos/demos.css" >
	
<link rel="stylesheet" type="text/css" href="css/enviarSolicitudRecuperacionPw.css">
<link rel="stylesheet" type="text/css" href="carrito/carrito_diseno.css" >
<link rel="stylesheet" type="text/css" href="carrito/pedido_diseno4.css">
<link rel="stylesheet" type="text/css" href="carrito/ver_pedido_diseno2.css">
<link rel="stylesheet" type="text/css" href="carrito/ver_pedido_detalles.css">
<script language="JavaScript" type="text/javascript" src="></script>
<script language="JavaScript1.2" type="text/javascript" src="menu/mm_css_menu.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link href="css/index2.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
body {
	background-color: #F0F0F0;
	background-repeat: no-repeat;
	text-decoration: none;
}
#facebook {
	position:absolute;
	width:22px;
	height:22px;
	z-index:2;
	left: 774px;
	top: 45px;
}
#twitter{
	position:absolute;
	width:22px;
	height:33px;
	z-index:2;
	left: 731px;
	top: 47px;
}
#apDiv4 {
	position:absolute;
	width:554px;
	height:31px;
	z-index:7;
	left: 369px;
}
#apDiv5 {
	position:absolute;
	width:128px;
	height:19px;
	z-index:1;
	left: 11px;
	top: 1px;
}
#apDiv6 {
	position:absolute;
	width:21px;
	height:19px;
	z-index:2;
	left: 23px;
	top: 1px;
}
#apDiv7 {
	position:absolute;
	width:106px;
	height:13px;
	z-index:3;
	left: 46px;
	top: 0px;
}
#apDiv8 {
	position:absolute;
	width:457px;
	height:22px;
	z-index:4;
	left: 155px;
	top: -2px;
	text-align: right;
}
#busquedaAd {
	position:absolute;
	width:50px;
	height:22px;
	z-index:7;
	left: 912px;
	top: 28px;
}
#face {
	position:absolute;
	width:16px;
	height:15px;
	z-index:8;
	left: 902px;
	top: 60px;
}
#twiter {
	position:absolute;
	width:16px;
	height:15px;
	z-index:9;
	left: 927px;
	top: 60px;
}
#divConMenInIndex {
	position:absolute;
	width:960px;
	height:70px;
	z-index:1;
	top: 60px;
	left: -1px;
}
#txtSearch {
	position:absolute;
	width:102px;
	height:10px;
	z-index:10;
	left: 724px;
	top: 30px;
}
#apDiv14 {
	position:absolute;
	width:330px;
	height:18px;
	z-index:2;
	left: 5px;
	top: 21px;
}
#apDiv15 {
	position:absolute;
	width:82px;
	height:17px;
	z-index:1;
}
#apDiv16 {
	position:absolute;
	width:133px;
	height:18px;
	z-index:2;
	left: 104px;
}
#apDiv17 {
	position:absolute;
	width:59px;
	height:19px;
	z-index:3;
	left: 255px;
}
#apDiv18 {
	position:absolute;
	width:231px;
	height:39px;
	z-index:1;
}
#apDiv19 {
	position:absolute;
	width:206px;
	height:42px;
	z-index:2;
	left: 247px;
}
#piePag {
	position:absolute;
	width:960px;
	height:50px;
	z-index:2;
	top: 134px;
	left: 4px;
}
#subscribe {
	position:absolute;
	width:375px;
	height:27px;
	z-index:1;
	top: 16px;
}
#getnews {
	position:absolute;
	width:110px;
	height:13px;
	z-index:1;
	top: 0px;
}
#txtcam2 {
	position:absolute;
	width:123px;
	height:13px;
	z-index:2;
	left: 118px;
}
#botonSub {
	position:absolute;
	width:58px;
	height:17px;
	z-index:3;
	left: 249px;
	top: -1px;
}
#infoEmp {
	position:absolute;
	width:274px;
	height:51px;
	z-index:2;
	left: 427px;
}
#datos1 {
	position:absolute;
	width:272px;
	height:15px;
	z-index:1;
	left: 2px;
}
#datos2 {
	position:absolute;
	width:273px;
	height:15px;
	z-index:2;
	top: 17px;
	left: 2px;
}
#datos3 {
	position:absolute;
	width:252px;
	height:15px;
	z-index:3;
	top: 31px;
	left: 22px;
}
#face3elem {
	position:absolute;
	width:222px;
	height:49px;
	z-index:3;
	left: 717px;
	top: -1px;
}
#fotoface {
	position:absolute;
	width:40px;
	height:40px;
	z-index:1;
	left: 1px;
}
#newface {
	position:absolute;
	width:166px;
	height:17px;
	z-index:2;
	left: 51px;
}
#like {
	position:absolute;
	width:75px;
	height:27px;
	z-index:3;
	top: 20px;
	left: 51px;
}
.face2 {
	color: #039;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;

}
#apDiv33 {
	position:absolute;
	width:949px;
	height:27px;
	z-index:1;
	top: -8px;
	left: -1px;
}
#apDiv34 {
	position:absolute;
	width:136px;
	height:13px;
	z-index:1;
	left: 5px;
}
#apDiv35 {
	position:absolute;
	width:87px;
	height:13px;
	z-index:2;
	left: 153px;
	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
	top: 4px;
}
#apDiv36 {
	position:absolute;
	width:79px;
	height:13px;
	z-index:3;
	left: 252px;
	top: 4px;
}
#apDiv37 {
	position:absolute;
	width:38px;
	height:13px;
	z-index:4;
	left: 342px;
	top: 4px;
}
#apDiv38 {
	position:absolute;
	width:88px;
	height:13px;
	z-index:5;
	left: 393px;
	top: 4px;
}
#apDiv39 {
	position:absolute;
	width:72px;
	height:13px;
	z-index:6;
	left: 494px;
	top: 4px;
}

#apDiv41 {
	position:absolute;
	width:69px;
	height:13px;
	z-index:8;
	left: 644px;
	top: 4px;
}
#apDiv42 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
}
#apDiv43 {
	position:absolute;
	width:58px;
	height:13px;
	z-index:1;
	left: 337px;
	top: 3px;
}
#apDiv44 {
	position:absolute;
	width:81px;
	height:13px;
	z-index:9;
	left: 779px;
	top: 4px;
}
#apDiv45 {
	position:absolute;
	width:42px;
	height:13px;
	z-index:10;
	left: 724px;
	top: 4px;
}
#diVLineaSSeparadorINd {
	position:absolute;
	width:938px;
	height:7px;
	z-index:11;
	top: 78px;
	left: 32px;
}
a:link {
	color: #666;
}
#apDiv47 {
	position:absolute;
	width:226px;
	height:35px;
	z-index:12;
	padding-top: 9px;
	padding-left: 9px;
}
#menu-principalIndex {
	position:absolute;
	width:615px;
	height:25px;
	z-index:12;
	top: 49px;
	left: 20px;
}
-->
</style>
<link rel="stylesheet" type="text/css" href=""/StyleSheet.css">
<link rel="stylesheet" type="text/css" href="css/contacto_diseno.css">
<style type="text/css">
<!--

#divBusSec {
	position:absolute;
	width:46px;
	height:11px;
	z-index:1;
	left: 6px;
	top: 3px;
}
#divSSucribe {
	position:absolute;
	width:48px;
	height:11px;
	z-index:1;
	left: 5px;
	top: 3px;
}
#divPuBliNc {
	position:absolute;
	width:929px;
	height:510px;
	z-index:12;
	left: 15px;
	top: 11px;
}
#divSepIndexBarrSm2 {
	position:absolute;
	width:2px;
	height:16px;
	z-index:1001;
	left: 130px;
	top: 53px;
}
#diVLineaSSeparadorINd2 {
	position:absolute;
	width:200px;
	height:8px;
	z-index:2;
	left: 14px;
	top: 10px;
}
#apDiv30 {
	position:absolute;
	width:928px;
	height:16px;
	z-index:2;
}
#divSombraEncabezado_2012 {
	position:absolute;
	width:930px;
	height:12px;
	z-index:1;
	left: 0px;
	top: 497px;
}
#red-social-twitter {
	position:absolute;
	width:16px;
	height:16px;
	z-index:1002;
	left: 899px;
	top: 58px;
}
#red-social-youtube {
	position:absolute;
	width:44px;
	height:19px;
	z-index:1003;
	left: 918px;
	top: 55px;
}




-->
</style>
</head>


<body >

<label id="lblTipoCatalogoMostrado" style="display:none">Muestrario</label>
<label id="lblContElementsCarro" style="display:none">0</label>
<div id="principal">
  <div id="encabezado">
  <label id="idCliente" style="display:none"><?php  echo "$idRelacion";?></label> 
  <label id="idUsuario" style="display:none"><?php  echo "$idUsuario";?></label> 
  <label id="permisos" style="display:none"><?php  echo "$arrayPermisos";?></label>
  <label id="tipoCliente" style="display:none"><?php  echo "$tipoUsuario";?></label>  
  
    <div id="carrito">
      
      <div id="apDiv8"><label id="tipo" style="display:none"><?php  echo "$tipo";?></label> 
	  
	  
      <label id="nombrecliente"> 
	   <?php  
	   if($cliente!=""){
		   echo "$cliente";
	   }
	   else
	   {
		?>
	   <a onclick="llamarasincrono('autentica.php','contenido');" href="#">Iniciar sesion</a><?php  
	   }
		?>
      </label> <a href="#" onclick="cerrar_sesion2();">Cerrar</a></div>
    </div>
    <div class="info" id="busquedaAd">
      <div id="red-social-face"><img src="img/icono-facebook.jpg" width="16" height="16" /></div>
      Búsqueda
    Avanzada</div>
    <div  id="txtSearch">
      <form id="form1" name="form1" method="post" action="">
        <label>
          <input  class="barraTexMenPrin" name="textfield" type="text" id="textfield" size="24" />
        </label>
      </form>
    </div>
    <div id="diVLineaSSeparadorINd"><img src="menu/menu/linea.png" width="935" height="7" border="0" usemap="#Map5" />
      <map name="Map5" id="Map5">
        <area shape="rect" coords="901,-17,909,-4" href="#" />
      </map>
    </div>
    <div   id="logo" style="background:source/logo.gif"><a href="http://localhost/sistema2011/index.php"><img src="source/logo.gif"  border="0" width="266" height="35" /></a></div>
    <div id="botonSerch">
      <div class="whiteinfo" id="divBusSec">Búsqueda</div>
    <img src="img/search-1.jpg" width="56" height="17" /></div>
    <div id="red-social-twitter"><img src="img/icono-twitter.jpg" width="16" height="16" /></div>
    <div id="red-social-youtube"><img src="img/icono-youtube.jpg" width="51" height="20" /></div>
  </div>
  <div id="contenido">
    <center>
      <table width="950" height="522" border="0" cellspacing="10" cellpadding="0">
        <tr>
          <td height="360" align="center" valign="middle">
            <center>
            </center>
          </td>
        </tr>
        <tr>
          <td height="116" align="center" valign="middle">&nbsp;</td>
        </tr>
      </table>
      
    </center>
<link rel="stylesheet" type="text/css" href="css/catalogo_registro-distribuidores.css">
				  <div id="divPrinCataRDistribuidores">
  
				  <div id="divImgNCDistribuidores"></div>
				  <div id="divLoginContent">
				  
				  	
					
					<link rel="stylesheet" type="text/css" href="css/recupera_pw.css">
					<div id="divRecuperaPW">
<div class="regCatalogo" id="divLblNuevaContraPw"></div>
											  <div id="divTitRecPw"></div>
											  <div id="divTxtContraRec"></div>
											  <div  class="regCatalogo" id="divConfirmaPwRec"></div>
											  <div id="divTxtConfirmaContraPw"></div>
											  <div id="divBotonGurarContraRec" onClick="guardar_pw_recuperacion('<?php  echo $idUsuarioWeb; ?>');" ></div>
											  <div class="usuarioRecupera" id="divUsuarioRecPw"></div>
											  <div class="regCatalogo" id="divUsuarioRecuperaPw"></div>
											</div>
					<div id="divRes"></div>
					
					
					
					
				  </div>
				</div>
  </div>
   
  <div id="pie">
    <div align="center"></div>
    <div id="piePag">
      <div id="subscribe">
        <div class="info"id="getnews">Noticias &amp; Actualizaciones</div>
        <div id="txtcam2">
          <form id="form2" name="form2" method="post" action="">
            <label>
              <input  class="barraTexMenPrin" type="text" name="textfield2" id="textfield2" />
            </label>
          </form>
        </div>
        <div id="botonSub">
          <div class="whiteinfo" id="divSSucribe">Suscribete</div>
        <img src="img/search-1.jpg" width="56" height="17" /></div>
      </div>
      <div id="infoEmp">
        <div id="datos1">
          <div align="right"><span class="info"><a href="#">Inicio</a></span><span class="style2">| </span><span class="info"><a href="file:///C|/Users/vickyu/Documents/VICTORIA/8°/MULTIMEDIA/DREAMWEAVER/#">Ayuda</a> / <a href="#">Contacto</a></span> <span class="style2">|<span class="info"><a href="#"> Localizar Tiendas</a></span></span></div>
        </div>
        <div class="info" id="datos2">
          <div align="right">Busqueda Avanzada| Ordenar por Teléfono+52(33)3609 4304</div>
        </div>
        <div id="datos3">
          <div align="right"><span class="info">© 2012 new colors shoes. Todos los Derechos Reservados</span></div>
        </div>
      </div>
      <div id="face3elem">
        <div id="fotoface"><img src="img/icono-face.jpg" width="38" height="38" border="0" usemap="#Map2" />
          <map name="Map2" id="Map2">
            <area shape="rect" coords="3,1,39,38" href="http://www.facebook.com/new.colors.7?ref=ts" target="_blank" alt="facebook" />
          </map>
        </div>
        <div class="face" id="newface"><span class="face"><strong><a href="http|//www.facebook.com/pages/New-Colors-Shoes/117745731571808" class="face"><span class="face">New Colors</span></a></strong></span> <a href="http//http://www.facebook.com/new.colors.7?ref=ts"><span class="face2">en    facebook</span></a></div>
        <div id="like"><img src="img/me-gusta-face.jpg" width="73" height="25" border="0" usemap="#Map6" />
          <map name="Map6" id="Map6">
            <area shape="rect" coords="4,5,72,22" href="http://www.facebook.com/new.colors.7?ref=ts" target="_blank" />
            <area shape="rect" coords="2,3,5,5" href="#" />
          </map>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
