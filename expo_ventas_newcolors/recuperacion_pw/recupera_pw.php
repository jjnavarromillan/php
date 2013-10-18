<script language="javascript" src="../js/jquery/jquery.js"></script>
<script language="javascript" src="../js/functions.js"></script>
<script language="javascript" src="../js/codigo.js"></script>
<link rel="stylesheet" type="text/css" href="../css/recupera_pw.css">


<?php  

	require_once("../carrito/classes/date_convert_class.php");
	$cod = $_REQUEST['cod'];
	
	

	$mysqli= new mysqli("locahost","user_web","123454321","newcolors");    
    $mysqli->query("SET NAMES 'utf8'");
	date_default_timezone_set("Mexico/General");
	$fechahora=date("Y-m-d H:i:s");
	$fecha=date("Y-m-d");
	$hora=date("H:i:s");
	$idUsuarioWeb="";
	$codigo=$_REQUEST['cod'];
	$sql="select * from recuperar_passwd where codigoValidacion='$codigo' and fechaValidado is Null";

	
	if($result=$mysqli->query($sql)){
		
		if($obj=$result->fetch_object()){
						$idUsuarioWeb = $obj->idUsuarioWeb;
						$sqlVerUsuario = "select * from usuarios_web where idUsuarioWeb=$idUsuarioWeb ";
						$usuario="";
						if($resultUsu=$mysqli->query($sqlVerUsuario)){
							if($objUsu=$resultUsu->fetch_object()){
								$usuario= $objUsu->nombre;
							}
						}
						?>
                        
                        <div id="divRecuperaPW">
                          <div class="regCatalogo" id="divLblNuevaContraPw">NUEVA CONTRASE&Ntilde;A:</div>
                          <div id="divTitRecPw"><img src="../img/recuperacion-contrasena.jpg" width="250" height="37" /></div>
                          <div id="divTxtContraRec">
                            <label>
                              <input class="reCliTxAutentica" name="txtPassRecuperacion" type="password" id="txtPassRecuperacion" size="30">
                            </label>
                          </div>
                          <div  class="regCatalogo" id="divConfirmaPwRec">CONFIRMAR CONTRASE&Ntilde;A:</div>
                          <div id="divTxtConfirmaContraPw">
                            <input class="reCliTxAutentica" name="txtPassRecuperacion2" type="password" id="txtPassRecuperacion2" size="30">
                          </div>
                          <div id="divBotonGurarContraRec" onClick="guardar_pw_recuperacion('<?php  echo $idUsuarioWeb; ?>');" ><a href="#"><img src="../img/guardar-contrasena.jpg" border="0" width="125" height="18" /></a></div>
                          <div class="usuarioRecupera" id="divUsuarioRecPw"><?php  echo $usuario; ?> </div>
                          <div class="regCatalogo" id="divUsuarioRecuperaPw">USUARIO:</div>
                        </div>
                        
                        <?php 
		}
		else{
			echo "acceso invalido";
		}
	}
	else{
			echo "null";	
		}
	
	
?>



<div id="divRes"></div>
