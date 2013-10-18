
<?php 

    $idDatCliFac=$_REQUEST['idDatCliFac'];
	$cliente=$_REQUEST['cliente'];
	
       	
	?>

<link rel="stylesheet" type="text/css" href="levantar_pedido_completo.css">
<link rel="stylesheet" type="text/css" href="carrito/levantar_pedido_completo.css">



<style type="text/css">
<!--

-->
</style>
<div id="divPriLePCompleto">
  <div  class="TipoBitacora" id="divPeedCompleto">Bitacora de pedidos</div>
  <div id="divCLiePeCompleto"><label  class="tituloPrincialClienteCom">Cliente:</label> <label class=""><?php  echo $cliente; ?></label></div>
  <div id="divEnBarraCom"><img src="source/barritaTabla.jpg" width="221" height="20" /></div>
  <div id="divTabNUmComp">
    <table width="215" border="0">
      <tr>
        <td width="21"><div align="center" class="blancoEncabezado">Num</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">2</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">3</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">4</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">5</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">6</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">-</div></td>
        <td width="17"><div align="center" class="blancoEncabezado">Total</div></td>
      </tr>
      <tr>
        <td><div align="center" class="abcd">A</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center"class="numerosPedido">12</div></td>
      </tr>
      <tr>
        <td><div align="center" class="abcd">B</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
      <tr>
        <td><div align="center" class="abcd">C</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">0</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">2</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">1</div></td>
        <td><div align="center" class="numerosPedido">12</div></td>
      </tr>
    </table>
  </div>
  <div id="divLInPeCom"><img src="carrito/img/linea-divisora.jpg" width="910" height="5" /></div>
  <div id="divEnTaCOmp">
    <table width="910" border="0">
      <tr>
        <td width="49"><div align="center" class="descripcion">
          <div align="left">Img
            <div id="div1icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
            <div id="divSep1Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          </div>
        </div></td>
        <td width="44" class="descripcion"><div align="left">Linea
            <div id="div2icoF">
              <div id="divSep2Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
            <img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
        </div></td>
        <td width="48"><div align="center" class="descripcion">
          <div align="left">Estilo
            <div id="divSep3Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
            <div id="div3icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
          </div>
        </div></td>
        <td width="80"><div align="center" class="descripcion">
          <div align="left">Material
            <div id="div4icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
            <div id="divSep4Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          </div>
        </div></td>
        <td width="74" class="descripcion"><div align="left">Color
          <div id="div5icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
          <div id="divSep5Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
        </div><div align="center"></div></td>
        <td width="41"><div align="center" class="descripcion">
          <div align="left">Paq
            <div id="div6icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
            <div id="divSep6Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          </div>
        </div></td>
        <td width="45" class="descripcion"><div align="left">Cant
          <div id="div7icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
          <div id="divSep7Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
        </div></td>
        <td width="48"><div align="center" class="descripcion">
          <div align="left">Pares
            <div id="divSep8Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
            <div id="div8icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
          </div>
        </div></td>
        <td width="48"><div align="center" class="descripcion">
          <div align="left">Total
            <div id="div9icoF"><img src="img/icono-filtro.jpg" width="8" height="6" /></div>
          </div>
        </div></td>
        <td width="54"><div align="center" class="descripcion">
          <div align="left">IdSal
            <div id="div10icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
            <div id="divSep10Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          </div>
        </div></td>
        <td width="51"><div align="center" class="descripcion">
          <div align="left">IdPed
            <div id="div11icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
            <div id="divSep11Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          </div>
        </div></td>
        <td width="43"><div align="center" class="descripcion">
          <div align="left">Doc
            <div id="div12icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
            <div id="divSep12Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          </div>
        </div></td>
        <td width="73" class="descripcion"><div align="left">FechaDoc
          <div id="divSep13Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          <div id="div13icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
        </div></td>
        <td width="72" class="descripcion"><div align="left">Enviado
          <div id="divSep14Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          <div id="div14icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
        </div></td>
        <td width="78" class="descripcion"><div align="left">Paqueteria
          <div id="divSep15Com"><img src="carrito/img/sep.jpg" width="2" height="10" /></div>
          <div id="div15icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div>
        </div><div id="div15icoF"><img src="carrito/img/icono-filtro.jpg" width="8" height="6" /></div></td>
      </tr>
    </table>
  </div>
   <div id="divRowsDetallePedidos">
  
   <?php 
  	 $mysqli= new mysqli("locahost","user_web","123454321","newcolors");  
  	$sql= "SELECT pedidos.idPed, pedidos_detalle.idPedDet, pedidos_detalle.idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.Precio, pedidos_detalle.clvPaq, pedidos_detalle.cantPaq,pedidos_detalle.Pares, pedidos_detalle.Total,clientes_tiendas.IdDatCli, clientes_tiendas.Nombre, clientes_tiendas.Tienda, clientes_tiendas.Poblacion, clientes_tiendas.Estado, pedidos.seccionCatalogo, DATE_FORMAT(pedidos.fechaPedido,'%Y-%m-%d') as fechaPedido, catalogos_categorias.categoria, catalogos_subcategorias.subcategoria, DATE_FORMAT(pedidos_detalle.fechaSurtido,'%Y-%m-%d') as fechaSurtido,pedidos_detalle.Doc,DATE_FORMAT(pedidos_detalle.fechaDoc,'%Y-%m-%d') as fechaDoc
