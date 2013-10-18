<?php

	$idEstilosSel= $_REQUEST['idEstilo'];
	$precio= $_REQUEST['precio'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>



<script language="javascript">
	
	
</script>

<style type="text/css">
<!--
#divFormNumeracionPersonalizadaLblN2 {
	position:absolute;
	width:7px;
	height:7px;
	z-index:4;
	left: 11px;
	top: -3px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN2m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:5;
	left: 48px;
	top: -3px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN3 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:6;
	left: 87px;
	top: -3px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN3m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:7;
	left: 124px;
	top: -3px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN4 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:8;
	left: 161px;
	top: -3px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN4m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:9;
	left: 198px;
	top: -3px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN5 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:10;
	left: 235px;
	top: -3px;
	margin: 0px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN5m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:11;
	left: 271px;
	top: -3px;
	padding: 6px;
}
#divFormNumeracionPersonalizadaLblN6 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:12;
	left: 310px;
	top: -3px;
}
#divFormNumeracionPersonalizadaLblN6m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:13;
	left: 347px;
	top: -3px;
}
#divFormNumeracionPersonalizadaCerrar {
	position:absolute;
	width:18px;
	height:15px;
	z-index:3501;
	left: 542px;
	top: 11px;
	text-align: center;
}

#divFormNumeracionPersonalizada {
	position:absolute;
	width:566px;
	height:186px;
	z-index:3500;
	top: 26px;
	left: 1px;
	border: thin solid #999;
	background-color: #FFFFFF;
}
#divFormNumeracionPersonalizadaNumeros {
	position:absolute;
	width:552px;
	height:25px;
	z-index:1;
	top: 107px;
	left: 12px;
}
#divFormNumeracionPersonalizadaN2 {
	position:absolute;
	width:20px;
	height:20px;
	z-index:1;
	text-align: center;
	left: 3px;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN2m {
	position:absolute;
	width:20px;
	height:20px;
	z-index:2;
	left: 40px;
	top: 3px;
	text-align: center;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN3 {
	position:absolute;
	width:20px;
	height:20px;
	z-index:3;
	left: 78px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN3m {
	position:absolute;
	width:20px;
	height:20px;
	z-index:4;
	left: 115px;
	top: 3px;
	text-align: center;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN4 {
	position:absolute;
	width:20px;
	height:20px;
	z-index:5;
	left: 153px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN4m {
	position:absolute;
	width:20px;
	height:20px;
	z-index:6;
	left: 190px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN5 {
	position:absolute;
	width:20px;
	height:20px;
	z-index:7;
	left: 227px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN5m {
	position:absolute;
	width:20px;
	height:20px;
	z-index:8;
	left: 264px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN6 {
	position:absolute;
	width:35px;
	height:22px;
	z-index:9;
	left: 353px;
	text-align: center;
	top: 4px;
}

#divFormNumeracionPersonalizadaN6A {
	position:absolute;
	width:35px;
	height:22px;
	z-index:9;
	left: 353px;
	text-align: center;
	top: 4px;
}

#divFormNumeracionPersonalizadaN2A {
	position:absolute;
	width:20px;
	height:20px;
	z-index:1;
	text-align: center;
	left: 2px;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN2mA {
	position:absolute;
	width:20px;
	height:20px;
	z-index:2;
	left: 40px;
	top: 3px;
	text-align: center;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN3A {
	position:absolute;
	width:20px;
	height:20px;
	z-index:3;
	left: 78px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN3mA {
	position:absolute;
	width:20px;
	height:20px;
	z-index:4;
	left: 115px;
	top: 3px;
	text-align: center;
	color: #000;
	padding: 6px;
	background-color: #CCCCCC;
}
#divFormNumeracionPersonalizadaN4A {
	position:absolute;
	width:20px;
	height:20px;
	z-index:5;
	left: 153px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN4mA {
	position:absolute;
	width:20px;
	height:20px;
	z-index:6;
	left: 190px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN5A {
	position:absolute;
	width:20px;
	height:20px;
	z-index:7;
	left: 227px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN5mA {
	position:absolute;
	width:20px;
	height:20px;
	z-index:8;
	left: 264px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN6A {
	position:absolute;
	width:20px;
	height:20px;
	z-index:9;
	left: 301px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN6mA {
	position:absolute;
	width:20px;
	height:20px;
	z-index:9;
	left: 301px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN2B {
	position:absolute;
	width:18px;
	height:18px;
	z-index:1;
	text-align: center;
	left: 5px;
	top: 3px;
}
#divFormNumeracionPersonalizadaN2mB {
	position:absolute;
	width:18px;
	height:18px;
	z-index:2;
	left: 44px;
	top: 3px;
	text-align: center;
}
#divFormNumeracionPersonalizadaN3B {
	position:absolute;
	width:18px;
	height:18px;
	z-index:3;
	left: 83px;
	text-align: center;
	top: 3px;
}
#divFormNumeracionPersonalizadaN3mB {
	position:absolute;
	width:18px;
	height:18px;
	z-index:4;
	left: 121px;
	top: 3px;
	text-align: center;
}
#divFormNumeracionPersonalizadaN4B {
	position:absolute;
	width:18px;
	height:18px;
	z-index:5;
	left: 158px;
	text-align: center;
	top: 3px;
}
#divFormNumeracionPersonalizadaN4mB {
	position:absolute;
	width:18px;
	height:18px;
	z-index:6;
	left: 195px;
	text-align: center;
	top: 3px;
}
#divFormNumeracionPersonalizadaN5B {
	position:absolute;
	width:18px;
	height:18px;
	z-index:7;
	left: 230px;
	text-align: center;
	top: 3px;
}
#divFormNumeracionPersonalizadaN5mB {
	position:absolute;
	width:18px;
	height:18px;
	z-index:8;
	left: 267px;
	text-align: center;
	top: 3px;
}
#divFormNumeracionPersonalizadaN6B {
	position:absolute;
	width:18px;
	height:18px;
	z-index:9;
	left: 342px;
	text-align: center;
	top: 3px;
}
#divFormNumeracionPersonalizadaN6mB {
	position:absolute;
	width:18px;
	height:18px;
	z-index:9;
	left: 465px;
	text-align: center;
	top: -33px;
}

#divFormNumeracionPersonalizadaN6 {
	position:absolute;
	width:20px;
	height:20px;
	z-index:9;
	left: 338px;
	text-align: center;
	top: 3px;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN63 {
	position:absolute;
	width:35px;
	height:22px;
	z-index:9;
	left: 353px;
	text-align: center;
	top: 4px;
}
#divFormNumeracionPersonalizadaN6m {
	position:absolute;
	width:35px;
	height:36px;
	z-index:10;
	left: 396px;
	top: 5px;
	text-align: center;
}

#divFormNumeracionPersonalizadaN6m2 {
	position:absolute;
	width:20px;
	height:20px;
	z-index:10;
	left: 338px;
	top: 3px;
	text-align: center;
	background-color: #CCCCCC;
	padding: 6px;
}
#divFormNumeracionPersonalizadaN6m3 {
	position:absolute;
	width:18px;
	height:18px;
	z-index:10;
	left: 305px;
	top: 3px;
	text-align: center;
}

#divFormNumeracionPersonalizadaNumerosMas {
	position:absolute;
	width:413px;
	height:37px;
	z-index:2;
	left: 9px;
	top: 71px;
}
#divFormNumeracionPersonalizadaNumerosMenos {
	position:absolute;
	width:440px;
	height:37px;
	z-index:3;
	left: 9px;
	top: 124px;
}
#divFormNumeracionPersonalizadaPares {
	position:absolute;
	width:40px;
	height:18px;
	z-index:11;
	left: 377px;
	top: 3px;
	text-align: center;
}

