<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<title>Documento sin título</title>

	<link rel="stylesheet" href="../js/jquery/jquery-accordion/demo/demo.css" />

	<script type="text/javascript" src="../js/jquery/jquery-accordion/lib/jquery.js">/script>
	<script type="text/javascript" src="../js/jquery/jquery-accordion/lib/chili-1.7.pack.js"></script>

	
	<script type="text/javascript" src="../js/jquery/jquery-accordion/lib/jquery.easing.js"></script>

	<script type="text/javascript" src="../js/jquery/jquery-accordion/lib/jquery.dimensions.js"></script>
	<script type="text/javascript" src="../js/jquery/jquery-accordion/jquery.accordion.js"></script>
    
   	<link rel="stylesheet" href="js/jquery/jquery-accordion/demo/demo.css" />

	<script type="text/javascript" src="js/jquery/jquery-accordion/lib/jquery.js">/script>
	<script type="text/javascript" src="/js/jquery/jquery-accordion/lib/chili-1.7.pack.js"></script>
	
	<script type="text/javascript" src="js/jquery/jquery-accordion/lib/jquery.easing.js"></script>

	<script type="text/javascript" src="js/jquery/jquery-accordion/lib/jquery.dimensions.js"></script>

	<script type="text/javascript" src="js/jquery/jquery-accordion/jquery.accordion.js"></script>
    
<script language="javascript">
		jQuery().ready(function(){
			jQuery('#navigation').accordion({ 
				active: false, 
				header: '.head', 
				navigation: true, 
				event: 'mouseover', 
				fillSpace: true, 
				animated: 'easeslide' 
			});
		});
	</script>
<style type="text/css">
<!--
a:link {
	color: #999;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #999;
}
a:hover {
	text-decoration: none;
	color: #666;
}
a:active {
	text-decoration: none;
}


-->
</style>

<div id="divMenuPanelAdmin">
  

  <div id="divPanelAdmMenu">

      <div id="divMenPanel" >
      
      <div id="divFonBlanPanel" style="z-index:10;">
        <div id="divContePanel  z-index:11;">
          <div id="divBarriPanel1" style="z-index:12;">
             
              <div  class="TituloPanel" id="divTitu1Panel" ><img src="carrito/img/administracion.jpg" width="99" height="15" /></div>
              <div  class="ContenidoPanel" id="divMen1Panel"><a  href="#" id="divMen1PanelH" onclick="enviarASistemaCliente('Temporadas');menuUsuariosPrincipalClick('divMen1PanelH');">Catalogo Muestrarios</a></div>
              <div  class="ContenidoPanel" id="divMen2Panel" ><a href="#" id="divMen2PanelH" onclick="enviarASistemaInterno('InventarioEmpresa');menuUsuariosPrincipalClick('divMen2PanelH');">Inventario Bodega</a></div>
               <div  class="ContenidoPanel" id="divMen3Panel"><a href="#" id="divMen3PanelH" onclick="enviarASistemaCliente('Programacion');menuUsuariosPrincipalClick('divMen3PanelH');">Programacion</a></div>
              <div  class="ContenidoPanel" id="divMen4Panel"><a href="#" id="divMen4PanelH" onclick="cargarFormularioClientes();menuUsuariosPrincipalClick('divMen4PanelH');">Clientes</a></div>
              <div  class="ContenidoPanel" id="divMen5Panel"><a href="#" id="divMen5PanelH">Crear Sugerencias</a></div>
              <div  class="ContenidoPanel" id="divMen6Panel"><a href="#" id="divMen6PanelH">Administración</a></div>
              <div  class="ContenidoPanel" id="divMen7Panel"><a href="#" id="divMen7PanelH">Chat en Linea</a></div>
             
              
          </div>
          <div id="divBarriPanel2" style="z-index:12;">
             
              <div  class="TituloPanel" id="divTitu2Panel" ><img src="carrito/img/clientes.jpg" width="99" height="15" /></div>
              <div  class="ContenidoPanel" id="divMen8Panel"> <a href="#" id="divMen8PanelH">Mis Datos</a></div>
              <div  class="ContenidoPanel" id="divMen9Panel"> <a href="#"  id="divMen9PanelH" onClick="cargarCrearPedido(document.getElementById('idCliente').innerHTML);menuUsuariosPrincipalClick('divMen9PanelH');">Hoja de pedido</a></div>
              <div  class="ContenidoPanel" id="divMen10Panel"><a href="#" id="divMen10PanelH"  onclick="cargarVerPedido(document.getElementById('idCliente').innerHTML,document.getElementById('nombrecliente').innerHTML);menuUsuariosPrincipalClick('divMen10PanelH');">Pedidos</a></div>
              <div  class="ContenidoPanel" id="divMen11Panel"><a href="#" id="divMen11PanelH">Facturacion</a></div>
              <div  class="ContenidoPanel" id="divMen12Panel"><a href="#" id="divMen12PanelH">Estado de cuenta</a></div>
          </div>
          <div id="divBarriPanel3" style="z-index:12;">
             
            <div  class="TituloPanel" id="divTitu1Panel"><img src="carrito/img/catalogos.jpg" width="99" height="15" /></div>
              <div  class="ContenidoPanel" id="divMen13Panel" ><a href="#" id="divMen13PanelH" onclick="enviarASistemaCliente('Distribuidores');menuUsuariosPrincipalClick('divMen13PanelH');"> Muestrario</a></div>
              <div  class="ContenidoPanel" id="divMen14Panel"><a href="#" id="divMen14PanelH" onclick="enviarASistemaCliente('Inventario');menuUsuariosPrincipalClick('divMen14PanelH');">Inventario</a></div>
            <div  class="ContenidoPanel" id="divMen15Panel"> <a href="#" id="divMen15PanelH" onclick="enviarASistemaClienteSugerencias();menuUsuariosPrincipalClick('divMen15PanelH');"> Sugerencias</a></div>
          </div>
        </div>
    </div>
  </div>
      <div id="divNbackPanel"></div>
  </div>
  <div id="divPanelAdmContenido">
    
</div>
</div>
