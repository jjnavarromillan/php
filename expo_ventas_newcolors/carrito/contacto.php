<style type="text/css">
<!--
#divRegContacto1 {
	position:absolute;
	left:4px;
	top:50px;
	width:462px;
	height:111px;
	z-index:1;
}
#divRegContacto2 {
	position:absolute;
	left:10px;
	top:71px;
	width:444px;
	height:23px;
	z-index:2;
	text-align: center;
}
#divRegContacto3 {
	position:absolute;
	left:41px;
	top:119px;
	width:393px;
	height:33px;
	z-index:3;
	text-align: center;
}
-->
</style>
<div id="divRegContacto1"></div>
<div id="divRegContacto2">Su mensaje ha sido enviado satisfactoriamente, en breve se atendera su solicitud</div>
<div id="divRegContacto3">Espere un momento . . .</div>
<?php    
	
	//	txtNombre,txtCalle,txtColonia,txtCP,txtPais,txtidEstado,txtidMunicipio,txtTelefono,txtEmailCliente,txtMensaje,idCategoriaContacto
	$txtNombre=$_GET['txtNombre'];
	$txtCalle=$_GET['txtCalle'];
	$txtColonia=$_GET['txtColonia'];
	$txtCP=$_GET['txtCP'];
	$txtPais=$_GET['txtPais']; 
	$txtidEstado=$_GET['txtidEstado']; 
	$txtidMunicipio=$_GET['txtidMunicipio']; 
	$txtTelefono=$_GET['txtTelefono'];
	$txtEmailCliente=$_GET['txtEmailCliente']; 
	$txtMensaje=$_GET['txtMensaje'];
	$idCategoriaContacto =$_GET['idCategoriaContacto'];
	
	
    require_once("carrito_class.php");
	
    $carrito=new carrito();

    $divDatos=$carrito->registro_contacto($txtNombre,$txtCalle,$txtColonia,$txtCP,$txtPais,$txtidEstado,$txtidMunicipio,$txtTelefono,$txtEmailCliente,$txtMensaje,$idCategoriaContacto);
    echo $divDatos;
?>