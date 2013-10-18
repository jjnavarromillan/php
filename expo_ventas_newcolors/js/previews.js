idxPagSiguemeVista=1;
	function firsttPagSiguemeVista(){
		idxPagSiguemeVista=1;
		document.getElementById('imgFotoGaleriaPasarela').src="img/siguenos/pasarela/pasarela-gd/evento-"+idxPagSiguemeVista+".jpg";
	}
	function nextPagSiguemeVista(){
		if(idxPagSiguemeVista<20){
			idxPagSiguemeVista++;
			document.getElementById('imgFotoGaleriaPasarela').src="img/siguenos/pasarela/pasarela-gd/evento-"+idxPagSiguemeVista+".jpg";
		}
	}
	function previewPagSiguemeVista(){
		if(idxPagSiguemeVista>1){
			idxPagSiguemeVista--;	
			document.getElementById('imgFotoGaleriaPasarela').src="img/siguenos/pasarela/pasarela-gd/evento-"+idxPagSiguemeVista+".jpg";
		}
	}
	/**  LOCATION  **/
	idxPagSiguemeLocationComVista=1;
	function firsttPagSiguemeLocationComVista(){
		idxPagSiguemeLocationComVista=1;
		document.getElementById('imgFotoGaleriaLocation').src="img/siguenos/nacional/location/location-gd/evento-"+idxPagSiguemeLocationComVista+".jpg";
	}
	function nextPagSiguemeLocationComVista(){
		if(idxPagSiguemeLocationComVista<12){
			idxPagSiguemeLocationComVista++;
			document.getElementById('imgFotoGaleriaLocation').src="img/siguenos/nacional/location/location-gd/evento-"+idxPagSiguemeLocationComVista+".jpg";
		}
	}
	function previewPagSiguemeLocationComVista(){
		if(idxPagSiguemeLocationComVista>1){
			idxPagSiguemeLocationComVista--;	
			document.getElementById('imgFotoGaleriaLocation').src="img/siguenos/nacional/location/location-gd/evento-"+idxPagSiguemeLocationComVista+".jpg";
		}
	}
	
	/**  STUDIO  **/
	/*
	idxPagSiguemeStudioComVista=1;
	function firsttPagSiguemeStudioComVista(){
		
		idxPagSiguemeStudioComVista=1;
		document.getElementById('imgFotoGaleriaStudio').src="img/siguenos/nacional/studio/studio-gd/evento-"+idxPagSiguemeStudioComVista+".jpg";
	}
	function nextPagSiguemeStudioComVista(){
		
		if(idxPagSiguemeStudioComVista<10){
			idxPagSiguemeStudioComVista++;
			document.getElementById('imgFotoGaleriaStudio').src="img/siguenos/nacional/studio/studio-gd/evento-"+idxPagSiguemeStudioComVista+".jpg";
		}
	}
	function previewPagSiguemeStudioComVista(){
		if(idxPagSiguemeStudioComVista>1){
			idxPagSiguemeStudioComVista--;	
			document.getElementById('imgFotoGaleriaStudio').src="img/siguenos/nacional/studio/studio-gd/evento-"+idxPagSiguemeStudioComVista+".jpg";
		}
	}*/
	/**  STUDIO 2 **/
	idxPagSiguemeStudio2ComVista=11;
	function firsttPagSiguemeStudioComVista(){
		idxPagSiguemeStudioComVista=11;
		document.getElementById('imgFotoGaleriaStudio2').src="img/siguenos/nacional/studio/studio-gd/studio-h/evento-"+idxPagSiguemeStudio2ComVista+".jpg";
	}
	function nextPagSiguemeStudio2ComVista(){
		if(idxPagSiguemeStudio2ComVista<16){
			idxPagSiguemeStudioComVista++;
			document.getElementById('imgFotoGaleriaStudio2').src="img/siguenos/nacional/studio/studio-gd/studio-h/evento-"+idxPagSiguemeStudio2ComVista+".jpg";
		}
	}
	function previewPagSiguemeStudio2ComVista(){
		if(idxPagSiguemeStudio2ComVista>11){
			idxPagSiguemeStudio2ComVista--;	
			document.getElementById('imgFotoGaleriaStudio2').src="img/siguenos/nacional/studio/studio-gd/studio-h/evento-"+idxPagSiguemeStudio2ComVista+".jpg";
		}
	}
	
	/**  EDITORIAL **/
	idxPagSiguemeEditorialComVista=1;
	function firsttPagSiguemeEditorialComVista(){
		idxPagSiguemeEditorialComVista=1;
		document.getElementById('imgFotoGaleria').src="img/siguenos/editorial/editorial-gd/evento-"+idxPagSiguemeEditorialComVista+".jpg";
		document.getElementById('avPag').innerHTML = ""+idxPagSiguemeEditorialComVista;
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/editorial/editorial-gd/editorial"+idxPagSiguemeEditorialComVista+".html",
			   { },
				function(data){
					document.getElementById('divLeTipoStudioEditorial').src=data;
				}
			);	
	}
	function nextPagSiguemeEditorialComVista(){
		
		if(idxPagSiguemeEditorialComVista<5){
			idxPagSiguemeEditorialComVista++;
			document.getElementById('imgFotoGaleria').src="img/siguenos/editorial/editorial-gd/evento-"+idxPagSiguemeEditorialComVista+".jpg";

		}
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/editorial/editorial-gd/editorial"+idxPagSiguemeEditorialComVista+".html",
			   { },
				function(data){
					document.getElementById('divLeTipoStudioEditorial').src=data;
				}
			);	
		document.getElementById('avPag').innerHTML = ""+idxPagSiguemeEditorialComVista;
	}
	function previewPagSiguemeEditorialComVista(){
		
		if(idxPagSiguemeEditorialComVista>1){
			idxPagSiguemeEditorialComVista--;	
			document.getElementById('imgFotoGaleria').src="img/siguenos/editorial/editorial-gd/evento-"+idxPagSiguemeEditorialComVista+".jpg";
		}
		document.getElementById('avPag').innerHTML = ""+idxPagSiguemeEditorialComVista;
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/editorial/editorial-gd/editorial"+idxPagSiguemeEditorialComVista+".html",
		   { },
			function(data){
				document.getElementById('divLeTipoStudioEditorial').innerHTML=data;
			}
		);	
	}
	
	/**  STUDIO **/
	idxPagSiguemeStudioComVista=1;
	function firsttPagSiguemeStudioComVista(){
		idxPagSiguemeStudioComVista=1;
		document.getElementById('imgFotoGaleriaStudio').src="img/siguenos/nacional/studio/studio-gd/evento-"+idxPagSiguemeEditorialComVista+".jpg";
		document.getElementById('avPagStudio').innerHTML = ""+idxPagSiguemeStudioComVista;
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/nacional/studio/studio-gd/studio"+idxPagSiguemeStudioComVista+".html",
			   { },
				function(data){
					document.getElementById('divLeTipoStudioEditorial').src=data;
				}
			);	
	}
	function nextPagSiguemeStudioComVista(){
		
		if(idxPagSiguemeStudioComVista<10){
			idxPagSiguemeStudioComVista++;
			document.getElementById('imgFotoGaleriaStudio').src="img/siguenos/nacional/studio/studio-gd/evento-"+idxPagSiguemeStudioComVista+".jpg";

		}
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/nacional/studio/studio-gd/studio"+idxPagSiguemeStudioComVista+".html",
			   { },
				function(data){
					document.getElementById('divLeTipoStudioEditorial').src=data;
				}
			);	
		document.getElementById('avPagStudio').innerHTML = ""+idxPagSiguemeStudioComVista;
	}
	function previewPagSiguemeStudioComVista(){
		
		if(idxPagSiguemeStudioComVista>1){
			idxPagSiguemeStudioComVista--;	
			document.getElementById('imgFotoGaleriaStudio').src="img/siguenos/nacional/studio/studio-gd/evento-"+idxPagSiguemeStudioComVista+".jpg";
		}
		document.getElementById('avPagStudio').innerHTML = ""+idxPagSiguemeStudioComVista;
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/nacional/studio/studio-gd/studio"+idxPagSiguemeStudioComVista+".html",
		   { },
			function(data){
				document.getElementById('divLeTipoStudioEditorial').innerHTML=data;
			}
		);	
	}
	
	
	/* PASARELA */
	
	idxPagPasarela=1;
	function firsttPagPasarela(){
		idxPagPasarela=1;
		document.getElementById('imgFotoGaleriaPasarela').src="img/siguenos/pasarela/pasarela-gd/evento-"+idxPagPasarela+".jpg";
		document.getElementById('avPagGaleria').innerHTML = ""+idxPagPasarela;
		
	}
	function nextPagPasarela(){
		
		if(idxPagPasarela<20){
			idxPagPasarela++;
			document.getElementById('imgFotoGaleriaPasarela').src="img/siguenos/pasarela/pasarela-gd/evento-"+idxPagPasarela+".jpg";

		}
			
		document.getElementById('avPagGaleria').innerHTML = ""+idxPagPasarela;
	}
	function previewPagParalela(){
		
		if(idxPagPasarela>1){
			idxPagPasarela--;	
			document.getElementById('imgFotoGaleriaPasarela').src="img/siguenos/pasarela/pasarela-gd/evento-"+idxPagPasarela+".jpg";
		}
		document.getElementById('avPagGaleria').innerHTML = ""+idxPagPasarela;
			
	}
	
	/* EVENTOS */
	
	
	idxPagEventos=1;
	function firsttPagEventos(){
		idxPagEventos=1;
		document.getElementById('imgFotoGaleria').src="img/siguenos/eventos/eventos-gd/evento-"+idxPagEventos+".jpg";
		document.getElementById('avPag').innerHTML = ""+idxPagEventos;
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/editorial/editorial-gd/editorial"+idxPagEventos+".html",
			   { },
				function(data){
					document.getElementById('divLeTipoStudioEditorial').src=data;
				}
			);	
	}
	function nextPagEventos(){
		
		if(idxPagEventos<4){
			idxPagEventos++;
			document.getElementById('imgFotoGaleria').src="img/siguenos/eventos/eventos-gd/evento-"+idxPagEventos+".jpg";

		}
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/eventos/eventos-gd/evento"+idxPagEventos+".html",
			   { },
				function(data){
					document.getElementById('divLeTipoStudioEditorial').src=data;
				}
			);	
		document.getElementById('avPag').innerHTML = ""+idxPagEventos;
	}
	function previewPagEventos(){
		
		if(idxPagEventos>1){
			idxPagEventos--;	
			document.getElementById('imgFotoGaleria').src="img/siguenos/eventos/eventos-gd/evento-"+idxPagEventos+".jpg";
		}
		document.getElementById('avPag').innerHTML = ""+idxPagEventos;
		document.getElementById('divLeTipoStudioEditorial').innerHTML="";
		$.get("img/siguenos/eventos/eventos-gd/evento"+idxPagEventos+".html",
		   { },
			function(data){
				document.getElementById('divLeTipoStudioEditorial').innerHTML=data;
			}
		);	
	}