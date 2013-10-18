var registroClientesJSON;
var clientesCargados=false;
	function getDatosCliente(txtCliente){
		if(document.getElementById("txtCliente").value !=""){
			var verDaCl="verDaCl";
			$.get("clientes/operaciones_clientes.php",
			   { txtCliente: txtCliente, ope: verDaCl},
				function(dataDatCli){
					if(dataDatCli!="3"){
						objJSONDatCli= eval('(' + dataDatCli + ')');
						cargarDatosCliente(objJSONDatCli);
						//llenar_paises("comboPaisEmpresa");
					}
					else{
						alert("Cliente no fue localizado");	
						limpiarDatos();
					}
				}
			);
		}
		else{
			alert("No existe cliente seleccionado");	
			limpiarDatos();
		}
	}
	function getDatosClienteEditar(txtCliente){
		
		if(txtCliente !=""){
			var verDaCl="verDaCl";
			$.get("clientes/operaciones_clientes.php",
			   { txtCliente: txtCliente, ope: verDaCl},
				function(dataDatCli){
					if(dataDatCli!="3"){
						objJSONDatCli= eval('(' + dataDatCli + ')');
						document.getElementById('txtCliente').value = txtCliente;
						document.getElementById('idCliente').innerHTML = objJSONDatCli[0].idCliente;
						document.getElementById('txtCalleEmp').value = objJSONDatCli[0].domicilio;
						document.getElementById('txtColoniaEmp').value = objJSONDatCli[0].col;
						document.getElementById('txtCPEmp').value = objJSONDatCli[0].cp;
						document.getElementById('txtRFCEmp').value = objJSONDatCli[0].RFC;
						document.getElementById('txtTelefonoEmp').value = objJSONDatCli[0].telefonos;
						document.getElementById('txtEmail').value = objJSONDatCli[0].email;
						document.getElementById('txtObsCliente').value = objJSONDatCli[0].observacionCliente;
						
						setTimeout("posiciona_combo_estado_municipio('comboEstadoEmpresa','"+objJSONDatCli[0].estado+"','comboMunicipioEmpresa','"+objJSONDatCli[0].municipio+"')",1000);
						
						
						setTimeout("llenar_tiendasXCliente("+objJSONDatCli[0].idCliente+")",1000);
						//setTimeout("llenar_usuariosXCliente("+objJSONDatCli[0].idCliente+")",1000);
					
					}
					else{
						alert("Cliente no fue localizado");	
						limpiarDatos();
					}
				}
			);
		}
		else{
			alert("No existe cliente seleccionado");	
			limpiarDatos();
		}
	}
	function guardarClienteYTienda(){
		
		txtCliente=document.getElementById("txtCliente").value;
		idTienda=document.getElementById("divSistemaTiendaSel").value;
		
		comboPaisEmpresa=document.getElementById("comboPaisEmpresa").value;
		comboEstadoEmpresa=document.getElementById("comboEstadoEmpresa").value;
		comboMunicipioEmpresa=document.getElementById("comboMunicipioEmpresa").value;
		comboTipoCliente=document.getElementById("comboTipoCliente").value;
		txtCalleEmp=document.getElementById("txtCalleEmp").value;
		txtColoniaEmp=document.getElementById("txtColoniaEmp").value;
		txtCPEmp=document.getElementById("txtCPEmp").value;
		txtRFCEmp=document.getElementById("txtRFCEmp").value;
		txtTelefonoEmp=document.getElementById("txtTelefonoEmp").value;
		txtEmail=document.getElementById("txtEmail").value;
		txtObsCliente=document.getElementById("txtObsCliente").value;		
		
		idCliente="";
		if(txtCliente!="" && comboPaisEmpresa!="" && comboEstadoEmpresa!="" && comboMunicipioEmpresa!="" && comboTipoCliente!="" && txtCalleEmp!="" && txtColoniaEmp!=""  && txtTelefonoEmp!="" && txtEmail!="" ){
				$.get("clientes/existeCliente.php",
				   { txtCliente: txtCliente},
					function(dataDatCli){						
						if(dataDatCli=="null" || dataDatCli=="nullUser"){
								validaYRegistraTienda();								
						}
						else{
							idCliente=dataDatCli;	
							validaYRegistraTienda();
						}
					}
				);				
		}
		else{
			alert("Debe registrar todos los campos en area de cliente");	
		}
		
		
		
	}
	function validaYRegistraTienda(){
		idCliente=document.getElementById("divSistemalblIdCliente").innerHTML;
		idTienda=document.getElementById("divSistemaTiendaSel").innerHTML;
		txtCliente=document.getElementById("txtCliente").value;
		comboPaisEmpresa=document.getElementById("comboPaisEmpresa").value;
		comboEstadoEmpresa=document.getElementById("comboEstadoEmpresa").value;
		comboMunicipioEmpresa=document.getElementById("comboMunicipioEmpresa").value;
		comboTipoCliente=document.getElementById("comboTipoCliente").value;
		txtCalleEmp=document.getElementById("txtCalleEmp").value;
		txtColoniaEmp=document.getElementById("txtColoniaEmp").value;
		txtCPEmp=document.getElementById("txtCPEmp").value;
		txtRFCEmp=document.getElementById("txtRFCEmp").value;
		txtTelefonoEmp=document.getElementById("txtTelefonoEmp").value;
		txtEmail=document.getElementById("txtEmail").value;
		txtObsCliente=document.getElementById("txtObsCliente").value;
		
		
		txtNombreTienda=document.getElementById("txtNombreTienda").value;
		txtTelefonoTienda=document.getElementById("txtTelefonoTienda").value;
		comboPaisTienda=document.getElementById("comboPaisTienda").value;
		comboEstadoTienda=document.getElementById("comboEstadoTienda").value;
		comboMuncipioTienda=document.getElementById("comboMuncipioTienda").value;
		txtEncargadoTienda=document.getElementById("txtEncargadoTienda").value;
		txtCalleTienda=document.getElementById("txtCalleTienda").value;
		txtColoniaTienda=document.getElementById("txtColoniaTienda").value;
		txtCPTienda=document.getElementById("txtCPTienda").value;
		txtTransporteTienda=document.getElementById("txtTransporteTienda").value;
		txtObsGuia=document.getElementById("txtObsGuia").value;
		txtObservacionTienda=document.getElementById("txtObservacionTienda").value;
		if(document.getElementById('chkSeguro').checked){
			transporteSeguro = "Si";
		}
		else{
			transporteSeguro = "No";
		}
		
		if(txtNombreTienda!="" && comboPaisTienda!="" && comboEstadoTienda!="" && comboMuncipioTienda!="" ){
			$.get("clientes/existeTienda.php",
			   { idCliente: idCliente,tienda:txtNombreTienda},
				function(dataDatCli){
					
					if(dataDatCli=="null" || dataDatCli=="nullUser"){
							$.get("clientes/registraClienteYTiendaDB.php",
							   { txtCliente:txtCliente,comboPaisEmpresa:comboPaisEmpresa,comboEstadoEmpresa:comboEstadoEmpresa,comboMunicipioEmpresa:comboMunicipioEmpresa,comboTipoCliente:comboTipoCliente,txtCalleEmp:txtCalleEmp,txtColoniaEmp:txtColoniaEmp,txtCPEmp:txtCPEmp,txtRFCEmp:txtRFCEmp,txtTelefonoEmp:txtTelefonoEmp,txtEmail:txtEmail,txtObsCliente:txtObsCliente,txtNombreTienda:txtNombreTienda,txtTelefonoTienda:txtTelefonoTienda,comboPaisTienda:comboPaisTienda,comboEstadoTienda:comboEstadoTienda,comboMuncipioTienda:comboMuncipioTienda,txtEncargadoTienda:txtEncargadoTienda,txtCalleTienda:txtCalleTienda,txtColoniaTienda:txtColoniaTienda,txtCPTienda:txtCPTienda,txtTransporteTienda:txtTransporteTienda,txtCPTienda:txtCPTienda,txtTransporteTienda:txtTransporteTienda,txtObsGuia:txtObsGuia,txtObservacionTienda:txtObservacionTienda,transporteSeguro:transporteSeguro},
								
								function(dataDatCli){
									
									if(dataDatCli=="null" || dataDatCli=="nullUser"){
												
									}
									else{
										alert("Registro de tienda satisfactorio");
										setTimeout("llenar_tiendasXCliente("+idCliente+")",1000);
									}
					
								}
							);										
					}
					else{
							
						
						$.get("clientes/actualizaClienteYTiendaDB.php",
							   { idCliente:idCliente,idTienda:idTienda,txtCliente:txtCliente,comboPaisEmpresa:comboPaisEmpresa,comboEstadoEmpresa:comboEstadoEmpresa,comboMunicipioEmpresa:comboMunicipioEmpresa,comboTipoCliente:comboTipoCliente,txtCalleEmp:txtCalleEmp,txtColoniaEmp:txtColoniaEmp,txtCPEmp:txtCPEmp,txtRFCEmp:txtRFCEmp,txtTelefonoEmp:txtTelefonoEmp,txtEmail:txtEmail,txtObsCliente:txtObsCliente,txtNombreTienda:txtNombreTienda,txtTelefonoTienda:txtTelefonoTienda,comboPaisTienda:comboPaisTienda,comboEstadoTienda:comboEstadoTienda,comboMuncipioTienda:comboMuncipioTienda,txtEncargadoTienda:txtEncargadoTienda,txtCalleTienda:txtCalleTienda,txtColoniaTienda:txtColoniaTienda,txtCPTienda:txtCPTienda,txtTransporteTienda:txtTransporteTienda,txtCPTienda:txtCPTienda,txtTransporteTienda:txtTransporteTienda,txtObsGuia:txtObsGuia,txtObservacionTienda:txtObservacionTienda,transporteSeguro:transporteSeguro},
								function(dataDatCli){
									
									alert("Registro de tienda satisfactorio");
					
								}
							);	
						
					}
	
				}
			);		
		}
		else{
			alert("Faltan datos en campos de tienda");	
		}
		
		
	}
	function crearUsuario(){
		var verDaCl="verDaCl";
		idCliente=document.getElementById('idCliente').innerHTML;
		if(idCliente!="" && idCliente!="-1"){
			txtNombreUsuario = document.getElementById('txtNombreRegUser').value;
			txtEmail=document.getElementById('txtCorreoRegUser').value;
			txtPasswd= document.getElementById('txtPasswdRegUser2').value;
			
			if(txtNombreUsuario!="" && txtEmail != "" && txtPasswd!=""){
				$.get("clientes/registro_usuario_web.php",
				   {idCliente:idCliente, txtNombreUsuario: txtNombreUsuario, txtEmail: txtEmail,txtPasswd:txtPasswd},
					function(data){
						if(data=="nullUser"){
							alert("El usuario o nombre de correo ya existe en la base de datos");
						}else if( data=="null" ){
							alert("Registre un nombre de correo");
						}
						else{
							alert("El usuario fue creado correctamente con el Id = " +data);
							setTimeout("llenar_usuariosXCliente("+data+")",1000);
						}
					}
				);
			}
			else{
				alert("Llene todos los campos de los usuarios");
			}
		}
		else{
			alert("No seleccionado a un cliente valido");
		}
	}
	
	function getDatosTienda(idTienda){
		var verDaCl="verDaCl";
		$.get("clientes/getDatosTiendaXIdTienda.php",
		   { idTienda: idTienda},
			function(data){
				objJSONTienda= eval('(' + data + ')');
				cargarDatosTienda(objJSONTienda);
				document.getElementById('divSistemaTiendaSel').innerHTML=idTienda;
			}
		);
	}
	
	function cargarDatosCliente(objJSON){
		
		document.getElementById('idCliente').innerHTML = objJSON[0].idCliente;

		document.getElementById('txtCalleEmp').value = objJSON[0].domicilio;
		document.getElementById('txtColoniaEmp').value = objJSON[0].col;
		document.getElementById('txtCPEmp').value = objJSON[0].cp;
		document.getElementById('txtRFCEmp').value = objJSON[0].RFC;
		document.getElementById('txtTelefonoEmp').value = objJSON[0].telefonos;
		document.getElementById('txtEmail').value = objJSON[0].email;
		document.getElementById('txtObsCliente').value = objJSON[0].observacionCliente;
		
		//setTimeout("posiciona_combo('comboEstadoEmpresa','"+objJSON[0].estado+"')",1000);
		//setTimeout("posiciona_combo('comboMunicipioEmpresa','"+objJSON[0].municipio+"')",1000);
		setTimeout("llenar_tiendasXCliente("+objJSON[0].idCliente+")",1000);
		setTimeout("llenar_usuariosXCliente("+objJSON[0].idCliente+")",1000);
		
		
		
	}
	function cargarDatosTienda(objJSON){
		document.getElementById('idTiendaSel').innnerHTML = objJSON[0].idTienda;
		document.getElementById('txtNombreTienda').value = objJSON[0].tienda;
		document.getElementById('txtCalleTienda').value = objJSON[0].domicilio;
		document.getElementById('txtColoniaTienda').value = objJSON[0].col;
		document.getElementById('txtCPTienda').value = objJSON[0].cp;

		document.getElementById('txtTelefonoTienda').value = objJSON[0].telefonos;
		document.getElementById('txtTransporteTienda').value = objJSON[0].transporte;
		document.getElementById('txtObsGuia').value = objJSON[0].obsGuia;
		document.getElementById('txtObservacionTienda').value = objJSON[0].observacionTienda;
		
		setTimeout("posiciona_combo_estado_municipio('comboEstadoTienda','"+objJSONDatCli[0].estado+"','comboMuncipioTienda','"+objJSONDatCli[0].municipio+"')",1000);

	}
	function llenar_paises(nameComboPais,nameComboEstado,nameComboMunicipio){
		$.post("libsphp/JSON/getPaisesJSON.php",
		   { },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo(objJSON2,nameComboPais,"idPais","pais");
				var comboPais= document.getElementById(nameComboPais);
				if(comboPais.length>0){
					comboPais.selectedIndex=0;
					llenar_estados(nameComboEstado,comboPais[0].value,nameComboMunicipio);
				}
			}
		);	
	}
	function llenar_tipo_cliente(nameCombo){
		$.post("libsphp/JSON/getTiposClientesJSON.php",
		   { },
			function(dataTip){
				objJSONTip= eval('(' + dataTip + ')');
				llena_combo(objJSONTip,nameCombo,"idTipo","tipo");
				var combo= document.getElementById(nameCombo);
				if(combo.length>0){
					combo.selectedIndex=0;
					
				}
			}
		);	
	}
	
	function llenar_tiendasXCliente(idCliente){
		/*$.post("clientes/getTiendasXClienteCombo.php",
		   {idCliente:idCliente },
			function(dataTieCombo){
				objJSONTienCombo= eval('(' + dataTieCombo + ')');
				llena_combo(objJSONTienCombo,"comboTiendasCliente","idTienda","tienda");
				var combo= document.getElementById("comboTiendasCliente");
				if(combo.length>0){
					combo.selectedIndex=0;
					
				}
				setTimeout("getDatosTienda("+combo.value+")",1000);
			}
		);	*/
		$.post("clientes/divGridTiendas.php",
		   {idCliente:idCliente },
			function(dataTieCombo){
				document.getElementById('divObTxtRegistraClie').innerHTML = dataTieCombo;
			}
		);
	}
	function llenar_usuariosXCliente(idCliente){
		$.get("clientes/getUsuariosXCliente.php", 
		   {idCliente:idCliente },
			function(dataTieCombo){
				objJSONTienCombo= eval('(' + dataTieCombo + ')');
				llena_combo(objJSONTienCombo,"comboUsuarios","idUsuarioWeb","usuarioWeb");
				var combo= document.getElementById("comboUsuarios");
				if(combo.length>0){
					combo.selectedIndex=0;
					
				}
			}
		);	
	}
	function llenar_estados(nameComboEstado,idPais,nameComboMunicipio){
		$.post("libsphp/JSON/getEstadosJSON.php",
		   {idPais:idPais},
			function(dataEstados){
				objJSONEstados= eval('(' + dataEstados + ')');
				llena_combo(objJSONEstados,nameComboEstado,"idEstado","estado");
				var comboEstados= document.getElementById(nameComboEstado);
				if(comboEstados.length>0){
					comboEstados.selectedIndex=0;
					llenar_municipios(nameComboMunicipio,comboEstados[0].value);	
					
				}
			}
		);	
	}
	function llenar_municipios(nameComboMunicipio,idEstado){
		$.post("libsphp/JSON/getMunicipiosJSON.php",
		   {idEstado:idEstado},
			function(dataMunicipios){
				objJSONMunicipios= eval('(' + dataMunicipios + ')');
				llena_combo(objJSONMunicipios,nameComboMunicipio,"idMunicipio","municipio");
				var comboMunicipios= document.getElementById(nameComboMunicipio);
				if(comboMunicipios.length>0){
					comboMunicipios.selectedIndex=0;
				}
			}
		);	
	}
	
	function llena_combo(datosJSON,nameCombo,campoId,campoText){
	  borrar_combo(nameCombo);
      var combo = document.getElementById(nameCombo);

	  for (var n=0;n<datosJSON.length;n++){
		  
		  var option = document.createElement('option');

		  combo.options.add(option, n);
		  combo.options[n].value = eval("datosJSON[n]."+ campoId +"");
		  combo.options[n].innerHTML = eval("datosJSON[n]."+ campoText +"").toUpperCase();  
	  }
      
        
	}
	function llena_combo_inicializando(datosJSON,nameCombo,campoId,campoText,valorInicial){
	  borrar_combo(nameCombo);
      var combo = document.getElementById(nameCombo);

      var option = document.createElement('option');
	  combo.options.add(option, 0);
	  combo.options[0].value =-1;
	  combo.options[0].innerHTML = valorInicial; 
	
	  for (var n=0;n<datosJSON.length;n++){
		  
		  var option = document.createElement('option');

		  combo.options.add(option, n+1);
		  combo.options[n+1].value = eval("datosJSON[n]."+ campoId +"");
		  combo.options[n+1].innerHTML = eval("datosJSON[n]."+ campoText +"").toUpperCase();  
	  }
      
        
	}
	function llena_combo_inicializa(datosJSON,nameCombo,campoId,campoText,datoTexIni){
	  borrar_combo(nameCombo);
      var combo = document.getElementById(nameCombo);

	  for (var n=0;n<datosJSON.length;n++){
		  
		  var option = document.createElement('option');
		
		  if(eval("datosJSON[n]."+ campoText +"").toUpperCase()== campoText.toLowerCase()){
			  option.selected = true;
		  }
		
		  combo.options.add(option, n);
		  combo.options[n].value = eval("datosJSON[n]."+ campoId +"");
		  combo.options[n].innerHTML = eval("datosJSON[n]."+ campoText +"").toUpperCase();  
		  
		 
		  
	  }
      
        
	}
	function posiciona_combo(nameCombo,campoText){
      var combo = document.getElementById(nameCombo);
	  
	  for (var n=0;n<combo.options.length;n++){

		if(combo.options[n].innerHTML.toLowerCase()== campoText.toLowerCase()){
					 		
			combo.options[n].selected = true;
		}  
	  }
 	}
	
	function posiciona_combo_estado_municipio(nameComboEstado,campoTextEstado,nameComboMunicipio,campoTexMunicipio){
      var combo = document.getElementById(nameComboEstado);
	  
	  for (var n=0;n<combo.options.length;n++){
		
		if(combo.options[n].innerHTML == campoTextEstado){
					 		
			combo.options[n].selected = true;
			
			llenar_municipios(nameComboMunicipio,combo.options[n].value);
			
			setTimeout("posiciona_combo('"+nameComboMunicipio+"','"+campoTexMunicipio+"')",3000);
			
		}  
	  }
	  
 	}
	
	
	function llena_comboEstados(estadosJSON,nameCombo){
	  borrar_combo(nameCombo);
      var combo = document.getElementById(nameCombo);
	  
	  for (var n=0;n<estadosJSON.length;n++){
		  
		  var option = document.createElement('option');

		  combo.options.add(option, n);
		  combo.options[n].value = estadosJSON[n].idEstado;
		  combo.options[n].innerHTML = estadosJSON[n].estado;  
	  }
      
    
	}
	
	function borrar_combo(nameCombo)
	{
	  var elSel = document.getElementById(nameCombo);
	  if(elSel){
		  if(elSel.length>0){
			  var n_ele = elSel.length-1;
			  for(v=n_ele;v>=0;v--){
				elSel.remove(v);		  
			  }
		  }
	  }
	}
	function getRandom(){
		var rango_superior = 5000;  
		var rango_inferior = 20000;  
		var aleatorio = Math.floor(Math.random()*(rango_superior-(rango_inferior-1))) + rango_inferior; 	
		return aleatorio;
	}
	function limpiarDatos(){
			document.getElementById("txtCliente").value = "";
			document.getElementById("txtCalleEmp").value = "";
			document.getElementById("txtColoniaEmp").value = "";
			document.getElementById("txtCPEmp").value = "";
			document.getElementById("txtRFCEmp").value = "";
			document.getElementById("txtTelefonoEmp").value = "";
			document.getElementById("txtEmail").value = "";
			document.getElementById("txtObsCliente").value = "";
			document.getElementById("txtNombreTienda").value = "";
			document.getElementById("txtTelefonoTienda").value = "";
			document.getElementById("txtEncargadoTienda").value = "";
			document.getElementById("txtCalleTienda").value = "";
			document.getElementById("txtColoniaTienda").value = "";
			document.getElementById("txtCPTienda").value = "";
			document.getElementById("txtTransporteTienda").value = "";
			document.getElementById("txtObsGuia").value = "";
			document.getElementById("txtObservacionTienda").value = "";
			/*document.getElementById("txtNombreRegUser").value = "";
			document.getElementById("txtCorreoRegUser").value = "";
			document.getElementById("txtPasswdRegUser2").value = "";*/
			document.getElementById("idCliente").innerHTML = "";
			document.getElementById("txtCliente").disabled =false;
			borrar_combo("comboUsuarios");		
			borrar_combo("comboTiendasCliente");	
			document.getElementById('divObTxtRegistraClie').innerHTML = "";			
	}
	/*function verClienteBusqueda(){

		getDatosCliente(document.getElementById('txtCliente').value);
		document.getElementById('divBusquedaCliente').style.visibility='visible';

		$.get("clientes/datagridNCClientes/datagridNC.php",
		   { },
			function(data){
				document.getElementById('divBusquedaCliente').innerHTML = data;
				setTimeout("cargarJSONClientes();",1000);
			}
		);
	}*/
	function verClienteBusquedaSistema(opcion){
		document.getElementById('divSistemaEmergente').style.visibility='visible';
		if(!clientesCargados){
			/*$.get("clientes/datagridNCClientes/datagridNC.php",
			   { },
				function(data){
					document.getElementById('divSistemaEmergente').innerHTML = data;
					setTimeout("cargarJSONClientesSistema();",1000);
				}
			);*/
			$.get("clientes_ver2/buscar_clientes.php?opcion="+opcion,
			   { },
				function(data){
					document.getElementById('divSistemaEmergente').innerHTML = data;
				}
			);
			clientesCargados=true;
		}
	}
	function verClienteBusquedaEditarCli(){
		document.getElementById('divSistemaEmergente').style.visibility='visible';
		if(!clientesCargados){
			/*$.get("clientes/datagridNCClientes/datagridNC.php",
			   { },
				function(data){
					document.getElementById('divSistemaEmergente').innerHTML = data;
					setTimeout("cargarJSONClientesSistema();",1000);
				}
			);*/
			$.get("clientes_ver2/buscar_clientes.php",
			   { },
				function(data){
					document.getElementById('divSistemaEmergente').innerHTML = data;
					
				}
			);
			clientesCargados=true;
		}
	}
	function vaciarDatosDeBusqueda(opcion, idCliente, idTienda,nombre,tienda){
		
		if(opcion =="sistemaAdminPedido"){
			document.getElementById('divSistemalblIdTienda').innerHTML=idTienda;
			document.getElementById('divSistemalblIdCliente').innerHTML=idCliente;
			document.getElementById('divNomClienteSistema').innerHTML=nombre;
			document.getElementById('divSistemaTiendaSel').innerHTML=tienda;
			document.getElementById('divSistemaEmergente').style.visibility='hidden';
			setTimeout("cargarDatosCarrito("+ idTienda+")", 2000);
		}
		if(opcion =="sistemaEditarCliente"){
			document.getElementById('divSistemalblIdTienda').innerHTML=idTienda;
			document.getElementById('divSistemalblIdCliente').innerHTML=idCliente;
			document.getElementById('divNomClienteSistema').innerHTML=nombre;
			document.getElementById('divSistemaTiendaSel').innerHTML=tienda;
			document.getElementById('divSistemaEmergente').style.visibility='hidden';
			
			setTimeout("getDatosClienteEditar('"+nombre+"')",2000);
			
		}
		if(opcion =="sistemaAdminPedidoVerClientes"){
		/*	document.getElementById('divSistemalblIdTienda').innerHTML=idTienda;
			document.getElementById('divSistemalblIdCliente').innerHTML=idCliente;
			document.getElementById('divNomClienteSistema').innerHTML=nombre;
			document.getElementById('divSistemaTiendaSel').innerHTML=tienda;
			document.getElementById('divSistemaEmergente').style.visibility='hidden';
			*/
			//setTimeout("getDatosClienteEditar('"+nombre+"')",2000);
			
		}
	}
	function copiarDatosClienteATienda(){
		
		document.getElementById('txtCalleTienda').value = document.getElementById('txtCalleEmp').value;
		document.getElementById('txtColoniaTienda').value = document.getElementById('txtColoniaEmp').value;
		document.getElementById('txtCPTienda').value = document.getElementById('txtCPEmp').value;
		document.getElementById('txtTelefonoTienda').value = document.getElementById('txtTelefonoEmp').value;
		document.getElementById('txtCPTienda').value = document.getElementById('txtCPEmp').value;
		document.getElementById('txtCPTienda').value = document.getElementById('txtCPEmp').value;
		

		//alert(document.getElementById('comboEstadoEmpresa').options[document.getElementById('comboEstadoEmpresa').selectedIndex].text);
		
		//posiciona_combo("comboPaisTienda",document.getElementById('comboPaisEmpresa').value);
		//posiciona_combo("comboEstadoTienda",document.getElementById('comboEstadoEmpresa').options[document.getElementById('comboEstadoEmpresa').selectedIndex].text);
		
		
		setTimeout("posiciona_combo_estado_municipio('comboEstadoTienda','"+document.getElementById('comboEstadoEmpresa').options[document.getElementById('comboEstadoEmpresa').selectedIndex].text+"','comboMuncipioTienda','"+document.getElementById('comboMunicipioEmpresa').options[document.getElementById('comboMunicipioEmpresa').selectedIndex].text+"')",1000);
		
		//llenar_municipios("comboMuncipioTienda",document.getElementById('comboMunicipioEmpresa').value);
		//posiciona_combo("comboMuncipioTienda",document.getElementById('comboMuncipioTienda').options[document.getElementById('comboMuncipioTienda').selectedIndex].text);
		
		
	
	}
	
	function validaRegistro(){
		if(document.getElementById('txtCliente').disabled){
			if(confirm("Desea agregar un nuevo cliente S/N")){
				limpiarDatos();
			}
		}
	}