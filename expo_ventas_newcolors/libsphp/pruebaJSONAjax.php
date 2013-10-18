

<link rel="stylesheet" type="text/css" href="../carrito/vista_filtro.css">
<script language="javascript" src="../js/codigo.js"></script>
<script language="javascript">
	var objJSON;
	function cargarJSON(){
		var datosJSON  = new Array();
		
		llamarasincrono('pruebaPhpJSON.php','apDiv1');
		setTimeout("getDatosJSON();",1000);
	}
	function getDatosJSON(){
		var datoJSON=document.getElementById('apDiv1').innerHTML;
		objJSON= eval('(' + datoJSON + ')');
		var StrArray="";
		var table=document.getElementById("tablaDat");
		//getIndexCampo(objJSON);
		agregarHeaderRow(table,objJSON,0);
		for(i=0;i<objJSON.length;i++){
			
			agregarRow(table,objJSON,i);
			
		}
		document.getElementById('apDiv3').innerHTML=StrArray;
		
	}
	
	function cargarFiltro(objJSON,campoFiltro){
			document.getElementById('divPrinVisFiltro'+campoFiltro).style.display="";
			var strJSONFiltro="[{";
			var arrayFiltro=new Array();
			for (i=0;i<objJSON.length;i++){
					var dato= eval('objJSON[i].'+campoFiltro+'');
					
					if(arrayFiltro.indexOf(dato)<0){
						arrayFiltro.push(dato);
					}
			}
			arrayFiltro.sort();
			strFiltros="";
			for(i=0;i<arrayFiltro.length;i++){
				strFiltros +=arrayFiltro[i] + "<br>";
			}
			document.getElementById('apDiv3').innerHTML=strFiltros;

			return arrayFiltro;
	}
	function ocultarDivFiltro(campoFiltro){
		alert(campoFiltro);
		document.getElementById(campoFiltro).style.display='none';	
	}
	function agregarCelda(row,nameColumna,j,objJSON){
		var strDivFiltro="";
		strDivFiltro="<div id='divPrinVisFiltro" + nameColumna + "' style='display:none'  class='divPrinVisFiltro'> <div id='divSecVisFiltro'><div id='divFvisFiltro'><img src='../carrito/img/f.jpg' name='Imagen13' width='12' height='13' border='0' id='Imagen13' /></div><img src='../carrito/img/filtro-secundario.jpg' width='150' height='198' /> <div id='divLiDeFiltro'><img src='../carrito/img/linea-degradado-filtro.jpg' width='148' height='3' /></div><div id='divXvisFiltro'><img src='../carrito/img/x.jpg' width='11' height='12' /></div> <div id='divInVisFiltro'><div id='divConVFil'> <div id='divVeriFiltro'>";
		strDivFiltro+="<label> <input type='checkbox' name='checkbox' id='checkbox' /> </label></div> <div  class='tipoIntroFil' id='divInfFiltro'>Africa Leño</div> </div>     <div id='divConVFil'>     <div id='divVeriFiltro'>        <label>          <input type='checkbox' name='checkbox' id='checkbox' />        </label>      </div>      <div  class='tipoIntroFil' id='divInfFiltro'>Africa Leño</div>    </div>  </div>  </div>  <div id='divminFiltro'><img src='../carrito/img/min.jpg' name='Imagen6' width='12' height='3' border='0' id='Imagen6' /></div>  <div id='divAcepFiltro'>    <div class='tipoBlanFiltro' id='divAcTipFiltro'>      <div align='center'>Aceptar</div>    </div>  <img src='../carrito/img/barrita_total.jpg' width='62' height='20' /></div>  <div id='divAZviFiltro'><img src='../carrito/img/az.jpg' name='Imagen11' width='34' height='15' border='0' id='Imagen11' /></div>  <img src='../carrito/img/filtro-fondo.jpg' width='172' height='286' />  <div id='divZAvisFiltro'><img src='../carrito/img/za.jpg' name='Imagen12' width='34' height='15' border='0' id='Imagen12' /></div>  <div id='divCanFiltro'><img src='../carrito/img/barrita_total.jpg' width='62' height='20' />    <div class='tipoBlanFiltro' id='divCanTipoFiltro'>    <div align='center'>Cancelar</div>  </div></div><div id='divMaxFiltro'><img src='../carrito/img/max.jpg' name='Imagen5' width='10' height='8' border='0' id='Imagen5' /></div><div id='divCeFiltro' onclick=\"ocultarDivFiltro('divPrinVisFiltro" + nameColumna + "');\" ><img src='../carrito/img/x-simple.jpg' name='Imagen14' width='8' height='8' border='0' id='Imagen14' /></div></div>";
		var cell=row.insertCell(j);cell.innerHTML="<div style='position:realtive;' ></div><div style='position:relative;' onclick='cargarFiltro(objJSON ,\"" + nameColumna + "\")' > "+ nameColumna + " <img src='../carrito/img/icono-filtro.jpg' width='8' height='6' /> " +  strDivFiltro + " </div>";
	}
	function agregarValorCelda(row,nameColumna,j,objJSON){
		var strDivFiltro="";
		var cell=row.insertCell(j);cell.innerHTML=nameColumna;
	}
	function agregarHeaderRow(table,objJSON,i){

			var row=table.insertRow(0);
			var j=0;
			var columnas= new Array();
			for(var aux in objJSON[0])  {

				columnas.push(aux);
			
			}

			for(i=0;i<columnas.length;i++){
				agregarCelda(row,columnas[i],i,objJSON);
			}
			
	}
	function hola(){
		alert("Hola");
	}
	function agregarRow(table,objJSON,i){
			idx=i+1;
			var row=table.insertRow(idx);
			row.onClick="javascript: hola();";
			var j=0;
			var columnas= new Array();
			for(var aux in objJSON[0])  {

				columnas.push(aux);
			
			}
			
				for(x=0;x<columnas.length;x++){
					agregarValorCelda(row,eval('objJSON[i].'+columnas[x]),x,objJSON);
				}
			//}
			/*
			
			var cell1=row.insertCell(0);cell1.innerHTML=objJSON[i].idPed;
			var cell2=row.insertCell(1);cell2.innerHTML=objJSON[i].idPedDet;
			var cell3=row.insertCell(2);cell3.innerHTML=objJSON[i].idEstilo;
			var cell4=row.insertCell(3);cell4.innerHTML=objJSON[i].Linea;
			var cell5=row.insertCell(4);cell5.innerHTML=objJSON[i].Estilo;
			var cell6=row.insertCell(5);cell6.innerHTML=objJSON[i].Material;
			var cell7=row.insertCell(6);cell7.innerHTML=objJSON[i].Color;
			var cell8=row.insertCell(7);cell8.innerHTML=objJSON[i].Precio;
			var cell9=row.insertCell(8);cell9.innerHTML=objJSON[i].clvPaq;
			var cell10=row.insertCell(9);cell10.innerHTML=objJSON[i].cantPaq;
			var cell11=row.insertCell(10);cell11.innerHTML=objJSON[i].Pares;
			var cell12=row.insertCell(11);cell12.innerHTML=objJSON[i].Total;
			var cell13=row.insertCell(12);cell13.innerHTML=objJSON[i].IdDatCli;
			var cell14=row.insertCell(13);cell14.innerHTML=objJSON[i].Nombre;
			var cell15=row.insertCell(14);cell15.innerHTML=objJSON[i].Tienda;

			var cell16=row.insertCell(15);cell16.innerHTML=objJSON[i].Poblacion;
			var cell17=row.insertCell(16);cell17.innerHTML=objJSON[i].Estado;
			var cell18=row.insertCell(17);cell18.innerHTML=objJSON[i].seccionCatalogo;
			var cell19=row.insertCell(18);cell19.innerHTML=objJSON[i].fechaPedido;
			var cell20=row.insertCell(19);cell20.innerHTML=objJSON[i].categoria;
			var cell21=row.insertCell(20);cell21.innerHTML=objJSON[i].subcategoria;
			var cell22=row.insertCell(21);cell22.innerHTML=objJSON[i].fechaSurtido;
			var cell23=row.insertCell(22);cell23.innerHTML=objJSON[i].Doc;
			var cell24=row.insertCell(23);cell24.innerHTML=objJSON[i].fechaDoc;
			*/
			
		
	}
	
	
