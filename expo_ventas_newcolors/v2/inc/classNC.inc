<?php
class MySQLDB {

	var $Connection;

	function __construct() {
		$this->Connection = mysql_connect('localhost', 'user_web', '123454321');
		if (!$this->Connection) {
		    die('error de conexion: ' . mysql_error());
		}
		mysql_select_db("newcolors_expo", $this->Connection);
	}
	
	function __destruct() {
		mysql_close($this->Connection);
	}
}
?>