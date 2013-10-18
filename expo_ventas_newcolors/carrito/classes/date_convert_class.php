<?php 
	
	/*$fechaFormed="2009/12/02";
	$fecha = date("Y-m-d",mktime(0,0,0,12,13,2009));
	echo $fecha;
	
	function cambiaf_a_normal($fecha){
	    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
	    return $lafecha;
	}*/
	
	class date_convert{
		var $fechaIni;
		var $fechaFin;		
		
		public $horas_totales;
		public $minutos_totales;
		
		public $dias_trans;
		public $horas_trans;
		public $min_trans;
		
		function __construct($fechaIni, $fechaFin){
			date_default_timezone_set("Mexico/General");
			$this->fechaIni=$fechaIni;
			$this->fechaFin=$fechaFin;
			$this->init($fechaIni,$fechaFin);
		}
		function init($fechaIni,$fechaFin){
			
			$s = strtotime($fechaFin)-strtotime($fechaIni);
			$d = intval($s/86400);
			$s -= $d*86400;
			$h = intval($s/3600);
			$s -= $h*3600;
			$m = intval($s/60);
			$s -= $m*60;
			
			$dif= (($d*24)+$h)." ".$m."min";
			$this->horas_totales=($d*24)+$h;
			$this->minutos_totales=$m;
			
			$this->dias_trans=$d;
			$this->horas_trans=$h;
			$this->min_trans=$m;
			
			//$dif2= $d." dias ".$h." Horas ".$m."min";
				
		}
		function getHorasTranscurridas(){
			return 	$this->horas_totales;		
		}
		function getMinutosDeHorasTranscurridas(){
			return 	$this->minutos_totales;
		}
		function getDias_trans(){
			return 	$this->dias_trans;
		}
		function getHoras_Dias_trans(){
			return 	$this->horas_trans;
		}
		function getMin_Dias_trans(){
			return 	$this->min_trans;
		}
		

	}
	
	/*$my_datos=new date_convert('2009/11/21 10:00:15','2009/11/25 17:25:15');
	echo "Horas transcurridas totales".$my_datos->getHorasTranscurridas()."<br>";
	echo "Minutos transcurridos totales ".$my_datos->getMinutosDeHorasTranscurridas()."<br>";
	echo "Dias trans ".$my_datos->getDias_trans()."<br>";
	echo "Horas trans ".$my_datos->getHoras_Dias_trans()."<br>";
	echo "Minutos trans ".$my_datos->getMin_Dias_trans()."<br>";*/


?>