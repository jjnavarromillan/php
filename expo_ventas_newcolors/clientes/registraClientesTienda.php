<?php 

	$opcion = $_REQUEST['opcion'];

?>

<script type="text/javascript" src="../js/jquery/jquery.js"></script>
<script type="text/javascript" src="../js/codigoJSON.js"></script>
<script language="javascript" src="acciones_clientes.js"></script>
<script language="javascript" src="../js/codigo.js"></script>
<script language="javascript" src="datagridNCClientes/datagridNC.js"></script>
<link rel="stylesheet" type="text/css" href="registraClientesTienda.css">

<script type="text/javascript" src="js/jquery/jquery.js"></script>
<script type="text/javascript" src="js/codigoJSON.js"></script>
<script language="javascript" src="js/codigo.js"></script>
<script language="javascript" src="clientes/acciones_clientes.js"></script>
<script language="javascript" src="clientes/datagridNCClientes/datagridNC.js"></script>
<link rel="stylesheet" type="text/css" href="clientes/registraClientesTienda.css">
<script language="javascript">
	llenar_paises("comboPaisEmpresa","comboEstadoEmpresa","comboMunicipioEmpresa");
	llenar_paises("comboPaisTienda","comboEstadoTienda","comboMuncipioTienda");
	llenar_tipo_cliente("comboTipoCliente");
</script>
<style type="text/css">
#divSistemaEmergente {
	position:absolute;
	width:620px;
	height:514px;
	z-index:2900;
	left: 7px;
	top: 1px;
	background-color: #FFF;
	visibility: hidden;
	border: thin solid #CCC;
}
a:link {
	text-decoration: none;
	color: #999;
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
#divTieClieTienda {
	position:absolute;
	width:41px;
	height:13px;
	z-index:49;
	left: 8px;
	top: 247px;
}
#divTelClieTienda2 {
	position:absolute;
	width:23px;
	height:13px;
	z-index:50;
	left: 433px;
	top: 289px;
}
#divPaisTienda2 {
	position:absolute;
	width:31px;
	height:13px;
	z-index:51;
	left: 8px;
	top: 290px;
}
#divEdoCliTienda2 {
	position:absolute;
	width:43px;
	height:13px;
	z-index:52;
	left: 8px;
	top: 314px;
}
#divPobClieTienda2 {
	position:absolute;
	width:62px;
	height:13px;
	z-index:53;
	left: 8px;
	top: 339px;
}
#divEncarClieTienda {
	position:absolute;
	width:67px;
	height:13px;
	z-index:54;
	left: 8px;
	top: 268px;
}
#divCalleClieTienda2 {
	position:absolute;
	width:35px;
	height:13px;
	z-index:55;
	left: 265px;
	top: 247px;
}
#apDiv8 {
	position:absolute;
	width:102px;
	height:25px;
	z-index:1;
	left: 446px;
	top: 33px;
}
#divColClieTienda2 {
	position:absolute;
	width:49px;
	height:13px;
	z-index:1;
	left: -53px;
	top: 209px;
}
#divCPClieTienda2 {
	position:absolute;
	width:24px;
	height:13px;
	z-index:56;
	left: 265px;
	top: 289px;
}
#divTransClieTienda {
	position:absolute;
	width:69px;
	height:13px;
	z-index:1;
	top: 314px;
	left: 264px;
}
#divObsClieTienda {
	position:absolute;
	width:49px;
	height:13px;
	z-index:57;
	left: 265px;
	top: 339px;
}
#divCopiarDatos {
	position:absolute;
	width:56px;
	height:15px;
	z-index:58;
	left: 517px;
	top: 215px;
	text-align: center;
}
</style>

<div id="divBusquedaCliente">
  