</script>

<style type="text/css">
<!--
.tablaDatos{
	
	font-size:9px
}
#apDiv1 {
	font-size:9px;
	position:absolute;
	left:133px;
	top:75px;
	width:527px;
	height:153px;
	z-index:1;
	overflow:auto;
}
#apDiv2 {
	position:absolute;
	left:586px;
	top:5px;
	width:136px;
	height:29px;
	z-index:2;
	text-align: center;
}
#apDiv3 {
	font-size:9px;
	position:absolute;
	width:186px;
	height:153px;
	z-index:3;
	left: 886px;
	top: 72px;
	overflow:auto;
}
#apDiv4 {
	position:absolute;
	left:132px;
	top:245px;
	width:1019px;
	height:71px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	width:132px;
	height:26px;
	z-index:5;
	left: 913px;
	top: 43px;
	text-align: center;
}
-->
</style>
</head>

<body>
<div id="apDiv1"></div>
<div id="apDiv3"></div>
<div id="apDiv2">
  <label>
    <input type="submit" name="btnValidar" id="btnValidar" value="Enviar" onclick="cargarJSON();" />
  </label>
</div>
<div id="apDiv4">
  <table width="900" border="0" id="tablaDat" class="tablaDatos" >
    
  </table>
</div>
<div id="apDiv5">Filtro</div>
</body>
</html>
