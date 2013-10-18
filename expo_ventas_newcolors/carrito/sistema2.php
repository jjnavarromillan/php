	<?php 
		require_once("carrito_class.php");
		$carrito=new carrito();
		$sessionId="1";
	 ?>      
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<link rel="stylesheet" type="text/css" href="../lib/ext-2.3.0/resources/css/ext-all.css" />
<script type="text/javascript" src="../lib/ext-2.3.0/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="../lib/ext-2.3.0/ext-all.js"></script>

       <link rel="stylesheet" type="text/css" href="sistema_files/StyleSheet.css">
    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bienvenidos a New Colors</title>

<style type="text/css">
<!--
#agregar {
	position:absolute;
	left:674px;
	top:176px;
	width:73px;
	height:24px;
	z-index:1002;
}
#gridEncabezado {
	position:absolute;
	left:317px;
	top:206px;
	width:436px;
	height:17px;
	z-index:1004;
	color: #FFF;
	background-color:#666;
}
#gridContenido {
	position:absolute;
	left:314px;
	top:206px;
	width:442px;
	height:106px;
	z-index:1005;
}
#totales {
	position:absolute;
	left:376px;
	top:312px;
	width:444px;
	height:16px;
	z-index:1006;
	background-color: #FFFFFF;
}
#leyenda {
	position:absolute;
	width:513px;
	height:19px;
	z-index:1001;
	left: 10px;
	top: 349px;
	font-weight: normal;
	text-align: right;
}
#apDiv1 {
	position:absolute;
	width:802px;
	height:115px;
	z-index:1001;
}
#apDiv2 {
	position:absolute;
	width:450px;
	height:80px;
	z-index:1;
	left: 695px;
	top: 4px;
}

-->
</style>
</head><body>
<div id="banner"><img src="sistema_files/chat.jpg" width="327" height="410" />  
         	               
</div>
<div class="encabezadito">
  <div class="logotipoPrincipal"></div>
  <div class="sesion"> <span class="catalogo"><a href="http://192.168.0.102/sistema.aspx"><font color="#666">Catálogo</font></a></span> <span class="pedidos"><a href="http://192.168.0.102/pedidosydetalle.aspx?sessionId=phyiox3y0pcwptryq5fwyp55"><font color="#666">Pedidos</font></a></span> <span class="cuenta"><a href="http://192.168.0.102/cuenta.aspx"><font color="#666">Estado de Cuenta</font></a></span> <span id="Pares" class="foro"><a href="http://192.168.0.102/foro.aspx"><font color="#666">Foro</font></a></span> <span class="infoEncabezado">
    <label class="nombreUsuario">Jose Juan Juan Navarro Millan</label>
    </span>
    <select name="combo" class="cerrarSesion" id="combo2">
      <option selected="selected" value="cerrar">Cerrar Sesión</option>
      <option value="imagenmostrar">Cambiar Imagen</option>
      <option value="modificar">Cambiar Contraseña</option>
    </select>
    <span class="monito"></span>
    <div id="apDiv2"><img src="sistema_files/banner.gif" width="450" height="80" /></div>
  </div>
</div>
<div id="divSessionId" style="display:none"><?php  echo "$sessionId";?></div>
<select id="combo" class="combo">
<option selected="selected" value="temporada1">Primavera Verano 2009</option><option value="temporada2">Otoño Invierno 2009</option></select>
<div id="contenidote2" class="contenidote2">
<div class="cuadro"></div>               
                        


		<div class="marcote"><span class="menucito">
           	<span class="linea">Línea</span>
            <span class="estilo3">Estilo</span>
        </span>
     
<div class="cuadroLinea">
        	<?php 

				$divLineas=$carrito->getLineas();
				echo "$divLineas";
              ?>      
        </div>
      
      
        <div id="cuadroEstilo" class="cuadroEstilo">
            	   
           	        
        </div>
        <p>&nbsp;</p>
<form action="accionesCarrito.aspx?opcion=verEstilos" name="frmCarrito" method="get">
      <div class="cuadroCarrito">
