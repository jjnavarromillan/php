
    <?php 
	$idEstilo= $_REQUEST['idEstilo'];

  		$sqlGetData = " select Id from estilos where Id=$idEstilo";
	
	
			//echo $sqlGetData;
			$mysqli= new mysqli("localhost", "user_web","123454321", "newcolors_expo");      
			$mysqli->query("SET NAMES 'utf8'");
			$idEstilo=""; //1
			
			$num=0;
			$ban=false;
			if($result_data=$mysqli->query($sqlGetData)){
			
				$num=mysqli_num_rows($result_data);
				//echo $num;
				
				
				if ($num>0)
				{	  
					$ban=true;
				}
			}
			echo $ban;
		?>

