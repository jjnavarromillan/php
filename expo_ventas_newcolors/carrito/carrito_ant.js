        var urlHrefDestino =""
        function redirect(){
            
            window.location.href=urlHrefDestino;
            //window.location.href="Hola.html";
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
          if (fila.style.display != "none") {
            fila.style.display = "none"; //ocultar fila
          } else {
            fila.style.display = ""; //mostrar fila
          }
        }
        function limpiarImagen(idImg){
            imgDest=document.getElementById(idImg);
            imgDest.src="";            
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
            
            left = parseInt(findXCoord(evt))-150;
            vtop = parseInt(findYCoord(evt))-100;
            
            div.style.left=left+"px";
            div.style.top=vtop+"px";
             
            
            
        }
        function sacarValor(valor){
            
            tam= valor.length;
            cadenaVal="";
            if(tam>2){
                for (i=0;i<tam-2;i++){
                    cadenaVal+=valor.charAt(i);       
                }
            }
            return cadenaVal;
        } 
        function calculaTotales(){
            //var indice = document.frmPopup.ComboNumeracion.selectedIndex 
            var indice = Ext.get('ComboNumeracion').dom.selectedIndex
			
            //numeraciones = document.frmPopup.ComboNumeracion.value 
			var numeraciones = Ext.get('ComboNumeracion').dom.value;
            
            if(numeraciones=="2"){
                Ext.get('txtN2').dom.value="1";
				Ext.get('txtN2m').dom.value="1";
				Ext.get('txtN3').dom.value="1";
				Ext.get('txtN3m').dom.value="1";
				Ext.get('txtN4').dom.value="1";
				Ext.get('txtN4m').dom.value="1";
				Ext.get('txtN5').dom.value="0";
				Ext.get('txtN5m').dom.value="0";
				Ext.get('txtN6').dom.value="0";
				Ext.get('txtN6m').dom.value="0";
            }
            if(numeraciones=="2m"){
                Ext.get('txtN2').dom.value="0";
				Ext.get('txtN2m').dom.value="1";
				Ext.get('txtN3').dom.value="1";
				Ext.get('txtN3m').dom.value="1";
				Ext.get('txtN4').dom.value="1";
				Ext.get('txtN4m').dom.value="1";
				Ext.get('txtN5').dom.value="1";
				Ext.get('txtN5m').dom.value="0";
				Ext.get('txtN6').dom.value="0";
				Ext.get('txtN6m').dom.value="0";
            }
            if(numeraciones=="3"){
                Ext.get('txtN2').dom.value="0";
				Ext.get('txtN2m').dom.value="0";
				Ext.get('txtN3').dom.value="1";
				Ext.get('txtN3m').dom.value="1";
				Ext.get('txtN4').dom.value="1";
				Ext.get('txtN4m').dom.value="1";
				Ext.get('txtN5').dom.value="1";
				Ext.get('txtN5m').dom.value="1";
				Ext.get('txtN6').dom.value="0";
				Ext.get('txtN6m').dom.value="0";
			}
            if(numeraciones=="3m"){
                Ext.get('txtN2').dom.value="0";
				Ext.get('txtN2m').dom.value="0";
				Ext.get('txtN3').dom.value="0";
				Ext.get('txtN3m').dom.value="1";
				Ext.get('txtN4').dom.value="1";
				Ext.get('txtN4m').dom.value="1";
				Ext.get('txtN5').dom.value="1";
				Ext.get('txtN5m').dom.value="1";
				Ext.get('txtN6').dom.value="1";
				Ext.get('txtN6m').dom.value="0";
			}
            if(numeraciones=="4"){
                Ext.get('txtN2').dom.value="0";
				Ext.get('txtN2m').dom.value="0";
				Ext.get('txtN3').dom.value="0";
				Ext.get('txtN3m').dom.value="0";
				Ext.get('txtN4').dom.value="1";
				Ext.get('txtN4m').dom.value="1";
				Ext.get('txtN5').dom.value="1";
				Ext.get('txtN5m').dom.value="1";
				Ext.get('txtN6').dom.value="1";
				Ext.get('txtN6m').dom.value="1";            
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
			
            
            Ext.get('txtTotalN').dom.value =6*cantidad;

			Ext.get('lblTotalCompra').dom.innerHTML=parseFloat(Ext.get('txtTotalN').dom.value)* parseFloat(Ext.get('lblPrecio').dom.innerHTML); 



        }
        
        function setValueToLabel(lblObjeto,valorObjeto){
            document.getElementById(lblObjeto).innerHTML = valorObjeto;
        }
        
		function extraerDatosLinea(clave){
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


	function selecciona_articulo(idEstilo){
		
		Ext.Ajax.request({
				url : '../carrito/getDatosEstilo.php', 
				params : { idEstilo: idEstilo },
				method: 'GET',
				success: function ( result, request ) {
					var arrayEstilos=new Array();
					arrayEstilos=result.responseText.split(",");
					Ext.get('pupupPedido').dom.value=idEstilo;
					Ext.get('lblLinea').dom.innerHTML=arrayEstilos[0];
					Ext.get('lblEstilo').dom.innerHTML=arrayEstilos[1];
					Ext.get('lblMaterial').dom.innerHTML=arrayEstilos[2];
					Ext.get('btnImgEstilo').dom.src=Ext.get('imggaleria').dom.src;
					Ext.get('lblPrecio').dom.innerHTML=arrayEstilos[3];
					//Ext.get('lblEstilo').dom.innerHTML=arrayEstilos[1];
					//Ext.get('lblEstilo').dom.innerHTML=arrayEstilos[1];
					

				},
				failure: function ( result, request) { 
					Ext.MessageBox.alert('Failed', result.responseText); 
				} 
		});
		
		Ext.get('pupupPedido').dom.style.display="";
		
		
		
		Ext.get('pupupPedido').dom.style.left="300px";
		Ext.get('pupupPedido').dom.style.top="200px";
		
		//posi
	}
	Ext.onReady(function(){
		Ext.get('pupupPedido').dom.style.display="none";
			
		Ext.get('contenidote2').on('click', function(e){
			Ext.get('pupupPedido').dom.style.display="none";
		});
		Ext.get('cerrar2').on('click', function(e){
			Ext.get('pupupPedido').dom.style.display="none";
		});	
		Ext.get('cerrar').on('click', function(e){
			Ext.get('pupupPedido').dom.style.display="none";
		});	
		Ext.get('btnAceptar').on('click', function(e){
			Ext.get('pupupPedido').dom.style.display="none";
			
			
			alert('<?php  echo "$sessionId";?>');
			idEstilo=Ext.get('pupupPedido').dom.value;
			linea=Ext.get('lblLinea').dom.innerHTML;
			estilo=Ext.get('lblEstilo').dom.innerHTML;
			color=Ext.get('lblMaterial').dom.innerHTML;
			precio=Ext.get('lblPrecio').dom.innerHTML;
			pares=Ext.get('txtTotalN').dom.innerHTML;
			Ext.Ajax.request({
				url : '../carrito/getDatosEstilo.php', 
				params : {funcion:'registroCarrito',sessionId:sessionId,linea:linea,estilo:estilo,color:color,precio:precio,pares:pares,idEstilo:idEstilo },
				method: 'GET',
				success: function ( result, request ) {
				},
				failure: function ( result, request) { 
					Ext.MessageBox.alert('Failed', result.responseText); 
				} 
			});
			
			
		});			
		
	
	});
        

