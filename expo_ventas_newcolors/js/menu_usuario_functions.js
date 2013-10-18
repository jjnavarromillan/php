// JavaScript Document
	var menuUsuariosPresionado="";
	var arrayMenuUsuariosOptions=new Array();
	arrayMenuUsuariosOptions.push("divMen1PanelH");
	arrayMenuUsuariosOptions.push("divMen2PanelH");
	arrayMenuUsuariosOptions.push("divMen3PanelH");
	arrayMenuUsuariosOptions.push("divMen4PanelH");
	arrayMenuUsuariosOptions.push("divMen5PanelH");
	arrayMenuUsuariosOptions.push("divMen6PanelH");
	arrayMenuUsuariosOptions.push("divMen7PanelH");
	arrayMenuUsuariosOptions.push("divMen8PanelH");
	arrayMenuUsuariosOptions.push("divMen9PanelH");
	arrayMenuUsuariosOptions.push("divMen10PanelH");
	arrayMenuUsuariosOptions.push("divMen11PanelH");
	arrayMenuUsuariosOptions.push("divMen12PanelH");
	arrayMenuUsuariosOptions.push("divMen13PanelH");
	arrayMenuUsuariosOptions.push("divMen14PanelH");
	arrayMenuUsuariosOptions.push("divMen15PanelH");

	//	"menu/menu/"
	
	function setArrayMenu(){
			
	}
	function menuUsuariosPrincipalNormal(menuSeleccionado){
			quitarSeleccionUsuarios();
			document.getElementById(menuUsuariosSeleccionado).style.color = '';
			
	}
	function menuUsuariosPrincipalOver(arrayMenuOptions,menuSeleccionado){
			quitarSeleccionUsuarios();
			document.getElementById(menuUsuariosSeleccionado).style.color ="#F60"
	}
	function menuUsuariosPrincipalClick(menuUsuariosSeleccionado){
		
		quitarSeleccionUsuarios();
		document.getElementById(menuUsuariosSeleccionado).style.color="#F60";
		
	}
	function quitarSeleccionUsuarios(){
			
			var optionMenu="";
			for (var i=0;i<arrayMenuUsuariosOptions.length;i++){
				optionMenu = arrayMenuUsuariosOptions[i];

				document.getElementById(optionMenu).style.color = "";
			}
	}
	
	
		id_opc_menu_seleccionado="";
		id_opc_menu_seleccionado_act="";
		function asignar_menu_seleccionado(opcionSelected){
			
			if(id_opc_menu_seleccionado==""){
				id_opc_menu_seleccionado_act=opcionSelected;
				id_opc_menu_seleccionado=opcionSelected;	
				document.getElementById(id_opc_menu_seleccionado_act).style.color="#F60";
			}
			else{
				id_opc_menu_seleccionado_act=opcionSelected;
				try
				  {
				  	document.getElementById(id_opc_menu_seleccionado).style.color="";
				  }
				catch(err)
				  {
				  //Handle errors here
				  }
				
				
				id_opc_menu_seleccionado=id_opc_menu_seleccionado_act;
				document.getElementById(id_opc_menu_seleccionado_act).style.color="#F60";	
			}
		}
		function Catalogos_empresa_Muestrarios_Sistema(){
			enviarASistemaCliente('Temporadas');	
			asignar_menu_seleccionado("opcMenuSeccion1");
		}
		function Catalogos_empresa_Bodega_Sistema(){
			enviarASistemaInterno('InventarioEmpresa');	
			asignar_menu_seleccionado("opcMenuSeccion2");
		}
		function Catalogos_empresa_Programacion_Sistema(){
			enviarASistemaCliente('Programacion');
			asignar_menu_seleccionado("opcMenuSeccion3");
		}
		function Catalogos_empresa_Sugerencias_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion4");
		}
		function Sugerencias_Nueva_sugerencia_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion5");
		}
		function Sugerencias_Eliminar_sugerencia_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion6");
		}
		function Sugerencias_Editar_sugerencia_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion7");
		}
		function Sugerencias_Enviar_sugerencias_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion8");		
		}
		
		function Clientes_Nuevo_Cliente_Sistema(){
			restaurarDivDatos();
			opcion = "Clientes_Nuevo_Cliente_Sistema";
			cargarFormularioClientes(opcion);
			asignar_menu_seleccionado("opcMenuSeccion9");
			
		}

		function Clientes_Editar_cliente_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion10");
		}
		function Clientes_Ver_clientes_Sistema(){
			window.open('clientes_ver2/ver_clientes.php','_blank');
			asignar_menu_seleccionado("opcMenuSeccion11");
		}
		function Clientes_Usuarios_por_cliente_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion12");
		}
		function Pedidos_Pedidos_Sistema(){
			cargarCrearPedido(document.getElementById('idCliente').innerHTML);
			asignar_menu_seleccionado("opcMenuSeccion13");
		}
		function Pedidos_Ver_Pedidos_Sistema(){
			//cargarVerPedido(document.getElementById('idCliente').innerHTML,document.getElementById('nombrecliente').innerHTML);
			//restaurarDivDatos();
			//cargarVerPedidos();
			
			//window.location = "pedidos_ver2/seccion_pedidos.php";
			window.open('pedidos_ver2/seccion_pedidos.php','_blank');
			asignar_menu_seleccionado("opcMenuSeccion14")
			
		}
		
		function Contabilidad_Facturacion_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion15");
		}
		function Contabilidad_Estado_de_cuenta_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion16");
		}
		function On_Line_Chat_on_line_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion17");
		}
		function On_Line_Usuarios_conectados_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion18");
		}
		function On_Line_Historico_de_conectados_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion19");
		}
		function Distribuidores_Muestrarios_Sistema(){
			enviarASistemaCliente('Distribuidores')
			asignar_menu_seleccionado("opcMenuSeccion20");
		}
		function Distribuidores_Inventario_Sistema(){
			enviarASistemaCliente('Inventario');
			asignar_menu_seleccionado("opcMenuSeccion21");
		}
		function Distribuidores_Sugerencias_Sistema(){
			enviarASistemaClienteSugerencias();
			asignar_menu_seleccionado("opcMenuSeccion22");
		}
		function Consumidores_Muestrarios_Sistema(){
			asignar_menu_seleccionado("opcMenuSeccion23");
		}
		function Catalogos_Muestrarios_Distribuidores(){
			enviarASistemaCliente('Distribuidores');
			asignar_menu_seleccionado("opcMenuSeccion24");
		}
		function Catalogos_Bodega_Distribuidores(){
				enviarASistemaCliente('Inventario');
				asignar_menu_seleccionado("opcMenuSeccion25");
		}
		function Catalogos_Sugerencias_Distribuidores(){
				enviarASistemaClienteSugerencias();
				asignar_menu_seleccionado("opcMenuSeccion26");
		}
		function Pedidos_Crear_Pedido_Distribuidores(){
				cargarCrearPedido(document.getElementById('idCliente').innerHTML);
				asignar_menu_seleccionado("opcMenuSeccion27");
		}
		function Pedidos_Ver_Pedido_Distribuidores(){
				cargarVerPedido(document.getElementById('idCliente').innerHTML,document.getElementById('nombrecliente').innerHTML);
				asignar_menu_seleccionado("opcMenuSeccion28");
		}
		function Catalogos_Temporadas_Consumidores(){
				asignar_menu_seleccionado("opcMenuSeccion31");
					
		}
		function Informacion_Mis_datos_Consumidores(){
				asignar_menu_seleccionado("opcMenuSeccion32");
		}
		function Promos_Top_Consumidores(){
				asignar_menu_seleccionado("opcMenuSeccion33");
		}
		function Promos_Outlet_Consumidores(){
				asignar_menu_seleccionado("opcMenuSeccion34");
		}
		function Pedidos_Estilos_Sistema(){
				restaurarDivDatos();
				asignar_menu_seleccionado("opcMenuSeccion36");
				cargarFormularioEstilos();
				llenar_categorias();
				llenar_plantillas();
		}
		function Pedidos_Estadistica_ventas_Sistema(){
			window.open('estadisticas/estadisticasVentas.php','_blank');
			asignar_menu_seleccionado("opcMenuSeccion37")
		}
		function Pedidos_Clonacion_de_pedidos_Sistema(){
				window.open('pedidos_clon/seccion_pedidos_clon.php','_blank');
				asignar_menu_seleccionado("opcMenuSeccion38");
		}
		
		function Promos_De_miedo_Distribuidores(){
				document.getElementById('imgFondoPaneldAdministrador2').innerHTML="";
				$('#imgFondoPaneldAdministrador2').flash({
					src: 'flash/promo-botas.swf',
					width: 790,
					height: 501
				}
				);
		}