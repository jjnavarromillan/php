<?php 

	
	session_start();
	
	if(isset($_SESSION['usrsys'])){
		
			unset($_SESSION['usrsys']);
			session_destroy();
			if(! isset($_SESSION['usrsys'])){
				echo " Session finalizada";
				?>
                
               
                
                
                <link href="../css/divindex.css" rel="stylesheet" type="text/css" />
                
                
                
                
                <?php 
				
				require("../divindex.html");
				 
			}
			else{
				require("../divindex.html");
	//			echo " Session no pudo finalizar";
			}
		
	}
	else{
//		echo "false";
		require("../divindex.html");
	}
		
		
?>