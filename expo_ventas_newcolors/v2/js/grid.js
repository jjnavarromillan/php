$intFilterElements = 0;
$strImgS = 'img/chk_s.png';
$strImgNS = 'img/chk_ns.png';
$intColFilter = "";

function scrollHeader($strGrid){
	$('#div' + $strGrid + 'Header').scrollLeft($('#div' + $strGrid + 'Data').scrollLeft());
};

function showFilter($intCell,$strGrid,$intTotalRecords){
	var $arrValues = new Array();

	$intColFilter = $intCell;

	if($('#div' + $strGrid + 'Filter').css('display')!='none'){
		hideFilter($strGrid);
	};

	$('#spn' + $strGrid + 'Filter').html($('#spnH' + $strGrid + '_' + $intCell).html());
	$('#div' + $strGrid + 'FilterData').html('');
	for($intX=0;$intX<=$intTotalRecords;$intX++){
		if($('#row' + $strGrid + '_' + $intX).css('display')!='none'){
			if($.inArray($('#cel' + $strGrid + '_' + $intCell + '_' + $intX).html(),$arrValues)==-1){
				$arrValues.push($('#cel' + $strGrid + '_' + $intCell + '_' + $intX).html());
			};
		};
	};
	$arrValues.sort();
	$intFilterElements = $arrValues.length;
	for($intX=0;$intX<$arrValues.length;$intX++){
		$('#div' + $strGrid + 'FilterData').append('<img id="chkF' + $strGrid + '_' + $intX + '" class="chkOpt" src="' + $strImgS + '" onclick="switchChk(this,\'' + $strGrid + '\');" chkValue="' + $arrValues[$intX] + '" >' + $arrValues[$intX] + '<br />');
	};
	
	$('#div' + $strGrid + 'Filter').css('height',(parseInt($('#div' + $strGrid + 'Header').css('height').replace('px',''),10) + parseInt($('#div' + $strGrid + 'Header').css('margin-bottom').replace('px',''),10) + parseInt($('#div' + $strGrid + 'Data').css('height').replace('px',''),10)) + 'px');
	$('#div' + $strGrid + 'FilterData').css('height',((parseInt($('#div' + $strGrid + 'Header').css('height').replace('px',''),10) + parseInt($('#div' + $strGrid + 'Header').css('margin-bottom').replace('px',''),10) + parseInt($('#div' + $strGrid + 'Data').css('height').replace('px',''),10)) - 110) + 'px');
	
	$('#div' + $strGrid + 'Grid').css('width',(parseInt($('#div' + $strGrid + 'Grid').css('width').replace('px',''),10) - 257) + 'px');
	$('#div' + $strGrid + 'Filter').fadeIn('fast');
	
};

function hideFilter($strGrid){
	$('#div' + $strGrid + 'Grid').css('width',(parseInt($('#div' + $strGrid + 'Grid').css('width').replace('px',''),10) + 257) + 'px');
	$('#div' + $strGrid + 'Filter').hide();
};

function applyFilter($strGrid,$intTotalRecords){
	var $arrFValues = new Array();
	for($intX=0;$intX<$intFilterElements;$intX++){
		if($('#chkF' + $strGrid + '_' + $intX).attr('src')==$strImgS){
			$arrFValues.push($('#chkF' + $strGrid + '_' + $intX).attr('chkValue'));
		};
	};
	for($intX=0;$intX<=$intTotalRecords;$intX++){
		if($.inArray($('#cel' + $strGrid + '_' + $intColFilter + "_" + $intX).html(),$arrFValues)==-1){
			$('#row' + $strGrid + '_' + $intX).slideUp('fast');
		}else{
			$('#row' + $strGrid + '_' + $intX).slideDown('fast');
		};
	}
	hideFilter($strGrid);
};

function restoreFilter($strGrid,$intTotalRecords){
	for($intX=0;$intX<$intTotalRecords;$intX++){
		$('#row' + $strGrid + '_' + $intX).slideDown('fast');
	};
	hideFilter($strGrid);
};

function switchChk($objChk,$strGrid){
	if($($objChk).attr('src')==$strImgS){
		$($objChk).attr('src',$strImgNS);
		$strImg = $strImgNS;
	}else{
		$($objChk).attr('src',$strImgS);
		$strImg = $strImgS;
	};
	if($($objChk).attr('id')=='chk' + $strGrid + 'All'){
		for($intX=0;$intX<$intFilterElements;$intX++){
			$('#chkF' + $strGrid + '_' + $intX).attr('src',$strImg);
		};
	}else{
		$intCChecked = 0;
		for($intX=0;$intX<$intFilterElements;$intX++){
			if($('#chkF' + $strGrid + '_' + $intX).attr('src')==$strImgS){
				$intCChecked++;
			};
		};
		if($intCChecked==$intFilterElements){
			$('#chk' + $strGrid + 'All').attr('src',$strImgS);
		}else{
			$('#chk' + $strGrid + 'All').attr('src',$strImgNS);
		};
	};
};

function formatGrid($strGrid,$strGridHeight,$intGridColumns,$intTotalRecords){
	var $arrW = new Array();
	$intW = 0;
	
		for($intIx=0;$intIx<$intGridColumns;$intIx++){
			$arrW[$intIx] = $('#header' + $strGrid + '_' + $intIx).width();
		};
		for($intIxX=0;$intIxX<=$intTotalRecords;$intIxX++){
			for($intIxY=0;$intIxY<$intGridColumns;$intIxY++){
				if($('#cel' + $strGrid + '_' + $intIxY + '_' + $intIxX).width() > $arrW[$intIxY]){
					$arrW[$intIxY] = $('#cel' + $strGrid + '_' + $intIxY + '_' + $intIxX).width();
				};
			};
		};4
		for($intIx=0;$intIx<$intGridColumns;$intIx++){
			$('#header' + $strGrid + '_' + $intIx).css('width',$arrW[$intIx] + 'px');
			$intW = $intW + $arrW[$intIx];
		};
		for($intIxX=0;$intIxX<=$intTotalRecords;$intIxX++){
			for($intIxY=0;$intIxY<$intGridColumns;$intIxY++){
				$('#cel' + $strGrid + '_' + $intIxY + '_' + $intIxX).css('width',$arrW[$intIxY] + 'px');
			};
		};
		$intW = $intW + ($intGridColumns * 20) + $intGridColumns;
		$('#div' + $strGrid + 'HContainer').css('width',($intW + 20) + 'px');
		$('#div' + $strGrid + 'DContainer').css('width',$intW + 'px');

		if(($intW +	 20)>1020){
			console.log('entro');
			$('#div' + $strGrid + 'MainGrid').css('width','1020px');
			$('#div' + $strGrid + 'Grid').css('width','1014px');
		}else{
			$('#div' + $strGrid + 'MainGrid').css('width',($intW + 20) - 3 + 'px');
			$('#div' + $strGrid + 'Grid').css('width',($intW + 20) - 3 + 'px');
		};
		
		$('#div' + $strGrid + 'Grid').css('border','2px #505050 solid');
		$('#div' + $strGrid + 'Header').css('height','25px');
		$('#div' + $strGrid + 'Header').css('margin-bottom','2px');
		$('#div' + $strGrid + 'Data').css('height',$strGridHeight);
};
