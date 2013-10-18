// Documento JavaScript
// Esta funci�n cargar� las paginas
function llamarasincronoJSON(url){
var pagina_requerida = false
if (window.XMLHttpRequest) {// Si es Mozilla, Safari etc
pagina_requerida = new XMLHttpRequest()
} else if (window.ActiveXObject){ // pero si es IE
try {
pagina_requerida = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){ // en caso que sea una versi�n antigua
try{
pagina_requerida = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
pagina_requerida.onreadystatechange=function(){ // funci�n de respuesta
cargarpaginaJSON(pagina_requerida)
}
pagina_requerida.open('GET', url, true) // asignamos los m�todos open y send
pagina_requerida.send(null)
}
// todo es correcto y ha llegado el momento de poner la informaci�n requerida
// en su sitio en la pagina xhtml
function cargarpaginaJSON(pagina_requerida){
	if (pagina_requerida.readyState == 4 && (pagina_requerida.status==200 || window.location.href.indexOf("http")==-1)){
		return pagina_requerida.responseText;
	}
	
}