/***CSS*****/
.fuenteNumPersonalizada{
	font-family:Verdana, Geneva, sans-serif;
	font-size:11px;
	color:#999;
	font-weight:600;
	text-align:center;
}

.fueenteNumNumPersonalizada{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	text-align:center;
	color:#FFF;
	padding: 6px;
}

.fueenteNumNumPersonalizadaWhite{
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-weight:600;
	color:#FFF;
	text-align:center;
}

.descripcion {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000;
}

#divFormNumeracionPersonalizadaOk {
	position:absolute;
	width:61px;
	height:26px;
	z-index:3501;
	left: 487px;
	top: 155px;
	text-align: center;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#divFormNumeracionPersonalizadaPrecio {
	position:absolute;
	width:46px;
	height:18px;
	z-index:12;
	left: 436px;
	top: 3px;
}
#divFormNumeracionPersonalizadalblPrecio {
	position:absolute;
	width:49px;
	height:16px;
	z-index:10001;
	left: 461px;
	top: 74px;
}
#divFormNumeracionPersonalizadalblTotal {
	position:absolute;
	width:43px;
	height:16px;
	z-index:16;
	left: 514px;
	top: 66px;
}
#divNumTocuhPares {
	position:absolute;
	width:42px;
	height:17px;
	z-index:1017;
	left: 427px;
	top: 65px;
}
#divFormNumeracionPersonalizadaTotal {
	position:absolute;
	width:53px;
	height:18px;
	z-index:13;
	left: 492px;
	top: 3px;
}
#divNumPerTec {
	position:absolute;
	width:566px;
	height:147px;
	z-index:10000;
	left: 1px;
	top: 187px;
	background-color: #FFFFFF;
	border: thin solid #999;
}
#lblTecN2 {
	position:absolute;
	width:7px;
	height:7px;
	z-index:1;
	left: 11px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN2m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:2;
	left: 48px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN3 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:3;
	left: 87px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN3m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:4;
	left: 124px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN4 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:5;
	left: 161px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN4m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:6;
	left: 198px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN5 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:7;
	left: 235px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN5m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:8;
	left: 271px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN6 {
	position:absolute;
	width:10px;
	height:10px;
	z-index:9;
	left: 310px;
	top: -3px;
	text-align: center;
	padding: 6px;
}
#lblTecN6m {
	position:absolute;
	width:10px;
	height:10px;
	z-index:10;
	left: 347px;
	top: -2px;
	text-align: center;
	padding: 6px;
}
#divNumPerTecDivTxtN2 {
	position:absolute;
	width:20px;
	height:20px;
	z-index:11;
	left: 12px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN2m {
	position:absolute;
	width:29px;
	height:21px;
	z-index:12;
	left: 50px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN3 {
	position:absolute;
	width:29px;
	height:21px;
	z-index:13;
	left: 86px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN3m {
	position:absolute;
	width:29px;
	height:21px;
	z-index:14;
	left: 125px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN4 {
	position:absolute;
	width:29px;
	height:21px;
	z-index:15;
	left: 161px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN4m {
	position:absolute;
	width:29px;
	height:21px;
	z-index:16;
	left: 198px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN5 {
	position:absolute;
	width:29px;
	height:21px;
	z-index:17;
	left: 235px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN5m {
	position:absolute;
	width:29px;
	height:21px;
	z-index:18;
	left: 275px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN6 {
	position:absolute;
	width:29px;
	height:21px;
	z-index:19;
	left: 313px;
	top: 60px;
	text-align: center;
}
#divNumPerTecDivTxtN6m {
	position:absolute;
	width:29px;
	height:21px;
	z-index:20;
	left: 349px;
	top: 60px;
	text-align: center;
}
#apDiv23 {
	position:absolute;
	left:305px;
	top:227px;
	width:102px;
	height:38px;
	z-index:10003;
}
#txtTeclblPares {
	position:absolute;
	width:35px;
	height:21px;
	z-index:21;
	left: 398px;
	top: 60px;
}
#txtTeclblPrecio {
	position:absolute;
	width:45px;
	height:21px;
	z-index:22;
	left: 450px;
	top: 60px;
	text-align: center;
}
#txtTecLblTotal {
	position:absolute;
	width:49px;
	height:21px;
	z-index:23;
	left: 511px;
	top: 60px;
}
#lblTecPares {
	position:absolute;
	width:35px;
	height:9px;
	z-index:24;
	left: 387px;
	top: -3px;
}
#lblTecPrecio {
	position:absolute;
	width:39px;
	height:9px;
	z-index:25;
	left: 443px;
	top: -2px;
}
#lblTecTotal {
	position:absolute;
	width:29px;
	height:9px;
	z-index:26;
	left: 510px;
	top: -2px;
}
#txtTecBtnAceptar {
	position:absolute;
	width:70px;
	height:28px;
	z-index:27;
	left: 487px;
	top: 111px;
}
#divNumPerTecLblTitulo {
	position:absolute;
	width:178px;
	height:13px;
	z-index:28;
	left: 231px;
	top: 11px;
}
#divNumPerTecCerrar {
	position:absolute;
	width:18px;
	height:15px;
	z-index:29;
	left: 546px;
	top: 11px;
	text-align: center;
}
#divNumPersonOpcion {
	position:absolute;
	width:246px;
	height:22px;
	z-index:10003;
	left: 7px;
	top: 10px;
}
.tipoNumPersonalizada{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#999;
}

