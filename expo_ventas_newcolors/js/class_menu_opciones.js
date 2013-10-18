	/*arrayMenuOptions.push("imgMenuIndexColecciones");
	arrayMenuOptions.push("imgMenuIndexSiguenos");
	arrayMenuOptions.push("imgMenuIndexMuestrario");
	arrayMenuOptions.push("imgMenuIndexBodega");
	arrayMenuOptions.push("imgMenuIndexTiendaVirtual");
	arrayMenuOptions.push("imgMenuIndexTendencias");
	arrayMenuOptions.push("imgMenuIndexContacto");
	arrayMenuOptions.push("imgMenuIndexEmpresa");*/
	var menuDeIndex= new class_menu_presionado();
	var menuDeSiguenos= new class_menu_presionado();
	function menuIndex(){
		
		menuDeIndex.addOptionToMenu("imgMenuIndexColecciones");
		menuDeIndex.addOptionToMenu("imgMenuIndexSiguenos");
		menuDeIndex.addOptionToMenu("imgMenuIndexMuestrario");
		menuDeIndex.addOptionToMenu("imgMenuIndexBodega");
		menuDeIndex.addOptionToMenu("imgMenuIndexTiendaVirtual");
		menuDeIndex.addOptionToMenu("imgMenuIndexTendencias");
		menuDeIndex.addOptionToMenu("imgMenuIndexEmpresa");
		menuDeIndex.addOptionToMenu("imgMenuIndexContacto");
		menuDeIndex.setPath("menu/menu/");
		
	/*	
		menuDeSiguenos.addOptionToMenu("imgCampanaNacional");
		menuDeSiguenos.addOptionToMenu("imgEditoriales");
		menuDeSiguenos.addOptionToMenu("imgPasarela");
		menuDeSiguenos.addOptionToMenu("imgEventos");
		menuDeSiguenos.setPath("menu/menu/");*/
		
		
		
	}
	function class_menu_presionado(){
		
	}
	class_menu_presionado.prototype={
		menuPresionado:"",
		arrayMenuOptions:new Array(),
		pathFile:"",
		addOptionToMenu:function(optionmenu){
			this.arrayMenuOptions.push(optionmenu);
		},
		setPath:function(){
			this.path
		},
		menuPrincipalNormal:function(menuSeleccionado){
				quitarSeleccion();
				document.getElementById(menuSeleccionado).src = this.pathFile + menuSeleccionado +".png";
				
		},
		menuPrincipalOver:function(menuSeleccionado){
				quitarSeleccion(this.pathFile);
				document.getElementById(menuSeleccionado).src =this.pathFile+ menuSeleccionado +"Over.png";
		},
		menuPrincipalClick:function(menuSeleccionado){
			quitarSeleccion();
			document.getElementById(menuSeleccionado).src=this.pathFile + menuSeleccionado +"Click.png";
			
		},
		quitarSeleccion:function(){
				
				var optionMenu="";
				for (var i=0;i<this.arrayMenuOptions.length;i++){
					optionMenu = this.arrayMenuOptions[i];
	
					document.getElementById(optionMenu).src = this.pathFile + optionMenu +".png";
				}
		}
	}

	menuIndex();