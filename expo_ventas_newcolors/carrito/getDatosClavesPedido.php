<?php 

   $mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
    
    $sql= "select * from clave_pedido ";
    
    $result=$mysqli->query($sql);
    
    echo "<table width='519'  border='0px'    cellpadding='0' cellspacing='0'>";
    echo "<tr bgcolor='#999999'>";
    //echo "<td width='55' style='background:url(sistema_files/degradado6.png)'>Select.</td>";
    echo "<td width='58'>Clave</td>";
    echo "<td width='61'>Cant.</td>";
    echo "<td width='23'>2</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>3</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>4</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>5</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='23'>6</td>";
    echo "<td width='23'>-</td>";
    echo "<td width='62'>Pares</td>";
    echo "<td width='62'>Total</td>";
    echo "</tr>";
	$cont=1;
    while($obj=$result->fetch_object()){
    
    	echo "<tr>";
        /*echo "<td><label>";
        echo "<input type='checkbox' name='a' id='seleccion1' value='seleccion1' />";
		echo "</label></td>";*/
      	echo "<td><label id='clave_". $cont ."'>". $obj->clave ."</label></td>";
      	echo "<td><label>";
        echo "<select name='cantidad' id='cantidad". $cont ."' onChange=\"totalClavesPedidos('cantidad". $cont ."','pares_". $cont ."','Total". $cont ."');\">";
        echo "<option value='0' selected='selected'>0</option>";
        echo "<option value='1' >1</option>";
        echo "<option value='2'>2</option>";
       	echo "<option value='3'>3</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='5'>5</option>";
        echo "<option value='6'>6</option>";
        echo "</select>";
      	echo "</label></td>";
        echo "<td><label id='N2_". $cont ."'>". $obj->N2 ."</label></td>";
      	echo "<td><label id='N2m_". $cont ."'>". $obj->N2m ."</label></td>";
        echo "<td><label id='N3_". $cont ."'>". $obj->N3 ."</label></td>";
      	echo "<td><label id='N3m_". $cont ."'>". $obj->N3m ."</label></td>";
        echo "<td><label id='N4_". $cont ."'>". $obj->N4 ."</label></td>";
      	echo "<td><label id='N4m_". $cont ."'>". $obj->N4m ."</label></td>";
        echo "<td><label id='N5_". $cont ."'>". $obj->N5 ."</label></td>";
      	echo "<td><label id='N5m_". $cont ."'>". $obj->N5m ."</label></td>";
        echo "<td><label id='N6_". $cont ."'>". $obj->N6 ."</label></td>";
      	echo "<td><label id='N6m_". $cont ."'>". $obj->N6m ."</label></td>";
      	echo "<td><label id='pares_". $cont ."'>". $obj->pares ."</label></td>";
        echo "<td><label id='Total". $cont ."'>0</label> </td>";
    	echo "</tr>";
		$cont++;	
    
    }
	echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td><label id=\"lblTotal_\">0</label></td>";
	echo "</td>";
	echo "</table>";
	

	echo "<label id=\"lblCantTotal\" style='display:none;' >$cont</label>";
	
?>