<input name="opcion" value="verEstilo" type="hidden">
                    <input name="sessionId" value="phyiox3y0pcwptryq5fwyp55" type="hidden">
        <div id="tamElementsCarrito" style="display:none">0</div>
          <div id="cuadroresumen" class="cuadroresumen" >
          
          
            	
            	 
            	 
            	 
            	  
       </div>
                <span class="infoCarrito">
                <span id="carrito" class="carrito"><img src="sistema_files/carrito.gif" width="19" height="19" /></span>
                <label name="lblPares" id="lblPares" class="pares">Pares: 0</label>
                <label name="lblTotal" id="Label1" class="monto">Total: $0 </label>
        </span>
      </div>
                
                <span class="botonesResumen">
<input id="btnEliminar" class="eliminar" value="Eliminar" type="button">
                	<input name="btnAccion" class="aceptar" value="Aceptar" type="submit">
      </span>  

  </form></div>
</div>

<div class="pie2">
<span class="textoPie"><font color="#666">© 2009 NEW COLOR’S SHOES. ALL RIGHTS RESERVED</font></span>
</div>
<div class="imgabajo"></div>




<div class="divimggaleria" id="divimggaleria" style="border: thin solid; background-color:#333; position: absolute; height: 203px; width: 203px; left: 229px; top: 282px; display: none;"><img alt="" id="imggaleria" src="" onmouseout="cambiarDisplay('divimggaleria');limpiarImagen('imggaleria')" onclick="selecciona_articulo(this.value);" width="203" height="203" value=""></div>
<span id="pupupPedido" class="cuadrito" value="">   
<label id="cerrar2" class="cerrar2">cerrar</label>         
                    <span id="cerrar" class="cerrar">X</span>
                    
                         <span class="linea3"></span>
                    <span class="florecitas1"></span>
<label id="lblLinea" class="linea2">2800</label>
<label id="lblEstilo" class="estilo2">2810</label>
                  
                    <label id="lblMaterial" class="material2">OXFORD NEGRO</label>
<label id="lblPrecioEt" class="precio2">Precio</label>
                    <label id="lblPrecio" class="cantidadPrecio2">$ 200</label>
<label id="lblTotal" class="total2">Total:</label>
<label id="lblTotalCompra" class="cantidadTotal2">$ 200</label>
<label id="Label9" class="numeracion2">Num.</label>
                    <label id="150" class="cantidad3">Cant.</label>
                    <label id="Label10" class="n22">N2</label>
                    <label id="Label11" class="n2m2">-</label>
                    <label id="Label12" class="n32">N3</label>
                    <label id="Label13" class="n3m2">-</label>
                    <label id="Label14" class="n42">N4</label>
                    <label id="Label15" class="n4m2">-</label>
                    <label id="Label16" class="n52">N5</label>
                    <label id="Label17" class="n5m2">-</label>
                    <label id="Label18" class="n62">N6</label>
                    <label id="Label20" class="n6m2">-</label>
                    <label id="Label21" class="totalN2">Total</label>                
                    <select class="numeracion" name="ComboNumeracion" id="ComboNumeracion" onchange="calculaTotales();">
                        <option selected="selected" value="2">2</option>
                        <option value="2m">2m</option>
                        <option value="3">3</option>
                        <option value="3m">3m</option>
                        <option value="4">4</option>
                    </select>
                    <select class="cantidad" name="ComboCantidad" id="ComboCantidad" onchange="calculaTotales()">
                        <option selected="selected" value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">18</option>
                        <option value="18">19</option>
                        <option value="19">20</option>
                        <option value="20">21</option>
                    
                    </select>
                    
                    <input id="txtN2" name="txtN2" value="1" class="n2a2" maxlength="3" type="text">
                    <input id="txtN2m" name="txtN2m" value="1" class="n2ma2" maxlength="3" type="text">
                    <input id="txtN3" name="txtN3" value="1" class="n3a2" maxlength="3" type="text">
                    <input id="txtN3m" name="txtN3m" value="1" class="n3ma2" maxlength="3" type="text">
                    <input id="txtN4" name="txtN4" value="1" class="n4a2" maxlength="3" type="text">
                    <input id="txtN4m" name="txtN4m" value="1" class="n4ma2" maxlength="3" type="text">
                    <input id="txtN5" name="txtN5" value="1" class="n5a2" maxlength="3" type="text">
                    <input id="txtN5m" name="txtN5m" value="0" class="n5ma2" maxlength="3" type="text">
                    <input id="txtN6" name="txtN6" value="0" class="n6a2" maxlength="3" type="text">
                    <input id="txtN6m" name="txtN6m" value="0" class="n6ma2" maxlength="3" type="text">                
                    <input id="txtTotalN" name="txtTotalN" value="6" class="totalNa2" maxlength="8" type="text">   
                    
                    
                    +
