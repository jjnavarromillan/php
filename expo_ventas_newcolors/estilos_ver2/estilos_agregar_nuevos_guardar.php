<?php 
	$banera=true;
	$linea="";
	if(isset($_REQUEST['linea'])){
		$linea=($_REQUEST['linea']);
		$banera=false;
	}
	$estilo="";
	if(isset($_REQUEST['estilo'])){
		$estilo=($_REQUEST['estilo']);
		$banera=false;
	}
	
	$material="";
	if(isset($_REQUEST['material'])){
		$material=($_REQUEST['material']);
		$banera=false;
	}
	$color="";
	if(isset($_REQUEST['color'])){
		$color=($_REQUEST['color']);
		$banera=false;
	}
	
	$precio="";
	if(isset($_REQUEST['precio'])){
		$precio=($_REQUEST['precio']);
		$banera=false;
	}
	
	$descripcion="";
	if(isset($_REQUEST['descripcion'])){
		$descripcion=($_REQUEST['descripcion']);
		$banera=false;
	}
	
	$etiq_dis="";
	if(isset($_REQUEST['etiq_dis'])){
		$etiq_dis=($_REQUEST['etiq_dis']);
		$banera=false;
	}
	
	$idCategoria="";
	if(isset($_REQUEST['idCategoria'])){
		$idCategoria=($_REQUEST['idCategoria']);
		$banera=false;
	}
	
	$idSubCat="";
	if(isset($_REQUEST['idSubCat'])){
		$idSubCat=($_REQUEST['idSubCat']);
		$banera=false;
	}
	$idPlantillaCatalogo="";
	if(isset($_REQUEST['comboPlantillaCatalogo'])){
		$idPlantillaCatalogo=($_REQUEST['comboPlantillaCatalogo']);
		$banera=false;
	}
	
	
	
	$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
	$mysqli->query("SET NAMES 'utf8'");
	
	$sqlBus = "select * from estilos where estilo='$estilo' and material='$material' and color='$color'";
	$idEstilo="";
	if($resultBusc = $mysqli->query($sqlBus)){
		
		$num=mysqli_num_rows($resultBusc);
		if($num>0)
		{	
			$rowdata=mysqli_fetch_object($resultBusc);
			$idEstilo=$rowdata->Id;
			
			
			
		}
		
		
	}
	
	
	if($idEstilo==""){
		$sql="insert into estilos (linea,estilo,material,color,precio,descripcion,idCategoria,idSubCat,activo,etiq_dis) values ('$linea','$estilo','$material','$color','$precio','$descripcion','$idCategoria','$idSubCat',true,'$etiq_dis') ";
		
		$result=$mysqli->query($sql);
		
		$sqlRec ="select * from estilos where estilo='$estilo' and material='$material' and color='$color'";
		
		$resultRec=$mysqli->query($sqlRec);
		$id="";
		$max=0;
		if($resultRec){
			$num=mysqli_num_rows($resultRec);
			if($num>0)
			{	
				$rowdata=mysqli_fetch_object($resultRec);
				$idEstilo=$rowdata->Id;
				
				$maxOrderPlantilla = " select max(orden) as maximo from catalogo_estilos_plantilla where idPlantilla='$idPlantillaCatalogo' ";
				$resultMax = $mysqli->query($maxOrderPlantilla);
				$numMax=mysqli_num_rows($resultMax);
				if($numMax>0)
				{	
					$rowdataMax=mysqli_fetch_object($resultMax);
					$max = $rowdataMax->maximo;
					$max++;
				}
				
				$sqlAgregaAPlantilla = "insert into catalogo_estilos_plantilla (idPlantilla,idEstilo,orden) values ('$idPlantillaCatalogo','$idEstilo','$max') ";
				$mysqli->query($sqlAgregaAPlantilla);
				
			}
		}	
	}
	else{
		
		$sqlIdEstiloEnPlantilla = " select * from catalogo_estilos_plantilla where idEstilo='$idEstilo' and idPlantilla='$idPlantillaCatalogo'";
		$resultEstiloEnPlantilla = $mysqli->query($sqlIdEstiloEnPlantilla);
		$numEstPl=mysqli_num_rows($resultEstiloEnPlantilla);
		echo "cant: $numEstPl -  ";
		if($numEstPl==0)
		{	
			$maxOrderPlantilla = " select max(orden) as maximo from catalogo_estilos_plantilla where idPlantilla='$idPlantillaCatalogo' ";
			$resultMax = $mysqli->query($maxOrderPlantilla);
			$numMax=mysqli_num_rows($resultMax);
			if($numMax>0)
			{	
				$rowdataMax=mysqli_fetch_object($resultMax);
				$max = $rowdataMax->maximo;
				$max++;
			}
			
			$sqlAgregaAPlantilla = "insert into catalogo_estilos_plantilla (idPlantilla,idEstilo,orden) values ('$idPlantillaCatalogo','$idEstilo','$max') ";
			$mysqli->query($sqlAgregaAPlantilla);
		}
		
		
		
		
	}
	echo "$idEstilo";

?>