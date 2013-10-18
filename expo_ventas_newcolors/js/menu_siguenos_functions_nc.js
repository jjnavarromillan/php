//	var menuPresionadoSig="";
	var arrayMenuOptionsSig=new Array();
	arrayMenuOptionsSig.push("imgMenuSiguenosCampanaNacional");
	arrayMenuOptionsSig.push("imgMenuSiguenosEditoriales");
	arrayMenuOptionsSig.push("imgMenuSiguenosPasarela");
	arrayMenuOptionsSig.push("imgMenuSiguenosEventos");
	
	//	"menu/menu/"
	
	function setArrayMenu(){
			
	}
	function menuPrincipalNormalSig(menuSeleccionado,pathFile){
			quitarSeleccionSig(pathFile);
			document.getElementById(menuSeleccionado).src = pathFile + menuSeleccionado +".png";
			
	}
	function menuPrincipalOverSig(arrayMenuOptions,menuSeleccionado,pathFile){
			quitarSeleccionSig(pathFile);
			document.getElementById(menuSeleccionado).src =pathFile+ menuSeleccionado +"Over.png";
	}
	function menuPrincipalClickSig(menuSeleccionado,pathFile){
		quitarSeleccionSig(pathFile);
		document.getElementById(menuSeleccionado).src=pathFile + menuSeleccionado +"Click.png";
		
	}
	function quitarSeleccionSig(pathFile){
			
			var optionMenu="";
			for (var i=0;i<arrayMenuOptionsSig.length;i++){
				optionMenu = arrayMenuOptionsSig[i];

				document.getElementById(optionMenu).src = pathFile + optionMenu +".png";
			}
	}
	function verCampanaNacional(){
		
		llamarasincrono('siguenos.html','contenido');
		setTimeout("menuPrincipalClickSig('imgMenuSiguenosCampanaNacional','menu/menu/');",1000);
		setTimeout("llamarasincrono('galeria-studio.html','divContenidoSiguenos');",1000);
	}
	
	function verEditorial(){
		
		llamarasincrono('siguenos.html','contenido');
		setTimeout("menuPrincipalClickSig('imgMenuSiguenosEditoriales','menu/menu/');",1000);
		setTimeout("llamarasincrono('galeria-editorial.html','divContenidoSiguenos');",1000);
	}
	
	function verPasarela(){
		
		llamarasincrono('siguenos.html','contenido');
		setTimeout("menuPrincipalClickSig('imgMenuSiguenosPasarela','menu/menu/');",1000);
		setTimeout("llamarasincrono('galeria-pasarela.html','divContenidoSiguenos');",1000);
	}
	
	function verEventos(){
		
		llamarasincrono('siguenos.html','contenido');
		setTimeout("menuPrincipalClickSig('imgMenuSiguenosEventos','menu/menu/');",1000);
		setTimeout("llamarasincrono('galeria-eventos.html','divContenidoSiguenos');",1000);
	}
	