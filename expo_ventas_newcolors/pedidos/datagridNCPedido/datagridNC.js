
	var objJSONPedidos;
	var datoJSONPedidos;
//	var datoJSONTemp;
	var objJSONTempPedidos;
	var objJSONUltimoFiltroPedidos;
	var arrayFiltrosAplicadosPedidos=new Array();
	var arrayCamposFiltradosPedidos=new Array();
	function cargarJSONPedidos(idRelacion,cliente){
		var datosJSON  = new Array();
		var table=document.getElementById("tablaDatPedidos");
		for(var i = table.rows.length - 1; i >= 0; i--){
			table.deleteRow(i);
		}
		$.get('pedidos/datagridNCPedido/getDataJSONPedidos.php',
		   {idRelacion:idRelacion,cliente:cliente },
			function(data){
				//document.getElementById('divDatosDataGridPedidos').innerHTML = data;
				getDatosJSONPedidos(data);
			}
		);	
		
		//llamarasincrono('getDataJSONPedidos.php','divDatosDataGridPedidos');
		//setTimeout("getDatosJSONPedidos();",1000);
	}

	function getDatosJSONPedidos(datos){
		datoJSONPedidos=datos;
		objJSONPedidos= eval('(' + datoJSONPedidos + ')');
		objJSONTempPedidos= eval('(' + datoJSONPedidos + ')');
		objJSONUltimoFiltroPedidos=eval('(' + datoJSONPedidos + ')');
		var StrArray="";
		var table=document.getElementById("tablaDatPedidos");
		var tableHeader=document.getElementById("tablaDatHeaderPedidos");
		//getIndexCampo(objJSONPedidos);
		agregarHeaderRowPedidos(tableHeader,objJSONPedidos,0);
		agregarHeaderRowPedidos(table,objJSONPedidos,0);
		for(i=0;i<objJSONPedidos.length;i++){
			
			agregarRowFormatPedidos("tablaDatPedidos",objJSONPedidos,i);
			
		}

		tab=document.getElementById('tablaDatPedidos');
		tab.getElementsByTagName('tr')[0].style.display='none';
//		document.getElementById('tablaDatPedidos').innerHTML=StrArray;
		
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
	function marcarColumnaFiltrada(){
		var k=0;

		for(k=0;k<arrayCamposFiltradosPedidos.length;k++){
				document.getElementById("imgFiltro"+arrayCamposFiltradosPedidos[k]).src="pedidos/datagridNCPedido/img/icono-filtro_marcado.png";
				document.getElementById("divCelda"+arrayCamposFiltradosPedidos[k]).style.color='#F60';
		}
		
	}
	function actulualizarColumnaFiltrada(){
		var k=0;
		var strDivFiltro="";
		var columnas= new Array();
		if(objJSONTempPedidos.length>0){
			for(var aux in objJSONTempPedidos[0])  {
				columnas.push(aux);
			}	
		}
		var arrayDatosFiltradosPorColumna = new Array();
		ca=0;
		for(k=0;k<columnas.length;k++){
			strDivFiltro="";
			strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'> <input type='checkbox' name='checkbox' id='checkbox_"+columnas[k]+"_todos' value='Todos' onclick='seleccionarTodos(\""+ columnas[k] +"\")'/> </div> <div  class='tipoIntroFil' id='divInfFiltro'>Todos</div> </div> ";
			for (p=arrayDatosFiltradosPorColumna.length;p>=0;p--){
				removeByIndex(arrayDatosFiltradosPorColumna,p);	
			}
			
			
			for(n=objJSONTempPedidos.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				
				var banderaVisible=false;
				
				//for(x=0;x<columnas.length;x++){
					//if(esDatoFiltradoPedidos(arrayCamposFiltradosPedidos[p], eval('objJSONTempPedidos[n].'+arrayCamposFiltradosPedidos[p]))){
				//if(esDatoFiltradoPedidos(columnas[k], eval('objJSONTempPedidos[n].'+columnas[k]))){
					if(!buscarElementos(arrayDatosFiltradosPorColumna,eval('objJSONTempPedidos[n].'+columnas[k]))){
						arrayDatosFiltradosPorColumna.push( eval('objJSONTempPedidos[n].'+columnas[k]));	
						
						
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
	function aplicarFiltro(campoFiltro){

		if(!buscarElementosDeFiltro(arrayFiltrosAplicadosPedidos,campoFiltro)){
			var cantElementos = parseInt(document.getElementById('lblFiltroCantElements_'+campoFiltro).innerHTML);
			for(var w=0;w<cantElementos;w++){
				var ca=w+1;
				
				if(document.getElementById('checkbox_'+campoFiltro+'_'+ca).checked==1){
					if(!buscarElementos(arrayCamposFiltradosPedidos,campoFiltro)){
						arrayCamposFiltradosPedidos.push(campoFiltro);
					}
					var arrayPosFil = new Array(campoFiltro,document.getElementById('checkbox_'+campoFiltro+'_'+ca).value);
					arrayFiltrosAplicadosPedidos.push(arrayPosFil);		
				}
			}
		}
		//document.getElementById('apDiv3').innerHTML=arrayFiltrosAplicadosPedidos;
	/*	refreshFiltroTablaPedidos();
		pintarTablaPedidos(); 
		getArrayUltimoFiltroPedidos();
		ocultarFiltros(objJSONPedidos);
		marcarColumnaFiltrada();
		actulualizarColumnaFiltrada();*/
		actualizarVistaTablaPedidos();
	}
	function actualizarVistaTablaPedidos(){
		
		refreshFiltroTablaPedidos();
		pintarTablaPedidos(); 
		getArrayUltimoFiltroPedidos();
		ocultarFiltros(objJSONPedidos);
		marcarColumnaFiltrada();
		actulualizarColumnaFiltrada();	
	}
	function quitarUltimoFiltroPedidos(){
		objJSONUltimoFiltroPedidos=eval('(' + datoJSONPedidos + ')');
		if(arrayCamposFiltradosPedidos.length>0){
			var ultimoCampo = arrayCamposFiltradosPedidos.pop();
			
			for (var k=arrayFiltrosAplicadosPedidos.length-1;k>=0;k--){
				if(arrayFiltrosAplicadosPedidos[k][0]==ultimoCampo){
					removeByIndex(arrayFiltrosAplicadosPedidos,k);
					document.getElementById("divCelda"+ultimoCampo).style.color='#000';
					document.getElementById("imgFiltro"+arrayCamposFiltradosPedidos[k]).src="pedidos/datagridNCPedido/img/icono-filtro.png";

				}
			}
			
		}
		refreshFiltroTablaPedidos();
		pintarTablaPedidos(); 
		actulualizarColumnaFiltrada();
		
	}
	function getArrayUltimoFiltroPedidos(){
		var arrayUltimoFiltro=new Array();
		
		for (var p=0;p<arrayCamposFiltradosPedidos.length-1;p++){
			
			for(n=objJSONUltimoFiltroPedidos.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				var columnas= new Array();
				for(var aux in objJSONUltimoFiltroPedidos[0])  {
					columnas.push(aux);
				}
				var banderaVisible=false;
				
				for(x=0;x<columnas.length;x++){
					//if(esDatoFiltradoPedidos(arrayCamposFiltradosPedidos[p], eval('objJSONTempPedidos[n].'+arrayCamposFiltradosPedidos[p]))){
					if(esDatoFiltradoPedidos(columnas[x], eval('objJSONUltimoFiltroPedidos[n].'+columnas[x]))){
						banderaVisible=true;
					}
					
				}
				if(!banderaVisible){
					removeByIndex(objJSONUltimoFiltroPedidos,n);
				}
				
			}
		}
		var strDatUlt="";
	
	
		if(arrayCamposFiltradosPedidos.length>0){
			var ultimoCampoFil = arrayCamposFiltradosPedidos[arrayCamposFiltradosPedidos.length-1];
		
			for(z=0;z<objJSONUltimoFiltroPedidos.length;z++){



				if(!buscarElementos(arrayUltimoFiltro,eval('objJSONUltimoFiltroPedidos[z].'+ultimoCampoFil))){
					arrayUltimoFiltro.push(eval('objJSONUltimoFiltroPedidos[z].'+ultimoCampoFil));
					strDatUlt+="<br>"+eval('objJSONUltimoFiltroPedidos[z].'+ultimoCampoFil)+"";
				}
			}
		}
		
		
		document.getElementById('divUltimoFiltroPedidos').innerHTML=strDatUlt;
	}
	
	function refreshFiltroTablaPedidos(){
		
		var banRefresh=false;
		
		var StrArray="";
		var table=document.getElementById("tablaDatPedidos");
	
		var Parent = document.getElementById("tablaDatPedidos");
		var l=0;
		for(var i = table.rows.length - 1; i >= 0; i--){
			table.deleteRow(i);
		}
		objJSONTempPedidos=eval('(' + datoJSONPedidos + ')');
	//	alert("objJSONTempPedidos.length"+objJSONTempPedidos.length);
		for (var p=0;p<arrayCamposFiltradosPedidos.length;p++){
			
			for(n=objJSONTempPedidos.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				var columnas= new Array();
				for(var aux in objJSONTempPedidos[0])  {
					columnas.push(aux);
				}
				var banderaVisible=false;
				
				//for(x=0;x<columnas.length;x++){
					//if(esDatoFiltradoPedidos(arrayCamposFiltradosPedidos[p], eval('objJSONTempPedidos[n].'+arrayCamposFiltradosPedidos[p]))){
					if(esDatoFiltradoPedidos(arrayCamposFiltradosPedidos[p], eval('objJSONTempPedidos[n].'+arrayCamposFiltradosPedidos[p]))){
						banderaVisible=true;
					}
					
				//}
				if(!banderaVisible){
					removeByIndex(objJSONTempPedidos,n);
				}
				
			}
		}
		
		
	
	}
	function pintarTablaPedidos(){
		var table=document.getElementById("tablaDatHeaderPedidos");	
		for(var o = table.rows.length - 1; o >= 0; o--){
			table.deleteRow(o);
		}
		agregarHeaderRowPedidos(table,objJSONPedidos,0);
		for(v=0;v<objJSONTempPedidos.length;v++){
			
			agregarRowFormatPedidos("tablaDatPedidos",objJSONTempPedidos,v);
			
		}
		//document.getElementById('apDiv3').innerHTML=StrArray;
	}
	function removeByIndex(arr, index) {
		arr.splice(index, 1);
	}
	function cargarFiltroPedidos(objJSONPedidos,campoFiltro){
			ocultarFiltros(objJSONPedidos);
			document.getElementById('divPrinVisFiltro'+campoFiltro).style.display="";

			var arrayFiltro=new Array();
			for (i=0;i<objJSONPedidos.length;i++){
					var dato= eval('objJSONPedidos[i].'+campoFiltro+'');
					
					if(!buscarElementos(arrayFiltro,dato)){
						arrayFiltro.push(dato);
					}
			}
			arrayFiltro.sort();
		
			return arrayFiltro;
	}
	function seleccionarTodos(nameColumna){
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
	
	function ocultarDivFiltroPedidos(campoFiltro){

		document.getElementById(campoFiltro).style.display='none';	
	}
	function agregarCeldaPedidos(row,nameColumna,j,objJSONPedidos){
		var strDivFiltro="";
		var strDiv="";
		strDivFiltro="<div style='position:absolute;' ><div id='divPrinVisFiltro" + nameColumna + "' style='display:none'  class='divPrinVisFiltro'> <div id='divSecVisFiltro'><div id='divFvisFiltro'><img src='pedidos/datagridNCPedido/img/f.jpg' name='Imagen13' width='12' height='13' border='0' id='Imagen13' /></div><img src='pedidos/datagridNCPedido/img/filtro-secundario.jpg' width='150' height='198' /> <div id='divLiDeFiltro'><img src='pedidos/datagridNCPedido/img/linea-degradado-filtro.jpg' width='148' height='3' /></div><div id='divXvisFiltro'><img src='pedidos/datagridNCPedido/img/x.jpg' width='11' height='12' /></div> <div class='divInVisFiltro' id='divInVisFiltro" + nameColumna + "'>";
		strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'> <input type='checkbox' name='checkbox' id='checkbox_"+nameColumna+"_todos' value='Todos' onclick='seleccionarTodos(\""+ nameColumna +"\")'/> </div> <div  class='tipoIntroFil' id='divInfFiltro'>Todos</div> </div> ";
		var arrayFiltro=new Array();
			for (i=0;i<objJSONPedidos.length;i++){
					var dato= eval('objJSONPedidos[i].'+nameColumna+'');
					
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
		
		strDivFiltro+=" </div>  </div>  <div id='divminFiltro' ><img src='pedidos/datagridNCPedido/img/min.jpg' name='Imagen6' width='12' height='3' border='0' id='Imagen6' /></div>  <div id='divAcepFiltro'>    <div class='tipoBlanFiltro' id='divAcTipFiltro' onclick='aplicarFiltro(\"" + nameColumna + "\")'>      <div align='center'>Aceptar</div>    </div>  <img src='pedidos/datagridNCPedido/img/barrita_total.jpg' width='62' height='20' /></div>  <div id='divAZviFiltro'><img src='pedidos/datagridNCPedido/img/az.jpg' name='Imagen11' width='34' height='15' border='0' id='Imagen11' /></div>  <img src='pedidos/datagridNCPedido/img/filtro-fondo.jpg' width='172' height='286' />  <div id='divZAvisFiltro'><img src='pedidos/datagridNCPedido/img/za.jpg' name='Imagen12' width='34' height='15' border='0' id='Imagen12' /></div>  <div id='divCanFiltro'><img src='pedidos/datagridNCPedido/img/barrita_total.jpg' width='62' height='20' />    <div class='tipoBlanFiltro' id='divCanTipoFiltro'>    <div align='center'>Cancelar</div>  </div></div><div id='divMaxFiltro'><img src='pedidos/datagridNCPedido/img/max.jpg' name='Imagen5' width='10' height='8' border='0' id='Imagen5' /></div><div id='divCeFiltro'  ><img src='pedidos/datagridNCPedido/img/x-simple.jpg' name='Imagen14' onclick=\"ocultarDivPedido('divPrinVisFiltro" + nameColumna + "')\" width='8' height='8' border='0' id='Imagen14' /></div></div></div>";
		
		if(j==0 && document.getElementById("verFoto").checked){
			var cell=row.insertCell(j);cell.innerHTML="<div style='position:realtive;' ></div><div style='position:relative;'  >Foto   </div>";	
			cell.setAttribute("class", "classColumnHFoto"); //For Most Browsers
			cell.setAttribute("className", "classColumnHFoto");
			
		}
		t=j;
		if(document.getElementById("verFoto").checked){
			t=j+1;
		}
		
		var cell=row.insertCell(t);cell.innerHTML="<div style='position:realtive;' ></div><div id='divCelda"+ nameColumna +"' style='position:relative;' onclick='cargarFiltroPedidos(objJSONPedidos ,\"" + nameColumna + "\")' >"+ nameColumna + " <div id='divImg"+ nameColumna +"'><img  id='imgFiltro"+nameColumna+"' src='pedidos/datagridNCPedido/img/icono-filtro.png'> </div></div>" +  strDivFiltro + " ";
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
	function ocultarDivPedido(nameDiv){
		document.getElementById(nameDiv).style.display='none';
	}
	function agregarValorCelda(cadena,nameColumna,j,objJSONPedidos){
		var strDivFiltro="";
		v=j+1;
		var cell=row.insertCell(v);cell.innerHTML=nameColumna;
	}
	function agregarFotoCelda(){
		var cell=row.insertCell(0);cell.innerHTML="<td>Foto</td>";
	}
	function agregarHeaderRowPedidos(table,objJSONt,i){

			var row=table.insertRow(0);
			row.setAttribute("class", "claseRowHeaderPedidos"); //For Most Browsers
			row.setAttribute("className", "claseRowHeaderPedidos");
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONPedidos[0])  {

				columnas.push(aux);
			
			}
			
			for(i=0;i<columnas.length;i++){
				agregarCeldaPedidos(row,columnas[i],i,objJSONPedidos);
			}
			
			/*cadena = "<tr>";
			
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {

				columnas.push(aux);
			
			}
			
			for(x=0;x<columnas.length;x++){
				
				cadena = cadena + "<td>" +columnas[x] + "</td>";
				
			}
			cadena +="</tr>";
			alert(cadena);
			$("#tablaDatPedidos tbody").append(cadena);
			
			*/
			
	}
	function ocultarFiltros(objJSONPedidos){
		var columnas= new Array();
		for(var aux in objJSONPedidos[0])  {
			columnas.push(aux);
		}
		for(i=0;i<columnas.length;i++){
			document.getElementById("divPrinVisFiltro" + columnas[i] ).style.display='none';
		}
		
	}
	function agregarRowFormatPedidos(tabla,objJSONt,i){
			idx=i+1;
			
			cadena="";
			var clase ="";
			if((idx%2)==0){
				clase="claseRowParPedidos";
  			    cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOverPedidos');this.setAttribute('className', 'claseRowMouseOverPedidos'); \"  onmouseout=\" this.setAttribute('class', 'claseRowParPedidos');this.setAttribute('className', 'claseRowParPedidos'); \">";
			}
			else{
				clase="claseRowImparPedidos";
				 cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOverPedidos');this.setAttribute('className', 'claseRowMouseOverPedidos'); \"  onmouseout=\" this.setAttribute('class', 'claseRowImparPedidos');this.setAttribute('className', 'claseRowImparPedidos'); \">";			}
 		   
		
		//	cadena += "<table id='tabla"+ idx +"' onmouseover=\"document.getElementById('tabla"+ idx +"' ).style.backgroundColor='#CCCCCC';\" onmouseout=\"document.getElementById('tabla"+ idx +"').style.backgroundColor='#FFFFFF'\">";
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {

				columnas.push(aux);
			
			}
			if(document.getElementById("verFoto").checked){
				cadena = cadena + "<td class='classColumnFoto'><img src='../imagenes_system/muestras/miniminis/"+nameFotoImageGif(objJSONt[i].Estilo,objJSONt[i].Material,objJSONt[i].Color)+"' width='48' height='48'></td>";
			}
			for(x=0;x<columnas.length;x++){
				
				cadena = cadena + "<td class='classColumn"+ columnas[x] +"'>" + eval('objJSONt[i].'+columnas[x]) + "</td>";
				
			}
			cadena += "</tr>";

			$("#tablaDatPedidos").append(cadena);
			
		/*	 var valor ="";
             valor +="<div id='divTableDatRow"+idx+"'>";
             valor +="<table class='tablaDatosPedidos' id='TableDatRow"+idx+"'>";
			 valor +="<tr>";

          // 	cadena += "<table id='tabla"+ idx +"' onmouseover=\"document.getElementById('tabla"+ idx +"' ).style.backgroundColor='#CCCCCC';\" onmouseout=\"document.getElementById('tabla"+ idx +"').style.backgroundColor='#FFFFFF'\">";
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {

				columnas.push(aux);
			
			}
			if(document.getElementById("verFoto").checked){
				valor = valor + "<td class='classColumnFoto'><img src='../imagenes_system/muestras/miniminis/"+nameFotoImageGif(objJSONt[i].Estilo,objJSONt[i].Material,objJSONt[i].Color)+"' width='48' height='48'></td>";
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
	function agregarRow(tabla,objJSONt,i){
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
			$("#tablaDatPedidos tbody").append(cadena);
	}

	function esDatoFiltradoPedidos(campoFiltro, datoFiltro){
		var cant=arrayFiltrosAplicadosPedidos.length;
		var ban=false;
		for (var i=0;i<cant;i++){
			if(arrayFiltrosAplicadosPedidos[i][0]==campoFiltro && arrayFiltrosAplicadosPedidos[i][1]==datoFiltro){
				ban=true;
				return ban;
			}	
		}
		return ban;
	}
	