.tipoNumPersonalizadaBlack{
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	color:#000;
	font-weight:600;
}
#divEncabezadoNumPersonalizada {
	position:absolute;
	width:556px;
	height:20px;
	z-index:1010;
	top: 43px;
	left: 6px;
	background-color: #000000;
}

#divFormNumeracionPersonalizadalblPrecioA {
	position:absolute;
	width:49px;
	height:14px;
	z-index:14;
	left: 444px;
	top: 3px;
}
#divFormNumeracionPersonalizadalblTotalA {
	position:absolute;
	width:40px;
	height:14px;
	z-index:15;
	left: 504px;
	top: 3px;
}
#divNumTocuhParesA {
	position:absolute;
	width:45px;
	height:14px;
	z-index:16;
	left: 386px;
	top: 3px;
}
#divCerrarNumPersonalizada {
	position:absolute;
	width:33px;
	height:14px;
	z-index:3501;
	left: 509px;
	top: 12px;
}
#apDiv1 {
	position:absolute;
	width:556px;
	height:20px;
	z-index:30;
	left: 6px;
	top: 34px;
	background-color: #000000;
}
#divCerrarNumPersonalizada2 {
	position:absolute;
	width:33px;
	height:14px;
	z-index:31;
	left: 513px;
	top: 12px;
}


