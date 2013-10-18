function startTime(){
	$dteToday=new Date();
	$intHH=$dteToday.getHours();
	$intMM=$dteToday.getMinutes();
	$intSS=$dteToday.getSeconds();
	$strMer = "a.m.";
	if($intMM<10){
		$intMM = "0" + $intMM;
	};
	if($intSS<10){
		$intSS = "0" + $intSS;
	};
	if($intHH>12){
		$intHH=$intHH-12;
		$strMer = "p.m.";
	};
	$('#divTime').html("&bull; " + $intHH + ":" + $intMM + ":" + $intSS + " " + $strMer + " &bull;");
	$fTime=setTimeout(function(){startTime()},500);
};