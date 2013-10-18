// JavaScript Document
var htmlDivCodeAtras="";
var htmlDivCodeDelante="";
var urlHrefDestino ='';
var arrayElementsSelected=new Array();
var tamArrayElementsSelected=0;
	function setDatePickerInicio(){
		
			$(function() {
				$( "#datepicker" ).datepicker({
					showWeek: true,
					firstDay: 1
				});
				//$( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
			});
		
	}
	function changePickerIni(){
		$( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );	
	}
	function changePickerFin(){
		$( "#datepickerfin" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );	
	}
function setDatePickerFin(){
		
			$(function() {
				$( "#datepickerfin" ).datepicker({
					showWeek: true,
					firstDay: 1
				});

			});

		
	}
	function validakeynull(textfield){
		textfield.value ="";
	}
	function initFechaIniVerPedidos(){
		$(document).ready(function(){
			$('#txtInicioBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
			$('#txtFinBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});					   
			
								   
		});
		
	}
	function datepick(){
			$('#txtInicioBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
			$('#txtFinBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
		}

function cargarDetalleDePedido(idDatCliFac){
	fechainicio = document.getElementById('datepicker').value;
	fechafin = document.getElementById('datepickerfin').value;
	if(fechainicio!="" && fechafin!=""){ 
		
			surtido = document.getElementById('radioSurtido').checked;
			llamarasincrono('carrito/ver_pedido_diseno2_detalle.php?idDatCliFac='+idDatCliFac+'&fechainicio='+ fechainicio +'&fechafin='+fechafin+'&surtido='+surtido+'','divCoVerPed1');
		
		
	}
	else
	{
		alert("Seleccion rango de fecha para inicio y fin");
	}
	
		
}
function cargarElementosEnCarro(){
	
	setTimeout("cargarDatosCarrito(document.getElementById('divSistemalblIdTienda').innerHTML)",2000);
	document.getElementById('lblContElementsCarro').innerHTML =document.getElementById('lblCantidadEnCarrito').innerHTML;
}
function cargarVerPedido(idRelacion,cliente){
	//llamarasincrono('carrito/ver_pedido_diseno2.php?idDatCliFac='+idRelacion+'&cliente='+cliente,'cuadroEstilo');
	
	//document.getElementById('divContenedorPedidos').style.visibility='visible';
	
	$.get('pedidos/datagridNCPedido/datagridNC.php',
		   {  },
			function(data){
				//document.getElementById('divContenedorPedidos').innerHTML = data;
				document.getElementById('divPanelAdmContenido').innerHTML = data;//document.getElementById('divContenedorPedidos').innerHTML;
				
				cargarJSONPedidos(idRelacion,cliente);
				
			}
		);	
	
	
	//llamarasincrono('pedidos/datagridNCPedido/datagridNC.php?idDatCliFac='+idRelacion+'&cliente='+cliente,'divContenedorPedidos');
}
function cargarVerPedidos(){
	//llamarasincrono('carrito/ver_pedido_diseno2.php?idDatCliFac='+idRelacion+'&cliente='+cliente,'cuadroEstilo');
	
	//document.getElementById('divContenedorPedidos').style.visibility='visible';
	
	$.get('pedidos_ver2/vista_pedidos.php',
		   {  },
			function(data){
				//document.getElementById('divContenedorPedidos').innerHTML = data;
				document.getElementById('divPanelAdmContenido').innerHTML = data;//document.getElementById('divContenedorPedidos').innerHTML;
				//setTimeout("initFechaIniVerPedidos();",2000);
				//$('#txtInicioBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
				//$('#txtFinBusCli').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
				
			}
		);	
	
	
	//llamarasincrono('pedidos/datagridNCPedido/datagridNC.php?idDatCliFac='+idRelacion+'&cliente='+cliente,'divContenedorPedidos');
}
function cerrar_sesion2(){
		llamarasincrono('carrito/terminar_sesion.php','contenido');

		document.getElementById('nombrecliente').innerHTML="<a href='#' onclick=\"llamarasincrono('autentica.php','contenido');\">Iniciar sesion</a>";
	}
function cargarEstilosAgrupados(){
	idPlantilla = document.getElementById('comboCat').value;

	llamarasincrono("carrito/ver_estilos_diseno.php?idPlantilla="+idPlantilla+"", "cuadroEstilo");	

}

function cargarEstilosTotalNC(){
	//if(document.getElementById('lblTipoCatalogoMostrado').innerHTML!="Inventario"){
		idPlantilla = document.getElementById('comboPlantillas').value;
	//}
	
	comboCategorias="";
	//if(document.getElementById('lblTipoCatalogoMostrado').innerHTML!="Inventario"){
		/*if(document.getElementById('comboCatCalzado').value!="Todos"){
			comboCategorias = document.getElementById('comboCatCalzado').value;
		}*/
//	}
	comboMateriales="";
	if(document.getElementById('comboMateriales').value!="Todos"){
		comboMateriales = document.getElementById('comboMateriales').value;
	}
	comboColores="";
	if(document.getElementById('comboColores').value!="Todos"){
		comboColores = document.getElementById('comboColores').value;
	}
	comboLineasFiltro="";
	if(document.getElementById('comboLineasFiltro').value!="Todos"){
		comboLineasFiltro = document.getElementById('comboLineasFiltro').value;
	}
	if(idPlantilla=="-2"){
		llamarasincrono("carrito/getEstilosLineasInventarioNC.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML, "cuadroEstilo");	
	}
    else{
		
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Distribuidores"){
				//document.getElementById('lblTituloSeccionActiva').innerHTML="Inventario";
				llamarasincrono("carrito/getEstilosLineasAll.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&seccionCatalogo=Distribuidores", "cuadroEstilo");	
		}
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Sugerencias"){

			llamarasincrono("carrito/getEstilosLineasAll.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML, "cuadroEstilo");	
		}
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Inventario"){
	
			document.getElementById('lblTituloSeccionActiva').innerHTML="Inventario";
			document.getElementById('lblCantidadEstilosMostrados').innerHTML="-1";
			llamarasincrono("carrito/getEstilosLineasAllInventario.php?categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML+"&idPlantilla="+idPlantilla, "cuadroEstilo");		
		}
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Programacion"){
				//document.getElementById('lblTituloSeccionActiva').innerHTML="Inventario";
				llamarasincrono("carrito/getEstilosLineasAll.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&seccionCatalogo=Programacion", "cuadroEstilo");	
		}
	}
	
	setTimeout("document.getElementById('lblCantidadEstilosMostrados').innerHTML=document.getElementById('elementosDesplegados').innerHTML;",3000);
	
		

}
function restaurarDivDatos(){
	/*try{
		document.getElementById('cuadroEstilo').style.height = '420px';
	}
	catch(e){
	}
	document.getElementById('contenido').style.height = "540px";
	document.getElementById('pie').style.top = '650px';
	try{
		document.getElementById('divCarroElements500').style.height = "540px";
	}
	catch(e2){}
	*/
}

function ampliarDivDatos(){
	/*document.getElementById('cuadroEstilo').style.height = (parseInt(document.getElementById('posYFin').innerHTML)-150)+'px';
	document.getElementById('contenido').style.height = (parseInt(document.getElementById('posYFin').innerHTML)-20)+'px';
	document.getElementById('pie').style.top = (parseInt(document.getElementById('posYFin').innerHTML)+80)+'px';
	document.getElementById('divCarroElements500').style.height = (parseInt(document.getElementById('posYFin').innerHTML)-20)+'px';*/
}

function cargarSugerencias(){
	document.getElementById('lblCantidadEstilosMostrados').innerHTML="-1";
	llamarasincrono("carrito/getEstilosLineasAll.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&seccionCatalogo='Sugerencias'", "cuadroEstilo");	
	setTimeout("document.getElementById('lblCantidadEstilosMostrados').innerHTML=document.getElementById('elementosDesplegados').innerHTML;ampliarDivDatos();",3000);
}


function cargarEstilosTotal(){
	//if(document.getElementById('lblTipoCatalogoMostrado').innerHTML!="Inventario"){
		idPlantilla = document.getElementById('comboPlantillas').value;
	//}
	
	comboCategorias="";
	//if(document.getElementById('lblTipoCatalogoMostrado').innerHTML!="Inventario"){
		/*if(document.getElementById('comboCatCalzado').value!="Todos"){
			comboCategorias = document.getElementById('comboCatCalzado').value;
		}*/
//	}
	comboMateriales="";
	if(document.getElementById('comboMateriales').value!="Todos" && document.getElementById('comboMateriales').value!="-1"){
		comboMateriales = document.getElementById('comboMateriales').value;
	}
	comboColores="";
	if(document.getElementById('comboColores').value!="Todos" && document.getElementById('comboColores').value!="-1"){
		comboColores = document.getElementById('comboColores').value;
	}
	comboLineasFiltro="";
	if(document.getElementById('comboLineasFiltro').value!="Todos" && document.getElementById('comboLineasFiltro').value!="-1"){
		comboLineasFiltro = document.getElementById('comboLineasFiltro').value;
	}
	comboEstiloFiltro="";
	if(document.getElementById('comboGrupoEstilos').value!="Todos" && document.getElementById('comboGrupoEstilos').value!="-1"){
		
		comboEstiloFiltro = document.getElementById('comboGrupoEstilos').value;
	}
	
	if(document.getElementById('lblTipoCatalogoMostrado').innerHTML!="Inventario"){
	
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Distribuidores"){
			//document.getElementById('lblTituloSeccionActiva').innerHTML="Inventario";
			llamarasincrono("carrito/getEstilosLineasAll.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&estilo="+comboEstiloFiltro+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML, "cuadroEstilo");	
		}
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Sugerencias"){
			document.getElementById('cuadroEstilo2').style.visibility="hidden";
			//llamarasincrono("carrito/getEstilosLineasAll.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML, "cuadroEstilo");	
		}
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Programacion" || document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Temporadas"){
			//document.getElementById('lblTituloSeccionActiva').innerHTML="Inventario";
			llamarasincrono("carrito/getEstilosLineasAll.php?idPlantilla="+idPlantilla+"&categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&estilo="+comboEstiloFiltro+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML, "cuadroEstilo");	
		}
	}
	if(document.getElementById('lblTipoCatalogoMostrado').innerHTML=="Inventario"){

		document.getElementById('lblTituloSeccionActiva').innerHTML="Inventario";
		document.getElementById('lblCantidadEstilosMostrados').innerHTML="-1";
		llamarasincrono("carrito/getEstilosLineasAllInventario.php?categoria="+comboCategorias+"&material="+ comboMateriales +"&color="+comboColores+"&linea="+comboLineasFiltro+"&estilo="+comboEstiloFiltro+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML+"&idPlantilla="+idPlantilla, "cuadroEstilo");		
	}
	
	
	setTimeout("document.getElementById('lblCantidadEstilosMostrados').innerHTML=document.getElementById('elementosDesplegados').innerHTML;ampliarDivDatos();",3000);
	
		

}
function cargarFiltros(seccionCatalogo){
	llamarasincrono("carrito/menu-categorias_todo.php?seccionCatalogo="+seccionCatalogo, "cuadroLinea");	
	document.getElementById('cuadroEstilo').innerHTML="";
}
function cargarFiltros_nc(seccionCatalogo){
	llamarasincrono("carrito/menu-categorias_todo_nc.php?seccionCatalogo="+seccionCatalogo, "cuadroLinea");	
	document.getElementById('cuadroEstilo').innerHTML="";
	
}
function cargarLineas(){
	idPlantilla = document.getElementById('comboCat').value;
	//document.getElementById('idPlantilla').innerHTML=idPlantilla;
	llamarasincrono("carrito/getLineasMenu.php?idPlantilla="+idPlantilla+"", "cuadroLinea");	
	document.getElementById('cuadroEstilo').innerHTML="";
}
function calculaSumatoriaPaquetes(idEstilo){
	var cantPaquetes=0;
	cantPaquetes=document.getElementById('contClaves').innerHTML;
	var N2=0;
	var N2m=0;
	var N3=0;
	var N3m=0;
	var N4=0;
	var N4m=0;
	var N5=0;
	var N5m=0;
	var N6=0;
	var N6m=0;
	var pares=0;

	for(i=0;i<cantPaquetes;i++){
		idxCant=i+1;
		
		combo = document.getElementById('comboCant'+idxCant+'_'+idEstilo).value;
		if(combo!=0){
			N2 += parseInt(document.getElementById('F'+idxCant+'_N2').innerHTML)*parseInt(combo);
			N2m += parseInt(document.getElementById('F'+idxCant+'_N2m').innerHTML)*parseInt(combo);
			N3 += parseInt(document.getElementById('F'+idxCant+'_N3').innerHTML)*parseInt(combo);
			N3m += parseInt(document.getElementById('F'+idxCant+'_N3m').innerHTML)*parseInt(combo);
			N4 += parseInt(document.getElementById('F'+idxCant+'_N4').innerHTML)*parseInt(combo);
			N4m += parseInt(document.getElementById('F'+idxCant+'_N4m').innerHTML)*parseInt(combo);
			N5 += parseInt(document.getElementById('F'+idxCant+'_N5').innerHTML)*parseInt(combo);
			N5m += parseInt(document.getElementById('F'+idxCant+'_N5m').innerHTML)*parseInt(combo);
			N6 += parseInt(document.getElementById('F'+idxCant+'_N6').innerHTML)*parseInt(combo);
			N6m += parseInt(document.getElementById('F'+idxCant+'_N6m').innerHTML)*parseInt(combo);
		}
		document.getElementById('SN2_'+idEstilo).innerHTML=N2;
		document.getElementById('SN2m_'+idEstilo).innerHTML=N2m;
		document.getElementById('SN3_'+idEstilo).innerHTML=N3;
		document.getElementById('SN3m_'+idEstilo).innerHTML=N3m;
		document.getElementById('SN4_'+idEstilo).innerHTML=N4;
		document.getElementById('SN4m_'+idEstilo).innerHTML=N4m;
		document.getElementById('SN5_'+idEstilo).innerHTML=N5;
		document.getElementById('SN5m_'+idEstilo).innerHTML=N5m;
		document.getElementById('SN6_'+idEstilo).innerHTML=N6;
		document.getElementById('SN6m_'+idEstilo).innerHTML=N6m;
		
	}
}
function cargarNumeracionCombo(idEstilo,A,B){
		
	paqSel = document.getElementById("comboPaq_"+idEstilo).value;

	var combo = document.getElementById('divComboCants_'+idEstilo);
	strCombo="";
	
	strCombo="";

	strCombo = strCombo+"<select class=combito id=comboCant_"+idEstilo+" onchange='calculaSumatoriaCombos("+idEstilo+")'";
              
	if(paqSel=='A'){
		for (r=0;r<=A;r++){
			strCombo=strCombo+'<option value='+r+'>'+ r +'</option>';
		}		
	}
	if(paqSel=='B'){
		for (r=0;r<=B;r++){
			strCombo=strCombo+'<option value='+ r +'>'+ r +'</option>';
		}		
	}
              
             
    strCombo = strCombo+"</select>";        

	combo.innerHTML = strCombo;
	
}
function calculaSumatoriaCombos(idEstilo){
	cantPaquetes=0;
	cantPaquetes=document.getElementById('contClaves').innerHTML;
	var N2=0;
	var N2m=0;
	var N3=0;
	var N3m=0;
	var N4=0;
	var N4m=0;
	var N5=0;
	var N5m=0;
	var N6=0;
	var N6m=0;
	var pares=0;
	var paq=0;
	var canti=0;
	var precio=0;
	paq = document.getElementById('comboPaq_'+idEstilo).value;
	canti = document.getElementById('comboCant_'+idEstilo).value;
	for(i=0;i<cantPaquetes;i++){
		idxCant=i+1;
		var paqLis = "";

		paqLis = document.getElementById('F'+idxCant+'_clave').innerHTML;

		if(paq==paqLis){
			N2 = parseInt(document.getElementById('F'+idxCant+'_N2').innerHTML)*parseInt(canti);
			N2m = parseInt(document.getElementById('F'+idxCant+'_N2m').innerHTML)*parseInt(canti);
			N3 = parseInt(document.getElementById('F'+idxCant+'_N3').innerHTML)*parseInt(canti);
			N3m = parseInt(document.getElementById('F'+idxCant+'_N3m').innerHTML)*parseInt(canti);
			N4 = parseInt(document.getElementById('F'+idxCant+'_N4').innerHTML)*parseInt(canti);
			N4m = parseInt(document.getElementById('F'+idxCant+'_N4m').innerHTML)*parseInt(canti);
			N5 = parseInt(document.getElementById('F'+idxCant+'_N5').innerHTML)*parseInt(canti);
			N5m = parseInt(document.getElementById('F'+idxCant+'_N5m').innerHTML)*parseInt(canti);
			N6 = parseInt(document.getElementById('F'+idxCant+'_N6').innerHTML)*parseInt(canti);
			N6m = parseInt(document.getElementById('F'+idxCant+'_N6m').innerHTML)*parseInt(canti);
			precio = parseInt(document.getElementById('lblPrecio_'+idEstilo).innerHTML);
		
			pares = parseInt(N2)+parseInt(N2m)+parseInt(N3)+parseInt(N3m)+parseInt(N4)+parseInt(N4m)+parseInt(N5)+parseInt(N5m)+parseInt(N6)+parseInt(N6m);
			document.getElementById('SN2_'+idEstilo).innerHTML=N2;
			document.getElementById('SN2m_'+idEstilo).innerHTML=N2m;
			document.getElementById('SN3_'+idEstilo).innerHTML=N3;
			document.getElementById('SN3m_'+idEstilo).innerHTML=N3m;
			document.getElementById('SN4_'+idEstilo).innerHTML=N4;
			document.getElementById('SN4m_'+idEstilo).innerHTML=N4m;
			document.getElementById('SN5_'+idEstilo).innerHTML=N5;
			document.getElementById('SN5m_'+idEstilo).innerHTML=N5m;
			document.getElementById('SN6_'+idEstilo).innerHTML=N6;
			document.getElementById('SN6m_'+idEstilo).innerHTML=N6m;
			document.getElementById('Importe_'+idEstilo).innerHTML=pares;
			//alert(document.getElementById('lblImporte_'+idEstilo).innerHTML);
			document.getElementById('lblImporte_'+idEstilo).innerHTML=parseInt(pares)*parseInt(precio);
			
		}
	}
	calculaSubtotalesNumCrearPedido();
	
}
function calculaSubtotalesNumCrearPedido(){
	contElementosEnCarro =document.getElementById('contElementosEnCarro').innerHTML; 
	var subtotal=0;
	var subtotalPares=0;
	for(i=1;i<=contElementosEnCarro;i++){
		var valEstilo = parseInt(document.getElementById("index_"+i).innerHTML);

		var valor = document.getElementById('lblImporte_'+valEstilo).innerHTML;
		var valorPares = document.getElementById('Importe_'+valEstilo).innerHTML;
		subtotalPares+=parseInt(valorPares);
		subtotal+=parseInt(valor);
	}
	document.getElementById('TotalPares').innerHTML=parseInt(subtotalPares);
	document.getElementById('SubtotalImporte').innerHTML=parseInt(subtotal);
	}
	/*function getValorClavePaqN2(idx){
		combo = document.getElementById('comboCant'+idxCant+'_'+idEstilo).value
	}*/