<input name="opcion" id="opcion" value="verEstilo" type="hidden">
                    <input name="opcionPopup" id="opcionPopup" value="yes" type="hidden">
                    
                    <input name="idEstilo" id="idEstilo" value="42" type="hidden">
                    <input name="linea" id="linea" value="2800" type="hidden">
                    <input name="estilo" id="estilo" value="2810" type="hidden">
                    <input name="material_color" id="material_color" value="OXFORD NEGRO" type="hidden">
                    <input name="precio" id="precio" value="200" type="hidden">
                    
                    <input name="sessionId" id="sessionId"  type="hidden">
                    
                    
                    
                    <input id="btnAceptar" name="btnAceptar" class="aceptar2" value="Aceptar" type="button">
<input id="btnEnviar" class="enviar" value="Cancelar" type="submit">


    <input type="submit"   class="agregar" name="btnAgregar" id="btnAgregar" value="Agregar" />


<div id="totales" class="none">
  <table border="0" width="444"cellspacing="0">
    <tr>
      <td width="64">Sub Total</td>
      <td width="67">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="25">&nbsp;</td>
      <td width="62">&nbsp;</td>
    </tr>
  </table>
</div>
<div id="gridContenido" class="none" >
  <table width="519"  border="0px"    cellpadding="0" cellspacing="0">
    <tr bgcolor="#999999">
      <td width="55" style="background:url(sistema_files/degradado6.png)">Select.</td>
      <td width="58">Clave</td>
      <td width="61">Cant.</td>
      <td width="23">2</td>
      <td width="23">-</td>
      <td width="23">3</td>
      <td width="23">-</td>
      <td width="23">4</td>
      <td width="23">-</td>
      <td width="23">5</td>
      <td width="23">-</td>
      <td width="23">6</td>
      <td width="23">-</td>
      <td width="62">Pares</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="a" id="seleccion1" value="seleccion1" />
      </label></td>
      <td>A</td>
      <td><label>
        <select name="cantidad" id="cantidad">
          <option value="0" selected="selected">0</option>
      <option value="2">2</option>
       <option value="3">3</option>
        <option value="4">4</option>
         <option value="5">5</option>
          <option value="6">6</option>
      
        </select>
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1</td>
      <td>2</td>
      <td>2</td>
      <td>2</td>
      <td>2</td>
      <td>2</td>
      <td>1</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="b id="selección2" value="selección2" />
      </label></td>
      <td>B</td>
      <td><label>
        <select name="cantidad" id="cantidad">
          <option selected="0" value="0">0</option>
      <option value="2">2</option>
       <option value="3">3</option>
        <option value="4">4</option>
         <option value="5">5</option>
          <option value="6">6</option>
      
        </select>
      </label></td>
      <td>1</td>
      <td>1</td>
      <td>2</td>
      <td>2</td>
      <td>2</td>
      <td>2</td>
      <td>1</td>
      <td>1</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="c" id="seleccion3" value="seleccion3" />
      </label></td>
      <td>C</td>
      <td><label>
        <select name="cantidad" id="cantidad">
          <option selected="0" value="0">0</option>
      <option value="2">2</option>
       <option value="3">3</option>
        <option value="4">4</option>
         <option value="5">5</option>
          <option value="6">6</option>
      
        </select>
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1</td>
      <td>1</td>
      <td>2</td>
      <td>2</td>
      <td>2</td>
      <td>2</td>
      <td>1</td>
      <td>1</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label>
        <input type="checkbox" name="d" id="seleccion4" value="seleccion4" />
      </label></td>
      <td>D</td>
      <td><label>
        <select name="cantidad" id="cantidad">
          <option selected="0" value="0">0</option>
      <option value="2">2</option>
       <option value="3">3</option>
        <option value="4">4</option>
         <option value="5">5</option>
          <option value="6">6</option>
      
        </select>
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>1</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>3</td>
      <td>2</td>
      <td>1</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div></div>
<div id="leyenda">Minimo de compra a partir de 12 pares ó 2 corridas. Precios mas I.V.A. a la tasa del 16%.</div>
<input class="fotoZapato" src="sistema_files/155-BAQUETA-BANDALO-MIEL.gif" id="btnImgEstilo" type="image" />
</span>

</body></html>
                