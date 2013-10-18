// JavaScript Document
 
function enviar_ajax_jquery(usuario,passwd,tipoMenu){
	 var dataString = 'txtUsuario='+ usuario + '&txtPasswd=' + passwd;  
	 
	 
		$.post("carrito/valida_usuario.php",
		   { txtUsuario: usuario, txtPasswd: passwd},
			function(data){
				
					setTimeout("", 2000);
					if(data!="false"){
						datos=data.split(';');
						
						tipo=datos[1];
						idRelacion=datos[0];
						idUsuario=datos[2];
						permisos=datos[3];
						nombre=datos[4];
					
						
						document.getElementById('idCliente').innerHTML=idRelacion;
						document.getElementById('tipo').innerHTML=tipo;
						document.getElementById('tipoCliente').innerHTML=tipo;
						
						document.getElementById('idUsuario').innerHTML=idUsuario;
						document.getElementById('permisos').innerHTML=permisos;
						
						document.getElementById('nombrecliente').innerHTML=nombre;
						

						
						$.post("menupanel/panelAdministradores.php",
						   {idUsuario:idUsuario,tipoMenu :tipoMenu,idRelacion:idRelacion,permisos:permisos},
							function(data2){
								$('#contenido').html(data2);  	
								jQuery('#navigation').accordion({ 
									active: false, 
									header: '.head', 
									navigation: true, 
									event: 'mouseover', 
									fillSpace: true, 
									animated: 'easeslide' 
								});
							}
						);
						//document.location.href="carrito/sistema.php";
						/*$.post("sistema.php",
						   {usuario:usuario,tipo:tipo,idRelacion:idRelacion,permisos:permisos },
							function(data2){
								$('#contenido').html(data2);  	
							}
						);*/
						
					}
					else{
						if(data=="true"){
							//document.location.href="carrito/sistema.php";
							/*$.post("sistema.php",
							   { },
								function(data2){
									$('#contenido').html(data2);  	
								}
							);*/
							document.getElementById('idCliente').innerHTML=idRelacion;
							document.getElementById('tipo').innerHTML=tipo;
							document.getElementById('idUsuario').innerHTML=idUsuario;
							document.getElementById('permisos').innerHTML=permisos;
							document.getElementById('nombrecliente').innerHTML=nombre
							document.getElementById('tipoCliente').innerHTML=tipo;
							

							$.post("menupanel/panelAdministradores.php",
						   {idUsuario:idUsuario,tipoMenu :tipo,idRelacion:idRelacion,permisos:permisos},
							function(data2){
								$('#contenido').html(data2);  	
								jQuery('#navigation').accordion({ 
									active: false, 
									header: '.head', 
									navigation: true, 
									event: 'mouseover', 
									fillSpace: true, 
									animated: 'easeslide' 
								});
							}
						);
						}
						else{
						 	
							document.getElementById('divResBusUsuario').innerHTML="<div id='divCerrarRojo'><img src='carrito/img/cerrar-rojo.jpg' width='20' height='20' /></div>  Nombre de usuario o contrase&ntilde;a incorrectos";
							/*$.post("autentica.php",
							   { },
								function(data2){
									$('#contenido').html(data2);  	
								}
							);*/	
							
							}
					}
				}
		);
	
	}
	function enviarASistemaCliente(seccionCatalogo){
		document.getElementById('lblTipoCatalogoMostrado').innerHTML=seccionCatalogo;

		idRelacion=document.getElementById('idCliente').innerHTML;
		tipo=document.getElementById('tipo').innerHTML;
		idUsuario=document.getElementById('idUsuario').innerHTML;
		permisos=document.getElementById('permisos').innerHTML;
		nombrecliente=document.getElementById('nombrecliente').innerHTML;
		
		$.post("sistema.php",
		   { usuario:idUsuario,tipo:tipo,idRelacion:idRelacion,permisos:permisos,seccionCatalogo:seccionCatalogo,nombrecliente:nombrecliente },
			function(data2){
				$('#divPanelAdmContenido').html(data2);  	
			}
		);	
	}
	function enviarASistemaInterno(seccionCatalogo){
		document.getElementById('lblTipoCatalogoMostrado').innerHTML=seccionCatalogo;
		idRelacion=document.getElementById('idCliente').innerHTML;
		tipo=document.getElementById('tipo').innerHTML;
		idUsuario=document.getElementById('idUsuario').innerHTML;
		permisos=document.getElementById('permisos').innerHTML;
		
		$.post("sistema_nc.php",
		   {usuario:idUsuario,tipo:tipo,idRelacion:idRelacion,permisos:permisos,seccionCatalogo:seccionCatalogo},
			function(data2){
				$('#divPanelAdmContenido').html(data2);  	
			}
		);	
		
	}
	
	function enviarASistemaClienteSugerencias(){
		
		seccionCatalogo='Sugerencias';
		document.getElementById('lblTipoCatalogoMostrado').innerHTML=seccionCatalogo;
		idRelacion=document.getElementById('idCliente').innerHTML;
		tipo=document.getElementById('tipo').innerHTML;
		idUsuario=document.getElementById('idUsuario').innerHTML;
		permisos=document.getElementById('permisos').innerHTML;
		
		$.post("sistema.php",
		   { usuario:idUsuario,tipo:tipo,idRelacion:idRelacion,permisos:permisos,seccionCatalogo:seccionCatalogo },
			function(data2){
				$('#divPanelAdmContenido').html(data2);  	
				cambiarASugerencias();
			}
		);	
	}
	
	function valida_usuario_en_sesion(){
		$.post("carrito/valida_usuario_en_session.php",
		   {},
			function(data){
					if(data!="false"){
						//document.location.href="carrito/sistema.php";
						
						datos=data.split(';');
						
						tipo=datos[1];
						idRelacion=datos[0];
						usuario=datos[2];
						//permisos=datos[3];
						document.getElementById('idCliente').innerHTML=idRelacion;
						document.getElementById('tipo').innerHTML=tipo;
						//document.getElementById('permisos').innerHTML=permisos;
						$.post("sistema.php",
						   {usuario:usuario,tipo:tipo,idRelacion:idRelacion },
							function(data2){
								$('#contenido').html(data2);  	
							}
						);
						
					}
					else{
						
						$.post("autentica.php",
						   { },
							function(data2){
								
								$('#contenido').html(data2);  	
							}
						);
					}
				}
		);
	}
	function valida_usuario_en_sesion_intranet(){
		$.post("carrito/valida_usuario_en_session.php",
		   {},
			function(data){
					if(data!="false"){
						//document.location.href="carrito/sistema.php";
						
						datos=data.split(';');
						
						tipo=datos[1];
						idRelacion=datos[0];
						usuario=datos[2];
						//permisos=datos[3];
						document.getElementById('idCliente').innerHTML=idRelacion;
						document.getElementById('tipo').innerHTML=tipo;
						
						
						/*$.post("sistema_nc.php",
						   {usuario:usuario,tipo:tipo,idRelacion:idRelacion},
							function(data2){
								$('#contenido').html(data2);  	
							}
						);*/
						$.post("menupanel/panelAdministradores.php",
						   {idUsuario:usuario,tipoMenu:tipo,idRelacion:idRelacion},
							function(data2){
								$('#contenido').html(data2);  	
								jQuery('#navigation').accordion({ 
									active: false, 
									header: '.head', 
									navigation: true, 
									event: 'mouseover', 
									fillSpace: true, 
									animated: 'easeslide' 
								});
							}
						);
						
					}
					else{
						
						$.post("autentica.php",
						   { },
							function(data2){
								
								$('#contenido').html(data2);  	
								/*
								
									$.post("menupanel/panelAdmin.php",
						   { },
							function(data2){
								
								$('#contenido').html(data2); 
								jQuery('#navigation').accordion({ 
									active: false, 
									header: '.head', 
									navigation: true, 
									event: 'mouseover', 
									fillSpace: true, 
									animated: 'easeslide' 
								});
							}
						);
								
								*/
							}
						);
						
					}
				}
		);
	}
	function valida_usuario_en_sesion_distribuidor(){
		$.post("carrito/valida_usuario_en_session.php",
		   {},
			function(data){
					if(data!="false"){
						
						datos=data.split(';');
						
						tipo=datos[1];
						idRelacion=datos[0];
						usuario=datos[2];
						//permisos=datos[3];
						document.getElementById('idCliente').innerHTML=idRelacion;
						document.getElementById('tipo').innerHTML=tipo;
						
						tipoMenu="Distribuidores";
						$.post("menupanel/panelAdministradores.php",
						   {idUsuario:usuario,tipoMenu:tipoMenu,idRelacion:idRelacion},
							function(data2){
								$('#contenido').html(data2);  	
								
							}
						);
						
					}
					else{
						
						$.post("autentica-distribuidores.php",
						   { },
							function(data2){
								
								$('#contenido').html(data2);  	
	
							}
						);
						
					}
				}
		);
	}
	function valida_usuario_en_sesion_consumidor(){
		$.post("carrito/valida_usuario_en_session.php",
		   {},
			function(data){
					if(data!="false"){
						
						datos=data.split(';');
						
						tipo=datos[1];
						idRelacion=datos[0];
						usuario=datos[2];
						tipoMenu="Consumidores";
						//permisos=datos[3];
						document.getElementById('idCliente').innerHTML=idRelacion;
						document.getElementById('tipo').innerHTML=tipo;
						
					
						$.post("menupanel/panelAdministradores.php",
						   {idUsuario:usuario,tipoMenu:tipoMenu,idRelacion:idRelacion},
							function(data2){
								$('#contenido').html(data2);  	
								
							}
						);
						
					}
					else{
						
						$.post("autentica-consumidor.php",
						   { },
							function(data2){
								
								$('#contenido').html(data2);  	
	
							}
						);
						
					}
				}
		);
	}