function cargarCatalogosPlantillas(){
	llamarasincrono('carrito/getCategoriasCatalogos.php', 'divComEstMenCategorias');
}
function cargarCategoriasCalzado(idPlantilla,tipoCatalogo){
	llamarasincrono('carrito/getCategoriasCalzado.php?idPlantilla='+idPlantilla+'&tipoCatalogo='+tipoCatalogo, 'divComTipMenCategorias');
}
function cargarMaterial(idPlantilla,tipoCatalogo){
	llamarasincrono('carrito/getMaterialesGroup.php?idPlantilla='+idPlantilla+'&tipoCatalogo='+tipoCatalogo, 'divComMatMenCategorias');
}
function cargarComboMunicipios(idEstado){
	llamarasincrono('carrito/getComboMunicipios.php?idEstado='+idEstado, 'divtxtMunContacto');
}
function cargarColores(idPlantilla,tipoCatalogo){
	llamarasincrono('carrito/getColoresGroup.php?idPlantilla='+idPlantilla+'&tipoCatalogo='+tipoCatalogo, 'divComColMenColores');
}
function cargarLineasGroup(idPlantilla,tipoCatalogo){
	llamarasincrono('carrito/getLineasGroup.php?idPlantilla='+idPlantilla+'&tipoCatalogo='+tipoCatalogo, 'divComLinMenCategorias');
}
function cargarEstilosGroup(idPlantilla,tipoCatalogo){
	llamarasincrono('carrito/getEstilosGroup.php?idPlantilla='+idPlantilla+'&tipoCatalogo='+tipoCatalogo, 'divComTipMenCategorias');
}
function cargarCrearPedido(idTienda){
	
		if(parseInt(document.getElementById('lblCantidadEnCarrito').innerHTML)>0){
		
		if(document.getElementById('lblTipoCatalogoMostrado').innerHTML!="Inventario"){
			llamarasincrono('carrito/pedido_diseno4.php?idTienda='+idTienda+'&seccionCatalogo='+document.getElementById('lblTipoCatalogoMostrado').innerHTML, 'divDatos');
			document.getElementById('divDatos').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';document.getElementById('cuadroEstilo').style.visibility='visible';
		}
		else{
			llamarasincrono('carrito/pedido_diseno_inventario.php?idTienda='+idTienda+'&seccionCatalogo='+document.getElementById('lblTipoCatalogoMostrado').innerHTML, 'divDatos');
			document.getElementById('divDatos').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';document.getElementById('cuadroEstilo').style.visibility='visible';
		}
		
		
	}
	else{
		alert("No existen elementos en el carrito");
	}
	
}
function cargarFormulario(idRelacion){
	cargarCatalogosPlantillas();
	
	cargarLineas();
	cargarDatosCarrito(idRelacion);
	setTimeout("cargarElementosEnCarro()",'2000');
	
}
function posicionaImagen(id,idOrigen,idImg,estiloImg,evt,hrefOrigen,hrefDest){
            
            cambiarDisplay(id);
            
            imgDest=document.getElementById(idImg);
            imgDest.src=estiloImg ;
            objOrigen= document.getElementById(idOrigen);
            imgDest.value=objOrigen.value;
            hrefOrgenFoto=document.getElementById(hrefOrigen);
            //hrefDestFoto=document.getElementById(hrefDest);

			urlHrefDestino=hrefOrgenFoto.href;      
            
            div=document.getElementById(id);
			div.value = 1;
			/*if ('\v'=='v') alert('Su navegador es Internet Explorer !');

			var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox/') > -1;  
			if (is_firefox ) alert('Su navegador es Firefox');*/
			

            if ('\v'=='v'){
				left = parseInt(findXCoord(evt))+200;
    	        vtop = parseInt(findYCoord(evt))-0;	
			}
			else{
				left = parseInt(findXCoord(evt))-300;
	            vtop = parseInt(findYCoord(evt))-100;
			}
            
            
            div.style.left=left+'px';
            div.style.top=vtop+'px';
             
            
            
        }
		function verToolTipTex(imgDestinoId,imgOrigenId,divOrigenId,divDestinoId,evt){
			document.getElementById(imgDestinoId).src = document.getElementById(imgOrigenId).src;
			document.getElementById(divDestinoId).style.visibility="visible";
			vistaToolTipTexSiguenos=true;
			var x1= parseInt(document.getElementById(divOrigenId).offsetLeft+20 );
			var y1= parseInt(document.getElementById(divOrigenId).offsetTop+20 );
			
			document.getElementById(divDestinoId).style.top = y1+"px";
			document.getElementById(divDestinoId).style.left = x1+"px";

			
		}
		var vistaToolTipTexSiguenos=false;
		function ocultarToolTipTex(divDestinoId){
			if(vistaToolTipTexSiguenos){
					document.getElementById(divDestinoId).style.visibility="visible";
					vistaToolTipTexSiguenos=false;
				}
			else{
					document.getElementById(divDestinoId).style.visibility="hidden";
					vistaToolTipTexSiguenos=true;
				}
			

			

			
		}
		function findXCoord(evt) {
	        if (evt.x) 	return evt.x; 
	        if (evt.pageX) return evt.pageX; 
        }
        function findYCoord(evt) {
	        if (evt.y) return evt.y; 
	        if (evt.pageY) return evt.pageY; 
        }
        function cambiarDisplay(id) {
          if (!document.getElementById) return false;
          fila = document.getElementById(id);
          if (fila.style.display != 'none') {
            fila.style.display = 'none'; //ocultar fila
          } else {
            fila.style.display = ''; //mostrar fila
          }
        }
        function limpiarImagen(idImg){
            imgDest=document.getElementById(idImg);
            imgDest.src='';            
        }
		
	function totalClavesPedidos(comboCant,lblpares_,lbltotal_,lblPrecio_){
		var cant = document.getElementById(comboCant).value;
		var pares =document.getElementById(lblpares_).innerHTML; //Ext.get(lblpares_).dom.innerHTML;
		var total=0;
		total= cant * pares;
		document.getElementById(lbltotal_).innerHTML=total; //Ext.get(lbltotal_).dom.innerHTML = total;
		totalCantidadPedidosClaves(document.getElementById('lblCantTotal').innerHTML);//(Ext.get('lblCantTotal').dom.innerHTML);
	}
	function totalCantidadPedidosClaves(cantidad){
		var total=0;
		for(i=1;i<=cantidad;i++){
			totalPares=document.getElementById('Total'+i).innerHTML; //Ext.get('Total'+i).dom.innerHTML;
			total=parseInt(total) +parseInt(totalPares);
		}
		document.getElementById('lblTotal_').innerHTML=""; //Ext.get('lblTotal_').dom.innerHTML="";
		document.getElementById('lblTotal_').innerHTML=total;//Ext.get('lblTotal_').dom.innerHTML=parseInt(total);
		document.getElementById('lblTotalCompra').innerHTML ="$"+(parseInt(document.getElementById('lblTotal_').innerHTML) * parseInt(document.getElementById('lblPrecio').innerHTML));
	}
	function setEstiloPedido(idEstiloPedido){
			document.getElementById('idEstiloPedido').innerHTML=idEstiloPedido;
	}
	function getEstiloPedido(){
		return document.getElementById('idEstiloPedido').innerHTML;
	}
 
 	
 
   function nameFotoImage(estilo,material,color){
		
		nombreFoto=estilo +" "+ material + " " + color;
		tam = nombreFoto.length;
		res = "";

		for (r=0;r<tam;r++){
			car = nombreFoto.charAt(r);
			if (car == ' ')
				car = '-';
			if (car == 'Ñ')
				car = 'N';
			if (car == 'ñ') 
				car = 'n';
			res = res + car;
		}

		foto=res + ".jpg";	
		return foto;
	}
	function nameFotoImageGif(estilo,material,color){
		
		nombreFoto=estilo +" "+ material + " " + color;
		tam = nombreFoto.length;
		res = "";

		for (r=0;r<tam;r++){
			car = nombreFoto.charAt(r);
			if (car == ' ')
				car = '-';
			if (car == 'Ñ')
				car = 'N';
			if (car == 'ñ') 
				car = 'n';
			res = res + car;
		}

		foto=res + ".gif";	
		return foto;
	}
	function llenaCarrito(arrayDatosCarrito){
		var tam;
		var arrayItem=new Array();
		tam=arrayDatosCarrito.length;
		
		var	strCarroHTML='';
		var idEstilo=""
		var linea="";
		var estilo="";
		var color="";
		var corrida="";
		var cantidadCorridas="";
		var pares;
		var precio="";
		var corrida="";
		var cantidadCorridas="";
		var n2_="";
		var n2m_="";
		var n3_="";
		var n3m_="";
		var n4_="";
		var n4m_="";
		var n5_="";
		var n5m_="";
		var n6_="";
		var n6m_="";
		var urlImg="";
		var total_="";
		
		//tam = Ext.get('tamElementsCarrito').dom.innerHTML;
		tam = document.getElementById('tamElementsCarrito').innerHTML;
		

		for(i=0;i<tam;i++){
			arrayItem=arrayDatosCarrito[i].split(';');

			idEstilo=arrayItem[0];
			
			linea=arrayItem[1];
			estilo=arrayItem[2];
			material=arrayItem[3];
			color=arrayItem[4];
			
			n2_=arrayItem[5];
			n2m_=arrayItem[6];
			n3_=arrayItem[7];
			n3m_=arrayItem[8];
			n4_=arrayItem[9];
			n4m_=arrayItem[10];
			n5_=arrayItem[11];
			n5m_=arrayItem[12];
			n6_=arrayItem[13];
			n6m_=arrayItem[14];
			pares_=arrayItem[15];
			
			precio_=arrayItem[16];
			total_=arrayItem[17];
			//corrida=arrayItem[6];
			//cantidadCorridas=arrayItem[7];
			
			urlImg=arrayItem[18];
			strCarroHTML+="		<div class='resumen'>";
            strCarroHTML+="	        <span class='borrar'>";
            strCarroHTML+="	        <input name='check' value='"+ idEstilo +"' class='checar' type='checkbox' id='chk_"+ i +"'>";
            strCarroHTML+="	        <span class='fondoestilo2'></span>";
            strCarroHTML+="	        <span class='fotoResumen'><img src='"+urlImg+"' style='border: medium hidden ; height: 48px; width: 48px;'></span>";
            strCarroHTML+="	        <span class='lineaResumen'>" + linea + "</span>";
            strCarroHTML+="	        <span class='estiloResumen'>" + estilo + "</span>";
            strCarroHTML+="	        <span class='infoResumen'>";
            strCarroHTML+="	        <label class='material'> "+ material +" "+ color +"</label>";
            strCarroHTML+="	        <label class='precio'>PRECIO $" + precio + "</label>";
            strCarroHTML+="	        <span class='numeros'>";
            strCarroHTML+="	        <label class='n2'>N2</label>";
            strCarroHTML+="	        <label class='n2m'>-</label>";
            strCarroHTML+="	        <label class='n3'>N3</label>";
            strCarroHTML+="	        <label class='n3m'>-</label>";
            strCarroHTML+="	        <label class='n4'>N4</label>";
            strCarroHTML+="	        <label class='n4m'>-</label>";
            strCarroHTML+="	        <label class='n5'>N5</label>";
            strCarroHTML+="	        <label class='n5m'>-</label>";
            strCarroHTML+="	        <label class='n6'>N6</label>";
            strCarroHTML+="	        <label class='n6m'>-</label>";
            strCarroHTML+="	        <label class='n2a'>" + n2_ + "</label>";
            strCarroHTML+="	        <label class='n2ma'>" + n2m_ + "</label>";
            strCarroHTML+="	        <label class='n3a'>" + n3_ + "</label>";
            strCarroHTML+="	        <label class='n3ma'>" + n3m_ + "</label>";
            strCarroHTML+="	        <label class='n4a'>" + n4_+ "</label>";
            strCarroHTML+="	        <label class='n4ma'>" + n4m_ + "</label>";
            strCarroHTML+="	        <label class='n5a'>" + n5_ + "</label>";
            strCarroHTML+="	        <label class='n5ma'>" + n5m_ + "</label>";
            strCarroHTML+="	        <label class='n6a'>" + n6_ + "</label>";
            strCarroHTML+="	        <label class='n6ma'>" + n6m_ + "</label>";
            strCarroHTML+="	        </span>";
            strCarroHTML+="	        <label class='totalPares'>TOTAL PARES: </label>";
            strCarroHTML+="	        <label class='numeroPares'>" + pares_ + "</label>";
            strCarroHTML+="	        <label class='totalPrecio'>TOTAL PRECIO: </label>";
            strCarroHTML+="	        <label class='numeroPrecio'>$" + precio_ + "</label>";
            strCarroHTML+="	        </span>";
            strCarroHTML+="	        </a>";
            strCarroHTML+="	  </span>";
            strCarroHTML+="	  </div>";
						
			
		}
		return strCarroHTML;
		
	}
	

	function agregarCorridasCarrito(){
		
		var corrida=0, cantCorrida=0, n2_=0, n2m_=0, n3_=0, n3m_=0, n4_=0, n4m_=0, n5_=0, n5m_=0, n6_=0, n6m_=0,precio_=0, pares_=0;
		//corrida=Ext.get('ComboNumeracion').dom.value;
		//cantCorrida=Ext.get('ComboCantidad').dom.value;
		
		n2_=document.getElementById('txtN2').innerHTML;//Ext.get('txtN2').dom.value;
		n2m_=document.getElementById('txtN2m').innerHTML;//Ext.get('txtN2m').dom.value;
		n3_=document.getElementById('txtN3').innerHTML;//Ext.get('txtN3').dom.value;
		n3m_=document.getElementById('txtN3m').innerHTML;//Ext.get('txtN3m').dom.value;
		n4_=document.getElementById('txtN4').innerHTML;//Ext.get('txtN4').dom.value;
		n4m_=document.getElementById('txtN4m').innerHTML;//Ext.get('txtN4m').dom.value;
		n5_=document.getElementById('txtN5').innerHTML;//Ext.get('txtN5').dom.value;
		n5m_=document.getElementById('txtN5m').innerHTML;//Ext.get('txtN5m').dom.value;
		n6_=document.getElementById('txtN6').innerHTML;//Ext.get('txtN6').dom.value;
		n6m_=document.getElementById('txtN6m').innerHTML;//Ext.get('txtN6m').dom.value;
		precio_=document.getElementById('lblPrecio').innerHTML;//Ext.get('lblPrecio').dom.innerHTML;
		//pares_=Ext.get('txtTotalN').dom.value;
		

		
		var arrayItemCarrito=new Array();
		
		arrayItemCarrito.push(corrida);
		arrayItemCarrito.push(cantCorrida);
		arrayItemCarrito.push(n2_);
		arrayItemCarrito.push(n2m_);
		arrayItemCarrito.push(n3_);
		arrayItemCarrito.push(n3m_);
		arrayItemCarrito.push(n4_);
		arrayItemCarrito.push(n4m_);
		arrayItemCarrito.push(n5_);
		arrayItemCarrito.push(n5m_);
		arrayItemCarrito.push(n6_);
		arrayItemCarrito.push(n6m_);
		arrayItemCarrito.push(pares_);		
		arrayItemCarrito.push(precio_);
		
		arrayElementsSelected.push(arrayItemCarrito);
		cargarCorridas();
		
	}
	function cargarDatosACarro(){
		var strArrayCarro="";
		var tam=document.getElementById('lblCantTotal').innerHTML;
		if(parseInt(document.getElementById('lblTotal_').innerHTML)>0){
			idCliente=document.getElementById('idCliente').innerHTML;
			idEstilo=document.getElementById('idEstiloPed').innerHTML;
			precio=document.getElementById('lblPrecio').innerHTML;
			
			var cants=0;
			for(i=1;i<=tam;i++){

				if(parseInt(document.getElementById('Total'+i).innerHTML)>0){
					
					var clave = document.getElementById('clave_'+i).innerHTML;
					var cantidad = document.getElementById('cantidad'+i).value;
					var N2 = document.getElementById('N2_'+i).innerHTML;
					var N2m = document.getElementById('N2m_'+i).innerHTML;
					var N3 = document.getElementById('N3_'+i).innerHTML;
					var N3m = document.getElementById('N3m_'+i).innerHTML;
					var N4 = document.getElementById('N4_'+i).innerHTML;
					var N4m = document.getElementById('N4m_'+i).innerHTML;
					var N5 = document.getElementById('N5_'+i).innerHTML;
					var N5m = document.getElementById('N5m_'+i).innerHTML;
					var N6 = document.getElementById('N6_'+i).innerHTML;
					var N6m = document.getElementById('N6m_'+i).innerHTML;
					var lblTotal_ = document.getElementById('pares_'+i).innerHTML;
					strArrayCarro=strArrayCarro +"]"+clave+";"+cantidad+";"+N2+";"+N2m+";"+N3+";"+N3m+";"+N4+";"+N4m+";"+N5+";"+N5m+";"+N6+";"+N6m+";"+lblTotal_;
					cants++;
				}
			}
			//cants=document.getElementById('cantidad').innerHTML;
			llamarasincrono('registra_carrito_detalle_pedido.php?idCliente='+idCliente+'&idEstilo='+ idEstilo +'&precio='+precio+'&datosCarro='+strArrayCarro,'cuadroresumen');
			
		}
		else
		{
			alert("Debe seleccionar al menos una numeracion de la lista");
		}
		
			
	}
	function cargarDatosACarroSinClaves(){
		var strArrayCarro="";
		
		var elementosDesplegados=document.getElementById('elementosDesplegados').innerHTML;
		
		idTienda=document.getElementById('divSistemalblIdTienda').innerHTML;
		if(idTienda!=""){
		seccionCatalogo=document.getElementById('lblTipoCatalogoMostrado').innerHTML;
		for(i=0;i<parseInt(elementosDesplegados);i++){
			
			var chkSel = false;
			chkSel=document.getElementById('chk-'+i).checked;
			
			
			if(chkSel){
				
				var idEstilo = 	document.getElementById('idEstiloSel'+i).innerHTML;
				
				//alert(buscaEstiloEnCarro(idEstilo));
				if(!buscaEstiloEnCarro(idEstilo)){
					
					precio=document.getElementById('precioSel'+i).innerHTML;
					
					llamarasincrono('carrito/registra_carrito_detalle_pedido_sin_clave.php?idTienda='+idTienda+'&idEstilo='+ idEstilo +'&precio='+precio+'&seccionCatalogo='+seccionCatalogo,'cuadroresumen');
					document.getElementById('chk-'+i).checked=false;
				}
				else
				{
					i=elementosDesplegados;
					alert("El estilo ya se encuentra en el carrito");
				}
			}
			
		}
		
			
		setTimeout("cargarDatosCarrito("+idTienda+")", 2000);
		setTimeout("cargarElementosEnCarro()",'3000');
		
	
		
		}
		else{
			alert("Debe seleccionar una tienda");	
		}
	}
	
	function cargarCombosFiltro(idPlantilla){
		var tipoCatalogo=document.getElementById('lblTipoCatalogoMostrado').innerHTML;
		
		//setTimeout("cargarCategoriasCalzado("+idPlantilla+",'"+tipoCatalogo+"')",2000);
		setTimeout("cargarLineasGroup("+idPlantilla+",'"+tipoCatalogo+"')",2000);
		setTimeout("cargarMaterial("+idPlantilla+",'"+tipoCatalogo+"')",2000);
		setTimeout("cargarColores("+idPlantilla+",'"+tipoCatalogo+"')",2000);
		setTimeout("cargarEstilosGroup("+idPlantilla+",'"+tipoCatalogo+"')",2000);
		
		setTimeout("cargarEstilosTotalNC();","2000");
		setTimeout("cargarEstilosTotal();",2000);

	}
	
	function pedidoCapturadoCompleto(){

		contElementosEnCarro =document.getElementById('contElementosEnCarro').innerHTML; 
		var subtotal=0;
		var subtotalPares=0;
		var completo=true;
		if(contElementosEnCarro>0){
		for(i=1;i<=contElementosEnCarro;i++){
			var valEstilo = parseInt(document.getElementById("index_"+i).innerHTML);
			
			var valorPares = document.getElementById('Importe_'+valEstilo).innerHTML;
			if(valorPares==0){
				completo=false;
			}
		}
		}
		else
		{
			completo=false;
		}
		return completo;
		
	}
	function cargarDatosCarrito(idTienda){
//		alert(document.getElementById('lblTipoCatalogoMostrado').innerHTML);
			//llamarasincrono('getDataCarrito.php?idCliente='+idCliente,'cuadroresumen');
			seccionCatalogo = document.getElementById('lblTipoCatalogoMostrado').innerHTML;
			llamarasincrono('carrito/carrito_diseno2.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML+'&seccionCatalogo='+seccionCatalogo,'cuadroresumen');
			
	}
	function cambiarASugerencias(){
			document.getElementById('lblTipoCatalogoMostrado').innerHTML="Sugerencias";
			document.getElementById('lblTituloSeccionActiva').innerHTML="Sugerencias";
			document.getElementById('cuadroEstilo').innerHTML="";
			//document.getElementById('divSugerencias').style.background="#F92";
			document.getElementById('divSugerencias').style.backgroundImage="url('carrito/img/boton-sistemas.jpg')";
			
			document.getElementById('divInventario').style.backgroundImage="";
			document.getElementById('divMuestrario').style.backgroundImage="";
			cargarFiltros();
	//		document.getElementById('divMuestrario').style.visibility="";
//			document.getElementById('divSugerencias').style.visibility="";
			//cargarEstilosTotal();
			cargarCrearPedido(document.getElementById('divSistemalblIdCliente').innerHTML);
			llamarasincrono('carrito/carrito_diseno2.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML+'&seccionCatalogo=Sugerencias','cuadroresumen');
			//alert(document.getElementById('lblTipoCatalogoMostrado').innerHTML);
	}
	function cambiarAInventario(){
			document.getElementById('lblTipoCatalogoMostrado').innerHTML="Inventario";

			document.getElementById('divSugerencias').style.backgroundImage="";

			document.getElementById('divInventario').style.backgroundImage="url('carrito/img/boton-sistemas.jpg')";
			document.getElementById('divMuestrario').style.backgroundImage="";
			
			document.getElementById('cuadroEstilo').innerHTML="";
			cargarFiltros();
			
			cargarEstilosTotal();
			llamarasincrono('carrito/carrito_diseno2.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML+'&seccionCatalogo=Inventario','cuadroresumen');
			
			//alert(document.getElementById('lblTipoCatalogoMostrado').innerHTML);
	}
	function cambiarAMuestrario(){
			document.getElementById('lblTipoCatalogoMostrado').innerHTML="Muestrario";
			document.getElementById('lblTituloSeccionActiva').innerHTML="Muestrario";
			document.getElementById('divSugerencias').style.backgroundImage="";
			document.getElementById('divInventario').style.backgroundImage="";
			document.getElementById('divMuestrario').style.backgroundImage="url('carrito/img/boton-sistemas.jpg')";;
			/*document.getElementById('divMuestrario').style.visibility="";
			document.getElementById('divSugerencias').style.visibility="";*/
			document.getElementById('cuadroEstilo').innerHTML="";
			cargarFiltros();
			cargarEstilosTotal();
			llamarasincrono('carrito/carrito_diseno2.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML+'&seccionCatalogo=Muestrario','cuadroresumen');
			//alert(document.getElementById('lblTipoCatalogoMostrado').innerHTML);
	}
	function cambiarIntranetNC(){
		
			document.getElementById('lblTipoCatalogoMostrado').innerHTML="IntranetNC";
			document.getElementById('lblTituloSeccionActiva').innerHTML="IntranetNC";
			
	
			document.getElementById('cuadroEstilo').innerHTML="";
			cargarFiltrosNC();
			cargarEstilosTotalNC();
			llamarasincrono('carrito/carrito_diseno2.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML+'&seccionCatalogo=Muestrario','cuadroresumen');
			//alert(document.getElementById('lblTipoCatalogoMostrado').innerHTML);
	}
	function cargarCorridas(){
		
		var tamCantCorridas=arrayElementsSelected.length;
		var strHTMLCarCorr="";
		
		llamarasincrono('getDatosClavesPedido.php','divDatosCarro');
		
		var aCarrito = document.getElementById('divDatosCarro').innerHTML;
		
		llenaCarrito(aCarrito);
		strHTMLCarCorr=aCarrito;
		
		strHTMLCarCorr +="<table width=\"404\" border=\"1\" bordercolordark=\"#FFFFFF\" bordercolorlight=\"#FFFFFF\" bordercolor=\"#CCCCCC\" cellspacing=\"0\">";
		var granTotal=0;
		var subtotal_n2=0;
		var	subtotal_n2m=0;
		var	subtotal_n3=0;
		var	subtotal_n3m=0;
		var	subtotal_n4=0;
		var	subtotal_n4m=0;
		var	subtotal_n5=0;
		var	subtotal_n5m=0;
		var	subtotal_n6=0;
		var	subtotal_n6m=0;
		var subtotal_cantCorr=0;
		var subtotal_pares=0;
		for(i=0;i<tamCantCorridas;i++){
			var arrayItem = new Array();
			arrayItem=arrayElementsSelected[i];
			corrida=arrayItem[0];
			cantCorrida=arrayItem[1];
			n2_=arrayItem[2];
			n2m_=arrayItem[3];
			n3_=arrayItem[4];
			n3m_=arrayItem[5];
			n4_=arrayItem[6];
			n4m_=arrayItem[7];
			n5_=arrayItem[8];
			n5m_=arrayItem[9];
			n6_=arrayItem[10];
			n6m_=arrayItem[11];
			precio_=arrayItem[13];
			pares_=arrayItem[12];
			var	subtotal=0;

			subtotal+=precio_*pares_;
			strHTMLCarCorr +="<tr>";
			strHTMLCarCorr +="<td>"+ corrida +"</td>";
			strHTMLCarCorr +="<td>"+ cantCorrida +"</td>";
			strHTMLCarCorr +="<td>"+ n2_ +"</td>";
			strHTMLCarCorr +="<td>"+ n2m_ +"</td>";
			strHTMLCarCorr +="<td>"+ n3_ +"</td>";
			strHTMLCarCorr +="<td>"+ n3m_ +"</td>";
			strHTMLCarCorr +="<td>"+ n4_ +"</td>";
			strHTMLCarCorr +="<td>"+ n4m_ +"</td>";
			strHTMLCarCorr +="<td>"+ n5_ +"</td>";
			strHTMLCarCorr +="<td>"+ n5m_ +"</td>";
			strHTMLCarCorr +="<td>"+ n6_ +"</td>";
			strHTMLCarCorr +="<td>"+ n6m_ +"</td>";
			strHTMLCarCorr +="<td>"+ pares_ +"</td>";
			strHTMLCarCorr +="<td>"+ subtotal +"</td>";
			strHTMLCarCorr +="</tr>";
			granTotal+=subtotal;
			subtotal_cantCorr+=parseInt(cantCorrida);
			subtotal_n2+=parseInt(n2_);
			subtotal_n2m+=parseInt(n2m_);
			subtotal_n3+=parseInt(n3_);
			subtotal_n3m+=parseInt(n3m_);
			subtotal_n4+=parseInt(n4_);
			subtotal_n4m+=parseInt(n4m_);
			subtotal_n5+=parseInt(n5_);
			subtotal_n5m+=parseInt(n5m_);
			subtotal_n6+=parseInt(n6_);
			subtotal_n6m+=parseInt(n6m_);
			subtotal_pares+=parseInt(pares_);
			
			
		}
		strHTMLCarCorr +="</table>"; /***/
		
		
		document.getElementById('gridContenido').innerHTML=strHTMLCarCorr; //Ext.get('gridContenido').dom.innerHTML=strHTMLCarCorr;
		document.getElementById('sum_CantCorr').innerHTML=subtotal_cantCorr; //Ext.get('sum_CantCorr').dom.innerHTML=subtotal_cantCorr;
		document.getElementById('sum_n2').innerHTML=subtotal_n2;//  Ext.get('sum_n2').dom.innerHTML=subtotal_n2;
		document.getElementById('sum_n2m').innerHTML=subtotal_n2m//Ext.get('sum_n2m').dom.innerHTML=subtotal_n2m;
		document.getElementById('sum_n3').innerHTML=subtotal_n3;//Ext.get('sum_n3').dom.innerHTML=subtotal_n3;
		document.getElementById('sum_n3m').innerHTML=subtotal_n3m;//Ext.get('sum_n3m').dom.innerHTML=subtotal_n3m;
		document.getElementById('sum_n4').innerHTML=subtotal_n4;//Ext.get('sum_n4').dom.innerHTML=subtotal_n4;
		document.getElementById('sum_n4m').innerHTML=subtotal_n4m;//Ext.get('sum_n4m').dom.innerHTML=subtotal_n4m;
		document.getElementById('sum_n5').innerHTML=subtotal_n5;//Ext.get('sum_n5').dom.innerHTML=subtotal_n5;
		document.getElementById('sum_n5m').innerHTML=subtotal_n5m;//Ext.get('sum_n5m').dom.innerHTML=subtotal_n5m;
		document.getElementById('sum_n6').innerHTML=subtotal_n6;//Ext.get('sum_n6').dom.innerHTML=subtotal_n6;
		document.getElementById('sum_n6m').innerHTML=subtotal_n6m;//Ext.get('sum_n6m').dom.innerHTML=subtotal_n6m;
		document.getElementById('sum_pares').innerHTML=subtotal_pares;//Ext.get('sum_pares').dom.innerHTML=subtotal_pares;
		document.getElementById('sum_total').innerHTML=granTotal;//Ext.get('sum_total').dom.innerHTML=granTotal;
		
		
			
		
	}
	function cargaCarrito(){
		
		
		divSessionId=document.getElementById('divSessionId').innerHTML;//Ext.get('divSessionId').dom.innerHTML;
		//llamarasincrono('getDataCarrito.php?sessionId='+divSessionId,'divDatosCarro');
		llamarasincrono('carrito_diseno2.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML,'cuadroresumen');
		var arrayPrin = document.getElementById('divDatosCarro').innerHTML.split('#');
		var aCarrito=arrayPrin[0].split(',');
		document.getElementById('tamElementsCarrito').innerHTML=arrayPrin[1]; //Ext.get('tamElementsCarrito').dom.innerHTML = arrayPrin[1];
		document.getElementById('cuadroresumen').innerHTML=llenaCarrito(aCarrito);//Ext.get('cuadroresumen').dom.innerHTML= llenaCarrito(aCarrito);
	
		
			
	}
	function eliminarElementosCarrito(idTienda){
		var tamCarrito=document.getElementById('lblCantidadEnCarrito').innerHTML;
		var strElementosSeleccionados="";
		var conteo=0;
		for (i=0;i<tamCarrito;i++){
			var index=i+1;
			if(document.getElementById('chk'+index).checked){
				strElementosSeleccionados= strElementosSeleccionados + document.getElementById('carroIdEstilo'+index).innerHTML+";";
				llamarasincrono('carrito/eliminarElementosCarroPorIdEstilo.php?idTienda='+idTienda+'&idEstilo='+document.getElementById('carroIdEstilo'+index).innerHTML+'&seccionCatalogo='+document.getElementById('lblTipoCatalogoMostrado').innerHTML,'divDatosCarro');
				conteo++;
			}
		}	
		if(conteo==tamCarrito){
			llamarasincrono('carrito/eliminarElementosCarroidEstiloLimpia.php?idTienda='+idTienda+'&seccionCatalogo='+document.getElementById('lblTipoCatalogoMostrado').innerHTML,'divDatosCarro');
		}
		
		
		setTimeout("cargarDatosCarrito("+idTienda+")", 2000);
		setTimeout("cargarElementosEnCarro()",'2000');

//		cargarDatosCarrito(idCliente);
	}
	function eliminarElementosCarritoAll(idTienda){
		var tamCarrito=document.getElementById('lblCantidadEnCarrito').innerHTML;
		var strElementosSeleccionados="";
		for (i=0;i<tamCarrito;i++){
			var index=i+1;
			
				strElementosSeleccionados= strElementosSeleccionados + document.getElementById('carroIdEstilo'+index).innerHTML+";";
			
		}		
		llamarasincrono('carrito/eliminarElementosCarro.php?idTienda='+idTienda+'&elementosEliminados='+strElementosSeleccionados+'&seccionCatalogo='+document.getElementById('lblTipoCatalogoMostrado').innerHTML,'divDatosCarro');
		setTimeout("cargarDatosCarrito("+idTienda+")", 1000);
		setTimeout("cargarElementosEnCarro()",'2000');

//		cargarDatosCarrito(idCliente);
	}
	function buscaEstiloEnCarro(idEstilo){
		var tamCarrito=document.getElementById('lblCantidadEnCarrito').innerHTML;
		//alert(tamCarrito);
		var strElementosSeleccionados="";
		
		var cicloTamCarrito=0;
		cicloTamCarrito=parseInt(tamCarrito);
		for (j=0;j<cicloTamCarrito;j++){
			var index=j+1;
			//alert("<" + document.getElementById('carroIdEstilo'+index).innerHTML + "> = <" + idEstilo.trim() + ">");
			if(document.getElementById('carroIdEstilo'+index).innerHTML==idEstilo.trim()){
				return true;
			}
		}
		return false;
		
	}
	
	
	function crearPedido(idTienda){
	 if(document.getElementById('txtPedido').value !=""){
	  if(confirm("Confirma el registro del pedido S/N?")){
		if(pedidoCapturadoCompleto()){
		var N2=0;
		var N2m=0;
		var N3=0;
		var N3m=0;
		var N4=0;
		var N4m=0;
		var N5=0;
		var N5m=0;
		var N6=0;
		var N6m=0;
		var pares=0;
		var paq=0;
		var canti=0;
		var precio=0;
		var importe=0;
		var datos="";

		
		contElementosEnCarro =document.getElementById('contElementosEnCarro').innerHTML; 
		
		var subtotal=0;
		var subtotalPares=0;
		for(i=1;i<=contElementosEnCarro;i++){
			var valEstilo = parseInt(document.getElementById("index_"+i).innerHTML);
			var valor = document.getElementById('lblImporte_'+valEstilo).innerHTML;
			var valorPares = document.getElementById('Importe_'+valEstilo).innerHTML;
			subtotalPares+=parseInt(valorPares);
			subtotal+=parseInt(valor);
			
			var paq=0, cantPaq=0, n2_=0, n2m_=0, n3_=0, n3m_=0, n4_=0, n4m_=0, n5_=0, n5m_=0, n6_=0, n6m_=0,precio_=0, pares_=0;
			
			paq=document.getElementById('comboPaq_'+valEstilo).value;
			cantPaq=document.getElementById('comboCant_'+valEstilo).value;
			
			n2_=document.getElementById('SN2_'+valEstilo).innerHTML;
			n2m_=document.getElementById('SN2m_'+valEstilo).innerHTML;
			n3_=document.getElementById('SN3_'+valEstilo).innerHTML;
			n3m_=document.getElementById('SN3m_'+valEstilo).innerHTML;
			n4_=document.getElementById('SN4_'+valEstilo).innerHTML;
			n4m_=document.getElementById('SN4m_'+valEstilo).innerHTML;
			n5_=document.getElementById('SN5_'+valEstilo).innerHTML;
			n5m_=document.getElementById('SN5m_'+valEstilo).innerHTML;
			n6_=document.getElementById('SN6_'+valEstilo).innerHTML;
			n6m_=document.getElementById('SN6m_'+valEstilo).innerHTML;
			
			precio_=document.getElementById('lblPrecio_'+valEstilo).innerHTML;
			importe_=document.getElementById('lblImporte_'+valEstilo).innerHTML;
			datos=datos + valEstilo + "," + paq + "," + cantPaq + "," + n2_ + "," + n2m_ + "," + n3_ + "," + n3m_ + "," + n4_ + "," + n4m_ + "," + n5_ + "," + n5m_ + "," + n6_ + "," + n6m_ + "," + valor + ","  + valorPares + ","  + precio_ + ","  + importe_ + ";";
			
		}
		document.getElementById('TotalPares').innerHTML=parseInt(subtotalPares);
		document.getElementById('SubtotalImporte').innerHTML=parseInt(subtotal);
		idUsuario = document.getElementById('idUsuario').innerHTML;
		
		//llamarasincrono("carrito/crear_pedido.php?idTienda="+idTienda+"&sitioPedido=Web&idVendedor="+ idUsuario +"&TotalPares="+document.getElementById('TotalPares').innerHTML+"&subtotal="+document.getElementById('SubtotalImporte').innerHTML+"&datos="+datos+'&seccionCatalogo='+document.getElementById('lblTipoCatalogoMostrado').innerHTML,"tagInfo");
		sitioPedido="Web";
		idVendedor= idUsuario ;
		TotalPares=document.getElementById('TotalPares').innerHTML;
		subtotal=document.getElementById('SubtotalImporte').innerHTML;
		datos=datos;
		
		txtPedidoCargo=document.getElementById('txtPedido').value;
		comboLugarPedido=document.getElementById('comboLugarPedido').value;
		
		seccionCatalogo=document.getElementById('lblTipoCatalogoMostrado').innerHTML;
		
		$.post("carrito/crear_pedido.php",
		   {idTienda:idTienda,sitioPedido:sitioPedido,idVendedor:idVendedor,TotalPares:TotalPares,subtotal:subtotal,datos:datos,seccionCatalogo:seccionCatalogo,txtPedidoCargo:txtPedidoCargo,comboLugarPedido:comboLugarPedido },
			function(data2){
				if(confirm(" No pedido : ["+data2+"], ¿ Desea imprimir el pedido ? ../hoja_pedido_impresion.php?idPedido="+data2+"&idTienda="+idTienda+"" )){
					
						window.open('hoja_pedido_impresion.php?idPedido='+data2+'&idTienda='+idTienda+'','_blank');
//						window.open('hoja_pedido_impresion.php?idTienda='+document.getElementById('divSistemalblIdTienda').innerHTML,'_blank');
						alert("Registro satisfactorio");
				}
				
			}
		);	
		
		
		if(document.getElementById('tagInfo').innerHTML="1"){
			//document.getElementById('cuadroEstilo').innerHTML="<label id='elementosDesplegados' style='display:none'>0</label>";
			document.getElementById('cuadroresumen').innerHTML="<label id='lblCantidadEnCarrito' style='display:none'>0</label>";
			document.getElementById('cuadroEstilo').style.visibility='visible';
			document.getElementById('cuadroEstilo2').style.visibility='hidden';
			document.getElementById('divDatos').style.visibility='hidden';
			
		}
		else{
			alert("Verifique los datos");
		}
		}
		else{
			alert("Debe completar las cantidades para cada estilo pedido ");	
		}
	  }
	  else{
	  	alert("Registro cancelado");
	  }
	}
	else{
		alert("Registra el nombre del comprador")	
	}
  	}
	function crearPedidoCarrito(idTienda){
	  if(confirm("Confirma guardar la numeración S/N?")){
		//if(pedidoCapturadoCompleto()){
		var N2=0;
		var N2m=0;
		var N3=0;
		var N3m=0;
		var N4=0;
		var N4m=0;
		var N5=0;
		var N5m=0;
		var N6=0;
		var N6m=0;
		var pares=0;
		var paq=0;
		var canti=0;
		var precio=0;
		var importe=0;
		var datos="";

		
		contElementosEnCarro =document.getElementById('contElementosEnCarro').innerHTML; 
		
		var subtotal=0;
		var subtotalPares=0;
		for(i=1;i<=contElementosEnCarro;i++){
			var valEstilo = parseInt(document.getElementById("index_"+i).innerHTML);
			var valor = document.getElementById('lblImporte_'+valEstilo).innerHTML;
			var valorPares = document.getElementById('Importe_'+valEstilo).innerHTML;
			subtotalPares+=parseInt(valorPares);
			subtotal+=parseInt(valor);
			
			var paq=0, cantPaq=0, n2_=0, n2m_=0, n3_=0, n3m_=0, n4_=0, n4m_=0, n5_=0, n5m_=0, n6_=0, n6m_=0,precio_=0, pares_=0;
			
			paq=document.getElementById('comboPaq_'+valEstilo).value;
			cantPaq=document.getElementById('comboCant_'+valEstilo).value;
			
			n2_=document.getElementById('SN2_'+valEstilo).innerHTML;
			n2m_=document.getElementById('SN2m_'+valEstilo).innerHTML;
			n3_=document.getElementById('SN3_'+valEstilo).innerHTML;
			n3m_=document.getElementById('SN3m_'+valEstilo).innerHTML;
			n4_=document.getElementById('SN4_'+valEstilo).innerHTML;
			n4m_=document.getElementById('SN4m_'+valEstilo).innerHTML;
			n5_=document.getElementById('SN5_'+valEstilo).innerHTML;
			n5m_=document.getElementById('SN5m_'+valEstilo).innerHTML;
			n6_=document.getElementById('SN6_'+valEstilo).innerHTML;
			n6m_=document.getElementById('SN6m_'+valEstilo).innerHTML;
			
			precio_=document.getElementById('lblPrecio_'+valEstilo).innerHTML;
			importe_=document.getElementById('lblImporte_'+valEstilo).innerHTML;
			datos=datos + valEstilo + "," + paq + "," + cantPaq + "," + n2_ + "," + n2m_ + "," + n3_ + "," + n3m_ + "," + n4_ + "," + n4m_ + "," + n5_ + "," + n5m_ + "," + n6_ + "," + n6m_ + "," + valor + ","  + valorPares + ","  + precio_ + ","  + importe_ + ";";
			
		}
		document.getElementById('TotalPares').innerHTML=parseInt(subtotalPares);
		document.getElementById('SubtotalImporte').innerHTML=parseInt(subtotal);
		idUsuario = document.getElementById('idUsuario').innerHTML;
		
		//llamarasincrono("carrito/crear_pedido.php?idTienda="+idTienda+"&sitioPedido=Web&idVendedor="+ idUsuario +"&TotalPares="+document.getElementById('TotalPares').innerHTML+"&subtotal="+document.getElementById('SubtotalImporte').innerHTML+"&datos="+datos+'&seccionCatalogo='+document.getElementById('lblTipoCatalogoMostrado').innerHTML,"tagInfo");
		sitioPedido="Web";
		idVendedor= idUsuario ;
		TotalPares=document.getElementById('TotalPares').innerHTML;
		subtotal=document.getElementById('SubtotalImporte').innerHTML;
		datos=datos;
		
		txtPedidoCargo=document.getElementById('txtPedido').value;
		comboLugarPedido=document.getElementById('comboLugarPedido').value;
		
		seccionCatalogo=document.getElementById('lblTipoCatalogoMostrado').innerHTML;
		
		$.post("carrito/crear_pedido_carrito.php",
		   {idTienda:idTienda,sitioPedido:sitioPedido,idVendedor:idVendedor,TotalPares:TotalPares,subtotal:subtotal,datos:datos,seccionCatalogo:seccionCatalogo,txtPedidoCargo:txtPedidoCargo,comboLugarPedido:comboLugarPedido },
			function(data2){
				alert("Registro de numeracion satisfactoria " );
			}
		);	
		
		
		/*if(document.getElementById('tagInfo').innerHTML="1"){
			document.getElementById('cuadroEstilo').innerHTML="<label id='elementosDesplegados' style='display:none'>0</label>";
			document.getElementById('cuadroresumen').innerHTML="<label id='lblCantidadEnCarrito' style='display:none'>0</label>";
			document.getElementById('cuadroEstilo').style.visibility='visible';
			document.getElementById('cuadroEstilo2').style.visibility='hidden';
			document.getElementById('divDatos').style.visibility='hidden';
			alert("Registro satisfactorio");
		}
		else{
			alert("Verifique los datos");
		}*/
		/*}
		else{
			alert("Debe completar las cantidades para cada estilo pedido ");	
		}*/
	  }
	  else{
	  	alert("Registro cancelado");
	  }
  	}
	function cargarMapa(){
		var map = new google.maps.Map(document.getElementById("map_canvas"), {
        scaleControl: true});
      map.setCenter(new google.maps.LatLng(20.69731,-103.30892));
      map.setZoom(15);
      map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
      var marker = new google.maps.Marker({map: map, position:
        map.getCenter()});
      var infowindow = new google.maps.InfoWindow();
      infowindow.setContent('NewColors');
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });
	}
	function initGoogleMaps() {
		setTimeout("cargarMapa()", 1000);
    }
	function enviar_email(){
		var nombre = "";
		var domicilio ="";
		var pais="";
		var estado="";
		var municipio="";
		var telefono="";
		var email="";
		var observacion=""
		var cp=""
		var colonia="";
		var calle=""
		var idCategoriaContacto="";
		nombre = document.getElementById('txtNombre').value;
		calle = document.getElementById('txtCalle').value;
		colonia = document.getElementById('txtColonia').value;
		pais = document.getElementById('comboPaises').value;
		idEstado = document.getElementById('comboEstados').value;
		idMunicipio = document.getElementById('camboMunicipios').value;
		telefono = document.getElementById('txtTelefono').value;
		email = document.getElementById('txtEmailCliente').value;
		observacion = document.getElementById('txtMensaje').value;	
		idCategoriaContacto=document.getElementById('comboCategoriasContacto').value;	
		cp=document.getElementById('txtCP').value;	
		if(nombre!=""){
			if(calle!=""){
				if(colonia!=""){
					if(idMunicipio!=""){
						if(telefono!=""){
							if(email!=""){
								llamarasincrono('carrito/contacto.php?txtNombre='+nombre+'&txtCalle='+calle+'&txtColonia='+colonia+'&txtCP='+cp+'&txtPais='+pais+'&txtidEstado='+idEstado+'&txtidMunicipio='+idMunicipio+'&txtTelefono='+telefono+'&txtEmailCliente='+email+'&txtMensaje='+observacion+"&idCategoriaContacto="+idCategoriaContacto,'divPrinContacto');								setTimeout("llamarasincrono('divindex.html','contenido');",5000);
								
							}
							else{
								document.getElementById('divErrorEnvioEmail').innerHTML = "Registre el email";	
							}
						}
						else{
							document.getElementById('divErrorEnvioEmail').innerHTML = "Registre el telefono";	
						}
					}
					else{
						document.getElementById('divErrorEnvioEmail').innerHTML = "Registre el municipio";	
					}
				}
				else{
					document.getElementById('divErrorEnvioEmail').innerHTML = "Registre la colonia";	
				}
			}
			else{
				document.getElementById('divErrorEnvioEmail').innerHTML = "Registre la calle";		
			}
		}
		else
		{
			document.getElementById('divErrorEnvioEmail').innerHTML = "Registre el nombre";
		}
		
	}
	function setImagenDetalleEstilo(idEstilo,estilo, material,color, divDestino,precio){
			//var src="../imagenes_system/muestras/grande/" + nameFotoImageGif(estilo,material,color);
			var src="imageresize.php?urlsource=../imagenes_system/muestras/400/$foto&urldestyni=../imagenes_system/muestras/mediano/"+ nameFotoImageGif(estilo,material,color)+" &width=280&height=280&quality=100&urlerror=../imagenes_system/muestras/sinfoto.gif";
			document.getElementById('idEstiloSelDetalle').innerHTML=idEstilo;
			document.getElementById(divDestino).innerHTML="<img width='280' height='280' src='"+ src +"'>";
			document.getElementById('divNomCostDetalle').innerHTML=estilo + " "+ material + " " + color+' $' + precio;
	}
	/******/
	function buscarEstiloDB(){
		var ban=false;
		idEstilo=document.getElementById('txtIdEstilo').value;
		$.get("estilos_ver2/buscarEstilo.php",
				   { idEstilo: idEstilo},
					function(dataDatCli){	
					alert(dataDatCli);
						if(dataDatCli.trim()=="1"){
							ban=true;
							cargarEstiloEnCarroTecleado();
						}
						else{
							alert("Debe registrar un codigo valido");	
						}
					}
				);	
		return ban;
	}
	function cargarEstiloEnCarroTecleado(){
		precio=0
		idTienda=document.getElementById('divSistemalblIdTienda').innerHTML;
		idCliente=document.getElementById('divSistemalblIdCliente').innerHTML;
		idEstilo=document.getElementById('txtIdEstilo').value;
		
		var codigo = idEstilo.substring(0,idEstilo.length-1);
		
		
			seccionCatalogo=document.getElementById('lblTipoCatalogoMostrado').innerHTML;
			if(idTienda!=""){
			if(!buscaEstiloEnCarro(codigo)){
				llamarasincrono('carrito/registra_carrito_detalle_pedido_sin_clave.php?idTienda='+idTienda+'&idEstilo='+ codigo +'&precio='+precio+'&seccionCatalogo='+seccionCatalogo,'cuadroresumen');
				setTimeout("cargarDatosCarrito("+idTienda+")", 2000);
				setTimeout("document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';", 1000);
				document.getElementById('txtIdEstilo').value ="";
				document.getElementById('txtIdEstilo').focus();
				}
			else{
				alert("El Estilo ya se encuentra en el carrito");
				document.getElementById('txtIdEstilo').value ="";
				document.getElementById('txtIdEstilo').focus();
			}
		   }
		   else{
				alert("Seleccione un cliente");   
			}
		
		
	}
	function cargarEstiloEnCarro(){
		precio=document.getElementById('precioEstiloDetalle').innerHTML;
		idTienda=document.getElementById('divSistemalblIdTienda').innerHTML;
		idCliente=document.getElementById('divSistemalblIdCliente').innerHTML;
		idEstilo=document.getElementById('idEstiloSelDetalle').innerHTML;
		seccionCatalogo=document.getElementById('lblTipoCatalogoMostrado').innerHTML;
		if(idTienda!=""){
		if(!buscaEstiloEnCarro(idEstilo)){
			llamarasincrono('carrito/registra_carrito_detalle_pedido_sin_clave.php?idTienda='+idTienda+'&idEstilo='+ idEstilo +'&precio='+precio+'&seccionCatalogo='+seccionCatalogo,'cuadroresumen');
			setTimeout("cargarDatosCarrito("+idTienda+")", 2000);
			setTimeout("document.getElementById('cuadroEstilo').style.visibility='visible';document.getElementById('cuadroEstilo2').style.visibility='hidden';", 1000);
			
			}
		else{
			alert("El Estilo ya se encuentra en el carrito");
		}
	   }
	   else{
			alert("Seleccione un cliente");   
		}
	}
	
	function setImagenDiv(divImg,foto,estilo,material,color,precio,idEstilo,idPlantilla){
		
		document.getElementById(divImg).innerHTML="<div id='divImgEstiloNormal_"+estilo+"'> <div id='divImgEstiloDisplay' onclick=gardarImagenDisplay('"+ idEstilo +"','"+ material +"','"+ color +"','"+ precio +"','"+ idEstilo +"','"+ idPlantilla +"');><img src='../imagenes_system/muestras/normal/"+ foto +"' width='126' height='126' /></div></div>";	
		//document.getElementById(divImg).innerHTML="<div id='divImgEstiloNormal_"+estilo+"'> <div id='divImgEstiloDisplay' onclick=gardarImagenDisplay('"+ estilo +"','"+ material +"','"+ color +"','"+ precio +"','"+ idEstilo +"','"+ idPlantilla +"');><img src='../imagenes_system/muestras/normal/"+ foto +"' width='126' height='126' /></div></div>";	
		document.getElementById('lblPrimerEstilo_'+estilo).innerHTML=estilo+" "+material+" "+color;
		document.getElementById('lblPrimerPrecio_'+estilo).innerHTML=precio;
	}
	
	function gardarImagenDisplay(estilo,material,color,precio,idEstilo,idPlantilla){
		//alert("OK");
			llamarasincrono("carrito/vista_detalle_diseno.php?idPlantilla="+idPlantilla+"&idEstilo="+idEstilo+"&estilo="+estilo+"&material="+material+"&color="+color+"&precio="+precio+"&seccionCatalogo="+document.getElementById('lblTipoCatalogoMostrado').innerHTML,'divPrinEstDise');
			
			
	}
	function organizarVistaDePedidos(idxPedidoSeleccionado){
			document.getElementById('idxPedidoSeleccionado').innerHTML=idxPedidoSeleccionado;
			var cont=document.getElementById("idPedidoExpandido").innerHTML;
			y=0;
			
			for(i=1;i<=cont;i++)
			{
				idPedido=document.getElementById('lblIdxPedidos_'+i).innerHTML;
				idxPedidoSeleccionado= document.getElementById('idxPedidoSeleccionado').innerHTML;
				
				if(idPedido==idxPedidoSeleccionado){
					if(document.getElementById('divPedido'+idPedido).style.height=='200px'){
						organizarVistaDePedidos(0);
					}
					else{
						document.getElementById('divPedido'+idPedido).style.top=y;
						y=y+17;
						document.getElementById('divDetallePedido'+idPedido).style.top='22px';
						document.getElementById('divContPedido'+idPedido).style.top=y+'px';
						
						document.getElementById('divPedido'+idPedido).style.height='200px';
						document.getElementById('divDetallePedido'+idPedido).style.height='170px';
						document.getElementById('divContPedido'+idPedido).style.height='170px';
						y=y+90;
						llamarasincrono('http://localhost/sistema2011/carrito/ver_pedidos_detalles.php?idPedido='+idPedido,'divDetalle_'+idPedido);
					}
				}
				else
				{
					document.getElementById('divPedido'+idPedido).style.top=y+'px';
					y=y+17;
					document.getElementById('divDetallePedido'+idPedido).style.top=y+'px';
					document.getElementById('divContPedido'+idPedido).style.top=y+'px';
					
					document.getElementById('divPedido'+idPedido).style.height='20px';
					document.getElementById('divDetallePedido'+idPedido).style.height='0px';
					document.getElementById('divContPedido'+idPedido).style.height='0px';
					
				}
			}
			 
	}
	function isDate(dateStr) {

		var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
		var matchArray = dateStr.match(datePat); // is the format ok?
		alert(dateStr);
		if (matchArray == null) {
		alert("Please enter date as either mm/dd/yyyy or mm-dd-yyyy.");
		return false;
		}
		
		month = matchArray[3]; // p@rse date into variables
		day = matchArray[1];
		year = matchArray[5];
		
		if (month < 1 || month > 12) { // check month range
		alert("Month must be between 1 and 12.");
		return false;
		}
		
		if (day < 1 || day > 31) {
		alert("Day must be between 1 and 31.");
		return false;
		}
		
		if ((month==4 || month==6 || month==9 || month==11) && day==31) {
		alert("Month "+month+" doesn`t have 31 days!")
		return false;
		}
		
		if (month == 2) { // check for february 29th
		var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
		if (day > 29 || (day==29 && !isleap)) {
		alert("February " + year + " doesn`t have " + day + " days!");
		return false;
		}
		}
		return true; // date is valid
	}
	
	function verificaPermisoSeccion(idOpcion){
		var arrayPermisos = new Array();
		arrayPermisos = document.getElementById('permisos').innerHTML.split(',');
		var ban = false;
		alert(arrayPermisos.length);
		for (var b=0;b<arrayPermisos.length;b++){
			if(idOpcion == arrayPermisos[b]){
				ban=true;
			}
				
		}
		return ban;
	}
	function cargarFormularioClientes(opcion){
		//llamarasincrono('clientes/registraClientesTienda.php','divPanelAdmContenido');
		
		$.get("clientes/registraClientesTienda.php",
		   {opcion:opcion},
			function(data2){
				$('#divPanelAdmContenido').html(data2); 
				llenar_paises("comboPaisEmpresa","comboEstadoEmpresa","comboMunicipioEmpresa");
				
				llenar_paises("comboPaisTienda","comboEstadoTienda","comboMuncipioTienda");
				llenar_tipo_cliente("comboTipoCliente");
			}
		);	
	}
	function cargarFormularioEstilos(){
		//llamarasincrono('estilos_ver2/estilos_agregar_nuevos.php','divPanelAdmContenido');
		
		$.get("estilos_ver2/estilos_agregar_nuevos.php",
		   {},
			function(data2){
				$('#divPanelAdmContenido').html(data2); 
			
			}
		);	
	}
	function cargarEditorial(){
		
		idx=1;
		$.get("galeria-editorial-completa.php",
		   {idx:idx},
			function(data2){
				$('#divSiguenosPopup').html(data2); 
				
				$(document).ready(function(){							
					$("#large").click(function(){
						$('#divPrGaleriaEditorialCompleta').animate({width: '200%'},1500);
					});
				});
					
				
			}
		);	
	}
	
	function accionOpcionMenu(idOpc){
		switch(idOpc){
			case 1: CatalogosEmpresaMuestrariosSistema();break;
			case 1: CatalogosEmpresaBodegaSistema();break;
			case 1: CatalogosEmpresaProgramacionSistema();break;
			case 1: CatalogosEmpresaSugerenciasSistema();break;
			case 1: SugerenciasNuevaSugerenciaSistema();break;
			case 1: SugerenciasEliminarSistema();break;
			case 1: SugerenciasEditarSistema();break;
			case 1: SugerenciasEnviarSistema();break;
			case 1: ClientesNuevoSistema();break;
			case 1: ClientesEditarSistema();break;
			case 1: ClientesVerClientesSistema();break;
			case 1: ClientesUsuariosPorClienteSistema();break;
			case 1: PedidosPedidosSistema();break;
			case 1: PedidosVerPedidosSistema();break;
			case 1: Contabilidad();break;
			
			
		}
	}
	function enviarsolicitudPW_Upd(){
		correo=document.getElementById('txtCorreoElectronicoRecPW').value;
		urlRed="";
		$.get('recuperacion_pw/verificaCorreoYEstableRecPW.php',
		   { correo:correo },
			function(data){
				//document.getElementById('divResultadoEnvio').innerHTML = data;
				urlRed=data;

				if(urlRed!="InvalidEmail"){
					$.get(urlRed,
					   {  },
						function(data2){
							document.getElementById('divResultadoEnvio').innerHTML = data2;
	
						}
					);
					document.getElementById('divResultadoEnvio').innerHTML = "Un mensaje ha sido enviado a su correo electronico <br> confirme la solicitud ";
				}
				else{
					document.getElementById('divResultadoEnvio').innerHTML = "El correo electronico no se encuentra en la base de datos";	
				}
			}
		);	
		
	}
	function guardar_pw_recuperacion(idUsuarioWeb){
		passw=document.getElementById('txtPassRecuperacion').value;
		passwConf=document.getElementById('txtPassRecuperacion2').value;
		
		$.get('recuperacion_pw/guardarContrasena.php',
		   {idUsuarioWeb:idUsuarioWeb, passw:passw ,passwConf:passwConf},
			function(data){
				
				document.getElementById('divLoginContent').innerHTML = data;
			}
		);	
	}
	function cargarOlvideContrasena(){
		$.get('recuperacion_pw/enviarSolicitudRecuperacionPw.php',
		   {},
			function(data){
				
				document.getElementById('divLoginContent').innerHTML = data;
			}
		);		
	}
	function incrementeNum(lblNum){
		var objetoLbl = document.getElementById(lblNum).innerHTML;	
		var num =0;
		num = parseInt(objetoLbl);
		num= num+1;
		document.getElementById(lblNum).innerHTML=num;
		sumatoria();
	}
	function decrementeNum(lblNum){
		var objetoLbl = document.getElementById(lblNum).innerHTML;	
		var num =0;
		num = parseInt(objetoLbl);
		num= num-1;
		if(num<0)
			num=0;
		document.getElementById(lblNum).innerHTML=num;
		sumatoria();
	}
	function sumatoria(){
		
		var suma=0;
		suma += parseInt(document.getElementById('lblNP_N2').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N2m').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N3').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N3m').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N4').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N4m').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N5').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N5m').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N6').innerHTML);
		suma += parseInt(document.getElementById('lblNP_N6m').innerHTML);
		document.getElementById('lblNP_Pares').innerHTML = suma;
		var precio = document.getElementById('lblPrecioNumPer').innerHTML
		var importe=suma * precio;
		document.getElementById('lblTotalNumPer').innerHTML = importe;
		
	}
	
	function IsNumeric(sText,decimals,negatives) {
		var isNumber=true;
		var numDecimals = 0;
		var validChars = "0123456789";
		if (decimals)  validChars += ".";
		if (negatives) validChars += "-";
		var thisChar;
		for (i = 0; i < sText.length && isNumber == true; i++) {  
			thisChar = sText.charAt(i); 
			if (negatives && thisChar == "-" && i > 0) isNumber = false;
			if (decimals && thisChar == "."){
				numDecimals = numDecimals + 1;
				if (i==0 || i == sText.length-1) isNumber = false;
				if (numDecimals > 1) isNumber = false;
			}
			if (validChars.indexOf(thisChar) == -1) isNumber = false;
		}
		return isNumber;
	}
	function validaAcero(datos){
		if(document.getElementById(datos).value=="" || ! IsNumeric(document.getElementById(datos).value)){
				document.getElementById(datos).value = "0";
		}
		
	}
	function sumatoriaNumPersTeclada(){
		
		
		
		
		var suma=0;
		if(IsNumeric(document.getElementById('txtTecN2').value) &&  IsNumeric(document.getElementById('txtTecN2m').value) && IsNumeric(document.getElementById('txtTecN3').value) &&  IsNumeric(document.getElementById('txtTecN3m').value) && IsNumeric(document.getElementById('txtTecN4').value) &&  IsNumeric(document.getElementById('txtTecN4m').value) && 	IsNumeric(document.getElementById('txtTecN5').value) &&  IsNumeric(document.getElementById('txtTecN5m').value) && IsNumeric(document.getElementById('txtTecN6').value) &&  IsNumeric(document.getElementById('txtTecN6m').value) ){
			var n2=0;
			var n2m=0;
			var n3=0;
			var n3m=0;
			var n4=0;
			var n4m=0;
			var n5=0;
			var n5m=0;
			var n6=0;
			var n6m=0;
			
			if(IsNumeric(document.getElementById('txtTecN2').value) && document.getElementById('txtTecN2').value!=""){
				n2=parseInt(document.getElementById('txtTecN2').value);
			}
			if(IsNumeric(document.getElementById('txtTecN2m').value) &&  document.getElementById('txtTecN2m').value!="" ){
				n2m=parseInt(document.getElementById('txtTecN2m').value);
			}
			if(IsNumeric(document.getElementById('txtTecN3').value) && document.getElementById('txtTecN3').value!=""){
				n3=parseInt(document.getElementById('txtTecN3').value);
			}
			if(IsNumeric(document.getElementById('txtTecN3m').value) && document.getElementById('txtTecN3m').value!=""){
				n3m=parseInt(document.getElementById('txtTecN3m').value);
			}
			if(IsNumeric(document.getElementById('txtTecN4').value) && document.getElementById('txtTecN4').value!=""){
				n4=document.getElementById('txtTecN4').value;
			}
			if(IsNumeric(document.getElementById('txtTecN4m').value) && document.getElementById('txtTecN4m').value!=""){
				n4m=parseInt(document.getElementById('txtTecN4m').value);
			}
			if(IsNumeric(document.getElementById('txtTecN5').value) && document.getElementById('txtTecN5').value!=""){
				n5=parseInt(document.getElementById('txtTecN5').value);
			}
			if(IsNumeric(document.getElementById('txtTecN5m').value) && document.getElementById('txtTecN5m').value!=""){
				n5m=document.getElementById('txtTecN5m').value;
			}
			if(IsNumeric(document.getElementById('txtTecN6').value) && document.getElementById('txtTecN6').value!=""){
				n6=parseInt(document.getElementById('txtTecN6').value);
			}
			if(IsNumeric(document.getElementById('txtTecN6m').value) && document.getElementById('txtTecN6m').value!=""){
				n6m=parseInt(document.getElementById('txtTecN6m').value);
			}
			
			suma += parseInt(n2);
			suma += parseInt(n2m);
			suma += parseInt(n3);
			suma += parseInt(n3m);
			suma += parseInt(n4);
			suma += parseInt(n4m);
			suma += parseInt(n5);
			suma += parseInt(n5m);
			suma += parseInt(n6);
			suma += parseInt(n6m);
			
			document.getElementById('lblParesNumPerTeclada').innerHTML = suma;
			document.getElementById('lblParesNumPerTeclada').innerHTML = suma;
			var precio = document.getElementById('lblPrecioNumPer').innerHTML
			var importe=suma * precio;
			document.getElementById('lblTotalNumPerTeclada').innerHTML = importe;
		}
		else{
			alert("Los datos deben ser numericos");	
		}
	}
	function vaciarNumeracionPersonalizada(idEstiloSel){
		
			document.getElementById('SN2_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N2').innerHTML;
			document.getElementById('SN2m_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N2m').innerHTML;
			document.getElementById('SN3_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N3').innerHTML;
			document.getElementById('SN3m_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N3m').innerHTML;
			document.getElementById('SN4_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N4').innerHTML;
			document.getElementById('SN4m_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N4m').innerHTML;
			document.getElementById('SN5_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N5').innerHTML;
			document.getElementById('SN5m_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N5m').innerHTML;
			document.getElementById('SN6_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N6').innerHTML;
			document.getElementById('SN6m_'+idEstiloSel).innerHTML =document.getElementById('lblNP_N6m').innerHTML;
			document.getElementById('Importe_'+idEstiloSel).innerHTML = document.getElementById('lblNP_Pares').innerHTML;
			document.getElementById('lblImporte_'+idEstiloSel).innerHTML = document.getElementById('lblTotalNumPer').innerHTML;
	}
	function vaciarNumeracionPersonalizadaTecleada(idEstiloSel){
			

			
			document.getElementById('SN2_'+idEstiloSel).innerHTML =document.getElementById('txtTecN2').value;
			document.getElementById('SN2m_'+idEstiloSel).innerHTML =document.getElementById('txtTecN2m').value;
			document.getElementById('SN3_'+idEstiloSel).innerHTML =document.getElementById('txtTecN3').value;
			document.getElementById('SN3m_'+idEstiloSel).innerHTML =document.getElementById('txtTecN3m').value;
			document.getElementById('SN4_'+idEstiloSel).innerHTML =document.getElementById('txtTecN4').value;
			document.getElementById('SN4m_'+idEstiloSel).innerHTML =document.getElementById('txtTecN4m').value;
			document.getElementById('SN5_'+idEstiloSel).innerHTML =document.getElementById('txtTecN5').value;
			document.getElementById('SN5m_'+idEstiloSel).innerHTML =document.getElementById('txtTecN5m').value;
			document.getElementById('SN6_'+idEstiloSel).innerHTML =document.getElementById('txtTecN6').value;
			document.getElementById('SN6m_'+idEstiloSel).innerHTML =document.getElementById('txtTecN6m').value;

			if(document.getElementById('SN2_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN2_'+idEstiloSel).innerHTML = 0;
			}
			if(document.getElementById('SN2m_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN2m_'+idEstiloSel).innerHTML = 0;
			}

			if(document.getElementById('SN3_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN3_'+idEstiloSel).innerHTML = 0;
			}
			if(document.getElementById('SN3m_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN3m_'+idEstiloSel).innerHTML = 0;
			}
			
			if(document.getElementById('SN4_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN4_'+idEstiloSel).innerHTML = 0;
			}
			if(document.getElementById('SN4m_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN4m_'+idEstiloSel).innerHTML = 0;
			}
			
			if(document.getElementById('SN5_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN5_'+idEstiloSel).innerHTML = 0;
			}
			if(document.getElementById('SN5m_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN5m_'+idEstiloSel).innerHTML = 0;
			}
			
			if(document.getElementById('SN6_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN6_'+idEstiloSel).innerHTML = 0;
			}
			if(document.getElementById('SN6m_'+idEstiloSel).innerHTML==""){
					document.getElementById('SN6m_'+idEstiloSel).innerHTML = 0;
			}


			document.getElementById('Importe_'+idEstiloSel).innerHTML = document.getElementById('lblParesNumPerTeclada').innerHTML;
			document.getElementById('lblImporte_'+idEstiloSel).innerHTML = document.getElementById('lblTotalNumPerTeclada').innerHTML;
	}
	function activarVentanaDeNumeracion(){
		if(document.getElementById('radioTouch').checked){
				document.getElementById('divFormNumeracionPersonalizada').style.display="block";
				document.getElementById('divNumPerTec').style.display="none";
				document.getElementById('divFormNumeracionPersonalizada').style.top="30px";
		}
		else{
			document.getElementById('divFormNumeracionPersonalizada').style.display="none";
				document.getElementById('divNumPerTec').style.display="block";
				document.getElementById('divNumPerTec').style.top="30px";
		}
	}
	function llenar_categorias(){
		$.post("getDataJSON.php",
		   { },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo(objJSON2,"comboCategoria","idCatCat","categoria");
				var comboCategoria= document.getElementById("comboCategoria");
				if(comboCategoria.length>0){
					comboCategoria.selectedIndex=0;
					llenar_subcategorias(document.getElementById('comboCategoria').value);
				}
			}
		);	
	}
	function llenar_subcategorias(idCategoria){
		
		$.post("getDataJSONSubCategorias.php?idCategoria="+idCategoria,
		   { },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo(objJSON2,"comboSubcategoria","idSubCat","subcategoria");
				/*var comboPais= document.getElementById(nameComboPais);
				if(comboPais.length>0){
					comboPais.selectedIndex=0;
					llenar_estados(nameComboEstado,comboPais[0].value,nameComboMunicipio);
				}*/
			}
		);	
	}
	function llenar_plantillas(){
		$.post("getDataJSONPlantillas.php",
		   { },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo(objJSON2,"comboPlantillaCatalogo","idPlantilla","plantilla");
				var comboPlantillaCatalogo= document.getElementById("comboPlantillaCatalogo");
				if(comboPlantillaCatalogo.length>0){
					comboPlantillaCatalogo.selectedIndex=0;
					
				}
			}
		);	
	}
	function llena_combo_materiales(linea,idPlantilla){

		$.get("estilos_ver2/getDataJSONMateriales.php",
		   { linea:linea,idPlantilla:idPlantilla },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo_inicializando(objJSON2,"comboMateriales","Material","Material","MATERIALES");
				var combo= document.getElementById("comboMateriales");
				if(combo.length>0){
					combo.selectedIndex=0;
					
				}
			}
		);	
		
	}
	function llena_combo_colores(linea,idPlantilla){
	
		$.get("estilos_ver2/getDataJSONGrupoColores.php",
		   { linea:linea,idPlantilla:idPlantilla },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo_inicializando(objJSON2,"comboColores","color","color","COLORES");
				var combo= document.getElementById("comboColores");
				if(combo.length>0){
					combo.selectedIndex=0;
					
				}
			}
		);	
		
	}
	function llena_combo_estilo(linea,idPlantilla){
	
		$.get("estilos_ver2/getDataJSONEstilo.php",
		   { linea:linea,idPlantilla:idPlantilla },
			function(data2){
				objJSON2= eval('(' + data2 + ')');
				llena_combo_inicializando(objJSON2,"comboGrupoEstilos","estilo","estilo","ESTILOS");
				var combo= document.getElementById("comboGrupoEstilos");
				if(combo.length>0){
					combo.selectedIndex=0;
					
				}
			}
		);	
		
	}
	function guardarCategorias(){
		if(document.getElementById('txtLinea').value!="" && document.getElementById('txtEstilo').value!="" && document.getElementById('txtMaterial').value!="" && document.getElementById('txtColor').value!=""  && document.getElementById('txtPrecio').value!="" ){ 
		if(confirm("¿Esta seguro de realizar registro?")){
				$.post("estilos_ver2/estilos_agregar_nuevos_guardar.php?linea="+document.getElementById('txtLinea').value+"&estilo="+document.getElementById('txtEstilo').value+"&material="+document.getElementById('txtMaterial').value+"&color="+document.getElementById('txtColor').value+"&precio="+document.getElementById('txtPrecio').value+"&descripcion="+document.getElementById('txtDescripcion').value+"&idCategoria="+document.getElementById('comboCategoria').value+"&idSubCat="+document.getElementById('comboSubcategoria').value+"&etiq_dis="+document.getElementById('txtEtiquetaDise').value+"&comboPlantillaCatalogo="+document.getElementById('comboPlantillaCatalogo').value,
				   { },
					function(data2){
						
						objJSON2= eval('(' + data2 + ')');
						
					}
				);	
				alert('Registro satisfactorio');
			}
			else{
				alert("Transaccion no registrada");	
			}
		}
		else{
			alert('Debe registrar todos los datos');
		}
	}
	
	function isEnterPressCodBarras(evt){
		var ban=false;
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if(charCode==13){
			ban=true;
			cargarEstiloEnCarroTecleado();
		}
		return ban;
	} 
		
	function copiarNumeracionATodoPedidos(){
		
		var contElementosEnCarro = document.getElementById('contElementosEnCarro').innerHTML;
		//alert(contElementosEnCarro);
		if(parseInt(contElementosEnCarro) >0 ){
			
			codigo = parseInt(document.getElementById('index_1').innerHTML);
			
			
			N2 =document.getElementById("SN2_"+codigo).innerHTML;
			N2m =document.getElementById('SN2m_'+codigo).innerHTML;
			N3 =document.getElementById('SN3_'+codigo).innerHTML;
			N3m =document.getElementById('SN3m_'+codigo).innerHTML;
			N4 =document.getElementById('SN4_'+codigo).innerHTML;
			N4m =document.getElementById('SN4m_'+codigo).innerHTML;
			N5 =document.getElementById('SN5_'+codigo).innerHTML;
			N5m =document.getElementById('SN5m_'+codigo).innerHTML;
			N6 =document.getElementById('SN6_'+codigo).innerHTML;
			N6m =document.getElementById('SN6m_'+codigo).innerHTML;
			
			importe =document.getElementById('Importe_'+codigo).innerHTML;
			precio =document.getElementById('lblPrecio_'+codigo).innerHTML;
			total =document.getElementById('lblImporte_'+codigo).innerHTML;
			
			for(i=2;i<=parseInt(contElementosEnCarro);i++){
				codigo = parseInt(document.getElementById('index_'+i).innerHTML);
				document.getElementById('SN2_'+codigo).innerHTML=N2; 
				document.getElementById('SN2m_'+codigo).innerHTML=N2m;
				document.getElementById('SN3_'+codigo).innerHTML=N3;
				document.getElementById('SN3m_'+codigo).innerHTML=N3m;
				document.getElementById('SN4_'+codigo).innerHTML=N4;
				document.getElementById('SN4m_'+codigo).innerHTML=N4m;
				document.getElementById('SN5_'+codigo).innerHTML=N5;
				document.getElementById('SN5m_'+codigo).innerHTML=N5m;
				document.getElementById('SN6_'+codigo).innerHTML=N6;
				document.getElementById('SN6m_'+codigo).innerHTML=N6m;
				
				document.getElementById('Importe_'+codigo).innerHTML=importe;
				document.getElementById('lblPrecio_'+codigo).innerHTML=precio;
				document.getElementById('lblImporte_'+codigo).innerHTML=total;
			    var cant = document.getElementById('comboCant_'+codigo).value;
				var clave = document.getElementById('comboPaq_'+codigo).value;
				//posiciona_combo('comboCant_'+codigo,cant);
				//posiciona_combo('comboPaq_'+codigo,clave);
			
			}
			function posiciona_combo(nameCombo,campoText){
			  
			  var combo = document.getElementById(nameCombo);
			  
			  for (var n=0;n<combo.options.length;n++){
		
				if(combo.options[n].innerHTML.toLowerCase()== campoText.toLowerCase()){
									
					combo.options[n].selected = true;
				}  
			  }
			}
			
		}
		calculaSubtotalesNumCrearPedido();
	
	}
	function seleccionarTiendasAClonar(){
		cliente = document.getElementById('divLblClienteNombreTxt').innerHTML;
		tienda =  document.getElementById('divLblTiendaNombre').innerHTML;
		$.get("clientes_sel/buscar_clientes_sel.php",
			   {cliente:cliente,tienda:tienda},
				function(data){
					document.getElementById('divSistemaEmergente').innerHTML = data;
					document.getElementById('divSistemaEmergente').style.visibility="visible";
				}
			);
			
	}
	function seleccionarTodasLasTiendasFiltradasChange(){
		var val = document.getElementById('chkSelectAll').checked;
		seleccionarTodasLasTiendasFiltradas(val);
	}
	function seleccionarTodasLasTiendasFiltradas(value){
		try{
			var cantElementos = document.getElementById('lblDatCons').innerHTML;
			for (var i=1;i<=cantElementos;i++){
					document.getElementById('chk_tienda_'+i).checked =value;
			}
		}
		catch(err){
			
		}
	}
	function clonarTiendas(){
		idPedido= document.getElementById('divVistaPedidoDetallelbDesclPedido').innerHTML;	
		idVendedor = document.getElementById('idVendedor').innerHTML;	
		tienda = document.getElementById('txtTienda').innerHTML;
		cliente = document.getElementById('txtCritCliente').innerHTML;
		pares = document.getElementById('divPedidoDetalleSubtotalPar').innerHTML;
		total = document.getElementById('lblSumaTotal').innerHTML;
		comprador = document.getElementById('txtPedido').value;
		lugarPedido = document.getElementById('comboLugarPedido').options[document.getElementById('comboLugarPedido').selectedIndex].value;
		seccionCatalogo="Temporadas";
		
		clonarPedidoPorTiendaSeleccionada(idPedido,idVendedor,pares,total,comprador,lugarPedido,seccionCatalogo);
		
	}
	
	function clonarPedidoPorTiendaSeleccionada(idPedidoAClonar,idVendedor,totalPares,subtotal,txtPedidoCargo,comboLugarPedido,seccionCatalogo)	{
		
		try{
			var cantElementos = document.getElementById('lblDatCons').innerHTML;
			for (var i=1;i<=cantElementos;i++){
					value=document.getElementById('chk_tienda_'+i).checked;
					if(value==true){
						
						idTienda = document.getElementById('checkValue_'+i).innerHTML;
						cliente =  document.getElementById('lblClientesBusquedaNombre_'+i).innerHTML;
						tienda =  document.getElementById('lblClientesBusquedaTienda_'+i).innerHTML;
						sitioPedido = "Web";
						
						$.get("../pedidos_clon/clonar_pedido_tienda.php",
						   {idPedido:idPedidoAClonar,idTienda:idTienda,sitioPedido:sitioPedido,idVendedor:idVendedor,TotalPares:totalPares,subtotal:subtotal,seccionCatalogo:seccionCatalogo,txtPedidoCargo:txtPedidoCargo,comboLugarPedido:comboLugarPedido,cliente:cliente,tienda:tienda},
							function(data2){
								
								alert(" No pedido : ["+data2+"] " );
								document.getElementById('divSistemaEmergente').style.visibility='hidden';
								document.getElementById('divGridPedidosClientesContenedorB88').style.visibility='visible';document.getElementById('divGridPedidosClientesContenedor288').style.visibility='hidden';
								
								
							}
						);
						
						
					}
			}
		}
		catch(err){
			
		}		
	}
	
	function cargarBuscarCliente(opcion,nameDiv){
		
		txtCriNombreBusCli= document.getElementById('txtCriNombreBusCli').value;0
		txtCritTiendaBusCli=document.getElementById('txtCritTiendaBusCli').value;
		txtCritEsdtadoBusCli=document.getElementById('txtCritEsdtadoBusCli').value;
		txtCriMunicipio=document.getElementById('txtCriMunicipio').value;
	//"llamarasincrono('clientes_ver2/buscar_clientes_rows_content.php?txtCriNombreBusCli='+document.getElementById('txtCriNombreBusCli').value+'&txtCritTiendaBusCli='+document.getElementById('txtCritTiendaBusCli').value+'&txtCritEsdtadoBusCli='+document.getElementById('txtCritEsdtadoBusCli').value+'&txtCritEsdtadoBusCli='+document.getElementById('txtCritEsdtadoBusCli').value+'&txtCriMunicipio='+document.getElementById('txtCriMunicipio').value+'&opcion=<?php echo "$opcion"; ?>','divClientesBusquedaHeaderContedor')"	//clientes_ver2/buscar_clientes_rows_content.php?txtCriNombreBusCli='+document.getElementById('txtCriNombreBusCli').value+'&txtCritTiendaBusCli='+document.getElementById('txtCritTiendaBusCli').value+'&txtCritEsdtadoBusCli='+document.getElementById('txtCritEsdtadoBusCli').value+'&txtCritEsdtadoBusCli='+document.getElementById('txtCritEsdtadoBusCli').value+'&txtCriMunicipio='+document.getElementById('txtCriMunicipio').value+'&opcion=<?php echo "$opcion"; ?>

		
		
		$.post('clientes_ver2/buscar_clientes_rows_content.php',
		   {txtCriNombreBusCli:txtCriNombreBusCli,txtCritTiendaBusCli:txtCritTiendaBusCli,txtCritEsdtadoBusCli:txtCritEsdtadoBusCli, txtCriMunicipio:txtCriMunicipio,opcion:opcion},
			function(data){
				//document.getElementById(nameDiv).innerHTML = data;
				if(data!=""){
					document.getElementById(nameDiv).innerHTML= data;
				}
				else{
					alert("No existe cliente en base a ese criterio de busqueda ");	
				}
			}
		);	
	}
	
	function cargarBuscarClienteVerClientes(opcion,nameDiv){
		
		txtCriNombreBusCli= document.getElementById('txtCriNombreBusCli').value;0
		txtCritTiendaBusCli=document.getElementById('txtCritTiendaBusCli').value;
		txtCritEsdtadoBusCli=document.getElementById('txtCritEsdtadoBusCli').value;
		txtCriMunicipio=document.getElementById('txtCriMunicipio').value;
	

		
		
		$.post('buscar_clientes_rows_content.php',
		   {txtCriNombreBusCli:txtCriNombreBusCli,txtCritTiendaBusCli:txtCritTiendaBusCli,txtCritEsdtadoBusCli:txtCritEsdtadoBusCli, txtCriMunicipio:txtCriMunicipio,opcion:opcion},
			function(data){
				//document.getElementById(nameDiv).innerHTML = data;
				if(data!=""){
					document.getElementById(nameDiv).innerHTML= data;
				}
				else{
					alert("No existe cliente en base a ese criterio de busqueda ");	
				}
			}
		);	
	}
	
	function guardarNumeracionDeCarrito(idTienda){
		crearPedidoCarrito(idTienda);
	}