</div>
<div id="divSistemalblIdTienda" style="visibility:hidden"></div>
<div id="divSistemalblIdCliente" style="visibility:hidden"></div>
<div id="divNomClienteSistema"  style="visibility:hidden"></div>
<div id="divSistemaTiendaSel"  style="visibility:hidden"></div>
<label id="idCliente" style="visibility:hidden">-1</label>
<div id="divContenedorRegistraClientes">
  <div id="divNuevoCliRegistraClientes">321321<img src="img/nuevo-cliente.jpg" width="187" height="36" /></div>
  <div id="divConSecuTIenda">
    <div  class="datosClienteTienda"id="divClienteResgistraCli" >
      <input class="campoTxtTipo" align="left" name="txtCliente" type="text" id="txtCliente" size="45"  onclick="validaRegistro();" disabled="disabled"/>
      <div  class="datosClienteTienda" id="divTipCliClieTIenda">TIPO DE CLIENTE:</div>
    </div>
    <div  class="datosClienteTienda"id="divPaisRegistraClie">
      <label>
        <select  class="combitoContactoDis" name="comboPaisEmpresa" id="comboPaisEmpresa" onchange="llenar_estados('comboEstadoEmpresa',this.value,'comboMunicipioEmpresa');">
        </select>
      </label>
    </div>
    <div  class="datosClienteTienda"id="divEstadoRegistraClie">
      <select class="combitoContactoDis" name="comboEstadoEmpresa" id="comboEstadoEmpresa"  onchange="llenar_municipios('comboMunicipioEmpresa',this.value);">
      </select>
    </div>
    <div  class="datosClienteTienda"id="divPoblacionRegistraCli">
      <select  class="combitoContactoDisDos" name="comboMunicipioEmpresa" id="comboMunicipioEmpresa" >
      </select>
    </div>
    <div  class="datosClienteTienda"id="divCalleRegistraClie">
      <input  class="campoTxtTipo" name="txtCalleEmp" type="text" id="txtCalleEmp" size="40" />
    </div>
    <div class="datosClienteTienda" id="divColoniaRegistraClie">
      <input  class="campoTxtTipo" name="txtColoniaEmp" type="text" id="txtColoniaEmp" size="40" />
      <div  class="datosClienteTienda" id="divColClieTienda2">COLONIA:</div>
    </div>
    <div  class="datosClienteTienda"id="divCpRegistraClie">
      <input  class="campoTxtTipo" name="txtCPEmp" type="text" id="txtCPEmp" size="15" />
    </div>
    <div class="datosClienteTienda" id="divRfcRegistraClie">
      <input  class="campoTxtTipo" name="txtRFCEmp" type="text" id="txtRFCEmp" size="15" />
    </div>
    <div  class="datosClienteTienda" id="divTelRegistraCli">
      <input  class="campoTxtTipo" name="txtTelefonoEmp" type="text" id="txtTelefonoEmp" size="15" />
    </div>
    <div  class="datosClienteTienda" id="divEmailRegistraClientes">
      <input class="campoTxtTipo" name="txtEmail" type="text" id="txtEmail" size="15" />
    </div>
    <div  class="datosClienteTienda"id="divObsRegistraCli">OBSERVACION DEL CLIENTE:
      <input  class="campoTxtTipo" name="txtObsCliente" type="text" id="txtObsCliente" size="60" />
    </div>
    <div  class="datosClienteTienda" id="divTipoCliRegistraClie">
      <select class="combitoContactoDis" name="comboTipoCliente" id="comboTipoCliente">
      </select> 
    </div>
    <div  id="divObTxtRegistraClie"></div>
    <div  class="datosClienteTienda" id="divTiendaTienda">
      <label id="idTiendaSel"></label>
      <input  class="campoTxtTipo" name="txtNombreTienda" type="text" id="txtNombreTienda" size="25" />
    </div>
    <div class="datosClienteTienda" id="divEncarTienda">
      <input class="campoTxtTipo" name="txtEncargadoTienda" type="text" id="txtEncargadoTienda" size="25" />
    </div>
    <div class="datosClienteTienda" id="divTelTienda">
      <label>
        <input name="txtTelefonoTienda" type="text" class="campoTxtTipo" id="txtTelefonoTienda" size="15" />
      </label>
    </div>
    <div  class="datosClienteTienda" id="divPaisTiendas">
      <select class="combitoContactoDis" name="comboPaisTienda" id="comboPaisTienda" onchange="llenar_estados('comboEstadoTienda',this.value,'comboMuncipioTienda');">
      </select>
    </div>
    <div  class="datosClienteTienda" id="divEstadoTienda">
      <select class="combitoContactoDis" name="comboEstadoTienda" id="comboEstadoTienda" onchange="llenar_municipios('comboMuncipioTienda',this.value);">
      </select>
    </div>
    <div  class="datosClienteTienda" id="divPoblaTienda">
      <select class="combitoContactoDisDos" name="comboMuncipioTienda" id="comboMuncipioTienda">
      </select>
    </div>
    
    <div  class="datosClienteTienda" id="divCalletienda">
      <input  class="campoTxtTipo" name="txtCalleTienda" type="text" id="txtCalleTienda" size="40" />
    </div>
    <div class="datosClienteTienda" id="divColoniaTienda">
      <input name="txtColoniaTienda" type="text"  class="campoTxtTipo" id="txtColoniaTienda" size="40" />
    </div>
    <div class="datosClienteTienda" id="divCpTienda">
      <input class="campoTxtTipo" name="txtCPTienda" type="text" id="txtCPTienda" size="15" />
    </div>
    <div class="datosClienteTienda" id="divTransTienda">
      <input name="txtTransporteTienda" type="text"  class="campoTxtTipo" id="txtTransporteTienda" size="36" />
    </div>
    <div  class="datosClienteTienda" id="divObsGuiaTienda">
      <input name="txtObsGuia" type="text"  class="campoTxtTipo" id="txtObsGuia" size="36" />
    </div>
    <div class="datosClienteTienda" id="divConSeguroTienda">
      <label>
        <input type="checkbox" name="chkSeguro" id="chkSeguro" />
      </label>
    </div>
    <div  class="datosClienteTienda" id="divObsTienda">OBSERVACION DE LA TIENDA
      <input  class="campoTxtTipo" name="txtObservacionTienda" type="text" id="txtObservacionTienda" size="50" />
    </div>
    <div  class="datosClienteTienda" id="divTiendassTienda">TIENDAS:</div>
    <?php
		if($opcion=="Clientes_Nuevo_Cliente_Sistema"){
				?>
               <div id="divBtnBuscarClientes" onClick="verClienteBusquedaSistema('sistemaEditarCliente');"><a href="#"><img src="img/btn_buscar_dos.jpg" width="66" height="26" border="0" /></a></div>
                <?php
			}
	?>
    
    <div  class="datosClienteTienda" id="divConSSeguroTIenda">CON SEGURO</div>
    <div id="divGuarUsuarioTienda" onclick="guardarClienteYTienda();"><a href="#"><img src="img/btn_guadar_usuario.jpg" border="0" width="169" height="26" /></a></div>
    <div  class="registraClientesBlack" id="divNuevoCliente" onclick="limpiarDatos();"><img src="img/btn_nuevo.jpg" width="66" height="26" /></div>
    <div  class="datosClienteTienda" id="divCalleClieTienda">*CALLE:</div>
    <div  class="datosClienteTienda" id="divColClieTienda">*COLONIA:</div>
    <div class="datosClienteTienda" id="divCPClieTienda">*C.P:</div>
    <div  class="datosClienteTienda" id="divRFClieTienda">RFC:</div>
    <div class="datosClienteTienda" id="divTelClieTienda">TEL:</div>
    <div class="datosClienteTienda" id="divEmaClieTienda2">EMAIL:</div>
    <div  class="datosClienteTienda" id="divClieCliente">CLIENTE:</div>
    <div  class="datosClienteTienda" id="divPaisTienda">*PAIS:</div>
    <div  class="datosClienteTienda" id="divEdoCliTienda">*ESTADO:</div>
    <div  class="datosClienteTienda" id="divPobClieTienda">*POBLACION:</div>
    <div  class="datosClienteTienda" id="divTieClieTienda">TIENDA:</div>
    <div  class="datosClienteTienda" id="divTelClieTienda2">TEL:</div>
    <div  class="datosClienteTienda" id="divPaisTienda2">PAIS:</div>
    <div  class="datosClienteTienda" id="divEdoCliTienda2">ESTADO:</div>
    <div  class="datosClienteTienda" id="divPobClieTienda2">POBLACION:</div>
    <div  class="datosClienteTienda" id="divEncarClieTienda">ENCARGADO:</div>
    <div class="datosClienteTienda" id="divCalleClieTienda2">CALLE:</div>
    <div  class="datosClienteTienda" id="divTransClieTienda">TRANSPORTE:</div>
    <div class="datosClienteTienda" id="divCPClieTienda2">C.P:</div>
    <div  class="datosClienteTienda" id="divObsClieTienda">OBSGUIA:</div>
    <span class="datosClienteTienda">
    
  </span>
    <div id="divCopiarDatos" class="datosClienteTienda" onclick="copiarDatosClienteATienda();"><img src="img/copiar.jpg" width="59" height="18" /></div>
  </div>
</div>
<p>&nbsp;</p>
<div id="divSistemaEmergente" ></div>