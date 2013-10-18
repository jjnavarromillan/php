        var urlHrefDestino ='';
		var arrayElementsSelected=new Array();
		var tamArrayElementsSelected=0;
        function redirect(){
            
            window.location.href=urlHrefDestino;
            //window.location.href='Hola.html';
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
            
            left = parseInt(findXCoord(evt))-250;
            vtop = parseInt(findYCoord(evt))-100;
            
            div.style.left=left+'px';
            div.style.top=vtop+'px';
             
            
            
        }
        function sacarValor(valor){
            
            tam= valor.length;
            cadenaVal='';
            if(tam>2){
                for (i=0;i<tam-2;i++){
                    cadenaVal+=valor.charAt(i);       
                }
            }
            return cadenaVal;
        } 
		
	
        function calculaTotales(){
           /* var indice = document.frmPopup.ComboNumeracion.selectedIndex 
            var indice = Ext.get('ComboNumeracion').dom.selectedIndex;
			
           numeraciones = document.frmPopup.ComboNumeracion.value 
			var numeraciones = Ext.get('ComboNumeracion').dom.value;
            
            if(numeraciones=='2'){
                Ext.get('txtN2').dom.value='1';
				Ext.get('txtN2m').dom.value='1';
				Ext.get('txtN3').dom.value='1';
				Ext.get('txtN3m').dom.value='1';
				Ext.get('txtN4').dom.value='1';
				Ext.get('txtN4m').dom.value='1';
				Ext.get('txtN5').dom.value='0';
				Ext.get('txtN5m').dom.value='0';
				Ext.get('txtN6').dom.value='0';
				Ext.get('txtN6m').dom.value='0';
            }
            if(numeraciones=='2m'){
                Ext.get('txtN2').dom.value='0';
				Ext.get('txtN2m').dom.value='1';
				Ext.get('txtN3').dom.value='1';
				Ext.get('txtN3m').dom.value='1';
				Ext.get('txtN4').dom.value='1';
				Ext.get('txtN4m').dom.value='1';
				Ext.get('txtN5').dom.value='1';
				Ext.get('txtN5m').dom.value='0';
				Ext.get('txtN6').dom.value='0';
				Ext.get('txtN6m').dom.value='0';
            }
            if(numeraciones=='3'){
                Ext.get('txtN2').dom.value='0';
				Ext.get('txtN2m').dom.value='0';
				Ext.get('txtN3').dom.value='1';
				Ext.get('txtN3m').dom.value='1';
				Ext.get('txtN4').dom.value='1';
				Ext.get('txtN4m').dom.value='1';
				Ext.get('txtN5').dom.value='1';
				Ext.get('txtN5m').dom.value='1';
				Ext.get('txtN6').dom.value='0';
				Ext.get('txtN6m').dom.value='0';
			}
            if(numeraciones=='3m'){
                Ext.get('txtN2').dom.value='0';
				Ext.get('txtN2m').dom.value='0';
				Ext.get('txtN3').dom.value='0';
				Ext.get('txtN3m').dom.value='1';
				Ext.get('txtN4').dom.value='1';
				Ext.get('txtN4m').dom.value='1';
				Ext.get('txtN5').dom.value='1';
				Ext.get('txtN5m').dom.value='1';
				Ext.get('txtN6').dom.value='1';
				Ext.get('txtN6m').dom.value='0';
			}
            if(numeraciones=='4'){
                Ext.get('txtN2').dom.value='0';
				Ext.get('txtN2m').dom.value='0';
				Ext.get('txtN3').dom.value='0';
				Ext.get('txtN3m').dom.value='0';
				Ext.get('txtN4').dom.value='1';
				Ext.get('txtN4m').dom.value='1';
				Ext.get('txtN5').dom.value='1';
				Ext.get('txtN5m').dom.value='1';
				Ext.get('txtN6').dom.value='1';
				Ext.get('txtN6m').dom.value='1';            
			}
            
            cantidad = Ext.get('ComboCantidad').dom.value;
            txtN2=Ext.get('txtN2').dom.value*cantidad;
            txtN2m=Ext.get('txtN2m').dom.value*cantidad;
			txtN3=Ext.get('txtN3').dom.value*cantidad;
            txtN3m=Ext.get('txtN3m').dom.value*cantidad;
			txtN4=Ext.get('txtN4').dom.value*cantidad;
            txtN4m=Ext.get('txtN4m').dom.value*cantidad;
			txtN5=Ext.get('txtN5').dom.value*cantidad;
            txtN5m=Ext.get('txtN5m').dom.value*cantidad;
			txtN6=Ext.get('txtN6').dom.value*cantidad;
            txtN6m=Ext.get('txtN6m').dom.value*cantidad;
			
			Ext.get('txtN2').dom.value=txtN2;
            Ext.get('txtN2m').dom.value=txtN2m;
			Ext.get('txtN3').dom.value=txtN3;
            Ext.get('txtN3m').dom.value=txtN3m;
			Ext.get('txtN4').dom.value=txtN4;
            Ext.get('txtN4m').dom.value=txtN4m;
			Ext.get('txtN5').dom.value=txtN5;
            Ext.get('txtN5m').dom.value=txtN5m;
			Ext.get('txtN6').dom.value=txtN6;
            Ext.get('txtN6m').dom.value=txtN6m;
			
            
           //Ext.get('txtTotalN').dom.value =6*cantidad;

			//Ext.get('lblTotalCompra').dom.innerHTML=parseFloat(Ext.get('txtTotalN').dom.value)* parseFloat(Ext.get('lblPrecio').dom.innerHTML); 

*/
			
        }
        
        function setValueToLabel(lblObjeto,valorObjeto){
            document.getElementById(lblObjeto).innerHTML = valorObjeto;
        }
        
		function extraerDatosLinea(clave){
			var tipoCatalogo  = "";
			tipoCatalogo  = Ext.get('combo').value;
			if(tipoCatalogo =="Inventario"){
				Ext.Ajax.request({
					url : '../carrito/getEstilosLineas.php' , 
					params : { linea: clave },
					method: 'POST',
					success: function ( result, request ) {
						
						Ext.get('cuadroEstilo').dom.innerHTML=result.responseText;
	
					},
					failure: function ( result, request) { 
						Ext.MessageBox.alert('Failed', result.responseText); 
					} 
				});
			}
			else{
				Ext.Ajax.request({
					url : '../carrito/getEstilosLineasInventario.php' , 
					params : { linea: clave },
					method: 'POST',
					success: function ( result, request ) {
						
						Ext.get('cuadroEstilo').dom.innerHTML=result.responseText;
	
					},
					failure: function ( result, request) { 
						Ext.MessageBox.alert('Failed', result.responseText); 
					} 
				});
			}
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
	function selecciona_articulo(idEstilo){
		alert(idEstilo);
		Ext.Ajax.request({
				url : '../carrito/getDatosEstilo.php', 
				params : { idEstilo: idEstilo },
				method: 'GET',
				success: function ( result, request ) {
					var arrayEstilos=new Array();
					arrayEstilos=result.responseText.split(',');
					Ext.get('pupupPedido').dom.value=idEstilo;
					Ext.get('idEstilo').dom.value =idEstilo;
					Ext.get('lblLinea').dom.innerHTML=arrayEstilos[0];
					Ext.get('lblEstilo').dom.innerHTML=arrayEstilos[1];
					Ext.get('lblMaterial').dom.innerHTML=arrayEstilos[2] + " " + arrayEstilos[3];
					
					Ext.get('btnImgEstilo').dom.src="http://www.newcolors.com.mx/img/catalogo/grandes/"+ nameFotoImage(arrayEstilos[1],arrayEstilos[2],arrayEstilos[3]) ;
					Ext.get('lblPrecio').dom.innerHTML=arrayEstilos[4];
					
					

				},
				failure: function ( result, request) { 
					Ext.MessageBox.alert('Failed', result.responseText); 
				} 
		});
		
		Ext.get('pupupPedido').dom.style.display='';
		
		
		
		Ext.get('pupupPedido').dom.style.left='100px';
		Ext.get('pupupPedido').dom.style.top='80px';
		
		
		
		
		//posi
	}
	function selecciona_articulo_inventario(lote){
		alert(idEstilo);
		Ext.Ajax.request({
				url : '../carrito/getDatosLote.php', 
				params : { lote: lote },
				method: 'GET',
				success: function ( result, request ) {
					var arrayEstilos=new Array();
					arrayEstilos=result.responseText.split(',');
					Ext.get('pupupPedido').dom.value=lote;
					Ext.get('idEstilo').dom.value =lote;
					Ext.get('lblLinea').dom.innerHTML=arrayEstilos[0];
					Ext.get('lblEstilo').dom.innerHTML=arrayEstilos[1];
					Ext.get('lblMaterial').dom.innerHTML=arrayEstilos[2] + " " + arrayEstilos[3];
					Ext.get('btnImgEstilo').dom.src="http://www.newcolors.com.mx/img/catalogo/grandes/"+ nameFotoImage(arrayEstilos[1],arrayEstilos[2],arrayEstilos[3]) ;
					Ext.get('lblPrecio').dom.innerHTML=arrayEstilos[4];
					
					

				},
				failure: function ( result, request) { 
					Ext.MessageBox.alert('Failed', result.responseText); 
				} 
		});
		
		Ext.get('pupupPedido').dom.style.display='';
		
		
		
		Ext.get('pupupPedido').dom.style.left='100px';
		Ext.get('pupupPedido').dom.style.top='80px';
		
		
		
		
		//posi
	}
	Ext.onReady(function(){
		cargaCarrito();
		Ext.get('pupupPedido').dom.style.display='none';
			
		Ext.get('contenidote2').on('click', function(e){
			Ext.get('pupupPedido').dom.style.display='none';
		});
		Ext.get('cerrar2').on('click', function(e){
			Ext.get('pupupPedido').dom.style.display='none';
		});	
		Ext.get('cerrar').on('click', function(e){
			Ext.get('pupupPedido').dom.style.display='none';
		});	
		/*Ext.get('btnAgregar').on('click', function(e){
			agregarCorridasCarrito();
		});	*/
		
		Ext.get('btnAceptar').on('click', function(e){
			/*Ext.get('pupupPedido').dom.style.display='none';
			
			
			divSessionId=Ext.get('divSessionId').dom.innerHTML;
			idEstilo=Ext.get('pupupPedido').dom.value;
			linea=Ext.get('lblLinea').dom.innerHTML;
			estilo=Ext.get('lblEstilo').dom.innerHTML;
			color=Ext.get('lblMaterial').dom.innerHTML;
			precio=Ext.get('lblPrecio').dom.innerHTML;
			//pares=Ext.get('txtTotalN').dom.value;

			
			//corrida=Ext.get('ComboNumeracion').dom.value;
			//cantidadCorridas=Ext.get('ComboCantidad').dom.value;
			n2=Ext.get('txtN2').dom.value;
			n2m=Ext.get('txtN2m').dom.value;
			n3=Ext.get('txtN3').dom.value;
			n3m=Ext.get('txtN3m').dom.value;
			n4=Ext.get('txtN4').dom.value;
			n4m=Ext.get('txtN4m').dom.value;
			n5=Ext.get('txtN5').dom.value;
			n5m=Ext.get('txtN5m').dom.value;
			n6=Ext.get('txtN6').dom.value;
			n6m=Ext.get('txtN6m').dom.value;

			Ext.Ajax.request({
				url : '../carrito/carrito_class.php', 
				params : {funcion:'registroCarrito',sessionId:divSessionId,idEstilo:idEstilo,linea:linea,estilo:estilo,color:color,precio:precio,pares:pares,corrida:corrida,cantidadCorridas:cantidadCorridas,n2:n2,n2m:n2m,n3:n3,n3m:n3m,n4:n4,n4m:n4m,n5:n5,n5m:n5m,n6:n6,n6m:n6m },
				method: 'GET',
				success: function ( result, request ) {
            		
                   // obtener_datos(divSessionId);
				   cargaCarrito();
                        	
				},
				failure: function ( result, request) { 
					Ext.MessageBox.alert('Failed', result.responseText); 
				} 
			});
*/
			
		});			
		
		Ext.get('carrito').on('click', function(e){
        	divSessionId=Ext.get('divSessionId').dom.innerHTML;
            Ext.Ajax.request({
                url : '../carrito/getDataCarrito.php', 
                params : {sessionId:divSessionId},
                method: 'POST',
                success: function ( result, request ){
                    //alert('Datos' + result.responseText +' SessionId:'+divSessionId);
					
					var arrayPrin=result.responseText.split('#');

					var aCarrito=arrayPrin[0].split(',');
					//alert(llenaCarrito(aCarrito));
					Ext.get('tamElementsCarrito').dom.innerHTML = arrayPrin[1];
				
					
//                    var aCarrito=result.responseText.split(';');
					//alert(llenaCarrito(aCarrito));
					//Ext.get('cuadroresumen').dom.innerHTML= llenaCarrito(aCarrito);
					Ext.get('cuadroresumen').dom.innerHTML= llenaCarrito(arrayPrin[0]);
					
                    //alert('Tam: ' + aCarrito.length +  '[0]' + aCarrito[0]+'\n[1]' + aCarrito[1]);
                },
                failure: function ( result, request) { 
                    Ext.MessageBox.alert('Failed', result.responseText); 
                } 
            });
		});	
		
		Ext.get('btnEliminar').on('click', function(e){
													
			//var strArrayIdxDeleted="";
			
			Ext.get('cuadroresumen').dom.style.display='none';
			var strArrayEstilosDeleted="";
			tam=Ext.get('tamElementsCarrito').dom.innerHTML;
			
			var cont=0;
			
			for (i=0;i<tam;i++){
				if(Ext.get('chk_'+i).dom.checked){
					
					//strArrayIdxDeleted+="chk_"+i+";";
					
					strArrayEstilosDeleted= Ext.get('chk_'+i).dom.value + ";";
					
					cont++;
				}
			}
			eliminarItemsCarrito(strArrayEstilosDeleted);
			//Ext.get('cuadroresumen').dom.style.display='';
//********************************
			
		});	
	});
	function eliminarItemsCarrito(strArrayEstilosDeleted){
		divSessionId=Ext.get('divSessionId').dom.innerHTML;
		
		Ext.Ajax.request({
			url : '../carrito/deleteItemCarrito.php',
			params : {idCliente:1,strArrayEstilosDeleted:strArrayEstilosDeleted},
			method: 'GET',
			success: function ( result, request ){
				//var aCarrito=result.responseText.split(';');
				//Ext.get('cuadroresumen').dom.innerHTML= llenaCarrito(aCarrito);
				
				var arrayPrin=result.responseText.split('#');
				var aCarrito=arrayPrin[0].split(',');
				Ext.get('tamElementsCarrito').dom.innerHTML = arrayPrin[1];
				Ext.get('cuadroresumen').dom.innerHTML= llenaCarrito(arrayPrin[0]);
	
				
				//alert("Registro Eliminado");
				Ext.get('pupupPedido').dom.style.display='none';
				setTimeout("cargaCarrito()",1000);
				setTimeout("Ext.get('cuadroresumen').dom.style.display='';",1200);
			},
			failure: function ( result, request) { 
				Ext.MessageBox.alert('Failed', result.responseText); 
			} 
		});
		
	}
    function cargaCarrito(){
		
		
		divSessionId=Ext.get('divSessionId').dom.innerHTML;
		Ext.Ajax.request({
			url : '../carrito/getDataCarrito.php', 
			params : {sessionId:divSessionId},
			method: 'POST',
			success: function ( result, request ){
				//alert('Datos' + result.responseText +' SessionId:'+divSessionId);
				
				var arrayPrin=result.responseText.split('#');

				var aCarrito=arrayPrin[0].split(',');
				//alert(llenaCarrito(aCarrito));
				Ext.get('tamElementsCarrito').dom.innerHTML = arrayPrin[1];
				
				//Ext.get('tamElementsCarrito').dom.innerHTML=aCarrito.length;
				Ext.get('cuadroresumen').dom.innerHTML= llenaCarrito(aCarrito);
				
				//alert('Tam: ' + aCarrito.length +  '[0]' + aCarrito[0]+'\n[1]' + aCarrito[1]);
			},
			failure: function ( result, request) { 
				Ext.MessageBox.alert('Failed', result.responseText); 
			} 
		});
		
		
		
			
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
		
		tam = Ext.get('tamElementsCarrito').dom.innerHTML;

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
		
		n2_=Ext.get('txtN2').dom.value;
		n2m_=Ext.get('txtN2m').dom.value;
		n3_=Ext.get('txtN3').dom.value;
		n3m_=Ext.get('txtN3m').dom.value;
		n4_=Ext.get('txtN4').dom.value;
		n4m_=Ext.get('txtN4m').dom.value;
		n5_=Ext.get('txtN5').dom.value;
		n5m_=Ext.get('txtN5m').dom.value;
		n6_=Ext.get('txtN6').dom.value;
		n6m_=Ext.get('txtN6m').dom.value;
		precio_=Ext.get('lblPrecio').dom.innerHTML;
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

	function cargarCorridas(){
		
		var tamCantCorridas=arrayElementsSelected.length;
		var strHTMLCarCorr="";
		
		
		
		Ext.Ajax.request({
			url : '../carrito/getDatosClavesPedido.php', 
			params : {},
			method: 'POST',
			success: function ( result, request ){
				//alert('Datos' + result.responseText +' SessionId:'+divSessionId);
				var aCarrito=result.responseText();
				llenaCarrito(aCarrito);

				strHTMLCarCorr=aCarrito;
				
				
				//alert('Tam: ' + aCarrito.length +  '[0]' + aCarrito[0]+'\n[1]' + aCarrito[1]);
			},
			failure: function ( result, request) { 
				Ext.MessageBox.alert('Failed', result.responseText); 
			} 
		});
		
		
		
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
		
		
		
		Ext.get('gridContenido').dom.innerHTML=strHTMLCarCorr;
		Ext.get('sum_CantCorr').dom.innerHTML=subtotal_cantCorr;
		Ext.get('sum_n2').dom.innerHTML=subtotal_n2;
		Ext.get('sum_n2m').dom.innerHTML=subtotal_n2m;
		Ext.get('sum_n3').dom.innerHTML=subtotal_n3;
		Ext.get('sum_n3m').dom.innerHTML=subtotal_n3m;
		Ext.get('sum_n4').dom.innerHTML=subtotal_n4;
		Ext.get('sum_n4m').dom.innerHTML=subtotal_n4m;
		Ext.get('sum_n5').dom.innerHTML=subtotal_n5;
		Ext.get('sum_n5m').dom.innerHTML=subtotal_n5m;
		Ext.get('sum_n6').dom.innerHTML=subtotal_n6;
		Ext.get('sum_n6m').dom.innerHTML=subtotal_n6m;
		Ext.get('sum_pares').dom.innerHTML=subtotal_pares;
		Ext.get('sum_total').dom.innerHTML=granTotal;
		

			
		
	}
	function totalClavesPedidos(comboCant,lblpares_,lbltotal_,lblPrecio_){
		
		var cant=Ext.get(comboCant).dom.value;
		
		var pares=Ext.get(lblpares_).dom.innerHTML;
		var total=0;
		
		total= cant * pares;
		
		Ext.get(lbltotal_).dom.innerHTML = total;
		
		
		
		totalCantidadPedidosClaves(Ext.get('lblCantTotal').dom.innerHTML);
		
	}
	function totalCantidadPedidosClaves(cantidad){
		var total=0;

		for(i=1;i<=cantidad;i++){
			


			totalPares=Ext.get('Total'+i).dom.innerHTML;

			total=parseInt( total) +parseInt(totalPares);
			
		}
		Ext.get('lblTotal_').dom.innerHTML="";
		Ext.get('lblTotal_').dom.innerHTML=parseInt(total);
		
		
		Ext.get('lblTotalCompra').dom.innerHTML = Ext.get('lblTotal_').dom.innerHTML * Ext.get('lblPrecio').dom.innerHTML;
		
	}
	function agregar_estilo_al_carro(){
		var idEstilo=Ext.get('idEstilo').dom.value;
		var linea=Ext.get('lblLinea').dom.innerHTML;
		var estilo=Ext.get('lblEstilo').dom.innerHTML;
		var material=Ext.get('lblMaterial').dom.innerHTML;
	    var color=Ext.get('lblColor').dom.innerHTML;
		var precio=Ext.get('lblPrecio').dom.innerHTML;
		var cantClaves = Ext.get('lblCantTotal').dom.innerHTML;
		var idCliente=1;

		for (i=1;i<=cantClaves;i++){
			var campoCantidad="cantidad"+i;
			
			//var x=document.getElementById(campoCantidad);
			
			//x.options[x.selectedIndex].Text;
			var cantidad =Ext.get(campoCantidad).dom.options[Ext.get(campoCantidad).dom.options.selectedIndex].value;
			
			if(cantidad> 0){
				var campoClavePed="clave_"+i;
				var clavePed=Ext.get(campoClavePed).dom.innerHTML;
				
				Ext.Ajax.request({
					url : 'guardar_elemento_carrito.php', 
					params : {idEstilo:idEstilo,precio:precio,clave:clavePed,cans:cantidad,idCliente:idCliente},
					method: 'POST',
					success: function ( result, request ){
						

						alert("Registro satisfactorio");
						
						Ext.get('pupupPedido').dom.style.display='none';

					},
					failure: function ( result, request) { 
						Ext.MessageBox.alert('Failed', result.responseText); 
					} 
				});
			}
		}
	}
	
	function recargarDatosCarrito(tipoCatalogo){
			if(tipoCatalogo=="Inventario"){
				Ext.Ajax.request({
					url : '../carrito/getLineasCarroInventario.php' , 
					params : { },
					method: 'POST',
					success: function ( result, request ) {
						
						Ext.get('cuadroLinea').dom.innerHTML=result.responseText;
	
					},
					failure: function ( result, request) { 
						Ext.MessageBox.alert('Failed', result.responseText); 
					} 
				});
			}
			else{
				Ext.Ajax.request({
					url : '../carrito/getLineasCarro.php' , 
					params : { },
					method: 'POST',
					success: function ( result, request ) {
						
						Ext.get('cuadroLinea').dom.innerHTML=result.responseText;
	
					},
					failure: function ( result, request) { 
						Ext.MessageBox.alert('Failed', result.responseText); 
					} 
				});
			}
		}
	
	
	