-->
</style>
</head>

<body>
<div  id="divFormNumeracionPersonalizada">
<div id="divNumPersonOpcion" class="tipoNumPersonalizada" >
  <label>
    <input name="radio" type="radio" id="radioTouch" value="radioTouch" checked="checked"  onchange="activarVentanaDeNumeracion();"/>
  </label>
  Numeracion touch
  <label>
    <input type="radio" name="radio" id="radioTeclado" value="radioTeclado"  onchange="activarVentanaDeNumeracion();"/>
  </label>
Numeracion tecleada</div>
  <div id="divFormNumeracionPersonalizadaNumeros" >
    
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN2B" ><label id="lblNP_N2">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN2mB" ><label id="lblNP_N2m">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN3B" ><label id="lblNP_N3">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN3mB" ><label id="lblNP_N3m">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN4B" ><label id="lblNP_N4">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN4mB"  ><label id="lblNP_N4m">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN5B"  ><label id="lblNP_N5">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN5mB"  ><label id="lblNP_N5m">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN6B"  ><label id="lblNP_N6">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN6mB"  ><label id="lblNP_N6"></label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaPares"><label id="lblNP_Pares">0</label></div>
    <div  class="fuenteNumPersonalizada"id="divFormNumeracionPersonalizadaN6m3"  ><label id="lblNP_N6m">0</label></div>
    <div id="divFormNumeracionPersonalizadaPrecio" class="fuenteNumPersonalizada"><label id="lblPrecioNumPer"><?php echo "$precio";?></label></div>
    <div id="divFormNumeracionPersonalizadaTotal" class="fuenteNumPersonalizada"><label id="lblTotalNumPer"><?php echo "$precio";?></label></div>
  </div>
  <div id="divFormNumeracionPersonalizadaNumerosMas"> 
    <div  class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN2mA" onclick="incrementeNum('lblNP_N2m');">+</div>
    <div  class="tipoNumPersonalizadaBlack" id="divFormNumeracionPersonalizadaN2A" onclick="incrementeNum('lblNP_N2');">+</div>
    <div class="tipoNumPersonalizadaBlack" id="divFormNumeracionPersonalizadaN3A" onclick="incrementeNum('lblNP_N3');" >+</div>
    <div  class="tipoNumPersonalizadaBlack" id="divFormNumeracionPersonalizadaN3mA" onclick="incrementeNum('lblNP_N3m');">+</div>
    <div class="tipoNumPersonalizadaBlack" id="divFormNumeracionPersonalizadaN4A" onclick="incrementeNum('lblNP_N4');">+</div>
    <div  class="tipoNumPersonalizadaBlack" id="divFormNumeracionPersonalizadaN4mA" onclick="incrementeNum('lblNP_N4m');">+</div>
    <div  class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN5A" onclick="incrementeNum('lblNP_N5');">+</div>
    <div  class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN5mA" onclick="incrementeNum('lblNP_N5m');">+</div>
    <div class="tipoNumPersonalizadaBlack" id="divFormNumeracionPersonalizadaN6" onclick="incrementeNum('lblNP_N6');">+</div>
  <div  class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN6mA" onclick="incrementeNum('lblNP_N6m');">+</div></div>
  <div id="divFormNumeracionPersonalizadaNumerosMenos"> 
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN2m" onclick="decrementeNum('lblNP_N2m');">-</div>
    <div  class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN2" onclick="decrementeNum('lblNP_N2');">-</div>
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN3" onclick="decrementeNum('lblNP_N3');">-</div>
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN3m" onclick="decrementeNum('lblNP_N3m');">-</div>
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN4" onclick="decrementeNum('lblNP_N4');">-</div>
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN4m" onclick="decrementeNum('lblNP_N4m');">-</div>
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN5" onclick="decrementeNum('lblNP_N5');">-</div>
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN5m" onclick="decrementeNum('lblNP_N5m');">-</div>
    <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN6A" onclick="decrementeNum('lblNP_N6');">-</div>
  <div class="tipoNumPersonalizadaBlack"id="divFormNumeracionPersonalizadaN6m2" onclick="decrementeNum('lblNP_N6m');">-</div></div>
  
  <div id="divFormNumeracionPersonalizadaCerrar" onclick="document.getElementById('divCaritoDisenoPedidoNumPer').style.visibility='hidden';"><img src="img/cerrar_b.jpg" width="13" height="13" /></div>
  <div id="divFormNumeracionPersonalizadaOk" class="fuenteNumPersonalizada" onclick="document.getElementById('divCaritoDisenoPedidoNumPer').style.visibility='hidden';vaciarNumeracionPersonalizada(<?php echo "$idEstilosSel";?>);"><img src="img/aceptar.jpg" width="76" height="26" /></div>
  <div id="divEncabezadoNumPersonalizada"><div class="fueenteNumNumPersonalizada" id="divFormNumeracionPersonalizadaLblN2">2</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN2m">-</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN3">3</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN3m">-</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN4">4</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN4m">-</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN5">5</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN5m">-</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN6">6</div>
    <div class="fueenteNumNumPersonalizada"id="divFormNumeracionPersonalizadaLblN6m">-</div>
  <div  class="fueenteNumNumPersonalizadaWhite"id="divFormNumeracionPersonalizadalblPrecioA">Precio</div>
  <div  class="fueenteNumNumPersonalizadaWhite" id="divFormNumeracionPersonalizadalblTotalA">Total</div>
  <div  class="fueenteNumNumPersonalizadaWhite"id="divNumTocuhParesA">Pares</div>
  </div>
  <div  class="descripcion" id="divCerrarNumPersonalizada">Cerrar</div>
