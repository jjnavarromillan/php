<?php 
	session_start();
	include_once("LoginSystem.php");
	
	if(!isset($_SESSION['usrsys'])){
		if(isset($_REQUEST['txtUsuario']) && isset($_REQUEST['txtPasswd'])){
			$usuario = $_REQUEST['txtUsuario'];
			$passwd = $_REQUEST['txtPasswd'];
			
			$C_val_user = new LoginSystem(); 
			$datRes = $C_val_user->existeUsuarioIdRelTipo($usuario,$passwd);
			if($datRes!="false"){
				$datos=array();
				$datos=split(';',$datRes);
				if(count($datos)>0){
					$_SESSION['usrsys']=$datos[2];
					echo "$datRes";
				}
				else{
					echo "false";	
				}
//				header("Location: http://localhost/sistema2011/carrito/sistema.php");
				//echo "1";
			}
			else
			{
				
				echo "false";
//				echo "2";
			}									  
		}
		else
		{
			echo "false";
			}
	}
	else
		if(isset($_SESSION['usrsys'])){
			if($_SESSION['usrsys']=!"")
				$C_val_user = new LoginSystem(); 
				$usuario=$_SESSION['usrsys'];
				$datRes = $C_val_user->getUsuarioIdRelTipo($usuario);
				if($datRes!="false"){
					echo "$datRes";
				}
			else
			{
				echo "false";
			}
		}
		else
			echo "false";
		
			//header("Location: http://localhost/sistema2011/carrito/sistema.php");
			//echo "3  - ".$_COOKIE['usrsys'];
		
		?>