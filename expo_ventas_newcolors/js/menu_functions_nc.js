	var menuPresionado="";
	var arrayMenuOptions=new Array();
	arrayMenuOptions.push("imgMenuIndexInicio");
	arrayMenuOptions.push("imgMenuIndexSiguenos");
	arrayMenuOptions.push("imgMenuIndexTiendaVirtual");
	arrayMenuOptions.push("imgMenuIndexTendencias");
	arrayMenuOptions.push("imgMenuIndexContacto");
	arrayMenuOptions.push("imgMenuIndexEmpresa");
	arrayMenuOptions.push("imgMenuIndexDistribuidores");
	arrayMenuOptions.push("imgMenuIndexAdministracion");
	//	"menu/menu/"
	
	function setArrayMenu(){
		
		
	}
	function menuPrincipalNormal(menuSeleccionado,pathFile){
			quitarSeleccion(pathFile);
			document.getElementById(menuSeleccionado).src = pathFile + menuSeleccionado +".png";
			
	}
	function menuPrincipalOver(arrayMenuOptions,menuSeleccionado,pathFile){
			quitarSeleccion(pathFile);
			document.getElementById(menuSeleccionado).src =pathFile+ menuSeleccionado +"Over.png";
	}
	function menuPrincipalClick(menuSeleccionado,pathFile){
		quitarSeleccion(pathFile);
		document.getElementById(menuSeleccionado).src=pathFile + menuSeleccionado +"Click.png";
		
	}
	function quitarSeleccion(pathFile){
			
			var optionMenu="";
			for (var i=0;i<arrayMenuOptions.length;i++){
				optionMenu = arrayMenuOptions[i];

				document.getElementById(optionMenu).src = pathFile + optionMenu +".png";
			}
	}