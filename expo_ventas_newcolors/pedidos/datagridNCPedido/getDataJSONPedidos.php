	
	<?php     
			
			$idRelacion = $_REQUEST['idRelacion'];
			$cliente=$_REQUEST['cliente'];
		    require_once("JSON.php");
			$json = new Services_JSON;
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
			$mysqli->query("SET NAMES 'utf8'");
			 
			$sqlGetData =  "SELECT pedidos.idPed, pedidos_detalle.idPedDet, pedidos_detalle.idEstilo, estilos.Linea, estilos.Estilo, estilos.Material,
estilos.Color,estilos.Precio, pedidos_detalle.clvPaq, pedidos_detalle.cantPaq,pedidos_detalle.Pares, pedidos_detalle.Total,
detallistas_tiendas.idCliente,  detallistas_tiendas.Tienda,
pedidos.seccionCatalogo, DATE_FORMAT(pedidos.fechaPedido,'%Y-%m-%d') as fechaPedido, catalogos_categorias.categoria,
catalogos_subcategorias.subcategoria, DATE_FORMAT(pedidos_detalle.fechaSurtido,'%Y-%m-%d') as fechaSurtido,pedidos_detalle.Doc,
DATE_FORMAT(pedidos_detalle.fechaDoc,'%Y-%m-%d') as fechaDoc
FROM ((((pedidos INNER JOIN detallistas_tiendas ON pedidos.idTienda = detallistas_tiendas.idTienda)
INNER JOIN pedidos_detalle ON pedidos.idPed = pedidos_detalle.idPedido) INNER JOIN estilos ON pedidos_detalle.idEstilo = estilos.Id)
LEFT JOIN catalogos_categorias ON estilos.idCategoria = catalogos_categorias.idCatCat) LEFT JOIN catalogos_subcategorias ON estilos.idSubCat = catalogos_subcategorias.idSubCat
WHERE detallistas_tiendas.idCliente= $idRelacion 
ORDER BY pedidos.idPed";

			if($result_data=$mysqli->query($sqlGetData)){
				
				$totEmp = mysqli_num_rows($result_data);
				 
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				echo $json->encode($data);
			}
	?>