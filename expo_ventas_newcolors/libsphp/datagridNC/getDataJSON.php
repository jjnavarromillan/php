	
	<?php     
		    require_once("JSON.php");
			$json = new Services_JSON;
			$mysqli= new mysqli("locahost","user_web","123454321","newcolors");    
			$mysqli->query("SET NAMES 'utf8'");
			 
			$sqlGetData =  "SELECT pedidos.idPed, pedidos_detalle.idPedDet, pedidos_detalle.idEstilo, estilos.Linea, estilos.Estilo, estilos.Material, estilos.Color,estilos.Precio, pedidos_detalle.clvPaq, pedidos_detalle.cantPaq,pedidos_detalle.Pares, pedidos_detalle.Total,clientes_tiendas.IdDatCli, clientes_tiendas.Nombre, clientes_tiendas.Tienda, clientes_tiendas.Poblacion, clientes_tiendas.Estado, pedidos.seccionCatalogo, DATE_FORMAT(pedidos.fechaPedido,'%Y-%m-%d') as fechaPedido, catalogos_categorias.categoria, catalogos_subcategorias.subcategoria, DATE_FORMAT(pedidos_detalle.fechaSurtido,'%Y-%m-%d') as fechaSurtido,pedidos_detalle.Doc,DATE_FORMAT(pedidos_detalle.fechaDoc,'%Y-%m-%d') as fechaDoc
FROM ((((pedidos INNER JOIN clientes_tiendas ON pedidos.idDatCliFac = clientes_tiendas.IdDatCli) INNER JOIN pedidos_detalle ON pedidos.idPed = pedidos_detalle.idPedido) INNER JOIN estilos ON pedidos_detalle.idEstilo = estilos.Id) LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) LEFT JOIN catalogos_subcategorias ON estilos.idSubCat = catalogos_subcategorias.idSubCat  
ORDER BY pedidos.idPed";
			if($result_data=$mysqli->query($sqlGetData)){
				
				$totEmp = mysqli_num_rows($result_data);
				 
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				echo $json->encode($data);
			}
	?>