</div>

<div id="divNumPerTec"  style="display:none" >
  <div class="fuenteNumPersonalizada" id="divNumPerTecDivTxtN2m" >
    <input class="fuenteNumPersonalizada" name="txtTecN2m" type="text" id="txtTecN2m" size="4" TABINDEX=2 onchange="sumatoriaNumPersTeclada();" />
  </div>
  <div  class="fuenteNumPersonalizada"id="divNumPerTecDivTxtN2">
    <input  class="fuenteNumPersonalizada" name="txtTecN2" type="text" id="txtTecN2" size="4" TABINDEX=1 onchange="sumatoriaNumPersTeclada();"/>
  </div>
  <div class="fuenteNumPersonalizada" id="divNumPerTecDivTxtN3">
    <input class="fuenteNumPersonalizada" name="txtTecN3" type="text" id="txtTecN3" size="4" TABINDEX=3 onchange="sumatoriaNumPersTeclada();" />
  </div>
  <div class="fuenteNumPersonalizada" id="divNumPerTecDivTxtN3m">
    <input class="fuenteNumPersonalizada" name="txtTecN3m" type="text" id="txtTecN3m" size="4"  TABINDEX=4 onchange="sumatoriaNumPersTeclada();" />
  </div>
  <div class="fuenteNumPersonalizada" id="divNumPerTecDivTxtN4">
    <input  class="fuenteNumPersonalizada" name="txtTecN4" type="text" id="txtTecN4" size="4" TABINDEX=5 onchange="sumatoriaNumPersTeclada();" />
  </div>
  <div class="fuenteNumPersonalizada" id="divNumPerTecDivTxtN4m">
    <input class="fuenteNumPersonalizada"  name="txtTecN4m" type="text" id="txtTecN4m" size="4" TABINDEX=6 onchange="sumatoriaNumPersTeclada();" />
  </div>
  <div  class="fuenteNumPersonalizada"id="divNumPerTecDivTxtN5">
    <input class="fuenteNumPersonalizada" name="txtTecN5" type="text" id="txtTecN5" size="4" TABINDEX=7 onchange="sumatoriaNumPersTeclada();" />
  </div>
  <div  class="fuenteNumPersonalizada"id="divNumPerTecDivTxtN6">
    <input  class="fuenteNumPersonalizada" name="txtTecN6" type="text" id="txtTecN6" size="4" TABINDEX=9 onchange="sumatoriaNumPersTeclada();" />
  </div>
  <div class="fuenteNumPersonalizada" id="divNumPerTecDivTxtN5m">
    <input  class="fuenteNumPersonalizada" name="txtTecN5m" type="text" id="txtTecN5m" size="4" TABINDEX=8 onchange="sumatoriaNumPersTeclada();"/>
  </div>
  <div  class=""id="divNumPerTecDivTxtN6m">
    <input class="fuenteNumPersonalizada" name="txtTecN6m" type="text" id="txtTecN6m" size="4" TABINDEX=10 onchange="sumatoriaNumPersTeclada();"/>
  </div>
  <div id="txtTeclblPares"><label class="fuenteNumPersonalizada" id="lblParesNumPerTeclada"></label></div>
  <div id="txtTeclblPrecio"><label class="fuenteNumPersonalizada" id="lblPrecioNumPerTeclada"><?php echo "$precio";?></label></div>
  <div id="txtTecLblTotal"><label  class="fuenteNumPersonalizada" id="lblTotalNumPerTeclada"></label></div>
  <div id="txtTecBtnAceptar" class="fuenteNumPersonalizada"  onclick="document.getElementById('divCaritoDisenoPedidoNumPer').style.visibility='hidden';vaciarNumeracionPersonalizadaTecleada(<?php echo "$idEstilosSel";?>);"><img src="img/aceptar.jpg" width="76" height="26" /></div>
  <div class="tipoNumPersonalizada" id="divNumPerTecLblTitulo">Personaliza tu numeración</div>
  <div id="divNumPerTecCerrar" onclick="document.getElementById('divCaritoDisenoPedidoNumPer').style.visibility='hidden';"><img src="img/cerrar_b.jpg" width="13" height="13" /></div>
  <div id="apDiv1"><div id="lblTecN2" class="fueenteNumNumPersonalizada">2</div>
  <div id="lblTecN2m" class="fueenteNumNumPersonalizada">-</div>
  <div id="lblTecN3" class="fueenteNumNumPersonalizada">3</div>
  <div id="lblTecN3m" class="fueenteNumNumPersonalizada">-</div>
  <div id="lblTecN4" class="fueenteNumNumPersonalizada">4</div>
  <div id="lblTecN4m" class="fueenteNumNumPersonalizada">-</div>
  <div id="lblTecN5" class="fueenteNumNumPersonalizada">5</div>
  <div id="lblTecN5m" class="fueenteNumNumPersonalizada">-</div>
  <div id="lblTecN6" class="fueenteNumNumPersonalizada">6</div>
  <div id="lblTecN6m" class="fueenteNumNumPersonalizada">-</div>
  <div id="lblTecPares" class="fueenteNumNumPersonalizada">Pares</div>
  <div id="lblTecPrecio" class="fueenteNumNumPersonalizada">Precio</div>
  <div id="lblTecTotal" class="fueenteNumNumPersonalizada">Total</div>
  </div>
  <div class="descripcion" id="divCerrarNumPersonalizada2">Cerrar</div>
</div>

</body>
</html>
