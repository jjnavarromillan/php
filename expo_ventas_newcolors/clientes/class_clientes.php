<?php 
	require_once("JSON.php");
	class ClientesClass{
		function __construct(){
			$this->mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");
			$this->json = new Services_JSON;
		}
		function conectarToDB($server,$user,$passwd,$database){
			$this->mysqli = new mysqli($server, $user, $passwd, $database);
			$this->mysqli->query("SET NAMES 'utf8'");
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}	
		}
		
		
		function registroCliente($nombre, $domicilio , $col, $idMunicipio,$idEstado,$idPais,$cp,$RFC,$encargado,$saldoPendiente,$telefonos,$activoVenta,$activoWeb,$observacionCliente,$email){
			date_default_timezone_set("Mexico/General");
			$fechaAlta=date("Y-m-d H:i:s");
			$fechaRegistro = $fechaAlta;
			if($activoVenta=='true')
				$activoVenta=1;
			if($activoWeb=='true')
				$activoWeb=1;
			
			
			$sql = "insert into detallistas_clientes (nombre,domicilio,col,idMunicipio,idEstado,idPais,cp,RFC,encargado,fechaAlta,saldoPendiente,telefonos,activoVenta,activoWeb,observacionCliente,fechaRegistro,email)  values ('$nombre','$domicilio','$col','$idMunicipio','$idEstado','$idPais','$cp','$RFC','$encargado','$fechaAlta','$saldoPendiente','$telefonos','$activoVenta','$activoWeb','$observacionCliente','$fechaRegistro','$email')";
			echo "$sql";
			$result=$this->mysqli->query($sql);
			$id=$this->existeCliente($nombre);
			return $id;
		}
		
		function actualizaCliente($idCliente,$domicilio , $col, $idMunicipio,$idEstado,$idPais,$cp,$RFC,$encargado,$saldoPendiente,$telefonos,$activoVenta,$activoWeb,$observacionCliente,$email){
			date_default_timezone_set("Mexico/General");
			$fechaAlta=date("Y-m-d H:i:s");
			$fechaRegistro = $fechaAlta;
			$sql = "update detallistas_clientes set  domicilio='$domicilio',col='$col',idMunicipio='$idMunicipio',idEstado='$idEstado',idPais='$idPais',cp='$cp',RFC='$RFC',encargado='$encargado',fechaAlta='$fechaAlta',saldoPendiente='$saldoPendiente',telefonos='$telefonos',activoVenta='$activoVenta',activoWeb='$activoWeb',observacionCliente='$observacionCliente',fechaRegistro='$fechaRegistro',email='$email'  where idCliente=$idCliente";
			
			$result=$this->mysqli->query($sql);
		}
		
	function existeCliente($nombre){
        $sql = "select * from detallistas_clientes where nombre='$nombre'";
		
        $result=$this->mysqli->query($sql);
		$id="";
		if($result){
			$num=mysqli_num_rows($result);
			if($num>0)
			{	
				$rowdata=mysqli_fetch_object($result);
				$id=$rowdata->idCliente;
			}
		}	
		return $id;
	}
     function existeTienda($idCliente,$tienda){
		
        $sql = "select * from detallistas_tiendas where idCliente=$idCliente and tienda='$tienda'";
        $result=$this->mysqli->query($sql);
		$id="";
		if($result){
			$num=mysqli_num_rows($result);
			if($num>0)	
			{	
				$rowdata=mysqli_fetch_object($result);
				$id=$rowdata->idTienda;
				
			}
		}	
		return $id;
	}
	function registroTienda($idCliente,$tienda,$domicilio,$col,$idMunicipio,$idEstado,$idPais,$cp,$encargado,$saldoPendiente,$telefonos,$activoVenta,$activoWeb,$observacionTienda,$transporte,$obsGuia,$transporteSeguro){
		date_default_timezone_set("Mexico/General");
        $fechaAlta=date("Y-m-d H:i:s");
        $fechaRegistro = $fechaAlta;
		if($activoVenta=='true')
			$activoVenta=1;
		if($activoWeb=='true')
			$activoWeb=1;
        $sql = "insert into detallistas_tiendas (idCliente,tienda,domicilio,col,idMunicipio,idEstado,idPais,cp,encargado,fechaAlta,telefonos,observacionTienda,fechaRegistro,transporte, obsGuia,transporteSeguro,activoVenta,activoWeb) values ('$idCliente','$tienda','$domicilio','$col','$idMunicipio','$idEstado','$idPais','$cp','$encargado','$fechaAlta','$telefonos','$observacionTienda','$fechaRegistro','$transporte','$obsGuia','$transporteSeguro','$activoVenta','$activoWeb')";

		$result=$this->mysqli->query($sql);
		$id=$this->existeTienda($tienda);

		return $id;
			
		}
		
		function actualizaTienda($idTienda,$domicilio,$col,$idMunicipio,$idEstado,$idPais,$cp,$encargado,$saldoPendiente,$telefonos,$activoVenta,$activoWeb,$observacionTienda,$transporte,$obsGuia,$transporteSeguro){
			
			date_default_timezone_set("Mexico/General");
			$fechaAlta=date("Y-m-d H:i:s");
			$fechaRegistro = $fechaAlta;
			$sql = " update detallistas_tiendas set 	domicilio='$domicilio',col='$col',idMunicipio='$idMunicipio',idEstado='$idEstado',idPais='$idPais',cp='$cp',encargado='$encargado',fechaAlta='$fechaAlta',telefonos='$telefonos',observacionTienda='$observacionTienda',fechaRegistro='$fechaRegistro',transporte='$transporte',obsGuia='$obsGuia',transporteSeguro='$transporteSeguro',activoVenta='$activoVenta',activoWeb='$activoWeb'  where idTienda=$idTienda ";
			echo "<br> $sql";
			$result=$this->mysqli->query($sql);
			
		}
		
		function verDatosTienda($idTienda){
			
			 $sql = " SELECT detallistas_tiendas.idTienda, detallistas_tiendas.idCliente, detallistas_tiendas.tienda, detallistas_tiendas.domicilio, detallistas_tiendas.col, paises.pais, estados.estado, municipios.municipio, detallistas_tiendas.cp, detallistas_tiendas.encargado, detallistas_tiendas.fechaAlta, detallistas_tiendas.totalCompras, detallistas_tiendas.telefonos, detallistas_tiendas.observacionTienda, detallistas_tiendas.email, detallistas_tiendas.transporte, detallistas_tiendas.obsGuia, detallistas_tiendas.transporteSeguro, detallistas_tiendas.fechaCancelado, detallistas_tiendas.motivoCancelado FROM ((detallistas_tiendas INNER JOIN paises ON detallistas_tiendas.idPais = paises.idPais) INNER JOIN estados ON detallistas_tiendas.idEstado = estados.idEstado) INNER JOIN municipios ON detallistas_tiendas.idMunicipio = municipios.idMunicipio where idTienda='$idTienda'";
		
			if($result_data=$this->mysqli->query($sql)){
				
				$totEmp = mysqli_num_rows($result_data);
				 
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				return $this->json->encode($data);
			}
		}
		function verDatosCliente($idCliente){
			 $sql = "SELECT detallistas_clientes.idCliente, detallistas_clientes.nombre, detallistas_clientes.domicilio, detallistas_clientes.col, paises.pais, estados.estado, municipios.municipio, detallistas_clientes.cp, detallistas_clientes.encargado, detallistas_clientes.fechaAlta, detallistas_clientes.saldoPendiente, detallistas_clientes.totalCompras, detallistas_clientes.limiteCredito, detallistas_clientes.telefonos, detallistas_clientes.activoVenta, detallistas_clientes.activoWeb, detallistas_clientes.observacionCliente, detallistas_clientes.RFC, detallistas_clientes.fechaCancelado, detallistas_clientes.motivoCancelado, detallistas_clientes.fechaRegistro,detallistas_clientes.email FROM ((detallistas_clientes INNER JOIN paises ON detallistas_clientes.idPais = paises.idPais) INNER JOIN estados ON detallistas_clientes.idEstado = estados.idEstado) INNER JOIN municipios ON detallistas_clientes.idMunicipio = municipios.idMunicipio where idCliente='$idCliente'";
			if($result_data=$this->mysqli->query($sql)){
				$totEmp = mysqli_num_rows($result_data);
				if ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				return $this->json->encode($data);
			}
		}
	function verTiendasXCliente($idCliente){
			$sql = "SELECT detallistas_tiendas.idTienda, detallistas_tiendas.idCliente, detallistas_tiendas.tienda, detallistas_tiendas.domicilio, detallistas_tiendas.col, paises.pais, estados.estado, municipios.municipio, detallistas_tiendas.cp, detallistas_tiendas.encargado, detallistas_tiendas.fechaAlta, detallistas_tiendas.totalCompras, detallistas_tiendas.telefonos, detallistas_tiendas.observacionTienda, detallistas_tiendas.email, detallistas_tiendas.transporte, detallistas_tiendas.obsGuia, detallistas_tiendas.transporteSeguro, detallistas_tiendas.fechaCancelado, detallistas_tiendas.motivoCancelado  FROM ((detallistas_tiendas INNER JOIN paises ON detallistas_tiendas.idPais = paises.idPais) INNER JOIN estados ON detallistas_tiendas.idEstado = estados.idEstado) INNER JOIN municipios ON detallistas_tiendas.idMunicipio = municipios.idMunicipio where idCliente='$idCliente'";
			if($result_data=$this->mysqli->query($sql)){
				$totEmp = mysqli_num_rows($result_data);
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				return $this->json->encode($data);
			}
		}
		function verTiendaXIdTienda($idTienda){
			$sql = "SELECT detallistas_tiendas.idTienda, detallistas_tiendas.idCliente, detallistas_tiendas.tienda, detallistas_tiendas.domicilio, detallistas_tiendas.col, paises.pais, estados.estado, municipios.municipio, detallistas_tiendas.cp, detallistas_tiendas.encargado, detallistas_tiendas.fechaAlta, detallistas_tiendas.totalCompras, detallistas_tiendas.telefonos, detallistas_tiendas.observacionTienda, detallistas_tiendas.email, detallistas_tiendas.transporte, detallistas_tiendas.obsGuia, detallistas_tiendas.transporteSeguro, detallistas_tiendas.fechaCancelado, detallistas_tiendas.motivoCancelado,detallistas_tiendas.idEstado  FROM ((detallistas_tiendas INNER JOIN paises ON detallistas_tiendas.idPais = paises.idPais) INNER JOIN estados ON detallistas_tiendas.idEstado = estados.idEstado) INNER JOIN municipios ON detallistas_tiendas.idMunicipio = municipios.idMunicipio where idTienda='$idTienda'";
			if($result_data=$this->mysqli->query($sql)){
				$totEmp = mysqli_num_rows($result_data);
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				return $this->json->encode($data);
			}
		}
		function verTiendasXClienteCombo($idCliente){
			$sql = "SELECT detallistas_tiendas.idTienda, CONCAT(detallistas_tiendas.tienda,' - ',municipios.municipio,' - ',estados.estado,' - ',detallistas_tiendas.col,' - ',detallistas_tiendas.domicilio,' - Tel.',detallistas_tiendas.telefonos) as tienda   FROM ((detallistas_tiendas INNER JOIN paises ON detallistas_tiendas.idPais = paises.idPais) INNER JOIN estados ON detallistas_tiendas.idEstado = estados.idEstado) INNER JOIN municipios ON detallistas_tiendas.idMunicipio = municipios.idMunicipio where idCliente='$idCliente' order by tienda";
			if($result_data=$this->mysqli->query($sql)){
				$totEmp = mysqli_num_rows($result_data);
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				return $this->json->encode($data);
			}
		}
		function verUsuariosXClienteCombo($idCliente){
			
			$sql = "SELECT usuarios_web.idUsuarioWeb,usuarios_web.idRelacion,CONCAT( usuarios_web.nombre,' - ', usuarios_web.correo,' - ',usuarios_web.tipoUsuarioWebCliente) as usuarioWeb  FROM usuarios_web where usuarios_web.idRelacion='$idCliente' and tipoUsuario='cliente'";

			if($result_data=$this->mysqli->query($sql)){
				$totEmp = mysqli_num_rows($result_data);
				while ($rowEmp = mysqli_fetch_assoc($result_data)) {
					$data[] = $rowEmp;
				}
				return $this->json->encode($data);
			}
		}
	function verUsuariosWebXCliente($idCliente){
		$sql = "SELECT usuarios_web.idUsuarioWeb,usuarios_web.idRelacion, usuarios_web.nombre, usuarios_web.correo, usuarios_web.status,usuarios_web.tipoUsuarioWebCliente as tipo  FROM usuarios_web where usuarios_web.idRelacion='$idCliente' and tipoUsuario='cliente'";
		if($result_data=$this->mysqli->query($sql)){	
			$totEmp = mysqli_num_rows($result_data);
			 
			while ($rowEmp = mysqli_fetch_assoc($result_data)) {
				$data[] = $rowEmp;
			}
			return $this->json->encode($data);
		}	
	}
	
	function crearUsuarioDeCliente($idCliente,$nombre,$correo,$passwd){
	
			$sql = " insert into usuarios_web (nombre,correo,passwd,idRelacion,tipoUsuario,status) values ('$nombre','$correo','$passwd','$idCliente','cliente','activo') ";
			$result=$this->mysqli->query($sql);
			$id=$this->existeUsuarioWeb($correo);
	
		return $id;
	}
	function existeUsuarioWeb($correo){
        
        $sql = "select * from usuarios_web where correo='$correo'";
  		$result=$this->mysqli->query($sql);     	
       	$id="";
		if($result){
			$num=mysqli_num_rows($result);
			if($num>0)
			{	
				$rowdata=mysqli_fetch_object($result);
				$id=$rowdata->idRelacion;
				
			}
		}	
		return $id;
	}
	function createContrasena(){
		    return rand(5000, 20000);
	}

    

}

?>