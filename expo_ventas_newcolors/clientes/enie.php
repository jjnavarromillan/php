<?php 
	function reemplazaMe($text) {
        utf8_encode($text);
        $codigo= array("á","é","í","ó", "ú","ü","ñ");
        $cambiar = array("á","é","í","ó","ú","ü","ñ");
        $text = str_replace($codigo, $cambiar, $text);
        $text= strtolower($text);
        return $text;
	} 
	function extractEnie($texto){
		$tam=strlen($texto);
		
		for ($i=0;$i<$tam-0;$i++){
			echo "--$texto[$i]-- <br>";
			/*if($texto[$i]=="ñ"){
				//$texto[$i]="n";
				echo "OKKKK";
			}*/					
		}
	}
	$variable = "serés";
	echo extractEnie($variable);
?>