FROM ((((pedidos INNER JOIN clientes_tiendas ON pedidos.idDatCliFac = clientes_tiendas.IdDatCli) INNER JOIN pedidos_detalle ON pedidos.idPed = pedidos_detalle.idPedido) INNER JOIN estilos ON pedidos_detalle.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) LEFT JOIN catalogos_subcategorias ON estilos.idSubCat = catalogos_subcategorias.idSubCat  where clientes_tiendas.idDatCli=$idDatCliFac
ORDER BY pedidos.idPed";
	
    if($result=$mysqli->query($sql)){

	$cont=1;
	$y_pedido=0;
	$y_detalle=0;

    while($obj2=$result->fetch_object()){
 	  
        $idEstilo=$obj2->idEstilo;
		$linea=$obj2->Linea;
		$estilo=$obj2->Estilo;
		$material=$obj2->Material;
		$color=$obj2->Color;
		$precio=$obj2->Precio;
      	$nombreFoto="$estilo $material $color";
        
		$clvPaq =$obj2->clvPaq;
		$cantPaq=$obj2->cantPaq;
		$pares=$obj2->Pares;
		$total=$obj2->Total;
		
		$idPed=$obj2->idPed;
		$Doc=$obj2->Doc;
		$fechaDoc=$obj2->fechaDoc;
		$fechaSurtido=$obj2->fechaSurtido;
		
	    
		
		$tam = strlen($nombreFoto);
		$res = "";

		for ($r=0;$r<$tam;$r++){
			$car = $nombreFoto[$r];
			if ($car == ' ')
				$car = '-';
			if ($car == 'Ñ')
				$car = 'N';
			if ($car == 'ñ') 
				$car = 'n';
			$res = $res . $car;
		}
		
		$foto=$res.".gif";
      
	  ?>
  
  
 
  
 
  	<div id="divElemPeCom_<?php  echo $obj2->idPedDet;?>" style="position:relative; width:915px; height:53px; z-index:1; top:<?php  echo "$y_pedido" ?>px; left: 0px;">
    <div id="divImgZaCompleto"><img src="http://201.120.55.76/imagenes_system/muestras/minis/<?php  echo "$foto";?>" width="48" height="48" onclick="document.getElementById('divFotoZoom').style.visibility='visible';llamarasincrono('carrito/zoom_shoes.php?estilo=<?php  echo $estilo; ?>&material=<?php  echo $material; ?>&color=<?php  echo $color; ?>&precio=<?php  echo $precio; ?>','divFotoZoom');"  onmouseover="this.style.filter='alpha(opacity=20)';this.style.MozOpacity=.5;document.body.style.cursor = 'pointer';"
onmouseout="this.style.filter='alpha(opacity=100)';this.style.MozOpacity=1;document.body.style.cursor = 'default'"  /></div>
    <div id="div1TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$linea"; ?></div>
    <div id="div2TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$estilo"; ?></div>
    <div id="div3TabCom" class="TipoPedidoCompletoClientes">
      <div align="left"><?php  echo "$material"; ?></div>
    </div>
    <div id="div4TabCom" class="TipoPedidoCompletoClientes">
      <div align="left"><?php  echo "$color"; ?></div>
    </div>
    <div id="div5TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$clvPaq"; ?></div>
    <div id="div6TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$cantPaq"; ?></div>
    <div id="div7TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$pares"; ?></div>
    <div id="div8TabCom" class="TipoPedidoCompletoClientes">$<?php  echo "$total"; ?></div>
    <div id="div9TabCom" class="TipoPedidoCompletoClientes"></div>
    <div id="div10TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$idPed"; ?></div>
    <div id="div11TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$Doc"; ?></div>
    <div id="div12TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$fechaDoc"; ?></div>
    <div id="div13TabCom" class="TipoPedidoCompletoClientes"><?php  echo "$fechaSurtido"; ?></div>
    <div id="div14TabCom" class="TipoPedidoCompletoClientes">envioexpres</div>
  	</div>
   
  
  <?php 
  	  $cont++;	
	  $y_pedido=$y_pedido+0;
	  $y_detalle=$y_detalle+0;
  }
  
  ?>
  </div>
   <div id="divImgCerrar"><img src="carrito/img/cerrar-zoom-x.jpg" name="Imagen4" width="11" height="12" border="0" id="Imagen4" onclick="document.getElementById('divContenedorPedidos').style.visibility='hidden';document.getElementById('divContenedorPedidos').innerHTML='';" /></div>
  <div  class="precioZoom" id="divCerrLePeComple">cerrar</div>
</div>
</div>
<?php 
}
?>