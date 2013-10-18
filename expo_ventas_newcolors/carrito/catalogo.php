<?php 
$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
    
    $sql= "select Estilo,Material from estilos,catalogos_plantilla,catalogo_estilos_plantilla where estilos.id = catalogo_estilos_plantilla.idEstilo and catalogos_plantilla.idCat_Plan=catalogo_estilos_plantilla.idCatPlan group by Estilo,Material ";
    
    $result=$mysqli->query($sql);
	$x=0;
	$y=13;
	$i=1;
	while($obj=$result->fetch_object()){
		echo "<div id='divEstiloCatalogo1' style='position:absolute;width:366px;height:304px;z-index:5;top:{$y}px;left: {$x}px;'>";
        echo "<div class='titulo' id='divEstiloCatalogo1Material' style='position:absolute;width:193px;height:19px;z-index:1;font-family: Verdana, Geneva, sans-serif;font-size: 14px;left: 13px;top: 15px;'>". $obj->estilo ."  ". $obj->material ."</div>";
        echo "<div id='divEstiloCatalogoMarcoImg1' style='position:absolute;width:276px;height:216px;z-index:2;left: 0px;	top: 42px;'>"
        echo "<div id='apDiv55'><img src='editables/vistas-peke/2001-normal/2001-1.gif' name='divEstiloCatalogo1Img' width='203' height='203' id='divEstiloCatalogo1Img' /></div>";
        echo "<img src='fireworks/blanco-catalogo.png' width='279' height='215' /></div>";
        echo "<div id='divEstiloCatalogo1Zoom' style='position:absolute;width:27px;height:26px;z-index:3;left: 248px;top: 212px;'><a href='#' onmouseout='MM_swapImgRestore()' onmouseover='MM_swapImage('Imagen40','','source/lupita-1.png',1)'><img src='source/lupita.png' name='Imagen40' width='26' height='25' border='0' id='Imagen40' /></a></div>";
        echo "<div id='divEstiloCatalogo1MarcoColor' style='position:absolute;width:106px;height:119px;z-index:6;left: 259px;top: 63px;'>";
        echo "<div class='contenido' id='divEstiloCatalogo1ColorEtiqueta' style='position:absolute;width:56px;height:15px;z-index:1;font-family: HelveNueThin;top: 15px;'><span class='contenido'>COLOR</span>:</div>";
        echo "<div id='divEstiloCatalogo1Color' style='position:absolute;width:104px;height:20px;z-index:2;top: 37px;'>";
        echo "<div class='color' id='divEstiloCatalogo1ColorDat' style='position:absolute;width:72px;height:13px;z-index:1;left: 5px;top: 3px;'>BLANCO</div>";
        echo "<img src='source/barra-gris-color.gif' width='102' height='20' /></div>";
        echo "<div id='divEstiloCatalogo1Carro' position:absolute;width:81px;height:31px;z-index:3;	top: 77px;'><a href='#' onmouseout='MM_swapImgRestore()' onmouseover='MM_swapImage('Imagen42','','source/comprar-1.gif',1)'><img src='source/comprar.gif' name='Imagen42' width='79' height='30' border='0' id='Imagen42' /></a></div>";
        echo "</div>";
        echo "<div id='divEstiloCatalogo1TablaColores' style='position:absolute;width:348px;height:33px;z-index:7;top: 268px;left: 0px;'>";
        echo "<table width='348' border='0'>";
        echo "<tr>";
        echo "<td width='20'><img src='source/c-1.gif' width='20' height='19' /></td>";
        echo "<td width='21'><img src='source/c-2.gif' width='20' height='19' /></td>";
        echo "<td width='21'><img src='source/c-3.gif' width='20' height='19' /></td>";
        echo "<td width='21'><img src='source/c-4.gif' width='20' height='19' /></td>";
        echo "<td width='25'>&nbsp;</td>";
        echo "<td width='30'>&nbsp;</td>";
        echo "<td width='37'>&nbsp;</td>";
        echo "<td width='36'>&nbsp;</td>";
        echo "<td width='47'>&nbsp;</td>";
        echo "<td width='107'>&nbsp;</td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
		if($x==0){
			$x=394;	
		}
		else{
			$x=0;
		}
		if(($i%2)!=0 && i!=1){
			$y+=336 ;	
		}
		$i++;
	echo "}";
?>