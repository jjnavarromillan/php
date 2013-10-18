<link rel="stylesheet" type="text/css" href="css/registro-web-distribuidor.css">

<script type="text/javascript" src="js/jquery/jquery.js"></script>
<script type="text/javascript" src="js/codigoJSON.js"></script>
<script language="javascript" src="js/codigo.js"></script>
<script language="javascript" src="clientes/acciones_clientes.js"></script>
<script language="javascript" src="clientes/datagridNCClientes/datagridNC.js"></script>
<link rel="stylesheet" type="text/css" href="clientes/autentica-distribuidores-2.css">


<script language="javascript">
	llenar_paises("comboPaisEmpresa","comboEstadoEmpresa","comboMunicipioEmpresa");
	llenar_paises("comboPaisTienda","comboEstadoTienda","comboMuncipioTienda");
	llenar_tipo_cliente("comboTipoCliente");
</script>



<style type="text/css">
<!--
#divBotonAcepto {
	position:absolute;
	width:19px;
	height:17px;
	z-index:100;
	left: 212px;
	top: 967px;
}
#divAcepto {
	position:absolute;
	width:38px;
	height:13px;
	z-index:101;
	left: 235px;
	top: 970px;
}

-->
</style>
<div id="divBusquedaCliente">
  
</div>
<label id="idCliente" style="visibility:hidden"></label>
<div id="divContenedorAunDistribuidor2">
  <div id="divNuevoCliRegistraClientes"><img src="img/img-nuevo-distribuidor.jpg" width="562" height="127" /></div>
  <div id="divConSecuTIenda">
    <div  class="datosClienteTienda"id="divClienteResgistraCli">
      <input class="campoTxtTipo" align="left" name="txtCliente" type="text" id="txtCliente" size="77" />
      <div  class="datosClienteTienda" id="divTipDistribuidor2">TIPO DE CLIENTE</div>
    </div>
    <div  class="datosClienteTienda"id="divPaisRegistraDistribuidor2">
      <label>
        <select  class="combitoContactoDis" name="comboPaisEmpresa" id="comboPaisEmpresa" onchange="llenar_estados('comboEstadoEmpresa',this.value,'comboMunicipioEmpresa');">
        </select>
      </label>
    </div>
    <div  class="datosClienteTienda"id="divEstadoRegistraDistribuidor2">
      <select class="combitoContactoDis" name="comboEstadoEmpresa" id="comboEstadoEmpresa"  onchange="llenar_municipios('comboMunicipioEmpresa',this.value);">
      </select>
    </div>
    <div  class="datosClienteTienda"id="divPoblacionRegistraDistribuidor">
      <select  class="combitoContactoDis" name="comboMunicipioEmpresa" id="comboMunicipioEmpresa" >
      </select>
    </div>
    <div  class="datosClienteTienda"id="divCalleRegistraDistribuidor2">
      <input  class="campoTxtTipo" name="txtCalleEmp" type="text" id="txtCalleEmp" size="70" />
    </div>
    <div class="datosClienteTienda" id="divColoniaRegistraDistribuir">
      <input  class="campoTxtTipo" name="txtColoniaEmp" type="text" id="txtColoniaEmp" size="30" />
      <div  class="datosClienteTienda" id="divColTieDistribuidor2">COLONIA</div>
    </div>
    <div  class="datosClienteTienda"id="divCpDistribuidor">
      <input  class="campoTxtTipo" name="txtCPEmp" type="text" id="txtCPEmp" size="30" />
    </div>
    <div class="datosClienteTienda" id="divRfcDistribuidor">
      <input  class="campoTxtTipo" name="txtRFCEmp" type="text" id="txtRFCEmp" size="30" />
      
    </div>
    <div id="divFaxWebTxTDistribuidores">
        <label>
          <input name="textfield12" type="text"  class="campoTxtTipo" id="textfield12" size="30" />
        </label>
    </div>
    <div  class="datosClienteTienda" id="divTelDistribuidor2">
      <input  class="campoTxtTipo" name="txtTelefonoEmp" type="text" id="txtTelefonoEmp" size="30" />
    </div>
    <div  class="datosClienteTienda" id="divEmailDistribuidor2">
      <input class="campoTxtTipo" name="txtEmail" type="text" id="txtEmail" size="30" />
    </div>
    <div  class="datosClienteTienda"id="divObsDistribuidor2">
      <input  class="campoTxtTipo" name="txtObsCliente" type="text" id="txtObsCliente" size="63" />
    </div>
    <div  class="datosClienteTienda" id="divTipoCliDistribuidor2">
      <select class="combitoContactoObservacionCliente" name="comboTipoCliente" id="comboTipoCliente">
      </select>
    </div>
    <div  class="datosClienteTienda" id="divTiendaDistribuidor">
      <label id="idTiendaSel"></label>
      <input  class="campoTxtTipo" name="txtNombreTienda" type="text" id="txtNombreTienda" size="28" />
    </div>
    <div class="datosClienteTienda" id="divEncarDistribuidor2">
      <input class="campoTxtTipo" name="txtEncargadoTienda" type="text" id="txtEncargadoTienda" size="30" />
    </div>
    <div class="datosClienteTienda" id="divTelTieDistribuidor">
      <label>
        <input name="textTelefonoTienda" type="text" class="campoTxtTipo" id="textTelefonoTienda" size="30" />
      </label>
    </div>
    <div  class="datosClienteTienda" id="divPaisTieDistribuidor2">
      <select class="combitoContactoDis" name="comboPaisTienda" id="comboPaisTienda" onchange="llenar_estados('comboEstadoTienda',this.value,'comboMuncipioTienda');">
      </select>
    </div>
    <div  class="datosClienteTienda" id="divEstadoTiDistribuidor2">
      <select class="combitoContactoDis" name="comboEstadoTienda" id="comboEstadoTienda" onchange="llenar_municipios('comboMuncipioTienda',this.value);">
      </select>
    </div>
    <div  class="datosClienteTienda" id="divPoblaTiDistribuidor2">
      <select class="combitoContactoDis" name="comboMuncipioTienda" id="comboMuncipioTienda">
      </select>
    </div>
    
    <div  class="datosClienteTienda" id="divCalletiendaDistri2">
      <input  class="campoTxtTipo" name="txtCalleTienda" type="text" id="txtCalleTienda" size="70" />
    </div>
    <div class="datosClienteTienda" id="divColoniaTiendaDistribuidor2">
      <input name="txtColoniaTienda" type="text"  class="campoTxtTipo" id="txtColoniaTienda" size="30" />
    </div>
    <div class="datosClienteTienda" id="divCpTDistribuidor2">
      <input class="campoTxtTipo" name="txtCPTienda" type="text" id="txtCPTienda" size="30" />
    </div>
    <div id="divConCrearUsuWebTiend2Distribuidor2">
      <div  class="datosClienteTienda" id="divEmail2RegistraClie">
        <label>
          <input name="textfield" type="text"  class="campoTxtTipo" id="textfield" size="30" />
        </label>
        </label>
      </div>
      <div  class="datosClienteTienda"id="divNomRegistraClie">
        <div align="left">
          <input class="campoTxtTipo" type="text" name="txtNombreRegUser" id="txtNombreRegUser" />
        </div>
      </div>
      <div  class="datosClienteTienda" id="divEmaClieTienda">EMAIL</div>
      <div  class="datosClienteTienda"id="divNameClieTienda">NOMBRE DE USUARIO:</div>
    </div>
    <div id="divBtnBuscarDistribuidor2" onClick="verClienteBusqueda();"><img src="img/buscar.jpg" width="55" height="19" /></div>
    <div id="divGuarUsuarioDistribuidor2" onclick="guardarClienteYTienda();"><a href="#"><img src="img/guardar-usuario.jpg" border="0" width="102" height="22" /></a></div>
    <div  class="registraClientesBlack" id="divNuevoDistribuidor2" onclick="limpiarDatos();"><a href="#">Nuevo</a></div>
    <div  class="datosClienteTienda" id="divCalleDistribuidor2">CALLE Y NUMERO</div>
    <div  class="datosClienteTienda" id="divColClieDistribuidor2">COLONIA</div>
    <div class="datosClienteTienda" id="divCPDistribuidor2">C.P</div>
    <div  class="datosClienteTienda" id="divRFDistribuidor2">RFC</div>
    <div class="datosClienteTienda" id="divTelClieDistribuidor2">TEL</div>
    <div class="datosClienteTienda" id="divEmaDistribuidor2">
      
    EMAIL</div>
    <div  class="datosClienteTienda" id="divNextelWebDistribuidores">NEXTEL</div>
    <div  class="datosClienteTienda" id="divClieClienteDistribuidor2">CLIENTE</div>
    <div  class="datosClienteTienda" id="divPaisDistribuidor2">PAIS</div>
    <div  class="datosClienteTienda" id="divEdoCliDistribuidor2">ESTADO</div>
    <div  class="datosClienteTienda" id="divPobClieDistribuir">POBLACION</div>
    <div  class="datosClienteTienda" id="divTieClieDistribuidor">TIENDA</div>
    <div  class="datosClienteTienda" id="divTelClieTieDistribuidor2">PAQUETERIA</div>
    <div  class="datosClienteTienda" id="divPaiDistribuidor2">PAIS</div>
    <div  class="datosClienteTienda" id="divEdoCliTiDistribuidor2">ESTADO</div>
    <div  class="datosClienteTienda" id="divPobClieTieDistribuidor2">POBLACION</div>
    <div  class="datosClienteTienda" id="divEncarClieEncarDistribuidor2">ENCARGADO</div>
    <div class="datosClienteTienda" id="divCalleClieDistribuidor2">CALLE Y NUMERO</div>
    <div class="datosClienteTienda" id="divCPClieDistribuidor2">C.P</div>
    <span class="datosClienteTienda">
    
  </span>
    <div id="divcliRELeTxTDistribuidor">
      <label>
        <input  class="campoTxtTipo" name="textfield2" type="text" id="textfield2" size="57" />
      </label>
    </div>
    <div class="datosClienteTienda" id="divcliRELeDistribuidor">CLIENTE O REPRESENTANTE LEGAL</div>
    <div  class="datosClienteTienda" id="div1EmailwebDistribuidor">EMAIL</div>
    <div class="datosClienteTienda" id="div1TelWebDistribuidor">TEL</div>
    <div id="div1EmailwebTxTDistribuidor">
      <label>
        <input name="textfield3" type="text" class="campoTxtTipo" id="textfield3" size="30" />
      </label>
      
    </div>
    <div class="datosClienteTienda" id="divTelCelWebDistribuidor">TELEFONO/CELULAR</div>
    <div id="div1TelWebTxTDistribuidor">
      <label>
        <input name="textfield4" type="text" class="campoTxtTipo" id="textfield4" size="30" />
      </label>
    </div>
    <div  class="datosClienteTienda" id="divClieAutorizadoWebDistribuidor">NOMBRE DE CLIENTE AUTORIZADO COMPRAS</div>
    <div id="divClieAutorizadoWebTxTDistribuidor">
      <label>
        <input name="textfield5" type="text" class="campoTxtTipo" id="textfield5" size="57" />
      </label>

    </div>
          <div id="divTelCelWebTxTDistribuidor">
            <label>
              <input name="textfield18" type="text"  class="campoTxtTipo" id="textfield18" size="20" />
            </label>
          </div>
    <div  class="datosClienteTienda" id="div2EmailwebDistribuidor">EMAIL</div>
    <div id="div2EmailwebTxTDistribuidor">
      <label>
        <input name="textfield6" type="text" class="campoTxtTipo" id="textfield6" size="30" />
      </label>
      
    </div>
    <div  class="datosClienteTienda" id="divNomEmpreWebDistribuidor2">NOMBRE DE LA EMPRESA</div>
    <div  class="datosClienteTienda" id="div2TelWebDistribuidor">TEL</div>
    <div id="div2TelWebTxTDistribuidor">
      <label>
        <input name="textfield7" type="text"  class="campoTxtTipo" id="textfield7" size="30" />
      </label>
    </div>
    <div class="datosClienteTienda" id="divCliAutoPagosWebDistribuidor">NOMBRE DE CLIENTE AUTORIZADO PAGOS</div>
    <div id="divCliAutoPagosWebTxTDistribuidor">
      <label>
        <input name="textfield8" type="text"  class="campoTxtTipo" id="textfield8" size="57" />
      </label>
    </div>
    <div class="datosClienteTienda" id="div3EmailwebDistribuidor">EMAIL:</div>
    <div id="div3EmailwebTxTDistribuidor">
      <label>
        <input name="textfield9" type="text" class="campoTxtTipo" id="textfield9" size="30" />
      </label>
    </div>
    <div  class="datosClienteTienda" id="div3TelWebDistribuidor">TEL</div>
    <div id="div3TelWebTxTDistribuidor">
      <label>
        <input name="textfield10"  type="text" class="campoTxtTipo" id="textfield10" size="30" />
      </label>
    </div>
    <div  class="bienvCatalog" id="divDatosFacWebDistribuidor">
      <div align="center"><strong>DATOS DE FACTURACION</strong></div>
    </div>
    <div  class="datosClienteTienda" id="divCelWebDistribuidores">CEL</div>
    <div id="divCelWebTxTDistribuidores">
      <label>
        <input name="textfield11" type="text"  class="campoTxtTipo" id="textfield11" size="30" />
      </label>
    </div>
    <div   class="datosClienteTienda" id="divFaxWebDistribuidores">FAX</div>
    <div id="divNextelWebTxTDistribuidores">
      <label>
        <input name="textfield13" type="text" class="campoTxtTipo" id="textfield13" size="30" />
      </label>
    </div>
    <div  class="bienvCatalog" id="divDireTienda">
      <div align="center"><strong>DIRECCION DE ENTREGA</strong></div>
    </div>
    <div id="divTelCelWebTxTDistribuidor2">
      <label>
        <input name="textfield19" type="text"  class="campoTxtTipo" id="textfield19" size="20" />
      </label>
    </div>
    <div  class="datosClienteTienda" id="divEntregaWebDistribuidor">ENTREGA A DOMICILIO</div>
    <div  class="bienvCatalog" id="divRefComercialesWebDistribuidor">
      <div align="center"><strong>REFERENCIAS COMERCIALES</strong></div>
    </div>
    <div  class="datosClienteTienda" id="divNomEmpreWebDistribuidor">NOMBRE DE LA EMPRESA</div>
    <div  class="datosClienteTienda" id="divContacWebDistribuidor">CONTACTO</div>
    <div  class="datosClienteTienda" id="divContacWebDistribuidor2">CONTACTO</div>
    <div  class="datosClienteTienda" id="divTelCelWebDistribuidor2">TELEFONO/CELULAR</div>
    <div id="divNomEmpreWebTxTDistribuidor">
      <label>
        <input name="textfield14" type="text"  class="campoTxtTipo" id="textfield14" size="20" />
      </label>
    </div>
    <div id="divContacWebTxTDistribuidor">
      <label>
        <input name="textfield16" type="text" class="campoTxtTipo" id="textfield16" size="20" />
      </label>
    </div>
    <div id="divNomEmpreWebTxTDistribuidor2">
      <label>
        <input name="textfield15" type="text" class="campoTxtTipo" id="textfield15" size="20" />
      </label>
    </div>
    <div id="divContacWebTxTDistribuidor2">
      <label>
        <input name="textfield17" type="text" class="campoTxtTipo" id="textfield17" size="20" />
      </label>
    </div>
    <div  class="observacionTipo" id="divAdObserWeb1Distribuidor">
      <div align="center">Llenar los siguientes campos solo si deseas factura</div>
    </div>
    <div class="observacionTipo" id="divAdObserWeb2Distribuidor">Llenar solo si la direcci&oacute;n de entrega es diferente a los datos de facturaci&oacute;n.</div>
    <div  class="datosClienteTienda" id="divObsTipoDistribuidor2">OBSERVACION DEL CLIENTE</div>
    <div id="divEntregaWebDistribuidorCasilla">
      <label>
        <input type="checkbox" name="checkbox" id="checkbox" />
      </label>
    </div>
    <div id="divLineaDivisoraDistribuidores1"><img src="img/linea-distribuidores-divisora.png" width="550" height="8" /></div>
    <div id="divLineaDivisoraDistribuidores2"><img src="img/linea-distribuidores-divisora.png" width="550" height="8" /></div>
    <div id="divLineaDivisoraDistribuidores3"><img src="img/linea-distribuidores-divisora.png" width="550" height="8" /></div>
    <div id="divContenidoPoliticasDistribuidor">
      <div  class="politicasVenta" id="divPol1Distribuidor">Deber&aacute; de contar con un negocio establecido.</div>
      <div  class="politicasVenta" id="divPol2Distribuidor">
        <p>Requerimos tres referencias comerciales.</p>
      </div>
      <div class="politicasVenta" id="divPol3Distribuidor">
        <p>Los lotes son de 12 pares m&iacute;nimo.</p>
      </div>
      <div  class="politicasVenta" id="divPol4Distribuidor">
        <p>El pedido deber&aacute; estar pagado en su totalidad para su  entrega.</p>
      </div>
      <div  class="politicasVenta" id="divPol5Distribuidor">
        <p>El flete va por cuenta y riesgo del cliente (excepto zona  metropolitana).</p>
      </div>
      <div  class="politicasVenta" id="divPol6Distribuidor">
        <p>No se aceptan devoluciones<br />
          (excepto por defecto de fabrica) los cuales se aplicaran mediante  nota de cr&eacute;dito.</p>
      </div>
    </div>
    <div id="divLineaDivisoraDistribuidores4"><img src="img/linea-distribuidores-divisora.png" width="550" height="8" />
      <div  class="bienvCatalog" id="divPoliticasVentasDistribuidor">
        <div align="center"><strong>POLITICAS DE VENTA</strong></div>
      </div>
    </div>
    <div id="divBotonAcepto">
      <label>
        <input type="radio" name="radio" id="radio" value="radio" />
      </label>
    </div>
    <div  class="registraClientesBlack" id="divAcepto">Acepto</div>
  </div>
  
</div>
<p>&nbsp;</p>