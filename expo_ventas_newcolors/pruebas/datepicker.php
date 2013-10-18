<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

 <link rel="stylesheet" href="../js/jquery-ui-1.8.14.custom/development-bundle/themes/base/jquery.ui.all.css" >
 <script src="../js/jquery-ui-1.8.14.custom/development-bundle/jquery-1.5.1.js" ></script>
 <script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.core.js"></script>
 <script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.widget.js"></script>
 <script src="../js/jquery-ui-1.8.14.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
 <link rel="stylesheet" href="../js/jquery-ui-1.8.14.custom/development-bundle/demos/demos.css" >
 
		
  
<script type="text/javascript">

$(function() {
		   

	$('#txtCa').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
	$('#txt2').datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
	
	var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		$( "#txtAutocomplete" ).autocomplete({
			source: availableTags
		});
	
});
</script>

<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
}
.ui-datepicker-year{
	font-size: 12px;
}
.ui-datepicker-month{
	font-size: 8px;
}
-->
</style>
</head>

<body>
<div id="apDiv1">
  <p>
    <label>
      <input type="text" name="txtCa" id="txtCa" />
    </label>
  </p>
  <p>
    <label>
      <input type="text" name="txt2" id="txt2" />
    </label>
  </p>
  <p>
    <label>
      <input type="text" name="txtAutocomplete" id="txtAutocomplete" />
    </label>
  </p>
</div>
</body>
</html>
