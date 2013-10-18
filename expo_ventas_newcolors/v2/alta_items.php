<?php

include('inc/classNC.inc');
$oDB = new MySQLDB();

$strSql = "INSERT INTO estilos (Linea, Estilo, MAterial, Color, Precio, activo, idCategoria, idSubCat) VALUES ('MELANI','MELANI 21','KENYA','NEGRO',0,1,1,1);";
mysql_query($strSql,$oDB->Connection);
$strSql = "SELECT MAX(Id) FROM estilos;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188," . mysql_result($rstData,0,0) . ");";
unset($rstData);
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: MELANI MELANI 21 KENYA NEGRO ... OK<br />';

$strSql = "INSERT INTO estilos (Linea, Estilo, MAterial, Color, Precio, activo, idCategoria, idSubCat) VALUES ('MELANI','MELANI 21','KENYA','BLANCO',0,1,1,1);";
mysql_query($strSql,$oDB->Connection);
$strSql = "SELECT MAX(Id) FROM estilos;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188," . mysql_result($rstData,0,0) . ");";
unset($rstData);
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: MELANI MELANI 21 KENYA BLANCO ... OK<br />';

$strSql = "INSERT INTO estilos (Linea, Estilo, MAterial, Color, Precio, activo, idCategoria, idSubCat) VALUES ('1000','1004','NEW LINO','GRIS',0,1,1,1);";
mysql_query($strSql,$oDB->Connection);
$strSql = "SELECT MAX(Id) FROM estilos;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188," . mysql_result($rstData,0,0) . ");";
unset($rstData);
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: 1000 1004 NEW LINO GRIS ... OK<br />';

$strSql = "INSERT INTO estilos (Linea, Estilo, MAterial, Color, Precio, activo, idCategoria, idSubCat) VALUES ('1000','1004','DURAZNO','NEGRO',0,1,1,1);";
mysql_query($strSql,$oDB->Connection);
$strSql = "SELECT MAX(Id) FROM estilos;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188," . mysql_result($rstData,0,0) . ");";
unset($rstData);
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: 1000 1004 DURAZNO NEGRO ... OK<br />';

$strSql = "INSERT INTO estilos (Linea, Estilo, MAterial, Color, Precio, activo, idCategoria, idSubCat) VALUES ('1000','1006','DURAZNO','NEGRO',0,1,1,1);";
mysql_query($strSql,$oDB->Connection);
$strSql = "SELECT MAX(Id) FROM estilos;";
$rstData = mysql_query($strSql,$oDB->Connection);
$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188," . mysql_result($rstData,0,0) . ");";
unset($rstData);
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: 1000 1006 DURAZNO NEGRO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,1438);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: 1000 1004 LINO PANAMA NEGRO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,1435);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: 1000 1006 LINO PANAMA NEGRO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,3284);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: FANTASY FANTASY 03 DURAZNO ACUATICO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,3311);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: LIBERTY LIBERTY 03 DURAZNO CARBON ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,3268);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: LILIAN LILIAN 02 DURAZNO NEGRO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,3126);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: MALENA MALENA 05 DURAZNO MANTA ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,3611);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: MELANI MELANI 20 DURAZNO NEGRO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,3613);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: MIMI MIMI 03 MOLIENDA ORO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,2413);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: MIMI MIMI 07 NEW LINO NEGRO ... OK<br />';

$strSql = "INSERT INTO catalogo_estilos_plantilla (idPlantilla,idEstilo) VALUES (188,3325);";
mysql_query($strSql,$oDB->Connection);
echo 'Insertado: MIMI MIMI 07 SUEDE NEGRO ... OK<br />';

echo '<br />TERMINADO ... OK';
unset($oConn);
?>