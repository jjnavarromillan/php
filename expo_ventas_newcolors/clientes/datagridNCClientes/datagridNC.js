
	var objJSONClientes;
	var datoJSONClientes;
//	var datoJSONTemp;
	var objJSONTempClientes;
	var objJSONUltimoFiltroClientes;
	var arrayFiltrosAplicadosClientes=new Array();
	var arrayCamposFiltradosClientes=new Array();
	function cargarJSONClientes(){
		var datosJSON  = new Array();
		var table=document.getElementById("tablaDatClientes");
		for(var i = table.rows.length - 1; i >= 0; i--){
			table.deleteRow(i);
		}
		llamarasincrono('clientes/datagridNCClientes/getDataJSONClientes.php','divDatosDataGridClientes');
		setTimeout("getDatosJSONClientes();",1000);
	}
	function cargarJSONClientesSistema(){
		var datosJSON  = new Array();
		var table=document.getElementById("tablaDatClientes");
		for(var i = table.rows.length - 1; i >= 0; i--){
			table.deleteRow(i);
		}
		llamarasincrono('clientes/datagridNCClientes/getDataJSONClientes.php','divDatosDataGridClientes');
		setTimeout("getDatosJSONClientesSistema();",1000);
	}
	function getDatosJSONClientes(){
		datoJSONClientes=document.getElementById('divDatosDataGridClientes').innerHTML;
		objJSONClientes= eval('(' + datoJSONClientes + ')');
		objJSONTempClientes= eval('(' + datoJSONClientes + ')');
		objJSONUltimoFiltroClientes=eval('(' + datoJSONClientes + ')');
		var StrArray="";
		var table=document.getElementById("tablaDatClientes");
		var tableHeader=document.getElementById("tablaDatHeaderClientes");
		//getIndexCampo(objJSONClientes);
		agregarHeaderRowClientes(tableHeader,objJSONClientes,0);
		agregarHeaderRowClientes(table,objJSONClientes,0);
		for(i=0;i<objJSONClientes.length;i++){
			
			agregarRowFormatClientes("tablaDatClientes",objJSONClientes,i);
			
		}

		tab=document.getElementById('tablaDatClientes');
		tab.getElementsByTagName('tr')[0].style.display='none';
//		document.getElementById('tablaDatClientes').innerHTML=StrArray;
		
	}
	function getDatosJSONClientesSistema(){
		datoJSONClientes=document.getElementById('divDatosDataGridClientes').innerHTML;
		objJSONClientes= eval('(' + datoJSONClientes + ')');
		objJSONTempClientes= eval('(' + datoJSONClientes + ')');
		objJSONUltimoFiltroClientes=eval('(' + datoJSONClientes + ')');
		var StrArray="";
		var table=document.getElementById("tablaDatClientes");
		var tableHeader=document.getElementById("tablaDatHeaderClientes");
		//getIndexCampo(objJSONClientes);
		agregarHeaderRowClientes(tableHeader,objJSONClientes,0);
		agregarHeaderRowClientes(table,objJSONClientes,0);
		for(i=0;i<objJSONClientes.length;i++){
			
			agregarRowFormatClientesSistema("tablaDatClientes",objJSONClientes,i);
			
		}

		tab=document.getElementById('tablaDatClientes');
		tab.getElementsByTagName('tr')[0].style.display='none';
//		document.getElementById('tablaDatClientes').innerHTML=StrArray;
		
	}
	function buscarElementos(arreglo,elementoDeBusqueda){
		var ban = false;
		for(var h=0;h<arreglo.length;h++){
			if(arreglo[h]==elementoDeBusqueda){
				ban = true;
				h = arreglo.length;
			}
		}
		return ban;
	}
	function buscarElementosDeFiltro(arreglo,elementoDeBusqueda){
		var ban = false;
		for(var h=0;h<arreglo.length;h++){
			if(arreglo[h][0]==elementoDeBusqueda){
				ban = true;
				h = arreglo.length;
			}
		}
		return ban;
	}
	function marcarColumnaFiltradaClientes(){
		var k=0;

		for(k=0;k<arrayCamposFiltradosClientes.length;k++){
				document.getElementById("imgFiltro"+arrayCamposFiltradosClientes[k]).src="clientes/datagridNCClientes/img/icono-filtro_marcado.jpg";
				document.getElementById("divCelda"+arrayCamposFiltradosClientes[k]).style.color='#F60';
		}
		
	}
	function actulualizarColumnaFiltradaClientes(){
		var k=0;
		var strDivFiltro="";
		var columnas= new Array();
		if(objJSONTempClientes.length>0){
			for(var aux in objJSONTempClientes[0])  {
				columnas.push(aux);
			}	
		}
		var arrayDatosFiltradosPorColumna = new Array();
		ca=0;
		for(k=0;k<columnas.length;k++){
			strDivFiltro="";
			strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'> <input type='checkbox' name='checkbox' id='checkbox_"+ [k]+"_todos' value='Todos' onclick='seleccionarTodosClientes(\""+ columnas[k] +"\")'/> </div> <div  class='tipoIntroFil' id='divInfFiltro'>Todos</div> </div> ";
			for (p=arrayDatosFiltradosPorColumna.length;p>=0;p--){
				removeByIndex(arrayDatosFiltradosPorColumna,p);	
			}
			
			
			for(n=objJSONTempClientes.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				
				var banderaVisible=false;
				
				//for(x=0;x<columnas.length;x++){
					//if(esDatoFiltradoClientes(arrayCamposFiltradosClientes[p], eval('objJSONTempClientes[n].'+arrayCamposFiltradosClientes[p]))){
				//if(esDatoFiltradoClientes(columnas[k], eval('objJSONTempClientes[n].'+columnas[k]))){
					if(!buscarElementos(arrayDatosFiltradosPorColumna,eval('objJSONTempClientes[n].'+columnas[k]))){
						arrayDatosFiltradosPorColumna.push( eval('objJSONTempClientes[n].'+columnas[k]));	
						
						
					}
				//}
			}
			arrayDatosFiltradosPorColumna.sort();
			for (y=0;y<arrayDatosFiltradosPorColumna.length;y++){
				ca=y+1;
				strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'> <input type='checkbox' name='checkbox' id='checkbox_"+columnas[k]+"_"+ ca +"' value='"+arrayDatosFiltradosPorColumna[y]+"'/> </div> <div  class='tipoIntroFil' id='divInfFiltro'>"+ arrayDatosFiltradosPorColumna[y] +"</div> </div> ";
			}
			strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'><label> <input type='checkbox' name='checkbox' id='checkbox_"+columnas[k]+"_vacios' value='Vacios'/> </label></div> <div  class='tipoIntroFil' id='divInfFiltro'>Vacios</div> </div> ";
			
			strDivFiltro+="<label id='lblFiltroCantElements_"+ columnas[k] +"' style='display:none'>"+ arrayDatosFiltradosPorColumna.length +"</label>";
			//strDivFiltro+="<label id='lblFiltroCantElements_"+ nameColumna +"' style='display:none'>"+ arrayFiltro.length +"</label>";	
		
			document.getElementById("divInVisFiltro" + columnas[k]).innerHTML = strDivFiltro;
			ca=0;
		}
	}
	function aplicarFiltroClientes(campoFiltro){

		if(!buscarElementosDeFiltro(arrayFiltrosAplicadosClientes,campoFiltro)){
			var cantElementos = parseInt(document.getElementById('lblFiltroCantElements_'+campoFiltro).innerHTML);
			for(var w=0;w<cantElementos;w++){
				var ca=w+1;
				
				if(document.getElementById('checkbox_'+campoFiltro+'_'+ca).checked==1){
					if(!buscarElementos(arrayCamposFiltradosClientes,campoFiltro)){
						arrayCamposFiltradosClientes.push(campoFiltro);
					}
					var arrayPosFil = new Array(campoFiltro,document.getElementById('checkbox_'+campoFiltro+'_'+ca).value);
					arrayFiltrosAplicadosClientes.push(arrayPosFil);		
				}
			}
		}
	
		actualizarVistaTablaClientes();
	}
	function actualizarVistaTablaClientes(){
		
		refreshFiltroTablaClientes();
		pintarTablaClientes(); 
		getArrayUltimoFiltroClientes();
		ocultarFiltrosClientes(objJSONClientes);
		marcarColumnaFiltradaClientes();
		actulualizarColumnaFiltradaClientes();	
	}
	function quitarUltimoFiltroClientes(){
		objJSONUltimoFiltroClientes=eval('(' + datoJSONClientes + ')');
		if(arrayCamposFiltradosClientes.length>0){
			var ultimoCampo = arrayCamposFiltradosClientes.pop();
			
			for (var k=arrayFiltrosAplicadosClientes.length-1;k>=0;k--){
				if(arrayFiltrosAplicadosClientes[k][0]==ultimoCampo){
					removeByIndex(arrayFiltrosAplicadosClientes,k);
					document.getElementById("divCelda"+ultimoCampo).style.color='#000';
					document.getElementById("imgFiltro"+arrayCamposFiltradosClientes[k]).src="clientes/datagridNCClientes/img/icono-filtro.jpg";

				}
			}
			
		}
		refreshFiltroTablaClientes();
		pintarTablaClientes(); 
		actulualizarColumnaFiltradaClientes();
		
	}
	function getArrayUltimoFiltroClientes(){
		var arrayUltimoFiltro=new Array();
		
		for (var p=0;p<arrayCamposFiltradosClientes.length-1;p++){
			
			for(n=objJSONUltimoFiltroClientes.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				var columnas= new Array();
				for(var aux in objJSONUltimoFiltroClientes[0])  {
					columnas.push(aux);
				}
				var banderaVisible=false;
				
				for(x=0;x<columnas.length;x++){
					//if(esDatoFiltradoClientes(arrayCamposFiltradosClientes[p], eval('objJSONTempClientes[n].'+arrayCamposFiltradosClientes[p]))){
					if(esDatoFiltradoClientes(columnas[x], eval('objJSONUltimoFiltroClientes[n].'+columnas[x]))){
						banderaVisible=true;
					}
					
				}
				if(!banderaVisible){
					removeByIndex(objJSONUltimoFiltroClientes,n);
				}
				
			}
		}
		var strDatUlt="";
	
	
		if(arrayCamposFiltradosClientes.length>0){
			var ultimoCampoFil = arrayCamposFiltradosClientes[arrayCamposFiltradosClientes.length-1];
		
			for(z=0;z<objJSONUltimoFiltroClientes.length;z++){



				if(!buscarElementos(arrayUltimoFiltro,eval('objJSONUltimoFiltroClientes[z].'+ultimoCampoFil))){
					arrayUltimoFiltro.push(eval('objJSONUltimoFiltroClientes[z].'+ultimoCampoFil));
					strDatUlt+="<br>"+eval('objJSONUltimoFiltroClientes[z].'+ultimoCampoFil)+"";
				}
			}
		}
		
		
		document.getElementById('divUltimoFiltroClientes').innerHTML=strDatUlt;
	}
	
	function refreshFiltroTablaClientes(){
		
		var banRefresh=false;
		
		var StrArray="";
		var table=document.getElementById("tablaDatClientes");
	
		var Parent = document.getElementById("tablaDatClientes");
		var l=0;
		for(var i = table.rows.length - 1; i >= 0; i--){
			table.deleteRow(i);
		}
		objJSONTempClientes=eval('(' + datoJSONClientes + ')');
	//	alert("objJSONTempClientes.length"+objJSONTempClientes.length);
		for (var p=0;p<arrayCamposFiltradosClientes.length;p++){
			
			for(n=objJSONTempClientes.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				var columnas= new Array();
				for(var aux in objJSONTempClientes[0])  {
					columnas.push(aux);
				}
				var banderaVisible=false;
				
				//for(x=0;x<columnas.length;x++){
					//if(esDatoFiltradoClientes(arrayCamposFiltradosClientes[p], eval('objJSONTempClientes[n].'+arrayCamposFiltradosClientes[p]))){
					if(esDatoFiltradoClientes(arrayCamposFiltradosClientes[p], eval('objJSONTempClientes[n].'+arrayCamposFiltradosClientes[p]))){
						banderaVisible=true;
					}
					
				//}
				if(!banderaVisible){
					removeByIndex(objJSONTempClientes,n);
				}
				
			}
		}
		
		
	
	}
	function pintarTablaClientes(){
		var table=document.getElementById("tablaDatHeaderClientes");	
		for(var o = table.rows.length - 1; o >= 0; o--){
			table.deleteRow(o);
		}
		agregarHeaderRowClientes(table,objJSONClientes,0);
		for(v=0;v<objJSONTempClientes.length;v++){
			
			agregarRowFormatClientes("tablaDatClientes",objJSONTempClientes,v);
			
		}
		//document.getElementById('apDiv3').innerHTML=StrArray;
	}
	function removeByIndex(arr, index) {
		arr.splice(index, 1);
	}
	function cargarFiltroClientes(objJSONClientes,campoFiltro){
			ocultarFiltrosClientes(objJSONClientes);
			document.getElementById('divPrinVisFiltro'+campoFiltro).style.display="";

			var arrayFiltro=new Array();
			for (i=0;i<objJSONClientes.length;i++){
					var dato= eval('objJSONClientes[i].'+campoFiltro+'');
					
					if(!buscarElementos(arrayFiltro,dato)){
						arrayFiltro.push(dato);
					}
			}
			arrayFiltro.sort();
		
			return arrayFiltro;
	}
	function seleccionarTodosClientes(nameColumna){
		var cant=parseInt(document.getElementById('lblFiltroCantElements_'+nameColumna).innerHTML);
		if(document.getElementById('checkbox_'+nameColumna+'_todos').checked==1){
			for (var k=0;k<cant;k++){
				var ca=k+1;
				document.getElementById('checkbox_'+nameColumna+'_'+ca).checked=1;
			}
			document.getElementById('checkbox_'+nameColumna+'_vacios').checked=1;
		}
		else
		{
			for (var k=0;k<cant;k++){
				var ca=k+1;
				document.getElementById('checkbox_'+nameColumna+'_'+ca).checked=0;
			}
			document.getElementById('checkbox_'+nameColumna+'_vacios').checked=0;
		}
	}
	
	function ocultarDivFiltro(campoFiltro){

		document.getElementById(campoFiltro).style.display='none';	
	}
	function agregarCeldaClientes(row,nameColumna,j,objJSONClientes){
		var strDivFiltro="";
		var strDiv="";
		strDivFiltro="<div style='position:absolute;' ><div id='divPrinVisFiltro" + nameColumna + "' style='display:none'  class='divPrinVisFiltro'> <div id='divSecVisFiltro'><div id='divFvisFiltro'><img src='clientes/datagridNCClientes/img/f.jpg' name='Imagen13' width='12' height='13' border='0' id='Imagen13' /></div><img src='clientes/datagridNCClientes/img/filtro-secundario.jpg' width='150' height='198' /> <div id='divLiDeFiltro'><img src='clientes/datagridNCClientes/img/linea-degradado-filtro.jpg' width='148' height='3' /></div><div id='divXvisFiltro'><img src='clientes/datagridNCClientes/img/x.jpg' width='11' height='12' /></div> <div class='divInVisFiltro' id='divInVisFiltro" + nameColumna + "'>";
		strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'> <input type='checkbox' name='checkbox' id='checkbox_"+nameColumna+"_todos' value='Todos' onclick='seleccionarTodosClientes(\""+ nameColumna +"\")'/> </div> <div  class='tipoIntroFil' id='divInfFiltro'>Todos</div> </div> ";
		var arrayFiltro=new Array();
			for (i=0;i<objJSONClientes.length;i++){
					var dato= eval('objJSONClientes[i].'+nameColumna+'');
					
					if(!buscarElementos(arrayFiltro,dato)){
						arrayFiltro.push(dato);
					}
			}
			arrayFiltro.sort();
			for (i=0;i<arrayFiltro.length;i++){
				var ca=i+1;
				strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'> <input type='checkbox' name='checkbox' id='checkbox_"+nameColumna+"_"+ ca +"' value='"+arrayFiltro[i]+"'/> </div> <div  class='tipoIntroFil' id='divInfFiltro'>"+ arrayFiltro[i] +"</div> </div> ";
				
			}
			strFiltros="";
			for(i=0;i<arrayFiltro.length;i++){
				strFiltros +=arrayFiltro[i] + "<br>";
			}
		strDivFiltro+="<label id='lblFiltroCantElements_"+ nameColumna +"' style='display:none'>"+ arrayFiltro.length +"</label>";
		
		strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'><label> <input type='checkbox' name='checkbox' id='checkbox_"+nameColumna+"_vacios' value='Vacios'/> </label></div> <div  class='tipoIntroFil' id='divInfFiltro'>Vacios</div> </div> ";
		
		strDivFiltro+=" </div>  </div>  <div id='divminFiltro' ><img src='clientes/datagridNCClientes/img/min.jpg' name='Imagen6' width='12' height='3' border='0' id='Imagen6' /></div>  <div id='divAcepFiltro'>    <div class='tipoBlanFiltro' id='divAcTipFiltro' onclick='aplicarFiltroClientes(\"" + nameColumna + "\")'>      <div align='center'>Aceptar</div>    </div>  <img src='clientes/datagridNCClientes/img/barrita_total.jpg' width='62' height='20' /></div>  <div id='divAZviFiltro'><img src='clientes/datagridNCClientes/img/az.jpg' name='Imagen11' width='34' height='15' border='0' id='Imagen11' /></div>  <img src='clientes/datagridNCClientes/img/filtro-fondo.jpg' width='172' height='286' />  <div id='divZAvisFiltro'><img src='clientes/datagridNCClientes/img/za.jpg' name='Imagen12' width='34' height='15' border='0' id='Imagen12' /></div>  <div id='divCanFiltro'><img src='clientes/datagridNCClientes/img/barrita_total.jpg' width='62' height='20' />    <div class='tipoBlanFiltro' id='divCanTipoFiltro'>    <div align='center'>Cancelar</div>  </div></div><div id='divMaxFiltro'><img src='clientes/datagridNCClientes/img/max.jpg' name='Imagen5' width='10' height='8' border='0' id='Imagen5' /></div><div id='divCeFiltro'  ><img src='clientes/datagridNCClientes/img/x-simple.jpg' name='Imagen14' onclick=\"ocultarDiv('divPrinVisFiltro" + nameColumna + "')\" width='8' height='8' border='0' id='Imagen14' /></div></div></div>";
		
		/*if(j==0 ){
			var cell=row.insertCell(j);cell.innerHTML="<div style='position:realtive;' ></div><div style='position:relative;'  >Foto   </div>";	
			cell.setAttribute("class", "classColumnHFoto"); //For Most Browsers
			cell.setAttribute("className", "classColumnHFoto");
			
		}*/
		t=j;
		/*if(document.getElementById("verFoto").checked){
			t=j+1;
		}*/
		
		var cell=row.insertCell(t);cell.innerHTML="<div style='position:realtive;' ></div><div id='divCelda"+ nameColumna +"' style='position:relative;' onclick='cargarFiltroClientes(objJSONClientes ,\"" + nameColumna + "\")' >"+ nameColumna + " <img  id='imgFiltro"+nameColumna+"' src='clientes/datagridNCClientes/img/icono-filtro.jpg'> </div>" +  strDivFiltro + " ";
		cell.setAttribute("class", "classColumnH"+nameColumna); //For Most Browsers
		cell.setAttribute("className", "classColumnH"+nameColumna);
		
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
	function ocultarDiv(nameDiv){
		document.getElementById(nameDiv).style.display='none';
	}
	function agregarValorCelda(cadena,nameColumna,j,objJSONClientes){
		var strDivFiltro="";
		v=j+1;
		var cell=row.insertCell(v);cell.innerHTML=nameColumna;
	}
	function agregarFotoCelda(){
		var cell=row.insertCell(0);cell.innerHTML="<td>Foto</td>";
	}
	function agregarHeaderRowClientes(table,objJSONt,i){

			var row=table.insertRow(0);
			row.setAttribute("class", "claseRowHeader"); //For Most Browsers
			row.setAttribute("className", "claseRowHeader");
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONClientes[0])  {

				columnas.push(aux);
			
			}
			
			for(i=0;i<columnas.length;i++){
				agregarCeldaClientes(row,columnas[i],i,objJSONClientes);
			}
			
	}
	function ocultarFiltrosClientes(objJSONClientes){
		var columnas= new Array();
		for(var aux in objJSONClientes[0])  {
			columnas.push(aux);
		}

		for(i4=0;i4<columnas.length;i4++){

			document.getElementById("divPrinVisFiltro" + columnas[i4] ).style.display='none';
		}
		
	}
	function agregarRowFormatClientes(tabla,objJSONt,i){
			idx=i+1;
			
			cadena="";
			var clase ="";
			if((idx%2)==0){
				clase="claseRowPar";
  			    cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOver');this.setAttribute('className', 'claseRowMouseOver'); \"  onmouseout=\" this.setAttribute('class', 'claseRowPar');this.setAttribute('className', 'claseRowPar'); \" onclick=\"document.getElementById('txtCliente').value='" + eval('objJSONt[i].nombre') + "';verClienteBusqueda();document.getElementById('divBusquedaCliente').style.visibility='hidden';document.getElementById('divBusquedaCliente').innerHTML='';\" >";
			}
			else{
				clase="claseRowImpar";
				 cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOver');this.setAttribute('className', 'claseRowMouseOver'); \"  onmouseout=\" this.setAttribute('class', 'claseRowImpar');this.setAttribute('className', 'claseRowImpar'); \" onclick=\"document.getElementById('txtCliente').value='" + eval('objJSONt[i].nombre') + "';verClienteBusqueda();document.getElementById('divBusquedaCliente').style.visibility='hidden';document.getElementById('divBusquedaCliente').innerHTML='';\">";			}
 		   
			//onclick=\"document.getElementById('txtCliente').value=" + eval('objJSONt[i].nombre') + "\"
			

		//	cadena += "<table id='tabla"+ idx +"' onmouseover=\"document.|getElementById('tabla"+ idx +"' ).style.backgroundColor='#CCCCCC';\" onmouseout=\"document.getElementById('tabla"+ idx +"').style.backgroundColor='#FFFFFF'\">";
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {

				columnas.push(aux);
			
			}
			/*if(document.getElementById("verFoto").checked){
				cadena = cadena + "<td class='classColumnFoto'><img src='http://201.120.55.76/imagenes_system/muestras/miniminis/"+nameFotoImageGif(objJSONt[i].Estilo,objJSONt[i].Material,objJSONt[i].Color)+"' width='48' height='48'></td>";
			}*/
			for(x=0;x<columnas.length;x++){
				
				cadena = cadena + "<td class='classColumn"+ columnas[x] +"'>" + eval('objJSONt[i].'+columnas[x]) + "</td>";
				
			}
			cadena += "</tr>";

			$("#tablaDatClientes").append(cadena);
			
		/*	 var valor ="";
             valor +="<div id='divTableDatRow"+idx+"'>";
             valor +="<table class='tablaDatClientesosClientes' id='TableDatRow"+idx+"'>";
			 valor +="<tr>";

          // 	cadena += "<table id='tabla"+ idx +"' onmouseover=\"document.getElementById('tabla"+ idx +"' ).style.backgroundColor='#CCCCCC';\" onmouseout=\"document.getElementById('tabla"+ idx +"').style.backgroundColor='#FFFFFF'\">";
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {

				columnas.push(aux);
			
			}
			if(document.getElementById("verFoto").checked){
				valor = valor + "<td class='classColumnFoto'><img src='http://201.120.55.76/imagenes_system/muestras/miniminis/"+nameFotoImageGif(objJSONt[i].Estilo,objJSONt[i].Material,objJSONt[i].Color)+"' width='48' height='48'></td>";
			}
			for(x=0;x<columnas.length;x++){
				
				valor = valor + "<td class='classColumn"+ columnas[x] +"'>" + eval('objJSONt[i].'+columnas[x]) + "</td>";
				
			}
			 cadena +="</tr>";
             cadena +="</table>";
             cadena += "</div>";

             $("#row"+idx ).append(valor);
			 valor="";
			*/
			
	}
	function agregarRowFormatClientesSistema(tabla,objJSONt,i){
			idx=i+1;
			
			cadena="";
			var clase ="";
			if((idx%2)==0){
				clase="claseRowPar";
  			    cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOver');this.setAttribute('className', 'claseRowMouseOver'); \"  onmouseout=\" this.setAttribute('class', 'claseRowPar');this.setAttribute('className', 'claseRowPar'); \" onclick=\"document.getElementById('divNomClienteSistema').value='" + eval('objJSONt[i].nombre') + "';document.getElementById('divSistemaEmergente').style.visibility='hidden';document.getElementById('divNomClienteSistema').innerHTML='" + eval('objJSONt[i].nombre') + "';document.getElementById('divSistemaTiendaSel').innerHTML='" + eval('objJSONt[i].tienda') + "';document.getElementById('divSistemalblIdTienda').innerHTML='" + eval('objJSONt[i].idTienda') + "';document.getElementById('divSistemalblIdCliente').innerHTML='" + eval('objJSONt[i].idCliente') + "';cargarElementosEnCarro();\" >";
			}
			else{
				clase="claseRowImpar";
				 cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOver');this.setAttribute('className', 'claseRowMouseOver'); \"  onmouseout=\" this.setAttribute('class', 'claseRowImpar');this.setAttribute('className', 'claseRowImpar'); \" onclick=\"document.getElementById('divNomClienteSistema').value='" + eval('objJSONt[i].nombre') + "';document.getElementById('divSistemaEmergente').style.visibility='hidden';document.getElementById('divNomClienteSistema').innerHTML='" + eval('objJSONt[i].nombre') + "';document.getElementById('divSistemaTiendaSel').innerHTML='" + eval('objJSONt[i].tienda') + "';document.getElementById('divSistemalblIdTienda').innerHTML='" + eval('objJSONt[i].idTienda') + "';document.getElementById('divSistemalblIdCliente').innerHTML='" + eval('objJSONt[i].idCliente') + "';cargarElementosEnCarro();\">";			
				 }
 		   
		
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {

				columnas.push(aux);
			
			}
	
			for(x=0;x<columnas.length;x++){
				
				cadena = cadena + "<td class='classColumn"+ columnas[x] +"'>" + eval('objJSONt[i].'+columnas[x]) + "</td>";
				
			}
			cadena += "</tr>";

			$("#tablaDatClientes").append(cadena);
			
		
			
	}
	function agregarRowClientes(tabla,objJSONt,i){
			idx=i+1;
 		    cadena = "<tr  onmouseover=\"this.style.backgroundColor='#CFF';\" onmouseout=\"this.style.backgroundColor='#FFFFFF'\">";
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {
				columnas.push(aux);
			}
			for(x=0;x<columnas.length;x++){
				cadena = cadena + "<td>" + eval('objJSONt[i].'+columnas[x]) + "</td>";
			}
			$("#tablaDatClientes tbody").append(cadena);
	}

	function esDatoFiltradoClientes(campoFiltro, datoFiltro){
		var cant=arrayFiltrosAplicadosClientes.length;
		var ban=false;
		for (var i=0;i<cant;i++){
			if(arrayFiltrosAplicadosClientes[i][0]==campoFiltro && arrayFiltrosAplicadosClientes[i][1]==datoFiltro){
				ban=true;
				return ban;
			}	
		}
		return ban;
	}
	