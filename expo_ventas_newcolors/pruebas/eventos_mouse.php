<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" >
	function isEnterPress(evt)
		{
			var ban=false;
			var charCode = (evt.which) ? evt.which : event.keyCode;
			if(charCode==13){
				ban=true;
				alert("Fue enter");
			}
			return ban;
		} 
		
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<label>
  <input type="text" name="txtCod" id="txtCod"  onkeypress="isEnterPress(event);"/>
</label>
</body>
</html>