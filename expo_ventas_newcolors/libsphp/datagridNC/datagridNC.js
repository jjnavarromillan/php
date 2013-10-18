
	var objJSON;
	var datoJSON;
//	var datoJSONTemp;
	var objJSONTemp;
	var objJSONUltimoFiltro;
	var arrayFiltrosAplicados=new Array();
	var arrayCamposFiltrados=new Array();
	function cargarJSON(){
		var datosJSON  = new Array();
		var table=document.getElementById("tablaDat");
		for(var i = table.rows.length - 1; i >= 0; i--){
			table.deleteRow(i);
		}
		llamarasincrono('getDataJSON.php','divDatosDataGrid');
		setTimeout("getDatosJSON();",1000);
	}

	function getDatosJSON(){
		datoJSON=document.getElementById('divDatosDataGrid').innerHTML;
		objJSON= eval('(' + datoJSON + ')');
		objJSONTemp= eval('(' + datoJSON + ')');
		objJSONUltimoFiltro=eval('(' + datoJSON + ')');
		var StrArray="";
		var table=document.getElementById("tablaDat");
		var tableHeader=document.getElementById("tablaDatHeader");
		//getIndexCampo(objJSON);
		agregarHeaderRow(tableHeader,objJSON,0);
		agregarHeaderRow(table,objJSON,0);
		for(i=0;i<objJSON.length;i++){
			
			agregarRowFormat("tablaDat",objJSON,i);
			
		}

		tab=document.getElementById('tablaDat');
		tab.getElementsByTagName('tr')[0].style.display='none';
//		document.getElementById('tablaDat').innerHTML=StrArray;
		
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

		for(k=0;k<arrayCamposFiltrados.length;k++){
				document.getElementById("imgFiltro"+arrayCamposFiltrados[k]).src="img/icono-filtro_marcado.jpg";
				document.getElementById("divCelda"+arrayCamposFiltrados[k]).style.color='#F60';
		}
		
	}
	function actulualizarColumnaFiltrada(){
		var k=0;
		var strDivFiltro="";
		var columnas= new Array();
		if(objJSONTemp.length>0){
			for(var aux in objJSONTemp[0])  {
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
			
			
			for(n=objJSONTemp.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				
				var banderaVisible=false;
				
				//for(x=0;x<columnas.length;x++){
					//if(esDatoFiltrado(arrayCamposFiltrados[p], eval('objJSONTemp[n].'+arrayCamposFiltrados[p]))){
				//if(esDatoFiltrado(columnas[k], eval('objJSONTemp[n].'+columnas[k]))){
					if(!buscarElementos(arrayDatosFiltradosPorColumna,eval('objJSONTemp[n].'+columnas[k]))){
						arrayDatosFiltradosPorColumna.push( eval('objJSONTemp[n].'+columnas[k]));	
						
						
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

		if(!buscarElementosDeFiltro(arrayFiltrosAplicados,campoFiltro)){
			var cantElementos = parseInt(document.getElementById('lblFiltroCantElements_'+campoFiltro).innerHTML);
			for(var w=0;w<cantElementos;w++){
				var ca=w+1;
				
				if(document.getElementById('checkbox_'+campoFiltro+'_'+ca).checked==1){
					if(!buscarElementos(arrayCamposFiltrados,campoFiltro)){
						arrayCamposFiltrados.push(campoFiltro);
					}
					var arrayPosFil = new Array(campoFiltro,document.getElementById('checkbox_'+campoFiltro+'_'+ca).value);
					arrayFiltrosAplicados.push(arrayPosFil);		
				}
			}
		}
		//document.getElementById('apDiv3').innerHTML=arrayFiltrosAplicados;
	/*	refreshFiltroTabla();
		pintarTabla(); 
		getArrayUltimoFiltro();
		ocultarFiltros(objJSON);
		marcarColumnaFiltrada();
		actulualizarColumnaFiltrada();*/
		actualizarVistaTabla();
	}
	function actualizarVistaTabla(){
		
		refreshFiltroTabla();
		pintarTabla(); 
		getArrayUltimoFiltro();
		ocultarFiltros(objJSON);
		marcarColumnaFiltrada();
		actulualizarColumnaFiltrada();	
	}
	function quitarUltimoFiltro(){
		objJSONUltimoFiltro=eval('(' + datoJSON + ')');
		if(arrayCamposFiltrados.length>0){
			var ultimoCampo = arrayCamposFiltrados.pop();
			
			for (var k=arrayFiltrosAplicados.length-1;k>=0;k--){
				if(arrayFiltrosAplicados[k][0]==ultimoCampo){
					removeByIndex(arrayFiltrosAplicados,k);
					document.getElementById("divCelda"+ultimoCampo).style.color='#000';
					document.getElementById("imgFiltro"+arrayCamposFiltrados[k]).src="img/icono-filtro.jpg";

				}
			}
			
		}
		refreshFiltroTabla();
		pintarTabla(); 
		actulualizarColumnaFiltrada();
		
	}
	function getArrayUltimoFiltro(){
		var arrayUltimoFiltro=new Array();
		
		for (var p=0;p<arrayCamposFiltrados.length-1;p++){
			
			for(n=objJSONUltimoFiltro.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				var columnas= new Array();
				for(var aux in objJSONUltimoFiltro[0])  {
					columnas.push(aux);
				}
				var banderaVisible=false;
				
				for(x=0;x<columnas.length;x++){
					//if(esDatoFiltrado(arrayCamposFiltrados[p], eval('objJSONTemp[n].'+arrayCamposFiltrados[p]))){
					if(esDatoFiltrado(columnas[x], eval('objJSONUltimoFiltro[n].'+columnas[x]))){
						banderaVisible=true;
					}
					
				}
				if(!banderaVisible){
					removeByIndex(objJSONUltimoFiltro,n);
				}
				
			}
		}
		var strDatUlt="";
	
	
		if(arrayCamposFiltrados.length>0){
			var ultimoCampoFil = arrayCamposFiltrados[arrayCamposFiltrados.length-1];
		
			for(z=0;z<objJSONUltimoFiltro.length;z++){



				if(!buscarElementos(arrayUltimoFiltro,eval('objJSONUltimoFiltro[z].'+ultimoCampoFil))){
					arrayUltimoFiltro.push(eval('objJSONUltimoFiltro[z].'+ultimoCampoFil));
					strDatUlt+="<br>"+eval('objJSONUltimoFiltro[z].'+ultimoCampoFil)+"";
				}
			}
		}
		
		
		document.getElementById('divUltimoFiltro').innerHTML=strDatUlt;
	}
	
	function refreshFiltroTabla(){
		
		var banRefresh=false;
		
		var StrArray="";
		var table=document.getElementById("tablaDat");
	
		var Parent = document.getElementById("tablaDat");
		var l=0;
		for(var i = table.rows.length - 1; i >= 0; i--){
			table.deleteRow(i);
		}
		objJSONTemp=eval('(' + datoJSON + ')');
	//	alert("objJSONTemp.length"+objJSONTemp.length);
		for (var p=0;p<arrayCamposFiltrados.length;p++){
			
			for(n=objJSONTemp.length-1;n>=0;n--){
				
				idx=n+1;
				var cad1="";
				
				var cadena="";
				
				var j=0;
				var columnas= new Array();
				for(var aux in objJSONTemp[0])  {
					columnas.push(aux);
				}
				var banderaVisible=false;
				
				//for(x=0;x<columnas.length;x++){
					//if(esDatoFiltrado(arrayCamposFiltrados[p], eval('objJSONTemp[n].'+arrayCamposFiltrados[p]))){
					if(esDatoFiltrado(arrayCamposFiltrados[p], eval('objJSONTemp[n].'+arrayCamposFiltrados[p]))){
						banderaVisible=true;
					}
					
				//}
				if(!banderaVisible){
					removeByIndex(objJSONTemp,n);
				}
				
			}
		}
		
		
	
	}
	function pintarTabla(){
		var table=document.getElementById("tablaDatHeader");	
		for(var o = table.rows.length - 1; o >= 0; o--){
			table.deleteRow(o);
		}
		agregarHeaderRow(table,objJSON,0);
		for(v=0;v<objJSONTemp.length;v++){
			
			agregarRowFormat("tablaDat",objJSONTemp,v);
			
		}
		//document.getElementById('apDiv3').innerHTML=StrArray;
	}
	function removeByIndex(arr, index) {
		arr.splice(index, 1);
	}
	function cargarFiltro(objJSON,campoFiltro){
			ocultarFiltros(objJSON);
			document.getElementById('divPrinVisFiltro'+campoFiltro).style.display="";

			var arrayFiltro=new Array();
			for (i=0;i<objJSON.length;i++){
					var dato= eval('objJSON[i].'+campoFiltro+'');
					
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
	
	function ocultarDivFiltro(campoFiltro){

		document.getElementById(campoFiltro).style.display='none';	
	}
	function agregarCelda(row,nameColumna,j,objJSON){
		var strDivFiltro="";
		var strDiv="";
		strDivFiltro="<div style='position:absolute;' ><div id='divPrinVisFiltro" + nameColumna + "' style='display:none'  class='divPrinVisFiltro'> <div id='divSecVisFiltro'><div id='divFvisFiltro'><img src='img/f.jpg' name='Imagen13' width='12' height='13' border='0' id='Imagen13' /></div><img src='img/filtro-secundario.jpg' width='150' height='198' /> <div id='divLiDeFiltro'><img src='img/linea-degradado-filtro.jpg' width='148' height='3' /></div><div id='divXvisFiltro'><img src='img/x.jpg' width='11' height='12' /></div> <div class='divInVisFiltro' id='divInVisFiltro" + nameColumna + "'>";
		strDivFiltro+="<div id='divConVFil'> <div id='divVeriFiltro'> <input type='checkbox' name='checkbox' id='checkbox_"+nameColumna+"_todos' value='Todos' onclick='seleccionarTodos(\""+ nameColumna +"\")'/> </div> <div  class='tipoIntroFil' id='divInfFiltro'>Todos</div> </div> ";
		var arrayFiltro=new Array();
			for (i=0;i<objJSON.length;i++){
					var dato= eval('objJSON[i].'+nameColumna+'');
					
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
		
		strDivFiltro+=" </div>  </div>  <div id='divminFiltro' ><img src='img/min.jpg' name='Imagen6' width='12' height='3' border='0' id='Imagen6' /></div>  <div id='divAcepFiltro'>    <div class='tipoBlanFiltro' id='divAcTipFiltro' onclick='aplicarFiltro(\"" + nameColumna + "\")'>      <div align='center'>Aceptar</div>    </div>  <img src='img/barrita_total.jpg' width='62' height='20' /></div>  <div id='divAZviFiltro'><img src='img/az.jpg' name='Imagen11' width='34' height='15' border='0' id='Imagen11' /></div>  <img src='img/filtro-fondo.jpg' width='172' height='286' />  <div id='divZAvisFiltro'><img src='img/za.jpg' name='Imagen12' width='34' height='15' border='0' id='Imagen12' /></div>  <div id='divCanFiltro'><img src='img/barrita_total.jpg' width='62' height='20' />    <div class='tipoBlanFiltro' id='divCanTipoFiltro'>    <div align='center'>Cancelar</div>  </div></div><div id='divMaxFiltro'><img src='img/max.jpg' name='Imagen5' width='10' height='8' border='0' id='Imagen5' /></div><div id='divCeFiltro'  ><img src='img/x-simple.jpg' name='Imagen14' onclick=\"ocultarDiv('divPrinVisFiltro" + nameColumna + "')\" width='8' height='8' border='0' id='Imagen14' /></div></div></div>";
		
		if(j==0 && document.getElementById("verFoto").checked){
			var cell=row.insertCell(j);cell.innerHTML="<div style='position:realtive;' ></div><div style='position:relative;'  >Foto   </div>";	
			cell.setAttribute("class", "classColumnHFoto"); //For Most Browsers
			cell.setAttribute("className", "classColumnHFoto");
			
		}
		t=j;
		if(document.getElementById("verFoto").checked){
			t=j+1;
		}
		
		var cell=row.insertCell(t);cell.innerHTML="<div style='position:realtive;' ></div><div id='divCelda"+ nameColumna +"' style='position:relative;' onclick='cargarFiltro(objJSON ,\"" + nameColumna + "\")' >"+ nameColumna + " <img  id='imgFiltro"+nameColumna+"' src='img/icono-filtro.jpg'> </div>" +  strDivFiltro + " ";
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
	function agregarValorCelda(cadena,nameColumna,j,objJSON){
		var strDivFiltro="";
		v=j+1;
		var cell=row.insertCell(v);cell.innerHTML=nameColumna;
	}
	function agregarFotoCelda(){
		var cell=row.insertCell(0);cell.innerHTML="<td>Foto</td>";
	}
	function agregarHeaderRow(table,objJSONt,i){

			var row=table.insertRow(0);
			row.setAttribute("class", "claseRowHeader"); //For Most Browsers
			row.setAttribute("className", "claseRowHeader");
			var j=0;
			var columnas= new Array();
			for(var aux in objJSON[0])  {

				columnas.push(aux);
			
			}
			
			for(i=0;i<columnas.length;i++){
				agregarCelda(row,columnas[i],i,objJSON);
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
			$("#tablaDat tbody").append(cadena);
			
			*/
			
	}
	function ocultarFiltros(objJSON){
		var columnas= new Array();
		for(var aux in objJSON[0])  {
			columnas.push(aux);
		}
		for(i=0;i<columnas.length;i++){
			document.getElementById("divPrinVisFiltro" + columnas[i] ).style.display='none';
		}
		
	}
	function agregarRowFormat(tabla,objJSONt,i){
			idx=i+1;
			
			cadena="";
			var clase ="";
			if((idx%2)==0){
				clase="claseRowPar";
  			    cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOver');this.setAttribute('className', 'claseRowMouseOver'); \"  onmouseout=\" this.setAttribute('class', 'claseRowPar');this.setAttribute('className', 'claseRowPar'); \">";
			}
			else{
				clase="claseRowImpar";
				 cadena = "<tr class="+ clase +" id='row"+ idx +"' onmouseover=\" this.setAttribute('class', 'claseRowMouseOver');this.setAttribute('className', 'claseRowMouseOver'); \"  onmouseout=\" this.setAttribute('class', 'claseRowImpar');this.setAttribute('className', 'claseRowImpar'); \">";			}
 		   
		
		//	cadena += "<table id='tabla"+ idx +"' onmouseover=\"document.getElementById('tabla"+ idx +"' ).style.backgroundColor='#CCCCCC';\" onmouseout=\"document.getElementById('tabla"+ idx +"').style.backgroundColor='#FFFFFF'\">";
			var j=0;
			var columnas= new Array();
			for(var aux in objJSONt[0])  {

				columnas.push(aux);
			
			}
			if(document.getElementById("verFoto").checked){
				cadena = cadena + "<td class='classColumnFoto'><img src='http://201.120.55.76/imagenes_system/muestras/miniminis/"+nameFotoImageGif(objJSONt[i].Estilo,objJSONt[i].Material,objJSONt[i].Color)+"' width='48' height='48'></td>";
			}
			for(x=0;x<columnas.length;x++){
				
				cadena = cadena + "<td class='classColumn"+ columnas[x] +"'>" + eval('objJSONt[i].'+columnas[x]) + "</td>";
				
			}
			cadena += "</tr>";

			$("#tablaDat").append(cadena);
			
		/*	 var valor ="";
             valor +="<div id='divTableDatRow"+idx+"'>";
             valor +="<table class='tablaDatos' id='TableDatRow"+idx+"'>";
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
			$("#tablaDat tbody").append(cadena);
	}

	function esDatoFiltrado(campoFiltro, datoFiltro){
		var cant=arrayFiltrosAplicados.length;
		var ban=false;
		for (var i=0;i<cant;i++){
			if(arrayFiltrosAplicados[i][0]==campoFiltro && arrayFiltrosAplicados[i][1]==datoFiltro){
				ban=true;
				return ban;
			}	
		}
		return ban;
	}
	