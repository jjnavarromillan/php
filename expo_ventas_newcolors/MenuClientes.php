<?php 
	
	$usuario=$_REQUEST['usuario'];
	$tipo = $_REQUEST['tipo'];
	$idRelacion = $_REQUEST['idRelacion']; 
	if($usuario!=""){
		/*if($_COOKIE['usrsys']==""){
				header("Location: http://201.120.55.76/sistema2011/autentica.php");
		}*/
		//$usuario = $_COOKIE['usrsys'];
		
		$mysqli=new mysqli("locahost", "user_web", "123454321", "newcolors");
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$sql=" select * from usuarios where usuario='$usuario'";
		$result=$mysqli->query($sql);
		$resultado_=" ";

		if($result){
			$num=mysqli_num_rows($result);
			
			if($num>0)
			{	
				$rowdata = mysqli_fetch_object($result);
				$idUsuario = $rowdata->idUsuario;
				$tipo = $rowdata->tipo;
				$idRelacion = $rowdata->idRelacion; 
				$status = $rowdata->status;
				$motivoCancel = $rowdata->motivoCancel;
				$fechaCancel = $rowdata->fechaCancel;
			
			}
		}	
		
		$mysqli->close();
	}
	
	require_once("carrito/carrito_class.php");
	$carrito=new carrito();
	$sessionId="1";
	
	$cliente = $carrito->getNombreCliente($idRelacion,$tipo);
?>      



    <script language="JavaScript" type="text/javascript" src="js/codigo.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="carrito/sistema_files/StyleSheet.css">
	<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:216px;
	height:21px;
	z-index:1;
	left: 37px;
	top: 111px;
}
#apDiv2 {
	position:absolute;
	width:217px;
	height:24px;
	z-index:2;
	left: 37px;
	top: 138px;
}
#apDiv4 {
	position:absolute;
	width:217px;
	height:25px;
	z-index:3;
	left: 37px;
	top: 168px;
}
#apDiv6 {	position:absolute;
	width:217px;
	height:25px;
	z-index:3;
	left: 38px;
	top: 127px;
}
#apDiv7 {
	position:absolute;
	width:217px;
	height:24px;
	z-index:6;
	left: 37px;
	top: 81px;
}
#apDiv8 {	position:absolute;
	width:217px;
	height:24px;
	z-index:6;
	left: 37px;
	top: 81px;
}
#apDiv9 {
	position:absolute;
	width:217px;
	height:25px;
	z-index:7;
	left: 37px;
	top: 234px;
}
#apDiv10 {	position:absolute;
	width:220px;
	height:25px;
	z-index:7;
	left: 37px;
	top: 234px;
}
#apDiv11 {
	position:absolute;
	width:217px;
	height:26px;
	z-index:8;
	left: 37px;
	top: 265px;
}
#apDiv12 {
	position:absolute;
	width:218px;
	height:25px;
	z-index:9;
	left: 37px;
	top: 297px;
}
#apDiv13 {	position:absolute;
	width:217px;
	height:24px;
	z-index:6;
	left: 37px;
	top: 81px;
}
#apDiv14 {
	position:absolute;
	width:218px;
	height:16px;
	z-index:10;
	left: 36px;
	top: 41px;
}
-->
    </style>
    <div id="contenidote2" class="contenidote2">
      <div id="apDiv1">Levantamiento de pedido por muestras</div>
      <div id="apDiv2">Levantamiento de pedido por existencias</div>
      <div id="apDiv4">Pedidos del cliente</div>
      <div id="apDiv3">Estados de cuenta</div>
      <div id="apDiv9">Promociones</div>
      <div id="apDiv12">Politicas de venta</div>
      <div id="apDiv11">Cuentas bancarias</div>
      <div id="apDiv14">Servicios</div>
    </div>