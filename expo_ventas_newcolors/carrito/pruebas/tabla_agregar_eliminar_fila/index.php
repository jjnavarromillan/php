<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>jQuery - agregar y eliminar filas en una tabla</title>
        <script language="javascript" type="text/javascript" src="jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="jquery.validate.1.5.2.js"></script>
        <script language="javascript" type="text/javascript" src="script.js"></script>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div id="contenedor">
    
    
            <h1>jQuery - agregar y eliminar filas en una tabla</h1>
            <form action="javascript: fn_agregar();" method="post" id="frm_usu">
                <table class="formulario"><br />
                    <thead>
                        <tr>
                            <th colspan="2"><img src="add.png" /> Agregando fila a tabla</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ide</td>
                            <td><input name="valor_ide" type="text" id="valor_ide" size="10" class="required number" /></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input name="valor_uno" type="text" id="valor_uno" size="40" class="required" /></td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td><input name="valor_dos" type="text" id="valor_dos" size="40" class="required" /></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input name="valor_tres" type="text" id="valor_tres" size="30" class="required email" /></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><input name="agregar" type="submit" id="agregar" value="Agregar" /></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            <table id="grilla" class="lista">
              <thead>
                    <tr>
                        <th>Ide</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Héctor</td>
                        <td>Chiguay</td>
                        <td>hector2c@live.com</td>
                        <td><a class="elimina"><img src="delete.png" /></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Harold</td>
                        <td>Chiguay</td>
                        <td>kenshines@hotmail.com</td>
                        <td><a class="elimina"><img src="delete.png" /></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Howard</td>
                        <td>Chiguay</td>
                        <td>copa_howard@hotmail.com</td>
                        <td><a class="elimina"><img src="delete.png" /></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Gissella</td>
                        <td>Ticona</td>
                        <td>conecienta@hotmail.com</td>
                        <td><a class="elimina"><img src="delete.png" /></a></td>
                    </tr>
                </tbody>
                <tfoot>
                	<tr>
                    	<td colspan="5"><strong>Cantidad:</strong> <span id="span_cantidad">4</span> usuarios.</td>
                    </tr>
                </tfoot>
            </table>
            <hr />
            <p class="autor">Mas información en: <a href="http://hector2c.wordpress.com">http://hector2c.wordpress.com</a></p>
        
    
        </div>
    </body>
</html>