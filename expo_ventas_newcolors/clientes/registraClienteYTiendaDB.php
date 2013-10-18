<?php 
	include("class_clientes.php");
	
	
	$txtCliente=$_REQUEST['txtCliente'];
	$comboPaisEmpresa=$_REQUEST['comboPaisEmpresa'];
	$comboEstadoEmpresa=$_REQUEST['comboEstadoEmpresa'];
	$comboMunicipioEmpresa=$_REQUEST['comboMunicipioEmpresa'];
	$comboTipoCliente=$_REQUEST['comboTipoCliente'];
	$txtCalleEmp=$_REQUEST['txtCalleEmp'];
	$txtColoniaEmp=$_REQUEST['txtColoniaEmp'];
	$txtCPEmp=$_REQUEST['txtCPEmp'];
	$txtRFCEmp=$_REQUEST['txtRFCEmp'];
	$txtTelefonoEmp=$_REQUEST['txtTelefonoEmp'];
	$txtEmail=$_REQUEST['txtEmail'];
	$txtObsCliente=$_REQUEST['txtObsCliente'];
	
	$txtNombreTienda=$_REQUEST['txtNombreTienda'];
	$txtTelefonoTienda=$_REQUEST['txtTelefonoTienda'];
	$comboPaisTienda=$_REQUEST['comboPaisTienda'];
	$comboEstadoTienda=$_REQUEST['comboEstadoTienda'];
	$comboMuncipioTienda=$_REQUEST['comboMuncipioTienda'];
	$txtEncargadoTienda=$_REQUEST['txtEncargadoTienda'];
	$txtCalleTienda=$_REQUEST['txtCalleTienda'];
	$txtColoniaTienda=$_REQUEST['txtColoniaTienda'];
	$txtCPTienda=$_REQUEST['txtCPTienda'];
	$txtTransporteTienda=$_REQUEST['txtTransporteTienda'];
	$txtEncargadoTienda=$_REQUEST['txtEncargadoTienda'];
	$txtTelefonoTienda=$_REQUEST['txtTelefonoTienda'];
	$txtObsGuia=$_REQUEST['txtObsGuia'];
	$txtObservacionTienda=$_REQUEST['txtObservacionTienda'];
	
	$encargado="";
	$saldoPendiente="0";
	$activoVenta="true";
	$activoWeb="true";
	$transporteSeguro="Desconocido";
	
	$Cliente = new ClientesClass();
	if($txtCliente!=""){
		$idCliente=$Cliente->existeCliente($txtCliente);
		if($idCliente==""){
			$idCliente = $Cliente->registroCliente($txtCliente, $txtCalleEmp , $txtColoniaEmp, $comboMunicipioEmpresa,$comboEstadoEmpresa,$comboPaisEmpresa,$txtCPEmp,$txtRFCEmp,$encargado,$saldoPendiente,$txtTelefonoEmp,$activoVenta,$activoWeb,$txtObsCliente,$txtEmail);
			
			if($idCliente!=""){
				
				$idTienda= $Cliente->existeTienda($idCliente,$txtNombreTienda);
				
				if($idTienda ==""){
						
						$idTienda=$Cliente->registroTienda($idCliente,$txtNombreTienda,$txtCalleTienda,$txtColoniaTienda,$comboMuncipioTienda,$comboEstadoTienda,$comboPaisTienda,$txtCPTienda,$txtEncargadoTienda,$saldoPendiente,$txtTelefonoTienda,$activoVenta,$activoWeb,$txtObservacionTienda,$txtTransporteTienda,$txtObsGuia,$transporteSeguro);
						
						echo "$idCliente,$idTienda";
						
				}
			}
			else{
				echo "nullUser";	
			}
		}
		else{
			$idTienda= $Cliente->existeTienda($idCliente,$txtNombreTienda);
			if($idTienda ==""){
				$idTienda=$Cliente->registroTienda($idCliente,$txtNombreTienda,$txtCalleTienda,$txtColoniaTienda,$comboMuncipioTienda,$comboEstadoTienda,$comboPaisTienda,$txtCPTienda,$txtEncargadoTienda,$saldoPendiente,$txtTelefonoTienda,$activoVenta,$activoWeb,$txtObservacionTienda,$txtTransporteTienda,$txtObsGuia,$transporteSeguro);
				echo "$idCliente,$idTienda";
			}	
		}
	}
	else{
		echo "null";	
	}
?>